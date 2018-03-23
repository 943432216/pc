<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
$pageName='index';
$company_state = $db->get_all('info', 'CateId=1', 'InfoId,ThumbPic,Title,BriefDescription', 'InfoId desc limit 20');
// $industry_state = $db->get_all('info', 'CateId=2', 'InfoId,ThumbPic,Title,BriefDescription,PageUrl', 'InfoId desc');
// $clinic_use = $db->get_all('info2', 'CateId=9', 'InfoId,ThumbPic,Title,BriefDescription,PageUrl', 'InfoId desc');
// $health_bushen = $db->get_all('info2', 'CateId=10', 'InfoId,ThumbPic,Title,BriefDescription,PageUrl', 'InfoId desc');
for ($i=0; $i<20; $i++) {
	$company_state[$i]['state_url'] = '/info-detail.php?InfoId=' . $company_state[$i]['InfoId'];
}
$company_state = json_encode($company_state, JSON_UNESCAPED_UNICODE);
//var_dump($company_state);exit;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
		<script type="text/javascript">
			var company_state = <?=$company_state?>;
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con">首页</h1>
				<div class="header_nav"></div>
			</header>
			<div class="banner float width">
				<div id="marquee">
					<ul>
						<?php
						if($pageName=='index'){
							$banner=$db->get_one('ad',"AId='1'");
							for($i=0;$i<5;$i++){
								if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
						?>
						<li>
							<a href="javascript:;"><img src="<?=$banner['PicPath_'.$i]?>" class="img"></a>
						</li>
						<?php }}?>
					</ul>
				</div>
			</div>
			<div class="nav width float">
				<div class="nav_icon">
					<span>
						<p><a href="article.php?AId=3"><img src="img/nav_01.png" class="img"/></a></p>
						<p><a href="article.php?AId=3">关于心宝</a></p>
					</span>
					<span>
						<p><a href="products.php?CateId=24"><img src="img/nav_02.png" class="img"/></a></p>
						<p><a href="products.php?CateId=24">产品中心</a></p>
					</span>
					<span>
						<p><a href="info2.php?CateId=8"><img src="img/nav_03.png" class="img"/></a></p>
						<p><a href="info2.php?CateId=8">心肾同治</a></p>
					</span>
					<span>
						<p><a href="info.php?CateId=1"><img src="img/nav_04.png" class="img"/></a></p>
						<p><a href="info.php?CateId=1">最新动态</a></p>
					</span>
				</div>
				<!--<div class="nav_icon">
					<span>
						<p><a href="/info.php?CateId=1"><img src="img/nav_04.png" class="img"/></a></p>
						<p><a href="/info.php?CateId=1">最新动态</a></p>
					</span>
					<span>
						<p><a href="/contact.php?AId=11"><img src="img/nav_05.png" class="img"/></a></p>
						<p><a href="/contact.php?AId=11">联系心宝</a></p>
					</span>
					<span>
						<p><a href="https://sso.jingoal.com/#/login"><img src="img/nav_06.png" class="img"/></a></p>
						<p><a href="https://sso.jingoal.com/#/login">员工登录</a></p>
					</span>
				</div>-->
			</div>
			<section class="float width scrolls">
				<div class="stc_title"><img src="img/title.png" alt="" class="img" /></div>
				<div id="_con" class="_con soills">
					<ul id="new_boxs" class="new_boxs float">
						
					</ul>
					
				</div>
				<div class="logol"><img src="img/logos.png" class="img"/></div>
			</section>
			<div class="width float new_bt">
				<div class="moreNew">
					<a href="info.php?CateId=1">了解更多企业动态</a>
				</div>
			</div>
			<?php include('footer.php'); ?>

		</div>
	</body>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			$('.sy').children('div').addClass('bgcolor')
			$('#t0').css('background','#B60005');
			$('.staOne').children('ul').slideUp();
			var hed=$('#marquee').find('.img').height()
			$('#marquee ul li').css('height',hed);
			var unslider06 = $('#marquee').unslider({
					dots: true,
					fluid: true
			});
				data06 = unslider06.data('unslider');
			$('.header_nav').click(function() {
				$('.i_ul').toggle(500);
			})
			$('.staOne').click(function() {
//				$('.staOne').children('ul').slideUp();
				$(this).children('ul').slideToggle();
			})
			cj(company_state);		
			starts()
		});
	</script>
	

</html>