<?php
/**
 * 升級程序5.3.1 to 6.0
 * @copyright (c) Emlog All Rights Reserved
 */
error_reporting(7);
ob_start();
header('Content-Type: text/html; charset=UTF-8');
define('EMLOG_ROOT', dirname(__FILE__));
if (extension_loaded('mbstring')) {
	mb_internal_encoding('UTF-8');
}

require_once EMLOG_ROOT.'/config.php';

/**
 * 基础函数库
 * @copyright (c) Emlog All Rights Reserved
 */
function __autoload($class) {
	$class = strtolower($class);
	if (file_exists(EMLOG_ROOT . '/include/model/' . $class . '.php')) {
		require_once(EMLOG_ROOT . '/include/model/' . $class . '.php');
	} elseif (file_exists(EMLOG_ROOT . '/include/lib/' . $class . '.php')) {
		require_once(EMLOG_ROOT . '/include/lib/' . $class . '.php');
	} elseif (file_exists(EMLOG_ROOT . '/include/controller/' . $class . '.php')) {
		require_once(EMLOG_ROOT . '/include/controller/' . $class . '.php');
	} else {
		emMsg($class . langs('_load_failed'));

	}
}

/**
 * 去除多余的转义字符
 */
function doStripslashes() {
	if (get_magic_quotes_gpc()) {
		$_GET = stripslashesDeep($_GET);
		$_POST = stripslashesDeep($_POST);
		$_COOKIE = stripslashesDeep($_COOKIE);
		$_REQUEST = stripslashesDeep($_REQUEST);
	}
}

function daddslashes($string, $force = 0, $strip = FALSE) {
	!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
	if(!MAGIC_QUOTES_GPC || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force, $strip);
			}
		} else {
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}

/**
 * 递归去除转义字符
 */
function stripslashesDeep($value) {
	$value = is_array($value) ? array_map('stripslashesDeep', $value) : stripslashes($value);
	return $value;
}

/**
 * 转换HTML代码函数
 *
 * @param unknown_type $content
 * @param unknown_type $wrap 是否换行
 */
function htmlClean($content, $nl2br = true) {
	$content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
	if ($nl2br) {
		$content = nl2br($content);
	}
	$content = str_replace('  ', '&nbsp;&nbsp;', $content);
	$content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $content);
	return $content;
}

/**
 * 获取站点地址(仅限根目录脚本使用,目前仅用于首页ajax请求)
 */
function getBlogUrl() {
    $phpself = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
    if (preg_match("/^.*\//", $phpself, $matches)) {
        return 'http://' . $_SERVER['HTTP_HOST'] . $matches[0];
    } else {
        return BLOG_URL;
    }
}

/**
 * 获取当前访问的base url
 */
function realUrl() {
    static $real_url = NULL;
    
    if ($real_url !== NULL) {
        return $real_url;
    }
    
    $emlog_path = EMLOG_ROOT . DIRECTORY_SEPARATOR;
    $script_path = pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME);
    $script_path = str_replace('\\', '/', $script_path);
    $path_element = explode('/', $script_path);
    
    $this_match = '';
    $best_match = '';
    
    $current_deep = 0;
    $max_deep = count($path_element);
    
    while($current_deep < $max_deep) {
        $this_match = $this_match . $path_element[$current_deep] . DIRECTORY_SEPARATOR;
        
        if (substr($emlog_path, strlen($this_match) * (-1)) === $this_match) {
            $best_match = $this_match;
        }
        
        $current_deep++;
    }
    
    $best_match = str_replace(DIRECTORY_SEPARATOR, '/', $best_match);
    $real_url  = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $real_url .= $_SERVER["SERVER_NAME"];
    $real_url .= in_array($_SERVER['SERVER_PORT'], array(80, 443)) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $real_url .= $best_match;
    
    return $real_url;
}

function isIE6Or7() {
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        if (strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 7.0") || strpos($_SERVER['HTTP_USER_AGENT'], "MSIE 6.0")) {
            return true;
        }
    }
    return false;
}


/**
 * 生成一个随机的字符串
 *
 * @param int $length
 * @param boolean $special_chars
 * @return string
 */
function getRandStr($length = 12, $special_chars = true) {
	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	if ($special_chars) {
		$chars .= '!@#$%^&*()';
	}
	$randStr = '';
	for ($i = 0; $i < $length; $i++) {
		$randStr .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
	}
	return $randStr;
}
/**
 * 页面跳转
 */
function emDirect($directUrl) {
	header("Location: $directUrl");
	exit;
}

/**
 * 显示系统信息
 *
 * @param string $msg 信息
 * @param string $url 返回地址
 * @param boolean $isAutoGo 是否自动返回 true false
 */
