<?php 
include("inc/global.php");
if($_POST['action']=='check'){
	$db->query('select * from user where username=\''.$_POST['username'].'\'');
	echo $db->db_num_rows();
 exit();
}
if($_POST['username']!=''&&$_POST['password']!=''){
	$db->insert('user','username,password','\''.$_POST['username'].'\',\''.$_POST['password'].'\'');
	if($db->db_affected_rows()>0){
		$_SESSION['userid'] = $db->insert_id();
		header('Location: index.php');
	}
}
?>
<?php
	include('template/header.php');
?>
<style>
 .form-register {
        width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-register .form-register-heading,
      .form-register .checkbox {
        margin-bottom: 10px;
      }
      .form-register input[type="text"],
      .form-register input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
        }	
       .alert{margin-top: 15px;}
</style>
<form class="form-register" method="post">
<h2 class="form-register-heading">注册</h2>
<input type="text" name="username" id="username" class="input-block-level" required pattern=".{2,12}" placeholder="账号/支持中文">
<input name="password" type="password" id="psw1" class="input-block-level" required pattern=".{4,12}" placeholder="密码">
<input type="password" id="psw2" class="input-block-level" required pattern=".{4,12}" placeholder="确认密码">
<button class="btn btn-large btn-primary" type="submit">注册</button>
<script>
	$('.form-register').bind('submit',function () {
		if($('#psw1').val()!=$('#psw2').val()){
			$('#psw2')[0].setCustomValidity("密码不一致！");  
           return false;  
		}
	});
	$('#username').bind('blur',function(){
		var that = this;
		$.ajax({
			url:'register.php',
			type:'post',
			data:{username:$(this).val(),action:'check'},
			success:function(code){
				if(code!='0')
				that.setCustomValidity('用户已经存在');
			}
		})
	});
</script>
</form>
<?php
	include('template/footer.php');
?>