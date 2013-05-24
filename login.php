<?php
session_start();
require_once("inc/config.inc.php"); //
require_once("inc/mysql.class.php"); //引入数据库类文件


$db=new mysql($db_host,$db_user,$db_pwd,$db_database,"conn","utf8");

//if(isset($_POST['UserNameID'])){
	$username = preg_replace('/\s\s+/', '', trim($_POST['UserNameID']));
	$password = preg_replace('/\s\s+/', '', trim($_POST['PasswordID']));
//}

$warnningStr = '';

if ($username && $password) {
	$userInfor = $db->select_array('user', '*', 'username =\'' . $username . '\'');
		if(is_array($userInfor) && is_array($db->select_array('user', '*', 'password =\'' . $password . '\''))){
				$_SESSION['userid'] = $userInfor['id'];
				$_SESSION['usershell'] = $userInfor['username'].$userInfor['password'].USERSHELL;
				header('Location: index.php');
			}else {
	   		 $warnningStr =  '用户名或密码错误！';
		}
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="min/?f=skin/css/default.css,skin/css/bootstrap.css" />
	<script src="min/?f=skin/js/jquery-1.8.2.min.js,skin/js/bootstrap-alert.js"></script>
</head>
<body>
<form class="form-horizontal" method="post" target="">
      <fieldset class="loginForm">
	<legend class="cBlue">登录</legend>
	<div class="control-group">
	  <label for="input01" class="control-label">您的尊姓大名</label>
	  <div class="controls">
	    <input type="text" name="UserNameID" class="input-xlarge">
	    <p class="help-block">字母，数字，汉字皆可</p>
	  </div>
	</div>

	<div class="control-group">
	  <label for="input01" class="control-label">登录密码</label>
	  <div class="controls">
	    <input type="password" name="PasswordID" class="input-xlarge">
	    <p class="help-block">
	    	字母，数字，符号
	    </p>
	  </div>
	</div>
	<div class="controls">
              <label class="checkbox">
                <input type="checkbox" value="option1" id="CheckRemmemberID">
		记住密码
              </label>
    </div>
    <?php
    if($warnningStr !='' ){
	    $html = '<div class="alert alert-block alert-error fade in">'.
	            '<button data-dismiss="alert" class="close" type="button">×</button>'.
	            '<h4 class="alert-heading">操作有误！</h4>'.
	            '<p>'.$warnningStr.'</p>'.
	            '</div>';    
	    echo $html;	
    }
     ?>
    <div class="form-actions">
            <button class="btn btn-primary btn-large" type="submit">登录</button>
          </div>
      </fieldset>
    </form>
</body>
</html>