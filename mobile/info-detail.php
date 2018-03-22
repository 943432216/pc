<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
include($site_root_path.'/inc/lib/info/detail.php');
$CateId=(int)$info_row['CateId'];
if($CateId){
	$cur_cate=$db->get_one('info_category',"CateId='$CateId'");
}
$pageName='info';
$banner=$db->get_one('ad',"AId='5'");
//var_dump($cur_cate['CateId']);exit;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/dome1.css" />
		<link rel="stylesheet" type="text/css" href="css/css.css"/>
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
		<script type="text/javascript">
			var cate_id = <?=$cur_cate['CateId']?>;
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con"><?=$cur_cate['Category']?></h1>
				<div class="header_nav"></div>
			</header>
			<section class="float width ddd">
				<div class="float width logos"><img src="img/logol.png" class="img"/></div>
				<div class="detail_box float width">
					<?=$info_detail;?>
				</div>
			</section>
			<?php include('/footer.php'); ?>

		</div>
	</body>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			linkage(cate_id,'#t4','info');
			$('.ddd').find('p').removeAttr('style');
			$('.ddd').find('span').removeAttr('style');
			$('.ddd').find('div').removeAttr('style');
			$('.ddd').find('span').css('width','100%')
			$('.ddd').find('strong').removeAttr('style');
			$('.ddd').find('strong').addClass('strong');
			$('.ddd').find('img').removeAttr('style');
			$('.ddd').find('img').addClass('img');
			$('section').removeAttr('style');
			$('section').css('padding-bottom','0');
		})
	</script>

</html>