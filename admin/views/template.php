<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('theme_settings')?></li>
 </ul>
</div>
<?php if(isset($_GET['activated'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_change_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['activate_install'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_upload_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['activate_del'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_delete_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
 <div class="error alert alert-info alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_delete_failed')?>
</div>
<?php endif;?>
<div class="row containertitle2">
<div class="col-lg-12">
<div class="heading-bg icard-views">
<div class="theme-browser">
<?php if(!$nonceTplData): ?>
<div class="actived alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('template_current_use')?>(<?php echo $nonce_templet; ?>)<?php echo langs('template_damaged')?>
</div>
<?php else:?>
<div class="tpl_list theme_ntpls theme active">
	<div class="theme-preview">
	<div class="theme-screenshot">
	<img src="<?php echo TPLS_URL.$nonce_templet; ?>/preview.jpg" alt=""  data-toggle="modal"  data-target=".tpl-used" >
	</div>
	</div>
<h2 class="theme-names">
<?php echo $tplName; ?>
</h2>
<div class="theme-used"><?php echo langs('template_current_use')?></div>	
</div>
<div class="modal fade tpl-used" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-ms">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h5 class="modal-title"><?php echo $tplName; ?>
<sup><?php echo $tplVer; ?></h5>
</div>
<div class="modal-body">
<h5 class="mb-15"><?php echo langs('template_describe')?></h5>
<p>	
<?php if($tplForEm) {?>
<?php echo $tplForEm ?> <br>
<?php } ?>
<?php echo $tplAuthor; ?><br>
<?php if($tplDes) {?>
	  <?php echo $tplDes; ?>
	  <?php }else{ ?>
	  <?php echo $themedss; ?>
<?php } ?>
</p>
</div>
<div class="modal-footer">
<?php if ('default' == $nonce_templet): ?>
	  <div class="btn btn-info"><a href="./template.php?action=custom-top" style="color:#ffff"><?php echo langs('template_top_image')?></a></div>
<?php endif; ?>
<button type="button" class="btn btn-danger text-left" data-dismiss="modal"><?php echo langs('news_close')?></button>
</div>
</div>
</div>
</div>
<?php endif; ?>
    <?php
    foreach ($tpls as $key => $value):
    if ($value['tplfile']==$nonce_templet) continue;
    ?>
<div class="theme <?php if($nonce_templet == $value['tplfile']){echo "active";} ?>">
	<div class="theme-screenshot">
	<img src="<?php echo TPLS_URL . $value['tplfile']; ?>/preview.jpg" alt="" data-toggle="modal"  data-target=".tpl-<?php echo $value['tplfile']?>" >
	</div>	
<h2 class="theme-names"><?php echo $value['tplname']; ?></h2>
	<div class="theme-action">
<a class="btn btn-danger care" href="javascript: em_confirm('<?php echo $value['tplfile']; ?>', 'tpl', '<?php echo LoginAuth::genToken(); ?>');"><?php echo langs('delete')?></a>
</div>	
</div>
<div class="modal fade tpl-<?php echo $value['tplfile']?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
<div class="modal-dialog modal-ms">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h5 class="modal-title"><?php echo $value['tplname']; ?>
<sup><?php echo $value['Version']; ?></h5>
</div>
<div class="modal-body">
<div class="form-group text-center">	
<?php echo $value['Author']; ?><br/>
<?php echo $value['Des']; ?>
</div>
<div class="form-group text-center">	
<a class="btn btn-primary" href="template.php?action=usetpl&tpl=<?php echo $value['tplfile']; ?>&side=<?php echo $value['sidebar']; ?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('template_enable')?></a>
<a class="btn btn-danger" href="../?theme=<?php echo $value['tplfile']; ?>" target="_blank"><?php echo langs('template_Preview')?></a>
</div>
</div>
</div>
</div>
</div>
<?php endforeach;?>
<div class="theme add-new-theme">
<a href="./template.php?action=install">
<div class="theme-screenshot"><span></span>
</div>
<h2 class="theme-name"><?php echo langs('template_add')?></h2>
</a>
</div>
</div>
<div class="theme-overlay"></div>
</div>
<script>
setTimeout(hideActived,2600);
$("#menu_tpl").addClass('active');
</script>