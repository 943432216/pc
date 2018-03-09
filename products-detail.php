<?php  
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

if(!isset($product_row)){
	$ProId=(int)$_GET['ProId'];
	$product_row=$db->get_one('product',"ProId='$ProId'");
	$product_description=$db->get_one('product_description',"ProId='$ProId'",'Description,MainTreat,CarefulThings');
	$product_ext=$db->get_one('product_ext',"ProId='$ProId'");
	$CateId=(int)$product_row['CateId'];
	if($CateId){
		$cur_cate=$db->get_one('product_category',"CateId='$CateId'");
	}
}
$pageName='pro';
$banner=$db->get_one('ad',"AId='6'");
$pro_cul_cate = $db->get_all('product', "CateId=$cur_cate[CateId]", '*', 'ProId desc limit 5');
if(($sum_pro = count($pro_cul_cate)) < 5) {
	$less_pro = 5 - $sum_pro;
	$porducts = $db->get_all('product', "CateId!=$cur_cate[CateId]");
	$porducts_sum = count($porducts) - 1;
	for($i = 0; $i < $less_pro; $i++) {
		$pro_cul_cate[] = $porducts[mt_rand(0, $porducts_sum)];
	}
}
for($i = 0; $i<=7; $i++ ) {
	if (!empty($product_row["PicPath_$i"])) {
		$pic_src["PicPath_$i"]['big'] = str_replace('s_', "411X317_", $product_row["PicPath_$i"]);
		$pic_src["PicPath_$i"]['small'] = str_replace('s_', "111X85_", $product_row["PicPath_$i"]);
	}
}
$pic_src = json_encode($pic_src);
// var_dump($pic_src);exit;
//$pic_top = $db->get_one('ad',"AId='6");
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="css/pc_1600.css" />
		<script type="text/javascript">
			var btname=<?=$CateId?>;
			var pics=<?=$pic_src?>;
		</script>
	</head>

	<body>
		<div class="xb_box overflow">
			<?php include('top.php'); ?>
			<div class="banner float width">
				<img src="img/banner_01.jpg" class="img"/>
			</div>
			<div class="sec_title left abXBs">
				<?php foreach((array)$product_cate as $item){?>
				<a href="<?=get_url('product_category',$item)?>"><?=$item['Category']?></a>
				<?php }?>
			</div>
			<section class="left position con_bg" >
				<div class="details_top">
					<div class="details_tle left">
						<img src="<?=str_replace('s_', "411X317_", $product_row['PicPath_0']);?>"/>
					</div>
					<div class="details_tri left">
						<h1><?=$product_row['Name']?></h1>
						<ul>
							<li>【商品名称】<?=$product_ext['value_1']?></li>
							<li>【通用名称】<?=$product_ext['value_2']?></li>
							<li>【生产企业】<?=$product_ext['value_3']?></li>
							<li>【商品规格】<?=$product_ext['value_4']?></li>
							<li>【功能主治】<?=format_text($product_row['BriefDescription'])?></li>
						</ul>
					</div>
					<div class="picsmall">
						<div>
							<p></p>
							<p></p>
							<?php for($i=0;$i<3;$i++){
								if(!is_file($site_root_path.$product_row['PicPath_'.$i]))continue;	 
							?>
							<span><img src="<?=str_replace('s_', '111X85_', $product_row['PicPath_'.$i]);?>"/></span>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="details_con">
					<span class="con_title">主治功能</span>
					<span class="avts con_title">注意事项</span>
					<span class="con_title">产品说明书</span>
					<div><?=$product_description['MainTreat']?></div>
					<div><?=$product_description['CarefulThings']?></div>
					<div><?=$product_description['Description']?></div>
				</div>
			</section>
			<div class="about_details">
				<div class="product_details">
					<div class="about_tl">
						<h2 class="left">相关产品</h2>
						<a href="#">更多 》》</a>
					</div>
					<ul>
						<?php foreach($pro_cul_cate as $product) {?>
						<li>
							<a href="#">
								<img src="<?=$product['PicPath_0']?>" />
								<p><?=$product['Name']?></p>
							</a>							
						</li>
						<?php } ?>
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
				$('.abXBs').find('a').eq(0).css('margin-left','30%');
				navt(btname);
				console.log(pics)
			})
		</script>
	</body>

</html>