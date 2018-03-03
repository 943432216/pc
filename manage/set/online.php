<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');
include('../../inc/manage/do_check.php');
check_permit('online');

if($_POST){
	$php_contents="<?php\r\n//在线客服\r\n\r\n";
	
	$j=0;
	for($i=0; $i<count($_POST['Account']); $i++){
		if($_POST['Account'][$i]!=''){
			$_Name=format_post_value($_POST['Name'][$i]);
			$_Account=format_post_value($_POST['Account'][$i]);
			$_AccountType=(int)$_POST['AccountType'][$i];
			
			$php_contents.="\$mCfg['online'][$j]['Name']='$_Name';\r\n";
			$php_contents.="\$mCfg['online'][$j]['Account']='$_Account';\r\n";
			$php_contents.="\$mCfg['online'][$j]['AccountType']=$_AccountType;\r\n\r\n";
			$j++;
		}
	}
	
	$php_contents.='?>';
	write_file('/inc/set/', 'online.php', $php_contents);
	
	save_manage_log('在线客服设置');
	
	header('Location: online.php');
	exit;
}
function get_online_select($sed='')
{
	global $online_ary;
	$html='<select name="AccountType[]">';
	for($i=0;$i<count($online_ary);$i++)
	{
		$selected=$sed==$i?'selected="selected"':'';
		$html.='<option value="'.$i.'" '.$selected.'>'.$online_ary[$i].'</option>';	
	}
	$html.='</select>';
	return $html;
}

include('../../inc/manage/header.php');
?>
<script type="text/javascript">
function add_online_list_item(obj){
	var newrow=$_(obj).insertRow(-1);
	var list=$_('select_list').innerHTML;
	newcell=newrow.insertCell(-1);
	newcell.innerHTML='名称:<input name="Name[]" type="text" value="" class="form_input" size="25" maxlength="100"> 帐号:<input name="Account[]" type="text" value="" class="form_input" size="45" maxlength="200">&nbsp;帐号类型:'+list+'&nbsp;<a href="javascript:void(0)" onclick="$_(\'online_list\').deleteRow(this.parentNode.parentNode.rowIndex);"><img src="../images/del.gif" hspace="5" /></a>';
}
</script>
<div id="select_list" style="display:none">
<?=get_online_select()?>
</div>
<div class="header"><img src="../images/jt.jpg" align="absmiddle" /><?=get_lang('ly200.current_location');?>:<a href="online.php"><?=get_lang('set.online.online_manage');?></a></div>
<form method="post" name="act_form" id="act_form" class="act_form" action="online.php" enctype="multipart/form-data" onsubmit="return checkForm(this);">
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table">
	<tr>
		<td width="5%" nowrap><?=get_lang('ly200.item');?>:</td>
		<td width="95%">
			<table border="0" cellspacing="0" cellpadding="0" id="online_list" class="item_data_table">
				<tr>
					<td><a href="javascript:void(0);" onClick="this.blur(); add_online_list_item('online_list');" class="red"><?=get_lang('ly200.add_item');?></a></td>
				</tr>
				<?php
				$count=count($mCfg['online']);
				$count==0 && $count=1;
				for($i=0; $i<$count; $i++){
				?>
					<tr>
						<td><?=get_lang('ly200.name');?>:<input name="Name[]" type="text" value="<?=htmlspecialchars($mCfg['online'][$i]['Name']);?>" class="form_input" size="25" maxlength="100"> 帐号:<input name="Account[]" type="text" value="<?=htmlspecialchars($mCfg['online'][$i]['Account']);?>" class="form_input" size="45" maxlength="200"> 帐号类型:<?=get_online_select($mCfg['online'][$i]['AccountType'])?><a href="javascript:void(0)" onClick="$_('online_list').deleteRow(this.parentNode.parentNode.rowIndex);"><img src="../images/del.gif" hspace="5" /></a></td>
					</tr>
				<?php }?>
			</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" value="<?=get_lang('ly200.submit');?>" name="submit" class="form_button"><input type="hidden" name="data" value="1" /></td>
	</tr>
</table>
</form>
<?php include('../../inc/manage/footer.php');?>