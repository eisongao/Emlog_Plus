<?php
/**
 * 全局项加载
 * @copyright (c) Emlog All Rights Reserved
 */

error_reporting(7);
ob_start();
header('Content-Type: text/html; charset=UTF-8');

if (extension_loaded('mbstring')) {
	mb_internal_encoding('UTF-8');
}

//FLYER修改
define('EMLOG_ROOT', str_replace('\\','/',dirname(__FILE__)));

require_once EMLOG_ROOT.'/config.php';
require_once EMLOG_ROOT.'/include/lib/function.base.php';

//FLYER反腾讯网址安全检查系统
if (Option::get('txprotect') == 'y'){
require_once EMLOG_ROOT.'/include/lib/txscan.php';
}

//FLYER提供的防跨站脚本攻击漏洞
if (Option::get('webscan') == 'y'){
require_once EMLOG_ROOT.'/include/lib/360webscan.php';
} 


doStripslashes();

$CACHE = Cache::getInstance();

$userData = array();

define('ISLOGIN',LoginAuth::isLogin());

//FLYER添加
date_default_timezone_set(Option::get('timezone'));

//用户组:admin管理员, writer联合撰写人, visitor访客
define('ROLE_ADMIN', 'admin');
define('ROLE_WRITER', 'writer');
define('ROLE_VISITOR', 'visitor');
//用户角色
define('ROLE', ISLOGIN === true ? $userData['role'] : ROLE_VISITOR);
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : '');
//站点固定地址
define('BLOG_URL', Option::get('blogurl'));
//模板库地址
define('TPLS_URL', BLOG_URL.'content/templates/');
//模板库路径
define('TPLS_PATH', EMLOG_ROOT.'/content/templates/');
//解决前台多域名ajax跨域
define('DYNAMIC_BLOGURL', getBlogUrl());
//前台模板URL
if(isset($_GET['theme'])){
    $theme = $_GET['theme']=='reset' ? Option::get('nonce_templet') : $_GET['theme'];
}else{
    $theme='';
}
if($theme==''){
    define('TEMPLATE_NAME', Option::get('nonce_templet'));
}else{
    define('TEMPLATE_NAME', $theme);
}
define('TEMPLATE_URL', TPLS_URL.TEMPLATE_NAME.'/');

$active_plugins = Option::get('active_plugins');
$emHooks = array();
if ($active_plugins && is_array($active_plugins)) {
	foreach($active_plugins as $plugin) {
		if(true === checkPlugin($plugin)) {
			include_once(EMLOG_ROOT . '/content/plugins/' . $plugin);
		}
	}
}
