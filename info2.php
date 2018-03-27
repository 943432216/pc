<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

$query_string=query_string('page');
$turn_page_query_string=$website_url_type==0?"?$query_string&page=":'page-';
if(!isset($info_row)){
	$page_count=10;
	$where='Language=0';
	include($site_root_path.'/inc/lib/info2/get_list_row.php');
}

if($CateId){
	$cur_cate=$db->get_one('info2_category',"CateId='$CateId'");
}
$pageName='info2';
$banner=$db->get_one('ad',"AId='7'");
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
	</head>

	<body>
		<div class="xb_box overflow">
			<?php include('top.php'); ?>
			<div class="banner left width">
				<?php
			    for($i=0;$i<5;$i++){
				if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
				?>
				<img src="<?=$banner['PicPath_'.$i]?>" class="img" style="<?=$i==0?'':';display:none;'?>"/>
				<?php }?>
			</div>
			<section class="left overflow position">
				<div class="sec_stl"><img src="img/pc_heart.png" class="img"/></div>
				<div class="sec_titles left width">
					<?php foreach((array)$info2_cate as $item){?>
					<div class="shade overflow shade_nav">
						<a href="<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a>
					</div>
					<?php }?>
				</div>
				<div class="sec_con overflow">
					<?php if($CateId==8){?>
					<div class="msg_box" style="display: block;">
						<div class="title"><?=$cur_cate['Category'];?></div>
						<div class="contents"><?=$db->get_value('info2_category_description', "CateId='{$cur_cate['CateId']}'", 'Description');?></div>
					</div>
					<?php }else{?>
					<div class="msg_box">
						<?php
						for($i=0; $i<count($info_row); $i++){
						?>
						<div class="msg_1">
							<div class="msg_img">
								<img src="<?=$info_row[$i]['ThumbPic']?>" class="img"/>
							</div>
							<div class="msg_con">
								<h2><?=$info_row[$i]['Title'];?></h2>
								<p><?=$info_row[$i]['BriefDescription'];?></p>
								<a href="<?=$info_row[$i]['ExtUrl']?$info_row[$i]['ExtUrl']:get_url('info2', $info_row[$i]);?>">查看详情 》》</a>
							</div>
						</div>
						<?php }?>					
						<?php if($total_pages>0){?>
						<div class="page">
							<a href="/info2.php?<?=$query_string?>&page=1" class="page_item hover">首页</a>
							<?=turn_page_ext($page, $total_pages, $turn_page_query_string, $row_count, '上一页', '下一页', $website_url_type,1);?>
							<a href="/info2.php?<?=$query_string?>&page=<?=$total_pages?>" class="page_item hover">未页</a>
							<form style="display:inline;" action="/info2.php?<?=query_string('paged')?>" method="GET"><div class="left">转到 <input class="paged" type="text" name="paged" onkeyup="set_number(this,0)" onpaste="set_number(this,0)" /> 页</div> <input type="submit" class="submit" onclick="return go_url();" value="Go" /></form>
							<script type="text/javascript">
								function go_url(){
									var v = jQuery('.paged').val();
									window.location='/info2.php?<?=query_string('paged')?>'+"&page="+parseInt(v);
									return false;
								}
							</script>
						</div>
						<?php }?>
					</div>		
					<?php }?>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				var sehei=window.screen.width;
				if(sehei==1920){
					$('.sec_titles .shade_nav').each(function(a,b){
						$(this).css('width','260px');
						if (a==0) {
							$(this).css('margin-left','31%');
						}
						if (a==1) {
							$(this).find('a').css('margin-left','20px');
						}
					
					})
					$('.sec_titles .shade a').each(function(){
						$(this).css('width','220px')
					})
				}else if((sehei>=1360&&sehei<=1366)||sehei>1921){
					$('.shade a').each(function(a,b){
						$(this).css('width','160px');
						$(this).parents('.shade').css('width','166px');
						
					})
				}else if(sehei==1600){
					$('.shade a').each(function(a,b){
						$(this).css('width','180px');
						$(this).parents('.shade').css('width','192px');
						if (a==0) {
							$(this).parents('.shade').css('margin-left','29%')
						}
					});
					
				}
				
				$('.contents').find('*').removeAttr('style');
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
				$('.contents').find('span').css('line-height','160%');
				$('.pagenum').css('background','#c49858');
				$('.pagenum').css('border-color','#c49858');
				$('.paged').css('border-color','#c49858');
				
			})
		</script>
	</body>

</html>