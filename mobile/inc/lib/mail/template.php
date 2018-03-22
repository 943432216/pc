<?php
ob_start();
?>
<div style="width:700px; margin:10px auto;">
	<table width="700" border="0" cellspacing="0" cellpadding="0" style="border-bottom:2px solid #999;">
		<tr>
			<td width="350" style="padding-bottom:8px;"><a href="<?=get_domain();?>" target="_blank"><img src="<?=get_domain().$mCfg['logo_img'];?>" border="0" /></a></td>
			<td width="350" align="right" valign="bottom" style="padding-bottom:8px;">
				<div style="text-align:right; font-size:9px; font-family:Arial; color:#333; height:25px; width:100%;"><?=date('m/d/Y H:i:s', $service_time);?></div>
				<a href="<?=get_domain();?>" target="_blank" style="font-size:11px; margin-left:12px; text-decoration:underline; color:#1E5494; font-family:Verdana;">首页</a>
				<!--<a href="<?=get_domain().$member_url;?>" target="_blank" style="font-size:11px; margin-left:12px; text-decoration:underline; color:#1E5494; font-family:Verdana;">My Account</a>
				<a href="<?=get_domain();?>/contact-us.html" target="_blank" style="font-size:11px; margin-left:12px; text-decoration:underline; color:#1E5494; font-family:Verdana;">Contact Us</a>-->
			</td>
		</tr>
	</table>
	<div style="font-family:Arial; padding:15px 0; line-height:150%; min-height:100px; _height:100px; color:#333; font-size:12px;"><?=$mail_contents;?></div>
	
</div>
<?php
$mail_contents=ob_get_contents();
ob_end_clean();
?>