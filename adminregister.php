<?php
session_start();
header("content-type:text/html;charset=utf-8");
include 'dbconfig.php';
$username=$_POST['uname'];
$pwd=$_POST['password'];
$isadmin=$_POST['isadmin'];
$chargeblock=$_POST['chargeblock'];
$email=$_POST['emailaddress'];
$avatar=md5($_POST['emailaddress']);
$pdo = new PDO(DSN,ROOT,PASSWORD);

//放置默认头像
$source_name = "img/avatar/default.jpg";
$target_name = "img/avatar/" . md5($email) .  ".jpg";

if(file_exists($target_name)||!file_exists($source_name)){
 //echo "目标文件已经存在或者原始文件不存在。";
}else{
 @copy($source_name, $target_name)?'成功':'失败';
}
//echo "111";

//插入用户信息sql
$sql = "INSERT INTO user(uname, password, is_admin, email) VALUES('{$username}','{$pwd}','0','{$email}')";  //所有提权操作于数据库后台进行
//$sql = "insert into user(username,password,isadmin,email,avatar) values('{$username}','{$pwd}','0','{$email}','img/avatar/default.jpg')";
//判断重名
$selectsql="SELECT uname, is_admin FROM user WHERE uname='{$username}'";
$pdo->exec("set names utf8");
$smt = $pdo->query($selectsql);
$row=$smt->fetch(PDO::FETCH_ASSOC);
//判断重名
if($row['uname']==$username){
	echo "用户已存在";
	echo "<script>setTimeout(function(){location='index.php'},2000)</script>";
	exit();
}
if($row['is_admin']=='1'){
	echo "无权注册此用户";
	echo "<script>setTimeout(function(){location='index.php'},2000)</script>";
	exit();
}
if($pdo->exec($sql)){
	//无重名用户允许注册
	$sql1 = "SELECT uid, uname FROM user WHERE uname='{$username}'";
	//$pdo->exec("set names utf8");
	$smt = $pdo->prepare($sql1);
	$smt->execute();
	$rows= $smt->fetch();
	$uid=$rows['uid'];
	//echo $username.$uid;
	$sql2 = "INSERT INTO adminuser(uid, uname, charge_block, avatar) 
			 VALUES('{$uid}', '{$username}', '{$chargeblock}', '{$target_name}')";
	//$_SESSION['username']=$username;
	//$_SESSION['isadmin']=$isadmin;
	$pdo->exec("set names utf8");
	$pdo->exec($sql2);
	
	echo "<script>location='adminindex.php'</script>";
}


?>
