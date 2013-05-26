<?php 
include("inc/global.php"); 
if($_SESSION['userid']==''){
    header('Location: login.php');
}
if(!isset($_POST['action'])){
    $_SESSION['MyThumbnailName'] = '';
}
if($_POST['action'] == 'update'){
	$db->update('article',"`title_id`='".$_POST['titleId']."',`title`='".$_POST['title']."',`content`='".addslashes($_POST['content'])."',`thumb`='".$_SESSION['MyThumbnailName']."'",'id='.$_POST['id']);
	echo $db->db_affected_rows();
	exit();
}

$id = $_GET['id'];
if(!isset($_GET['id'])){
	header('Location: index.php');
}


$title = getTitle($db);
$titleLength = count($title);

$article = $db->fetch_array( $db->query('select * from article where id='.$id) );
?>
<?php 
	include ('template/header.php');
?>
<script>window.UEDITOR_HOME_URL = '/source/ueditor/';</script>
<script src="min/?f=source/ueditor/editor_config.js,source/ueditor/editor_all.js,source/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<script src="min/?f=source/swfupload/swfupload.js,source/swfupload/swfupload.queue.js,source/swfupload/fileprogress.js,source/swfupload/handlers.js&debug=1"></script>
<style>
    #editor{margin-bottom: 10px;}
</style>
<div class="container">
<div class="row-fluid show-grid">
  <div class="span12">
	<fieldset>
	<legend class="cGreen">修改文章</legend>

	  <label>文章标题</label>
	  <input type="text" name="titleName" class="input-block-level" value="<?php echo $article['title']; ?>">
	  <label>文章类别</label>
      <select class="input-block-level" name="titleId">
                 <?php
						for( $i = 0 ; $i < $titleLength ; $i++){
							echo '<option '.(($article['title_id']==$title[$i]['id'])?'selected="selected"':'').' value="'.$title[$i]['id'].'">'.$title[$i]['title_name'].'</option>';
						}
				 ?>
		</select>
       <script id="editor" type="text/plain">
       		<?php echo $article['content']; ?>
       </script>
       <label>缩略图</label>
        <div class="fieldset flash" id="fsUploadProgress">
                <?php 
                    if($article['thumb']){
                        $_SESSION['MyThumbnailName'] = $article['thumb'];
                        echo '<div class="progressName"><a target="_blank" href="http://helper.zhenai.com/UpLoadFiles/thumbs/'.$article['thumb'].'" onmouseout="hideShowThumbs(this)" onmouseover="showThumbs(this)">'.$article['thumb'].'</a></div>';
                    }
                ?>
        </div>
        <span id="btnCancel" class="hide"></span>
        <div id="divStatus">0 Files Uploaded</div>
        <a href="javascript:;" class="btn btn-large btn-block">
            <span id="spanButtonPlaceHolder"></span>
        </a>

	  <a href="javascript:;" class="btn btn-large btn-success btn-block" id="updateBtn">保存</a>
	  </fieldset>
  </div>
</div>
</div>

	<div class="statusTips f12px">
		<div id="loading" class="loading animate">
			加载中...
		</div>
		<div id="successed" class="successed animate">
			成功...
		</div>
		<div id="information" class="information animate">
		</div>
		<div id="warning" class="warning animate">
			警告！
		</div>
		<div id="error" class="error animate">
			错误！
		</div>
	</div>

<script>
	//编辑器
    var ue = UE.getEditor('editor');
    ue.addListener('ready',function(){
        
    });
