<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');
include($site_root_path.'/inc/lib/info/detail.php');
$CateId=(int)$info_row['CateId'];
$InfoId=htmlentities($_GET['InfoId']);
if($CateId){
	$cur_cate=$db->get_one('info_category',"CateId='$CateId'");
}
$pageName='info';
$banner=$db->get_one('ad',"AId='5'");

$msg_all = $db->get_limit('info', 1, 'InfoId,Title,AccTime,PageUrl', 'InfoId desc', 0, 5);
$recommend = $db->get_all('info', "CateId=$cur_cate[CateId]", 'InfoId,Title,AccTime,PageUrl', 'InfoId desc');
foreach ($recommend as $k=>$v) {
	$recommend[$k]['PageUrl'] = get_url('info', $v);
	if ($v['InfoId']==$InfoId) {
		$ls_next[] = $recommend[$k-1]['InfoId'];
		$ls_next[] = $recommend[$k+1]['InfoId'];
	}
}
foreach ($msg_all as $k => $v) {
	$msg_all[$k]['PageUrl'] = get_url('info', $v);
}
// var_dump($CateId);exit;
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
		<script type="text/javascript">
			var btname=<?=$CateId?>;
			var about_new=<?=json_encode($msg_all,JSON_UNESCAPED_UNICODE)?>;
			var read_new=<?=json_encode($recommend,JSON_UNESCAPED_UNICODE)?>;
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
					<?php if(isset($ls_next[0])) { ?>
					<a href="<?=$_SERVER['SCRIPT_NAME'] . '?InfoId=' . $ls_next[0];?>">《《 上一篇</a>
					<?php } ?>
					<?php if(isset($ls_next[0])) { ?>
					<a href="<?=$_SERVER['SCRIPT_NAME'] . '?InfoId=' . $ls_next[1];?>">下一篇 》》</a>
					<?php } ?>
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
						<a href="<?='/info.php?CateId='.$CateId?>">更多 》》</a>
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
				$('.shade').find('a').css('margin-left','0')
				$('.contents').find('*').removeAttr('style');
				$('.contents').find('span,strong,p,div,tr,td,table,pre').addClass('width');
				$('.contents').find('span,strong,p,div,tr,td,table,pre').addClass('left');
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
					'margin':'10px 0'
				});
				$('.contents').find('p,span,div').css('line-height','180%');
				$('.contents').find('p,span,div').css('text-indent','2em');
				$('.contents').css({
					'line-height':'180%',
					'text-indent':'2em',
					'display':'block'
				});
				$('.contents').find('img').each(function(){
					if($(this).attr('alt')=='打印'||$(this).attr('alt')=='下载'||$(this).attr('alt')=='分享到新浪微博'||$(this).attr('alt')=='分享到腾讯微博'||$(this).attr('alt')=='分享到QQ空间'||$(this).attr('alt')=='分享到微信'){
						$(this).removeClass('img');
						
					}
				})
				$('.donate_carousel').Scroll({
			        line: 1,
			        speed: 800,
			        timer: 2000
   				 });
				navt(btname);
				newcon();
				 var sehei=window.screen.width;
				if(sehei==1920){
					$('.shade_nav').each(function(a,b){
						if (a==0) {
							$(this).children('a').css('margin-left','30px');
						}
					})	
				}
			})
		</script>
	</body>

</html>