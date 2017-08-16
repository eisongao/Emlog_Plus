<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="content">
<div id="content" class="post-list"><div class="post" id="singe">
<h2 class="single_title yahei">
<?php echo $log_title; ?><sup> <?php editflg($logid,$author); ?></sup>
</h2>
<div class="infos">
<span><i class="iconfont">&#xe6bf;</i> <?php echo gmdate('Y-n-j', $date); ?></span> /
<span><i class="iconfont">&#xe69b;</i> <?php echo $comnum; ?> <?php echo langs('comments')?></span> <?php if(blog_sort($logid)){ ?>/
 <span class="count"><i class="iconfont">&#xe83b;</i>  <?php blog_sort($logid); ?>
 </span>
 <?php } ?>
  / <span><i class="iconfont">&#xe6b8;</i> <?php blog_author($author); ?> </span>
 </div>
 <div class="message" style="padding-left:20px">
 <p class="infocard"><?php echo langs('text_count')?> <?php echo mb_strlen($log_content,'UTF-8');?> <?php echo langs('views_count')?></p>
 <?php doAction('log_related', $logData); ?>
<?php echo $log_content; ?>
<p class="tag"><i class="iconfont">&#xe6c5;</i> <?php blog_tag($logid); ?></p>
 <p class="infocard"><?php echo langs('copy_info')?> - <a href="<?php echo $value['log_url']; ?>"><?php echo $log_title; ?></a></p>
<div class="nextlog">
<?php neighbor_log($neighborLog); ?>
</div>
<br/>
<div id="comment" class="comment-wrapper">
<h3 id="comments"> 
<?php echo $comnum; ?><?php echo langs('comment_count')?>：“<?php echo $log_title; ?>” </h3>
 <?php blog_comments($comments); ?>
 <?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
</div>
 </div>
 </div>
<?php
 include View::getView('side2');
 include View::getView('footer');
?>