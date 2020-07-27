<?php
session_start();
header("content-type:text/html;charset=utf-8");
include 'dbconfig.php';
$username=$_POST['uname'];
$pwd=$_POST['password'];
$isadmin=$_POST['isadmin'];
$email=$_POST['emailaddress'];
$avatar=md5($_POST['emailaddress']);
$pdo = new PDO(DSN,ROOT,PASSWORD);


//放置默认头像
$source_name = "img/avatar/default.jpg";
$target_name = "img/avatar/" . md5($email) .  ".jpg";

if(file_exists($target_name)||!file_exists($source_name)){
 echo "目标文件已经存在或者原始文件不存在。";
}else{
 @copy($source_name,$target_name)?'成功':'失败';
}

//插入用户信息sql
$sql = "insert into user(username,password,isadmin,email,avatar) values('{$username}','{$pwd}','0','{$email}','{$target_name}')";
//$sql = "insert into user(username,password,isadmin,email,avatar) values('{$username}','{$pwd}','0','{$email}','img/avatar/default.jpg')";
//判断重名
$selectsql="select username,isadmin from user where username='{$username}'";
$pdo->exec("set names utf8");
$smt = $pdo->query($selectsql);
$row=$smt->fetch(PDO::FETCH_ASSOC);
//判断重名
if($row['isadmin']==$username){
	echo "用户已存在";
	echo "<script>setTimeout(function(){location='index.php'},2000)</script>";
	exit();
}
if($row['isadmin']=='1'){
	echo "无权注册此用户";
	echo "<script>setTimeout(function(){location='index.php'},2000)</script>";
	exit();
}
if($pdo->exec($sql)){
	//无重名用户允许注册
	$_SESSION['username']=$username;
	$_SESSION['isadmin']=$isadmin;
	echo "<script>location='index.php'</script>";
}

?>