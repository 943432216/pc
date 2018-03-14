<?php
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');


if($_POST['list_form_action']=='product_del'){
	check_permit('', 'product.del');
	if(count($_POST['select_ProId'])){
		$ProId=implode(',', $_POST['select_ProId']);
		$where="ProId in($ProId)";
		
		$product_row=$db->get_all('product', $where);
		for($i=0; $i<count($product_row); $i++){
			del_file($product_row[$i]['PageUrl']);
			if(get_cfg('product.pic_count')){
				for($j=0; $j<get_cfg('product.pic_count'); $j++){
					del_file($product_row[$i]['PicPath_'.$j]);
					del_file(str_replace('s_', '', $product_row[$i]['PicPath_'.$j]));
					foreach(get_cfg('product.pic_size') as $key=>$value){
						del_file(str_replace('s_', $value.'_', $product_row[$i]['PicPath_'.$j]));
					}
				}
			}
		}
		
		$db->delete('product_ext', "ProId in(select ProId from product where $where)");
		$db->delete('product_description', "ProId in(select ProId from product where $where)");
		$db->delete('product_wholesale_price', "ProId in(select ProId from product where $where)");
		$db->delete('product', $where);
	}
	save_manage_log('批量删除产品');
	
	$page=(int)$_POST['page'];
	$query_string=urldecode($_POST['query_string']);
	header("Location: index.php?$query_string&page=$page");
	exit;
}

if($_POST['bat_form_action']=='product_del'){
	check_permit('', 'product.del');
	$CateId=(int)$_POST['CateId'];
	
	if($CateId){
		$where=get_search_where_by_CateId($CateId, 'product_category');
		
		$product_row=$db->get_all('product', $where);
		for($i=0; $i<count($product_row); $i++){
			del_file($product_row[$i]['PageUrl']);
			if(get_cfg('product.pic_count')){
				for($j=0; $j<get_cfg('product.pic_count'); $j++){
					del_file($product_row[$i]['PicPath_'.$j]);
					del_file(str_replace('s_', '', $product_row[$i]['PicPath_'.$j]));
					foreach(get_cfg('product.pic_size') as $key=>$value){
						del_file(str_replace('s_', $value.'_', $product_row[$i]['PicPath_'.$j]));
					}
				}
			}
		}
		
		$db->delete('product_ext', "ProId in(select ProId from product where $where)");
		$db->delete('product_description', "ProId in(select ProId from product where $where)");
		$db->delete('product_wholesale_price', "ProId in(select ProId from product where $where)");
		$db->delete('product', $where);
	}
	save_manage_log('批量删除产品');
	
	header('Location: index.php');
	exit;
}

//分页查询
$where=1;
$Name=$_GET['Name'];
$ItemNumber=$_GET['ItemNumber'];
$Model=$_GET['Model'];
$CateId=(int)$_GET['CateId'];
$ext_where=$_GET['ext_where'];
$OrderBy=(int)$_GET['OrderBy'];
($OrderBy<0 || count($order_by_ary)<=$OrderBy) && $OrderBy=0;

$Name && $where.=" and Name like '%$Name%'";
$ItemNumber && $where.=" and ItemNumber='$ItemNumber'";
$Model && $where.=" and Model='$Model'";
$CateId && $where.=' and '.get_search_where_by_CateId($CateId, 'product_category');
$ext_where && $where.=" and $ext_where";

$row_count=$db->get_row_count('product', $where);
$total_pages=ceil($row_count/get_cfg('product.page_count'));
$page=(int)$_GET['page'];
$page<1 && $page=1;
$page>$total_pages && $page=1;
$start_row=($page-1)*get_cfg('product.page_count');
$product_row=$db->get_limit('product', $where, '*', $order_by_ary[$OrderBy].'MyOrder desc, ProId desc', $start_row, get_cfg('product.page_count'));

//获取类别列表
$cate_ary=$db->get_all('product_category');
for($i=0; $i<count($cate_ary); $i++){
	$category[$cate_ary[$i]['CateId']]=$cate_ary[$i];
}
$category_count=$db->get_row_count('product_category');
$select_category=ouput_Category_to_Select('CateId', '', 'product_category', 'UId="0,"', 1, get_lang('ly200.select'));

//获取页面跳转url参数
$query_string=query_string('page');
$all_query_string=query_string();

include('../../inc/manage/header.php');
?>
<div class="header">
	<div class="float_left"><?=get_lang('ly200.current_location');?>:<a href="index.php"><?=get_lang('product.product_manage');?></a>&nbsp;-&gt;&nbsp;<?=get_lang('ly200.list');?></div>
	<?php if(get_cfg('product.add')){?><div class="float_right"><a href="add.php"><?=get_lang('ly200.add');?></a></div><?php }?>
