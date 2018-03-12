$(function() {
	var ul_hf = window.location.href;
	var titles = document.title;
	var n = 0;
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
	$('.video_left').click(function() {
		if(n <= 0) {
			alert('已经是第一个视频')
		} else {
			n--;
		}
		videold(n);
		return n;
	});
	$('.video_right').click(function() {
		if(n >= 4) {
			alert('已经是最后一个视频')
		} else {
			n++
		}
		videold(n)
		return n;
	});
	//收藏or设为主页	
	$('#collect').click(function() {

		AddFavorite(titles, ul_hf);
	})
	$('#homepage').click(function() {
		SetHome(ul_hf);
	});
	ul_hf = ul_hf.split('=')[1];
	if(ul_hf == '3') {
		$('.sec_box').find('*').removeAttr('style');
		$('.sec_box').find('img').addClass('img')
		$('.sec_box').find('div').css('float', 'left');
		$('.sec_box').find('span').css('line-height', '160%')
	} else {};

	$('.con_title').each(function(a, b) {
		$(this).on({
			mouseover: function() {
				$('.con_title').removeClass('avts');
				$(this).addClass('avts');
				$('.details_con div	').css('display', 'none');
				$('.details_con div').eq(a).css('display', 'block');
				$('.details_con div').eq(a).mouseover(function() {
					$(this).css('display', 'block');
				})
			}
		})
	});
	$('.nav2 ul li a').each(function() {
		$(this).click(function() {
			$(this).css('color', '#f6f0e0');
		})
	});
//	navs();
})

function videold(num) {
	var arr = ['http://player.youku.com/embed/XMTc2MzQ4NTI1Ng==', 'http://player.youku.com/embed/XMjQ3NzE0NTczMg==', 'http://player.youku.com/embed/XMTYwNzQ3ODA0OA==', 'http://player.youku.com/embed/XMTYwNzQ2ODY5Ng==', 'http://player.youku.com/embed/XMTUzNDI0NjUwNA=='];
	$('#vidse').attr('src', arr[num]);
}

