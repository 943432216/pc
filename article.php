<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

$AId=(int)$_GET['AId'];
if(!isset($article_row)){
	$article_row=$db->get_one('article',"AId='$AId'");
	$GroupId=(int)$article_row['GroupId'];
}
$group_txt=array(
	1=>	array('A','bout us','关于心宝'),
	2=>	array('C','ontent us','联系心宝'),
	3=>	array('H','eart Tongzhi','心肾同治')
);
$pageName='art';
if($GroupId==1){
	$banner=$db->get_one('ad',"AId='3'");
}elseif($GroupId==2){
	$banner=$db->get_one('ad',"AId='8'");
}
$dev_arr = $db->get_all('develop', 1, 'dev_cate,time,pic_src,happen', 'time asc');
foreach ($dev_arr as $k => $v) {
	$dev_arr[$k]['time'] = date('m/d/Y', $v['time']);
}
// var_dump($dev_arr);exit;
$dev_str = json_encode($dev_arr, JSON_UNESCAPED_UNICODE);
$hor_arr = $db->get_all('honor', 1, 'hor_src,hor_commend');
$hor_str = json_encode($hor_arr, JSON_UNESCAPED_UNICODE);

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="css/pc_1600.css" id="lins"/>
		<script type="text/javascript">
			var lcs=<?=$dev_str?>;
			var ry=<?=$hor_str?>;
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
				<img src="<?=$banner['PicPath_'.$i]?>" style="<?=$i==0?'':'display:none;'?>" class="img"/>
				<?php }?>
			</div>
			<section class="left position" >
				<div class="sec_stl"><img src="img/stl.png" class="img"/></div>
				<div class="sec_title left width abXB">
					<?php foreach((array)$art_group[$GroupId] as $item){?>
					<a href="<?=get_url('article',$item)?>"><?=$item['Title']?></a>
					<?php }?>
				</div>
				<div class="sec_con">
					<div class="sec_box width left" style="display: block;">
						<?php if($AId == 6) { ?>
						<div class="XB_lc">
						
						</div>
						<?php } ?>
						<?php if($AId == 4) { ?>
						<span class="dir_con left overflow">
							<p class="left width">衷心感谢关注心宝药业的各界朋友们：</p>
							<p class="left width">心宝药业已经走过了30多年的发展历程。</p>
							<p class="left width">30年前，心宝丸的问世与造福国人，凝聚了太多人的智慧与汗水，同时也成就了今天的心宝药业在此，我衷心的感谢大家！</p>
							<p class="left width">一路走来，我们坚持诚实守信，合作共赢的经营理念。确立了“行仁心制仁药，怀德心纳贤才，重信心共发展”的核心价值观。</p>
							<p class="left width">时代在前进，市场在变化，心宝人将始终怀着“铸就百年心宝，造福天下苍生”的执着与梦想，聚焦行业，做强做大。以生产质量可靠、疗效确切的产品为己任。</p>
							<p class="left width">无论岁月怎么变化，心宝药业将是您永远最可信赖的朋友。</p>
						</span>
						<span class="dir_pic left overflow">
							<img src="img/dsz.jpg" class="img"/>
							<p>(&nbsp;董事长郭永周&nbsp;)</p>
						</span>
						<?php } ?>
						<?php if($AId == 15) { ?>
						<div class="XB_ry">
							
						</div>
						<?php } ?>
						<?php if(!in_array($AId, array(4,6,15))) { 
							echo $article_row['Contents'];
						}
						?>
					</div>
					
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
					$('.abXB').find('a').eq(0).css('margin-left','26%');
				}else if(sehei==1600){
					$('.abXB').find('a').eq(0).css('margin-left','24%');
				}else{
					$('.abXB').find('a').eq(0).css('margin-left','22%');
				}
				$('.sec_box').find('*').removeAttr('style');
				$('.sec_box').find('img').addClass('img')
//				var $lcleft='<span class="lc_left"><h3></h3><p><b><img src="" class="img"/></b><b></b></p></span>';
//				var $lcright='<span class="lc_right"><h3></h3><p><b></b><b><img src="" class="img"/></b></p></span>';
//				console.log(lcs);
//				$.each(lcs,function(a,b){
//					if(a%2==0){
//						$('.XB_lc').append($lcleft);
//						$('.XB_lc').children('span').eq(a).find('h3').html(b.time);
//						$('.XB_lc').children('span').eq(a).find('img').attr('src',b.pic_src);
//						$('.XB_lc').children('span').eq(a).find('b').eq(1).html(b.happen);
//					}else{
//						$('.XB_lc').append($lcright);
//						$('.XB_lc').children('span').eq(a).find('h3').html(b.time);
//						$('.XB_lc').children('span').eq(a).find('img').attr('src',b.pic_src);
//						$('.XB_lc').children('span').eq(a).find('b').eq(0).html(b.happen);
//					}
//					
//				});
				glory('.XB_ry',ry);
				xllc(lcs)
			})
		</script>
	</body>

</html>