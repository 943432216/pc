<?php 
include('../../inc/site_config.php');
include('../../inc/set/ext_var.php');
include('../../inc/fun/mysql.php');
include('../../inc/function.php');
include('../../inc/manage/config.php');

$HorID = htmlentities($_GET['HorID']);

$info = $db->get_one('honor', "HorID=$HorID");
// var_dump($info);exit;
if (unlink($site_root_path.$info['hor_src'])) {
	$db->delete('honor', "HorID=$HorID");
	echo "<script>alert('删除成功！');</script>";
}
header('Location:index.php');

?>