<?php
include ("inc/global.php");
if($_SESSION['userid']==''){
	header('Location: login.php');
}
$title = getTitle($db);
$titleLength = count($title);

$action = $_POST['actionType'];
$parentId = $_POST['parentId'];
$titleName = $_POST['titleName'];
$id = $_POST['id'];
if($action=='add'){
	$db->insert('title','`p_id`,`title_name`',"'$parentId','$titleName'");
	reLoadPage();
}else if($action=='del'){
	$db->update('title',"`visible`=0",'`id`='.$id);
	exit( $db->db_affected_rows() );
}else if($action=='update'&&$id>0){
	$db->update('title',"`p_id`=".$parentId." ,`title_name`='".$titleName."'",'`id`='.$id);
	reLoadPage();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="min/?f=skin/css/default.css,skin/css/bootstrap.css" />
	<script src="skin/js/jquery-1.8.2.min.js"></script>
	<script src="min/?f=skin/js/all.js"></script>
</head>
<body>
	<div class="wrapper">
    <table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>所属ID</th>
				<th>名称</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
				for( $i = 0 ; $i < $titleLength ; $i++){
					echo '<tr><td>'.$title[$i]['id'].'</td><td>'.$title[$i]['p_id'].'</td><td>'.$title[$i]['title_name']
					.'</td><td><div class="btn-group"><a data-eventtype="del" href="javascript:;" data-id="'.$title[$i]['id'].'" class="btn btn-danger"><i class="icon-trash icon-white"></i> 删除</a><a data-eventtype="update" href="javascript:;" data-name="'.$title[$i]['title_name'].'"  data-id="'.$title[$i]['id'].'" data-pid="'.$title[$i]['p_id'].'" class="btn btn-success"><i class="icon-edit icon-white"></i> 更改</a></div></td></tr>';
				}
			?>
		</tbody>
    </table>	
    <form name="addForm" class="bs-docs-example" method="post">
            <fieldset class="left mr20">
              <legend class="cBlue">添加</legend>
              <label>所属菜单</label>
				<select class="span5" name="parentId">
					<option value="0">一级菜单</option>
					<?php
						for( $i = 0 ; $i < $titleLength ; $i++){
							echo '<option value="'.$title[$i]['id'].'">'.$title[$i]['title_name'].'</option>';
						}
					?>
				</select>
              <label>名称</label>
              <input name="titleName" type="text" class="span5" placeholder="菜单名称…">
              <div class="clear"></div>
              <input type="hidden" name="actionType" value="add" />
              <button class="btn btn-primary" type="submit">添加</button>
            </fieldset>
            </form>
            <form name="updateForm" class="bs-docs-example" method="post">
            <fieldset class="left" id="UpdateForm">
              <legend class="cGreen">更新</legend>
              <label>所属菜单</label>
				<select class="span5" name="parentId">
				 <option value="0">一级菜单</option>
                 <?php
						for( $i = 0 ; $i < $titleLength ; $i++){
							echo '<option value="'.$title[$i]['id'].'">'.$title[$i]['title_name'].'</option>';
						}
				 ?>
				</select>
              <label>名称</label>
              <input name="titleName" type="text" class="span5" placeholder="菜单名称…">
              <div class="clear"></div>
              <input type="hidden" name="actionType" value="update" />
              <input type="hidden" name="id" value="0" />
              <button class="btn btn-success" type="submit">更新</button>
            </fieldset>
          </form>	
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
		$("a[data-eventtype='del']").bind('click',function(){
			var that = this;
			help.loading();
			$.ajax({
				url:'editMenu.php',
				type:'post',
				data:{actionType:'del',id:$(this).attr('data-id')},
				success: function(result){
					$(that).parent().parent().parent().remove();
					if(result=='1'){
						help.successed('操作成功！');
					}else{
						help.error('操作失败');
					}
				}
			});
		});
		var updateForm = $('#UpdateForm'),
			updataSelect = updateForm.find('select');
			updataName = updateForm.find("input[name='titleName']");
			updateId  = updateForm.find("input[name='id']");
		$("a[data-eventtype='update']").bind('click',function(){
			var that = this;
			$('html,body').animate({
				scrollTop:updateForm.offset().top+$('body').scrollTop()
			});
			updataSelect.find('option').attr('selected',false).filter("[value='"+$(this).attr('data-pid')+"']").attr('selected',true);
			updataName.val( $(this).attr('data-name') );
			updateId.val( $(this).attr('data-id') );
		});
	</script>
</body>
</html>