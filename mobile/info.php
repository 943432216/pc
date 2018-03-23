<?php
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php');

$CateId = $_GET['CateId'];
$banner=$db->get_one('ad',"AId='5'");
switch ($_GET['CateId']) {
	case '1': 
		$pic_name = 'title.png'; 
		break;
	case '2': 
		$pic_name = 'title_indus.png'; 
		break;
	case '6': 
		$pic_name = 'title_video.png'; 
		break;
	default:  
		$pic_name = 'title.png';
		break;
}

if ($CateId == 1) {
	$fresh_state = $db->get_all('info', 'CateId=1', 'InfoId,ThumbPic,Title,BriefDescription', 'InfoId desc limit 20');
} elseif ($CateId == 2) {
	$fresh_state = $db->get_all('info', 'CateId=2', 'InfoId,ThumbPic,Title,BriefDescription', 'InfoId desc limit 20');
}
for ($i=0; $i<20; $i++) {
	$fresh_state[$i]['state_url'] = '/info-detail.php?InfoId=' . $fresh_state[$i]['InfoId'];
}
$fresh_state = json_encode($fresh_state, JSON_UNESCAPED_UNICODE);
//var_dump($fresh_state);exit;

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/dome1.css" />
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
		<script type="text/javascript">
			var fresh_state = <?=$fresh_state?>
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con">最新动态</h1>
				<div class="header_nav"></div>
			</header>
			<div class="banner float width">
				<div class="banner_nav">
					<ul>
						<?php foreach((array)$info_cate as $item){?>
						<li><a href="/mobile<?=get_url('info_category',$item)?>"><?=$item['Category']?></a></li>
						<?php }?>
					</ul>
				</div>
				<div class="banners">
					<?php
				    for($i=0;$i<5;$i++){
					if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
					?>
					<img src="<?=$banner['PicPath_'.$i]?>" class="img" style="<?=$i==0?'':'display:none;'?>"/>
					<?php }?>
				</div>
			</div>
			<?php  
			if ($CateId != 6) {
			?>
			<section class="float width scrolls">
				<div class="stc_title"><img src="img/<?=$pic_name?>" alt="" class="img" /></div>
				<div class="_con soills">
					<ul id="new_boxs" class="new_boxs float">
					</ul>
					
				</div>
				<div class="logol"><img src="img/logos.png" class="img"/></div>
			</section>
			<?php } else { ?>
			<section class="float width">
				<div class="stc_title"><img src="img/title_video.png" alt=""  class="img"/></div>
				<div class="_con">
					<div class="videos">
						<!--<video width="100%" height="85%" controls="controls" poster="img/videofm.png">
							<source src="myvideo.mp4" type="video/mp4"></source>
							<source src="myvideo_1.mp4" type="video/mp4"></source>
							<object width="" height="" type="application/x-shockwave-flash" data="myvideo.swf">
								<param name="movie" value="myvideo.swf" />
								<param name="flashvars" value="autostart=true&amp;file=myvideo.swf" />
							</object>
							当前浏览器不支持 video直接播放，点击这里下载视频： <a href="myvideo.webm">下载视频</a>
						</video>-->
						<iframe id="vidse" width="100%" height="80%" frameborder="no" scrolling="no" src='http://player.youku.com/embed/XMTc2MzQ4NTI1Ng==' class="videse"></iframe>
						<p class="video_title">心宝企业宣传片</p>
					</div>
					<div class="videos">
						<!--<video width="100%" height="85%" controls="controls" poster="img/videofm.png">
							<source src="myvideo.mp4" type="video/mp4"></source>
							<object width="" height="" type="application/x-shockwave-flash" data="myvideo.swf">
								<param name="movie" value="myvideo.swf" />
								<param name="flashvars" value="autostart=true&amp;file=myvideo.swf" />
							</object>
							当前浏览器不支持 video直接播放，点击这里下载视频： <a href="myvideo.webm">下载视频</a>
						</video>-->
						<iframe id="vidse" width="100%" height="80%" frameborder="no" scrolling="no" src='http://player.youku.com/embed/XMjQ3NzE0NTczMg==' class="videse"></iframe>
						<p class="video_title">养生拳大赛</p>
					</div>
					<div class="videos">
						<!--<video width="100%" height="85%" controls="controls" poster="img/videofm.png">
							<source src="myvideo.mp4" type="video/mp4"></source>
							<object width="" height="" type="application/x-shockwave-flash" data="myvideo.swf">
								<param name="movie" value="myvideo.swf" />
								<param name="flashvars" value="autostart=true&amp;file=myvideo.swf" />
							</object>
							当前浏览器不支持 video直接播放，点击这里下载视频： <a href="myvideo.webm">下载视频</a>
						</video>-->
						<iframe id="vidse" width="100%" height="80%" frameborder="no" scrolling="no" src='http://player.youku.com/embed/XMTYwNzQ3ODA0OA==' class="videse"></iframe>
						<p class="video_title">心宝龟鹿补肾片</p>
					</div>
					<div class="videos">
						<!--<video width="100%" height="85%" controls="controls" poster="img/videofm.png">
							<source src="myvideo.mp4" type="video/mp4"></source>
							<object width="" height="" type="application/x-shockwave-flash" data="myvideo.swf">
								<param name="movie" value="myvideo.swf" />
								<param name="flashvars" value="autostart=true&amp;file=myvideo.swf" />
							</object>
							当前浏览器不支持 video直接播放，点击这里下载视频： <a href="myvideo.webm">下载视频</a>
						</video>-->
						<iframe id="vidse" width="100%" height="80%" frameborder="no" scrolling="no" src='http://player.youku.com/embed/XMTYwNzQ2ODY5Ng==' class="videse"></iframe>
						<p class="video_title">心宝龟鹿补肾片-症状篇</p>
					</div>
					<div class="videos">
						<!--<video width="100%" height="85%" controls="controls" poster="img/videofm.png">
							<source src="myvideo.mp4" type="video/mp4"></source>
							<object width="" height="" type="application/x-shockwave-flash" data="myvideo.swf">
								<param name="movie" value="myvideo.swf" />
								<param name="flashvars" value="autostart=true&amp;file=myvideo.swf" />
							</object>
							当前浏览器不支持 video直接播放，点击这里下载视频： <a href="myvideo.webm">下载视频</a>
						</video>-->
						<iframe id="vidse" width="100%" height="80%" frameborder="no" scrolling="no" src='http://player.youku.com/embed/XMTUzNDI0NjUwNA==' class="videse"></iframe>
						<p class="video_title">心宝养生拳</p>
					</div>
				</div>
			</section>
			<?php } ?>
			
			<div class="hx">
				<div></div>
			</div>
			<div class="hxs float">
				<div></div>
			</div>
			
			<!--<div class="blogroll">
				<div class="blogroll_left">友情链接</div>
				<div class="blogroll_right">
					<a href="http://www.360kad.com/product/575808.shtml">龟鹿补肾片-康爱多网上药店</a>
					<a href="http://www.gdda.gov.cn/publicfiles/business/htmlfiles/jsjzz/index.htm">广东省食品药品监督管理总局</a>
					<a href="http://www.sda.gov.cn/WS01/CL0001/">国家食品药品监督管理总局</a>
				</div>
			</div>
			<div class="width float">
				<iframe src="footer.html" width="100%" height="100px" frameborder="0" scrolling="no"></iframe>
			</div>-->
			<?php include('/footer.php'); ?>
		</div>
	</body>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(function() {
			linkages('product','#t4');
			cj(fresh_state);
//			starts()
		})
	</script>

</html>