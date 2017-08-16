<?php
/*
Template Name:默认模板
Description:默认模板，简洁优雅
Version:1.2
ForEmlog:3.5.1+
Author:Emlog
Author Url:http://www.emlog.net
Sidebar Amount:2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html dir="<?php echo EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />  
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />
<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
<link href="<?php echo TEMPLATE_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link type="image/vnd.microsoft.icon" href="<?php echo TEMPLATE_URL; ?>images/favicon.ico" rel="shortcut icon">
<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>/js/nav.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.min.js"></script>
<script src="<?php echo BLOG_URL ?>lang/<?php echo  EMLOG_LANGUAGES ?>/lang_js.js"></script>
<?php doAction('index_head'); ?>
</head>
<body class="custom-font-enabled">
<div id="page" class="width"><div id="nav_box" class="nav">
<ul id="swipe">
<div class="scroll"><?php blog_navi();?>
</div>
</ul>
</div>
<div id="header" style="background: url('<?php if(Option::get('topimg')){?><?php echo BLOG_URL.Option::get('topimg'); ?><?php } ?>') no-repeat;">
<div class="logo">
<h1 class="yahei"><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a></h1>
<p class="description">
<?php echo $bloginfo; ?></p>
  </div>
</div>