$(function() {
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
	$('.ewm').on({
		click:function(){
			$('.ewmx').css('display','block');
		},
		mouseover:function(){
			$('.ewmx').css('display','block');
		},
		mouseout:function(){
			$('.ewmx').css('display','none');
		}
	});
	$('.sec_title span').each(function(a,b){
		$(this).on({
			mouseover:function(){
				$('.sec_box').css('display','none');
				$('.sec_title span').removeClass('sec_A');
				$(this).addClass('sec_A')
				$('.sec_box').eq(a).css('display','block');
			}
		})
	});
	$('.shade_nav').each(function(a,b){
		$(this).on({
			mouseover:function(){
				$('.msg_box').css('display','none');
				$('.shade_nav').children('span').removeClass('sec_A');
				$(this).children('span').addClass('sec_A');
				$('.msg_box').eq(a).css('display','block');
				if($(this).children('span').html()=='视频中心'){
					$('.video_left,.video_right').css('display','block');
				}else{
					$('.video_left,.video_right').css('display','none');
				}
			}
		})
	});
	//video
	var n=0;
	$('.video_left').click(function(){
		n--;
		if(n<=0){
			alert('已经是第一个视频')
		}else{
			n--;
		}
		videold(n);
		return n;
	})
	$('.video_right').click(function(){
		if(n>4){
			alert('已经是最后一个视频')
		}else{
			n++
		}
		videold(n)
		return n;
	})
})


function videold(num){
	var arr=['http://player.youku.com/embed/XMTc2MzQ4NTI1Ng==','http://player.youku.com/embed/XMjQ3NzE0NTczMg==','http://player.youku.com/embed/XMTYwNzQ3ODA0OA==','http://player.youku.com/embed/XMTYwNzQ2ODY5Ng==','http://player.youku.com/embed/XMTUzNDI0NjUwNA=='];
	$('#vidse').attr('src',arr[num]);
}