function emMsg($msg, $url = 'javascript:history.back(-1);', $isAutoGo = false) {
    if ($msg == '404') {
        header("HTTP/1.1 404 Not Found");
        $msg = langs('404_description');
    }
    $langs = EMLOG_LANGUAGES;
    $dir  = EMLOG_LANGUAGE_DIR;
    echo <<<EOT
<!DOCTYPE html>
<html dir="$dir" lang="$langs">
<head>
EOT;
    if ($isAutoGo) {
        echo "<meta http-equiv=\"refresh\" content=\"2;url=$url\">";
    }
    $title = langs('prompt');
    echo <<<EOT
<meta charset="utf-8">
<title>$title</title>
<style type="text/css">
<!--
body {
    background-color:#F7F7F7;
    font-family: Arial;
    font-size: 12px;
    line-height:150%;
}
.main {
    background-color:#FFFFFF;
    font-size: 12px;
    color: #666666;
    width:650px;
    margin:60px auto 0px;
    border-radius: 10px;
    padding:30px 10px;
    list-style:none;
    border:#DFDFDF 1px solid;
}
.main p {
    line-height: 18px;
    margin: 5px 20px;
}
-->
</style>
</head>
<body>
<div class="main">
<p>$msg</p>
EOT;
    if ($url != 'none') {
    echo '<p><a href="' . $url . '">'. langs('click_return').'</a></p>';
    }
    echo <<<EOT
</div>
</body>
</html>
EOT;
    exit;
}


/**
 * 替换表情
 *
 * @param $t
 */
function emoFormat($t){
$emos = array(
);
foreach ($emos as $key=>$value) {
$t = str_replace(':'.$value['title'].':',$value['img'],$t);
}
return $t;
}
doStripslashes();


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

require_once EMLOG_ROOT.'/include/lib/lang.php';
define('EMLOG_LANGUAGE_DIR','ltr');
session_start();
if(isset($_GET['lang'])){
$lang = isset($_GET['lang']) ? $_GET['lang'] : ''; 
$_SESSION['lang']=$lang;
define('EMLOG_LANGUAGES',$lang); 
}elseif(isset($_SESSION['lang'])){
$lang=$_SESSION['lang'];
define('EMLOG_LANGUAGES',$lang); 
}else{
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,5);
$lang = strtolower($lang);
if ($lang == 'zh-cn'){
define('EMLOG_LANGUAGES','cn'); 
}else{
define('EMLOG_LANGUAGES','en'); 
}
}
load_languages('front');
load_languages('install');

?>
<html dir="<?php echo EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Emlog <?php echo langs('update')?></title>
<style type="text/css">
<!--
body {
    background-color:#F7F7F7;
	font-family: Arial;
	font-size: 12px;
	line-height:150%;}
