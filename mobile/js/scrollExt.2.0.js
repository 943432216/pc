/**
 *	author:liaoyaping
 *	time:2014-11-25
 *	email:262313204@qq,cin
 *	示例用法【直接将html代码复制到页面上，包含jQuery 和 该JS文件即可】
 *	为了使用更灵活，所以很多参数都需要在使用的时候才配置
 */
/*
<!--html-->
.test1{width:300px;height:200px;position:relative; border:1px solid red;}
.test1 ul{width:300px;height:1000px;}
.test1 ul li{width:300px;height:200px; background:gray;}
.test1 ul li.a{background:red;}
.test1 .pre{position:absolute;top:0;left:30px;background:green; z-index:100;width:50px;height:50px;}
.test1 .next{position:absolute;bottom:0;left:30px;background:#009; z-index:100;width:50px;height:50px;}
</style>
<div class="test1">
	<div class="pre"></div>
	<ul>
     	<li>1111111</li>
     	<li class="a">2222222</li>
     </ul>
	<div class="next"></div>
</div>
<!--html-->
<!--jscription-->
 var p={
		domAbsDiv:'.index_news_abs',
		bottom_l:'.index_about_title .pre',
		bottom_r:'.index_about_title .next',
		animateType:'step',
		step:317,
		domItemWidth:317,
		domItem:'.index_news_abs li',
		minItem:1,
		time:2000,
		hasAuto:false,
	};
	new scrollExt(p).start();
	new scrollExt({
		hasAuto:true,
		domAbsDiv:'.test1 ul',
		domItem:'.test1 ul li',
		bottom_l:'.test1 .pre',
		bottom_r:'.test1 .next',
		defaultTo:'top',
		animateType:'step',
		domItemHeight:200,
		direction:'t_b',
		step:200,
		time:3000
	}).start();
<!--jscription-->
*/
function scrollExt(p){ 

	var _this = this;
	var defaultParam = {
				hasAuto		:	true,				//true  有自动滚动  false  没有自动滚动， 点击一下滚动一下。【产品详细页面小图片切换	】
				hasHover		:	true,				//是否有鼠标移入移出事件，默认为有	
				hasChange		:	true,				//是否有切换事件			【没有自动滚动的时候，或者自动滚动需要切换方向的时候需要配置】
				
				domAbsDiv		:	'',					//容纳每一个小元素的容器
				domItem		:	'',					//里面每一个小元素
				domItemWidth	:	'',					//每一个滚动元素的宽度，  【左右滚动的时候需要配置】
				domItemHeight	:	'',					//每一个滚动元素的高度，  【上下滚动的时候需要配置】
				minItem		:	2,					//执行动画的最小子元素个数 
				
				bottom_l		:	'',					//向右或者向下的切换按钮类或者ID名称【如果有切换方向或者点击滚动效果，需要配置】
				bottom_r		:	'',					//向右或者向下的切换按钮类或者ID名称【如果有切换方向或者点击滚动效果，需要配置】
				
				defaultTo		:	'right',				//默认运动方向			【right,top,bottom】
				step			:	'1',					//每一次执行所移动的距离  【自动滚动时一般为1，图片整张滚动时，需要算上margin和padding值】
				direction		:	'l_r',				//动画的走向	l_r为左右		t_b为上下走向
				//animateTime	:	'1000',				//动画的速率		   【点击滚动的时候需要配置，】
				animateType	:	'scroll',			//step 为步长 		   【scroll:无缝1像素滚动】
				time			:	1000				//频率			   【自动滚动的时候需要配置】
					
	};
	var param = jQuery.extend({},defaultParam,p);		//合并
	
	//初始化数据
	var initi = function(){
		_this.domAbsDiv 	= 	$(param.domAbsDiv);	
		_this.bottom_l	 	=	$(param.bottom_l);
		_this.bottom_r	 	= 	$(param.bottom_r);
		_this.domItem	 	= _this.domAbsDiv.children(param.domItem);
		_this.domItemLen    = _this.domItem.size();
		_this.domItemWidth  = parseInt(param.domItemWidth);
		_this.domItemHeight = parseInt(param.domItemHeight);
		_this.absDivWidth   = _this.domItemLen*_this.domItemWidth;
		_this.absDivHeight  = _this.domItemLen*_this.domItemHeight;
		
		_this.step = parseInt(param.step);
		_this.time = parseInt(param.time);
		_this.animateTime = parseInt(param.animateTime);
		
		if(_this.domItemLen >= param.minItem){
			if(param.direction=='l_r'){
				//计算实际长度
				_this.domAbsDiv.width(_this.absDivWidth*2).append(_this.domItem.clone());	
			}else if(param.direction=='t_b'){
				_this.domAbsDiv.height(_this.absDivHeight*2).append(_this.domItem.clone());
			}
		}
		//鼠标事件
		if(param.hasHover==true){
			_this.domAbsDiv.hover(
				function(){
					clearInterval(_this.myevent);
				},
				function(){
					_this.start();
				}
			);
		}
		if(param.hasChange==true){
			
				_this.bottom_l.click(function(){			
					if(param.hasAuto==true){
						clearInterval(_this.myevent);
						param.direction=='l_r'?param.defaultTo='left':param.defaultTo='top';
						_this.start();
					}else{
						if(!_this.domAbsDiv.is(':animated')){								
							if(param.direction=='l_r'){
								_this._scrollLeft();
							}else if(param.direction=='t_b'){
									_this._scrollTop();			
							}
						}
					}
				});
				_this.bottom_r.click(function(){
					if(param.hasAuto==true){
						clearInterval(_this.myevent);
						param.direction=='l_r'?param.defaultTo='right':param.defaultTo='bottom';
						_this.start();
					}else{
						if(!_this.domAbsDiv.is(':animated')){
							if(param.direction=='l_r'){
								_this._scrollRight();
							}else if(param.direction=='t_b'){
								_this._scrollBottom();
							}
						}
					}
				});
		}
		
	};
	initi();
	this.start = function(){
		
		//判断是否符合设置滚动最小元素的个数
		if(_this.domItemLen >= param.minItem){
			//有自动运行
			if(param.hasAuto==true){
				if(param.direction=='l_r'){
					if(param.defaultTo=='left'){
						_this.myevent = setInterval(_this._scrollLeft,param.time);
					}else if(param.defaultTo=='right'){
						_this.myevent = setInterval(_this._scrollRight,param.time);
					}
				}else if(param.direction=='t_b'){
					if(param.defaultTo=='top'){
						_this.myevent = setInterval(_this._scrollTop,param.time);
					}else if(param.defaultTo=='bottom'){
						_this.myevent = setInterval(_this._scrollBottom,param.time);
					}			
				}
			}
		}
		
	};

	this._scrollRight = function(){
		if(_this.domAbsDiv.is(':animated'))return;
		var offset = parseInt(_this.domAbsDiv.css('marginLeft'));
		if(offset<=-_this.absDivWidth){
			_this.domAbsDiv.css('marginLeft','0px');
		}
			param.animateType=='scroll'?_this.domAbsDiv.css('marginLeft','-='+_this.step+'px'):_this.domAbsDiv.animate({'marginLeft':'-='+_this.step+'px'});	
	};

	this._scrollLeft = function(){	
		if(_this.domAbsDiv.is(':animated'))return;
		var offset = parseInt(_this.domAbsDiv.css('marginLeft'));
		if(offset>=0){
			_this.domAbsDiv.css('marginLeft',(-_this.absDivWidth)+'px');
		}			
		param.animateType=='scroll'?_this.domAbsDiv.css('marginLeft','+='+_this.step+'px'):_this.domAbsDiv.animate({'marginLeft':'+='+_this.step+'px'});
	};

	this._scrollBottom = function(){
		var offset = parseInt(_this.domAbsDiv.css('marginTop'));
		if(offset<=-_this.absDivHeight){
			_this.domAbsDiv.css('marginTop','0px');
		}	
		param.animateType=='scroll'?_this.domAbsDiv.css('marginTop','-='+_this.step+'px'):_this.domAbsDiv.animate({'marginTop':'-='+_this.step+'px'});
	};

	this._scrollTop = function(){
		var offset = parseInt(_this.domAbsDiv.css('marginTop'));
		if(offset>=0){
			_this.domAbsDiv.css('marginTop',(-_this.absDivHeight)+'px');
		}
		_this.animateType=='scroll'?_this.domAbsDiv.css("marginTop","+="+_this.step+"px"):_this.domAbsDiv.animate({"marginTop":"+="+_this.step+"px"});	
	};
}