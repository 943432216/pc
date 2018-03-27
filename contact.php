<?php 
include('inc/site_config.php');
include($site_root_path.'/inc/set/ext_var.php');
include($site_root_path.'/inc/fun/mysql.php');
include($site_root_path.'/inc/function.php');
include($site_root_path.'/inc/common.php'); 
include($site_root_path.'/inc/fun/verification_code.php');
include($site_root_path.'/inc/lib/feedback/form_post.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
	//var_dump($_POST);exit;
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
	} else if (!isset($error)) {
		$db->insert('feedback', array(
			'Name'		=>	$Name,
			'Email'		=>	$Email,
			'Phone'		=>	$Phone,
			'Subject'	=>	$Message,
			'Ip'		=>	get_ip(),
			'PostTime'	=>	$service_time
			)
		);
		$error = 1;
		//var_dump($ret);exit;
	}
	$error = json_encode($error, JSON_UNESCAPED_UNICODE);
	//var_dump($error);exit;
} else {
	$error = 0;
}
$banner=$db->get_one('ad',"AId='8'");
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>心宝药业</title>
		<link rel="stylesheet" type="text/css" href="css/nitialize.css" />
		<link rel="stylesheet" type="text/css" href="" id="lins" media="" />
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
			var errors = <?=$error?>;
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
			<section class="left overflow position">
				<div class="sec_stls"><img src="img/contant.png" class="img"/></div>
				<div class="sec_titles left width">
					<div class="shades overflow ctn">
						<span class="shade_n1">联系心宝</span>
					</div>
				</div>
				<div class="sec_con">
					<!--<img src="img/lxxb.png" class="img"/>-->
					<div class="con_map">
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
							<p>020-37924226 / 020-87817116 </p>
						</span>
						<span>
							<p>传真号码：</p>
							<p> 020-87817116</p>
						</span>
						<span>
							<p>邮编号码：</p>
							<p>510535</p>
						</span>
						<div id="map" class="width left">
							
						</div>
					</div>
					<div class="con_form">
						<form action="<?=$_SERVER['SCRIPT_NAME']?>" method="post">
							<span>
								<p>姓&nbsp;&nbsp;&nbsp;&nbsp;名：</p>
								<b>*</b>
								<input type="text" name="Name" id="Name" value="" />
							</span>
							<span>
								<p>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</p>
								<b>*</b>
								<input type="text" name="Email" id="Email" value="" />
							</span>
							<span>
								<p>手&nbsp;&nbsp;&nbsp;&nbsp;机：</p>
								<b>*</b>
								<input type="text" name="Phone" id="Phone" value="" />
							</span>
							<span>
								<p>内&nbsp;&nbsp;&nbsp;&nbsp;容：</p>
								<b>*</b>
								<textarea name="Message" rows="4" cols="" id="Message"></textarea>
							</span>
							<span>
								<p >验证码：</p>
								<b>*</b>
								<input type="text" name="VCode" id="VCode" value="" />
								<?=verification_code('feedback');?>
							</span>
							<span>
								<input type="submit"  id="btn" value="提交留言" />
							</span>
						</form>
					</div>
				</div>
			</section>
			<?php include('footer.php'); ?>
		</div>
		<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=2D4K3ZUZECvi34iAleP0hMc9PtshuhdI"></script>
		<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
		<!--<script src="js/unslider.min.js" type="text/javascript" charset="utf-8"></script>-->
		<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			var map = new BMap.Map("map"); // 创建Map实例
			map.centerAndZoom(new BMap.Point(113.521275,23.151634),20); // 初始化地图,设置中心点坐标和地图级别
			map.addControl(new BMap.MapTypeControl()); //添加地图类型控件
			map.setCurrentCity("广州"); // 设置地图显示的城市 此项是必须设置的
			map.enableScrollWheelZoom(true); //开启鼠标滚轮缩放
		</script>
		<script type="text/javascript">
			$(function(){
				var arr=[];
				var err;
				if (errors==0) {
					
				}else if(errors==1){
					alert('提交成功');
				}else{
					$.each(errors, function(a,b) {
						err+=errors[a]+'\n';
						
					});
					alert(err.split('undefined')[1]);
				}
				
			})
		</script>
	</body>

</html>