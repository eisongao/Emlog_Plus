<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script src="./views/dist/js/form-file-upload-data.js"></script>
<script src="./views/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
<link href="./views/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('plugin_install')?></li>
</ul>
</div>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_zipped_only')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_upload_failed_nonwritable')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_zip_nonsupport')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_zip_select')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_install_failed_wrong_format')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])): ?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<div class="des">
<?php echo langs('plugin_install_manually')?><br />
<?php echo langs('install_promt_1')?><br/>
<?php echo langs('install_prompt2')?>
</div>
</div>
<?php endif; ?>
<form action="./plugin.php?action=upload_zip" method="post" enctype="multipart/form-data" >
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark">
<?php echo langs('upload_install_info')?>
</h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<p class="text-muted">    
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
<input name="pluzip" type="file" id="input-file-now" class="dropify"  />
</p>
<div class="mt-20">
<input type="submit" value="<?php echo langs('upload_install')?>" class="btn btn-info btn-round" /> 
</div>	
</div>
</div>
</form>
<div class="clearfix"></div>
<div class="form-group text-center">
<label class="control-label mb-10"><?php echo langs('plugin_get_more')?>:
<a href="store.php?users=emlog-plus"><?php echo langs('app_center')?>&raquo;</a>
</label>
</div>
</div>
</div>
</div>
</div>
<script>
setTimeout(hideActived,2600);
$("#menu_plug").addClass('active');
</script>

