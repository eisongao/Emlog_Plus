<?php
/**
 * 微语
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';
$Twitter_Model = new Twitter_Model();
if ($action == '') {
	$Reply_Model = new Reply_Model();
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$tws = $Twitter_Model->getTwitters($page,1);
	$twnum = $Twitter_Model->getTwitterNum(1);
	$pageurl =  pagination($twnum, Option::get('admin_perpage_num'), $page, 'twitter.php?page=');
	$avatar = empty($user_cache[UID]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[UID]['avatar'];
	include View::getView('header');
	require_once View::getView('twitter');
	include View::getView('footer');
	View::output();
}
// 发布微语.
if ($action == 'post') {
	$t = isset($_POST['t']) ? addslashes(trim($_POST['t'])) : '';
	$img = isset($_POST['img']) ? addslashes(trim($_POST['img'])) : '';

    LoginAuth::checkToken();

	if ($img && !$t) {
		$t = langs('image_share');
	}

	if (!$t) {
		emDirect("twitter.php?error_a=1");
	}

	$tdata = array('content' => $Twitter_Model->formatTwitter($t),
			'author' => UID,
			'date' => time(),
			'img' => str_replace('../', '', $img)
	);

	$twid = $Twitter_Model->addTwitter($tdata);
	$CACHE->updateCache(array('sta','newtw'));
	doAction('post_twitter', $t, $twid);
	emDirect("twitter.php?active_t=1");
}
// 删除微语.
if ($action == 'del') {
    LoginAuth::checkToken();
	$id = isset($_GET['id']) ? intval($_GET['id']) : '';
	$Twitter_Model->delTwitter($id);
	$CACHE->updateCache(array('sta','newtw'));
	emDirect("twitter.php?active_del=1");
}

// 删除回复.

if ($action == 'delreply') {

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$tid = isset($_GET['tid']) ? intval($_GET['tid']) : null;

$db=Database::getInstance();

echo '<script>alert("'.langs('delete_success').'");location.href = document.referrer;</script>';

$sql = " DELETE FROM `".DB_PREFIX."reply` WHERE `id` = '$id' and `tid`= '$tid' ";

$db -> query($sql);

$Reply_Model = new Reply_Model();

$Twitter_Model->updateReplyNum($tid, '-1');

}

// 隐藏回复.

if ($action == 'hidereply') {

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$tid = isset($_GET['tid']) ? intval($_GET['tid']) : null;

$db=Database::getInstance();

echo '<script>alert("'.langs('hide_success').'");location.href = document.referrer;</script>';

$sql = "UPDATE `".DB_PREFIX."reply` SET  `hide` = 'y'  WHERE `id` = '$id' ";

$db -> query($sql);

$Reply_Model = new Reply_Model();

$Twitter_Model->updateReplyNum($tid, '-1');

}

// 审核回复.

if ($action == 'pubreply') {

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$tid = isset($_GET['tid']) ? intval($_GET['tid']) : null;

$db=Database::getInstance();

echo '<script>alert("'.langs('approve_success').'");location.href = document.referrer;</script>';

$sql = "UPDATE `".DB_PREFIX."reply` SET  `hide` = 'n'  WHERE `id` = '$id' ";

$db -> query($sql);

$Reply_Model = new Reply_Model();

$Twitter_Model->updateReplyNum($tid, '+1');

}

// 回复微语.

if ($action == 'reply') {

$r = isset($_GET['r']) ? addslashes(trim($_GET['r'])) : null;

$tid = isset($_GET['tid']) ? intval($_GET['tid']) : null;

$date = time();

$name =  $user_cache[UID]['name'];

$db=Database::getInstance();

echo '<script>alert("'.langs('reply_success').'");location.href = document.referrer;</script>';

$sql = " INSERT INTO `".DB_PREFIX."reply` ( `date`,`name`,`content`,`tid`) VALUES ( '$date','$name','$r','$tid')";

$db -> query($sql);

$Reply_Model = new Reply_Model();

$Twitter_Model->updateReplyNum($tid, '+1');

$CACHE->updateCache('sta');

}
