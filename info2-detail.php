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

$msg_all = $db->get_limit('info2', 1, 'InfoId,Title,AccTime,PageUrl', 'InfoId desc', 0, 5);
$recommend = $db->get_all('info2', "CateId=$cur_cate[CateId]", 'InfoId,Title,AccTime,PageUrl', 'InfoId desc');
foreach ($recommend as $k=>$v) {
	$recommend[$k]['PageUrl'] = get_url('info2', $v);
	if ($v['InfoId']==$InfoId) {
		$ls_next[] = $recommend[$k-1]['InfoId'];
		$ls_next[] = $recommend[$k+1]['InfoId'];
	}
}
foreach ($msg_all as $k => $v) {
	$msg_all[$k]['PageUrl'] = get_url('info2', $v);
}
// var_dump(json_encode($msg_all,JSON_UNESCAPED_UNICODE));exit;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="" id="lins" />
		<script type="text/javascript">
			var btname=<?=$CateId?>;
			var about_new=<?=json_encode($msg_all,JSON_UNESCAPED_UNICODE)?>;
			var read_new=<?=json_encode($recommend,JSON_UNESCAPED_UNICODE)?>;
		</script>
		<script type="text/javascript">
			window.onload=function(){
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
					<a href="<?=$_SERVER['SCRIPT_NAME'] . '?InfoId=' . $ls_next[0];?>">《《 上一篇</a>
					<a href="<?=$_SERVER['SCRIPT_NAME'] . '?InfoId=' . $ls_next[1];?>">下一篇 》》</a>
				</div>
			</section>
			<div class="details_new left">
				<div class="about_new">
					<div class="about_tl">
						<h2 class="left">最新资讯</h2>
						<a href="/info.php?CateId=1">更多 》》</a>
					</div>
					<ul>
						<!--<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
						<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>-->
					</ul>
				</div>
				<div class="read_new">
					<div class="about_tl">
						<h2 class="left">推荐阅读</h2>
						<a href="<?='/info2.php?CateId='.$CateId?>">更多 》》</a>
					</div>
					<div class="donate_carousel">
						<ul>
							<!--<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-25</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-26</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-27</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-28</li>
							<li><a href="#">“心心相印”公益活动走进山西同仁康大药房 </a>2018-01-29</li>-->
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
   				 var sehei=window.screen.width;
				var sehei=window.screen.width;
				if(sehei==1920){
					$('.sec_titles .shade_nav').each(function(a,b){
						$(this).css('width','260px');
						if (a==0) {
							$(this).css('margin-left','31%');
							$(this).find('a').css('margin-left','25px');
						}
						if (a==1) {
							$(this).find('a').css('margin-left','10px');
						}
					
					})
					$('.sec_titles .shade a').each(function(){
						$(this).css('width','220px')
					})
				}else if((sehei>=1360&&sehei<=1366)||sehei>1921){
					$('.shade a').each(function(a,b){
						$(this).css('width','160px');
						$(this).parents('.shade').css('width','166px');
						$('.shade').find('a').css('margin-left','0')
					})
				}else if(sehei==1600){
					$('.shade').find('a').css('margin-left','0')
					$('.shade a').each(function(a,b){
						$(this).css('width','180px');
						$(this).parents('.shade').css('width','192px');
						if (a==0) {
							$(this).parents('.shade').css('margin-left','29%')
						}
					});
					
				}
				newcon();
			})
			
				
		</script>
	</body>

</html>