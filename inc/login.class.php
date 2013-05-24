<?php
/*
 * Created on 2010-7-22
 * File Name: check_user.php
 * Design By heshimeng
 * QQ:279020623 E-mail:heshimeng1987@163.com OR heshimeng1987@qq.com
 */
class user {

           private $userid;
           private $usershell;
           public  $userInfor;


           function __construct($userid,$usershell,$db){

           $this->userid = $userid;
           $this->usershell = $usershell;


           $this->check_shell();

           }
           public function check_shell(){
           $dbuser = $db->select_array('user', '*', 'id = '. $this->userid);
           $dbusershell = $dbuser['username'].$dbuser['password'].USERSHELL;
            ehco 
           if($this->usershell != $dbusershell){
              //header('Location: login.php');
           }else{
           	$this->userInfor = $dbuser;
           }
           }
}
?>
