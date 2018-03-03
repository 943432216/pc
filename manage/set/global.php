<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');
include('../../inc/manage/do_check.php');

check_permit('global_set');
 
if($_POST){
	$SeoTitle=format_post_value($_POST['SeoTitle']);
	$SeoKeywords=format_post_value($_POST['SeoKeywords']);
	$SeoDescription=format_post_value($_POST['SeoDescription']);
	$copy=format_post_value($_POST['copy']);
	$php_contents="\$mCfg['SeoTitle']='$SeoTitle';\r\n\$mCfg['SeoKeywords']='$SeoKeywords';\r\n\$mCfg['SeoDescription']='$SeoDescription';\r\n\r\n\$mCfg['copy']='$copy';";
	
	$to_mail=format_post_value($_POST['to_mail']);
	$php_contents.="\r\n\$mCfg['to_mail']='$to_mail';";
	//处理LOGO图片
	$logo_img_old=$_POST['logo_img_old'];
	if(get_cfg('ly200.logo_img')){
		$save_dir=get_cfg('ly200.up_file_base_dir').'LOGO/';
		if($Filepath=up_file($_FILES['logo_img'],$save_dir)){
			$php_contents.="\$mCfg['logo_img']='$Filepath';\r\n\r\n";
			del_file($logo_img_old);
		}else{
			$php_contents.="\$mCfg['logo_img']='{$logo_img_old}';\r\n\r\n";
		}
	}
	//保存另外的语言版本的数据
	if(count(get_cfg('ly200.lang_array'))>1){
		for($i=1; $i<count(get_cfg('ly200.lang_array')); $i++){
			$field_ext='_'.get_cfg('ly200.lang_array.'.$i);
			$SeoTitleExt=format_post_value($_POST['SeoTitle'.$field_ext]);
			$SeoKeywordsExt=format_post_value($_POST['SeoKeywords'.$field_ext]);
			$SeoDescriptionExt=format_post_value($_POST['SeoDescription'.$field_ext]);
			//处理LOGO图片
			if(get_cfg('ly200.logo_img')){
				if($Filepath_=up_file($_FILES['logo_img'.$field_ext],$save_dir)){
					$php_contents.="\$mCfg['logo_img{$field_ext}']='$Filepath_';\r\n\r\n";
				}else{
					$old_img=$_POST['logo_img_old'.$field_ext];
					$php_contents.="\$mCfg['logo_img{$field_ext}']='$old_img';\r\n\r\n";
				}
			}
			$php_contents.="\$mCfg['SeoTitle{$field_ext}']='$SeoTitleExt';\r\n\$mCfg['SeoKeywords{$field_ext}']='$SeoKeywordsExt';\r\n\$mCfg['SeoDescription{$field_ext}']='$SeoDescriptionExt';\r\n\r\n";
		}
	}
	
	//----------------------------------------------------------------------------------------------------------------------------------------------------------
	
	$JsCode=format_post_value($_POST['JsCode'], 0);
	$php_contents.="\$mCfg['JsCode']='$JsCode';\r\n\r\n";
	
	//----------------------------------------------------------------------------------------------------------------------------------------------------------
	
	write_file('/inc/set/', 'global.php', "<?php\r\n$php_contents?>");
	
	save_manage_log('系统全局设置');
	
	header('Location: global.php');
	exit;
}

include('../../inc/manage/header.php');
?>

<div class="header">
     <?=get_lang('ly200.current_location');?>
     :<a href="global.php">
     <?=get_lang('set.global.set');?>
     </a></div>
<form method="post" name="act_form" id="act_form" class="act_form" action="global.php" enctype="multipart/form-data" onsubmit="return checkForm(this);">
     <table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table">
          <?php if(get_cfg('ly200.logo_img')){?>
          <tr>
               <td nowrap><?=get_lang('ly200.logo_img');?>:</td>
               <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <?php 
              if($len=count(get_cfg('ly200.lang_array'))){
              for($i=0;$i<$len;$i++){?>
                         <tr>
                              <td width="5%" nowrap="nowrap"></td>
                              <td width="95%"><input name="logo_img<?=lang_name($i, 1);?>" type="file" class="form_input" >
                                   <span class="fc_red">(尺寸83*103px)</span>
                                   <input type="hidden" name="logo_img_old<?=lang_name($i,1)?>" value="<?=$mCfg['logo_img'.lang_name($i,1)]?>" />
                                   <?php if($mCfg['logo_img'.lang_name($i,1)]){?>
                                   <div id="logo_div_<?=$i?>"> <img src="<?=$mCfg['logo_img'.lang_name($i,1)]?>"  /> </div>
                                   <?php }?></td>
                         </tr>
                         <?php }}?>
                    </table></td>
          </tr>
          <?php }?>
          <tr>
          	<td width="5%">版权:</td>
               <td width="95%"><input type="text" class="form_input" name="copy" value="<?=htmlspecialchars($mCfg['copy'])?>" size="70" max="200" /></td>
			<tr>
				<td width="5%">收件箱:</td>
				<td width="95%"><input type="text" class="form_input" name="to_mail" value="<?=htmlspecialchars($mCfg['to_mail'])?>" size="70" max="200" /></td>
          </tr>
          <?php for($i=0; $i<count(get_cfg('ly200.lang_array')); $i++){?>
          <tr>
               <td width="5%" nowrap><?=get_lang('ly200.seo.seo').lang_name($i, 0);?>
                    :</td>
               <td width="95%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                         <tr>
                              <td width="5%" nowrap="nowrap"><?=get_lang('ly200.seo.title');?>
                                   :</td>
                              <td width="95%"><input name="SeoTitle<?=lang_name($i, 1);?>" type="text" value="<?=htmlspecialchars($mCfg['SeoTitle'.lang_name($i, 1)]);?>" class="form_input" size="70" maxlength="200" check="<?=get_lang('ly200.filled_out').get_lang('ly200.seo.title');?>!~*"></td>
                         </tr>
                         <tr>
                              <td nowrap="nowrap"><?=get_lang('ly200.seo.keywords');?>
                                   :</td>
                              <td><input name="SeoKeywords<?=lang_name($i, 1);?>" type="text" value="<?=htmlspecialchars($mCfg['SeoKeywords'.lang_name($i, 1)]);?>" class="form_input" size="70" maxlength="200" check="<?=get_lang('ly200.filled_out').get_lang('ly200.seo.keywords');?>!~*"></td>
                         </tr>
                         <tr>
                              <td nowrap="nowrap"><?=get_lang('ly200.seo.description');?>
                                   :</td>
                              <td><input name="SeoDescription<?=lang_name($i, 1);?>" type="text" value="<?=htmlspecialchars($mCfg['SeoDescription'.lang_name($i, 1)]);?>" class="form_input" size="70" maxlength="200" check="<?=get_lang('ly200.filled_out').get_lang('ly200.seo.description');?>!~*"></td>
                         </tr>
                    </table></td>
          </tr>
          <?php }?>
          <tr>
               <td nowrap><?=get_lang('set.global.js_code');?>
                    :</td>
               <td><textarea name="JsCode" rows="8" cols="100" class="form_area"><?=htmlspecialchars($mCfg['JsCode']);?>
</textarea></td>
          </tr>
          <tr>
               <td>&nbsp;</td>
               <td><input type="submit" value="<?=get_lang('ly200.submit');?>" name="submit" class="form_button"></td>
          </tr>
     </table>
</form>
<?php include('../../inc/manage/footer.php');?>