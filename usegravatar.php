<?php
session_start();
header("content-type:text/html;charset=utf-8");
	session_start();
	$target_name = $_SESSION['avatar'];
	$email = md5($_SESSION['email']);
	//Gravatarapi，对邮箱进行md5运算
	file_put_contents("img/avatar/$email.jpg",file_get_contents("http://cn.gravatar.com/avatar/$email"));
	///$source_name = "img/avatar/default.jpg";
	//$target_name = "image/bg1.jpg";
	echo "$email";
	echo "<script>location='user.php'</script>";
?>
			