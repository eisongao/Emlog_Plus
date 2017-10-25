<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<!DOCTYPE html>
<html dir="<?php echo EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="robots" content="noindex, nofollow">
<title><?php echo langs('admin_center')?> - <?php echo Option::get('blogname'); ?></title>
<link rel="shortcut icon" href="favicon.ico">
<link href="./views/dist/css/style.css?v=<?php echo Option::EMLOG_VERSION; ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./views/js/common.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="<?php echo BLOG_URL ?>lang/<?php echo  EMLOG_LANGUAGES ?>/lang_js.js"></script>
</head>
<body>
<!--Preloader-->
<?php if(Option::get('preloader') == "y"):?>
<div class="preloader-it">
<div class="la-anim-1"></div>
</div>
<?php endif ?>
<!--/Preloader-->
<div class="wrapper pa-0">
<header class="sp-header">
<div class="sp-logo-wrap pull-left">
<a class="inline-block  btn  btn-primary" href="../" ><?php echo langs('site_home')?></a>
</a>
</div>
<?php if(Option::get('register_open') != 'n'){?>
<div class="form-group mb-0 pull-right">
<span class="inline-block pr-10"><?php echo langs('no_yet_account')?></span>
<a href="#myreg" data-toggle="modal" class="inline-block btn btn-warning" /><?php echo langs('reg_home')?>
</a>
</div>
<?php }else{ ?>
<div class="form-group mb-0 pull-right">
<span class="inline-block pr-10">
<?php echo langs('no_enter_')?>
</span>
<a href="#scan_login" data-toggle="modal" class="inline-block btn btn-warning" /><?php echo langs('mobile_login') ?>
</a>
</div>
<?php } ?>
<div class="clearfix"></div>
</header>
<div class="page-wrapper pa-0 ma-0 auth-page">
<div class="container-fluid">
<div class="table-struct full-width full-height">
<div class="table-cell vertical-align-middle auth-form-wrap">
<div class="auth-form  ml-auto mr-auto no-float">
<div class="row">
<div class="col-sm-12 col-xs-12">
<div class="mb-30">
<h3 class="text-center txt-dark  mb-10"><?php echo langs('home_center')?></h3>
 <?php if ($error_msg): ?>
<h6 class="text-center nonecase-font txt-grey">
<?php echo $error_msg; ?>
</h6>
<?php else: ?>
<h6 class="text-center nonecase-font txt-grey"><?php echo langs('home_info')?></h6>
<?php endif;?>
</div>	
<div class="form-wrap">
<form class="form-signin" name="f" method="post" action="./index.php?action=login"  onsubmit="return validate(this);">
<div class="form-group">
<label class="control-label mb-10" for="User">
<?php echo langs('_user')?>
</label>
<input type="user" name="user"  class="form-control" required="" id="user" placeholder="<?php echo langs('user_name')?>">
</div>
<div class="form-group">
<label class="pull-left control-label mb-10" for="pwd"><?php echo langs('password')?></label>
<a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="#mypassword" data-toggle="modal" ><?php echo langs('password_forget')?> ?</a>
<div class="clearfix"></div>
<input type="password" name="pw"  class="form-control" required="" id="pw" placeholder="<?php echo langs('password')?>">
</div>
<div class="form-group">
<?php if($ckcode):?>
           <label class="reg">
           <?php echo $ckcode; ?>
           </label>
