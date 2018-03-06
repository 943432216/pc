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
// var_dump($art_group);exit;
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
			<section class="left position" >
				<div class="sec_stl"><img src="img/stl.png"/></div>
				<div class="sec_title left width">
					<?php foreach((array)$art_group[$GroupId] as $item){?>
					<a href="<?=get_url('article',$item)?>"><span class="sec_A"><?=$item['Title']?></span></a>
					<?php }?>
				</div>
				<div class="sec_con">
					<div class="sec_box width left" style="display: block;">
						<?=$article_row['Contents']?>
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
				$('#marquee ul li').height($('.img').height());
				var unslider06 = $('#marquee').unslider({
					dots: true,
					fluid: true
				});
				data06 = unslider06.data('unslider');
			})
		</script>
	</body>

</html>