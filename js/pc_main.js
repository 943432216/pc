$(function() {
	//导航
	$('.start').each(function() {
		$(this).on({
			mouseover: function() {
				$('.nav2').css('display', 'none');
				$(this).parents('li').css('display', 'block');
				$(this).next('.nav2').css('display', 'block');
			},
			mouseout: function() {
				$(this).next('.nav2').css('display', 'none');
			}
		})
	});
	$('.nav2').each(function() {
		$(this).on({
			mouseover: function() {
				$(this).css('display', 'block');
			},
			mouseout: function() {
				$(this).css('display', 'none');
			}
		})
	});
	//二维码
	$('.ewm').on({
		click: function() {
			$('.ewmx').css('display', 'block');
		},
		mouseover: function() {
			$('.ewmx').css('display', 'block');
		},
		mouseout: function() {
			$('.ewmx').css('display', 'none');
		}
	});
	$('.sec_titles span').each(function(a, b) {
		$(this).on({
			mouseover: function() {
				$('.msg_boxs').css('display', 'none');
				$('.sec_titles span').removeClass('sec_A');
				$(this).addClass('sec_A')
				$('.msg_boxs').eq(a).css('display', 'block');
			}
		})
	});
	//新闻
	$('.shade_navd').each(function(a, b) {
		$(this).on({
			mouseover: function() {
				$('.msg_box').css('display', 'none');
				$('.shade_nav').children('span').removeClass('sec_A');
				$(this).children('span').addClass('sec_A');
				$('.msg_box').eq(a).css('display', 'block');
				if($(this).children('span').html() == '视频中心') {
					$('.video_left,.video_right').css('display', 'block');
				} else {
					$('.video_left,.video_right').css('display', 'none');
				}
			}
		})
	});
	//video
	var n = 0;
	$('.video_left').click(function() {
		if(n <= 0) {
			alert('已经是第一个视频')
		} else {
			n--;
		}
		videold(n);
		return n;
	})
	$('.video_right').click(function() {
		if(n >= 4) {
			alert('已经是最后一个视频')
		} else {
			n++
		}
		videold(n)
		return n;
	})
	//收藏or设为主页	
	var urls = window.location.href;
	var titles = document.title;
	$('#collect').click(function() {
		
		AddFavorite(titles, urls);
	})
	$('#homepage').click(function(){
		SetHome(urls)
	})
})

function videold(num) {
	var arr = ['http://player.youku.com/embed/XMTc2MzQ4NTI1Ng==', 'http://player.youku.com/embed/XMjQ3NzE0NTczMg==', 'http://player.youku.com/embed/XMTYwNzQ3ODA0OA==', 'http://player.youku.com/embed/XMTYwNzQ2ODY5Ng==', 'http://player.youku.com/embed/XMTUzNDI0NjUwNA=='];
	$('#vidse').attr('src', arr[num]);
}

function AddFavorite(title, url) {
	try {
		window.external.addFavorite(url, title);
	} catch(e) {
		try {
			window.sidebar.addPanel(title, url, "");
		} catch(e) {
			alert("抱歉，您所使用的浏览器无法完成此操作。\n\n请使用快捷键Ctrl+D进行添加！");
		}
	}
}

function SetHome(url) {
	if(document.all) {
		document.body.style.behavior = 'url(#default#homepage)';
		document.body.setHomePage(url);
	} else {
		alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!");
	}
}