.main {
	background-color:#FFFFFF;
	margin-top:20px;
	font-size: 12px;
	color: #666666;
	width:580px;
	margin:10px auto;
	padding:10px;
	list-style:none;
	border:#DFDFDF 1px solid;}
.input {
	border: 1px solid #CCCCCC;
	font-family: Arial;
	font-size: 18px;
	height:28px;
	background-color:#F7F7F7;
	color: #666666;
	margin:5px 25px;}
.submit{
	background-color:#FFFFFF;
	border: 3px double #999;
	border-left-color: #ccc;
	border-top-color: #ccc;
	color: #333;
	padding: 0.25em;
	cursor:hand;}
.title{font-size:20px;}
.care{color:#0066CC;padding:0px 10px;}
.title2{font-size:14px;color:#000000;border-bottom: #CCCCCC 1px solid;}
.foot{text-align:center;}
li{border-bottom:#CCCCCC 1px dotted;margin:20px 20px;}
-->
</style>
<script>
<!--
function selectLang(obj) {
    window.open("update.php?lang=" + obj.value,"_self");
}
-->
</script>
</head>
<body>
<?php
if(!isset($_GET['action'])){
?>
<form name="form1" method="post" action="update.php?action=install">
<div class="main">
<div>
<p><span class="title">Emlog <span style="color: #0099FF">5.3.1</span> -----&raquo; <span style="color: #FF0000; font-size:26px">6.0</span></span><span> <?php echo langs('update_emlog')?></span>
<span style="float:right">
<select name="lang" onChange="selectLang(this);" > 
<option value="0"><?php echo langs('choose_lang')?></option> 
<option value="cn"  <?php echo EMLOG_LANGUAGES == 'cn' ? 'selected' : '' ?>><?php echo langs('chinese')?></option> 
<option value="en" <?php echo EMLOG_LANGUAGES == 'en' ? 'selected' : ''  ?>><?php echo langs('english')?></option> 
</select> 
</span>
</p>
<p><?php echo langs('update_info')?></p>
</div>
<div class="b">
<p class="title2"></p>
<li>
    <strong><?php echo langs('db_password')?>：</strong><span class="care"><?php echo langs('update_pw')?></span><br />
  <input name="password" type="password" class="input" value="">
</li>
</div>
<div>
<p class="foot">
<input type="submit" class="submit" value="<?php echo langs('update_ok')?>">
<input type="reset" class="submit" value="<?php echo langs('update_rest')?>">
</p>
</div>
<p class="foot">
&copy;2017 Emlog
</p>
</div>
</div>
</form>
<?php
}

if (isset($_GET['action'])&&$_GET['action'] == "install") {
$DB = Database::getInstance();
$CACHE = Cache::getInstance();

 $db_prefix = DB_PREFIX;

	$dbcharset = 'utf8';
	$type = 'MYISAM';
	$extra = "ENGINE=".$type." DEFAULT CHARSET=".$dbcharset.";";
	$extra2 = "TYPE=".$type;
	$add = $DB->getMysqlVersion() > '4.1' ? $extra : $extra2.";";

	$widgets = Option::getWidgetTitle();
    $sider_wg = Option::getDefWidget();

	$widget_title = serialize($widgets);
	$widgets = serialize($sider_wg);

	if (DB_PASSWD != trim($_POST['password'])){
	    emMsg(langs('update_error'));
	}

	if (Option::EMLOG_VERSION != '6.0') {
		emMsg(langs('update_error_info'));
	}
       
       if ($DB->num_rows($DB->query("SELECT * FROM {$db_prefix}options WHERE option_name='admin_sider'")) == 1) {
        emMsg(langs('update_repeat'));
    }	


 $sql = "
 ALTER TABLE `".$db_prefix."blog` ADD `thumbs` VARCHAR(255) NOT NULL AFTER `excerpt`;
 
UPDATE `".$db_prefix."options` SET `option_value` = 'Asia/Shanghai' WHERE `".$db_prefix."options`.`option_name` = 'timezone';

UPDATE `".$db_prefix."options` SET `option_value` = '1' WHERE `".$db_prefix."options`.`option_name` = 'admin_style';

UPDATE `".$db_prefix."options` SET `option_value` = '2' WHERE `".$db_prefix."options`.`option_name` = 'tpl_sidenum';

UPDATE `".$db_prefix."options` SET `option_value` = 'a:5:{i:0;s:8:\"calendar\";i:1;s:7:\"archive\";i:2;s:7:\"newcomm\";i:3;s:4:\"link\";i:4;s:6:\"search\";}' WHERE `".$db_prefix."options`.`option_name` = 'widgets1';

UPDATE `".$db_prefix."options` SET `option_value` = 'a:5:{i:0;s:8:\"calendar\";i:1;s:7:\"archive\";i:2;s:7:\"newcomm\";i:3;s:4:\"link\";i:4;s:6:\"search\";}' WHERE `".$db_prefix."options`.`option_name` = 'widgets2';

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('txprotect','n');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('detect_url','n');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('avatar_cache','n');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('language','".EMLOG_LANGUAGES."');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('register_open','n');


INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('webscan_log','0');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('webscan','n');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('admin_sider','pimary-color-red');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('admin_editor','1');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('full_screen','y');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('preloader','y');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('filter_xss','y');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('responsive','y');

INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('scrollable','y');

ALTER TABLE `".$db_prefix."link` ADD `sitepic` VARCHAR(255) NOT NULL AFTER `description`, ADD `linksortid` INT(10) NOT NULL AFTER `sitepic`;


DROP TABLE IF EXISTS {$db_prefix}sortlink;
CREATE TABLE {$db_prefix}sortlink (
  linksort_id int(10) unsigned NOT NULL auto_increment,
  linksort_name varchar(255) NOT NULL default '',
  taxis int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (linksort_id)
);
INSERT INTO {$db_prefix}sortlink (linksort_id, linksort_name, taxis) VALUES (1, '".langs('_sortlink')."', 0);


ALTER TABLE `".$db_prefix."user` ADD `website` VARCHAR(255) NOT NULL AFTER `description`;

ALTER TABLE `".$db_prefix."user` ADD `getpasstime` int(10) NOT NULL default '0' AFTER `website`;
	
";




$array_sql = preg_split("/;[\r\n]/", $sql);
	foreach($array_sql as $sql)
	{
		$sql = trim($sql);
		if ($sql) {
			$DB->query($sql);
		}
	}

	@unlink('./content/cache/comment');
	@unlink('./content/cache/link');
	@unlink('./content/cache/logalias');
	@unlink('./content/cache/logatts');
	@unlink('./content/cache/logsort');
	@unlink('./content/cache/logtags');
	@unlink('./content/cache/newlog');
	@unlink('./content/cache/newtw');
	@unlink('./content/cache/options');
	@unlink('./content/cache/record');
	@unlink('./content/cache/sort');
	@unlink('./content/cache/sta');
	@unlink('./content/cache/tags');
	@unlink('./content/cache/user');

	$CACHE->updateCache();

	@unlink('./install.php');
	@unlink('./update.php');
	emMsg(langs('update_succes'));
}
echo "</body>";
echo "</html>";
?>