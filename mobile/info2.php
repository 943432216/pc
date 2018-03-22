<?php  
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

$banner = $db->get_one('ad',"AId='7'");
$CateId = $_GET['CateId'];
$cur_cate = $db->get_one('info2_category',"CateId='$CateId'");
if ($CateId == 9) {
	$xs_state = $db->get_all('info2', 'CateId=9', 'InfoId,ThumbPic,Title,BriefDescription', 'InfoId desc limit 20');
} elseif ($CateId == 10) {
	$xs_state = $db->get_all('info2', 'CateId=10', 'InfoId,ThumbPic,Title,BriefDescription', 'InfoId desc limit 20');
}
for ($i=0; $i<20; $i++) {
	$xs_state[$i]['state_url'] = '/info2-detail.php?InfoId=' . $xs_state[$i]['InfoId'];
}
$xs_state = json_encode($xs_state, JSON_UNESCAPED_UNICODE);

switch ($_GET['CateId']) {
	case '8': 
		$pic_name = 'title_heart.png'; 
		break;
	case '9': 
		$pic_name = 'title_heart_01.png'; 
		break;
	case '10': 
		$pic_name = 'title_heart_02.png'; 
		break;
	default:  
		$pic_name = 'title_heart.png'; 
		break;
}
//var_dump($xs_state);exit;
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
			var xs_state=<?=$xs_state?>;
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con">心肾同治</h1>
				<div class="header_nav"></div>
			</header>
			<div class="banner float width">
				<div class="banner_nav">
					<ul>
						<?php foreach((array)$info2_cate as $item){?>
						<li><a href="/mobile<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class="banners">
					<?php
				    for($i=0;$i<5;$i++){
					if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
					?>
					<img src="<?=$banner['PicPath_'.$i]?>" class="img" style="<?=$i==0?'':';display:none;'?>"/>
					<?php }?>
				</div>
			</div>
			<?php if ($CateId != 8) { ?>
				<section class="float width scrolls">
				<div class="stc_title"><img src="img/<?=$pic_name?>" alt=""  class="img"/></div>
				<div class="_con soills">
					<ul id="new_boxs" class="new_boxs float">
						
					</ul>
				</div>
				<div class="logol"><img src="img/logos.png" class="img"/></div>
			</section>
			<div class="hx">
				<div></div>
			</div>
			<div class="hxs float">
				<div></div>
			</div>
			<?php }else{ ?>
			<section class="float width">
				<div class="stc_title"><img src="img/<?=$pic_name?>" alt=""  class="img"/></div>
				<div class="_con">
					<span class="company_bn float">
						<?=$db->get_value('info2_category_description', "CateId='{$cur_cate['CateId']}'", 'Description');?>
					</span>
				</div>
			</section>
			<?php }?>
			<?php include('footer.php'); ?>

		</div>
	</body>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			$('.company_bn').find('img').removeAttr('style');
			$('.company_bn').find('img').addClass('img');
			linkages('info','#t3');
			cj(xs_state);
			starts()
		})
	</script>

</html>