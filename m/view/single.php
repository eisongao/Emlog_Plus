<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<section class="s_floor">
<div class="pr">
	<h2><?php echo $log_title; ?></h2>
	<p class="s_p"><span><?php echo langs('author')?>：<span id="viewnum"><?php echo $user_cache[$author]['name'];?></span></span><span><?php echo gmdate('Y-n-j', $date); ?></span></p>
</div>
<div class="img topic_txt">
<?php echo nl2br($log_content); ?>
</div>
<br style="clear: both">
</section>
<?php if(!empty($commentStacks)): ?>
	<div class="t"><?php echo langs('comments')?>：</div>
	<div class="c">
		<?php foreach($commentStacks as $cid):
			$comment = $comments[$cid];
			$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
		?>
		<div class="l">
		<b><?php echo $comment['poster']; ?></b>
		<div class="info"><?php echo $comment['date']; ?> <a href="./?action=reply&cid=<?php echo $comment['cid'];?>"><?php echo langs('reply')?></a></div>
		<div class="comcont"><?php echo $comment['content']; ?></div>
        <?php if(ROLE === ROLE_ADMIN): ?>
        <div class="delcom"><a href="./?action=delcom&id=<?php echo $comment['cid'];?>&gid=<?php echo $logid; ?>&token=<?php echo LoginAuth::genToken();?>"><?php echo langs('delete')?></a></div>
        <?php endif; ?>
		</div>
		<?php endforeach; ?>
		<br style="clear: both">
<div class="pageNo"><?php echo $commentPageUrl;?></div>
	</div>
    <?php endif;?>
    <?php if($allow_remark == 'y'): ?>
	<div class="t"><?php echo langs('comment_leave')?>：</div>
	<div class="c">
		<form method="post" action="./index.php?action=addcom&gid=<?php echo $logid; ?>">
		<?php if(ISLOGIN == true):?>
		<?php echo langs('logged_as')?>：<b><?php echo $user_cache[UID]['name']; ?></b><br />
		<?php else: ?>
		<?php echo langs('nickname')?><br /><input type="text" name="comname" value="" /><br />
		<?php echo langs('email_optional')?><br /><input type="text" name="commail" value="" /><br />
		<?php echo langs('homepage_optional')?><br /><br /><input type="text" name="comurl" value="" /><br />
		<?php endif; ?>
		<?php echo langs('content')?><br /><textarea name="comment" rows="10"></textarea><br />
		<?php echo $verifyCode; ?><br /><input type="submit" class="replys" value="<?php echo langs('comment_leave')?>" />
		</form>
	</div>
    <?php endif;?>
</div>