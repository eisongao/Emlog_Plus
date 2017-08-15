<?php 
if(!defined('EMLOG_ROOT')) {exit('error!');}
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $site_title; ?></title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
<meta content="yes" name="apple-mobile-web-app-capable"> 
<meta content="black" name="apple-mobile-web-app-status-bar-style"> 
<meta content="telephone=no" name="format-detection"> 
<link rel="stylesheet" href="<?php echo BLOG_URL; ?>m/view/css/main.css">
</head>
<body>
<div id="main_body">
<header class="s_header">
<nav>
<span class="navt qq"><?php echo Option::get('blogname'); ?></span>
</nav>
</header>
	<nav class="s_nav">
		<section id="jt">
			<div id="nav">
				<ul>
					<li>
<a href="./"><?php echo langs('home')?></a>
<?php if(Option::get('istwitter') == 'y'): ?>
<a href="./?action=tw">
<?php echo langs('twitter')?>
</a>
<?php endif;?>
<?php if(ISLOGIN === true): ?>
<a href="./?action=write"><?php echo langs('post_write')?></a> 
<a href="./?action=logout">
<?php echo langs('logout')?>
</a>
<?php else:?>
<a href="<?php echo BLOG_URL; ?>m/?action=login"><?php echo langs('login')?></a>
<?php endif;?>
</li>
				</ul>
			</div>
		</section>
	</nav>