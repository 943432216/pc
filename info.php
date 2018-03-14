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
	include($site_root_path.'/inc/lib/info/get_list_row.php');
}

if($CateId){
	$cur_cate=$db->get_one('info_category',"CateId='$CateId'");
}
$pageName='info';
$banner=$db->get_one('ad',"AId='5'");
//var_dump($info_row);exit;
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="css/pc_1600.css" id="lins" />
	</head>

	<body>
		<div class="xb_box overflow">
			<?php include('top.php'); ?>
			<div class="banner left width">
				<img src="img/banner_01.jpg" class="img"/>
			</div>
			<section class="left overflow position">
				<div class="sec_stl"><img src="img/pc_msg.png" class="img"/></div>
				<div class="sec_titles left width">
					<?php
			            foreach((array)$info_cate as $item){
			                if($item['CateId'] == 7){continue;}
			        ?>
					<div class="shade overflow shade_nav">
						<a href="<?=get_url('info_category',$item)?>"><?=$item['Category']?></a>
					</div>
					<?php }?>
				</div>
				<div class="sec_con overflow">
					<?php  
					if ($CateId != 6) {
					?>
					<div class="msg_box">
						<?php
						for($i=0; $i<count($info_row); $i++){
						?>
						<div class="msg_1">
							<div class="msg_img">
								<a href="<?=$info_row[$i]['ExtUrl']?$info_row[$i]['ExtUrl']:get_url('info', $info_row[$i]);?>"><img src="<?=$info_row[$i]['ThumbPic']?>" class="img"/></a>
							</div>
							<div class="msg_con">
								<h2><?=$info_row[$i]['Title'];?></h2>
								<p><?=$info_row[$i]['BriefDescription'];?></p>
								<a href="<?=$info_row[$i]['ExtUrl']?$info_row[$i]['ExtUrl']:get_url('info', $info_row[$i]);?>">查看详情 》》</a>
							</div>
						</div>
						<?php }?>					
						<?php if($total_pages>0){?>
						<div class="page">
							<a href="/info2.php?<?=$query_string?>&page=1" class="page_item hover">首页</a>
							<?=turn_page_ext($page, $total_pages, $turn_page_query_string, $row_count, '上一页', '下一页', $website_url_type,1);?>
							<a href="/info2.php?<?=$query_string?>&page=<?=$total_pages?>" class="page_item hover">未页</a>
							<form action="/info2.php?<?=query_string('page')?>" method="GET"><div class="left">转到 <input class="pages" type="text" name="pages" onkeyup="set_number(this,0)" onpaste="set_number(this,0)" /> 页</div> <input type="submit" class="submit" onclick="return go_url();" value="Go" /></form>
							<script type="text/javascript">
								function go_url(){
									var v = jQuery('.pages').val();
									window.location='/info2.php?<?=query_string('pages')?>'+"&page="+parseInt(v);
									return false;
								}
							</script>
						</div>
						<?php }?>
					</div>
					<?php } else { ?>
					<div class="msg_box">
						<div class="big_video">
							<iframe src="http://player.youku.com/embed/XMTc2MzQ4NTI1Ng==" width="100%" height="100%" frameborder="no" scrolling="no"></iframe>
						</div>
						<div class="video_title">
							其他视频
						</div>
						<div class="small_video">
							<span><img src="img/videosd.png" class="img"/></span>
							<span><img src="img/videosd.png" class="img"/></span>
							<span><img src="img/videosd.png" class="img"/></span>
							<span><img src="img/videosd.png" class="img"/></span>
						</div>
					</div>
					<?php } ?>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			$(function(){
				$('.pagenum').css('background','#c49858');
				$('.pagenum').css('border-color','#c49858');
				$('.paged').css('border-color','#c49858');
				videolds();
			})
		</script>
	</body>

</html>