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
			},
//			mouseout:function(){
//				
//			}
		})
	})
})