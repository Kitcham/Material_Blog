<?php
session_start();
header("content-type:text/html; charset=utf-8");
include 'dbconfig.php';
$username = $_POST['uname'];
$pwd = $_POST['password'];
$isadmin = $_POST['isadmin'];
$email = $_POST['emailaddress'];
$pdo = new PDO(DSN,ROOT,PASSWORD);
$source_name = "img/avatar/default.jpg";
$target_name = "img/avatar/" . md5($email) .  ".jpg";

if(file_exists($target_name)||!file_exists($source_name)){
 echo
"目标文件已经存在或者原始文件不存在。";
}else{
 @copy($source_name,$target_name)?'成功':'失败';
}

?>