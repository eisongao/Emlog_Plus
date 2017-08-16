<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
 <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li>
  <li class="active"><?php echo langs('comment_reply') ?></li>
</ul>
</div>
 <div class="row">
 <div class="col-lg-12">
<div class="panel panel-default card-view">
 <div class="tab-content">
<form action="comment.php?action=doreply" method="post">
 <div class="form-group">
	<p><?php echo langs('commentator') ?>：<?php echo $poster; ?></p><br/>
	<p><?php echo langs('time') ?>：<?php echo $date; ?></p><br/>
	<p><?php echo langs('content') ?>：<br/><br/><?php echo $comment; ?></p><br/>
	<p><textarea name="reply" rows="5" cols="60" class="form-control"></textarea></p>
	<p>
	<input type="hidden" value="<?php echo $commentId; ?>" name="cid" />
	<input type="hidden" value="<?php echo $gid; ?>" name="gid" />
	<input type="hidden" value="<?php echo $hide; ?>" name="hide" />
    <br />
	<input type="submit" value="<?php echo langs('reply') ?>" class="btn btn-primary" />
	<?php if ($hide == 'y'): ?>
	    <input type="submit" value="<?php echo langs('reply_and_audit') ?>" name="pub_it" class="btn btn-primary" />
	<?php endif; ?>
	<input type="button" value="<?php echo langs('cancel') ?>" class="btn btn-default" onclick="javascript: window.history.back();"/></p>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script>
$("#menu_cm").addClass('active');
</script>
