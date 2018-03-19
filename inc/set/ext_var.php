<?php
/*
Powered by ly200.com		http://www.ly200.com
广州联雅网络科技有限公司		020-83226791
*/

$website_url_type=0;	//链接地址类型，0：动态，1：静态，2：伪静态，当值为0时请设置$website_url_ary变量
$website_url_ary=array(
	'article_group_0'	=>	'return sprintf("/article.php?AId=%s", $row["AId"]);',	//信息页分组一
	'article_group_1'	=>	'return sprintf("/article.php?AId=%s", $row["AId"]);',	//信息页分组二
	'article_group_2'	=>	'return sprintf("/article.php?AId=%s", $row["AId"]);',	//信息页分组三
	'article_group_3'	=>	'return sprintf("/article.php?AId=%s", $row["AId"]);',	//信息页分组四
	'article_group_4'	=>	'return sprintf("/article.php?AId=%s", $row["AId"]);',	//信息页分组五
	
	'info'				=>	'return sprintf("/info-detail.php?InfoId=%s", $row["InfoId"]);',	//文章详细页
	'info_category'		=>	'return sprintf("/info.php?CateId=%s", $row["CateId"]);',	//文章分类列表页
	
	'info2'					=>	'return sprintf("/info2-detail.php?InfoId=%s", $row["InfoId"]);',	//文章详细页
	'info2_category'		=>	'return sprintf("/info2.php?CateId=%s", $row["CateId"]);',	//文章分类列表页
	
	'instance'			=>	'return sprintf("/instance-detail.php?CaseId=%s", $row["CaseId"]);',	//成功案例详细页
	'instance_category'	=>	'return sprintf("/instance.php?CateId=%s", $row["CateId"]);',	//成功案例分类列表页
	
	'product'			=>	'return sprintf("/products-detail.php?ProId=%s", $row["ProId"]);',	//产品详细页
	'product_category'	=>	'return sprintf("/products.php?CateId=%s", $row["CateId"]);',	//产品分类列表页
	'product_brand'		=>	'return sprintf("/brand.php?BId=%s", $row["BId"]);',	//产品品牌列表页
);

$LockChinaIp=0;	//是否屏蔽国内IP
($LockChinaIp==1 && (int)$_SESSION['ly200_AdminUserId']==0 && $_SERVER['PHP_SELF']!='/404.php' && substr_count($_SERVER['PHP_SELF'], '/manage/')==0 && (preg_match('/zh-c/i', substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4)) || preg_match('/zh/i', substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4)))) && exit('<script language="javascript">window.top.location="/404.php";</script>');

/*
	$table = "info_category";
	$where = "UId='0,'";
	$fields = "Category_lang_1,CateId,UId,Dept";
	$order = "MyOrder DESC,CateId ASC";
	$Category_name = "info_category";
	$lang = "_lang_1";
*/

/*递归输出左侧栏  注：产品分类，新闻分类，案例分类*/
function getLeftnav($table,$where,$field,$order=' MyOrder DESC',$lang='',$Category,$CateId,$isshow=1){
	global $db;
	$Data = $db->get_all($table,$where,$field,$order);
	if($Data){
		echo "<div class='box$item[Dept]'>";
		foreach((array) $Data as $item){
			$TopCateId = TopCateId($table,$CateId);
			$cur = $CateId==$item['CateId'] || $TopCateId==$item['CateId'] ? 'cur' : "" ;
			$UId = $item['UId'].$item['CateId'].',';
			if(!$lang){
				$links = get_url($Category,$item);
				$Name = cut_str($item["Category$lang"],20);
			}else{
				$links = '/en'.get_url($Category,$item);
				$Name = cutEn($item["Category$lang"],20);
			}
			//if(!$isshow){
				$UID = explode(',',$item['UId']);
				$Display = $item['UId']!='0,' ? ($TopCateId==$UID[1] ? "style='display:block;'" : "style='display:none;'") : "";
			//}
			echo "<div $Display class='tithig".$item['Dept']." $cur'><a href='".$links."' title='".$Name."'>".$Name."</a></div>";
			getLeftnav($table,"UId='$UId'",$field,$order,$lang,$Category,$CateId);
		}
		echo "</div>";
	}
	return $Data;
}


