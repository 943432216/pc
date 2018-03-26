<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');

$DevID = htmlentities($_GET['DevID']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_FILES) && (($_FILES["pic_src"]["type"] == "image/gif")
	|| ($_FILES["pic_src"]["type"] == "image/jpeg")
	|| ($_FILES["pic_src"]["type"] == "image/pjpeg")
	|| ($_FILES["pic_src"]["type"] == "image/png"))
	&& ($_FILES["pic_src"]["size"] < 11000000) && $_FILES["pic_src"]["error"] == 0) {
      $dex = explode('.', $_FILES["pic_src"]["name"]);
      $pic_name = time() . mt_rand(1, 1000) . '.' . $dex[count($dex)-1];
      $pic_src = dirname(dirname(dirname(__FILE__))) . '/u_file/develop/' . $pic_name;
      move_uploaded_file($_FILES["pic_src"]["tmp_name"], $pic_src);	
	}

	$arr = array(
		'dev_cate' => htmlentities($_POST['dev_cate']),
		'time' => htmlentities($_POST['time']),
		'happen' => htmlentities($_POST['happen']),
		'add_time' => time()
		);
	isset($pic_name) ? $arr['pic_src'] = '/u_file/develop/' . $pic_name : false;
	$db->update('develop', "DevID=$DevID", $arr);
	echo "<script>alert('修改成功！');</script>";
	header('Location:index.php');
} else {
	$info = $db->get_one('develop', "DevID=$DevID");
}
// var_dump($info['happen']);exit;

include('../../inc/manage/header.php');
?>
<div class="header"><?=get_lang('ly200.current_location');?>:<a href="index.php">发展历程</a>&nbsp;-&gt;&nbsp;编辑</div>
<form method="post" name="act_form" id="act_form" class="act_form" action="<?=$_SERVER['SCRIPT_NAME'].'?DevID='.$DevID?>" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table">
	<tr>
		<td nowrap><?=get_lang('ly200.category');?>:</td>
		<td>
			<select name="dev_cate">
				<?php 
					switch ($info['dev_cate']) {
						case '1':
							echo '<option value="1" selected="selected">一级节点</option>';
							echo '<option value="2">二级节点</option>';
							break;						
						default:
							echo '<option value="1">一级节点</option>';
							echo '<option value="2" selected="selected">二级节点</option>';
							break;
					}
				?>			
			</select>
		</td>
	</tr>
	<tr> 
		<td width="5%" nowrap>节点日期:</td>
		<td width="95%"><input type="text" name="time" id="datepicker" value="<?=$info['time']?>"></td>
	</tr>
	
	<tr>
		<td nowrap>图片:</td>
		<td>
			<input type="file" name="pic_src"/>&nbsp;&nbsp;<span>支持格式：gif、jpeg、pjpeg、png&nbsp;大小：10M以内</span>
		</td>
	</tr>

	<tr>
		<td nowrap><?=get_lang('ly200.description').lang_name($i, 0);?>:</td>
		<td class="ck_editor"><textarea style="width: 500px;height: 200px;" name="happen"><?=$info['happen']?></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="保存" name="submit" class="form_button"><a href='index.php' class="return"><?=get_lang('ly200.return');?></a></td>
	</tr>
</table>
</form>
<?php include('../../inc/manage/footer.php');?>