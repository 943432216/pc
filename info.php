<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

$query_string=query_string('page');
$turn_page_query_string=$website_url_type==0?"?$query_string&page=":'page-';

if(!isset($info_row)){
	$page_count=20;
	$where='Language=0';
	include($site_root_path.'/inc/lib/info/get_list_row.php');
}

if($CateId){
	$cur_cate=$db->get_one('info_category',"CateId='$CateId'");
}
$pageName='info';
$banner=$db->get_one('ad',"AId='5'");
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
			<section class="left overflow position">
				<div class="sec_stl"><img src="img/pc_msg.png"/></div>
				<div class="sec_titles left width">
					<?php
			            foreach((array)$info_cate as $item){
			                if($item['CateId'] == 7){continue;}
			        ?>
					<div class="shade overflow shade_nav">
						<a href="<?=get_url('info_category',$item)?>" class="sec_A"><?=$item['Category']?></a>
					</div>
					<?php }?>
				</div>
				<div class="sec_con overflow">
					<div class="msg_box">
						<?php
						for($i=0; $i<count($info_row); $i++){
						?>
						<div class="msg_1">
							<div class="msg_img">
								<a href="<?=$info_row[$i]['ExtUrl']?$info_row[$i]['ExtUrl']:get_url('info', $info_row[$i]);?>"><img src="<?=$info_row['ThumbPic']?>" class="img"/></a>
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
							<form style="display:inline;" action="/info2.php?<?=query_string('page')?>" method="GET">转到 <input class="page" type="text" name="page" onkeyup="set_number(this,0)" onpaste="set_number(this,0)" /> 页 <input type="submit" class="submit" onclick="return go_url();" value="Go" /></form>
							<script type="text/javascript">
								function go_url(){
									var v = jQuery('.page').val();
									window.location='/info2.php?<?=query_string('page')?>'+"&page="+parseInt(v);
									return false;
								}
							</script>
						</div>
						<?php }?>
					</div>
					<div class="msg_box">
						<div class="big_video">
							<iframe src="http://player.youku.com/embed/XMTYwNzQ3ODA0OA==" width="100%" height="100%" frameborder="no" scrolling="no"></iframe>
						</div>
						<div class="video_title">
							其他视频
						</div>
						<div class="small_video">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>

		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>