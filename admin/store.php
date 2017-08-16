<?php
/**
 * 应用中心
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

if ($action == '') {
	$site_url_encode = rawurlencode(base64_encode(BLOG_URL));
	include View::getView('header');
	require_once(View::getView('store'));
	include View::getView('footer');
	View::output();
}

if ($action == 'instpl') {
       LoginAuth::checkToken();
	$source = isset($_GET['source']) ? trim($_GET['source']) : '';
	$source_type = 'tpl';
	$source_typename = langs('template');
	$source_typeurl = '<a href="template.php">'.langs('template_view').'</a>';
	include View::getView('header');
	require_once(View::getView('store_install'));
	include View::getView('footer');
}

if ($action == 'insplu') {
       LoginAuth::checkToken();
	$source = $_GET['source'];	
	$source_type = 'plu';
	$source_typename = $_GET['typename'];
	$source_typeurl = '<a href="plugin.php">'.langs('plugin_view').'</a>';
	include View::getView('header');
	require_once(View::getView('store_install'));
	include View::getView('footer');  
}

if ($action == 'update' && ROLE == ROLE_ADMIN) {
	$source = isset($_GET['source']) ? trim($_GET['source']) : '';
	$upsql = isset($_GET['upsql']) ? trim($_GET['upsql']) : '';
	$source_type = 'upd';
	$source_typename = langs('update');
	$source_typeurl = '<a href="./">'.langs('refresh_home').'</a>';
	
     if(!empty($_GET['upsql'])){
     if(ROLE!=ROLE_ADMIN){
        emMsg(langs('no_permission'));
       }
	$DB = Database::getInstance();
	$setchar = $DB->getMysqlVersion() > '4.1' ? "ALTER DATABASE `" . DB_NAME . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;" : '';
	$temp_file = emFecthFile($upsql);
	if (!$temp_file) {
		 exit('error_down');
	}
	$sql = file($temp_file);
	@unlink($temp_file);
	array_unshift($sql,$setchar);
	$query = '';
	foreach ($sql as $value) {
		if (!$value || $value[0]=='#') {
			continue;
		}
	$value = str_replace("{db_prefix}", DB_PREFIX, trim($value));
if (preg_match("/\;$/i", $value)) {
			$query .= $value;
			$DB->query($query);
			$query = '';
		} else{
			$query .= $value;
		}
	}
	$CACHE->updateCache();
	}
	include View::getView('header');
	require_once(View::getView('store_install'));
	include View::getView('footer');
}

if ($action == 'addon') {
if(ROLE!=ROLE_ADMIN){
        emMsg(langs('no_permission'));
    }
    $source = $_GET['source'];
    $source_type = $_GET['type'];
    
    if (empty($source)) {
		exit('error');
	}
	$temp_file = emFecthFile($source);
if (!$temp_file) {
		 exit('error_down');
	}
if($source_type == 'tpl'){
$unzip_path = '../content/templates/';
}
if($source_type == 'plu'){
$unzip_path = '../content/plugins/';
}
if($source_type == 'upd'){
$unzip_path = '../';
}
$ret = emUnZip($temp_file, $unzip_path, $source_type);
	@unlink($temp_file);
	switch ($ret) {
		case 0:
			exit('succ');
			break;
		case 1:
		case 2:
			exit('error_dir');
			break;
		case 3:
			exit('error_zip');
			break;
	}
}