<?php
$product_cate=$db->get_all('product_category','1','*','MyOrder desc,CateId asc');
$art_list=$db->get_all('article',"GroupId in(1,2,3)",'*',"GroupId asc,MyOrder desc,AId asc");
$art_group=array();
foreach($art_list as $item){
	$art_group[$item['GroupId']][]=$item;
}

$info_cate=$db->get_all('info_category','1','*','MyOrder desc,CateId asc');
$info2_cate=$db->get_all('info2_category','UId="0,"','*','MyOrder desc,CateId asc');
?>