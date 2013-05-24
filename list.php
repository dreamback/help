<?php 
	include 'inc/global.php';
	if($_POST['action']=='open'){
		$row = $db->fetch_array($db->query('select content from article where id='.$_POST['id']));
		echo $row['content'];
		exit(0);
	}
	if(isset($_GET['id'])){
		$articleRs = $db->query("select * from article where visible = 1 and title_id=".$_GET['id'].' order by id desc');
		$titleRs = $db->query("select * from article where visible = 1 and title_id=".$_GET['id'].' order by id desc');
	}else{
		$articleRs = $db->query("select * from article where visible = 1");
		$titleRs = $db->query("select * from article where visible = 1");
	}
	$article = getCollection($db,$articleRs);
	$title   = getCollection($db,$titleRs);
?>
<?php include 'template/header.php'; ?>
<style>
	.articleContent{overflow: hidden;display: none;}
	code,.line{word-break:break-all; /*支持IE，chrome，FF不支持*/word-wrap:break-word;/*支持IE，chrome，FF*/white-space:pre-wrap;}
</style>
<script src="source/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
<link rel="stylesheet" href="source/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
<div class="container">
	<div class="row">
	<div class="span3 bs-docs-sidebar mb10">
		<ul class="nav nav-list bs-docs-sidenav" data-spy="affix">
		          <!-- <li class="active" class=""><a href="#typography"><i class="icon-chevron-right"></i> Typography</a></li> -->
		          <?php 
		          	while( list($key,$val) = each($title)){
		          		echo '<li class="'.(($key==0)?'active':'').'"><a href="#title_'.$val['id'].'"><i class="icon-chevron-right"></i> '.$val['title'].'</a></li>';
		          	}
		          ?>
		</ul>
	</div>
	<div class="span9">
<!--             <div class="thumbnail mb10">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                  </div>
            </div> -->
            <?php 
            while( list($key,$val) = each($article)){
            	echo '<div class="thumbnail clearfix mb10" id="title_'.$val['id'].'">'.
            		 '<div class="caption">'.
            		 '<h3>'.$val['title'].'</h3>'.
            		 ($val['thumb']!=''?'<p><img alt="'.$val['title'].'" src="UpLoadFiles/thumbs/'.$val['thumb'].'" /></p>':'').
            		  '<div id="article_caption_'.$val['id'].'"><p>'.$val['content'].'</p></div>'.
            		 '<div class="articleContent" id="article_'.$val['id'].'"></div>'.
            		 //'<p><a class="btn btn-block" href="javascript:;" onclick="OpenArticle(this,'.$val['id'].')">展开详细</a></p>'.
            		 '</div>'.
            		 '</div>';
            }
            ?>
	</div>
	</div>
</div>
<script>
	// function OpenArticle (elem,id) {
	// 	if($(elem).hasClass('disabled'))return;
	// 	if($(elem).text()=='展开详细'){
	// 		$(elem).addClass('disabled');
	// 		help.loading(1,'加载中...');
	// 		$.ajax({
	// 			url:'list.php',
	// 			type:'post',
	// 			data:{action:'open',id:id},
	// 			success:function(html){
	// 				$(elem).text('收起文章');
	// 				$(elem).removeClass('disabled');
	// 				help.loading(0);
	// 				$('#article_caption_'+id).slideUp("slow");
	// 				$('#article_'+id).css({
	// 					display:'none',
	// 					opacity:0
	// 				}).html(html).slideDown("slow").animate({opacity:1},{ queue: false, duration: 800 });
	// 				SyntaxHighlighter.highlight();
	// 				    $('[data-spy="scroll"]').each(function () {
 //    						var $spy = $(this).scrollspy('refresh');
 //   						 });
	// 			}
	// 		});
	// 	}else{
	// 		$(elem).text('展开详细');
	// 		$('#article_caption_'+id).slideDown("slow");
	// 		$('#article_'+id).slideUp().animate({opacity:1},{ queue: false, duration: 800 });
	// 	}

	// }
	SyntaxHighlighter.highlight();
	$('.bs-docs-sidenav a').bind('click',function(e){
		e.preventDefault();
		$("html,body").animate({scrollTop:$($(this).attr('href')).offset().top-50},800);
	});
</script>
<?php include 'template/footer.php'; ?>