<?php
ob_start();
?>
<div style="border:1px solid #ddd; background:#f7f7f7; border-bottom:none; width:130px; height:26px; line-height:26px; text-align:center; font-size:12px; font-family:Arial;"><strong>在线留言</strong></div>
<div style="border:1px solid #ddd; padding:10px; font-size:12px; font-family:Arial;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="110" style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;">姓名:</td>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;"><?=$FirstName;?></td>
	  </tr>
	  <tr>
		<td width="110" style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;">电话:</td>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;"><?=$Phone;?></td>
	  </tr>
	  <tr>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;">邮箱:</td>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;"><?=$Email;?></td>
	  </tr>
	  <tr>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;">主题:</td>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;"><?=$Email;?></td>
	  </tr>
      <tr>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;">内容:</td>
		<td style="padding:7px; border-bottom:1px solid #ddd; font-size:12px; font-family:Arial;"><?=format_text($Message);?></td>
	  </tr>
	</table>
	<div style="margin:0px auto; clear:both; height:20px; font-size:1px; overflow:hidden;"></div>
</div><br /><br />
<?php
$mail_contents=ob_get_contents();
ob_end_clean();
?>