<?php
header("content-type:text/html;charset=utf-8");
include 'dbconfig.php';
$pdo = new PDO(DSN,ROOT,PASSWORD);
//时间顺序排列，新的在前
$sql="select * from article order by addtime desc";
$smt=$pdo->query($sql);
$rows=$smt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
?>