<?php 
/**
 * 自建页面模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="wrapper">
<div class="single" id="content">
<div class="post">
<h2 class="single_title yahei"><?php echo $log_title; ?>
</h2>
<p><?php echo $log_content; ?></p>
</div>
</div>
<div id="comment" class="comment-wrapper">
<h3 id="comments"> 
<?php echo $comnum; ?><?php echo langs('comment_count')?>：“<?php echo $log_title; ?>” </h3>
 <?php blog_comments($comments); ?>
<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
<?php blog_comments($comments); ?>
</div>
</div><br>
</div>
<br/>
<?php
 include View::getView('footer');
?>