<ul>
	<li  class="staTwo">
		<div class="width float bgcolor">
			<a href="index.php">首页</a>
		</div>
	</li>
	<li class="staOne" id="t1">
		<div class="width float"><a href="javascript:;">关于心宝</a></div>
		<ul class="i_uls">
			<?php
			if(!empty($art_group[1])){
				foreach((array)$art_group[1] as $item){
			?>
			<li>
				<a href="/mobile<?=get_url('article',$item)?>"><?=$item['Title']?></a>
			</li>
			<?php }}?>
		</ul>
	</li>
	<li class="staOne" id="t2">
		<div class="width float"><a href="javascript:;">产品中心</a></div>
		<ul class="i_uls">
			<?php
			if(!empty($product_cate)){
				foreach((array)$product_cate as $item){
			?>
			<li>
				<a href="/mobile<?=get_url('product_category',$item)?>"><?=$item['Category']?></a>
			</li>
			<?php }}?>
		</ul>
	</li>
	<li class="staOne" id="t3">
		<div class="float width"><a href="javascript:;">心肾同治</a></div>
		<ul class="i_uls">
			<?php
			if(!empty($info2_cate)){
				foreach((array)$info2_cate as $item){
			?>
			<li>
				<a href="/mobile<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a>
			</li>
			<?php }}?>
		</ul>
	</li>
	<li class="staOne" id="t4">
		<div class="float width"><a href="javascript:;">最新动态</a></div>
		<ul class="i_uls">
			<?php
			if(!empty($info_cate)){
				foreach((array)$info_cate as $item){
					if($item['CateId'] == 7){continue;}
			?>
			<li>
				<a href="/mobile<?=get_url('info_category',$item)?>"><?=$item['Category']?></a>
			</li>
			<?php }}?>
		</ul>
	</li>
	<li id="t7" class="staTwo">
		<div class="width float"><a href="info.php?CateId=6">视频中心</a></div>
	</li>
	<li id="t5" class="staTwo">
		<div class="width float"><a href="contact.php?AId=11">联系心宝</a></div>
	</li>
	<li id="t6" class="staTwo">
		<div class="width float"><a href="https://sso.jingoal.com/#/login">员工登录</a></div>
	</li>
</ul>