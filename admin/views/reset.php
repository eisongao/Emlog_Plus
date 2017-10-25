<?php 
!defined('EMLOG_ROOT') && exit('access deined!');
load_languages('admin');
$DB = Database::getInstance();
if($action=='reset'){
$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';
$sql = "select * from `".DB_PREFIX."user`  where email='$email'";  
$query = $DB->query($sql);  
$row = $DB->fetch_array($query);  
if(time()-$row['getpasstime'] > 24*60*60){  
emMsg(langs('resetpasstime'));
}else{
$password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
$hsPWD = new PasswordHash(8, true);
 $password = $hsPWD->HashPassword($password);
 echo "<script>alert('".langs('reset_succes')."');javascript:window.location='./';</script>";
$DB->query("update `".DB_PREFIX."user` set `password`='$password' where email='$email '"); 
}
}
$mail = stripslashes(trim($_GET['email']));  
$token = stripslashes(trim($_GET['token']));  
$sqli = "select * from `".DB_PREFIX."user`  where email='$mail'";  
$query = $DB->query($sqli);  
$row = $DB->fetch_array($query);  
$uid = $row['uid'];  
$tmt = md5($uid.$row['username'].$row['password'].$getpasstime);
if($tmt!==$token){  
  echo "<script>alert('".langs('no_url')."');javascript:window.location='./';</script>";
}
?>
<!DOCTYPE html>
<html dir="<?php echo EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title><?php echo langs('reset_password') ?> - <?php echo Option::get('blogname'); ?></title>
<link rel="shortcut icon" href="favicon.ico">
<link href="./views/dist/css/style.css?v=<?php echo Option::EMLOG_VERSION; ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./views/js/jquery.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script type="text/javascript" src="./views/js/common.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
</head>
<body>
<!--Preloader-->
<div class="preloader-it">
<div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper pa-0">
<header class="sp-header">
<div class="sp-logo-wrap pull-left">
<a class="inline-block  btn  btn-primary" href="../" ><?php echo langs('site_home')?></a>
</a>
</div>
<div class="form-group mb-0 pull-right">
<a href="./" data-toggle="modal" class="inline-block btn btn-warning" />
<?php echo langs('log_in')?>
</a>
</div>
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
<h6 class="text-center nonecase-font txt-grey"><?php echo langs('home_info')?></h6>
</div>	
<div class="form-wrap">
<form class="form-signin"  method="post" action="./reset.php?action=reset&token=<?php echo $token ?>" >
        <div class="form-group">
          <div class="col-lg-10">						<label><?php echo langs('email')?></label>
	<input type="email" name="email" class="form-control" required id="reg_mail" value="<?php echo $_GET['email'] ?>" readonly >
	</div>
	</div>
<div class="form-group">
          <div class="col-lg-10">		
<label class="control-label mb-10" for="password">
<?php echo langs('new_password') ?> 
</label>
<input type="password" name="password"  class="form-control" required id="password" placeholder="<?php echo langs('enter_pw')?>">
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="form-group text-center">	
<button type="submit" class="btn btn-info btn-round" ><?php echo langs('save')?></button>
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
<!-- jQuery -->
<script src="./views/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/dist/js/jquery.slimscroll.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/dist/js/init.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
</body>
</html>
