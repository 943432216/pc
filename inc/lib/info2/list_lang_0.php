<?php
$query_string=query_string('page');
$turn_page_query_string=$website_url_type==0?"?$query_string&page=":'page-';

if(!isset($info_row)){
	$page_count=20;
	$where='Language=0';
	include($site_root_path.'/inc/lib/info2/get_list_row.php');
}

ob_start();
?>
<ul id="lib_info_list">
	<?php
	for($i=0; $i<count($info_row); $i++){
	?>
		<li><span class="fl">&#8226; <a href="<?=$info_row[$i]['ExtUrl']?$info_row[$i]['ExtUrl']:get_url('info2', $info_row[$i]);?>" target="_blank"><?=$info_row[$i]['Title'];?></a></span><!--<span class="fr"><?=date('Y年-m月-d日',$info_row[$i]['AccTime'])?>--></span></li>
	<?php }?>
</ul>
<div class="blank66"></div>
<?php if($total_pages>0){?>
<div id="turn_page">
	<span>当前为第<?=$page?>页/共<?=$total_pages?>页</span>
	<a href="/info2.php?<?=$query_string?>&page=1" class="page_item hover">首页</a>
	<?=turn_page_ext($page, $total_pages, $turn_page_query_string, $row_count, '上一页', '下一页', $website_url_type,1);?>
	<a href="/info2.php?<?=$query_string?>&page=<?=$total_pages?>" class="page_item hover">未页</a>
	<form style="display:inline;" action="/info2.php?<?=query_string('page')?>" method="GET">转到 <input class="page" type="text" name="page" onkeyup="set_number(this,0)" onpaste="set_number(this,0)" /> 页 <input type="submit" class="submit" onclick="return go_url();" value="Go" /></form>
	<script type="text/javascript">
		function go_url(){
			var v = jQuery('.page').val();
			window.location='/info2.php?<?=query_string('page')?>'+"&page="+parseInt(v);
			return false;
		}
	</script>
</div>
<?php }?>
<div class="blank55"></div>
<?php
$info_list_lang_0=ob_get_contents();
ob_clean();
?>