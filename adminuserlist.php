<?php
	include 'dbconfig.php';
	session_start();
	$pdo = new PDO(DSN,ROOT,PASSWORD);
	$uid = $_SESSION['uid'];
	$sql = "SELECT uid, uname, charge_block FROM adminuser 
			WHERE uid='{$uid}'";// 获取用户信息
	$smt = $pdo->prepare($sql);
	$smt->execute();
	$rows= $smt->fetch();
	if($rows)
	{
		$uname = $rows['uname'];
		$name = $rows['name'];
		$charge_block = $rows['charge_block'];
		$phone = $rows['phone'];
		//$name = substr_replace($rows['name'], '*', 0, 3);
		//$id_number = substr_replace($rows['id_number'], '**********', 4, 10);
		//$phone = substr_replace($rows['phone'], '******', 2, 5);
		$email = $_SESSION['email'];
	}
	//区域代码转换
	$sql = "SELECT * FROM blockarea 
			WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($charge_block));";
	$smt = $pdo->query($sql);
	//查询所有
	$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
	$arerstr = "";
	foreach($rows as $conunt=>$r){
		if($conunt <= 0){continue;} //跳过输出全国
		$arerstr = $arerstr.$r['block_name'];
		$blockrisk = $r['block_risk'];
		$suspected = $r['suspected'];
		$infected = $r['infected'];
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理设定</title>
	<link rel="stylesheet" href="css/admincss.css">
	<link rel="stylesheet" href="css/mdui.css">
<!--头部-->	
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-amber mdui-theme-accent-pink">
	<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-theme">
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}" id="toggle"><i class="mdui-icon material-icons">menu</i></span>
    <a href="index.php" class="mdui-typo-headline mdui-hidden-xs">管理设定</a>
    <div class="mdui-toolbar-spacer"></div>
  </div>
