<?php
	include 'dbconfig.php';
	session_start();
	$pdo = new PDO(DSN,ROOT,PASSWORD);
	$uid = $_SESSION['uid'];
	$sql = "SELECT uid, uname, name, id_number, phone, email, now_block, infection FROM userinfo WHERE uid='{$uid}'";// 获取用户信息
	$smt = $pdo->prepare($sql);
	$smt->execute();
	$rows= $smt->fetch();
	if($rows)
	{
		$uname = $rows['uname'];
		$name = $rows['name'];
		$id_number = $rows['id_number'];
		$phone = $rows['phone'];
		//$name = substr_replace($rows['name'], '*', 0, 3);
		//$id_number = substr_replace($rows['id_number'], '**********', 4, 10);
		//$phone = substr_replace($rows['phone'], '******', 2, 5);
		$email = $rows['email'];
		$now_block = $rows['now_block'];
		$infection = $rows['infection'];
	}
	//区域代码转换
	$sql = "SELECT * FROM blockarea WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($now_block));";
	$smt = $pdo->query($sql);
	//查询所有
	$rows = $smt->fetchAll(PDO::FETCH_ASSOC);
	$arerstr = "";
	foreach($rows as $conunt=>$r){
		if($conunt <= 0){continue;} //跳过输出全国
		$arerstr=$arerstr.$r['block_name'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人中心</title>
	<link rel="stylesheet" href="css/admincss.css">
	<link rel="stylesheet" href="css/mdui.css">
<!--头部-->	
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-amber mdui-theme-accent-pink">
	<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-theme">
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}" id="toggle"><i class="mdui-icon material-icons">menu</i></span>
    <a href="index.php" class="mdui-typo-headline mdui-hidden-xs">个人中心</a>
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
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">个人中心</div>';
					echo '</li>';
				}
				else if($_SESSION['is_admin']=='2'){
					echo '<li class="mdui-list-item mdui-ripple" id="admin" mdui-dialog="{target: \'#admin\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="admin" mdui-dialog="{target: \'#admin\'}">dashboard</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'admin.php\', \'_self\')" id="admin" mdui-dialog="{target: \'#admin\'}">管理中心</div>';
					echo '</li>';
					echo '<li class="mdui-list-item mdui-ripple" id="member" mdui-dialog="{target: \'#member\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member" mdui-dialog="{target: \'#member\'}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">个人中心</div>';
					echo '</li>';
				}
				//未登录，跳转
				else if($_SESSION['is_admin']=='0'){	
					echo '<li class="mdui-list-item mdui-ripple" id="member"}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member"}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member"}">个人中心</div>';
					echo '</li>';
				}
				?>

	
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
				echo "<script>location='adminuser.php'</script>";
			}
			else if($_SESSION['is_admin']=='2'){
				echo "<div class=\"mdui-typo-subheading-opacity\">防疫人士</div>";
				echo "<script>location='epidemicindex.php'</script>";
			}
			else
			{
				echo "<div class=\"mdui-typo-subheading-opacity\">居民</div>";;
			}
			?>
				
				</br></br></br><div class='mdui-typo-body-1'>您的个人信息如下：</div></br>
				<!--查看用户信息-->
					<table width=900 border=1 style="border-collapse:collapse" cellspacing="0" cellpadding="6px" class="table-select-uer mdui-table mdui-table-hoverable">
					<thead>
					<tr>
						<!--<th>uid</th>-->
						<th>用户名</th>
						<th>姓名</th>
						<th>证件号</th>
						<th>电子邮箱</th>
						<th>联系电话</th>
						<th>所在片区</th>
						<th>健康状况</th>
					</tr>
					</thead>
					<tbody>
					<?php
						//echo "<td>{$uid}</td>";
						echo "<td>{$uname}</td>";
						echo "<td>{$name}</td>";
						echo "<td>{$id_number}</td>";
						echo "<td>{$email}</td>";
						echo "<td>{$phone}</td>";
						echo "<td>{$arerstr}</td>";
						if($infection == '0'){
							echo "<td>健康</td>";
						}
						else if($infection == '1'){
							echo "<td>疑似病例</td>";
						}
						else{
							echo "<td>确诊病例</td>";
						}
						
					?>
						</tbody>
				</table>

				<?php
	
				?>
				</br></br></br><div class='mdui-typo-body-1'>我的足迹：</div></br>
				<!--查看足迹-->
					<table width=900 border=1 style="border-collapse:collapse" cellspacing="0" cellpadding="6px" class="table-select-uer mdui-table mdui-table-hoverable">
					<thead>
					<tr>
						<!--<th>uid</th>-->
						<th>序号</th>
						<th>到访片区</th>
						<th>到访时间</th>
					</tr>
					</thead>
					<tbody>
					<?php
						include 'dbconfig.php';
						session_start();
						$pdo = new PDO(DSN,ROOT,PASSWORD);
						$pdo1 = new PDO(DSN,ROOT,PASSWORD);
						$uid = $_SESSION['uid'];
						$sql = "SELECT id, uid, active_block, active_time 
								FROM track 
								WHERE uid='{$uid}'";// 获取用户信息
						$smt = $pdo->query($sql);
						$rows =$smt->fetchAll(PDO::FETCH_ASSOC);
						$count =  0;
						foreach($rows as $r){
							echo "<tr>";
							$count = $count + 1;
							echo "<td>$count</td>";
							$blocktocheck = $r['active_block'];
							///区域代码转换
							$sql1 = "SELECT * FROM blockarea WHERE FIND_IN_SET(block_id,queryChildrenAreaInfoUp($blocktocheck));";
							$smt = $pdo1->query($sql1);
							//查询所有
							$rows1 = $smt->fetchAll(PDO::FETCH_ASSOC);
							$arerstr = "";
							foreach($rows1 as $conunt1=>$r1){
								if($conunt1 <= 0){continue;} //跳过输出全国
								$arerstr=$arerstr.$r1['block_name'];
							}
							echo "<td>{$arerstr}</td>";
							echo "<td>{$r['active_time']}</td>";
							echo "</tr>";
						}
					?>
						</tbody>
				</table>

			<?php
			echo "</br></br></br>
					<form action='avatarupload.php' method='post' enctype='multipart/form-data'> 			       
        			<div class='mdui-typo-body-1'>请选择你的头像</div></br>
					<input type='file' name='file' id='file' accept='image/pjpeg,image/gif,image/png'/></br></br>
					<button type='reset' class='mdui-btn mdui-btn-raised mdui-ripple'><a href= '". $_SESSION['avatar'] ."' download='avatar.jpg'>下载头像</button></a>
					<button type='reset' class='mdui-btn mdui-btn-raised mdui-ripple'>重新选择</button>
					<button class='mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent'>修改头像</button>
     
 
			</form>";
			//echo "欢迎，" . $_SESSION['username'];
			?>
			<?php
				echo"</br><form action='usegravatar.php' method='post' enctype='multipart/form-data'>";
				echo "<button class='mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent'>使用 gravatar</button>";
				//file_put_contents("img/avatar/a.jpg",file_get_contents("http://cn.gravatar.com/avatar/e23163bb2fc9da09505510cc1e5c02ee"));
				echo"</form>";
			?>
			</br></br></br><div class='mdui-typo-body-1'>如需修改，请在下列表格填写：</div>
			<?php
			echo "<div class='m'>
				  <form action='updateuserinfo.php' method='post'>	
				  	<div class='mdui-textfield'>
						  <input class='mdui-textfield-input' name='uid' value='{$_SESSION['uid']}' type = 'hidden' required/></input>
					</div>
					<div class='mdui-textfield'>
  						<label class='mdui-textfield-label'>姓名</label>
						  <input class='mdui-textfield-input' name='name' value='{$name}' required/></input>
						  <div class='mdui-textfield-error'>姓名不能为空</div>
					</div>
					<div class='mdui-textfield'>
  						<label class='mdui-textfield-label'>证件号</label>
  						<input class='mdui-textfield-input' name='id_number' value='{$id_number}' required/></input>
						<div class='mdui-textfield-error'>证件号不能为空</div>
					</div>
					<div class='mdui-textfield'>
  						<label class='mdui-textfield-label'>联系电话</label>
						<input class='mdui-textfield-input' name='phone' value='{$phone}' required/></input>
						<div class='mdui-textfield-error'>联系电话不能为空</div>
					</div>
					<div class='mdui-textfield'>
  						<label class='mdui-textfield-label'>所在片区</label>
						<input class='mdui-textfield-input' name='now_block' value='{$now_block}' required/></input>
						<div class='mdui-textfield-error'>所在片区不能为空</div>
						<div class='mdui-textfield-helper'>请输入片区 代码</div>
					</div>
					<div class='mdui-textfield'>
						<label class='mdui-textfield-label'>健康状况</label>
						<input class='mdui-textfield-input' name='infection' value='{$infection}' required/></input>
						<div class='mdui-textfield-error'>健康状况不能为空</div>
						<div class='mdui-textfield-helper'>“0”为健康，“1”为疑似病例，“2”为确诊病例</div>
					</div>
					</br>  
					<div>
  						<button type='submit' class='mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple change'>修改信息</button>
					</div>
					</form>
			</div>"
			?>
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