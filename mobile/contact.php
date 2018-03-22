<?php 
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php'); 
include($site_root_path.'/inc/fun/verification_code.php');
include($site_root_path.'/inc/lib/feedback/form_post.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
	// var_dump($_POST);exit;
	$Name = trim(htmlentities($_POST['Name']));
	$Email = trim(htmlentities($_POST['Email']));
	$Phone = trim(htmlentities($_POST['Phone']));
	$Message = trim(htmlentities($_POST['Message']));
	$VCode = strtoupper(trim(htmlentities($_POST['VCode'])));

	strlen($Name) > 0 ?  true : $error['Name'] = '姓名不能为空';
	strlen($Message) > 0 ?  true : $error['Message'] = '留言不能为空';
	strlen($Name)>30 ? $error['Name'] = '请输入10个字以内' : false;
	if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) $error['Email'] = '邮箱格式不正确';
	strlen($Email) > 0 ?  true : $error['Email'] = '邮箱不能为空';
	if (!preg_match('/^1[34578]{1}\d{9}$/', $Phone)) $error['Phone'] = '电话号码格式不正确';
	strlen($Phone) > 0 ?  true : $error['Phone'] = '电话号码不能为空';
	if (strlen($Message)>600) $error['Message'] = '留言要在200字以内';

	//var_dump($Message);exit;
	if ($VCode!=$_SESSION[md5('feedback')] || $_SESSION[md5('feedback')]=='') {	//验证码错误
		$error['VCode'] = '验证码错误';
		strlen($VCode) > 0 ?  true : $error['VCode'] = '验证码不能为空';
		$_SESSION[md5('feedback')]='';
		unset($_SESSION[md5('feedback')]);
	} else if (isset($error)) {
		$db->insert('feedback', array(
			'Name'		=>	$Name,
			'Email'		=>	$Email,
			'Phone'		=>	$Phone,
			'Subject'	=>	$Message,
			'Ip'		=>	get_ip(),
			'PostTime'	=>	$service_time
			)
		);
		//var_dump($ret);exit;
	}
	$error = json_encode($error, JSON_UNESCAPED_UNICODE);
	//var_dump($error);exit;
} else {
	$error = 0;
}
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,user-scalable=yes" />
		<title>联系心宝</title>
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<script type="text/javascript">
			(function() {
				var html = document.documentElement;
				var w = html.getBoundingClientRect().width;
				html.style.fontSize = w / 15 + 'px';
			})();
		</script>
		<script type="text/javascript">
			var errors = <?=$error?>;
		</script>
	</head>

	<body>
		<div class="xb_box">
			<div class="i_ul">
				<?php include('navigate.php'); ?>
			</div>
			<header>
				<a href="index.php" class="header_logo"></a>
				<h1 class="header_con">联系心宝</h1>
				<div class="header_nav"></div>
			</header>
			<div class="banner float width">
				<div class="contact_banner">
					<img src="img/731b7eec3f.jpg" class="img" />
				</div>
			</div>
			<section class="float width float">
				<div class="stc_title float width"><img src="img/title_contant.png" alt="" class="img" /></div>
				<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
					<div class="contant_form">
						<div class="form_bg">
								<span>
									<p>姓名：</p>
									<b>*</b>
									<input type="text" name="Name" id="Name" value="" />
								</span>
								<span>
									<p>邮箱：</p>
									<b>*</b>
									<input type="text" name="Email" id="Email" value="" />
								</span>
								<span>
									<p>手机：</p>
									<b>*</b>
									<input type="text" name="Phone" id="Phone" value="" />
								</span>
								<span>
									<p>内容：</p>
									<b>*</b>
									<textarea name="Message" rows="5" cols="" id="Message"></textarea>
								</span>
								<span>
									<!--<p>内容：</p>-->
									<p >验证码:</p>
									<b>*</b>
									
									<input type="text" name="VCode" id="VCode" value="" />
									<!--<p id="yt"></p>-->
									<!-- <img src="img/yzm.png" alt=""  id="yt"/> -->
									<?=verification_code('feedback');?>
									<!--<a href="#" class="bsn">看不清？换一个</a>-->
								</span>
								<span>
									<input type="submit"  id="btn" value="提交" />
								</span>
								<div class="form_logos"></div>
						</div>
					</form>
				</div>
				<div class="stc_title float width"><img src="img/title_contant2.png" alt="" class="img" /></div>
				<div class="contant_map">
					<div class="map_con">
						<div class="map_top">
							<span>
								<p>企业名称：</p>
								<p>广东心宝药业科技有限公司</p>
							</span>
							<span>
								<p>生产地址：</p>
								<p>广州高新技术产业开发区伴河路6号</p>
							</span>
							<span>
								<p>电话号码：</p>
								<p>020-37924226&nbsp;020-87817116</p>
							</span>
							<span>
								<p>传真号码：</p>
								<p>020-87817116</p>
							</span>
							<span>
								<p>邮编号码：</p>
								<p>510535</p>
							</span>
						</div>
						<div id="map"></div>
					</div>
				</div>
			</section>
			<?php include('/footer.php'); ?>
		</div>
	</body>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=2D4K3ZUZECvi34iAleP0hMc9PtshuhdI"></script>
	<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var map = new BMap.Map("map"); // 创建Map实例
		map.centerAndZoom(new BMap.Point(113.521275,23.151634), 17); // 初始化地图,设置中心点坐标和地图级别
		map.addControl(new BMap.MapTypeControl()); //添加地图类型控件
		map.setCurrentCity("广州"); // 设置地图显示的城市 此项是必须设置的
		map.enableScrollWheelZoom(true); //开启鼠标滚轮缩放
		
		
		$(function() {
			var arr=[];
			var err;
			$('.sy').children('div').addClass('bgcolor')
			$('.staOne').children('ul').slideUp();
			$('.staTwo').find('div').removeClass('bgcolor')
			$('#t5').find('div').addClass('bgcolor');
			$('.header_nav').click(function() {
				$('.i_ul').toggle(500);
			})
			$('.staOne').click(function() {
				$(this).siblings('.staOne').children('ul').slideUp();
				$(this).children('ul').slideToggle();
			})
			if (errors==0) {
				
			}else{
				$.each(errors, function(a,b) {
					err+=errors[a]+'\n';
					
				});
				alert(err.split('undefined')[1]);
			}
			
		})
	</script>

</html>