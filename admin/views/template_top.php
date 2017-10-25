<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('template_top_image')?></li>
</ul>
</div>
<?php if(isset($_GET['activated'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('image_replace_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_del'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('deleted_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('image_crop_error')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<?php if(!$topimg || !file_exists('../' . $topimg)): ?>
<div class="actived alert alert-warning alert-dismissable"><?php echo langs('top_image_unavailable')?>
</div>
<?php else:?>
<div id="topimg_preview">
<img src="<?php echo '../'.$topimg; ?>" style="width:100%;height:105px"/></div>
<?php endif;?>
<form action="configure.php?action=mod_config" method="post" name="input" id="input">
<div class="topimg_line"><?php echo langs('images_optional')?></div>
<div id="topimg_default">
	<?php 
	foreach ($topimgs as $val): 
	$imgpath = $val;
	if(is_array($val)) {
		$imgpath = $val['path'];
	}
	$imgpath_url = urlencode($imgpath);
	$mini_imgpath = str_replace('.jpg', '_mini.jpg', $imgpath);
	if (!file_exists('../' . $mini_imgpath)) {
		continue;
	}
	?>
	<div>
	<a href="./template.php?action=update_top&top=<?php echo $imgpath_url; ?>" title="<?php echo langs('image_click_to_use')?>" >
	<img src="../<?php echo $mini_imgpath; ?>" width="230px" height="48px" class="topTH" />
	</a>
	<?php if (!is_array($val)):?>
	<li class="admin_style_info" >
	<a href="./template.php?action=del_top&top=<?php echo $imgpath_url; ?>" class="care"><?php echo langs('delete')?></a>
	</li>
	<?php endif;?>
	</div>
	<?php endforeach; ?>
<div class="form-group">
 <label><?php echo langs('top_image_not_use')?></label><a href="./template.php?action=update_top" title="<?php echo langs('top_image_not_use')?>" >
<img src="../content/templates/default/images/null.jpg" width="230px" height="48px" class="topTH" />
</a>
</div>
</div>
</div>
</form>
<div class="form-group">
<label><?php echo langs('top_image_custom')?></label>
<form action="./template.php?action=upload_top" method="post" enctype="multipart/form-data" >
</div>
<input name="topimg" type="file" />
<div class="form-group"  style="padding-top:10px"><input type="submit" value="<?php echo langs('upload')?>" class="btn btn-danger " />
</div>
</form>
</div>
<script>
$("#menu_tpl").addClass('active');
setTimeout(hideActived,2600);
</script>