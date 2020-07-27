<?php
header("content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION){
	echo "无权访问！";
	exit();
}
//$uid = $_SESSION['uid'];
$uid = $_POST['uid'];
include 'dbconfig.php';
$name = $_POST['name'];
$id_number = $_POST['id_number'];
$phone = $_POST['phone'];
$now_block = $_POST['now_block'];
$infection = $_POST['infection'];
//echo $now_block.$name.$phone.$name.$infection;

$pdo = new PDO(DSN,ROOT,PASSWORD);

$selectsql="SELECT infection FROM userinfo WHERE uid='{$uid}'";
$pdo->exec("set names utf8");
$smt = $pdo->prepare($selectsql);
$smt->execute();
$rows= $smt->fetch();
if($rows)
{
	$tempInfection = $rows['infection'];
}

//修改用户sql
$sql = "UPDATE userinfo SET name='{$name}', id_number='{$id_number}', phone='{$phone}', now_block='{$now_block}', infection='{$infection}' 
		WHERE uid='{$uid}'";

if($pdo->exec($sql)){
	//echo "<script>location='user.php'</script>";
	echo "success";
}else{
	echo "sorry";
}

//echo "情况：".$tempInfection;

//echo "开始分级累加";
//分级累加 开始
if($tempInfection == '0') //原来为健康
{
	if($infection == '0'){
		;
	}
	else if($infection == '1'){
		//疑似+1
		$sql = "SELECT suspected, infected, block_id FROM blockarea
				WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
		$smt = $pdo->query($sql);
			//查询所有
		$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $r){
			$r['suspected'] = $r['suspected'] + 1;
			$sql = "UPDATE blockarea SET suspected='{$r['suspected']}' 
					WHERE block_id='{$r['block_id']}'";
			$pdo->exec($sql);
		}
	}
	else{
		//确诊+1
		$sql = "SELECT suspected, infected, block_id FROM blockarea
				WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
		$smt = $pdo->query($sql);
			//查询所有
		$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $r){
			$r['infected'] = $r['infected'] + 1;
			$sql = "UPDATE blockarea SET infected='{$r['infected']}' 
					WHERE block_id='{$r['block_id']}'";
			$pdo->exec($sql);
		}
	}
}

else if($tempInfection == '1'){  //原来为疑似
	if($infection == '0'){
		//疑似-1
		$sql = "SELECT suspected, infected, block_id FROM blockarea
				WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
		$smt = $pdo->query($sql);
			//查询所有
		$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $r){
			$r['suspected'] = $r['suspected'] - 1;
			$sql = "UPDATE blockarea SET suspected='{$r['suspected']}' 
					WHERE block_id='{$r['block_id']}'";
			$pdo->exec($sql);
		}
	}
	else if($infection == '1'){
		;
	}
	else{
		//疑似-1，确诊+1
		$sql = "SELECT suspected, infected, block_id FROM blockarea
				WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
		$smt = $pdo->query($sql);
			//查询所有
		$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $r){
			$r['suspected'] = $r['suspected'] - 1;
			$r['infected'] = $r['infected'] + 1;	
			$sql = "UPDATE blockarea SET suspected='{$r['suspected']}', infected='{$r['infected']}' 
					WHERE block_id='{$r['block_id']}'";
			$pdo->exec($sql);
		}
	}
}
else{ //原来为确诊
	if($infection == '0'){
		//确诊-1
		$sql = "SELECT suspected, infected, block_id FROM blockarea
				WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
		$smt = $pdo->query($sql);
			//查询所有
		$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $r){
			$r['infected'] = $r['infected'] - 1;	
			$sql = "UPDATE blockarea SET infected='{$r['infected']}' 
					WHERE block_id='{$r['block_id']}'";
			$pdo->exec($sql);
		}
	}
	else if($infection == '1'){
		//确诊-1，疑似+1
		$sql = "SELECT suspected, infected, block_id FROM blockarea
				WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
		$smt = $pdo->query($sql);
			//查询所有
		$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
		foreach($rows as $r){
			$r['infected'] = $r['infected'] - 1;	
			$r['suspected'] = $r['suspected'] + 1;
			$sql = "UPDATE blockarea SET suspected='{$r['suspected']}', infected='{$r['infected']}'
					WHERE block_id='{$r['block_id']}'";
			$pdo->exec($sql);
		}
	}
	else{
		;
	}
}
//分级累加 结束

//检测是否提高风险
	/*暂定标准
		街道一级有1个疑似病例即为中风险，1个确诊病例即为高风险
		其余级别暂未实现
		"0"为低风险区域，“1”为中风险区域，“2”为高风险区域
	*/ 
$sql = "SELECT suspected, infected, block_id FROM blockarea;";
$smt = $pdo->query($sql);
//查询所有
$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $r){
	if(($r['infected'] < 1) && ($r['suspected'] < 1)){
		$sql = "UPDATE blockarea SET block_risk='0' 
				WHERE block_id='{$r['block_id']}' AND block_level='4'";
		$pdo->exec($sql);
	}
	else if(($r['infected'] < 1) && ($r['suspected'] >= 1))
	{
		$sql = "UPDATE blockarea SET block_risk='1' 
				WHERE block_id='{$r['block_id']}' AND block_level='4'";
		$pdo->exec($sql);
	}
	else{
		$sql = "UPDATE blockarea SET block_risk='2' 
				WHERE block_id='{$r['block_id']}' AND block_level='4'";
		$pdo->exec($sql);
	}
}

//检测是否提高风险 结束
echo "<script>location='user.php'</script>";
?>