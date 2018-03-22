<?php  
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

$ProId = htmlentities($_GET['ProId']);
$product_row=$db->get_one('product',"ProId='$ProId'");
$cate_nav = $db->get_all('product_category',"CateId in ('24','10','11','22')");
list($bushen,$pdpian,$pdjiao,$xbw) = $cate_nav;
$cate_nav_new[] = $xbw;
$cate_nav_new[] = $bushen;
$cate_nav_new[] = $pdpian;
$cate_nav_new[] = $pdjiao;
$product = $db->get_one('product',"ProId='$ProId'");
$CateId = $product['CateId'];
$product_description=$db->get_one('product_description',"ProId='$ProId'",'Description');
$ad_position = $db->get_one('product_category',"CateId='$CateId'",'Category');
$ad_position = $ad_position['Category'];
$banner=$db->get_one('ad',"AdPosition='$ad_position'");
//var_dump($product);exit;
switch ($product['CateId']) {
	case '24': 
		$title_top = $xbw;
		break;
	case '10': 
		$title_top = $bushen;
		break;
	case '11': 
		$title_top = $pdpian;
		break;
	case '22': 
		$title_top = $pdjiao;
		break;
	default:  
		$title_top = $xbw;
		break;
}
//var_dump($banner);exit;
//$pic_top = $db->get_one('ad',"AId='6");
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/dome1.css"/>
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
		<script type="text/javascript">
			var cate_id = <?=$product['CateId']?>;
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con"><?=$title_top['Category']?></h1>
				<div class="header_nav"></div>
			</header>
			<div class="banner float width">
				<div class="banner_navs">
					<ul>
						<?php  
							foreach ($cate_nav_new as $v) {
						?>
						<li>
							<a href="<?='products.php?CateId=' . $v['CateId']?>"><?=$v['Category']?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="banner_box">
					<div class="banner_ts">
						<div id="marquee" style="width: 100%;">
							<ul>
								<?php for($i=0;$i<5;$i++){
									if(!is_file($site_root_path.$product_row['PicPath_'.$i]))continue;	 
								?>
								<li>
									<a href="javascript:;"><img src="<?=str_replace('s_', '411X317_', $product_row['PicPath_'.$i]);?>" class="img"></a>
								</li>
								<?php }?>
							</ul>
						</div>
					</div>
					<div class="product_name">
						<h5><?=$product['Name']?></h5>
						<p><?=$product['BriefDescription']?></p>
					</div>
				</div>
			</div>
			<section class="float width">
				<div class="stc_title"><img src="img/sms.png" alt=""  class="img"/></div>
				<div class="_con position">
					
					<div class="float sd">
						<div class="det"><img src="img/logod.png" class="img"/></div>
						<pre style="margin-top: 0px; margin-bottom: 0px; padding: 0px; border: none; font-size: 14px; font-family: arial, tahoma; white-space: pre-wrap; word-wrap: break-word; word-break: normal; line-height: 1.7; color: rgb(112, 112, 112);">
						<?=$product_description['Description']?>
						</pre>
					</div>
				</div>
			</section>
			<!--<div class="blogroll">
				<div class="blogroll_left">友情链接</div>
				<div class="blogroll_right">
					<a href="http://www.360kad.com/product/575808.shtml">龟鹿补肾片-康爱多网上药店</a>
					<a href="http://www.gdda.gov.cn/publicfiles/business/htmlfiles/jsjzz/index.htm">广东省食品药品监督管理总局</a>
					<a href="http://www.sda.gov.cn/WS01/CL0001/">国家食品药品监督管理总局</a>
				</div>
			</div>
			<div class="width float">
				<iframe src="footer.html" width="100%" height="100px" frameborder="0" scrolling="no"></iframe>
			</div>-->
			<?php include('/footer.php'); ?>
		</div>
	</body>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			var hed=$('#marquee').find('.img').height()
			$('#marquee ul li').css('height',hed);
			var unslider06 = $('#marquee').unslider({
					dots: true,
					fluid: true
			});
				data06 = unslider06.data('unslider');
//-----------------------------------------------------------------			
			linkage(cate_id,'#t2','product');
		})
	</script>

</html>