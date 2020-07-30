
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=”description” content="php博客"> 
	<meta name=”keyword” content="PHP,PHP博客,mysql"> 
	<title>My Blog</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/mdui.css"/>
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar  mdui-theme-primary-amber mdui-theme-accent-pink">
	<!--头部-->
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
				//登录状态
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
			<div class="main-content">
		</div>
		
	<div class="mdui-row">
	</div>	


	</div>
	<div class="gotop">
		<button class="mdui-btn mdui-btn-raised mdui-color-theme-accent mdui-ripple mdui-btn-icon"><i class="mdui-icon material-icons">keyboard_arrow_up</i></button>
	</div>


</body>
<script src="js/jquery.min.js"></script>
<script src="js/index.js"></script>

	
	<script>	
		//md5计算
		!function(n){"use strict";function d(n,t){var r=(65535&n)+(65535&t);return(n>>16)+(t>>16)+(r>>16)<<16|65535&r}function f(n,t,r,e,o,u){return d((c=d(d(t,n),d(e,u)))<<(f=o)|c>>>32-f,r);var c,f}function l(n,t,r,e,o,u,c){return f(t&r|~t&e,n,t,o,u,c)}function v(n,t,r,e,o,u,c){return f(t&e|r&~e,n,t,o,u,c)}function g(n,t,r,e,o,u,c){return f(t^r^e,n,t,o,u,c)}function m(n,t,r,e,o,u,c){return f(r^(t|~e),n,t,o,u,c)}function i(n,t){var r,e,o,u;n[t>>5]|=128<<t%32,n[14+(t+64>>>9<<4)]=t;for(var c=1732584193,f=-271733879,i=-1732584194,a=271733878,h=0;h<n.length;h+=16)c=l(r=c,e=f,o=i,u=a,n[h],7,-680876936),a=l(a,c,f,i,n[h+1],12,-389564586),i=l(i,a,c,f,n[h+2],17,606105819),f=l(f,i,a,c,n[h+3],22,-1044525330),c=l(c,f,i,a,n[h+4],7,-176418897),a=l(a,c,f,i,n[h+5],12,1200080426),i=l(i,a,c,f,n[h+6],17,-1473231341),f=l(f,i,a,c,n[h+7],22,-45705983),c=l(c,f,i,a,n[h+8],7,1770035416),a=l(a,c,f,i,n[h+9],12,-1958414417),i=l(i,a,c,f,n[h+10],17,-42063),f=l(f,i,a,c,n[h+11],22,-1990404162),c=l(c,f,i,a,n[h+12],7,1804603682),a=l(a,c,f,i,n[h+13],12,-40341101),i=l(i,a,c,f,n[h+14],17,-1502002290),c=v(c,f=l(f,i,a,c,n[h+15],22,1236535329),i,a,n[h+1],5,-165796510),a=v(a,c,f,i,n[h+6],9,-1069501632),i=v(i,a,c,f,n[h+11],14,643717713),f=v(f,i,a,c,n[h],20,-373897302),c=v(c,f,i,a,n[h+5],5,-701558691),a=v(a,c,f,i,n[h+10],9,38016083),i=v(i,a,c,f,n[h+15],14,-660478335),f=v(f,i,a,c,n[h+4],20,-405537848),c=v(c,f,i,a,n[h+9],5,568446438),a=v(a,c,f,i,n[h+14],9,-1019803690),i=v(i,a,c,f,n[h+3],14,-187363961),f=v(f,i,a,c,n[h+8],20,1163531501),c=v(c,f,i,a,n[h+13],5,-1444681467),a=v(a,c,f,i,n[h+2],9,-51403784),i=v(i,a,c,f,n[h+7],14,1735328473),c=g(c,f=v(f,i,a,c,n[h+12],20,-1926607734),i,a,n[h+5],4,-378558),a=g(a,c,f,i,n[h+8],11,-2022574463),i=g(i,a,c,f,n[h+11],16,1839030562),f=g(f,i,a,c,n[h+14],23,-35309556),c=g(c,f,i,a,n[h+1],4,-1530992060),a=g(a,c,f,i,n[h+4],11,1272893353),i=g(i,a,c,f,n[h+7],16,-155497632),f=g(f,i,a,c,n[h+10],23,-1094730640),c=g(c,f,i,a,n[h+13],4,681279174),a=g(a,c,f,i,n[h],11,-358537222),i=g(i,a,c,f,n[h+3],16,-722521979),f=g(f,i,a,c,n[h+6],23,76029189),c=g(c,f,i,a,n[h+9],4,-640364487),a=g(a,c,f,i,n[h+12],11,-421815835),i=g(i,a,c,f,n[h+15],16,530742520),c=m(c,f=g(f,i,a,c,n[h+2],23,-995338651),i,a,n[h],6,-198630844),a=m(a,c,f,i,n[h+7],10,1126891415),i=m(i,a,c,f,n[h+14],15,-1416354905),f=m(f,i,a,c,n[h+5],21,-57434055),c=m(c,f,i,a,n[h+12],6,1700485571),a=m(a,c,f,i,n[h+3],10,-1894986606),i=m(i,a,c,f,n[h+10],15,-1051523),f=m(f,i,a,c,n[h+1],21,-2054922799),c=m(c,f,i,a,n[h+8],6,1873313359),a=m(a,c,f,i,n[h+15],10,-30611744),i=m(i,a,c,f,n[h+6],15,-1560198380),f=m(f,i,a,c,n[h+13],21,1309151649),c=m(c,f,i,a,n[h+4],6,-145523070),a=m(a,c,f,i,n[h+11],10,-1120210379),i=m(i,a,c,f,n[h+2],15,718787259),f=m(f,i,a,c,n[h+9],21,-343485551),c=d(c,r),f=d(f,e),i=d(i,o),a=d(a,u);return[c,f,i,a]}function a(n){for(var t="",r=32*n.length,e=0;e<r;e+=8)t+=String.fromCharCode(n[e>>5]>>>e%32&255);return t}function h(n){var t=[];for(t[(n.length>>2)-1]=void 0,e=0;e<t.length;e+=1)t[e]=0;for(var r=8*n.length,e=0;e<r;e+=8)t[e>>5]|=(255&n.charCodeAt(e/8))<<e%32;return t}function e(n){for(var t,r="0123456789abcdef",e="",o=0;o<n.length;o+=1)t=n.charCodeAt(o),e+=r.charAt(t>>>4&15)+r.charAt(15&t);return e}function r(n){return unescape(encodeURIComponent(n))}function o(n){return a(i(h(t=r(n)),8*t.length));var t}function u(n,t){return function(n,t){var r,e,o=h(n),u=[],c=[];for(u[15]=c[15]=void 0,16<o.length&&(o=i(o,8*n.length)),r=0;r<16;r+=1)u[r]=909522486^o[r],c[r]=1549556828^o[r];return e=i(u.concat(h(t)),512+8*t.length),a(i(c.concat(e),640))}(r(n),r(t))}function t(n,t,r){return t?r?u(t,n):e(u(t,n)):r?o(n):e(o(n))}"function"==typeof define&&define.amd?define(function(){return t}):"object"==typeof module&&module.exports?module.exports=t:n.md5=t}(this);
		//# sourceMappingURL=md5.min.js.map
		//MD5计算js结束
	var str="";
	$.ajax({
		type:"post",
		url:"check.php",
		success:function(res){
			//转换为文章数组形式
			var r= JSON.parse(res)
			$.each(r,function(index,value){
				var hash = md5(value.email);
				if(value.length<20){
					value.content=value.content;
				}
				else {
					value.content=value.content.substring(0,20);
				}
				str+=
					"<div class='mdui-col-sm-6 mdui-col-md-6'>"+
						"<div class='mdui-card mdui-hoverable'>"+
							"<div class='mdui-card-header'>"+
								//"<img class='mdui-card-header-avatar' src='img/avatar/default.jpg'/>"+
								"<img class='mdui-card-header-avatar' src='img/avatar/" + hash + ".jpg'/>"+
					 			"<div class='mdui-card-header-title'>" + value.autho + "</div>"+
					 			"<div class='mdui-card-header-subtitle'>Author</div>"+
							"</div>"+
							"<div class='mdui-card-media'>"+
				     			"<img src='img/card.jpg'/>"+
					 			"<div class='mdui-card-menu'>"+
					 			"<button class='mdui-btn mdui-btn-icon mdui-text-color-white'><i class='mdui-icon material-icons'>share</i></button>"+
								"</div>"+
					 		"</div>"+
							"<div class='mdui-card-primary'>"+
					 			"<div class='mdui-card-primary-title'>" + value.title + "</div>"+
					 			"<div class='mdui-card-primary-subtitle'>" + value.addtime + "</div>"+
							"</div>"+
							"<div class='mdui-card-content'>" + value.content + "</div>"+
							//"<div class='mdui-card-content'>" + (value.content=value.content.substring(1,30))+ "</div>"+
							"<div class='mdui-card-actions' 'details'>"+
								 "<a href = 'articledetails.php?id=" + value.id + "'><button class='mdui-btn mdui-ripple'>详情</button>"+
					 			 "<button class='mdui-btn mdui-btn-icon mdui-float-right'><i class='mdui-icon material-icons'>expand_more</i></button></a>"+
					 		"</div>"+
						"</div>"+ 
				"</br></br></div>"		 	
			})
			$(".mdui-row").html(str)
		}
	})
</script>
	
<script src="js/mdui.js"></script>
</html>