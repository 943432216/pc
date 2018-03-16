<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_FILES) && (($_FILES["hor_src"]["type"] == "image/gif")
	|| ($_FILES["hor_src"]["type"] == "image/jpeg")
	|| ($_FILES["hor_src"]["type"] == "image/pjpeg")
	|| ($_FILES["hor_src"]["type"] == "image/png"))
	&& ($_FILES["hor_src"]["size"] < 11000000) && $_FILES["hor_src"]["error"] == 0) {
      $dex = explode('.', $_FILES["hor_src"]["name"]);
      $pic_name = time() . mt_rand(1, 1000) . '.' . $dex[count($dex)-1];
      $hor_src = dirname(dirname(dirname(__FILE__))) . '/u_file/honor/' . $pic_name;
      move_uploaded_file($_FILES["hor_src"]["tmp_name"], $hor_src);	
	}

	$arr = array(
		'hor_title' => htmlentities($_POST['hor_title']),
		'hor_src' => '/u_file/honor/' . $pic_name,
		'hor_commend' => htmlentities($_POST['hor_commend']),
		'add_hortime' => time()
		);
	$db->insert('honor', $arr);
	header('Location:index.php');
}
// var_dump($_FILES["pic_src"]["size"]);exit;

include('../../inc/manage/header.php');
?>
<div class="header"><?=get_lang('ly200.current_location');?>:<a href="index.php">企业荣誉</a>&nbsp;-&gt;&nbsp;<?=get_lang('ly200.add');?></div>
<form method="post" name="act_form" id="act_form" class="act_form" action="add.php" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table">
	<tr>
		<td nowrap>标题:</td>
		<td>
			<input style="width: 300px;" type="text" name="hor_title"/>
		</td>
	</tr
	<tr>
		<td nowrap>图片:</td>
		<td>
			<input type="file" name="hor_src"/>&nbsp;&nbsp;<span>支持格式：gif、jpeg、pjpeg、png&nbsp;大小：10M以内</span>
		</td>
	</tr>

	<tr>
		<td nowrap><?=get_lang('ly200.description').lang_name($i, 0);?>:</td>
		<td class="ck_editor"><textarea style="width: 500px;height: 200px;" name="hor_commend"></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="<?=get_lang('ly200.add');?>" name="submit" class="form_button"><a href='index.php' class="return"><?=get_lang('ly200.return');?></a></td>
	</tr>
</table>
</form>
<?php include('../../inc/manage/footer.php');?>