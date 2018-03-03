
<?php
if($pageName=='index'){
$banner=$db->get_one('ad',"AId='1'");
?>
<div class="banner_bg" >
	<?php
     for($i=0;$i<5;$i++){
	if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
	?>
     <div class="banner_list" title="<?=$banner['Name_'.$i]?>" href="<?=$banner['Url_'.$i]?>" style="background:url(<?=$banner['PicPath_'.$i]?>) no-repeat top center;<?=$i==0?'':';display:none;'?>"><a  title="<?=$banner['Name_'.$i]?>" href="<?=$banner['Url_'.$i]?>"></a></div>
     <?php }?>
	<div class="banner_page_box">
		<div class="banner_page">
			<img src="/images/banner_left.png" class="l_b" />
			<img src="/images/banner_right.png" class="r_b"  />
		</div>
	</div>
     <!--banner里面的切换按钮-->
     <div class="banner_point">
          <div class="center" style="width:72px;height:11px;">
               <?php
               for($i=0;$i<5;$i++){
               if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
               ?>
               <a href="javascript:void(0);" class="<?=$i==0?' hover':''?>" ></a>
               <?php }?>
          </div>
     </div>
</div>
<script type="text/javascript" src="/js/banner.js"></script>
<?php }else{
	
?>
<div class="banner_bg orther_banner" >
	<?php
     for($i=0;$i<5;$i++){
	if(!is_file($site_root_path.$banner['PicPath_'.$i]))continue;
	?>
     <div class="banner_list" style="background:url(<?=$banner['PicPath_'.$i]?>) no-repeat top center;<?=$i==0?'':';display:none;'?>"><a  title="<?=$banner['Name_'.$i]?>" href="<?=$banner['Url_'.$i]?>"></a></div>
     <?php }?>
</div>
<?php }?>