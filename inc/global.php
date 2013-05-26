<?php
session_start();
include("config.inc.php"); //
include("mysql.class.php"); //引入数据库类文件
include ('action.inc.php');


// if($_SESSION['userid']==''){
// 	header('Location: login.php');
// }

/*实例化类：*/
$db=new mysql($db_host,$db_user,$db_pwd,$db_database,"conn","utf8");
if($_SESSION['userid']!=''){
$dbuser = $db->select_array('user', '*', 'id = '.$_SESSION['userid']);
$dbusershell = $dbuser['username'].$dbuser['password'].USERSHELL;	
}


if($_SESSION['usershell'] != $dbusershell){
  
}
?>