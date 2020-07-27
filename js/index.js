//名
function name(name,flag){
	$(name).animate({
		top:"100px",
		left:"450px"
	},500)
	if(flag){
		$(".body-mark").css({display:"block"});
		flag=false
	}else{
		$(name).animate({
			top:"-480px",
			left:"450px"
		},100)
		flag=true
	}
}

	//返回顶部
	$(".gotop").click(function(){
		//返回顶部时间0.5秒
		$("body,html").animate({scrollTop:0},500)
	});
	//scrollTop大于一屏时，才显示返回顶固按钮
	$(window).scroll(function(){
		if ($(window).scrollTop()>$(window).height()-200) {
			$(".gotop").fadeIn(500); 
		}else{
			$(".gotop").fadeOut(500);
		}

	})
