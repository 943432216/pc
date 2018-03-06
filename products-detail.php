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
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="css/pc_main.css" />
	</head>

	<body>
		<div class="xb_box overflow">
			<?php include('top.php'); ?>
			<div class="banner float width">
				<img src="img/banner_01.jpg" class="img"/>
			</div>
			<div class="sec_title left abXBs">
				<a href="#">心宝丸</a>
				<a href="#">龟鹿补肾片</a>
				<a href="#">蒲地蓝消炎片</a>
				<a href="#">蒲地蓝消炎胶囊</a>
			</div>
			<section class="left position con_bg" >
				<div class="details_top">
					<div class="details_tle left">
						<img src="img/pro2.png"/>
					</div>
					<div class="details_tri left">
						<h1>龟鹿补肾片---新包装铁盒装 96片</h1>
						<ul>
							<li>【商品名称】龟鹿补肾片</li>
							<li>【通用名称】龟鹿补肾片</li>
							<li>【生产企业】广东心宝药业科技有限公司</li>
							<li>【商品规格】 96片</li>
							<li>【功能主治】壮筋骨，益气血，补肾。用于身体虚弱，精神疲乏，腰腿酸软，头晕目眩，夜多小便，健忘失眠。</li>
						</ul>
					</div>
					<div class="picsmall">
						<div>
							<p></p>
							<p></p>
							<?php for($i=0;$i<5;$i++){
								if(!is_file($site_root_path.$product_row['PicPath_'.$i]))continue;	 
							?>
							<span><img src="<?=str_replace('s_', '111X85_', $product_row['PicPath_'.$i]);?>"/></span>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="details_con">
					<span>主治功能</span>
					<span class="avts">注意事项</span>
					<span>产品说明书</span>
					<div><img src="img/product_con.png" class="img"/></div>
					<div></div>
					<div></div>
				</div>
			</section>
			<div class="about_details">
				<div class="product_details">
					<div class="about_tl">
						<h2 class="left">相关产品</h2>
						<a href="#">更多 》》</a>
					</div>
					<ul>
						<li>
							<a href="#">
								<img src="img/pro2.png" />
								<p>龟鹿补肾片</p>
							</a>							
						</li>
						<li>
							<a href="#">
								<img src="img/pro2.png" />
								<p>龟鹿补肾片</p>
							</a>							
						</li>
						<li>
							<a href="#">
								<img src="img/pro2.png" />
								<p>龟鹿补肾片</p>
							</a>							
						</li>
						<li>
							<a href="#">
								<img src="img/pro2.png" />
								<p>龟鹿补肾片</p>
							</a>							
						</li>
						<li>
							<a href="#">
								<img src="img/pro2.png" />
								<p>龟鹿补肾片</p>
							</a>							
						</li>
					</ul>
				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function() {
				$('.abXBs').find('a').eq(0).css('margin-left','30%')
			})
		</script>
	</body>

</html>