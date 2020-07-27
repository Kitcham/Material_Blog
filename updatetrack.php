<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION){
	echo "无权访问！";
	exit();
}

include 'dbconfig.php';
$pdo = new PDO(DSN,ROOT,PASSWORD);
$block_id = $_POST['block_id'];
$visit_uid = $_POST['visit_uid'];
$sql = "INSERT INTO track(uid, active_block, active_time)
 	    VALUES('{$visit_uid}','{$block_id}', now())";
if($pdo->exec($sql)){
	//echo $block_id;
	//echo $visit_uid;
	echo "<script>location='admin.php'</script>";
}
else{
	echo "sorry";
}

?>