</script>
<script type="text/javascript">
        var swfu;

        $(window).bind('load',function(){
            var settings = {
                flash_url : "source/swfupload/swfupload.swf",
                upload_url: "source/swfupload/upload.php",
                post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
                button_action: SWFUpload.BUTTON_ACTION.SELECT_FILE,  //单选
                //button_action: SWFUpload.BUTTON_ACTION.SELECT_FILES,  //多选 
                file_size_limit : "100 MB",
                file_types : "*.jpg;*.png;*.gif",
                file_types_description : "All Files",
                file_upload_limit : 99,
                file_queue_limit : 0,
                custom_settings : {
                    progressTarget : "fsUploadProgress",
                    cancelButtonId : "btnCancel"
                },
                debug: false,

                // Button settings
                //button_image_url: "images/TestImageNoText_65x29.png",
                button_width: "100%",
                button_height: "26",
                button_placeholder_id: "spanButtonPlaceHolder",
                button_text: '<span class="theFont">上传</span>',
                button_text_style: ".theFont { font-size:16px;text-align:center;display:block;width:100%;}",
                button_text_left_padding: 0,
                button_text_top_padding: 0,
                
                // The event handler functions are defined in handlers.js
                file_queued_handler : fileQueued,
                file_queue_error_handler : fileQueueError,
                file_dialog_complete_handler : fileDialogComplete,
                upload_start_handler : uploadStart,
                upload_progress_handler : uploadProgress,
                upload_error_handler : uploadError,
                upload_success_handler : uploadSuccess,
                upload_complete_handler : uploadComplete,
                queue_complete_handler : queueComplete  // Queue plugin event
            };

            swfu = new SWFUpload(settings);
        });
     function loadImage(url, callback) {
        var img = new Image(); //创建一个Image对象，实现图片的预下载
            img.src = url;
        if (img.complete) { // 如果图片已经存在于浏览器缓存，直接调用回调函数
             callback.call(img);
            return; // 直接返回，不用再处理onload事件
         }
         img.onload = function () { //图片下载完毕时异步调用callback函数。
             callback.call(img);//将回调函数的this替换为Image对象
         };
       }
    function displayThumbs(elem,img){
        $(img).addClass('hide').css({
            width:(img.width > $('fieldset').width()) ? $('fieldset').width() : img.width,
            position:'absolute',
            zIndex:99999,
            left:$(elem).offset().left,
            boxShadow:'0 0 5px rgba(0,0,0,.5)'
        }).css({
            top:$(elem).offset().top - $(img).width()/img.width*img.height - $(elem).height()
        }).fadeIn();  
    }
    function showThumbs(elem){
        var ShowImgID = $('#ShowImgID');
        if(ShowImgID.size()<1){
            var img = new Image();
            $(document.body).append(img);
            ShowImgID = $(img);
            ShowImgID.attr('id','ShowImgID');
        }

        loadImage($(elem).attr('href'),function(){
            ShowImgID.attr('src',this.src);
            displayThumbs(elem,ShowImgID[0]);
        });

        
    }
    function hideShowThumbs(){
        $('#ShowImgID').fadeOut();
    }
    </script>
<script>
    $('#updateBtn').bind('click',function(){
        if(!$.trim($("input[name=titleName]").val())){
            help.warning('忘了写标题了...');
            return;
        }
        if(!ue.getContent()){
            help.warning('忘了写文章了...');
            return;
        }
    	help.loading('保存中...');
        var data = {
            action:'update',
            id:<?php echo $id; ?>,
            title:$.trim($("input[name=titleName]").val()),
            titleId:$("select[name=titleId]").val(),
            content:ue.getContent()
        };
        if(data.title==''){
         help.warning('标题不能为空！');
         $("input[name=titleName]").focus();
         help.loading(0);
         return;   
        }
        if(data.content==''){
            help.warning('还没写文章呢！');
            help.loading(0);
            return;
        }
    	$.ajax({
    		url:'updateArticle.php',
    		type:'post',
    		data:data,
    		success:function(rs){
    			help.loading(0);
    			if(rs == '1'){
    				help.successed('更新成功！');
    			}else{
    				help.warning('更新失败！');
    			}
    		}
    	});
    });	
</script>    
<?php 
	include ('template/footer.php');
?>
