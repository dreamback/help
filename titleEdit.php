<?php 
include("inc/global.php"); 
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
<?php 
	include ('template/header.php');
?>
<div class="container">
<div class="row-fluid show-grid">
  <div class="span12">
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
  </div>
</div>
<div class="row-fluid show-grid">
  <div class="span6">
<form name="addForm" class="bs-docs-example" method="post">
            <fieldset>
              <legend class="cBlue">添加</legend>
              <label>所属菜单</label>
				<select class="input-block-level" name="parentId">
					<option value="0">一级菜单</option>
					<?php
						for( $i = 0 ; $i < $titleLength ; $i++){
							echo '<option value="'.$title[$i]['id'].'">'.$title[$i]['title_name'].'</option>';
						}
					?>
				</select>
              <label>名称</label>
              <input name="titleName" type="text" class="input-block-level" placeholder="菜单名称…">
              <div class="clear"></div>
              <input type="hidden" name="actionType" value="add" />
              <button class="btn btn-primary btn-block" type="submit">添加</button>
            </fieldset>
</form>
  </div>
  <div class="span6">
		<form name="updateForm" class="bs-docs-example" method="post">
            <fieldset id="UpdateForm">
              <legend class="cGreen">更新</legend>
              <label>所属菜单</label>
				<select class="input-block-level" name="parentId">
				 <option value="0">一级菜单</option>
                 <?php
						for( $i = 0 ; $i < $titleLength ; $i++){
							echo '<option value="'.$title[$i]['id'].'">'.$title[$i]['title_name'].'</option>';
						}
				 ?>
				</select>
              <label>名称</label>
              <input name="titleName" type="text" class="input-block-level" placeholder="菜单名称…">
              <div class="clear"></div>
              <input type="hidden" name="actionType" value="update" />
              <input type="hidden" name="id" value="0" />
              <button class="btn btn-success btn-block" type="submit">更新</button>
            </fieldset>
          </form>
  </div>
</div>
</div>
<?php 
	include ('template/footer.php');
?>