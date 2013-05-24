<?php
	include("inc/global.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="min/?f=skin/css/default.css,skin/css/bootstrap.css" />
	<script src="skin/js/jquery-1.8.2.min.js"></script>
	<script src="min/?f=skin/js/all.js"></script>
	<!--[if lte IE 8]>
		<script src="skin/js/IE9.js"></script>
	<![endif]-->
</head>
<body>
	<div class="sibeNav">
		<div id="sibeNav"></div>
		<div class="editMenuBtn">
			<div class="btn-group">
				<a class="btn" target="mainIframe" href="editMenu.php" id="editMenuBtn">管理菜单</a>
				<a class="btn" target="mainIframe" href="addArticle.php" id="addArticleBtn">添加文章</a>
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
	<div class="mainContainer">
	<iframe class="mainIframe" name="mainIframe" src="welcome.html" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="auto" allowtransparency="yes"></iframe>	
	</div>
	
</body>
</html>