<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
include($site_root_path.'/inc/lib/info2/detail.php');

$content=$db->get_one('info2_contents',"InfoId='29'");
$CateId=(int)$info_row['CateId'];
//var_dump($CateId);exit;
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
			var cate_id = <?=$CateId?>;
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
			
			<!--<div class="detail_box float width">
				<div class="logob"></div>			
			</div>-->
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
			linkage(cate_id,'#t3','info')
			$('.ddd').find("*").removeAttr('style');
			$('.ddd').find('img').addClass('img');
			var $nnx=$('.detail_box').height();
			if ($nnx<520) {
				$('.detail_box').css('height','550px')
			}
			
//			console.log($('.detail_box').height())
			
		})
	</script>

</html>