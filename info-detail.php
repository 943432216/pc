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

$msg_all = $db->get_all('info', 1, 'InfoId,Title,AccTime,PageUrl', 'InfoId desc');
$recommend = $db->get_all('info', "CateId=$cur_cate[CateId]", 'InfoId,Title,AccTime,PageUrl', 'InfoId desc');
//var_dump($recommend);exit;
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
			<div class="sec_titles left pro_titles">
					<?php
			            foreach((array)$info_cate as $item){
			                if($item['CateId'] == 7){continue;}
			        ?>
					<div class="shade overflow shade_nav">
						<a class="shade_navbg" href="<?=get_url('info_category',$item)?>"><?=$item['Category']?></a>
					</div>
					<?php }?>
				</div>
			<section class="left overflow position  con_bg">
				<div class="sec_con">
					<?=$info_detail;?>
				</div>
				<div class="details_bn left">
					<a href="#">《《 上一篇</a>
					<a href="#">下一篇 》》</a>
				</div>
			</section>
			<div class="details_new left">
				<div class="about_new">
					<div class="about_tl">
						<h2 class="left">最新资讯</h2>
						<a href="#">更多 》》</a>
					</div>
					<ul>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
					</ul>
				</div>
				<div class="read_new">
					<div class="about_tl">
						<h2 class="left">推荐阅读</h2>
						<a href="#">更多 》》</a>
					</div>
					<ul>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
					</ul>
				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				$('.shade').find('a').css('margin-left''0')
			})
		</script>
	</body>

</html>