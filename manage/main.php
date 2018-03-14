<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>网站后台管理系统</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">html,body{overflow:hidden;}</style>
<script language="javascript" src="../js/lang/manage.php"></script>
<script language="javascript" src="../js/global.js"></script>
<script language="javascript" src="../js/manage.js"></script>
</head>

<body>
<div id="loading"><noscript>您的浏览器还未启用Javascript，请先启用！</noscript><br /><br /><img src="images/loading.gif" /></div>
<div id="ly200">
	<div id="topMenu">
		<div id="top" style="background: url('images/logo.png') no-repeat;"><div id="service_tel">售后服务热线：020-89052455</div></div>
	</div>
	<div id="loginInfo">
		<div id="member">您好，<span>admin123</span>！欢迎您使用本系统！上次登录IP：<span>117.136.79.10</span>，时间：<span>2018-02-28 01:52:43</span>，本次登录IP：<span>113.109.210.165</span></div>
		<div id="link">
			<a class="q0" href="/" target="_blank">网站首页</a>
			<a class="q1" href="javascript:void(0);" onclick="this.blur(); openWindows('win_admin_update_pwd', this.innerHTML, 'admin/password.php');">修改我的密码</a>
			<a class="q2" href="admin/logout.php">安全退出</a>
		</div>
	</div>
	<div id="contents">
		<div id="leftMenu">
			<div id="menu">
				<div id="menu_index"><strong>后台管理中心</strong></div>
					<div id="dmenu" onclick="show_hidden_menu_list(0, this)"><strong>系统全局设置</strong></div>
					<ul id="menu_list_0">
								<li><span class="span" onclick="this.blur(); openWindows('win_global_set', this.innerHTML, 'set/global.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">系统全局设置</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_send_mail_set', this.innerHTML, 'set/send_mail.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">邮件发送设置</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(1, this)"><strong>文章管理系统</strong></div>
					<ul id="menu_list_1">
								<li><span class="span" onclick="this.blur(); openWindows('win_info_category', this.innerHTML, 'info/category.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">文章类别管理</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_info', this.innerHTML, 'info/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">文章管理系统</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(2, this)"><strong>心肾同治</strong></div>
					<ul id="menu_list_2">
								<li><span class="span" onclick="this.blur(); openWindows('win_info2_category', this.innerHTML, 'info2/category.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">心肾同治分类管理</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_info2', this.innerHTML, 'info2/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">心肾同治管理系统</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(3, this)"><strong>信息管理系统</strong></div>
					<ul id="menu_list_3">
								<li><span class="span" onclick="this.blur(); openWindows('win_article_group_0', this.innerHTML, 'article/index.php?GroupId=0')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">网站信息管理</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_article_group_1', this.innerHTML, 'develop/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">发展历程</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_article_group_1', this.innerHTML, 'honor/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">企业荣誉</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_article_group_1', this.innerHTML, 'article/index.php?GroupId=1')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">关于我们</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_article_group_2', this.innerHTML, 'article/index.php?GroupId=2')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">联系我们</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(4, this)"><strong>产品管理系统</strong></div>
					<ul id="menu_list_4">
								<li><span class="span" onclick="this.blur(); openWindows('win_product_category', this.innerHTML, 'product/category.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">产品分类管理</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_product', this.innerHTML, 'product/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">产品管理系统</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(5, this)"><strong>反馈管理系统</strong></div>
					<ul id="menu_list_5">
								<li><span class="span" onclick="this.blur(); openWindows('win_feedback', this.innerHTML, 'feedback/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">在线留言管理</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(6, this)"><strong>后台用户管理</strong></div>
					<ul id="menu_list_6">
								<li><span class="span" onclick="this.blur(); openWindows('win_admin', this.innerHTML, 'admin/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">后台用户管理</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_admin_update_pwd', this.innerHTML, 'admin/password.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">修改我的密码</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(7, this)"><strong>其他相关管理</strong></div>
					<ul id="menu_list_7">
								<li><span class="span" onclick="this.blur(); openWindows('win_ad', this.innerHTML, 'ad/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">广告图片管理</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_links', this.innerHTML, 'links/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">友情链接管理</span></li>
					</ul>
					<div id="dmenu" onclick="show_hidden_menu_list(8, this)"><strong>辅助管理选项</strong></div>
					<ul id="menu_list_8">
								<li><span class="span" onclick="this.blur(); openWindows('win_manage_log', this.innerHTML, 'manage_log/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">网站管理日志</span></li>
								<li><span class="span" onclick="this.blur(); openWindows('win_database', this.innerHTML, 'database/index.php')" onmouseover="this.className='span_hover';" onmouseout="this.className='span';">数据库管理</span></li>
								<li><a href="phpmyadmin/index.php" target="_blank">phpMyAdmin</a></li>
					</ul>
			</div>
		</div>
		<div id="rightContents">			
			<div id="windowsNav"><div id="windowsList"></div></div>
			<div id="desktop"><div id="workWindows"></div></div>
		</div>
	</div>
	<div id="footer"><div id="copyright"><a href="http://www.ly200.com/" target="_blank">广州联雅网络科技有限公司 &copy; 版权所有</a></div></div>
</div><iframe src="about:blank" id="checkiframe" style="display:none;"></iframe>
<script language="javascript">
window.onresize=ly200_init;
window.onload=function(){
	ly200_init('load');
	openWindows('win_manage_index_page', '后台首页', 'system/index.php');
}
</script>
</body>
</html>