<?php 
include("inc/global.php"); 
$rs = $db->query("select * from article where visible = 1 and user_id=".$dbuser['id'].' order by id desc');
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
				<th>文字分类</th>
				<th>文字标题</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			while($row = $db->fetch_array($rs)){
				echo '<tr><td>'.$row['id'].'</td><td>'.getTitleName($db,$row['title_id']).'</td><td>'.$row['title'].'</td><td><a class="btn btn-success" href="updateArticle.php?id='.$row['id'].'">更新</a></td><tr>';
			}
		?>
		</tbody>
    </table>			
  </div>
</div>
</div>
<?php 
	include ('template/footer.php');
?>