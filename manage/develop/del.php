<?php 
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');

$DevID = htmlentities($_GET['DevID']);
$info = $db->get_one('develop', "DevID=$DevID");
if (unlink($site_root_path.$info['pic_src'])) {
	$db->delete('develop', "DevID=$DevID");
	echo "<script>alert('删除成功！');</script>";
}
header('Location:index.php');

?>