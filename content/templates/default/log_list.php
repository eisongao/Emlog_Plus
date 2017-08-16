<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="wrapper">
<div class="content">
<?php doAction('index_loglist_top'); ?>
<div id="content" class="post-list">
<?php 
if (!empty($logs)):
foreach($logs as $value): 
?>
<div class="post">
<h2 class="entry_title yahei"><a href="<?php echo $value['log_url']; ?>"><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><?php echo $value['log_title']; ?></a><sup>
 <?php 
	if((date('Ymd',time())-date('Ymd',$value['date']))< 1 ){echo '<i class="iconfont" style="color:green">&#xe713;</i> ';}
	?>
<?php if($value['comnum'] > 12) echo '<i class="iconfont" style="color:red">&#xe756;</i> '; ?>
</sup>
</h2>	
 <p class="entry_data"></p><div class="infos"> 
<span><i class="iconfont">&#xe6bf;</i> <?php echo gmdate('Y-n-j', $value['date']); ?></span> / <span><i class="iconfont">&#xe69b;</i> <?php echo $value['comnum']; ?> <?php echo langs('comments')?></span> / <span><i class="iconfont">&#xe6e6;</i> <?php echo $value['views']; ?> <?php echo langs('views')?></span>
 / <span><i class="iconfont">&#xe6b8;</i> <?php blog_author($value['author']); ?> </span>
</div>
<div class="post-content">
<?php if(!empty($value['thumbs'])){?>
<img src="<?php echo $value['thumbs'] ?>" style="width:95%;height:120px">
<?php } ?>
<p><?php echo subString(strip_tags($value['log_description']),0,180,"..."); ?></p></div>
</div>
<?php 
endforeach;
else:
?>
<h2><?php echo langs('not_found')?></h2>
<p><?php echo langs('sorry_no_results')?></p>
<?php endif;?>	
<div class="pageNo"><?php echo $page_url;?><br/><br/>
</div>		
</div>
<?php
 include View::getView('side1');
 include View::getView('footer');
?>