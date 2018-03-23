function cj(data) {
	var sn = '<li class="new_s"><span class="new_left"><img src="" class="img"/></span><span class="new_right"><ul><li><a href=""></a></li><li><a href="" class="title"></a></li></ul></span></li>';
	$.each(data, function(a, b) {
		$('.new_boxs').append(sn);
	});
	for(var i = 0; i < $('.new_s').length; i++) {
		$('.new_s').eq(i).find('a').attr('href', '/mobile'+data[i].state_url);
		$('.new_s').eq(i).children('.new_left').children('img').attr('src', data[i].ThumbPic);
		$('.new_s').eq(i).children('.new_right').find('li').eq(0).children('a').html(data[i].Title);
		$('.new_s').eq(i).children('.new_right').find('li').eq(1).children('a').html(data[i].BriefDescription);
	};
}

function starts() {
	var oUl = document.getElementById('new_boxs');
	oUl.innerHTML = oUl.innerHTML + oUl.innerHTML + oUl.innerHTML + oUl.innerHTML;
	//	console.log($('.new_boxs').height());
	var flat = 1;
	AutoScroll()
}

function AutoScroll() {
	var $hei = $('.new_boxs').height();
	$('.new_boxs').animate({
		top: -$hei + 10 + 'px'
	}, 300000, 'linear', function() {
		$(this).css('top', 0);
		aul();
	});
	$('.new_boxs').on({
		touchstart: function() {
			$('.new_boxs').stop()
		},
		touchmove: function() {
			$('.new_boxs').stop()
		},
		touchend: function() {
			$('.new_boxs').animate({
				top: -$hei + 'px'
			}, 300000, 'linear');
		}
	})
}

function aul() {
	var $hei = $('.new_boxs').height();
	$('.new_boxs').animate({
		top: -$hei + 10 + 'px'
	}, 300000, 'linear', function() {
		$(this).css('top', 0);
		aul();
	});
}

function linkages(html, id) {
	var urs = window.location.href;
	var a, b, c, d, f, g, n, m;
	a = urs.split('?')[1];
	g = a.split('&')[0];
	b = g.split('=')[0];
	c = g.split('=')[1];
	n = a.split('&')[1];
	m = n.split('=')[1];
	//	console.log(m)
	switch(b) {
		case 'AId':
			d = 0;
			break;
		case 'CateId':
			d = 1;
			break;
	}
	if(d == 0) {
		switch(c) {
			case '3':
				f = '公司简介';
				break;
			case '4':
				f = '董事长致词';
				break;
			case '6':
				f = '发展历程';
				break;
			case '7':
				f = '企业文化';
				break;
			case '15':
				f = '企业荣誉';
				break;
		}
	}
	if(d == 1) {
		switch(c) {
			case '1':
				f = '公司动态';
				break;
			case '2':
				f = '行业动态';
				break;
			case '6':
				f = '视频中心';
				break;
			case '8':
				f = '心肾相交理论';
				break;
			case '9':
				f = '心宝丸的临床应用';
				break;
			case '11':
				f = '蒲地蓝消炎片';
				break;
			case '22':
				f = '蒲蓝地消炎胶囊';
				break;
			case '24':
				f = '心宝丸';
				break;
		}
	}
	if(html == 'products' && c == '10') {
		f = '龟鹿补肾片';
	}
	if(html == 'info' && c == '10') {
		f = '龟鹿补肾片健康手册';
	}
	$('.staOne').children('ul').slideUp();
	if(m == t2 || m == t3 || m == t4 || m == t1) {
		$(id).children('ul').slideDown();
	} else {
		$(id).children('ul').slideUp();
	}
	$('.i_ul').find('*').removeClass('bgcolor');
	$('#' + m).find('div').addClass('bgcolor');
	$('.i_ul').find('li').each(function() {
		if($(this).children('a').html() == f) {
			$(this).children('a').addClass('color');
		}
	})
	$('.header_nav').click(function() {
		$('.i_ul').toggle(500);
	})
	$('.staOne').click(function() {
		$(this).siblings('.staOne').children('ul').slideUp();
		$(this).children('ul').slideToggle();
	})
	inc(f);
	headers()
}