/*递归输出左侧栏  注:信息页*/
function getLeftart($table,$where,$field,$order=' MyOrder DESC',$Group,$AId,$lang=''){
	global $db;
	$article = $db->get_all($table,$where,$field,$order);
	if($article){
		foreach((array) $article as $item){
			$cur = $AId==$item['AId'] ? "cur" : "" ;
			if($lang){
				$links = '/en'.get_url("article_group_".$Group,$item);
			}else{
				$links = get_url("article_group_".$Group,$item);
			}
			echo "<div class='tithig1 $cur'><a href='".$links."'>".$item["Title$lang"]."</a></div>";
		}
	}
	return $Data;
}
function cutEn($str,$len,$char='...'){
	if(strlen(strip_tags($str))>$len){
		$str = substr(strip_tags($str),0,$len).$char;
	}else{
		$str = $str;
	}
	return $str;
}

//-------------------------------------------------------------------------------------------
function ouput_Category_to_Array_asc($TB='product_category', $field='*', $where='UId="0,"', $ext_where=1){	//把类别表输出到一个数组，$field中UId为必须
	global $db;
	
	$cate_ary=array();
	$cate_row=$db->get_all($TB, $where, $field, 'MyOrder asc, CateId asc');
	ouput_Category_to_Array_ext_asc($cate_row, $TB, $field, $ext_where, 0, '', $cate_ary);
	
	return $cate_ary;
}

function ouput_Category_to_Array_ext_asc($cate_row, $TB, $field, $ext_where, $layer, $PreChars, &$cate_ary){	//递归循环输出类别到数组
	global $db;
	
	$row_count=count($cate_row);
	for($i=0; $i<$row_count; $i++){
		$cate_row[$i]['PreChars']=str_replace(' ', '&nbsp;', $PreChars.($i+1==$row_count?'└':'├'));
		$cate_ary[]=$cate_row[$i];
		
		if($cate_row_ext=$db->get_all($TB, "UId='{$cate_row[$i]['UId']}{$cate_row[$i]['CateId']},' and $ext_where", $field, 'MyOrder asc, CateId asc')){
			$PreChars.=$i+1==$row_count?'   ':'｜';   //前导符
			$layer++;
			ouput_Category_to_Array_ext_asc($cate_row_ext, $TB, $field, $ext_where, $layer, $PreChars, $cate_ary);
			$PreChars=substr($PreChars, 0, -3);
			$layer--;
		}
	}
}
function seo_meta_as_lang($row_data=array(),$lang=''){	//前台页面输出标题标签
	global $mCfg;
	$lang = $lang ? '_lang_'.$lang : '';
	$SeoTitle=htmlspecialchars($row_data['SeoTitle'.$lang]?$row_data['SeoTitle'.$lang]:$mCfg['SeoTitle'.$lang]);
	$SeoKeywords=htmlspecialchars($row_data['SeoKeywords'.$lang]?$row_data['SeoKeywords'.$lang]:$mCfg['SeoKeywords'.$lang]);
	$SeoDescription=htmlspecialchars($row_data['SeoDescription'.$lang]?$row_data['SeoDescription'.$lang]:$mCfg['SeoDescription'.$lang]);
	return "<meta name=\"keywords\" content=\"$SeoKeywords\" />\r\n<meta name=\"description\" content=\"$SeoDescription\" />\r\n<title>$SeoTitle</title>\r\n";
}

