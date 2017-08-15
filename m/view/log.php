<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<section class="s_hdp">
<a href="./m" class="s_hdp-st">[<?php echo $bloginfo; ?>]</a>
<div class="s_box pr"><div class="mid01_box pr" id="slider1"><ul class="pr s_ul6 clears"><li><a href="./m">
<div class="roll">
<div class="pr"><img src="<?php if(Option::get('topimg')){?><?php echo BLOG_URL.Option::get('topimg'); ?><?php } ?>" width="300" height="194">        
</div></div>
</a>
</li>
</ul></div>  
</div><br>
</section>
<div class="module module-margin">
<?php 
$Log_Model = new Log_Model();
$hotLogs = $Log_Model->getHotLog(3);
?><?php foreach($hotLogs as $value): ?>
<div class="topic">
<ul class="cont-list">
<li>
<span class="live-icon"><?php echo langs('hot')?></span><a href="./?post=<?php echo $value['gid']; ?>"><?php echo $value['title']; ?></a>
</li>
</ul>
</div>
<?php endforeach; ?>
</div>
<section class="s_moreread">
<div class="module-t">
<h3><a href="#"><?php echo langs('post_list')?></a></h3>
</div>
<div class="list_box"><?php foreach($logs as $value): ?>
<dl>
<a href="<?php echo BLOG_URL; ?>m/?post=<?php echo $value['logid'];?>">
<dd><h3><?php echo $value['log_title']; ?>  <?php if(ROLE == ROLE_ADMIN || $value['author'] == UID): ?>
<a href="./?action=write&id=<?php echo $value['logid'];?>"> |  <?php echo langs('edit')?></a>
<?php endif;?></h3></dd>
<dd><?php echo subString(strip_tags($value['log_description']),0,180,"..."); ?></dd>
<dd><?php echo gmdate('Y-n-j', $value['date']); ?>  <span><?php echo langs('views')?>：<?php echo $value['views']; ?></span><?php echo langs('comments')?>：<?php echo $value['comnum']; ?></dd>
</a>
</dl>
<?php endforeach; ?>		
</div>
</section>
<div class="pageNo">
<?php echo $page_url;?>
</div>