function inc(num) {
	var ids = null;
	var urla = null;
	switch(num) {
		case '公司动态':
			ids = 't4';
			break;
		case '行业动态':
			ids = 't4';
			break;
		case '视频中心':
			ids = 't4';
			break;
		case '心肾相交理论':
			ids = 't3';
			break;
		case '心宝丸的临床应用':
			ids = 't3';
			break;
		case '蒲地蓝消炎片':
			ids = 't2';
			break;
		case '蒲蓝地消炎胶囊':
			ids = 't2';
			break;
		case '心宝丸':
			ids = 't2';
			break;
		case '公司简介':
			ids = 't1';
			break;
		case '董事长致词':
			ids = 't1';
			break;
		case '发展历程':
			ids = 't1';
			break;
		case '企业文化':
			ids = 't1';
			break;
		case '企业荣誉':
			ids = 't1';
			break;
		case '龟鹿补肾片':
			ids = 't2';
			break;
		case '龟鹿补肾片健康手册':
			ids = 't3';
			break;
	}
	$('.banner_nav').find('li').each(function() {
		if($(this).children('a').html() == num) {
			$(this).children('a').addClass('bor_bn');
		}
		$(this).children('a').click(function() {
			urla = $(this).attr('href') + '&a=' + ids;
			$(this).attr('href', urla);
		})
	});
	$('.banner_navs').find('li').each(function() {
		if($(this).children('a').html() == num) {
			$(this).children('a').addClass('bor_bn');
		}
		$(this).children('a').click(function() {
			urla = $(this).attr('href') + '&a=' + ids;
			$(this).attr('href', urla);
		})
	});
}

function headers() {
	var nx = $('.header_con').html();
	$('.i_ul').find('li').each(function() {
		if($(this).children('a').html() == nx) {
			$(this).children('a').addClass('color');
			$(this).css('background', '#B60005');
		}
	})
}

function linkage(data, id, htmls) {
	var a, b, c;
	b = data.toString();
	c = htmls
	if(c == 'product') {
		switch(b) {
			case '10':
				a = '龟鹿补肾片';
				break;
			case '11':
				a = '蒲地蓝消炎片';
				break;
			case '22':
				a = '蒲蓝地消炎胶囊';
				break;
			case '24':
				a = '心宝丸';
				break;
		}
		inc(a);
	} else {
		switch(b) {
			case '1':
				a = '公司动态';
				break;
			case '2':
				a = '行业动态';
				break;
			case '6':
				a = '视频中心';
				break;
			case '9':
				a = '心宝丸的临床应用';
				break;
			case '10':
				a = '龟鹿补肾片健康手册';
				break;
		}

	}
	$('.staOne').children('ul').slideUp();
	$(id).children('ul').slideDown();
	$('.i_ul').find('*').removeClass('bgcolor');
	$(id).find('div').addClass('bgcolor');

	$('.i_ul').find('li').each(function() {
		if($(this).children('a').html() == a) {
			$(this).children('a').addClass('color');
		}
	})
	$('.header_nav').click(function() {
		$('.i_ul').toggle(500);
	})
	$('.staOne').click(function() {
		$('.staOne').children('ul').slideUp();
		$(this).children('ul').slideToggle();
	})
}

