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
		$pic_src["PicPath_$i"][0] = str_replace('s_', "411X317_", $product_row["PicPath_$i"]);
		$pic_src["PicPath_$i"][1] = str_replace('s_', "111X85_", $product_row["PicPath_$i"]);
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
		<link rel="stylesheet" type="text/css" href="" id="lins" />
		<script type="text/javascript">
				var resolution = window.screen.width;
				var lins=document.getElementById('lins');
				if(resolution >= 1360 && resolution <= 1367) {
					lins.href='css/pc_1366.css';
				}else if(resolution >= 1585 && resolution <= 1601) {
					lins.href='css/pc_1600.css';
				}else if(resolution >= 1901 && resolution <= 1921) {
					lins.href='css/pc_1920.css';
				}else if(resolution > 1921) {
					lins.href='css/pc_1366.css';
				}
		</script>
		<script type="text/javascript">
			var btname=<?=$CateId?>;
			var pics=<?=$pic_src?>;
		</script>
	</head>

	<body>
		<div class="xb_box overflow">
			<?php include('top.php'); ?>
			<div class="banner left width">
				<?php
			    for($i=0;$i<5;$i++){
				if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
				?>
				<img src="<?=$banner['PicPath_'.$i]?>" class="img" style="<?=$i==0?'':'display:none;'?>"/>
				<?php }?>
			</div>
			<div class="sec_title left abXBs">
				<?php foreach((array)$product_cate as $item){?>
				<a href="<?=get_url('product_category',$item)?>"><?=$item['Category']?></a>
				<?php }?>
			</div>
			<section class="left position con_bg" >
				<div class="details_top position">
					<div class="glass"><img src=""/></div>
					<div class="details_tle left position">
						<div class="movebox"></div>
						<img src=""/>
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
					<div class="picsmall position">
						<p class="lefts"></p>
						<p class="rights"></p>
						<div class="spic overflow">
							<div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="details_con">
					<span class="con_title avts">产品说明书</span>
					<span class="con_title">主治功能</span>
					<span class="con_title">注意事项</span>
					<div style="display: block;"><?=$product_description['Description']?></div>
					<div><?=$product_description['MainTreat']?></div>
					<div><?=$product_description['CarefulThings']?></div>
				</div>
			</section>
			<div class="about_details">
				<div class="product_details">
					<div class="about_tl">
						<h2 class="left">相关产品</h2>
						<a href="/products.php?CateId=<?=$CateId?>">更多 》》</a>
					</div>
					<ul>
						<?php foreach($pro_cul_cate as $product) {?>
						<li>
							<a href="<?=get_url('product',$product)?>">
								<img src="<?=$product['PicPath_0']?>" />
								<!--<p><?=$product['Name']?></p>-->
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
				$('.abXBs').children('a').eq(0).css('margin-left','30%');
				navt(btname);
				product_pic();
				$('.rights').click(function(){
					$('.spic div').animate({
						'margin-left':'-150px'
					},'200','linear');
				}),$('.lefts').click(function(){
					$('.spic div').animate({
						'margin-left':'0'
					},'200','linear');
				})
				
			})
		</script>
	</body>

</html>