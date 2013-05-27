<?php
	$titleFirst = getCollection($db,$db->query('select * from title where p_id=0 and visible=1')); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><:3)~</title>
	<link rel="stylesheet" href="min/?f=skin/css/default.css,skin/css/bootstrap.min.css,skin/css/bootstrap-responsive.min.css" />
	<script src="min/?f=skin/js/jquery-1.8.2.min.js,skin/js/all.js,skin/js/bootstrap.min.js,skin/js/bootstrap-alert.js"></script>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar" data-offset="120">
<div class="navbar navbar-inverse navbar-fixed-top">
              <div class="navbar-inner">
                <div class="container">
                  <a data-target=".navbar-inverse-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a href="index.php" title="返回首页" class="brand"><:3)~</a>
                  <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav">
                      <?php 
                      	$html = '';
                      	while (list( $key, $val ) = each( $titleFirst ) ) {
                      		$html .= '<li><a href="list.php?id='.$val['id'].'">'.$val['title_name'].'</a></li>';
                      	}
                      	echo $html;
                      ?>
                    </ul>
                    <ul class="nav pull-right">
                      <li class="divider-vertical"></li>
                      <?php if($dbuser['username'] != ''){
                        echo '<li class="dropdown">'.
                        '<a data-toggle="dropdown" class="dropdown-toggle" href="#">'.$dbuser['username'].'<b class="caret"></b></a>'.
                        '<ul class="dropdown-menu">'.
                        '<li><a href="addArticle.php">发布文章</a></li>'.
                        '<li class="divider"></li>'.
                        '<li><a href="#">个人中心</a></li>'.
                        '<li><a href="myArticleList.php">我的文章</a></li>'.
                        '<li><a href="#">账号管理</a></li>'.
                        '<li><a href="titleEdit.php">分类管理</a></li>'.
                        '<li class="divider"></li>'.
                        '<li><a href="loginout.php">退出登录</a></li>'.
                        '</ul>'.
                        '</li>';
                       }else{
                        echo '<li><a href="login.php">登录</a></li>';
                       }
                      ?>
                    </ul>
                    <form action="" class="navbar-search pull-right">
                      <input type="text" placeholder="搜索" class="search-query span2">
                    </form>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>