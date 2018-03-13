<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
include($site_root_path.'/inc/lib/info2/detail.php');
$CateId=(int)$info_row['CateId'];
if($CateId){
	$cur_cate=$db->get_one('info2_category',"CateId='$CateId'");
}
$pageName='info2';
$banner=$db->get_one('ad',"AId='7'");

$msg_all = $db->get_all('info2', 1, 'InfoId,Title,AccTime,PageUrl', 'InfoId desc');
$recommend = $db->get_all('info2', "CateId=$cur_cate[CateId]", 'InfoId,Title,AccTime,PageUrl', 'InfoId desc');
// var_dump($CateId);exit;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="css/pc_1600.css" id="lins" />
		<script type="text/javascript">
			var btname=<?=$CateId?>;
//			console.log(btname);
		</script>
	</head>

	<body>
		<div class="xb_box overflow">
			<?php include('top.php'); ?>
			<div class="banner left width">
				<img src="img/banner_01.jpg" class="img"/>
			</div>
			<div class="sec_titles left pro_titles">
					<?php foreach((array)$info2_cate as $item){?>
					<div class="shade overflow shade_nav">
						<a class="shade_navbg" href="<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a>
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
					<div class="donate_carousel">
						<ul>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-26</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-27</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-28</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-29</li>
						</ul>
					</div>
				</div>
			</div>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/srcoll.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				$('.shade').find('a').css('margin-left','0')
				$('.contents').find('*').removeAttr('style');
				$('.contents').find('span,strong,p,div,tr,td,table').addClass('width');
				var $str=$('.contents').html();
				$('.contents').html($str);
				$('.contents').find('img').addClass('img');
				$('.contents').find('strong').css({
					'font-size':'17px',
					'color':'#323232',
					'width':'100%',
					'font-weight':'600',
					'text-align':'center',
					'display':'block',
					'margin':'10px 0',
				});
				$('.contents').find('p,span,div').css('line-height','180%');
				$('.contents').find('p,span,div').css('text-indent','2em');
				$('.contents').css({
					'line-height':'180%',
					'text-indent':'2em',
					'display':'block'
				});
				$('.contents').find('img').each(function(){
					if($(this).attr('alt')=='打印'||$(this).attr('alt')=='下载'){
						$(this).removeClass('img');
					}
				})
				navt(btname);
				$('.contents').find('strong').each(function(){
//					console.log($('.contents').find('strong').length)
					if ($(this).html()=='中国处方药') {
						$('.contents').find('strong').removeAttr('style');
						$(this).removeClass('width')
						$(this).css({
							'font-size':'17px',
							'color':'#323232',
							'font-weight':'600',
							'text-align':'center',
							'margin':'0',
							'width':'100px'
						});
					}
				});
				$('.donate_carousel').Scroll({
			        line: 1,
			        speed: 800,
			        timer: 2000
   				 });
			})
		</script>
	</body>

</html>