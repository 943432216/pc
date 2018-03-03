<!--[if lte IE 6]>
<script type="text/javascript">
window.location.href = 'http://windows.microsoft.com/zh-cn/windows/upgrade-your-browser';
window.stop();
</script>
<![endif]-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/global.js"></script>
<script type="text/javascript" src="/js/lang/cn.js"></script>
<div class="header-box">
	<div class="header w1000">
		<div class="logo"><a href="/" title="<?=$mCfg['SeoTitle']?>"><h1><img src="<?=$mCfg['logo_img']?>" /></h1></a></div>
          
          <div class="top-nav">
          	<div class="item nav"><a href="/article.php?AId=11">在线留言</a></div>
          	<div class="item nav"><a href="javascript:void(0)" onclick="AddFavorite('<?=get_domain()?>','<?=$mCfg['SeoTitle']?>')">收藏首页</a></div>
               
          	<div class="item">
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style">
                    <span class="jiathis_txt">分享：</span>
                    <a class="jiathis_button_icons_2"></a>
                    <a class="jiathis_button_icons_3"></a>
                    </div>
                    <!-- JiaThis Button END -->
               </div>
          </div>
          <div class="clear"></div>
          
          <div class="nav-box">
          	<div class="nav-l fl"><img src="/images/nav-l.jpg" /></div>
          	<div class="nav-c fl">
               	<dl <?=$pageName=='index'?' class="hover"':''?>>
                    	<dt><a href="/">首页</a></dt>
                    </dl>
               	<dl  <?=($pageName=='art'&&$GroupId==1)?' class="hover"':''?>>
                    	<dt><a href="<?=get_url('article',$art_group[1][0]);?>">关于心宝</a></dt>
						<?php
						if(!empty($art_group[1])){
						?>
						<dd>
							<?php foreach((array)$art_group[1] as $item){?>
							<div class="sec_a"><a href="<?=get_url('article',$item)?>"><?=$item['Title']?></a></div>
							<?php }?>
						</dd>
						<?php }?>
                    </dl>
               	<dl <?=$pageName=='info'?' class="hover"':''?>>
                    	<dt><a href="/info.php?CateId=1">最新动态</a></dt>
						<?php
						if(!empty($info_cate)){
						?>
						<dd>
							<?php
								foreach((array)$info_cate as $item){
									if($item['CateId'] == 7){continue;}
							?>
									<div class="sec_a"><a href="<?=get_url('info_category',$item)?>"><?=$item['Category']?></a></div>
							<?php }?>
						</dd>
						<?php }?>
                    </dl>
               	<dl <?=$pageName=='pro'?' class="hover"':''?>>
                    	<dt><a href="/products.php">产品中心</a></dt>
						<?php
						if(!empty($product_cate)){
						?>
						<dd>
							<?php foreach((array)$product_cate as $item){?>
							<div class="sec_a"><a href="<?=get_url('product_category',$item)?>"><?=$item['Category']?></a></div>
							<?php }?>
						</dd>
						<?php }?>
                    </dl>
               	<dl  <?=$pageName=='info2'?' class="hover"':''?>>
                    	<dt><a href="<?=get_url('info2_category',$info2_cate[0]);?>">心肾同治</a></dt>
						<?php
						if(!empty($info2_cate)){
						?>
						<dd>
							<?php foreach((array)$info2_cate as $item){?>
							<div class="sec_a"><a href="<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a></div>
							<?php }?>
						</dd>
						<?php }?>
                    </dl>
					
               	<dl  <?=($pageName=='art'&&$GroupId==2)?' class="hover"':''?>>
                    	<dt><a href="<?=get_url('article',$art_group[2][0]);?>">联系心宝</a></dt>
						<?php
						if(!empty($art_group[2])){
						?>
						<dd>
							<?php foreach((array)$art_group[2] as $item){?>
							<div class="sec_a"><a href="<?=get_url('article',$item)?>"><?=$item['Title']?></a></div>
							<?php }?>
						</dd>
						<?php }?>
                    </dl>

				<dl  <?=($pageName=='art'&&$GroupId==2)?' class="hover"':''?>>
					<dt><a target="_blank" href="https://sso.jingoal.com/oauth/authorize?client_id=jmbmgtweb&response_type=code&state=%7Baccess_count%3A1%7D&locale=zh_CN&redirect_uri=http%3A%2F%2Fweb.jingoal.com%2F%23workbench#/login">员工登录</a></dt>
				</dl>
               </div>
          	<div class="nav-r fl"><img src="/images/nav-r.jpg" /></div>
          </div>
     </div>
</div>