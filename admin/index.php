<?php
/**
 * 管理中心
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

if ($action == '') {
	$serverapp = $_SERVER['SERVER_SOFTWARE'];
	$DB = Database::getInstance();
	$mysql_ver = $DB->getMysqlVersion();
	$php_ver = PHP_VERSION;
	$uploadfile_maxsize = ini_get('upload_max_filesize');
	$safe_mode = ini_get('safe_mode');

	if (function_exists("imagecreate")) {
		if (function_exists('gd_info')) {
			$ver_info = gd_info();
			$gd_ver = $ver_info['GD Version'];
		} else{
			$gd_ver = langs('supported');
		}
	} else{
		$gd_ver = langs('not_supported');
	}

	include View::getView('header');
	require_once(View::getView('index'));
	include View::getView('footer');
	View::output();
}

function count_user_all(){
$db = Database::getInstance();
$data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "user");
return $data['total'];
}

function yourcom(){
	global $CACHE;
	$db=Database::getInstance();
        $sql = "SELECT cid,gid,date,poster,mail,comment FROM " . DB_PREFIX . "comment WHERE hide='n'  ORDER BY date DESC LIMIT 0,5";
        $ret= $db->query($sql);
        while($row = $db->fetch_array($ret)){
echo "<div class=\"sl-item\">
<a href=\"".Url::log($row['gid'])."#comment-".$row["cid"]."\"><div class=\"sl-avatar avatar avatar-sm avatar-circle\"><img class=\"img-responsive img-circle\" src=".getGravatar($row["mail"])." alt=\"avatar\" style=\"width:30px;height:30px\"></div><div class=\"sl-content\">
<p class=\"inline-block\"><span class=\"capitalize-font txt-success mr-5 weight-500\">".$row['poster']."</span><span>".htmlspecialchars($row['comment'])."</span></p>
<span class=\"block txt-grey font-12 capitalize-font\">".date("Y-m-d",$row['date'])."</span></div></a></div>";        
}                
}

//phpinfo()
if ($action == 'phpinfo') {
	@phpinfo() OR emMsg(langs('phpinfo_disabled'),'./');
}
