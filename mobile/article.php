<?php  
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

if(!isset($article_row)){
	$AId=(int)$_GET['AId'];
	$article_row=$db->get_one('article',"AId='$AId'");
	$GroupId=(int)$article_row['GroupId'];
}
switch ($_GET['AId']) {
	case '3': 
		$pic_name = 'title_about_01.png'; 
		break;
	case '6': 
		$pic_name = 'title_about_02.png'; 
		break;
	case '7': 
		$pic_name = 'title_about_03.png'; 
		break;
	case '15': 
		$pic_name = 'title_about_04.png'; 
		break;
	case '4': 
		$pic_name = 'title_about_05.png'; 
		break;	
	default:  
		$pic_name = 'title_about_01.png'; 
		break;
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

$dev_arr = $db->get_all('develop', 1, 'dev_cate,time,pic_src,happen');
$dev_str = json_encode($dev_arr, JSON_UNESCAPED_UNICODE);
$hor_arr = $db->get_all('honor', 1, 'hor_src,hor_commend');
$hor_str = json_encode($hor_arr, JSON_UNESCAPED_UNICODE);
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes"/>
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/dome.css"/>
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
		<script type="text/javascript">
			var lc=<?=$dev_str?>;
			var ry=<?=$hor_str?>;
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con">关于心宝</h1>
				<div class="header_nav"></div>
			</header>
			<div class="banner float width">
				<div class="banner_nav">
					<ul>
						<?php foreach((array)$art_group[$GroupId] as $item){?>
						<li class="b1"><a href="/mobile<?=get_url('article',$item)?>"><?=$item['Title']?></a></li>
						<?php }?>
					</ul>
				</div>
				<?php
			    for($i=0;$i<5;$i++){
					if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
				?>
				<div class="banners">
					<img src="<?=$banner['PicPath_'.$i]?>" class="img" style="<?=$i==0?'':'display:none;'?>"/>
				</div>
				<?php }?>
			</div>
			<section class="float width b1">
				<div class="stc_title"><img src="img/<?=$pic_name?>" alt=""  class="img"/></div>
				<div class="_con">
					<?php if($AId == 6) { ?>
						<div class="exper">
							<!--<div class="float width overflow ex_box">
								<span class="lc_con">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_conr">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_con">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_conr">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_con">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_conr">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_con">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>
							<div class="float width overflow ex_box">
								<span class="lc_conr">
									<h3>1984</h3>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
									<div class="lc_conbox width float">
										<p>被誉为“中国救心丸”的星辰牌“心宝丸”在广东省药物研究所震撼问世</p>
										<img src="img/lcpc.png"/>
									</div>
								</span>
							</div>-->
						</div>
					<?php } ?>
					<?php if($AId == 15) { ?>
						<div class="ry">
							<!--<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>
							<span class="ry_box float">
								<img src="img/zs.png" class="img"/>
								<p class="width float">星辰品牌心宝丸荣获中国药品市场消费者满意首选品牌</p>
							</span>-->
						</div>
					<?php } ?>
					<?php if ($_GET['AId'] == '4') {?>
						<div class="chairman">
							<div class="logor"></div>
							<div class="chair_con">
								<span class="cha_nr">
									<h3>衷心感谢关注心宝药业的各界朋友：</h3>
									<p>心宝药业已经走过了30多年的发展历程。</p>
									<p>30年前，心宝丸的问世与造福于国人，凝聚了太多人的智慧与汗水，同时也成就了今天的心宝药业。在此我衷心的感谢大家！</p>
									<p>一路走来，我们坚持诚实守信，合作共赢的经营理念。确立了“行仁心制仁药，怀德心纳贤才，重信心共发展”的核心价值观。</p>
									<p>时代在前进，市场在变化，心宝人将始终怀着“铸就百年心宝，造福天下苍生”的执着与梦想，聚焦主页，做强做大。以生产质量可靠、疗效确切的产品为己任。</p>
									<p>无论岁月怎么变化，心宝药业将是您永远最可信赖的朋友。</p>
								</span>
								<span class="cha_pic">
									<img src="img/35d150bd35.jpg"/>
									<p>(董事长郭永周)</p>
								</span>
							</div>
						</div>
					<?php } ?>	
					<?php if(!in_array($AId, array(4,6,15))) { 
						echo $article_row['Contents'];
					}
					?>				
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>
	</body>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			$('._con').find('*').removeAttr('style');
			$('._con').find('img').addClass('img');
			$('._con').find('div').addClass('ncd')
			linkages('products','#t1');
//			console.log(lc);
//			console.log(ry)
			xllc(lc)
			glory('.ry',ry)
		})
	</script>

</html>