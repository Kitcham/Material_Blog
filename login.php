<?php
header("content-type:text/html;charset=utf-8");
session_start();
include 'dbconfig.php';
$username=$_POST['uname'];
$pwd=$_POST['password'];
$pdo = new PDO(DSN,ROOT,PASSWORD);
$sql = "SELECT uid, uname, is_admin, email FROM user WHERE uname='{$username}' AND password='{$pwd}'";// and is_admin=1 管理员登录
$smt = $pdo->prepare($sql);
$smt->execute();
$rows= $smt->fetch();
$uid=$rows['uid'];
$email=$rows['email'];
//echo $uid;

if($rows){
	$_SESSION['is_admin']=$rows['is_admin'];
	if($_SESSION['is_admin'] == '0'){
		$sql1 = "SELECT uid, uname, name, email, avatar FROM userinfo
		 	  	 WHERE uid='{$uid}'";// and isadmin=1 管理员登录
		$smt1 = $pdo->prepare($sql1);
		$smt1->execute();
		$rows1= $smt1->fetch();
		if($rows1){
			$_SESSION['uid']=$rows1['uid'];
			$_SESSION['uname']=$rows1['uname'];
			//$_SESSION['name']=$rows1['name'];
			//$_SESSION['id_number']=$rows1['id_number'];
			//$_SESSION['phone']=$rows1['phone'];
			$_SESSION['email']=$rows1['email'];
			//$_SESSION['now_block']=$rows1['now_block'];
			//$_SESSION['infection']=$rows1['infection'];
			$_SESSION['avatar']=$rows1['avatar'];
			echo "<script>location='index.php'</script>";
		}
		else{
			echo "不存在个人信息";
		}
	}
	else if($_SESSION['is_admin'] == '1'){
		$sql1 = "SELECT uid, uname, charge_block, avatar FROM adminuser
		 	  	 WHERE uid='{$uid}'";// and isadmin=1 社区管理员登录
		$smt1 = $pdo->prepare($sql1);
		$smt1->execute();
		$rows1= $smt1->fetch();
		if($rows1){
			$_SESSION['uid']=$rows1['uid'];
			$_SESSION['uname']=$rows1['uname'];
			//$_SESSION['name']=$rows1['name'];
			//$_SESSION['id_number']=$rows1['id_number'];
			//$_SESSION['phone']=$rows1['phone'];
			$_SESSION['email']=$email;
			//$_SESSION['now_block']=$rows1['now_block'];
			//$_SESSION['infection']=$rows1['infection'];
			$_SESSION['avatar']=$rows1['avatar'];
			echo "<script>location='adminindex.php'</script>";
		}
		else{
			echo "不存在该管理员信息";
		}
	}
	else if($_SESSION['is_admin'] == '2'){
		$sql1 = "SELECT uid, uname, charge_block, avatar FROM adminuser
		 	  	 WHERE uid='{$uid}'";// and isadmin=2 防疫人士登录
		$smt1 = $pdo->prepare($sql1);
		$smt1->execute();
		$rows1= $smt1->fetch();
		if($rows1){
			$_SESSION['uid']=$rows1['uid'];
			$_SESSION['uname']=$rows1['uname'];
			//$_SESSION['name']=$rows1['name'];
			//$_SESSION['id_number']=$rows1['id_number'];
			//$_SESSION['phone']=$rows1['phone'];
			$_SESSION['email']=$email;
			//$_SESSION['now_block']=$rows1['now_block'];
			//$_SESSION['infection']=$rows1['infection'];
			$_SESSION['avatar']=$rows1['avatar'];
			echo "<script>location='adminindex.php'</script>";
		}
		else{
			echo "不存在该防疫人员信息";
		}
	}
	else{
		;
	}
	
	
	
	//echo $_SESSION['uname'];
	echo "<script>location='index.php'</script>";
	//echo $_SESSION['id'].$_SESSION['uname'].$_SESSION['name'].$_SESSION['id_number'].$_SESSION['phone'].$_SESSION['now_block'].$_SESSION['infection'].$_SESSION['avatar'];
}
else{
	echo "用户名或密码错误！";
	echo $rows['is_admin'];
	//echo "<script>setTimeout(function(){location='index.php'},2000)</script>";
}
?>