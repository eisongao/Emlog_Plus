<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<script>setTimeout(hideActived,2600);</script>
 <div class="heading-bg  card-views">
  <ul class="breadcrumbs">
  <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active"><?php echo langs('backstage_settings')?></li>
 </ul>
</div>
<?php if(isset($_GET['activated'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('settings_saved_ok') ?>
</div>
<?php endif;?>		
<form action="./style.php?action=usestyle&token=<?php echo LoginAuth::genToken(); ?>" name="input" id="input" method="post">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('editor_choose')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio">
<input type="radio" name="editor" id="styles" value="1" <?php if(Option::get('admin_editor') == 1) echo 'checked'; ?>>
<label for="radio1"> <?php echo langs('default')?> </label>
</div>
<div class="radio radio-primary">
<input type="radio" name="editor" id="styles" value="2" <?php if(Option::get('admin_editor') == 2) echo 'checked'; ?>>
<label for="radio2"> <?php echo langs('editor_tinymce')?> </label>
</div>
<div class="radio radio-success">
<input type="radio" name="editor" id="styles" value="3" <?php if(Option::get('admin_editor') == 3) echo 'checked'; ?>>
<label for="radio3"> <?php echo langs('editor_markdown')?> </label>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('responsive_choose')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio">
<input type="radio" name="responsive" id="responsive" value="y" <?php if(Option::get('responsive') == "y") echo 'checked'; ?>>
<label for="radio1"> <?php echo langs('responsive')?> </label>
</div>
<div class="radio radio-primary">
<input type="radio" name="responsive" id="responsive" value="n" <?php if(Option::get('responsive') == "n") echo 'checked'; ?>>
<label for="radio2"> <?php echo langs('responsive_')?> </label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('scrollable_nav')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio radio-danger">
<input type="radio" name="scrollable" id="scrollable" value="y" <?php if(Option::get('scrollable') == "y") echo 'checked'; ?>>
<label for="radio5"> <?php echo langs('scrollable')?> </label>
</div>
<div class="radio radio-warning">
<input type="radio" name="scrollable" id="scrollable" value="n" <?php if(Option::get('scrollable') == "n") echo 'checked'; ?>>
<label for="radio6"><?php echo langs('scrollable_')?></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('preloader')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio">
<input type="radio" name="preloader" id="preloader" value="y" <?php if(Option::get('preloader') == "y") echo 'checked'; ?>>
<label for="radio1"> <?php echo langs('preloader')?> </label>
</div>
<div class="radio radio-primary">
<input type="radio" name="preloader" id="preloader" value="n" <?php if(Option::get('preloader') == "n") echo 'checked'; ?>>
<label for="radio2"> <?php echo langs('preloader_')?> </label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('full_screen')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio radio-danger">
<input type="radio" name="full_screen" id="full_screen" value="y" <?php if(Option::get('full_screen') == "y") echo 'checked'; ?>>
<label for="radio5"> <?php echo langs('full_screen')?> </label>
</div>
<div class="radio radio-warning">
<input type="radio" name="full_screen" id="full_screen" value="n" <?php if(Option::get('full_screen') == "n") echo 'checked'; ?>>
<label for="radio6"><?php echo langs('full_screen_')?></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('back_theme')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio">
<input type="radio" name="styles" id="styles" value="1" <?php if(Option::get('admin_style') == 1) echo 'checked'; ?>>
<label for="radio1"> <?php echo langs('default')?> </label>
</div>
<div class="radio radio-primary">
<input type="radio" name="styles" id="styles" value="2" <?php if(Option::get('admin_style') == 2) echo 'checked'; ?>>
<label for="radio2"> <?php echo langs('gray')?> </label>
</div>
<div class="radio radio-success">
<input type="radio" name="styles" id="styles" value="3" <?php if(Option::get('admin_style') == 3) echo 'checked'; ?>>
<label for="radio3"> <?php echo langs('dark')?> </label>
</div>
<div class="radio radio-info">
<input type="radio" name="styles" id="styles" value="4" <?php if(Option::get('admin_style') == 4) echo 'checked'; ?>>
<label for="radio4"> <?php echo langs('black')?> </label>
</div>
<div class="radio radio-danger">
<input type="radio" name="styles" id="styles" value="5" <?php if(Option::get('admin_style') == 5) echo 'checked'; ?>>
<label for="radio5"> <?php echo langs('dark_blue')?> </label>
</div>
<div class="radio radio-warning">
<input type="radio" name="styles" id="styles" value="6" <?php if(Option::get('admin_style') == 6) echo 'checked'; ?>>
<label for="radio6"><?php echo langs('gold')?></label>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('black_sider')?></h6>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="radio">
<input type="radio" name="sider" id="styles" value="pimary-color-red" <?php if(Option::get('admin_sider') == "pimary-color-red") echo 'checked'; ?>>
<label for="radio1"> <?php echo langs('default')?> </label>
</div>
<div class="radio radio-primary">
<input type="radio" name="sider" id="styles" value="pimary-color-blue" <?php if(Option::get('admin_sider') == "pimary-color-blue") echo 'checked'; ?>>
<label for="radio2"> <?php echo langs('blue')?> </label>
</div>
<div class="radio radio-success">
<input type="radio" name="sider" id="styles" value="pimary-color-green" <?php if(Option::get('admin_sider') == "pimary-color-green") echo 'checked'; ?>>
<label for="radio3"> <?php echo langs('green')?> </label>
</div>
<div class="radio radio-info">
<input type="radio" name="sider" id="styles" value="pimary-color-pink" <?php if(Option::get('admin_sider') == "pimary-color-pink") echo 'checked'; ?>>
<label for="radio4"> <?php echo langs('pink')?> </label>
</div>
<div class="radio radio-danger">
<input type="radio" name="sider" id="styles" value="pimary-color-silver" <?php if(Option::get('admin_sider') == "pimary-color-silver") echo 'checked'; ?>>
<label for="radio5"> <?php echo langs('silver')?> </label>
</div>
<div class="radio radio-warning">
<input type="radio" name="sider" id="styles" value="pimary-color-gold" <?php if(Option::get('admin_sider') == "pimary-color-gold") echo 'checked'; ?>>
<label for="radio6"><?php echo langs('gold')?></label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-body  setting-panel"> 
<div class="form-group text-center">			<button type="submit" class="btn btn-info btn-round" ><?php echo langs('save_settings') ?></button>
</div>
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
 </div>
</div>
</div>
</form>
<script type="text/javascript">
setTimeout(hideActived,2600);
 $("#menu_index").addClass('active');
 </script>
