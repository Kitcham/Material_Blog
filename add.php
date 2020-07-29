<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION){
	echo "无权访问！";
	exit();
}
include 'dbconfig.php';
$username=$_POST['uname'];
$pwd=$_POST['password'];
$email=$_POST['emailaddress'];
$avatar=md5($_POST['emailaddress']);

$source_name = "img/avatar/default.jpg";
$target_name = "img/avatar/" . md5($email) .  ".jpg";

if(file_exists($target_name)||!file_exists($source_name)){
 echo "目标文件已经存在或者原始文件不存在。";
}
else{
 @copy($source_name,$target_name)?'成功':'失败';
}

$pdo = new PDO(DSN,ROOT,PASSWORD);
//插入用户信息sql
$sql = "INSERT INTO user(username,password,isadmin,email,avatar) VALUES('{$username}','{$pwd}','0','{$email}','{$target_name}')";
//重名检测
$selectsql="SELECT username FROM user WHERE username='{$username}'";
$smt = $pdo->query($selectsql);
$row = $smt->fetch(PDO::FETCH_ASSOC);
//判断重名
if($row['username']==$username){
	echo "用户已存在";
	echo "<script>setTimeout(function(){location='admin.php'},2000)</script>";
	exit();
}else{
	//无重名用户允许注册
	$pdo->exec($sql);

	echo "<script>location='admin.php'</script>";
}
?>