<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<script src="./views/dist/js/form-file-upload-data.js"></script>
<script src="./views/vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
<link href="./views/vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
 <div class="heading-bg  card-views">
 <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li>
<li class="active">
<?php echo langs('data_backup') ?>
 </li>
 </ul>
 </div>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_delete_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_backup'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_create_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_import'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_import_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_file_select') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_file_invalid') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_import_zip_unsupported') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_upload_failed') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_file_wrong') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_f'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('backup_export_zip_unsupported') ?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
	<div class="panel panel-default card-view">
<div class="table-wrap ">
<div class="table-responsive">					<form  method="post" action="data.php?action=dell_all_bak" name="form_bak" id="form_bak">
<table class="table table-striped table-bordered mb-0">												<thead>
    <tr>
            <th><b>#</b></th>
      <th><b><?php echo langs('backup_file') ?></b></th>
      <th class="tdcenter"><b><?php echo langs('backup_time') ?></b></th>
      <th><b><?php echo langs('file_size') ?></b></th>
      <th><b><?php echo langs('operate') ?></b></th>
    </tr>
  </head>
  <tbody>
	<?php
		if($bakfiles):
		foreach($bakfiles  as $value):
		$modtime = smartDate(filemtime($value),'Y-m-d H:i:s');
		$size =  changeFileSize(filesize($value));
		$bakname = substr(strrchr($value,'/'),1);
	?>
    <tr>
      <td width="22"><input type="checkbox" value="<?php echo $value; ?>" name="bak[]" class="ids" /></td>
      <td width="661"><a href="../content/backup/<?php echo $bakname; ?>"><?php echo $bakname; ?></a></td>
      <td class="tdcenter"><?php echo $modtime; ?></td>
      <td class="tdcenter"><?php echo $size; ?></td>
      <td class="tdcenter"><a href="javascript: em_confirm('<?php echo $value; ?>', 'backup', '<?php echo LoginAuth::genToken(); ?>');"><?php echo langs('import') ?></a></td>
    </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="5"><?php echo langs('backup_no') ?></td></tr>
	<?php endif;?>
	</tbody>
</table>
</div>
</div>
<div class="clearfix"></div>
<div class="list_footer" style="padding-bottom:10px;padding-top:10px">
<a href="javascript:void(0);" id="select_all"><?php echo langs('select_all') ?></a> <?php echo langs('selected_items') ?>：<a href="javascript:bakact('del');" class="care"><?php echo langs('delete') ?></a>
</div>
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" /> 
</form>
</div>
</div>
<div class="col-lg-12">
<div class="panel panel-default panel-tabs card-view">
<div class="panel-heading">
<div class="pull-left">
<div class="tab-struct custom-tab-1">
<ul role="tablist" class="nav nav-tabs">
<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="backup_tab" href="#backup"><?php echo langs('db_backup') ?></a>
</li>
<li role="presentation" class=""><a data-toggle="tab" id="import_tab" role="tab" href="#import" aria-expanded="false"><?php echo langs('backup_import_local') ?></a></li>
</ul>
</div>
</div>	
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="tab-content">						
<div id="backup" class="tab-pane fade active in" role="tabpanel">
<form action="data.php?action=bakstart" method="post">
<div class="form-group">
 <label><?php echo langs('backup_choose_table') ?></label>
        <select multiple="multiple" size="12" name="table_box[]" class="form-control">
		<?php foreach($tables  as $value): ?>
		<option value="<?php echo DB_PREFIX; ?><?php echo $value; ?>" selected="selected"><?php echo DB_PREFIX; ?><?php echo $value; ?></option>
		<?php endforeach; ?>
      	</select>
            </div>
<div class="form-group">
 <label><?php echo langs('backup_export_to') ?></label>
        <select name="bakplace" id="bakplace" class="form-control">
 <option value="local" selected="selected"><?php echo langs('backup_local') ?></option>
  <option value="server"><?php echo langs('backup_server') ?></option>
        </select>
    </div>
<div class="form-group">
<div class="checkbox checkbox-danger">
<input type="checkbox"  value="y" name="zipbak" id="checkbox6 zipbak">
<label for="checkbox6"> <?php echo langs('compress_zip') ?></label>
</div>
</div>
<div class="form-group text-center">			
        <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
        <input type="submit" value="开始备份" class="btn btn-info"/>
</div>    
</form>											
</div>											
<div id="import" class="tab-pane fade" role="tabpanel">
<form action="data.php?action=import" enctype="multipart/form-data" method="post">
<div class="form-group">
<?php echo langs('backup_version_tip') ?>
<?php echo DB_PREFIX; ?>
</div>
<div class="form-group">
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" /> 
   <input type="file" name="sqlfile" id="input-file-now" class="dropify" />   
   </div>    
  <div class="form-group text-center">      
        <input type="submit" value="<?php echo langs('import') ?>" class="btn btn-warning" />
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
setTimeout(hideActived,2600);
$(document).ready(function(){
    selectAllToggle();
    $("#adm_bakdata_list tbody tr:odd").addClass("tralt_b");
    $("#adm_bakdata_list tbody tr")
        .mouseover(function(){$(this).addClass("trover")})
        .mouseout(function(){$(this).removeClass("trover")});
    $("#bakplace").change(function(){$("#server_bakfname").toggle();$("#local_bakzip").toggle();});
});
function bakact(act){
    if (getChecked('ids') == false) {
        alert('<?php echo langs('backup_file_select')?>');
        return;
    }
    if(act == 'del' && !confirm('<?php echo langs('backup_delete_sure')?>')){
    return;
    }
    $("#operate").val(act);
    $("#form_bak").submit();
}
$("#menu_set").addClass('active');
$("#menu_data").addClass('active-page');
</script>