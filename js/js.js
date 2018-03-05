function addHover(obj,siblings,index){
	jQuery(obj).addClass('hover').siblings(siblings).removeClass('hover');
	jQuery('.list-box').hide().eq(index).show();
}
function augoscroll(objclass){
	var proItemAbsDiv=jQuery('.'+objclass);
	var proItemDl=proItemAbsDiv.children('dl');
	var proItemDlLen=proItemDl.length;
	var proItemDlWidth=268+26;
	var proItemAbsDivWidth=proItemDlLen*proItemDlWidth;
	var scroll_event;
	if(proItemDlLen >=4){
		proItemAbsDiv.width(proItemAbsDivWidth*2).append(proItemDl.clone());
		scroll_event=window.setInterval(function(){scroll_left(proItemAbsDiv,proItemAbsDivWidth)},30);
		proItemAbsDiv.hover(
			function(){
				clearInterval(scroll_event);	
			},
			function(){
				scroll_event=setInterval(function(){scroll_left(proItemAbsDiv,proItemAbsDivWidth)},30)
			}
		);
	}
}
function scroll_left(a,aWidth){
	var offset=parseInt(jQuery(a).css('left'));
	if(offset<=-aWidth){
		jQuery(a).css('left','0px');
	}
	jQuery(a).css('left','-=1px');
}
function mycheckform(fm){
	for(var i=0;i<fm.length; i++){
		if(fm[i].type=='hidden'){
			continue;
		}
		if(fm[i].value==fm[i].defaultValue){
			fm[i].value='';
		}
	}
	return checkForm(fm);
}
function myonfocus(obj){
	if(obj.value==obj.defaultValue){
		obj.value='';
	}
}
function myonblur(obj){
	if(obj.value==''){
		obj.value=obj.defaultValue;
	}
}

/*-----------------------------------------------------------*/
function AddFavorite(sURL, sTitle){
    try{
        window.external.addFavorite(sURL, sTitle);
    }catch(e){
        try{
            window.sidebar.addPanel(sTitle, sURL, "");
        }catch (e){
            alert("您的浏览器不支持此操作，请使用Ctrl+D收藏本站！");
        }
    }
}

function SetHome(obj,vrl){
        try{
                obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
        }
        catch(e){
                if(window.netscape) {
                        try {
                                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                        }
                        catch (e) {
                                if (confirm("对不起，您的浏览器不支持此操作，请您使用菜单栏工具设置。\n\n是否需要参考百度帮助中心？")){
									window.open('http://www.baidu.com/cache/sethelp/index.html', '_blank')
								}
                        }
                        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                        prefs.setCharPref('browser.startup.homepage',vrl);
                 }
				 if (confirm("对不起，您的浏览器不支持此操作，请您使用菜单栏工具设置。\n\n是否需要参考百度帮助中心？")){
					window.open('http://www.baidu.com/cache/sethelp/index.html', '_blank')
				}
        }
}