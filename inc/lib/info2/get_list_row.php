<?php
/*
url可带参数：
CateId:类别ID
*/

$CateId=(int)$_GET['CateId'];
$CateId && $where.=' and '.get_search_where_by_CateId($CateId, 'info2_category');

$row_count=$db->get_row_count('info2', $where);
$total_pages=ceil($row_count/$page_count);
$page=(int)$_GET['page'];
$page<1 && $page=1;
$page>$total_pages && $page=1;
$start_row=($page-1)*$page_count;
$info_row=$db->get_limit('info2', $where, '*', 'MyOrder desc, InfoId desc', $start_row, $page_count);
?>