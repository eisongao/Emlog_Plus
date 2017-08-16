<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<!DOCTYPE html>
<html dir="<?php echo EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES ?>">
<head>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="author" content="emlog" />
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title><?php echo langs('admin_center')?> - <?php echo Option::get('blogname'); ?></title>
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom CSS -->
<link href="./views/dist/css/style.css?v=<?php echo Option::EMLOG_VERSION; ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="./views/js/jquery.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
 <script src="../include/lib/js/jquery/plugin-cookie.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
 <script src="<?php echo BLOG_URL ?>lang/<?php echo EMLOG_LANGUAGES ?>/lang_js.js"></script>
 <script src="./views/js/common.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
 <script>laguage="<?php echo Option::get('language')?>";editor="<?php echo Option::get('admin_editor') ?>"</script>
<?php doAction('adm_head');?>
</head>
<body>
<div class="preloader-it">
<div class="la-anim-1"></div>
</div>
<div id="lock_box">
<div class="slideunlock-wrapper">
    <input type="hidden" value="" class="slideunlock-lockable"/>
    <div class="slideunlock-slider">
        <span class="slideunlock-label"></span>
        <span class="slideunlock-lable-tip">Slide to unlock</span>
    </div>
</div>
</div>
<div class="wrapper theme-<?php echo Option::get('admin_style') ?>-active <?php echo Option::get('admin_sider') ?>  "><nav class="navbar navbar-inverse navbar-fixed-top">
<div class="mobile-only-brand pull-left">
<div class="nav-header pull-left">
<div class="logo-wrap">
<a href="./">
<img class="brand-img" src="./views/dist/img/logo.png" alt="brand" style="width:24px;height:24px">
<span class="brand-text">EM<span style="color:red">LOG</span></span><sup><?php echo  Option::EMLOG_VERSION  ?></sup>
</a>
</div></div>	
<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
<form action="admin_log.php" method="get" id="search_form" role="search" class="top-nav-search collapse pull-left">
<div class="input-group">
<input type="text" name="keyword" class="form-control" placeholder="<?php echo langs('article_search')?>">
<?php if($pid):?>
<input type="hidden" id="pid" name="pid" value="draft">
<?php endif;?>						
<span class="input-group-btn">
<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
</span>
</div>
</form>
</div>
<div id="mobile_only_nav" class="mobile-only-nav pull-right">
<ul class="nav navbar-right top-nav pull-right">
<?php if (ROLE == ROLE_ADMIN){?>		
<li>
<a href="./style.php"><i class="zmdi zmdi-settings top-nav-icon"></i></a>
</li>
<li class="dropdown full-width-drp">
<a><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
</li>
<li class="dropdown alert-drp">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><?php if($sta_cache['comnum_all']>"0"){?><span class="top-nav-icon-badge">5</span><?php } ?></a>
<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
<li>
<div class="notification-box-head-wrap">
<span class="notification-box-head pull-left inline-block"><?php echo langs('news_commet')?></span>
<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> <?php echo langs('news_close')?> </a>
<div class="clearfix"></div>
<hr class="light-grey-hr ma-0"/>
</div>
<li>
<div class="streamline message-nicescroll-bar">
<?php echo newcomm();?>
</div>
</li>
<li>
<div class="notification-box-bottom-wrap">
<hr class="light-grey-hr ma-0"/>
<a class="block text-center read-all" href="comment.php"> <?php echo langs('all_commets')?></a>
<div class="clearfix"></div>
</div>
</li>
</ul>
</li>
<?php }else{?>
<li class="dropdown app-drp">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-apps top-nav-icon"></i></a>
<ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
<li>
<div class="app-nicescroll-bar">
<ul class="app-icon-wrap pa-10">
<li>
<a href="admin_log.php" class="connection-item">
<i class="zmdi zmdi-map txt-danger"></i>
<span class="block"><?php echo langs('all')?></span>
</a>
</li>
<li>
<a href="write_log.php" class="connection-item">
<i class="zmdi zmdi-cloud-outline txt-info"></i>
<span class="block"><?php echo langs('post_write')?></span>
</a>
</li>
<li>
<a href="comment.php" class="connection-item">
<i class="zmdi zmdi-comment-outline txt-warning"></i>
<span class="block"><?php echo langs('comment_management')?></span>
</a>
</li>
<li>
<a href="blogger.php" class="connection-item">
<i class="zmdi zmdi-assignment-account"></i>
<span class="block"><?php echo langs('editor_user')?></span>
</a>
</li>
</ul>
</div>	
</li>
</ul>
</li>							
<li class="dropdown full-width-drp">
<a><i class="zmdi zmdi-more-vert top-nav-icon"></i></a>
</li>
<li class="dropdown alert-drp">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zmdi zmdi-notifications top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
<li>
<div class="notification-box-head-wrap">
<span class="notification-box-head pull-left inline-block"><?php echo langs('notice')?></span>
<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> <?php echo langs('news_close')?> </a>
<div class="clearfix"></div>
<hr class="light-grey-hr ma-0"/>
</div>
<li>
<div class="streamline message-nicescroll-bar">
<?php echo newt();?>
</div>
</li>
</ul>
</li>
<?php } ?>
<li class="dropdown auth-drp">
<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="<?php echo $avatar =preg_replace('/thum-|thum52-/','',$avatar); ?>" alt="user_auth" class="user-auth-img img-circle" style="width:20px,height:20px"/><span class="user-online-status"></span></a>
<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
<li>
<a href="./blogger.php"><i class="zmdi zmdi-account"></i><span><?php echo langs('personal_settings')?></span></a>
</li>
<?php if (ROLE == ROLE_ADMIN):?>		
<li>
<a href="configure.php"><i class="zmdi zmdi-settings"></i><span><?php echo langs('settings')?></span></a>
</li>
<?php endif?>
<li class="divider"></li>
<li class="sub-menu show-on-hover">
<a id="LockScreen"  class=" pr-0 level-2-drp" id="queryBtn"><i class="zmdi zmdi-lock"></i><?php echo langs('locks')?></a>
</li>
<li class="divider"></li>
<li><a href="./?action=logout"><i class="zmdi zmdi-power"></i><span><?php echo langs('logout')?></span></a>
</li>
</ul>
</li>
</ul>
</div>	
</nav><!-- Left Sidebar Menu -->
<div class="fixed-sidebar-left">
<ul class="nav navbar-nav side-nav nicescroll-bar">
<li class="navigation-header">
<span><?php echo langs('main_menu')?></span> 
<i class="zmdi zmdi-more"></i>
</li>
<li >
<a id="menu_index"  href="../">
<div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text"><?php echo langs('to_site')?></span></div>
<div class="clearfix"></div>
</a>
</li>
<li>
<a id="menu_log" href="javascript:void(0);" data-toggle="collapse" data-target="#log_dr"><div class="pull-left"><i class="zmdi zmdi-file-text mr-20"></i><span class="right-nav-text"><?php echo langs('post_manage')?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="log_dr" class="collapse collapse-level-1">
<li>
<a id="menu_logs" href="admin_log.php"><?php echo langs('all')?></a>
</li>
<li>
<a id="menu_wt" href="write_log.php"><?php echo langs('post_write')?></a>
</li>
<?php if (ROLE == ROLE_ADMIN):?>			
<li>
<a id ="menu_tw" href="twitter.php"><?php echo langs('twitters_write')?></a>
</li>
<?php endif;?>
</ul>
</li>				
<li>
<a id="menu_draft" href="admin_log.php?pid=draft" ><div class="pull-left"><i class="zmdi zmdi-book mr-20"></i><span class="right-nav-text"><?php echo langs('draft_manage')?></span></div><div class="pull-right"><span class="label label-warning"><?php 
		if (ROLE == ROLE_ADMIN){
			echo $sta_cache['draftnum'] == 0 ? '' : ''.$sta_cache['draftnum'].''; 
		}else{
			echo $sta_cache[UID]['draftnum'] == 0 ? '' : ''.$sta_cache[UID]['draftnum'].'';
		}
		?></span></div><div class="clearfix"></div></a>
