(function($){
	var curIndex=0;
	var tag_a=$('.banner_point a');
	var len=$('.banner_list').length;
	var myevent;
	myevent = window.setInterval(autochange,5000);
	$('.r_b').click(function(){
		clearInterval(myevent);
		(curIndex<(len-1))?curIndex++:curIndex=0;
		tag_a.removeClass('hover').eq(curIndex).addClass('hover');
		$('.banner_list').stop(true,true).fadeOut(1000).eq(curIndex).stop(true,true).fadeIn(1400);
		myevent = window.setInterval(autochange,5000);
	});
	$('.l_b').click(function(){
		clearInterval(myevent);
		(curIndex>0)?curIndex--:curIndex=len-1;
		tag_a.removeClass('hover').eq(curIndex).addClass('hover');
		$('.banner_list').stop(true,true).fadeOut(1000).eq(curIndex).stop(true,true).fadeIn(1400);
		myevent = window.setInterval(autochange,5000);
	});
	tag_a.click(function(){
		if(curIndex==tag_a.index(this)){
			return;
		}
		clearInterval(myevent);
		curIndex=tag_a.index(this);
		tag_a.removeClass('hover').eq(curIndex).addClass('hover');
		$('.banner_list').stop(true,true).fadeOut(1000).eq(curIndex).stop(true,true).fadeIn(1400);
		myevent = window.setInterval(autochange,5000);
	});
	function autochange(){
		(curIndex<(len-1))?curIndex++:curIndex=0;
		tag_a.removeClass('hover').eq(curIndex).addClass('hover');
		$('.banner_list').stop(true,true).fadeOut(1000).eq(curIndex).stop(true,true).fadeIn(1400);
	}
})(jQuery)
	