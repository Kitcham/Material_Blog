
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
				if($_SESSION['username']){
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
					if($_SESSION['username']){
						echo '<li class="mdui-subheader"><a>欢迎回来&nbsp;&nbsp;&nbsp;</a>';
						echo $_SESSION['username']; 
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
				if($_SESSION['isadmin']=='1'){
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
				else if($_SESSION['isadmin']=='0'){	
					echo '<li class="mdui-list-item mdui-ripple" id="member" mdui-dialog="{target: \'#member\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member" mdui-dialog="{target: \'#member\'}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">个人中心</div>';
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
			echo "Hi，<div class=\"mdui-typo-title\">". $_SESSION['username'] ."</div>";
			if($_SESSION['isadmin']=='1'){
				echo "<div class=\"mdui-typo-subheading-opacity\">管理员</div>";
			}
			else
			{
				echo "<div class=\"mdui-typo-subheading-opacity\">订阅者</div>";;
			}
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
			<!--</br></br></br>
			<form action="avatarupload.php" method="post" enctype="multipart/form-data"> 			       
        			<div class="mdui-typo-body-1">请选择你的头像</div></br>
					<input type="file" name="file" id="file" accept="image/pjpeg,image/gif,image/png"/></br></br>
					<a href=><button type="reset" class="mdui-btn mdui-btn-raised mdui-ripple">下载头像</button>
					<button type="reset" class="mdui-btn mdui-btn-raised mdui-ripple">重新选择</button>
					<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">修改头像</button>
     
 
			</form>-->

			


	
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