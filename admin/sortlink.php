<?php
/**
 * 链接分类控制器
 * @copyright (c) JiangGle All Rights Reserved
 */

require_once 'globals.php';

$SortLink_Model = new SortLink_Model();
$sortlink = $CACHE->readCache('sortlink');
$CACHE->updateCache();

if ($action == '') {
	include View::getView('header');
	require_once View::getView('sortlink');
	include View::getView('footer');
	View::output();
}

if ($action == 'taxis') {
	$sortlink = isset($_POST['sortlink']) ? $_POST['sortlink'] : '';
	if (!empty($sortlink)) {
		foreach ($sortlink as $key=>$value) {
			$value = intval($value);
			$key = intval($key);
			$SortLink_Model->updateSortLink(array('taxis'=>$value), $key);
		}
		$CACHE->updateCache('sortlink');
		emDirect("./sortlink.php?active_taxis=1");
	} else{
		emDirect("./sortlink.php?error_b=1");
	}
}

if ($action== 'add') {
	$taxis = isset($_POST['taxis']) ? intval(trim($_POST['taxis'])) : 0;
	$linksort_name = isset($_POST['linksort_name']) ? addslashes(trim($_POST['linksort_name'])) : '';
	if (empty($linksort_name)) {
		emDirect("./sortlink.php?error_a=1");
	}
	$SortLink_Model->addSortLink($linksort_name, $taxis);
	$CACHE->updateCache('sortlink');
	emDirect("./sortlink.php?active_add=1");
}

if ($action== 'mod_sortlink') {
	$linksort_id = isset($_GET['linksort_id']) ? intval($_GET['linksort_id']) : '';
	$sortLinkData = $SortLink_Model->getOneSortLinkById($linksort_id);
	extract($sortLinkData);
	include View::getView('header');
	require_once(View::getView('sortlinkedit'));
	include View::getView('footer');
	View::output();
}

if ($action == 'update') {
	$linksort_id = isset($_POST['linksort_id']) ? intval($_POST['linksort_id']) : '';
    $linksort_name = isset($_POST['linksort_name']) ? addslashes(trim($_POST['linksort_name'])) : '';
	$sortlink_data = array();
	if (empty($linksort_name)) {
		emDirect("./sortlink.php?action=mod_sortlink&linksort_id={$linksort_id}&error_a=1");
	}
    $sortlink_data['linksort_name'] = $linksort_name;
	$SortLink_Model->updateSortLink($sortlink_data, $linksort_id);
	$CACHE->updateCache('sortlink');
	emDirect("./sortlink.php?active_edit=1");
}

if ($action == 'del') {
	$linksort_id = isset($_GET['linksort_id']) ? intval($_GET['linksort_id']) : '';
    LoginAuth::checkToken();
	$SortLink_Model->deleteSortLink($linksort_id);
	$CACHE->updateCache('sortlink');
	emDirect("./sortlink.php?active_del=1");
}