</div>
<form name="list_form" id="list_form" class="list_form" method="post" action="index.php"> 
<table width="100%" border="0" cellpadding="0" cellspacing="1" id="mouse_trBgcolor_table" not_mouse_trBgcolor_tr='list_form_title'>
	<tr align="center" class="list_form_title" id="list_form_title">
		<td width="5%" nowrap><strong><?=get_lang('ly200.number');?></strong></td>
		<?php if(get_cfg('product.del')){?><td width="5%" nowrap><strong><?=get_lang('ly200.select');?></strong></td><?php }?>
		
		<td width="20%" nowrap><strong><?=get_lang('ly200.name');?></strong></td>
		<?php if(get_cfg('product.item_number')){?><td width="10%" nowrap><strong><?=get_lang('product.item_number');?></strong></td><?php }?>
		<?php if(get_cfg('product.model')){?><td width="10%" nowrap><strong><?=get_lang('product.model');?></strong></td><?php }?>
		<?php if(get_cfg('product.price')){?><td width="10%" nowrap><strong><?=get_lang('product.price');?></strong></td><?php }?>
		<?php if(get_cfg('product.stock')){?><td width="5%" nowrap><strong><?=get_lang('product.stock');?></strong></td><?php }?>
		<?php if(get_cfg('product.start_from')){?><td width="5%" nowrap><strong><?=get_lang('product.start_from');?></strong></td><?php }?>
		<?php if($category_count>1){?><td width="15%" nowrap><strong><?=get_lang('ly200.category');?></strong></td><?php }?>
		<td width="10%" nowrap><strong><?=get_lang('ly200.time');?></strong></td>
		<?php if(get_cfg('product.mod') || get_cfg('product.copy')){?><td width="5%" nowrap><strong><?=get_lang('ly200.operation');?></strong></td><?php }?>
	</tr>
	<?php
	for($i=0; $i<count($product_row); $i++){
	?>
	<tr align="center">
		<td nowrap><?=$start_row+$i+1;?></td>
		<?php if(get_cfg('product.del')){?><td><input type="checkbox" name="select_ProId[]" value="<?=$product_row[$i]['ProId'];?>"></td><?php }?>
		<td class="break_all"><a href="<?=get_url('product', $product_row[$i]);?>" target="_blank"><?=list_all_lang_data($product_row[$i], 'Name');?></a></td>
		<?php if(get_cfg('product.item_number')){?><td nowrap><?=$product_row[$i]['ItemNumber'];?></td><?php }?>
		<?php if(get_cfg('product.model')){?><td nowrap><?=$product_row[$i]['Model'];?></td><?php }?>
		<?php if(get_cfg('product.price')){?>
			<td nowrap class="flh_150" align="left">
				<?php
				$p_ary=get_cfg('product.price_list');
				for($j=0; $j<count($p_ary); $j++){
					echo get_lang('product.price_list.'.$p_ary[$j]).':'.get_lang('ly200.price_symbols').sprintf('%01.2f', $product_row[$i]['Price_'.$j]).'<br>';
				}
				if(get_cfg('product.special_offer')){
					echo get_lang('product.special_offer').':'.($product_row[$i]['IsSpecialOffer']?('<font class="fc_red">'.get_lang('ly200.price_symbols').sprintf('%01.2f', $product_row[$i]['SpecialOfferPrice']).'</font>'):get_lang('ly200.n_y_array.0'));
				}
				?>
			</td>
		<?php }?>
		<?php if(get_cfg('product.stock')){?><td nowrap><?=$product_row[$i]['Stock'];?></td><?php }?>
		<?php if(get_cfg('product.start_from')){?><td nowrap><?=$product_row[$i]['StartFrom'];?></td><?php }?>
		<?php if($category_count>1){?>
			<td align="left" class="flh_150"><?php
				$lang_key=lang_name(array_search($product_row[$i]['Language'], get_cfg('ly200.lang_array')), 1);
				$UId=$category[$product_row[$i]['CateId']]['UId'];	//按CateId获取对应的UId
				$current_key_ary=@explode(',', $UId);
				for($m=1; $m<count($current_key_ary)-1; $m++){	//按CateId列表列出对应的类别名
					echo $category[$current_key_ary[$m]]['Category'.$lang_key].'<font class="fc_red">-></font>';
				}
				echo $category[$product_row[$i]['CateId']]['Category'.$lang_key];	//列表本身的类别名，因为UId不包含它本身
			?></td>
		<?php }?>
		<td nowrap><?=date(get_lang('ly200.time_format_ymd'), $product_row[$i]['AccTime']);?></td>
		<?php if(get_cfg('product.mod') || get_cfg('product.copy')){?><td nowrap><?php if(get_cfg('product.mod')){?><a href="mod.php?<?=$all_query_string;?>&ProId=<?=$product_row[$i]['ProId']?>"><img src="../images/mod.gif" alt="<?=get_lang('ly200.mod');?>"></a><?php }?><?php if(get_cfg('product.copy')){?>&nbsp;&nbsp;<a href="copy.php?ProId=<?=$product_row[$i]['ProId']?>"><img src="../images/copy.gif" alt="<?=get_lang('ly200.copy');?>"></a><?php }?></td><?php }?>
	</tr>
	<?php }?>
	<?php if((get_cfg('product.order') || get_cfg('product.del') || get_cfg('product.move')) && count($product_row)){?>
	<tr>
		<td colspan="20" class="bottom_act">
			<?php if(($category_count>1 && get_cfg('product.move')) || get_cfg('product.del')){?><input name="button" type="button" class="form_button" onClick='change_all("select_ProId[]");' value="<?=get_lang('ly200.anti_select');?>"><?php }?>
			<?php if(get_cfg('product.del')){?><input name="product_del" id="product_del" type="button" class="form_button" onClick="if(!confirm('<?=get_lang('ly200.confirm_del');?>')){return false;}else{click_button(this, 'list_form', 'list_form_action');};" value="<?=get_lang('ly200.del');?>"><?php }?>
			<input type="hidden" name="query_string" value="<?=urlencode($query_string);?>">
			<input type="hidden" name="page" value="<?=$page;?>">
			<input name="list_form_action" id="list_form_action" type="hidden" value="">
		</td>
	</tr>
	<?php }?>
</table>
</form>

<?php include('../../inc/manage/footer.php');?>