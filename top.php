<header class="header left width">
	<div class="width left headr_title position">
		<span class="ewmx"><img src="img/pc_ewm.png"/></span>
		<span class="wel left">您好，心宝药业欢迎您！</span>
		<span class="tel_right left">
				<p>联系方式：（TEL）020-37924226 / 020-87817116 </p>
				<p class="ewm"><img src="img/xewm.png"/></p>
				<ul>
					<li><a href="javascript:;">收藏本公司</a></li>
					<li><a href="javascript:;">设为主页</a></li>
				</ul>
			</span>
	</div>
	<div class="left width header_nav position">
		<div class="left nav_left">
			<img src="img/pc_logo.png" />
		</div>
		<div class="left nav_right">
			<ul>
				<li>
					<div class="ff">
						<a href="/">首页</a>
					</div>
				</li>
				<li>
					<div class="start ff">
						<a href="<?=get_url('article',$art_group[1][0]);?>">关于心宝</a>
					</div>
					<div class="nav2">
						<?php
						if(!empty($art_group[1])){
						?>
						<ul>	
							<?php foreach((array)$art_group[1] as $item){?>						
							<li>
								<a href="<?=get_url('article',$item)?>"><?=$item['Title']?></a>
							</li>
							<?php }?>
						</ul>
						<?php }?>
					</div>
				</li>
				<li>
					<div class="start ff">
						<a href="/products.php?CateId=24">产品中心</a>
					</div>
					<div class="nav2">
						<?php
						if(!empty($product_cate)){
						?>
						<ul>
							<?php foreach((array)$product_cate as $item){?>
							<li>
								<a href="<?=get_url('product_category',$item)?>"><?=$item['Category']?></a>
							</li>
							<?php }?>
						</ul>
						<?php }?>
					</div>
				</li>
				<li>
					<div class="start ff">
						<a href="<?=get_url('info2_category',$info2_cate[0]);?>">心肾同治</a>
					</div>
					<div class="nav2">
						<?php
						if(!empty($info2_cate)){
						?>
						<ul>
							<?php foreach((array)$info2_cate as $item){?>
							<li>
								<a href="<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a>
							</li>
							<?php }?>
						</ul>
						<?php }?>
					</div>
				</li>
				<li>
					<div class="start ff">
						<a href="/info.php?CateId=1">最新动态</a>
					</div>
					<div class="nav2">
						<?php
						if(!empty($info_cate)){
						?>
						<ul>
							<?php
								foreach((array)$info_cate as $item){
									if($item['CateId'] == 7){continue;}
							?>
							<li>
								<a href="<?=get_url('info_category',$item)?>"><?=$item['Category']?></a>
							</li>
							<?php }?>
						</ul>
						<?php }?>
					</div>
				</li>
				<li>
					<div class="ff">
						<a href="/contact.php">联系心宝</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</header>
<script src="js/jquery-2.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/pc_main.js" type="text/javascript" charset="utf-8"></script>