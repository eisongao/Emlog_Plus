<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li>
<li class="active"><?php echo langs('personal_settings') ?></li>
</ul>
</div>
<?php if(isset($_GET['active_edit'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('personal_data_modified_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('avatar_deleted_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nickname_too_long') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('email_format_invalid') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('password_length_short') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('password_not_equal') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('username_exists') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_f'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nickname_exists') ?>
</div>
<?php endif;?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<form action="blogger.php?action=update" method="post" name="blooger" id="blooger" enctype="multipart/form-data">								<div class="profile-box">
			<div class="form-group text-center">			<div class="profile-img-wrap">
	<?php echo $icon; ?>
	<div class="fileupload btn btn-default">		<span class="btn-text"><?php echo langs('editor') ?></span>
<input class="upload" name="photo" type="file" /> </div>
</div>
<input type="hidden" name="photo" value="<?php echo $photo; ?>"/>
</div>
</div>		
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('nickname') ?></label>
<input maxlength="50"  class="form-control" value="<?php echo $nickname; ?>" name="name" />
</div>	
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('email') ?></label>
<input name="email" class="form-control" value="<?php echo $email; ?>"  maxlength="200" />
</div>	
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('personal_description') ?></label>
<textarea name="description" class="form-control textarea"  type="text" maxlength="500"><?php echo $description; ?></textarea>
</div>	
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('login_name') ?></label>
<input maxlength="200"  class="form-control" value="<?php echo $username; ?>" name="username" />
</div>		
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('new_password_info') ?></label>
<input type="password" maxlength="200" class="form-control" value="" name="newpass" /> 
</div>	
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('new_password_repeat') ?></label>
<input type="password" maxlength="200" class="form-control"  value="" name="repeatpass" /> 
</div>	
<div class="clearfix">
</div>
<div class="form-group text-center">	
 <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
 <input type="submit" value="<?php echo langs('save_data') ?>" class="btn btn-info btn-round" />
</div>
</form>
</div>
</div></div>
</div><script>
$("#chpwd").css('display', $.cookie('em_chpwd') ? $.cookie('em_chpwd') : 'none');
$("#menu_user").addClass('active');
setTimeout(hideActived,2600);
</script>