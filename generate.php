<?php
header("content-type:text/html;charset=utf-8");
include 'dbconfig.php';
$pdo = new PDO(DSN,ROOT,PASSWORD);
$sql = "SELECT id, title, autho, addtime, content FROM article";
//$sql = "select * from article where id='{$articleid}'";
$smt = $pdo->query($sql);
$rows=$smt->fetchAll(PDO::FETCH_ASSOC);

echo "开始生成";
if($rows){
	echo "正在生成". $articleid;
	echo "<pre>";
	foreach ($rows as $r) {
	$htmltitle=$r['title'];
    $htmlcontent=$r['content'];
	$htmlautho=$r['autho'];
	$htmladdtime=$r['addtime'];
    $htmlpath="html/article_".($r['id']).".html";
		
	//echo $r['title'].$r['autho'].$r['addtime'].$r['content'];

    //替换example内容，并获取内容赋值给$str
    $fp=fopen("templatel.html","r");
    $htmlstr=fread($fp,filesize("templatel.html"));
		
    $htmlstr=str_replace("{title}",$htmltitle,$htmlstr);
	$htmlstr=str_replace("{autho}",$htmlautho,$htmlstr);
    $htmlstr=str_replace("{addtime}",$htmladdtime,$htmlstr);
	$htmlstr=str_replace("{content}",$htmlcontent,$htmlstr);
    fclose($fp);
	//echo $htmlstr;
    //新建空白文件，将$str写入
    $handle=fopen($htmlpath,"w") or die("Unable to open file!");
    fwrite($handle,$htmlstr);
    fclose($handle);

    echo "生成".$htmlpath."<br/>";
		}
}	
echo "生成完毕";
?>
