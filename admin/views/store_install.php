<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('app_install')?></li>
</ul>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('install')?> <?php echo $source_typename;?> <?php echo langs('app')?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div id="addon_ins"><span class="ajaxload"><?php echo $source_typename;?><?php echo langs('package_downloading')?></span></div>
</div>
</div>
<div class="clearfix"></div>
<div class="form-group text-center">
<label class="control-label mb-10"><?php echo langs('plugin_get_more')?>:
<a href="store.php"><?php echo langs('app_center')?>&raquo;</a></label></div>
</div>
</div>
</div>
</div>
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" /> 
<script>
$("#menu_store").addClass('active');
$(document).ready(function(){
    $.get('./store.php', {
    action:'addon', 
    source:"<?php echo $source;?>",
     type:"<?php echo $source_type;?>"
      },
      function(data){
        if (data.match("succ")) {
            $("#addon_ins").html('<span id="addonsucc" style="color:red"><?php echo $source_typename;?><?php echo langs('plugin_install_ok')?>，<?php echo $source_typeurl;?></span>');
        } else if(data.match("error_down")){
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><?php echo langs('plugin_download_failed')?><a href="store.php"><?php echo langs('return_app_center')?></a></span>');
        } else if(data.match("error_zip")){
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><?php echo langs('install_failed_zip_nonsupport')?><a href="store.php"><?php echo langs('return_app_center')?></a></span>');
        } else if(data.match("error_dir")){
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><?php echo langs('install_failed_folder_nonwritable')?><a href="store.php"><?php echo langs('return_app_center')?></a></span>');
        }else{
            $("#addon_ins").html('<span id="addonerror"><?php echo $source_typename;?><?php echo langs('install_failed')?><a href="store.php"><?php echo langs('return_app_center')?></a></span>');
        }
      });
})
</script>