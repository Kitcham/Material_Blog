<?php

header("content-type:text/html;charset=utf-8");
session_start();
include 'dbconfig.php';
// $username=$_POST['uname'];
$username=$_POST['uname'];
$pwd=$_POST['password'];
//$isadmin=$_POST['isadmin'];

$pdo = new PDO(DSN,ROOT,PASSWORD);
//$selectsql="select password from user where id='{$uid}'";
$selectsql="SELECT password FROM user WHERE username='{$username}'";
//修改用户sql
//$sql = "update user set password='{$pwd}',isadmin='{$isadmin}' where id='{$uname}'";
$sql = "UPDATE user SET password='{$pwd}' WHERE username='{$username}'";
$smt=$pdo->query($selectsql);
$row=$smt->fetch();
if($row['password']===$pwd){
	echo "fail";
	exit();
}
if($pdo->exec($sql)){
	//$_SESSION['isadmin']=$isadmin;
	echo "success";
}
?>