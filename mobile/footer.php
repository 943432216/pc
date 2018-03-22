<div class="blogroll">
	<div class="blogroll_left">友情链接</div>
	<div class="blogroll_right">
		<?php 
		$link_row=$db->get_all('links','1','*','MyOrder desc,LId asc');
		foreach($link_row as $item){
		?>
		<a href="<?=$item['Url']?>"><?=$item['Name']?></a>
		<?php } ?>
	</div>
</div>
<footer class="width float">
	<p>《互联网药品信息服务资格证》 编号（粤）-非经营性-2011-0122</p>
	<p>Copyright © 广东心宝制药有限公司</p>
	<p>粤ICP备：10025609</p>
</footer>