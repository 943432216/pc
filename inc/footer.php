<div class="link-box">
	<div class="link w1000">
          <a href="javascript:void(0)">友情链接</a>
     	<?php 
		$link_row=$db->get_all('links','1','*','MyOrder desc,LId asc');
		$i=0;
		foreach($link_row as $item){
		?>
          <a target="_blank" class="<?=$i==0?' first':''?>" href="<?=$item['Url']?>"><?=$item['Name']?></a>
          <?php $i++;}?>
     </div>
</div>
<div class="footer-box">
	<div class="footer w1000">
     	<div class="footer-l fl">
               <div class="footer-nav-box">
                    <div class="item"><a href="/">首页</a></div>
                    <div class="item"><a href="<?=get_url('article',$art_group[1][0]);?>">关于心宝</a></div>
                    <div class="item"><a href="/info.php?CateId=1">最新动态</a></div>
                    <div class="item"><a href="/products.php">产品中心</a></div>
                    <div class="item"><a href="<?=get_url('info2_category',$info2_cate[0]);?>">心肾同治</a></div>
                    <div class="item"><a href="<?=get_url('article',$art_group[2][0]);?>">联系心宝</a></div>
               </div>
               <div class="blank11"></div>
               <div>《互联网药品信息服务资格证》编号（粤）-非经营性-2011-0122</div>
               <div class="blank11"></div>
               <div class="footer-copy"><?=$mCfg['copy']?>&nbsp;&nbsp;技术支持：<a target="_blank" href="http://www.ly200.com" title="广州联雅网络">广州联雅网络</a></div>
          </div>
        <!--  <div class="footer-r fr">
          	<img style="width:78px;height:74px; vertical-align:middle" src="<?=$db->get_value('ad',"AId='2'",'PicPath_0')?>" />&nbsp;微信公众号
          </div>-->
          <div class="erwei" style="position:fixed;  top:300px; right:40px; z-index:1000; padding:10px; background:#fff; border-radius:15px;">
               <p style="margin-bottom:10px;">微信公众号:</p>
               <img src="/images/weixi.jpg" style="max-width:125px; height:125px;" />
           	<!--<?=ad(2)?>-->
          </div>
          
     </div>
</div>
<script type="text/javascript" src="/js/js.js"></script>
<?=js_code();?>

<?php
include($site_root_path.'/inc/manage/config/0.php');
if($menu['online']){?>
<div id="online" style="width:87px; position:fixed;_position:absolute; right:15px; z-index:1000; top:210px;">
<div><img src="/images/online/qq_top.gif" /></div>
<div style=" background:url(/images/online/qq_bg.gif) center top repeat-y;">
	<?php
		for($i=0;$i<count($mCfg['online']);$i++)
		{
		
			
			switch($mCfg['online'][$i]['AccountType'])
			{
				case 0:
				$account='<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=####&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:####:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>';
				break;
				case 1:
				$account='<a target="_blank" href="msnim:chat?contact=####"><img src="/images/online/msn.png" /></a>';
				break;
				case 2:
				$account='skype:####?chat';
				$account='<a target="_blank" href="skype:####?chat"><img src="/images/online/skype.png" /></a>';
				break;
				case 3:
				$account='<a href="http://web.im.alisoft.com/msg.aw?v=2&amp;uid=####&amp;site=cnalichn&amp;s=1" target="_blank"><img alt="发送旺旺即时消息" src="http://web.im.alisoft.com/online.aw?v=2&amp;uid=####&amp;site=cnalichn&amp;s=1" border="0" /></a>';
				break;
				case 4:
				$account='<a target="_blank" href="http://amos.us.alitalk.alibaba.com/msg.aw?v=2&uid=####&site=enaliint&s=5"><img src="/images/online/myt.png" /></a>';
				break;
				case 5:
				$account='<a target="_blank" href="http://edit.yahoo.com/config/send_webmesg?.target=####&.src=pg"><img src="/images/online/yahoo.png" /></a>';
				break;
				case 6:
				$account='<a target="_blank" href="mailto:####"><img src="/images/online/email.png" /></a>';
				break;
			}
			$account=str_replace('####',$mCfg['online'][$i]['Account'],$account).'<br/>'.$mCfg['online'][$i]['Name'];
	?>
	
		<div style="text-align:center"><?=$account?></div>
	<?php }?>
</div>
<div><img src="/images/online/qq_bot.gif" /></div>
</div>


<script language="javascript" type="text/javascript"> 
function linebox()
{
	var obj=document.getElementById('online');
	if (window.ActiveXObject) {
		var ua = navigator.userAgent.toLowerCase();
		var ie=ua.match(/msie ([\d.]+)/)[1];
		if(ie==6.0){
			 var scrollTop = Math.max(document.documentElement.scrollTop,document.body.scrollTop)+210;
			  var ol=Math.max(document.documentElement.clientWidth,document.body.clientWidth)-100;
			  	obj.style.position='absolute'; 
			 	obj.style.top = scrollTop+ 'px';
		}
	}
	
}
window.onscroll=function()
{
	linebox();
}
</script>
<?php }?>

<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>