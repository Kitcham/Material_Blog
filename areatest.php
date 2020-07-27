<?php
header("content-type:text/html;charset=utf-8");
session_start();
echo "1111";

include 'dbconfig.php';
$pdo = new PDO(DSN,ROOT,PASSWORD);
$sql = "SELECT * FROM blockarea WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp(57));";
$smt = $pdo->query($sql);
//查询所有
$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
$arerstr = "";
foreach($rows as $conunt=>$r){
	if($conunt <= 0){continue;} //跳过输出全国
	$arerstr=$arerstr.$r['block_name'];
}
echo $arerstr;
//修改用户sql
//$sql = "update user set password='{$pwd}',isadmin='{$isadmin}' where id='{$uname}'";
/*$sql = "UPDATE userinfo SET name='{$name}', id_number='{$id_number}', phone='{$phone}', now_block='{$now_block}', infection='{$infection}' 
		WHERE uid='{$uid}'";

if($pdo->exec($sql)){
	echo "<script>location='user.php'</script>";
	echo "success";
}else{
	echo "sorry";
}
$name = $_POST['name'];
$id_number = $_POST['id_number'];
$phone = $_POST['phone'];
$now_block = $_POST['now_block'];
$infection = $_POST['infection'];*/
?>