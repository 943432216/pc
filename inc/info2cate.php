<!--标题-->
<div class="title">
		<div class="fl big">
          	<div class="big-l fl">N</div>
               <div class="big-r fl"><span>心肾同治</span><br />ews</div>
          </div>
          
          <div class="fr path">当前位置：<a href="/">首页</a>
		> <a href="<?=get_url('info2_category',$info2_cate[0]);?>">心肾同治</a>
		<?=get_webpath($cur_cate,'info2_category')?></div>
</div>
<!--标题结束-->
<!--列表-->
<div class="title-list w1000">
     <div class="title-l fl"><img src="/images/title-l.jpg" /></div>
	<div class="title-c fl">
		<?php foreach((array)$info2_cate as $item){?>
          <div class="title-item fl <?=(int)$item['CateId']==$CateId?' hover':''?>">
               <a href="<?=get_url('info2_category',$item)?>"><?=$item['Category']?></a>
			<img src="/images/title-abs.jpg" class="abs" />
          </div>
          <?php }?>
	</div>
     <div class="title-l fr"><img src="/images/title-r.jpg" /></div>
	<div class="clear"></div>
</div>
<!--列表-->