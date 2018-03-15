<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ((($_FILES["pic_src"]["type"] == "image/gif")
	|| ($_FILES["pic_src"]["type"] == "image/jpeg")
	|| ($_FILES["pic_src"]["type"] == "image/pjpeg")
	|| ($_FILES["pic_src"]["type"] == "image/png"))
	&& ($_FILES["pic_src"]["size"] < 11000000)) {
	  if ($_FILES["pic_src"]["error"] > 0)
	    {
	    echo "Return Code: " . $_FILES["pic_src"]["error"] . "<br />";
	    header('Location:index.php');
	    }
	  else
	    {
	      $dex = explode('.', $_FILES["pic_src"]["name"]);
	      $pic_name = time() . mt_rand(1, 1000) . '.' . $dex[count($dex)-1];
	      $pic_src = dirname(dirname(dirname(__FILE__))) . '/u_file/develop/' . $pic_name;
	      move_uploaded_file($_FILES["pic_src"]["tmp_name"], $pic_src);
	      }
	} else {
	  echo "Invalid file";
	  header('Location:index.php');
	}

	$arr = array(
		'dev_cate' => htmlentities($_POST['dev_cate']),
		'time' => htmlentities($_POST['time']),
		'pic_src' => '/u_file/develop/' . $pic_name,
		'happen' => htmlentities($_POST['happen']),
		'add_time' => time()
		);
	$db->insert('develop', $arr);
}
// var_dump($_FILES["pic_src"]["size"]);exit;

include('../../inc/manage/header.php');
?>
<div class="header"><?=get_lang('ly200.current_location');?>:<a href="index.php">发展历程</a>&nbsp;-&gt;&nbsp;<?=get_lang('ly200.add');?></div>
<form method="post" name="act_form" id="act_form" class="act_form" action="add.php" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table">
	<tr>
		<td nowrap><?=get_lang('ly200.category');?>:</td>
		<td>
			<select name="dev_cate">
				<option value="1">一级节点</option>
				<option value="2">二级节点</option>
			</select>
		</td>
	</tr>
	<tr> 
		<td width="5%" nowrap>节点日期:</td>
		<td width="95%"><input type="text" name="time" id="datepicker"></td>
	</tr>
	
	<tr>
		<td nowrap>图片:</td>
		<td>
			<input type="file" name="pic_src"/>&nbsp;&nbsp;<span>支持格式：gif、jpeg、pjpeg、png&nbsp;大小：10M以内</span>
		</td>
	</tr>

	<tr>
		<td nowrap><?=get_lang('ly200.description').lang_name($i, 0);?>:</td>
		<td class="ck_editor"><textarea style="width: 500px;height: 200px;" name="happen"></textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="<?=get_lang('ly200.add');?>" name="submit" class="form_button"><a href='index.php' class="return"><?=get_lang('ly200.return');?></a></td>
	</tr>
</table>
</form>
<?php include('../../inc/manage/footer.php');?>