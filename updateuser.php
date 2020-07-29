

<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION){
	echo "无权访问！";
	exit();
}
include 'dbconfig.php';
$username=$_GET['uname'];
echo $username;
$pdo = new PDO(DSN,ROOT,PASSWORD);
$selectsql="SELECT username FROM user WHERE username='{$username}'";
$sql = "UPDATE user SET isadmin='1' WHERE username='{$username}'";
$smt = $pdo->query($selectsql);
$row = $smt->fetch();
if(!$row['username'] || $row['username']==""){
	echo "<span style='position:absolute;width:100px;height:60px;background:#000;color:#fff'>修改的用户不存在！</span>";
	echo "<script>setTimeout(function(){location='admin.php'},2000)</script>";
}else{
	if($pdo->exec($sql)){
		
	$_SESSION['isadmin']=$isadmin;
		echo "<span style='position:absolute;width:100px;height:60px;background:#000;color:#fff'>修改成功！</span>";
		echo "<script>setTimeout(function(){location='admin.php'},2000)</script>";
	}

}
?>