<?php endif ?>									
</div>
<div class="form-group">
<div class="checkbox checkbox-primary pr-10 pull-left">
<input type="checkbox" name="ispersis" id="ispersis" value="1" >
<label for="checkbox_2"> <?php echo langs('remember_me')?></label>
</div>
<div class="clearfix"></div>
</div>
<div class="form-group text-center">			<button type="submit" class="btn btn-info btn-round" ><?php echo langs('log_in')?></button>
</div>
</form>
</div>
</div>	
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div aria-hidden="true" role="dialog" tabindex="-1" id="mypassword" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('find_password') ?></h4>
</div>
<div class="modal-body">
<div class="form-group">
<label class="control-label mb-10"  id="chkmsg" for="mail">
<?php echo langs('enter_email') ?>
</label>
<form method="post" action="./index.php?action=sendmail"  class="form-horizontal" >
<input type="email" class="form-control"  name="mail" id="mail"  placeholder="<?php echo langs('enter_email_') ?>">
<div class="clearfix"></div>
</div>
<div class="form-group text-center">			<input type="submit" class="btn btn-info btn-round" id="sub_btn" value="<?php echo langs('submit_f') ?>">
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php if(Option::get('register_open') != 'n'){?>
<div aria-hidden="true" role="dialog" tabindex="-1" id="myreg" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"> <?php if(Option::get('register_open') == 'n'){?><?php echo langs('stop_reg')?><?php }else{ ?><?php echo langs('reg_open')?><?php } ?></h4>
</div>
<div class="modal-body">
<form class="form-signup"  method="post" action="./index.php?action=reg"  class="form-horizontal" id="reg">
<div class="form-group">
<label><?php echo langs('user_name')?></label>
<input type="user" name="username" class="form-control" required="" id="reg_user" placeholder="<?php echo langs('enter_user')?>" <?php if(Option::get('register_open') == 'n'){?>disabled="disabled"<?php } ?>>
	</div>
        <div class="form-group">
	<label><?php echo langs('email')?></label>
	<input type="email" name="email" class="form-control" required="" id="reg_mail" placeholder="<?php echo langs('enter_email')?>"   <?php if(Option::get('register_open') == 'n'){?>disabled="disabled"<?php } ?>>
	</div>
      <div class="form-group">
	<label><?php echo langs('password')?></label>
<input type="password" name="password"  class="form-control" required="" id="reg_pwd" placeholder="<?php echo langs('enter_pw')?>"  <?php if(Option::get('register_open') == 'n'){?>disabled="disabled"<?php } ?>>
	</div>
	<div class="form-group">
	<label><?php echo langs('password_repeat')?></label>
    <input type="password" name="password2" class="form-control" required="" id="reg_pwd_1" placeholder="<?php echo langs('enter_re_pw')?>"  <?php if(Option::get('register_open') == 'n'){?>disabled="disabled"<?php } ?>>
	</div>
   <div class="form-group">
           <label class="reg">
           <span><?php echo langs('yzcode')?></span>
        <div class="val"><input name="imgcode" type="text" class="imgcode"  id="imgcode"   <?php if(Option::get('register_open') == 'n'){?>disabled="disabled"<?php } ?>>
        <img src="<?php echo BLOG_URL; ?>include/lib/checkcode.php"  id="yzcode"  align="absmiddle"  style="cursor : pointer;" alt="<?php echo langs('view_code_no')?>" title="<?php echo langs('refresh_code')?>" onclick="this.src=this.src+'?'" ></div>           
        </label>
	</div>
<div class="form-group">
<div class="checkbox checkbox-primary pr-10 pull-left">
<input id="checkbox_2" required="" type="checkbox">
<label for="checkbox_2"> <?php echo langs('home_agree')?><span class="txt-primary"><?php echo langs('agree_info')?></span></label>
</div>
<div class="clearfix"></div>
</div>
<div class="form-group text-center">
<button type="submit"  <?php if(Option::get('register_open') == 'n'){?>disabled="disabled"<?php } ?>class="btn btn-info"><?php echo langs('reg_home')?></button>
</div>
</form>
</div>
</div>
</div>
</div>
<?php }else{ ?>
<div aria-hidden="true" role="dialog" tabindex="-1" id="scan_login" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('mobile_login') ?></h4>
</div>
<div class="modal-body">
<form method="post" action="./index.php?action=mlogin"  class="form-horizontal" >
<div class="form-group text-center">	        
<input type="submit" class="btn btn-info btn-round" id="sub_btn" value="<?php echo langs('mobile_send') ?>">
</div>
</form>
</div>
</div>
</div>
</div>
<?php } ?>
<script>
focusEle('user');
</script>
<!-- jQuery -->
<script type="text/javascript" src="./views/js/jquery.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
 <script src="./views/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
 <script src="./views/dist/js/jquery.slimscroll.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/dist/js/init.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
</body>
</html>
