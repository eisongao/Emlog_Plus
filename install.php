<?php
/**
 * 安装程序
 * @copyright (c) Emlog All Rights Reserved
 */

define('EMLOG_ROOT', dirname(__FILE__));
define('DEL_INSTALLER', 1);
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
 * 显示404错误页面
 * 
 */
function show_404_page() {
	if (is_file(TEMPLATE_PATH . '404.php')) {
		header("HTTP/1.1 404 Not Found");
		include View::getView('404');
		exit;
	} else {
		emMsg('404', BLOG_URL);
	}
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

header('Content-Type: text/html; charset=UTF-8');
doStripslashes();

$act = isset($_GET['action'])? $_GET['action'] : '';

if (PHP_VERSION < '5.0'){
    emMsg(langs('php5_required'));
}

if(!$act){
?>
<html dir="<?php echo EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Emlog</title>
<style type="text/css">
<!--
body {background-color:#F7F7F7;font-family: Arial;font-size: 12px;line-height:150%;}
.main {background-color:#FFFFFF;font-size: 12px;color: #666666;width:750px;margin:30px auto;padding:10px;list-style:none;border:#DFDFDF 1px solid; border-radius: 4px;}
.logo{background:url(admin/views/images/logo.gif) no-repeat center;padding:30px 0px 30px 0px;margin:30px 0px;}
.title{text-align:center; font-size: 14px;}
.input {border: 1px solid #CCCCCC;font-family: Arial;font-size: 18px;height:28px;background-color:#F7F7F7;color: #666666;margin:0px 0px 0px 25px;}
.submit{cursor: pointer;font-size: 12px;padding: 4px 10px;}
.care{color:#0066CC;}
.title2{font-size:18px;color:#666666;border-bottom: #CCCCCC 1px solid; margin:40px 0px 20px 0px;padding:10px 0px;}
.foot{text-align:center;}
.main li{ margin:20px 0px;}
-->
</style>
<script>
<!--
function selectLang(obj) {
    window.open("install.php?lang=" + obj.value,"_self");
}
-->
</script>
</head>
<body>
<form name="form1" method="post" action="install.php?action=install">
<div class="main">
<p class="logo"></p>
<p class="title">Emlog <?php echo Option::EMLOG_VERSION ?> <?php echo langs('installation')?></p>
<p style="text-align:center">
<select name="lang" onChange="selectLang(this);" > 
<option value="0"><?php echo langs('choose_lang')?></option> 
<option value="cn"  <?php echo EMLOG_LANGUAGES == 'cn' ? 'selected' : '' ?>><?php echo langs('chinese')?></option> 
<option value="en" <?php echo EMLOG_LANGUAGES == 'en' ? 'selected' : ''  ?>><?php echo langs('english')?></option> 
</select> 
</p>
<div class="b">
<p class="title2"><?php echo  langs('mysql_settings')?></p>
<li>
	<?php echo langs('db_hostname')?>： <br />
    <input name="hostname" type="text" class="input" value="localhost">
	<span class="care"><?php echo langs('db_hostname_info')?></span>
</li>
<li>
    <?php echo langs('db_user')?>：<br /><input name="dbuser" type="text" class="input" value="">
</li>
<li>
    <?php echo langs('db_password')?>：<br /><input name="password" type="password" class="input">
</li>
<li>
    <?php echo langs('db_name')?>：<br />
      <input name="dbname" type="text" class="input" value="">
	  <span class="care"><?php echo langs('db_name_info')?></span>
</li>
<li>
    <?php echo langs('db_prefix')?>：<br />
  <input name="dbprefix" type="text" class="input" value="emlog_">
  <span class="care"> <?php echo langs('db_prefix_info')?></span>
</li>
</div>
<div class="c">
<p class="title2"><?php echo langs('admin_settings')?></p>
<li>
<?php echo langs('admin_name')?>：<br />
<input name="admin" type="text" class="input">
</li>
<li>
<?php echo langs('admin_password')?>：<br />
<input name="adminpw" type="password" class="input">
<span class="care"><?php echo langs('admin_password_info')?></span>
</li>
<li>
<?php echo langs('admin_password_repeat')?>：<br />
<input name="adminpw2" type="password" class="input">
</li>
</div>
<div>
<p class="foot">
<input type="submit" class="submit" value="<?php echo langs('install_emlog')?>">
</p>
</div>
</div>
</form>
</body>
</html>
<?php
}
if($act == 'install' || $act == 'reinstall'){
	$db_host = isset($_POST['hostname']) ? addslashes(trim($_POST['hostname'])) : '';
	$db_user = isset($_POST['dbuser']) ? addslashes(trim($_POST['dbuser'])) : '';
	$db_pw = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
	$db_name = isset($_POST['dbname']) ? addslashes(trim($_POST['dbname'])) : '';
	$db_prefix = isset($_POST['dbprefix']) ? addslashes(trim($_POST['dbprefix'])) : '';
	$admin = isset($_POST['admin']) ? addslashes(trim($_POST['admin'])) : '';
	$adminpw = isset($_POST['adminpw']) ? addslashes(trim($_POST['adminpw'])) : '';
	$adminpw2 = isset($_POST['adminpw2']) ? addslashes(trim($_POST['adminpw2'])) : '';
	$result = '';

	if($db_prefix == ''){
		emMsg(langs('db_prefix_empty'));
	}elseif(!preg_match("/^[\w_]+_$/",$db_prefix)){
		emMsg(langs('db_prefix_invalid'));
	}elseif($admin == '' || $adminpw == ''){
		emMsg(langs('username_password_empty'));
	}elseif(strlen($adminpw) < 6){
		emMsg(langs('password_short'));
	}elseif($adminpw!=$adminpw2)	 {
		emMsg(langs('password_not_equal'));
	}

	//初始化数据库类
	define('DB_HOST',   $db_host);
	define('DB_USER',   $db_user);
	define('DB_PASSWD', $db_pw);
	define('DB_NAME',   $db_name);
	define('DB_PREFIX', $db_prefix);

	$DB = Database::getInstance();
	$CACHE = Cache::getInstance();

	if($act != 'reinstall' && $DB->num_rows($DB->query("SHOW TABLES LIKE '{$db_prefix}blog'")) == 1){
$langs = EMLOG_LANGUAGES;
$dir  = EMLOG_LANGUAGE_DIR;
$already =langs('already_installed');
$continue=langs('continue');
$return=langs('return');
echo <<<EOT
<!DOCTYPE html>
<html dir="$dir" lang="$langs">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>emlog system message</title>
<style type="text/css">
<!--
body {background-color:#F7F7F7;font-family: Arial;font-size: 12px;line-height:150%;}
.main {background-color:#FFFFFF;font-size: 12px;color: #666666;width:750px;margin:10px auto;padding:10px;list-style:none;border:#DFDFDF 1px solid;}
.main p {line-height: 18px;margin: 5px 20px;}
-->
</style>
</head><body>
<form name="form1" method="post" action="install.php?action=reinstall">
<div class="main">
	<input name="hostname" type="hidden" class="input" value="$db_host">
	<input name="dbuser" type="hidden" class="input" value="$db_user">
	<input name="password" type="hidden" class="input" value="$db_pw">
	<input name="dbname" type="hidden" class="input" value="$db_name">
	<input name="dbprefix" type="hidden" class="input" value="$db_prefix">
	<input name="admin" type="hidden" class="input" value="$admin">
	<input name="adminpw" type="hidden" class="input" value="$adminpw">
	<input name="adminpw2" type="hidden" class="input" value="$adminpw2">
<p>
$already
<input type="submit" value="$continue">
</p>
<p><a href="javascript:history.back(-1);">$return</a></p>
</div>
</form>
</body>
</html>
EOT;
		exit;
	}

	if(!is_writable('config.php')){
		emMsg(langs('config_not_writable'));
	}
	if(!is_writable(EMLOG_ROOT.'/content/cache')){
		emMsg(langs('cache_not_writable'));
	}
	$config = "<?php\n"
	."//mysql database address\n"
	."define('DB_HOST','$db_host');"
	."\n//mysql database user\n"
	."define('DB_USER','$db_user');"
	."\n//database password\n"
	."define('DB_PASSWD','$db_pw');"
	."\n//database name\n"
	."define('DB_NAME','$db_name');"
	."\n//database prefix\n"
	."define('DB_PREFIX','$db_prefix');"
	."\n//auth key\n"
	."define('AUTH_KEY','".getRandStr(32).md5($_SERVER['HTTP_USER_AGENT'])."');"
	."\n//cookie name\n"
	."define('AUTH_COOKIE_NAME','EM_AUTHCOOKIE_".getRandStr(32,false)."');"
	."\n";

	$fp = @fopen('config.php', 'w');
	$fw = @fwrite($fp, $config);
	if (!$fw){
		emMsg(langs('config_not_writable'));
	}
	fclose($fp);

	//密码加密存储
	$PHPASS = new PasswordHash(8, true);
	$adminpw = $PHPASS->HashPassword($adminpw);

	$dbcharset = 'utf8';
	$type = 'MYISAM';
	$table_charset_sql = $DB->getMysqlVersion() > '4.1' ? 'ENGINE='.$type.' DEFAULT CHARSET='.$dbcharset.';' : 'ENGINE='.$type.';';
    if ($DB->getMysqlVersion() > '4.1' ){
        $DB->query("ALTER DATABASE `{$db_name}` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;", true);
    }

    $widgets = Option::getWidgetTitle();
    $sider_wg = Option::getDefWidget();

	$widget_title = serialize($widgets);
	$widgets = serialize($sider_wg);

	define('BLOG_URL', realUrl());

	$sql = "
DROP TABLE IF EXISTS {$db_prefix}blog;
CREATE TABLE {$db_prefix}blog (
  gid int(10) unsigned NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  date bigint(20) NOT NULL,
  content longtext NOT NULL,
  excerpt longtext NOT NULL,
  thumbs varchar(255) NOT NULL default '',
  alias VARCHAR(200) NOT NULL DEFAULT '',
  author int(10) NOT NULL default '1',
  sortid int(10) NOT NULL default '-1',
  type varchar(20) NOT NULL default 'blog',
  views int(10) unsigned NOT NULL default '0',
  comnum int(10) unsigned NOT NULL default '0',
  attnum int(10) unsigned NOT NULL default '0',
  top enum('n','y') NOT NULL default 'n',
  sortop enum('n','y') NOT NULL default 'n',
  hide enum('n','y') NOT NULL default 'n',
  checked enum('n','y') NOT NULL default 'y',
  allow_remark enum('n','y') NOT NULL default 'y',
  password varchar(255) NOT NULL default '',
  template varchar(255) NOT NULL default '',
  PRIMARY KEY  (gid),
  KEY date (date),
  KEY author (author),
  KEY sortid (sortid),
  KEY type (type),
  KEY views (views),
  KEY comnum (comnum),
  KEY hide (hide)
)".$table_charset_sql."
INSERT INTO {$db_prefix}blog (gid,title,date,content,excerpt,thumbs,author,views,comnum,attnum,top,sortop,hide,allow_remark,password) VALUES (1, '".langs('emlog_welcome')."', '".time()."', '".langs('emlog_install_congratulation')."','','',1, 0, 0,'','n', 'n', 'n', 'y', '');
DROP TABLE IF EXISTS {$db_prefix}attachment;
CREATE TABLE {$db_prefix}attachment (
  aid int(10) unsigned NOT NULL auto_increment,
  blogid int(10) unsigned NOT NULL default '0',
  filename varchar(255) NOT NULL default '',
  filesize int(10) NOT NULL default '0',
  filepath varchar(255) NOT NULL default '',
  addtime bigint(20) NOT NULL default '0',
  width int(10) NOT NULL default '0',
  height int(10) NOT NULL default '0',
  mimetype varchar(40) NOT NULL default '',
  thumfor int(10) NOT NULL default 0,
  PRIMARY KEY  (aid),
  KEY blogid (blogid)
)".$table_charset_sql."
DROP TABLE IF EXISTS {$db_prefix}comment;
CREATE TABLE {$db_prefix}comment (
  cid int(10) unsigned NOT NULL auto_increment,
  gid int(10) unsigned NOT NULL default '0',
  pid int(10) unsigned NOT NULL default '0',
  date bigint(20) NOT NULL,
  poster varchar(20) NOT NULL default '',
  comment text NOT NULL,
  mail varchar(60) NOT NULL default '',
  url varchar(75) NOT NULL default '',
  ip varchar(128) NOT NULL default '',
  hide enum('n','y') NOT NULL default 'n',
  useragent varchar(128) NOT NULL default '',
  PRIMARY KEY  (cid),
  KEY gid (gid),
  KEY date (date),
  KEY hide (hide)
)".$table_charset_sql."
DROP TABLE IF EXISTS {$db_prefix}options;
CREATE TABLE {$db_prefix}options (
option_id INT( 11 ) UNSIGNED NOT NULL auto_increment,
option_name VARCHAR( 255 ) NOT NULL ,
option_value LONGTEXT NOT NULL ,
PRIMARY KEY (option_id),
KEY option_name (option_name)
)".$table_charset_sql."
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('blogname','".langs('my_blog')."');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('bloginfo','".langs('emlog_powered')."');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('site_title','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('site_description','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('site_key','emlog');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('log_title_style','0');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('blogurl','".BLOG_URL."');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('icp','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('footer_info','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('admin_perpage_num','15');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('rss_output_num','0');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('rss_output_fulltext','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_lognum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_comnum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_twnum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_newtwnum','5');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_newlognum','5');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_randlognum','5');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('index_hotlognum','5');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_subnum','20');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('nonce_templet','default');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('admin_style','1');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('tpl_sidenum','2');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_code','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_needchinese','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_interval',60);
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isgravatar','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isthumbnail','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('att_maxsize','20480');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('att_type','rar,zip,gif,jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('att_imgmaxw','420');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('att_imgmaxh','460');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_paging','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_pnum','10');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('comment_order','newer');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('login_code','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('reply_code','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('iscomment','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('ischkcomment','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('ischkreply','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isurlrewrite','0');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isalias','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isalias_html','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isgzipenable','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isxmlrpcenable','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('ismobile','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('isexcerpt','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('excerpt_subnum','300');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('istwitter','y');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('istreply','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('topimg','content/templates/default/images/top/default.jpg');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('custom_topimgs','a:0:{}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('timezone','Asia/Shanghai');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('active_plugins','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widget_title','$widget_title');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('custom_widget','a:0:{}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets1','a:5:{i:0;s:8:\"calendar\";i:1;s:7:\"archive\";i:2;s:7:\"newcomm\";i:3;s:4:\"link\";i:4;s:6:\"search\";}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets2','a:5:{i:0;s:8:\"calendar\";i:1;s:7:\"archive\";i:2;s:7:\"newcomm\";i:3;s:4:\"link\";i:4;s:6:\"search\";}');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets3','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('widgets4','');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('detect_url','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('txprotect','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('avatar_cache','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('language','".EMLOG_LANGUAGES."');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('register_open','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('webscan_log','0');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('webscan','n');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('admin_sider','pimary-color-red');
INSERT INTO {$db_prefix}options (option_name, option_value) VALUES ('admin_editor','1');
DROP TABLE IF EXISTS {$db_prefix}link;
CREATE TABLE {$db_prefix}link (
  id int(10) unsigned NOT NULL auto_increment,
  sitename varchar(30) NOT NULL default '',
  siteurl varchar(75) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  sitepic varchar(255) NOT NULL default '',
  linksortid int(10) unsigned NOT NULL default '0',
  hide enum('n','y') NOT NULL default 'n',
  taxis int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (id)
)".$table_charset_sql."
INSERT INTO {$db_prefix}link (id, sitename, siteurl, description,sitepic,linksortid, taxis) VALUES (1, 'emlog', 'http://www.emlog.net', '".langs('emlog_official_site')."','',0,0);
DROP TABLE IF EXISTS {$db_prefix}sortlink;
CREATE TABLE {$db_prefix}sortlink (
  linksort_id int(10) unsigned NOT NULL auto_increment,
  linksort_name varchar(255) NOT NULL default '',
  taxis int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (linksort_id)
)".$table_charset_sql."
INSERT INTO {$db_prefix}sortlink (linksort_id, linksort_name, taxis) VALUES (1, '".langs('_sortlink')."', 0);
DROP TABLE IF EXISTS {$db_prefix}navi;
CREATE TABLE {$db_prefix}navi (
  id int(10) unsigned NOT NULL auto_increment,
  naviname varchar(30) NOT NULL default '',
  url varchar(75) NOT NULL default '',
  newtab enum('n','y') NOT NULL default 'n',
  hide enum('n','y') NOT NULL default 'n',
  taxis int(10) unsigned NOT NULL default '0',
  pid int(10) unsigned NOT NULL default '0',
  isdefault enum('n','y') NOT NULL default 'n',
  type tinyint(3) unsigned NOT NULL default '0',
  type_id int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (id)
)".$table_charset_sql."
INSERT INTO {$db_prefix}navi (id, naviname, url, taxis, isdefault, type) VALUES (1, '".langs('home')."', '', 1, 'y', 1);
INSERT INTO {$db_prefix}navi (id, naviname, url, taxis, isdefault, type) VALUES (2, '".langs('twits')."', 't', 2, 'y', 2);
INSERT INTO {$db_prefix}navi (id, naviname, url, taxis, isdefault, type) VALUES (3, '".langs('login')."', 'admin', 3, 'y', 3);
DROP TABLE IF EXISTS {$db_prefix}tag;
CREATE TABLE {$db_prefix}tag (
  tid int(10) unsigned NOT NULL auto_increment,
  tagname varchar(60) NOT NULL default '',
  gid text NOT NULL,
  PRIMARY KEY  (tid),
  KEY tagname (tagname)
)".$table_charset_sql."
DROP TABLE IF EXISTS {$db_prefix}sort;
CREATE TABLE {$db_prefix}sort (
  sid int(10) unsigned NOT NULL auto_increment,
  sortname varchar(255) NOT NULL default '',
  alias VARCHAR(200) NOT NULL DEFAULT '',
  taxis int(10) unsigned NOT NULL default '0',
  pid int(10) unsigned NOT NULL default '0',
  description text NOT NULL,
  template varchar(255) NOT NULL default '',
  PRIMARY KEY  (sid)
)".$table_charset_sql."
DROP TABLE IF EXISTS {$db_prefix}twitter;
CREATE TABLE {$db_prefix}twitter (
id INT NOT NULL AUTO_INCREMENT,
content text NOT NULL,
img varchar(200) DEFAULT NULL,
author int(10) NOT NULL default '1',
date bigint(20) NOT NULL,
replynum int(10) unsigned NOT NULL default '0',
PRIMARY KEY (id),
KEY author (author)
)".$table_charset_sql."
INSERT INTO {$db_prefix}twitter (id, content, img, author, date, replynum) VALUES (1, '".langs('test_tweet')."', '', 1, '".time()."', 0);
DROP TABLE IF EXISTS {$db_prefix}reply;
CREATE TABLE {$db_prefix}reply (
  id int(10) unsigned NOT NULL auto_increment,
  tid int(10) unsigned NOT NULL default '0',
  date bigint(20) NOT NULL,
  name varchar(20) NOT NULL default '',
  content text NOT NULL,
  hide enum('n','y') NOT NULL default 'n',
  ip varchar(128) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY gid (tid),
  KEY hide (hide)
)".$table_charset_sql."
DROP TABLE IF EXISTS {$db_prefix}user;
CREATE TABLE {$db_prefix}user (
  uid int(10) unsigned NOT NULL auto_increment,
  username varchar(32) NOT NULL default '',
  password varchar(64) NOT NULL default '',
  nickname varchar(20) NOT NULL default '',
  role varchar(60) NOT NULL default '',
  ischeck enum('n','y') NOT NULL default 'n',
  photo varchar(255) NOT NULL default '',
  email varchar(60) NOT NULL default '',
  description varchar(255) NOT NULL default '',
  website varchar(75) NOT NULL default '',
PRIMARY KEY  (uid),
KEY username (username)
)".$table_charset_sql."
INSERT INTO {$db_prefix}user (uid, username, password, role) VALUES (1,'$admin','".$adminpw."','admin');";

	$array_sql = preg_split("/;[\r\n]/", $sql);
	foreach($array_sql as $sql){
		$sql = trim($sql);
		if ($sql){
			$DB->query($sql);
		}
	}
	//重建缓存
	$CACHE->updateCache();
	
	$result .= "
		 <p style=\"font-size:24px; border-bottom:1px solid #E6E6E6; padding:10px 0px;\">".langs('emlog_installed')."</p>
        <p>".langs('emlog_installed_info')."</p>
        <p><b>".langs('user_name')."</b>: {$admin}</p>
        <p><b>".langs('password')."</b>: ".langs('password_entered')."</p>";
    if (DEL_INSTALLER === 1 && !@unlink('./install.php') || DEL_INSTALLER === 0) {
$result .= '<p style="color:red;margin:10px 20px;">'.langs('delete_install').'</p> ';
    }
$result .= "<p style=\"text-align:right;\"><a href=\"./\">".langs('go_to_front')."</a> | <a href=\"./admin/\">".langs('go_to_admincp')."</a></p>";
    emMsg($result, 'none');
}
?>