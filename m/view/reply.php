<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div id="m">
	<div class="comcont"><?php echo langs('reply')?><b><?php echo $poster; ?></b>：<?php echo $comment; ?></div>
	<form method="post" action="./index.php?action=addcom&gid=<?php echo $gid; ?>&pid=<?php echo $cid; ?>">
	<?php
		if(ISLOGIN == true):
		$CACHE = Cache::getInstance();
		$user_cache = $CACHE->readCache('user');
	?>
	<?php echo langs('logged_as')?> <b><?php echo $user_cache[UID]['name']; ?></b><br />
	<input type="hidden" name="comname" value="<?php echo $user_cache[UID]['name']; ?>" />
	<input type="hidden" name="commail" value="<?php echo $user_cache[UID]['mail']; ?>" />
	<input type="hidden" name="comurl" value="<?php echo BLOG_URL; ?>" />
	<?php else: ?>
	<?php echo langs('nickname')?><br /><input type="text" name="comname" value="" /><br />
	<?php echo langs('email_optional')?><br /><input type="text" name="commail" value="" /><br />
	<?php echo langs('homepage_optional')?><br /><input type="text" name="comurl" value="" /><br />
	<?php endif; ?>
	<?php echo langs('content')?><br /><textarea name="comment" rows="10"></textarea><br />
	<?php echo $verifyCode; ?><br /><input type="submit" class="replys" value="<?php echo langs('comment_leave')?>" />
	</form>
</div>