</header>
	<!--头部 end-->
	<div class="mdui-container">
		
		
		
	
		
		
		<!--侧边栏 -->
		<div class="mdui-drawer" id="main-drawer">
  			<ul class="mdui-list">
				
				<?php
				session_start();
				if($_SESSION['uname']){
					echo '<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: \'#geout\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" mdui-dialog="{target: \'#geout\'}">keyboard_return</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'logout.php\', \'_self\')" mdui-dialog="{target: \'#geout\'}">注销</div>';
					echo '</li>';
				}
				else{
					
				}
				?>		
				<li class="mdui-list-item mdui-ripple">
      			<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
				<div class="mdui-list-item-content" onclick="window.open('index.php', '_self')">回到首页</div>
				</li>
				<?php
					session_start();
				//登录状态
					if($_SESSION['uname']){
						echo '<li class="mdui-subheader"><a>欢迎回来&nbsp;&nbsp;&nbsp;</a>';
						echo $_SESSION['uname']; 
						echo '</li>';					
					}
					else{
						echo '<li class="mdui-subheader"><a>请登录，当前无权访问</a>';
					}
				?>			
    			<!--身份区分-->
				<?php
				session_start();
				//管理员
				if($_SESSION['is_admin']=='1'){
					echo '<li class="mdui-list-item mdui-ripple" id="admin" mdui-dialog="{target: \'#admin\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="admin" mdui-dialog="{target: \'#admin\'}">dashboard</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'admin.php\', \'_self\')" id="admin" mdui-dialog="{target: \'#admin\'}">管理中心</div>';
					echo '</li>';
					echo '<li class="mdui-list-item mdui-ripple" id="member" mdui-dialog="{target: \'#member\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member" mdui-dialog="{target: \'#member\'}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'adminuser.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">管理设定</div>';
					echo '</li>';
				}
				else if($_SESSION['is_admin']=='2'){
					echo '<li class="mdui-list-item mdui-ripple" id="admin" mdui-dialog="{target: \'#admin\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="admin" mdui-dialog="{target: \'#admin\'}">dashboard</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'admin.php\', \'_self\')" id="admin" mdui-dialog="{target: \'#admin\'}">管理中心</div>';
					echo '</li>';
					echo '<li class="mdui-list-item mdui-ripple" id="member" mdui-dialog="{target: \'#member\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member" mdui-dialog="{target: \'#member\'}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">管理设定</div>';
					echo '</li>';
				}
				//未登录，跳转
				else if($_SESSION['is_admin']=='0'){	
					echo '<li class="mdui-list-item mdui-ripple" id="member" mdui-dialog="{target: \'#member\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member" mdui-dialog="{target: \'#member\'}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">个人中心</div>';
					echo '</li>';
				}
				?>
				<li class="mdui-list-item mdui-ripple" onclick="window.open('adminuserlist.php', '_self')">
      			<i class="mdui-list-item-icon mdui-icon material-icons" onclick="window.open('adminuserlist.php', '_self')">people</i>
				<div class="mdui-list-item-content" onclick="window.open('adminuserlist.php', '_self')">居民情况</div>
				</li>

	
				<li class="mdui-list-item mdui-ripple"> 
      			<i class="mdui-list-item-icon mdui-icon material-icons">email</i>
				<div class="mdui-list-item-content"  onclick="window.open('mailto:xxxxxxxx@localhost.com', '_self')">联系我们</div>
				</li>
  			</ul>
		</div>
			</br></br></br>
			<?php
			session_start();
			if(!$_SESSION){
				echo "无权访问！";
				exit();
			}
			//echo "个人中心";
			session_start();
			
			echo "
			<div><img class='mdui-img-circle' src='" . $_SESSION['avatar']. "'/>
			</div>";
			echo "Hi，<div class=\"mdui-typo-title\">". $_SESSION['uname'] ."</div>";
			if($_SESSION['is_admin']=='1'){
				echo "<div class=\"mdui-typo-subheading-opacity\">管理员</div>";
			}
			else if($_SESSION['is_admin']=='2'){
				echo "<div class=\"mdui-typo-subheading-opacity\">防疫人士</div>";
			}
			else
			{
				echo "<div class=\"mdui-typo-subheading-opacity\">居民</div>";;
				echo "<script>location='user.php'</script>";
			}
			?>
				
				</br></br></br><div class='mdui-typo-body-1'>本辖区居民如下（经已脱敏化处理，可通过转接平台联系用户）：</div></br>
				<!--查看居民信息-->
					<table width=900 border=1 style="border-collapse:collapse" cellspacing="0" cellpadding="6px" class="table-select-uer mdui-table mdui-table-hoverable">
					<thead>
					<tr>
						<th>uid</th>
						<th>用户名</th>
						<th>姓名</th>
						<th>电子邮箱</th>
						<th>联系电话</th>
						<th>健康状况</th>
						<th>信息更新时间</th>
					</tr>
					</thead>
					<tbody>
					<?php
						//读取居民情况
						$sql = "SELECT uid, uname, name, phone, email, infection, update_time FROM userinfo 
								WHERE now_block='$charge_block'
								ORDER BY uid;";
						$smt = $pdo->query($sql);
						//查询所有
						$rows =$smt->fetchAll(PDO::FETCH_ASSOC);

						//echo "<td>{$uid}</td>";
						foreach($rows as $r){
							$r['name'] = substr_replace($r['name'], '**', 3);
							$r['phone'] = substr_replace($r['phone'], '*****', 3, 5);
							echo "<tr>";
							echo "<td>{$r['uid']}</td>";
							echo "<td>{$r['uname']}</td>";
							echo "<td>{$r['name']}</td>";
							echo "<td>{$r['email']}</td>";
							echo "<td>{$r['phone']}</td>";
							if($r['infection'] == '0'){
								echo "<td>健康</td>";
							}
							else if($r['infection'] == '1'){
								echo "<td>疑似病例</td>";
							}
							else if($r['infection'] == '2'){
								echo "<td>确诊病例</td>";
							}
							else{
								echo "<td>未知</td>";
							}
							echo "<td>{$r['update_time']}</td>";
							echo "</tr>";
						}
					
					?>
						</tbody>
				</table>

			
			<!--</br></br></br>
			<form action="avatarupload.php" method="post" enctype="multipart/form-data"> 			       
        			<div class="mdui-typo-body-1">请选择你的头像</div></br>
					<input type="file" name="file" id="file" accept="image/pjpeg,image/gif,image/png"/></br></br>
					<a href=><button type="reset" class="mdui-btn mdui-btn-raised mdui-ripple">下载头像</button>
					<button type="reset" class="mdui-btn mdui-btn-raised mdui-ripple">重新选择</button>
					<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">修改头像</button>
     
 
			</form>-->
			</br></br></br></br>
			


	
  </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/mdui.js"></script>

</html>


<?php
/*header("content-type:text/html;charset=utf-8");
session_start();
if(!$_SESSION){
	echo "无权访问！";
	exit();
}
echo "个人中心:";
session_start();
echo "欢迎，" . $_SESSION['username'];*/
?>