</li>
<?php if (ROLE == ROLE_ADMIN){?>				
<li >
<a  id="menu_cm" href="comment.php"><div class="pull-left"><i class="fa fa-comments mr-20"></i><span class="right-nav-text"><?php echo langs('comment_management')?></span></div><?php
		$hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
		if ($hidecmnum > 0):
		$n = $hidecmnum > 999 ? '...' : $hidecmnum;
		?>
		<div class="pull-right"><span class="label label-danger"><?php echo $hidecmnum; ?></span></div>
		<?php endif; ?>
<div class="clearfix"></div></a>
</li>				
<li>
<a id="menu_store" href="javascript:void(0);" data-toggle="collapse" data-target="#estore_dr"><div class="pull-left"><i class="zmdi zmdi-shopping-basket mr-20"></i><span class="right-nav-text"><?php echo langs('applications')?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="estore_dr" class="collapse collapse-level-1">
<li>
<a id="menu_store_plu" href="store.php?users=emlog-plus"><?php echo langs('online_plus')?></a>
</li>
<li>
<a id="menu_store_theme" href="store.php?users=emlog-theme"><?php echo langs('online_theme')?></a>
</li>
</ul>
</li>								
<li><hr class="light-grey-hr mb-10"/></li>
<li class="navigation-header">
<span><?php echo langs('sys_menu')?></span> 
<i class="zmdi zmdi-more"></i>
</li>
<li>
<a id="menu_action" href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr"><div class="pull-left"><i class="zmdi zmdi-smartphone-setup mr-20"></i><span class="right-nav-text"><?php echo langs('related_set')?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
<li>
<a id="menu_navbar" href="navbar.php"><?php echo langs('nav_settings')?></a>
</li>
<li>
<a id="menu_widget" href="widgets.php"><?php echo langs('widget_manage')?></a>
</li>
<li>
<a id="menu_page" href="page.php"><?php echo langs('page_management')?></a>
</li>	
<li><a id="menu_sort" href="sort.php"><?php echo langs('sort_management')?></a></li>
<li>
<a id="menu_tag" href="tag.php"><?php echo langs('tag_management')?></a>
</li>
<li>
<a id="menu_media" href="media.php"><?php echo langs('media_mange')?></a>
</li>
</ul>
</li>
<li>
<a id="menu_set" href="javascript:void(0);" data-toggle="collapse" data-target="#table_dr"><div class="pull-left"><i class="fa fa-gear mr-20"></i><span class="right-nav-text"><?php echo langs('sys_settings')?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="table_dr" class="collapse collapse-level-1 two-col-list">
<li>
<a id="menu_con" href="configure.php"><?php echo langs('basic_settings')?></a>
</li>
<li>
<a id="menu_seo" href="seo.php"><?php echo langs('seo_settings')?></a>
</li>	
<li>
<a id="menu_data" href="data.php"><?php echo langs('data_backup')?></a>
</li>
<li>
<a id="menu_cache" href="cache.php"><?php echo langs('cache_update') ?></a>
</li>
</ul>
<li>
<a   id="menu_tpl" href="template.php" ><div class="pull-left"><i class="fa fa-trello mr-20"></i><span class="right-nav-text"><?php echo langs('theme_settings')?></span></div><div class="clearfix"></div></a>
</li>			
<li>
<a id="menu_plug" href="plugin.php"><div class="pull-left"><i class="fa fa-plug mr-20"></i><span class="right-nav-text"><?php echo langs('pls_management')?></span></div><div class="clearfix"></div></a>
</li>
<li>
<a   id="menu_links" href="javascript:void(0);" data-toggle="collapse" data-target="#link_dr" ><div class="pull-left"><i class="fa fa-link mr-20"></i><span class="right-nav-text"><?php echo langs('links_management')?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul id="link_dr" class="collapse-level-1 collapse">
<li>
<a  id="menu_link" href="link.php"><?php echo langs('friend_links')?></a>
</li>
<li>
<a  id="menu_linksort" href="sortlink.php"><?php echo langs('links_sort')?></a>
</li>
</ul>
</li>
</li>				
<li>
<a id="menu_user" href="user.php" ><div class="pull-left"><i class=" fa fa-group  mr-20"></i><span class="right-nav-text"><?php echo langs('user_management')?></span></div><div class="clearfix"></div></a>
</li>				
<li><hr class="light-grey-hr mb-10"/></li>
				<li class="navigation-header">
					<span><?php echo langs('other_menu')?></span> 
					<i class="zmdi zmdi-more"></i>
</li>
<li>
<a id="menu_mg" href="javascript:void(0);" data-toggle="collapse" data-target="#extend_mg"><div class="pull-left"><i class="fa fa-slack mr-20"></i><span class="right-nav-text"><?php echo langs('extensions')?></span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
<ul  id="extend_mg" class="collapse collapse-level-1 two-col-list">					
 <?php if (!empty($emHooks['adm_sidebar_ext'])): ?>
                          <?php doAction('adm_sidebar_ext'); ?>
                          <?php else : ?>
                          <li><a href="./plugin.php?action=install" ><?php echo langs('add_pls')?></a>
                          </li>
                          <?php endif; ?>
</ul>
</li>
<li>
<a id="menu_faq" href="faq.php"><div class="pull-left"><i class="fa fa-stethoscope mr-20"></i><span class="right-nav-text"><?php echo langs('faq')?></span></div><div class="clearfix"></div></a>
</li>								
<li>
<a id="menu_up" href="upgrade.php"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text"><?php echo langs('online_update')?></span></div><div class="pull-right"><span class="label label-success">hot</span></div><div class="clearfix"></div></a>
</li>											
</ul>											
<?php }else{ ?>									
<li >
<a  id="menu_cm" href="comment.php"><div class="pull-left"><i class="fa fa-comments mr-20"></i><span class="right-nav-text"><?php echo langs('comment_management')?></span></div>
<?php
		$hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
		if ($hidecmnum > 0):
		$n = $hidecmnum > 999 ? '...' : $hidecmnum;
		?>
		<div class="pull-right"><span class="label label-danger"><?php echo $hidecmnum; ?></span></div>
		<?php endif; ?>
<div class="clearfix"></div></a>
</li>											
<li>
<a id="menu_up" href="./?action=logout"><div class="pull-left"><i class="zmdi zmdi-chart-donut mr-20"></i><span class="right-nav-text"><?php echo langs('logout')?></span></div><div class="clearfix"></div></a>
</li>											
</ul>									
<?php };?>
</div>
<div class="page-wrapper"  id="container">
 <div class="container-fluid">
 <?php doAction('adm_main_top'); ?>