<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
$pageName='index';
$company_states = $db->get_limit('info', 'CateId=1', 'InfoId,ExtUrl,Title,ThumbPic,BriefDescription,PageUrl', 'InfoId desc', 1, 3);
$industry_states = $db->get_limit('info', 'CateId=2', 'InfoId,ExtUrl,Title,ThumbPic,BriefDescription,PageUrl', 'InfoId desc', 1, 3);
// $products = $db->get_limit('product', 1, 'ProId,ExtUrl,Title,ThumbPic,BriefDescription,PageUrl', 'ProId desc', 1, 3);
$recommend_1 = $db->get_limit('product', 'IsRecommend=1', '*', 'ProId desc', 0, 3);
$recommend_2 = $db->get_limit('product', 'IsRecommend=2', '*', 'ProId desc', 0, 3);
$recommend_3 = $db->get_limit('product', 'IsRecommend=3', '*', 'ProId desc', 0, 3);
$banner=$db->get_one('ad',"AId='1'");
// var_dump($recommend_1);exit;
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
				<div id="marquee">
					<ul>
						<?php
					     for($i=0;$i<5;$i++){
							if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
						?>
						<li>
							<a href="<?=$banner['Url_'.$i]?>"><img src="<?=$banner['PicPath_'.$i]?>"></a>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<section class="left position china_bg">
				<span class="video_left"><img src="img/video_left.png"/></span>
				<span class="video_right"><img src="img/video_right.png"/></span>
				<div class="sec_stl"><img src="img/pc_msg.png" class="img"/></div>
				<div class="sec_titles left width">
					<div class="shade overflow shade_navd">
						<span class="sec_A">公司动态</span>
					</div>
					<div class="shade overflow shade_navd">
						<span>行业动态</span>
					</div>
					<div class="shade overflow shade_navd">
						<span>视频中心</span>
					</div>
				</div>
				<div class="sec_con">
					<div class="msg_boxs" style="display: block;">
						<?php foreach($company_states as $it) {?>
						<div class="msg_1">
							<div class="msg_img">
								<img src="<?=$it['ThumbPic']?>" class="img" />
							</div>
							<div class="msg_con">
								<h2><?=$it['Title']?></h2>
								<p><?=$it['BriefDescription']?></p>
								<a href="<?=$it['ExtUrl']?$it['ExtUrl']:get_url('info', $it);?>">查看详情 》》</a>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="msg_boxs">
						<?php foreach($industry_states as $it) {?>
						<div class="msg_1">
							<div class="msg_img">
								<img src="<?=$it['ThumbPic']?>" class="img" />
							</div>
							<div class="msg_con">
								<h2><?=$it['Title']?></h2>
								<p><?=$it['BriefDescription']?></p>
								<a href="<?=$it['ExtUrl']?$it['ExtUrl']:get_url('info', $it);?>">查看详情 》》</a>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="msg_boxs position">

						<div class="big_video">
							<iframe id="vidse" width="100%" height="100%" frameborder="no" scrolling="no" src='http://player.youku.com/embed/XMTc2MzQ4NTI1Ng=='></iframe>
						</div>
					</div>
				</div>
			</section>
			<section class="left position sec_bg oc">
				<div class="sec_proi"><img src="img/PC_product_tl.png" class="img"/></div>
				<div class="index_dw"></div>
				<a href="javascript:;" id="prev" class="unslider-arrow prev"></a>
				<a href="javascript:;" id="next" class="unslider-arrow next"></a>
				<div id="product_mar" class="sec_con section_pro">
					<ul>
						<li>
							<?php foreach($recommend_1 as $item) { ?>
							<a href="<?=get_url('product',$item)?>" class="pro_box">
								<div class="six_box position">
									<!--<p class="pro_name"><?=$item['Name']?></p>-->
									<div class="bx_1"></div>
									<div class="bx_2"><img src="<?=$item['PicPath_0']?>" /></div>
									<div class="bx_3"></div>
								</div>
							</a>
							<?php } ?>
						</li>
						<li>
							<?php foreach($recommend_2 as $item) { ?>
							<a href="<?=get_url('product',$item)?>" class="pro_box">
								<div class="six_box position">
									<!--<p class="pro_name"><?=$item['Name']?></p>-->
									<div class="bx_1"></div>
									<div class="bx_2"><img src="<?=$item['PicPath_0']?>" /></div>
									<div class="bx_3"></div>
								</div>
								<!--<div class="pro_details">
									<span class="left pro_de">查看更多</span>
								</div>-->
							</a>
							<?php } ?>
						</li>
						<li>
							<?php foreach($recommend_3 as $item) { ?>
							<div class="pro_box">
								<a href="<?=get_url('product',$item)?>" class="six_box position">
									<!--<p class="pro_name"><?=$item['Name']?></p>-->
									<div class="bx_1"></div>
									<div class="bx_2"><img src="<?=$item['PicPath_0']?>" /></div>
									<div class="bx_3"></div>
								</a>
								<!--<div class="pro_details">
									<span class="left pro_de">查看更多</span>
								</div>-->
							</div>
							<?php } ?>
						</li>
					</ul>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function() {
				var sehei=window.screen.width;
				if(sehei==1920){
					$('#marquee ul li').css('height','721px');
				}else{
					$('#marquee ul li').height($('#marquee ul li').height());
					
				}
				
				var unslider06 = $('#marquee').unslider({
					dots: true,
					fluid: true,
					speed:500,
					delay:5000
				});
				data06 = unslider06.data('unslider');
			//产品轮播
    			var unslider = $('#product_mar').unslider({
    				dots: true,
					fluid: true,
					speed:200,
					delay:5000
    			});

   				 $('.unslider-arrow').click(function() {
        			var fn = this.className.split(' ')[1];
      			  	unslider.data('unslider')[fn]();
				});

			})
		</script>
	</body>

</html>