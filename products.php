<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
include($site_root_path.'/inc/lib/product/list_lang_0.php');
if($CateId){
	$cur_cate=$db->get_one('product_category',"CateId='$CateId'");
}
$pageName='pro';
$banner=$db->get_one('ad',"AId='6'");
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
			<div class="sec_title left pro_title">
				<?php foreach((array)$product_cate as $item){?>
				<a href="<?=get_url('product_category',$item)?>"><?=$item['Category']?></a>
				<?php }?>
			</div>
			<section class="left position sec_bg" >
				<div class="sec_pro"><img src="img/PC_product_tl.png" class="img"/></div>
				
				<div class="sec_con section_pro">
					<div class="sec_box width left" style="display: block;">
						<?php 
						for($i=0,$len=count($product_row);$i<$len;$i++){
							$item=$product_row[$i];
							$url=get_url('product',$item);
						?>
						<div class="pro_box">
							<div class="six_box position">
								<p class="pro_name"><?=$item['Name']?></p>
								<div class="bx_1"></div>
								<div class="bx_2"><a href="<?=$url?>"><img src="<?=$item['PicPath_0']?>"/></a></div>
								<div class="bx_3"></div>
							</div>
							<div class="pro_details">
								<a href="<?=$url?>" class="left pro_de">查看更多</a>
							</div>
						</div>
						<?php }?>
						<?php if($total_pages>0){?>
						<div class="page">
							<a href="/products.php?<?=$query_string?>&page=1" class="page_item hover">首页</a>
					     	<?=turn_page_ext($page, $total_pages, $turn_page_query_string, $row_count, '上一页', '下一页', $website_url_type,1);?>
					          <a href="/products.php?<?=$query_string?>&page=<?=$total_pages?>" class="page_item hover">尾页</a>
					          <form action="/products.php?<?=query_string('page1')?>" method="GET"><div class="left">转到 <input class="page1" type="text" name="page1" onkeyup="set_number(this,0)" onpaste="set_number(this,0)" /> 页</div> <input type="submit" class="submit" onclick="return go_url();" value="Go" /></form>
					          <script type="text/javascript">
					          	function go_url(){
									var v = jQuery('.page1').val();
									window.location='/products.php?<?=query_string('page1')?>'+"&page="+parseInt(v);
									return false;
								}
					          </script>
						</div>
						<?php }?>
					</div>
					
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$('.pagenum').css('background','#fff');
			$('.pagenum').css('color','#d13600')
			$('.pagenum').css('border-color','#fff')
		</script>
	</body>

</html>