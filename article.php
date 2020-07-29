<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION){
	echo "无权访问！";
	exit();
}

include 'dbconfig.php';
$pdo = new PDO(DSN,ROOT,PASSWORD);
$title = $_POST['title'];
$content = $_POST['content'];
$autho = $_SESSION['username'];
$email = $_SESSION['email'];
$sql = "INSERT INTO article(title,content,addtime,autho,email) VALUES('{$title}','{$content}',now(),'{$autho}','{$email}')";
if($pdo->exec($sql)){
	echo "<script>location='admin.php'</script>";
}else{
	echo "sorry";
}

?>