function sendID() {
	var urls = window.location.href;
	var urla = null;
	var ids = null;
	var us = null;
	$('.i_uls li').each(function() {
		$(this).find('a').click(function() {
			ids = $(this).parent('li').parents('li').attr('id');
			urla = $(this).attr('href') + '&a=' + ids;
			$(this).attr('href', urla);
		})
	});
	$('.staTwo').each(function() {
		$(this).click(function() {
			ids = $(this).attr('id');
			if(ids != undefined) {
				urla = $(this).find('a').attr('href') + '&a=' + ids;
				$(this).find('a').attr('href', urla);
			}

		})
	});
	$('.nav_icon').find('a').each(function() {
		//		console.log($(this));
		$(this).click(function() {
			us = $(this).parents('span').children('p').eq(1).children('a').html();
			switch(us) {
				case '关于心宝':
					ids = 't1';
					break;
				case '产品中心':
					ids = 't2';
					break;
				case '心肾同治':
					ids = 't3';
					break;
				case '最新动态':
					ids = 't4';
					break;
				case '联系心宝':
					ids = 't5';
					break;
				case '员工登录':
					ids = 't6';
					break;
			}
			urla = $(this).attr('href') + '&a=' + ids;
			$(this).attr('href', urla);
		})
	});
	$('.moreNew').children('a').click(function() {
		urla = $(this).attr('href') + '&a=t4';
		$(this).attr('href', urla);
	});
	//	$('new_s').mouseover()
	$('.new_s a').each(function() {
		$(this).on({
			touchstart: function() {
				$(this).css('background', '#F7F7F7');
				alert(1)
			},
			touchend: function() {
				$(this).css('background', '#fff');
				alert(0)
			}
		})
	})
}

function xllc(data) {
	console.log(data)
	var $lcleft = '<div class="float width overflow ex_box"><span class="lc_con"><h3></h3><div class="lc_conbox width float"><p></p><img src=""/></div></span></div>';
	//	var $lc_con = '<div class="lc_conbox width float"><p></p><img src=""/></div>'
	var $lcright = '<div class="float width overflow ex_box"><span class="lc_conr"><h3></h3><div class="lc_conbox width float"><p></p><img src=""/></div></span></div>';
	$.each(data, function(a, b) {
		console.log(b)
		if(a % 2 == 0) {
			$('.exper').append($lcleft);
			$('.exper').children('div').eq(a).find('h3').html(b.time);
			$('.exper').children('div').eq(a).find('img').attr('src', b.pic_src);
			$('.exper').children('div').eq(a).find('p').html(b.happen);
		} else {
			$('.exper').append($lcright);
			$('.exper').children('div').eq(a).find('h3').html(b.time);
			$('.exper').children('div').eq(a).find('img').attr('src', b.pic_src);
			$('.exper').children('div').eq(a).find('p').html(b.happen);
		}

	})
}

function glory(el, data) {
	var $rybox = '<span class="ry_box float"><img src="" class="img"/><p class="width float"></p></span>';
	console.log(data);
	$.each(data, function(a, b) {
		$(el).append($rybox);
		$(el).children('span').eq(a).find('img').attr('src', b.hor_src);
		$(el).children('span').eq(a).find('p').html(b.hor_commend);
	});
}

$(function() {
	sendID();
	tzs();
})

function tzs() {
	var ursd=window.location.href;
	console.log(ursd);
	var a,b;
	a=ursd.split('mobile/')[1];
	b=a.split('&')[0];
	console.log(b);
	var sUserAgent = navigator.userAgent.toLowerCase();
	var bIsIpad = sUserAgent.match(/ipad/i) == 'ipad';
	var bIsIphone = sUserAgent.match(/iphone os/i) == 'iphone os';
	var bIsMidp = sUserAgent.match(/midp/i) == 'midp';
	var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == 'rv:1.2.3.4';
	var bIsUc = sUserAgent.match(/ucweb/i) == 'web';
	var bIsCE = sUserAgent.match(/windows ce/i) == 'windows ce';
	var bIsWM = sUserAgent.match(/windows mobile/i) == 'windows mobile';
	var bIsAndroid = sUserAgent.match(/android/i) == 'android';

	if(!(bIsIpad || bIsIphone || bIsMidp || bIsUc7 || bIsUc || bIsCE || bIsWM || bIsAndroid)) {
		window.location.href = '../'+b;
	}
};