<script language="javascript" src="/js/magiczoom.js"></script>
<div class="pro-top">
	<div class="pro_img fl">
		<div class="bigimg"><a href="<?=str_replace('s_', '', $product_row['PicPath_0']);?>" class="MagicZoom" id="zoom" rel="zoom-position:custom; zoom-width:350px; zoom-height:350px;"><img src="<?=str_replace('s_', "411X317_", $product_row['PicPath_0']);?>" id="bigimg_src" /></a></div>
		<div id="zoom-big" style="left:413px;"></div>
          <div class="clear"></div>
          <div class="small-img-box">
			<div class="small-img-page-l" onclick="img_scroll(-1);"></div>
          	<div class="of">
                    <ul>
                         <?php for($i=0;$i<5;$i++){
							if(!is_file($site_root_path.$product_row['PicPath_'.$i]))continue;	 
						?>
                         <li class="img_center"><a href="javascript://;" onclick="showPreview('<?=str_replace('s_', "411X317_", $product_row['PicPath_'.$i]);?>', '<?=str_replace('s_', '', $product_row['PicPath_'.$i]);?>'); this.blur();"><img class="img_" src="<?=str_replace('s_', '111X85_', $product_row['PicPath_'.$i]);?>" /><span class="span"></span></a></li>
                         <?php }?>
                    </ul>
               </div>
			<div class="small-img-page-r"  onclick="img_scroll(1);"></div>
          </div>
	</div>
     <script type="text/javascript">
		var obj=new Array();
		obj['box']=jQuery('.of ul');
		obj['item_']=jQuery('.of ul li');
		obj['length']=obj['item_'].size();
		obj['step']=121;
		obj['index']=0;
		obj['box_width']=obj['length']*obj['step'];
		obj['box'].width(obj['box_width']);
		function img_scroll(value){
			if(!obj['box'].is(':animated')){
				var offset=parseInt(obj['box'].css('left'));
				if(value==-1 && offset<0){
					obj['box'].animate({'left':'+=121px'});
				}else if(value==1 && offset>-(obj['box_width']-355-121)){
					obj['box'].animate({'left':'-=121px'});
				}
			}
		}
     </script>
     <div class="pro-info fl">
     	<div class="name"><?=$product_row['Name']?></div>
          <div class="row">【商品名称】&nbsp;<?=$product_ext['value_1']?></div>
          <div class="row">【通用名称】&nbsp;<?=$product_ext['value_2']?></div>
          <div class="row">【生产企业】&nbsp;<?=$product_ext['value_3']?></div>
          <div class="row">【商品规格】&nbsp;<?=$product_ext['value_4']?></div>
          <div class="row">【功能主治】&nbsp;<?=format_text($product_row['BriefDescription'])?></div>
     </div>
     <div class="blank38"></div>
</div>


<!--详细介绍-->
<div class="desc-title"><span>产品详情</span></div>
<div class="contents">
	<?=$product_description['Description']?>
</div>




















