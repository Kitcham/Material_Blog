<?php
header("content-type:text/html;charset=utf-8");
include 'dbconfig.php';
$articleid = $_GET['id'];
$pdo = new PDO(DSN,ROOT,PASSWORD);
$sql = "SELECT * FROM article WHERE id='{$articleid}'";
$smt = $pdo->query($sql);
$row = $smt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang=" en">
<head>
	<meta charset="UTF-8">
	<title>文章详情</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/mdui.css"/>
	<style>
		html,body{
			background:#fff!important;
		}
		.login,.register{
			background: #000;
		}
	</style>
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-amber mdui-theme-accent-pink">
	<!--头部-->
	<div class="main">
		<!--头部 end-->
		<header class="mdui-appbar mdui-appbar-fixed">
  			<div class="mdui-toolbar mdui-color-theme">
    			<span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}" id="toggle"><i class="mdui-icon material-icons">menu</i></span>
    			<a href="index.php" class="mdui-typo-headline mdui-hidden-xs">My Blog</a>
   			 <div class="mdui-toolbar-spacer"></div>
    		 <div class="mdui-textfield mdui-textfield-expandable mdui-float-right">			
  				<button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
				<form action="selectarticle.php" method="GET" class="searchform">
  					<input class="search-input" type="text" name="search" placeholder="输入关键字"/>
					<button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">done</i></button>
  				</form>
			</div>
  			</div>
		</header>
	<!--头部 end-->
		
		<!--文章详情-->
