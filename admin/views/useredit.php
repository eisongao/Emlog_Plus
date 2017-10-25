<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('author_info_manage')?></li>
</ul>
</div>
<?php if(isset($_GET['error_login'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('user_name_empty')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_exist'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('user_name_exists')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_pwd_len'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('password_length_short')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_pwd2'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('passwords_not_equal')?>
</div>
</span>
<?php endif;?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<form action="user.php?action=update" method="post">
<div class="form-group">
<label><?php echo langs('user_name')?></label>
 <input type="text" value="<?php echo $username; ?>" name="username" class="form-control" />
 </div>
<div class="form-group">
<label><?php echo langs('nickname')?></label>
 <input type="text" value="<?php echo $nickname; ?>" name="nickname" class="form-control" />
 </div>
<div class="form-group">
<label><?php echo langs('password_new')?></label>
<input type="password" value="" name="password" class="form-control" />
 </div>
 <div class="form-group">
 <label><?php echo langs('password_new_repeat')?></label>
 <input type="password" value="" name="password2" class="form-control" />
 </div>
 <div class="form-group">
 <label><?php echo langs('email')?></label>
 <input type="text"  value="<?php echo $email; ?>" name="email"  class="form-control" />
 </div>
 <div class="form-group">
<label>
<?php echo langs('website')?>
</label>
<input name="website" type="text" id="website" value="<?php echo $website; ?>" class="form-control" /> 
 </div>											
 <div class="form-group">
 <select name="role" id="role" class="form-control"><option value="writer" <?php echo $ex1; ?>><?php echo langs('user')?></option>
<option value="admin" <?php echo $ex2; ?>><?php echo langs('admin')?></option></select>
</div>
<div class="form-group"  id="ischeck">
	<select name="ischeck" class="form-control">
        <option value="n" <?php echo $ex3; ?>><?php echo langs('posts_not_need_audit')?></option>
		<option value="y" <?php echo $ex4; ?>><?php echo langs('posts_need_audit')?></option>
	</select>
	</div>
 <div class="form-group">
                <label><?php echo langs('personal_description')?></label>
                <textarea name="description" rows="5"  class="form-control"><?php echo $description; ?></textarea>
</div>
 <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
	<input type="hidden" value="<?php echo $uid; ?>" name="uid" />
	 <div class="form-group">
	<input type="submit" value="<?php echo langs('save')?>" class="btn btn-primary" />
	<input type="button" value="<?php echo langs('cancel')?>" class="btn btn-default"  onclick="javascript: window.history.back();" />
 <div class="form-group">
</form>
</div>
</div>
</div>
</div>
<script>
setTimeout(hideActived,2600);
$("#menu_user").addClass('active');
if($("#role").val() == 'admin') $("#ischeck").hide();
$("#role").change(function(){$("#ischeck").toggle()})
</script>
