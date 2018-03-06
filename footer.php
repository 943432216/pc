<div class="left blogoll">
	<div class="left blogoll_left ff"><p>友情链接：</p></div>
	<div class="left blogoll_right">
		<?php 
		$link_row=$db->get_all('links','1','*','MyOrder desc,LId asc');
		$i=0;
		foreach($link_row as $item){
		?>
		<a href="<?=$item['Url']?>"><?=$item['Name']?></a>
		<?php $i++;}?>
	</div>
</div>
<footer class="left width">
	<div class="left width footer_top position">
		<div class="logob"><img src="img/pc_logob.png"/></div>
		<span class="footer_nav left">
			<h2 class="ff">关于心宝</h2>
			<?php
			if(!empty($art_group[1])){
			?>
			<ul>
				<?php foreach((array)$art_group[1] as $item){?>	
				<li>
					<a href="<?=get_url('article',$item)?>">&nbsp;-&nbsp;<?=$item['Title']?></a>
				</li>
				<?php }?>
			</ul>
			<?php }?>
		</span>
		<span class="footer_nav left">
			<h2 class="ff">产品中心</h2>
			<?php
			if(!empty($product_cate)){
			?>
			<ul>
				<?php foreach((array)$product_cate as $item){?>
				<li>
					<a href="<?=get_url('product_category',$item)?>">&nbsp;-&nbsp;<?=$item['Category']?></a>
				</li>
				<?php }?>
			</ul>
			<?php }?>
		</span>
		<span class="footer_nav left">
			<h2 class="ff">心肾同治</h2>
			<?php
			if(!empty($info2_cate)){
			?>
			<ul>
				<?php foreach((array)$info2_cate as $item){?>
				<li>
					<a href="<?=get_url('info2_category',$item)?>">&nbsp;-&nbsp;<?=$item['Category']?></a>
				</li>
				<?php }?>
			</ul>
			<?php }?>
		</span>
		<span class="footer_nav left">
			<h2 class="ff">最新动态</h2>
			<?php
			if(!empty($info_cate)){
			?>
			<ul>
				<?php
					foreach((array)$info_cate as $item){
						if($item['CateId'] == 7){continue;}
				?>
				<li>
					<a href="<?=get_url('info_category',$item)?>">&nbsp;-&nbsp;<?=$item['Category']?></a>
				</li>
				<?php }?>
			</ul>
			<?php }?>
		</span>
		<span class="footer_navs">
			<h2 class="ff">联系我们</h2>
			<ul>
				<li>
					企业名称：广东心宝药业科技有限公司
				</li>
				<li>
					生产地址：广州高新技术产业开发区伴河路6号
				</li>
				<li>
					电话号码：020-37924226 020-87817116 
				</li>
				<li>
					传真号码：020-87817116
				</li>
				<li>
					邮编号码：510535
				</li>
			</ul>
		</span>
	</div>
	<div class="left width footer_bn">
		《互联网药品信息服务资格证》编号（粤）-非经营性-2011-0122&nbsp;|&nbsp;Copyright © 广东心宝制药有限公司&nbsp;&nbsp;&nbsp;&nbsp;粤ICP备案：10025609号
	</div>
</footer>