<div class="mdui-container">
			
		<!--侧边栏 -->
		<div class="mdui-drawer" id="main-drawer">
  			<ul class="mdui-list">
				<?php
				//登录状态
				session_start();
				if($_SESSION['username']){
					echo '<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: \'#geout\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" mdui-dialog="{target: \'#geout\'}">keyboard_return</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'logout.php\', \'_self\')" mdui-dialog="{target: \'#geout\'}">注销</div>';
					echo '</li>';
				}
				else{
					echo '<li class="mdui-list-item mdui-ripple"  mdui-dialog="{target: \'#LoginDialog\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons"  mdui-dialog="{target: \'#LoginDialog\'}">send</i>'; 
					echo '<div class="mdui-list-item-content"  mdui-dialog="{target: \'#LoginDialog\'}">登录</div>';
					echo '</li>';
					echo '<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: \'#RegisterDialog\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" mdui-dialog="{target: \'#RegisterDialog\'}">assignment</i>'; 
					echo '<div class="mdui-list-item-content" mdui-dialog="{target: \'#RegisterDialog\'}">注册</div>';
					echo '</li>';
				}
				?>		
				<?php
					session_start();
				//管理员
					if($_SESSION['username']){
						echo '<li class="mdui-subheader"><a>欢迎回来&nbsp;&nbsp;&nbsp;</a>';
						echo $_SESSION['username']; 
						echo '</li>';					
					}
					else{
						echo '<li class="mdui-subheader"><a>请登录</a>';
					}
				?>			
    			<!--身份区分-->
				<?php
				session_start();
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
				//普通用户
				else if($_SESSION['isadmin']=='0'){
					echo '<li class="mdui-list-item mdui-ripple" id="member" mdui-dialog="{target: \'#member\'}">';
					echo '<i class="mdui-list-item-icon mdui-icon material-icons" id="member" mdui-dialog="{target: \'#member\'}">donut_small</i>'; 
					echo '<div class="mdui-list-item-content" onclick="window.open(\'user.php\', \'_self\')" id="member" mdui-dialog="{target: \'#member\'}">个人中心</div>';
					echo '</li>';
				}
				//未登录，不显示
				else{
					;
				}
				?>		
    			<li class="mdui-list-item mdui-ripple">
      			<i class="mdui-list-item-icon mdui-icon material-icons">email</i>
				<div class="mdui-list-item-content" onclick="window.open('mailto:xxxxxxxx@localhost.com', '_self')">与我联系</div>
				</li>
    
  			</ul>
		</div>
	
	
	
	<!--登录对话框-->
	<div class="mdui-dialog" id="LoginDialog">
    	<div id="example4-tab1" class="mdui-p-a-2">
			<a href="#example4-tab1" class="mdui-ripple">Login</a>
			<form action="login.php" method="post">	
      			<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
				
    			<i class="mdui-icon material-icons">account_circle</i>
    			<label class="mdui-textfield-label">用户名</label>
    			<input class="mdui-textfield-input"  class="search-input" name="uname" required></input>
  			</div>
			 	<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
    			<i class="mdui-icon material-icons">lock</i>
    			<label class="mdui-textfield-label">密码</label>
    			<input class="mdui-textfield-input" type="password" class="search-input" name="password" required></input>
  			</div>
			
    		<div class="mdui-col">
      			<button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple">Login</button>
    		
    		</div>
			</form>
  		</div>
    </div>
		<!--注册对话框-->
	<div class="mdui-dialog" id="RegisterDialog">
    	<div id="example4-tab1" class="mdui-p-a-2">
			<a href="#example4-tab1" class="mdui-ripple">Register</a>
			<form action="register.php" method="post">	
      			<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
				
    			<i class="mdui-icon material-icons">account_circle</i>
    			<label class="mdui-textfield-label">用户名</label>
    			<input class="mdui-textfield-input"  class="search-input" name="uname" required></input>
  			<div class="mdui-textfield-error">用户名不能为空</div>
  			</div>
				<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
    			<i class="mdui-icon material-icons">email</i>
    			<label class="mdui-textfield-label">电子邮箱</label>
    			<input class="mdui-textfield-input" type="email" class="search-input" name="emailaddress" required></input>
				<div class="mdui-textfield-error">邮箱格式错误</div>
  			</div>
			 	<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
    			<i class="mdui-icon material-icons">lock</i>
    			<label class="mdui-textfield-label">密码</label>
    			<input class="mdui-textfield-input" type="password" class="search-input" name="password" required></input>
  			</div>
			
    		<div class="mdui-col">
      			<button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple">Register</button>
    		
    		</div>
			</form>
  		</div>
    </div>
	
  </div>
	
	
	
		<!--文章内容-->
	<div class="mdui-row">
				<?php
	
					echo"<div class='mdui-col-sm-11 mdui-col-md-11'>";
					echo "<div class='mdui-card  mdui-hoverable'>";
							echo"<div class='mdui-card-media'>";
				     			echo"<img src='img/card.jpg'/>";
								echo "<div class='mdui-card-media-covered'>";
            					echo "<div class='mdui-card-primary'>";
              					echo "<div class='mdui-card-primary-title'>{$row['autho']}</div>";
              					echo"<div class='mdui-card-primary-subtitle'>Author</div>";
								 echo"</div>";
					 			echo"</div>";
							echo"</div>";
							echo"<div class='mdui-card-primary'>";
					 			echo"<div class='mdui-card-primary-title'> {$row['title']} </div>";
					 			echo"<div class='mdui-card-primary-subtitle'> {$row['addtime']} </div>";
							echo "</div>";
							echo "<div class='mdui-card-content'>{$row['content']} </div>";
							echo"<div class='mdui-card-actions'>";
								echo "<a href = 'articledetails.php?id={$row['id']}'><button class='mdui-btn mdui-ripple'>详情</button>";
					 			echo "<button class='mdui-btn mdui-btn-icon mdui-float-right'><i class='mdui-icon material-icons'>expand_more</i></button></a>";
					 		echo"</div>";
						//echo"</div>"; 
				echo"</br></br></div>";	 	
		
		?>
	</div>	

		<!--返回顶部-->
		
	<div class="gotop">
		<button class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">keyboard_arrow_up</i></button>
	</div>

	</div>

	
</body>
<script src="js/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/mdui.js"></script>
</html>