function get_webpath($data,$table,$lang='',$char=" &gt; "){
	//$lang_num=(int)$lang;
	global $db;
	$lang_num=(int)$lang;
	$lang_ext=array(
		0	=>	''
	);
	$lang = $lang? '_lang_'.$lang :'';
	$UId = trim($data['UId'],',');
     if($UId=='0'){
        $str = $char."<a  href='".$lang_ext[$lang_num].get_url($table,$data)."'>".$data['Category'.$lang]."</a>";  
     }
	if(!$UId){
		return $str;
	}else{
		$all = $db->get_all($table,"CateId IN($UId)","Category{$lang},CateId,PageUrl",'Dept asc');
		
		$j = 0;
		$len = count($all);
		foreach((array)$all as $item){
			$str .= ($j==0 ? $char : "")."<a href='".$lang_ext[$lang_num].get_url($table,$item)."'>".$item['Category'.$lang]."</a>".$char;
			++$j;
		}
         $str.="<a class='url_pos' href='".$lang_ext[$lang_num].get_url($table,$data)."'>".$data['Category'.$lang]."</a>";
		return $str;
	}
}
function get_top_CateId_by_UId1($UId, $i=1){
	$cateid_ary=explode(',', $UId);
	return $cateid_ary[$i];
}
/*if($CateId){
	$UId=get_UId_by_CateId($CateId, 'product_category');
	$TopCateId=(int)get_top_CateId_by_UId1($UId);
	$SecCateId=(int)get_top_CateId_by_UId1($UId, 2);
	$ThdCateId=(int)get_top_CateId_by_UId1($UId, 3);
}*/
function file_size_to_string($file_size){//计算文件大小
	$measurement=array(
					'B'	=>		1,
					'K'	=>		1*1024,
					'M'	=>		1*1024*1024,
					'G'	=>		1*1024*1024*1024,
					'T'	=>		1*1024*1024*1024*1024
	);
	if($file_size<$measurement['K']){
		return $file_size.'B';
	}
	elseif($file_size<$measurement['M']){
		return ceil($file_size/$measurement['K']).'K';
	}
	elseif($file_size<$measurement['G']){
		return ceil($file_size/$measurement['M']).'M';
	}
	elseif($file_size<$measurement['T']){
		return ceil($file_size/$measurement['G']).'G';
	}
}
function turn_page_ext($page, $total_pages, $query_string, $row_count, $pre_page='<<', $next_page='>>', $html=0, $base_page=3){	//翻页
	if(!$row_count){
		return '';
	}
	
	if($html==1){
		$query_string='page-';
		$html_ext='.html';	//静态链接的后辍
	} 
	
	$i_start=$page-$base_page>0?$page-$base_page:1;
	$i_end=$page+$base_page>=$total_pages?$total_pages:$page+$base_page;
	
	($total_pages-$page)<$base_page && $i_start=$i_start-($base_page-($total_pages-$page));
	$page<=$base_page && $i_end=$i_end+($base_page-$page+1);
	
	$i_start<1 && $i_start=1;
	$i_end>=$total_pages && $i_end=$total_pages;
	
	$turn_page_str='';
	$pre=$page-1>0?$page-1:1;
	$turn_page_str.="<a href='$query_string$pre$html_ext' class='page_button hover'>$pre_page</a>&nbsp;";
	
	$cou_i = 0;
	for($i=$i_start; $i<=$i_end; $i++){
		$turn_page_str.=$page!=$i?"<a href='{$query_string}{$i}{$html_ext}' class='page_item pagenum'>$i</a>&nbsp;":"<font class='page_item_current pagenum'>$i</font>&nbsp;";
		$cou_i++;
		if ($cou_i == 3 && $total_pages-$i_end >1) {
			$turn_page_str .= "<a class='page_item pagenum'>...</a>";
		}
	}
	
	$i_end<$total_pages && $turn_page_str.="<a href='{$query_string}{$total_pages}{$html_ext}' class='page_item pagenum'>$total_pages</a>";
	
	$next=$page+1>$total_pages?$total_pages:$page+1;
	$page>=$total_pages && $page--;
	$turn_page_str.="<a href='$query_string$next$html_ext' class='page_button'>$next_page</a>";
	
	return $turn_page_str;
}
?>