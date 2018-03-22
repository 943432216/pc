/*
	无缝滚动
*/
(function(){
	var bt=jQuery('.page img');
	var absDiv=jQuery('.clients_list .abs');
	var item_img = jQuery('.clients_list .abs .clients_item');
	var imgLen=item_img.length;
	var imgWidth=187+15;
	var absDivWidth = imgLen*imgWidth;
	var scorlEvent;
	window.onload=function(){
		if(imgLen>1){
			absDiv.width(absDivWidth*2).append(item_img.clone());
		}
		//scorlEvent=window.setInterval(scorlLeft_,2000);
	}
	bt.click(function(){
		if(!absDiv.is(':animated')){
			var tag=jQuery(this).attr('tag');
			if(tag=='left'){
				scorlLeft_();
			}else{
				scorlRight_();
			}
		}
	});
	function scorlLeft_(){
		var offset = parseInt(absDiv.css('left'));
		if(offset<=-absDivWidth){
			absDiv.css('left','0');
		}
		absDiv.animate({'left':'-='+imgWidth+'px'});
	}
	function scorlRight_(){
		var offset=parseInt(absDiv.css('left'));
		if(offset>=0){
			absDiv.css('left','-'+absDivWidth+"px");		
		}
		absDiv.animate({'left':'+='+imgWidth+'px'});	
	}
})()