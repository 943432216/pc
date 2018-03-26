<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');

$dev_arr = $db->get_all('develop', 1, 'DevID,dev_cate,time,add_time', 'DevID asc');

// var_dump($dev_arr);exit;

include('../../inc/manage/header.php');
?>
<div class="header">
	<div class="float_left"><?=get_lang('ly200.current_location');?>:<a href="index.php">发展历程</a>&nbsp;-&gt;&nbsp;列表</div>
	<div class="float_right"><a href="add.php">添加</a></div>
</div>
<form name="list_form" id="list_form" class="list_form" method="post" action="index.php"> 
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table" not_mouse_trBgcolor_tr='list_form_title'>
	<tr align="center" class="list_form_title" id="list_form_title">
		<td width="5%" nowrap><strong><?=get_lang('ly200.number');?></strong></td>
		<td width="20%" nowrap><strong>节点分类</strong></td>
		<td width="15%" nowrap><strong>节点时间</strong></td>
		<td width="10%" nowrap><strong>更新时间</strong></td>
		<td width="5%" nowrap><strong>操作</strong></td>
	</tr>
	<?php
	foreach ($dev_arr as $k => $item) {
		$time = empty($item['time'])?'没有选择时间':date('Y-m-d', $item['time']);
	?>
	<tr align="center">
		<td nowrap><?=$k+1;?></td>
		<td class="break_all"><?php if($item['dev_cate']==1) {echo "一级节点";} else {echo "二级节点";} ?></td>
		<td align="left" class="flh_150"><?=$time?></td>
		<td nowrap><?=date('Y-m-d H:i:s', $item['add_time'])?></td>
		<td nowrap><a href="mod.php?DevID=<?=$item['DevID']?>"><img src="../images/mod.gif" alt=""></a>&nbsp;&nbsp;<a href="del.php?DevID=<?=$item['DevID']?>"><img src="../images/copy.gif" alt=""></a></td>
	</tr>
	<?php }?>
</table>
</form>

<?php include('../../inc/manage/footer.php');?>