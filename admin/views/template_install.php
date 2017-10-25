<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script src="./views/dist/js/form-file-upload-data.js"></script>
<script src="./views/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
<link href="./views/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('template_mount')?></li>
 </ul>
</div>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_zip_support')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_upload_failed_nonwritable')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_no_zip_install_manually')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_select_zip')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_non_standard')?>
</div>
<?php endif;?><?php if(isset($_GET['error_c'])): ?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<div class="des">
<?php echo langs('template_install_manual')?><br />
<?php echo langs('template_install_prompt1')?><br />
<?php echo langs('template_install_prompt2')?>
</div>
</div>
<?php endif; ?>
<form action="./template.php?action=upload_zip" method="post" enctype="multipart/form-data" >
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark">
<?php echo langs('template_upload_prompt')?>
</h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
<input type="file" name="tplzip" id="input-file-now" class="dropify" />   
<div class="clearfix"></div>
</div>
<div class="form-group" style="padding-top:10px">
<input type="submit" value="<?php echo langs('upload_install')?>" class="btn btn-info btn-round" />
</div>
<div class="form-group text-center">
<label class="control-label mb-10"><?php echo langs('template_get_more')?>:<a href="store.php?users=emlog-theme"><?php echo langs('app_center')?>&raquo;</a>
</label>
</div>
</div>
</div>
</div>
</form>
<script>
setTimeout(hideActived,2600);
$("#menu_tpl").addClass('active');
</script>