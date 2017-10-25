<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('category_edit')?></li>
 </ul>
</div>
<?php if(isset($_GET['error_a'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_name_empty')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<form action="sortlink.php?action=update" method="post">
<div class="form-group">
<label><?php echo langs('name')?></label>
<input type="text" value="<?php echo $linksort_name; ?>" name="linksort_name" id="linksort_name"  class="form-control" />
 </div>
<div class="form-group">
	<input type="hidden" value="<?php echo $linksort_id; ?>" name="linksort_id" />
	<input type="submit" value="<?php echo langs('save') ?>" class="btn btn-primary" />
	<input type="button" value="<?php echo langs('cancel') ?>" class="btn btn-default"  onclick="javascript: window.history.back();" />
</div>
</form>
</div>
</div>
<script>
setTimeout(hideActived,2600);
$("#menu_linksort").addClass('active-page');
$("#menu_links").addClass('active');
</script>