<?php
/**
 * 基本设置
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';
$options_cache = $CACHE->updateCache('options');
if ($action == '') {
	$options_cache = $CACHE->readCache('options');
	extract($options_cache);
	$conf_login_code = $login_code == 'y' ? 'checked="checked"' : '';
	$conf_comment_code = $comment_code == 'y' ? 'checked="checked"' : '';
	$conf_comment_needchinese = $comment_needchinese == 'y' ? 'checked="checked"' : '';
	$conf_iscomment = $iscomment == 'y' ? 'checked="checked"' : '';
	$conf_ischkcomment = $ischkcomment == 'y' ? 'checked="checked"' : '';
	$conf_ismobile = $ismobile == 'y' ? 'checked="checked"' : '';
    $conf_isexcerpt = $isexcerpt == 'y' ? 'checked="checked"' : '';
	$conf_isthumbnail = $isthumbnail == 'y' ? 'checked="checked"' : '';
	$conf_isgzipenable = $isgzipenable == 'y' ? 'checked="checked"' : '';
	$conf_isxmlrpcenable = $isxmlrpcenable == 'y' ? 'checked="checked"' : '';
	$conf_isgravatar = $isgravatar == 'y' ? 'checked="checked"' : '';
	$conf_comment_paging = $comment_paging == 'y' ? 'checked="checked"' : '';
	$conf_istwitter = $istwitter == 'y' ? 'checked="checked"' : '';
	$conf_istreply = $istreply == 'y' ? 'checked="checked"' : '';
	$conf_reply_code = $reply_code == 'y' ? 'checked="checked"' : '';
	$conf_ischkreply = $ischkreply == 'y' ? 'checked="checked"' : '';
	 $conf_txprotect = $txprotect == 'y' ? 'checked="checked"' : '';
  $conf_detect_url = $detect_url == 'y' ? 'checked="checked"' : '';
  $conf_avatar_cache = $avatar_cache == 'y' ? 'checked="checked"' : '';  	
    $conf_register_open = $register_open == 'y' ? 'checked="checked"' : '';  	
   $conf_webscan = $webscan == 'y' ? 'checked="checked"' : '';
   $conf_filter_xss = $filter_xss == 'y' ? 'checked="checked"' : '';

	$ex1 = $ex2 = $ex3 = $ex4 = '';
	if ($rss_output_fulltext == 'y') {
		$ex1 = 'selected="selected"';
	} else {
	 	$ex2 = 'selected="selected"';
	}
	if ($comment_order == 'newer') {
		$ex3 = 'selected="selected"';
	} else {
	 	$ex4 = 'selected="selected"';
	}

	$tzlist = array(
    'Etc/GMT'		=>	langs('Etc/GMT'),
        'Africa/Casablanca'	=>	langs('Africa/Casablanca'),
        'Atlantic/Reykjavik'	=>	langs('Atlantic/Reykjavik'),
        'Europe/London'		=>	langs('Europe/London'),
        'Africa/Lagos'		=>	langs('Africa/Lagos'),
        'Europe/Paris'		=>	langs('Europe/Paris'),
        'Africa/Windhoek'	=>	langs('Africa/Windhoek'),
        'Europe/Warsaw'		=>	langs('Europe/Warsaw'),
        'Europe/Budapest'	=>	langs('Europe/Budapest'),
        'Europe/Berlin'		=>	langs('Europe/Berlin'),
        'Europe/Istanbul'	=>	langs('Europe/Istanbul'),
        'Europe/Kaliningrad'	=>	langs('Europe/Kaliningrad'),
        'Africa/Johannesburg'	=>	langs('Africa/Johannesburg'),
        'Asia/Damascus'		=>	langs('Asia/Damascus'),
        'Asia/Amman'		=>	langs('Asia/Amman'),
        'Africa/Cairo'		=>	langs('Africa/Cairo'),
        'Africa/Tripoli'	=>	langs('Africa/Tripoli'),
        'Asia/Jerusalem'	=>	langs('Asia/Jerusalem'),
        'Asia/Beirut'		=>	langs('Asia/Beirut'),
        'Europe/Kiev'		=>	langs('Europe/Kiev'),
        'Europe/Bucharest'	=>	langs('Europe/Bucharest'),
        'Africa/Nairobi'	=>	langs('Africa/Nairobi'),
        'Asia/Baghdad'		=>	langs('Asia/Baghdad'),
        'Europe/Minsk'		=>	langs('Europe/Minsk'),
        'Asia/Riyadh'		=>	langs('Asia/Riyadh'),
        'Europe/Moscow'		=>	langs('Europe/Moscow'),
        'Asia/Tehran'		=>	langs('Asia/Tehran'),
        'Europe/Samara'		=>	langs('Europe/Samara'),
        'Asia/Yerevan'		=>	langs('Asia/Yerevan'),
        'Asia/Baku'		=>	langs('Asia/Baku'),
        'Asia/Tbilisi'		=>	langs('Asia/Tbilisi'),
        'Indian/Mauritius'	=>	langs('Indian/Mauritius'),
        'Asia/Dubai'		=>	langs('Asia/Dubai'),
        'Asia/Kabul'		=>	langs('Asia/Kabul'),
        'Asia/Karachi'		=>	langs('Asia/Karachi'),
        'Asia/Yekaterinburg'	=>	langs('Asia/Yekaterinburg'),
        'Asia/Tashkent'		=>	langs('Asia/Tashkent'),
        'Asia/Colombo'		=>	langs('Asia/Colombo'),
        'Asia/Calcutta'		=>	langs('Asia/Calcutta'),
        'Asia/Katmandu'		=>	langs('Asia/Katmandu'),
        'Asia/Novosibirsk'	=>	langs('Asia/Novosibirsk'),
        'Asia/Dhaka'		=>	langs('Asia/Dhaka'),
        'Asia/Almaty'		=>	langs('Asia/Almaty'),
        'Asia/Rangoon'		=>	langs('Asia/Rangoon'),
        'Asia/Krasnoyarsk'	=>	langs('Asia/Krasnoyarsk'),
        'Asia/Bangkok'		=>	langs('Asia/Bangkok'),
        'Asia/Ulaanbaatar'	=>	langs('Asia/Ulaanbaatar'),
        'Asia/Irkutsk'		=>	langs('Asia/Irkutsk'),
        'Asia/Shanghai'		=>	langs('Asia/Shanghai'),
        'Asia/Taipei'		=>	langs('Asia/Taipei'),
        'Asia/Singapore'	=>	langs('Asia/Singapore'),
        'Australia/Perth'	=>	langs('Australia/Perth'),
        'Asia/Tokyo'		=>	langs('Asia/Tokyo'),
        'Asia/Yakutsk'		=>	langs('Asia/Yakutsk'),
        'Asia/Seoul'		=>	langs('Asia/Seoul'),
        'Australia/Darwin'	=>	langs('Australia/Darwin'),
        'Australia/Adelaide'	=>	langs('Australia/Adelaide'),
        'Pacific/Port_Moresby'	=>	langs('Pacific/Port_Moresby'),
        'Australia/Sydney'	=>	langs('Australia/Sydney'),
        'Australia/Brisbane'	=>	langs('Australia/Brisbane'),
        'Asia/Vladivostok'	=>	langs('Asia/Vladivostok'),
        'Australia/Hobart'	=>	langs('Australia/Hobart'),
        'Asia/Magadan'		=>	langs('Asia/Magadan'),
        'Asia/Srednekolymsk'	=>	langs('Asia/Srednekolymsk'),
        'Pacific/Guadalcanal'	=>	langs('Pacific/Guadalcanal'),
        'Etc/GMT-12'		=>	langs('Etc/GMT-12'),
        'Pacific/Auckland'	=>	langs('Pacific/Auckland'),
        'Pacific/Fiji'		=>	langs('Pacific/Fiji'),
        'Asia/Kamchatka'	=>	langs('Asia/Kamchatka'),
        'Pacific/Tongatapu'	=>	langs('Pacific/Tongatapu'),
        'Pacific/Apia'		=>	langs('Pacific/Apia'),
        'Pacific/Kiritimati'	=>	langs('Pacific/Kiritimati'),
        'Atlantic/Azores'	=>	langs('Atlantic/Azores'),
        'Atlantic/Cape_Verde'	=>	langs('Atlantic/Cape_Verde'),
        'Etc/GMT+2'		=>	langs('Etc/GMT+2'),
        'America/Cayenne'	=>	langs('America/Cayenne'),
        'America/Sao_Paulo'	=>	langs('America/Sao_Paulo'),
        'America/Buenos_Aires'	=>	langs('America/Buenos_Aires'),
        'America/Godthab'	=>	langs('America/Godthab'),
        'America/Bahia'		=>	langs('America/Bahia'),
        'America/Montevideo'	=>	langs('America/Montevideo'),
        'America/St_Johns'	=>	langs('America/St_Johns'),
        'America/La_Paz'	=>	langs('America/La_Paz'),
        'America/Asuncion'	=>	langs('America/Asuncion'),
        'America/Halifax'	=>	langs('America/Halifax'),
        'America/Cuiaba'	=>	langs('America/Cuiaba'),
        'America/Caracas'	=>	langs('America/Caracas'),
        'America/New_York'	=>	langs('America/New_York'),
        'America/Indianapolis'	=>	langs('America/Indianapolis'),
        'America/Bogota'	=>	langs('America/Bogota'),
        'America/Guatemala'	=>	langs('America/Guatemala'),
        'America/Chicago'	=>	langs('America/Chicago'),
        'America/Mexico_City'	=>	langs('America/Mexico_City'),
        'America/Regina'	=>	langs('America/Regina'),
        'America/Phoenix'	=>	langs('America/Phoenix'),
        'America/Chihuahua'	=>	langs('America/Chihuahua'),
        'America/Denver'	=>	langs('America/Denver'),
        'America/Santa_Isabel'	=>	langs('America/Santa_Isabel'),
        'America/Los_Angeles'	=>	langs('America/Los_Angeles'),
        'America/Anchorage'	=>	langs('America/Anchorage'),
        'Pacific/Honolulu'	=>	langs('Pacific/Honolulu'),
        'Etc/GMT+11'		=>	langs('Etc/GMT+11'),
        'Etc/GMT+12'		=>	langs('Etc/GMT+12'),
);	
	

	include View::getView('header');
	require_once(View::getView('configure'));
	include View::getView('footer');
	View::output();
}

if ($action == 'mod_config') {
    LoginAuth::checkToken();
	$getData = array(
	'blogname' => isset($_POST['blogname']) ? addslashes($_POST['blogname'])  : '',
	'blogurl' => isset($_POST['blogurl']) ? addslashes($_POST['blogurl']) : '',
	'bloginfo' => isset($_POST['bloginfo']) ? addslashes($_POST['bloginfo']) : '',
	'icp' => isset($_POST['icp']) ? addslashes($_POST['icp']):'',
	'footer_info' => isset($_POST['footer_info']) ? addslashes($_POST['footer_info']):'',
	'index_lognum' => isset($_POST['index_lognum']) ? intval($_POST['index_lognum']) : '',
	'timezone' => isset($_POST['timezone']) ? addslashes($_POST['timezone']) : '',
	'login_code'   => isset($_POST['login_code']) ? addslashes($_POST['login_code']) : 'n',
	'comment_code' => isset($_POST['comment_code']) ? addslashes($_POST['comment_code']) : 'n',
	'comment_needchinese' => isset($_POST['comment_needchinese']) ? addslashes($_POST['comment_needchinese']) : 'n',
	'comment_interval' => isset($_POST['comment_interval']) ? intval($_POST['comment_interval']) : 15,
	'iscomment' => isset($_POST['iscomment']) ? addslashes($_POST['iscomment']) : 'n',
	'ischkcomment' => isset($_POST['ischkcomment']) ? addslashes($_POST['ischkcomment']) : 'n',
	'isgzipenable' => isset($_POST['isgzipenable']) ? addslashes($_POST['isgzipenable']) : 'n',
	'isxmlrpcenable' => isset($_POST['isxmlrpcenable']) ? addslashes($_POST['isxmlrpcenable']) : 'n',
	'ismobile' => isset($_POST['ismobile']) ? addslashes($_POST['ismobile']) : 'n',
    'isexcerpt' => isset($_POST['isexcerpt']) ? addslashes($_POST['isexcerpt']) : 'n',
    'excerpt_subnum' => isset($_POST['excerpt_subnum']) ? intval($_POST['excerpt_subnum']) : '300',
	'isthumbnail' => isset($_POST['isthumbnail']) ? addslashes($_POST['isthumbnail']) : 'n',
	'rss_output_num' => isset($_POST['rss_output_num']) ? intval($_POST['rss_output_num']) : 10,
	'rss_output_fulltext' => isset($_POST['rss_output_fulltext']) ? addslashes($_POST['rss_output_fulltext']) : 'y',
	'isgravatar' => isset($_POST['isgravatar']) ? addslashes($_POST['isgravatar']) : 'n',
	'comment_paging' => isset($_POST['comment_paging']) ? addslashes($_POST['comment_paging']) : 'n',
	'comment_pnum' => isset($_POST['comment_pnum']) ? intval($_POST['comment_pnum']) : '',
	'comment_order' => isset($_POST['comment_order']) ? addslashes($_POST['comment_order']) : 'newer',
	'istwitter' => isset($_POST['istwitter']) ? addslashes($_POST['istwitter']) : 'n',
	'istreply' => isset($_POST['istreply']) ? addslashes($_POST['istreply']) : 'n',
	'ischkreply' => isset($_POST['ischkreply']) ? addslashes($_POST['ischkreply']) : 'n',
	'reply_code' => isset($_POST['reply_code']) ? addslashes($_POST['reply_code']) : 'n',
	'index_twnum' => isset($_POST['index_twnum']) ? intval($_POST['index_twnum']) : 10,
    'att_maxsize' => isset($_POST['att_maxsize']) ? intval($_POST['att_maxsize']) : 20480,
    'att_type' => isset($_POST['att_type']) ? str_replace('php', 'x', strtolower(addslashes($_POST['att_type']))) : '',
    'att_imgmaxw' => isset($_POST['att_imgmaxw']) ? intval($_POST['att_imgmaxw']) : 420,
    'att_imgmaxh' => isset($_POST['att_imgmaxh']) ? intval($_POST['att_imgmaxh']) : 460,
  'txprotect' => isset($_POST['txprotect']) ? addslashes($_POST['txprotect']) : 'n',
 'detect_url' => isset($_POST['detect_url']) ? addslashes($_POST['detect_url']) : 'n',  
  'avatar_cache' => isset($_POST['avatar_cache']) ? addslashes($_POST['avatar_cache']) : 'n',  
    'language' => isset($_POST['language']) ? addslashes($_POST['language']) : 'n',  
  'register_open' => isset($_POST['register_open']) ? addslashes($_POST['register_open']) : 'n',  
  'webscan' => isset($_POST['webscan']) ? addslashes($_POST['webscan']) : 'n',
    'filter_xss' => isset($_POST['filter_xss']) ? addslashes($_POST['filter_xss']) : 'n',

	);
	if ($getData['login_code'] == 'y' && !function_exists("imagecreate") && !function_exists('imagepng')) {		emMsg(langs('verification_code_not_supported'),"configure.php");
	}
	if ($getData['comment_code'] == 'y' && !function_exists("imagecreate") && !function_exists('imagepng')) {
emMsg(langs('verification_code_comment_not_supported'),"configure.php");
	}
	if ($getData['blogurl'] && substr($getData['blogurl'], -1) != '/') {
		$getData['blogurl'] .= '/';
	}
	if ($getData['blogurl'] && strncasecmp($getData['blogurl'],'http',4)) {
		$getData['blogurl'] = 'http://'.$getData['blogurl'];
	}

	foreach ($getData as $key => $val) {
		Option::updateOption($key, $val);
	}
	$CACHE->updateCache(array('tags', 'options', 'comment', 'record'));
	emDirect("./configure.php?activated=1");
}

if ($action == 'rest') {
    LoginAuth::checkToken();
    $db = Database::getInstance();
    $row=$db->once_fetch_array("SELECT * FROM `".DB_NAME."`.`".DB_PREFIX."options` WHERE `option_name` LIKE 'webscan_log'");
    $db->query("UPDATE `".DB_NAME."`.`".DB_PREFIX."options` SET option_value = '0' WHERE `option_name` LIKE 'webscan_log'");
  echo'<script>alert("'.langs('code_rest').'");location.href = document.referrer;</script>';
  $CACHE->updateCache();
}