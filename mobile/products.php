<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
include($site_root_path.'/inc/lib/product/list_lang_0.php');


$cate_nav = $db->get_all('product_category',"CateId in ('24','10','11','22')");
list($bushen,$pdpian,$pdjiao,$xbw) = $cate_nav;
$cate_nav_new[] = $xbw;
$cate_nav_new[] = $bushen;
$cate_nav_new[] = $pdpian;
$cate_nav_new[] = $pdjiao;
$pageName='pro';
$banner=$db->get_one('ad',"AId='6'");
//var_dump($cate_nav_new);exit;
switch ($_GET['CateId']) {
	case '24': 
		$pic_name = 'title_product_01.png';
		break;
	case '10': 
		$pic_name = 'title_product_02.png';
		break;
	case '11': 
		$pic_name = 'title_product_03.png';
		break;
	case '22': 
		$pic_name = 'title_product_04.png';
		break;
	default:  
		$pic_name = 'title_product_01.png';
		break;
}
$site_root_path = dirname($site_root_path);
//var_dump($title_top['CateId']);exit;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/dome1.css" />
		<!--<link rel="stylesheet" type="text/css" href="css/css.css" />-->
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con">产品中心</h1>
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
			</div>
			<div class="banners float width">
				<?php
			    for($i=0;$i<5;$i++){
				if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
				?>
				<img src="<?=$banner['PicPath_'.$i]?>" class="img" style="<?=$i==0?'':'display:none;'?>"/>
				<?php }?>
			</div>
			<section class="float width">
				<div class="stc_title"><img src="img/<?=$pic_name?>" alt="" class="img" /></div>
				<div class="_con">
					<?php 
					for($i=0,$len=count($product_row);$i<$len;$i++){
						$item=$product_row[$i];
						$url=get_url('product',$item);
					?>
					<div class="product">
						<span><a href="/mobile<?=$url?>"><img src="<?=$item['PicPath_0']?>" class="img"/></a></span>
						<p>
							<a href="/mobile<?=$url?>"><?=$item['Name']?></a>
						</p>
					</div>
					<?php }?>
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
	<script src="../js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			
			linkages('products','#t2');
		})
	</script>

</html>