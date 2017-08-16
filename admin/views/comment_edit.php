<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i>  <?php echo langs('home') ?></a></li>
 <li class="active"><?php echo langs('comment_edit') ?></li>
</ul>
 </div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<form action="comment.php?action=doedit" method="post">
<div class="form-group">
 <label><?php echo langs('commentator') ?></label>
 <input type="text"  value="<?php echo $poster; ?>" name="name"  class="form-control">
 </div>
 <div class="form-group">
  <label><?php echo langs('email') ?></label>
   <input type="text"  value="<?php echo $mail; ?>" name="mail"  class="form-control">
  </div>
<div class="form-group">
  <label><?php echo langs('home_page') ?></label>
   <input type="text"  value="<?php echo $url; ?>" name="url"  class="form-control">
 </div>
 <div class="form-group">
   <label><?php echo langs('comment_content') ?></label>
   <textarea name="comment" rows="8" cols="60" class="textarea form-control"   ><?php echo $comment; ?></textarea>
  </div>
  <input type="hidden" value="<?php echo $cid; ?>" name="cid" />
	 <div class="form-group  footer-list">
	<input type="submit" value="<?php echo langs('save') ?>" class="btn btn-primary" />
	<input type="button" value="<?php echo langs('cancel') ?>" class="btn btn-default"  onclick="javascript: window.history.back();" />
 <div class="form-group">
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$("#menu_cm").addClass('active');
</script>
