<?php
session_start();
header("content-type:text/html;charset=utf-8");
	session_start();
	///$source_name = "img/avatar/default.jpg";
	//$target_name = "image/bg1.jpg";
	$target_name = $_SESSION['avatar'];
	//上传头像处理
	//限制上传.gif 或 .jpeg 类型图片
	
	if (true)
	{
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		} 
		else {	
			if (!file_exists($target_name)){
				echo "原头像不存在！";
			}
			else {
				unlink($target_name)?'成功':'失败';
				//echo "成功";
	     	}
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_name);
		/* $icon_tem = "image/" . $_FILES["file"]["name"];
		$icon_arr = array("$icon_tem");
		$icon = implode($icon_arr);
		$name = $_POST['name'];
		*/
		}
	}
	//echo $target_name;
	echo "<script>location='user.php'</script>";
?>
			