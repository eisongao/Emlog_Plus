<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li>
<li class="active"><?php echo langs('cache_update') ?></li>
</ul>
</div>
<?php if(isset($_GET['active_mc'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('cache_update_ok') ?>
</div>
<?php endif;?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-body"> 
<?php echo langs('cache_update_info') ?>
</div>
<div id="cache">
<div class="form-group text-center">
<input type="button" onclick="window.location='cache.php?action=Cache';" value="<?php echo langs('cache_start') ?>" class="btn btn-info" />
</div>
</div>
</div>
</div>
</div>
<script>
setTimeout(hideActived,2600);
$("#menu_set").addClass('active');
$("#menu_cache").addClass('active-page');
</script>