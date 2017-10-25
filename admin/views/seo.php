<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
 <div class="heading-bg  card-views">
  <ul class="breadcrumbs">
  <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active"><?php echo langs('seo_settings')?></li>
 </ul>
</div>
<?php if(isset($_GET['activated'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('settings_saved_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('htaccess_not_writable')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="panel-body"> 
<?php echo langs('post_url_rewriting')?><br/>
<?php echo langs('post_url_custom')?>
</div>
</div>
</div>
</div>    
<form action="seo.php?action=update" method="post">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="radio">
<input type="radio" name="permalink" value="0" <?php echo $ex0; ?> id="radio1" >
<label for="radio1"> <?php echo langs('default_format')?>：<?php echo BLOG_URL; ?>?post=1 </label>			
</div>
<div class="radio">
<input type="radio" name="permalink" value="1" <?php echo $ex1; ?> id="radio1" >
<label for="radio2"> <?php echo langs('file_format')?>：<?php echo BLOG_URL; ?>post-1.html</label>
</div>
<div class="radio">
<input type="radio" name="permalink" value="2" <?php echo $ex2; ?> id="radio1" >
<label for="radio3"> <?php echo langs('directory_format')?>：<?php echo BLOG_URL; ?>post/1</label>			
</div>
<div class="radio">
<input type="radio" name="permalink" value="3" <?php echo $ex3; ?> id="radio1" >
<label for="radio4"> <?php echo langs('category_format')?>：<?php echo BLOG_URL; ?>category/1.html</label>			
</div>
<br/>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group">
<div class="checkbox checkbox-success">
<input  type="checkbox" value="y" name="isalias" id="checkbox0 isalias" <?php echo $isalias; ?> />
<label class="control-label mb-10"> <?php echo langs('post_alias_enable')?></label>
</div>
<div class="checkbox checkbox-info">
<input type="checkbox" value="y" name="isalias_html" id="checkbox11 isalias_html" <?php echo $isalias_html; ?> />
<label class="control-label mb-10"><?php echo langs('enable_html_suffix')?></label>
</div>
</div></div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('meta_title')?></label>
<input maxlength="200"  class="form-control" value="<?php echo $site_title; ?>" name="site_title" />
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('meta_keywords')?></label>
<input maxlength="200" class="form-control" value="<?php echo $site_key; ?>" name="site_key" />
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('meta_description')?></label>
<textarea name="site_description" class="form-control textarea" cols="" rows="4" ><?php echo $site_description; ?></textarea>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('meta_title_scheme')?></label>
<select name="log_title_style" class="form-control">
<option value="0" <?php echo $opt0; ?>><?php echo langs('post_title')?></option>
<option value="1" <?php echo $opt1; ?>><?php echo langs('post_title_site_title')?></option>
 <option value="2" <?php echo $opt2; ?>><?php echo langs('post_title_site_meta_title')?></option>
 <option value="3" <?php echo $opt3; ?>><?php echo langs('post_title_sort_title_site_title')?></option>
 <option value="4" <?php echo $opt4; ?>><?php echo langs('post_title_sort_title_site_meta_title')?></option>
</select>
</div>
<div class="clearfix"></div>
<div class="form-group text-center">
        <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
        <input type="submit" value="<?php echo langs('save_settings')?>" class="btn  btn-success" /></div></div></div>
</div>
</form>
</div>
<script>
setTimeout(hideActived,2600);
$("#menu_seo").addClass('active-page');
$("#menu_set").addClass('active');
</script>