function videolds() {
	var arr = ['http://player.youku.com/embed/XMjQ3NzE0NTczMg==', 'http://player.youku.com/embed/XMTYwNzQ3ODA0OA==', 'http://player.youku.com/embed/XMTYwNzQ2ODY5Ng==', 'http://player.youku.com/embed/XMTUzNDI0NjUwNA=='];
	$('.small_video').find('span').each(function(a, b) {
		$(this).click(function() {
			$('.big_video').find('iframe').attr('src', arr[a]);
		})
	})

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

function navs() {
	var urls = window.location.href;
	var a, b, c, d, e, i, x;
	urls = urls.split('.cn/')[1];
	//	console.log(urls);
	if(urls == '') {
		$('.nav_right').find('.ff').eq(0).addClass('navstax')
		return false;
	} else {
		b = urls.split('.')[0];
		switch(b) {
			case 'article':
				a = '关于心宝';
				break;
			case 'products':
				a = '产品中心';
				break;
			case 'info2':
				a = '心肾同治';
				break;
			case 'info':
				a = '最新动态';
				break;
			case 'contact':
				a = '联系心宝';
				break;
		}
		$('.nav_right').find('.ff').each(function() {
			if($(this).find('a').html() == a) {
				$(this).addClass('navstax');
			}
		})
	}
	c = urls.split('php')[1];
	if(c == '') {
		return false;
	} else {
		c = urls.split('?')[1];
		d = c.split('=')[0];
		e = c.split('=')[1];
		if(e.split('&')[1] == 'page') {
			e = e.split('&')[0];
		} else {
			e = c.split('=')[1];
		}
		switch(d) {
			case 'AId':
				i = 0;
				break;
			case 'CateId':
				i = 1;
				break;
		}
		if(i == 0) {
			switch(e) {
				case '3':
					x = '公司简介';
					break;
				case '4':
					x = '董事长致词';
					break;
				case '6':
					x = '发展历程';
					break;
				case '7':
					x = '企业文化';
					break;
				case '15':
					x = '企业荣誉';
					break;
			}
		}
		if(i == 1) {
			switch(e) {
				case '1':
					x = '公司动态';
					break;
				case '2':
					x = '行业动态';
					break;
				case '6':
					x = '视频中心';
					break;
				case '8':
					x = '心肾相交理论';
					break;
				case '9':
					x = '心宝丸的临床应用';
					break;
				case '11':
					x = '蒲地蓝消炎片';
					break;
				case '22':
					x = '蒲蓝地消炎胶囊';
					break;
				case '24':
					x = '心宝丸';
					break;
			}
		}

	}
	if(b == 'products' && e == '10') {
		x = '龟鹿补肾片';
	}
	if(b == 'info2' && e == '10') {
		x = '龟鹿补肾片健康手册';
	}
	$('.nav2').each(function() {
		$('.sec_title,.sec_titles').find('a').each(function() {
			if($(this).html() == x) {
				$(this).addClass('sec_A');
			}
		})
	})
	$('.page').find('*').removeAttr('style');
	if(a == '产品中心') {
		$('.page').find('.pagenum').css({
			'background': '#fff',
			'color': '#D13600'
		});
		$('.page').find('font').addClass('pageavt');
	}
	if(a == '最新动态' || a == '心肾同治') {
		$('.page').find('font').addClass('pageavts');
	}
}

function navt(data) {
	urls = window.location.href;
	var a, b, x;
	b = data.toString();
	urls = urls.split('cn/')[1];
	a = urls.split('.')[0];
	$('.nav_right').find('.ff').each(function() {
		if(a == 'products-detail') {
			$('.ff').eq(2).addClass('navstax');
		}
		if(a == 'info2-detail') {
			$('.ff').eq(3).addClass('navstax');
		}
		if(a == 'info-detail') {
			$('.ff').eq(4).addClass('navstax');
		}
	})
	switch(b) {
		case '1':
			x = '公司动态';
			break;
		case '2':
			x = '行业动态';
			break;
		case '6':
			x = '视频中心';
			break;
		case '9':
			x = '心宝丸的临床应用';
			break;
		case '11':
			x = '蒲地蓝消炎片';
			break;
		case '22':
			x = '蒲蓝地消炎胶囊';
			break;
		case '24':
			x = '心宝丸';
			break;
	}
	if(a == 'products-detail' && b == '10') {
		x = '龟鹿补肾片';
	}
	if(a == 'info2-detail' && b == '10') {
		x = '龟鹿补肾片健康手册';
	}
	//	console.log(x);
	$('.abXBs,.shade_nav').find('a').each(function() {
		if($(this).html() == x) {
			$(this).addClass('sec_A')
		}
	});

}

function newcon() {
	//	console.log(about_new);
	//	console.log(read_new);
	$.each(read_new, function(a, b) {
		console.log(b)
		$('.donate_carousel ul').append('<li><a href="#"></a><b></b></li>');
		$('.donate_carousel ul li').eq(a).find('a').html(b.Title);
		$('.donate_carousel ul li').eq(a).find('a').attr('href', b.PageUrl);
		$('.donate_carousel ul li').eq(a).find('b').html(ts(b.AccTime))
	});
	trim($('.donate_carousel ul li a').html());
	$.each(about_new, function(a, b) {
		console.log(b)
		$('.about_new ul').append('<li><a href="#"></a><b></b></li>');
		$('.about_new ul li').eq(a).find('a').html(b.Title);
		$('.about_new ul li').eq(a).find('a').attr('href', b.PageUrl);
		$('.about_new ul li').eq(a).find('b').html(ts(b.AccTime))
	});
	trim($('.about_new ul li a').html());

}

function product_pic() {

	var arr = [];
	//	console.log(pics);
	for(var i = 0 in pics) {
		//		console.log(i)

		for(var a = 0 in pics[i]) {
			//			console.log(pics[i][0])
			console.log(pics[i].length)
		}
	}
	//	console.log(arr)
}

function trim(str) {
	return str.replace(/(^\s+)|(\s+$)/g, "");
}

function ts(timestamp) {
	var date = new Date(timestamp * 1000); //时间戳为10位需*1000，时间戳为13位的话不需乘1000
	Y = date.getFullYear() + '-';
	M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
	D = (date.getDate() + 1 < 10 ? '0' + (date.getDate() + 1) : date.getDate() + 1);
	h = date.getHours() + ':';
	m = date.getMinutes() + ':';
	s = date.getSeconds();
	return Y + M + D;
}