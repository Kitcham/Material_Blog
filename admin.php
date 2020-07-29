
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理中心</title>
	<link rel="stylesheet" href="css/admincss.css">
	<link rel="stylesheet" href="css/mdui.css">
<!--头部-->	
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-amber mdui-theme-accent-pink">
	<header class="mdui-appbar mdui-appbar-fixed">
  <div class="mdui-toolbar mdui-color-theme">
    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}" id="toggle"><i class="mdui-icon material-icons">menu</i></span>
    <a href="index.php" class="mdui-typo-headline mdui-hidden-xs">管理中心</a>
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
				if(($_SESSION['username']) && ($_SESSION['isadmin']=='1')){
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
				<li class="mdui-list-item mdui-ripple">
      			<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
				<div class="mdui-list-item-content" onclick="window.open('index.php', '_self')">回到首页</div>
				</li>
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
				//普通用户
				else if($_SESSION['isadmin']=='0'){
					echo "<script>location='index.php'</script>";
				}
				//未登录，跳转
				else{
					echo "<script>location='index.php'</script>";
				}
				?>
				
				<li class="mdui-list-item mdui-ripple" onclick="window.open('userlist.php', '_self')">
      			<i class="mdui-list-item-icon mdui-icon material-icons" onclick="window.open('userlist.php', '_self')">people</i>
				<div class="mdui-list-item-content" onclick="window.open('userlist.php', '_self')">查看用户</div>
				</li>
				
				<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: '#addDialog'}">
      			<i class="mdui-list-item-icon mdui-icon material-icons" mdui-dialog="{target: '#addDialog'}">person_add</i>
				<div class="mdui-list-item-content" mdui-dialog="{target: '#addDialog'}">添加用户</div>
				</li>
				
				<li class="mdui-list-item mdui-ripple" mdui-dialog="{target: '#updateUser'}"> 
      			<i class="mdui-list-item-icon mdui-icon material-icons" mdui-dialog="{target: '#updateUser'}">build</i>
				<div class="mdui-list-item-content" mdui-dialog="{target: '#updateUser'}">更改权限</div>
				</li>
				
				<li class="mdui-list-item mdui-ripple" onclick="window.open('checkarticle.php', '_self')"> 
      			<i class="mdui-list-item-icon mdui-icon material-icons" onclick="window.open('checkarticle.php', '_self')">art_track</i>
				<div class="mdui-list-item-content" onclick="window.open('checkarticle.php', '_self')">查看文章</div>
				</li>
				
				<li class="mdui-list-item mdui-ripple" onclick="window.open('postarticle.php', '_self')"> 
      			<i class="mdui-list-item-icon mdui-icon material-icons" onclick="window.open('postarticle.php', '_self')">edit</i>
				<div class="mdui-list-item-content" onclick="window.open('postarticle.php', '_self')">发布文章</div>
				</li>

				</li>
    
  			</ul>
	</div>
	
	
	
	<!--登录对话框-->
	<div class="mdui-dialog" id="LoginDialog">
    	<div id="example4-tab1" class="mdui-p-a-2">
			<div class="mdui-typo-display-title-opacity">登录</mark></div>
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
			<div class="mdui-typo-display-title-opacity">注册账户</mark></div>
			<form action="register.php" method="post">	
      			<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
    			<i class="mdui-icon material-icons">account_circle</i>
    			<label class="mdui-textfield-label">用户名</label>
    			<input class="mdui-textfield-input"  class="search-input" name="uname" required></input>
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
		
		
		<!--更改权限-->
	<div class="mdui-dialog" id="updateUser">
    	<div id="example4-tab1" class="mdui-p-a-2">
			<div class="mdui-typo-display-title-opacity">更改权限&nbsp&nbsp&nbsp<mark>风险权限，谨慎操作！！!</mark></div>
			<!-- <a href="#example4-tab1" class="mdui-ripple">Login</a> -->
			<form action="updateuser.php" method="get">	
      			<!-- 浮动标签、多行文本框 -->
  			<div class="mdui-textfield mdui-textfield-floating-label">
				
    			<i class="mdui-icon material-icons">account_circle</i>
    			<label class="mdui-textfield-label">用户名</label>
    			<input class="mdui-textfield-input"  class="search-input" name="uname" required></input>
  			</div>
			 	<!-- 浮动标签、多行文本框 
  			<div class="mdui-textfield mdui-textfield-floating-label">
    			<i class="mdui-icon material-icons">lock</i>
    			<label class="mdui-textfield-label">密码</label>
    			<textarea class="mdui-textfield-input" type="password" class="search-input" name="password" required></textarea>
  			</div>
			-->
    		<div class="mdui-col">
      			<button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple">UPDATE</button>
    		
    		</div>
			</form>
  		</div>
    </div>
	
	<!--添加用户-->
	<div class="mdui-dialog" id="addDialog">
    	<div id="example4-tab1" class="mdui-p-a-2">
			<div class="mdui-typo-display-title-opacity">添加用户</mark></div>
			<!--<a href="#example4-tab1" class="mdui-ripple">添加用户</a> -->
			<form action="add.php" method="post">	
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
      			<button class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple">确认添加</button>
    		
    		</div>
			</form>
  		</div>
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
			echo "<div><img class='mdui-img-circle' src='" . $_SESSION['avatar']. "'/></div>";
			echo "Hi，<div class=\"mdui-typo-title\">". $_SESSION['username'] ."</div>";
			if($_SESSION['isadmin']=='1'){
				echo "<div class=\"mdui-typo-subheading-opacity\">管理员</div>";
			}
			else
			{
				echo "<div class=\"mdui-typo-subheading-opacity\">订阅者</div>";;
			}
			session_start();
			//echo "欢迎，" . $_SESSION['username'];
			?>
			</div>
  </div>
	
	
			
		<!--文章内容-->
		<div style="clear:both"></div>	
	</div>
		

</body>
<script src="js/jquery.min.js"></script>
<script src="js/mdui.js"></script>
<script>
	$("h4").click(function(){
		$('.user span').slideToggle()
	})

	$(".left span").click(function(){
		$(".right div.m").hide().eq($(this).index()-1).show();
	})
	//ajax删除用户
	$('.del').click(function(){
		var num = $(this).attr('num');
		$.get("del.php?id="+num,function(res){
			if(res==="1"){
				$("#t"+num).remove()
			}
		})
	})
	
	//ajax修改用户
	$('.change').click(function(){
		$(".changeform").show();
		var num = $(this).attr('num');
		$(".changebtn").click(function(){
			var check = document.getElementById('check');
			var val;
			if(check.checked){
				val=check.getAttribute('value');
			}else{
				val='0'
			}
			if($("#changeuname").val()=="" || $("#changepassword").val()==""){
				return false
			}
			$.ajax({
				type:"post",
				url:"change.php",
				data:{
					// uname:$("#changeuname").val(),
					uid:num,
					password:$("#changepassword").val(),
					isadmin:val
				},
				success:function(res){

					if(res==='success'){
						console.log(res)
						$(".changeform").hide();
						location.reload() 
					}
					if(res==='fail'){
						console.log(res)
						$(".changeinfo").html("密码重复");

					}
				}

			})
		})
	})
	$(".x").click(function(){
		$(".changeform").hide()
	})
</script>
</html>