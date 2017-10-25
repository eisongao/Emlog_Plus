<?php
/**
 * 链接管理
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

$Link_Model = new Link_Model();
$SortLink_Model = new SortLink_Model();
$sortlink = $CACHE->readCache('sortlink');

if ($action == '') {
	$linksortid = isset($_GET['linksortid']) ? intval($_GET['linksortid']) : '';
	$keyword = isset($_GET['keyword']) ? addslashes($_GET['keyword']) : '';
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	$sqlSegment = '';
	if ($linksortid) {
		$sqlSegment = "WHERE linksortid=$linksortid";
	} elseif ($keyword) {
		$sqlSegment = "WHERE sitename like '%$keyword%'";
	}
	$linkNum = $Link_Model->getLinkNum($sqlSegment);
	$links = $Link_Model->getLinksForAdmin($sqlSegment, $page);
	$subPage = '';
	foreach ($_GET as $key=>$val) {
		$subPage .= $key != 'page' ? "&$key=$val" : '';
	}
	$pageurl =  pagination($linkNum, Option::get('admin_perpage_num'), $page, "link.php?{$subPage}&page=");
	include View::getView('header');
	require_once(View::getView('links'));
	include View::getView('footer');
	View::output();
}

if ($action== 'link_taxis') {
	$link = isset($_POST['link']) ? $_POST['link'] : '';
	$linksortid = isset($_POST['linksortid']) ? $_POST['linksortid'] : '';
	if (!empty($link)) {
		foreach ($link as $key=>$value) {
			$value = intval($value);
			$key = intval($key);
			$Link_Model->updateLink(array('taxis'=>$value), $key);
		}
		$CACHE->updateCache('link');
		emDirect("./link.php?linksortid=$linksortid&active_taxis=1");
	} else {
		emDirect("./link.php?linksortid=$linksortid&error_b=1");
	}
}

if ($action== 'addlink') {
	$taxis = isset($_POST['taxis']) ? intval(trim($_POST['taxis'])) : 0;
	$sitename = isset($_POST['sitename']) ? addslashes(trim($_POST['sitename'])) : '';
	$siteurl = isset($_POST['siteurl']) ? addslashes(trim($_POST['siteurl'])) : '';
    $sitepic = isset($_POST['sitepic']) ? addslashes(trim($_POST['sitepic'])) : '';
     $linksortid = isset($_POST['linksortid']) ? addslashes(trim($_POST['linksortid'])) : '';
	$description = isset($_POST['description']) ? addslashes(trim($_POST['description'])) : '';

	if ($sitename =='' || $siteurl =='') {
		emDirect("./link.php?error_a=1");
	}
	if (!preg_match("/^http|ftp.+$/i", $siteurl)) {
		$siteurl = 'http://'.$siteurl;
	}
	$Link_Model->addLink($sitename, $siteurl, $sitepic,$linksortid,$description, $taxis);
	$CACHE->updateCache('link');
	emDirect("./link.php?active_add=1");
}

if ($action== 'mod_link') {
	$linkId = isset($_GET['linkid']) ? intval($_GET['linkid']) : '';

	$linkData = $Link_Model->getOneLink($linkId);
	extract($linkData);

	include View::getView('header');
	require_once(View::getView('linkedit'));
	include View::getView('footer');View::output();
}

if ($action=='update_link') {
	$sitename = isset($_POST['sitename']) ? addslashes(trim($_POST['sitename'])) : '';
	$siteurl = isset($_POST['siteurl']) ? addslashes(trim($_POST['siteurl'])) : '';
      $sitepic = isset($_POST['sitepic']) ? addslashes(trim($_POST['sitepic'])) : '';
      $linksortid = isset($_POST['linksortid']) ? addslashes(trim($_POST['linksortid'])) : '';
	$description = isset($_POST['description']) ? addslashes(trim($_POST['description'])) : '';
	$linkId = isset($_POST['linkid']) ? intval($_POST['linkid']) : '';

	if (!preg_match("/^http|ftp.+$/i", $siteurl)) {
		$siteurl = 'http://'.$siteurl;
	}

	$Link_Model->updateLink(array('sitename'=>$sitename, 'siteurl'=>$siteurl, 'sitepic'=>$sitepic, 'linksortid'=>$linksortid, 'description'=>$description), $linkId);

	$CACHE->updateCache('link');
	$CACHE->updateCache('sortlink');
	emDirect("./link.php?active_edit=1");
}

if ($action == 'dellink') {
    LoginAuth::checkToken();
	$linkid = isset($_GET['linkid']) ? intval($_GET['linkid']) : '';
	$Link_Model->deleteLink($linkid);
	$CACHE->updateCache('link');
	emDirect("./link.php?active_del=1");
}

if ($action == 'hide') {
	$linkId = isset($_GET['linkid']) ? intval($_GET['linkid']) : '';

	$Link_Model->updateLink(array('hide'=>'y'), $linkId);

	$CACHE->updateCache('link');
	emDirect('./link.php');
}

if ($action == 'show') {
	$linkId = isset($_GET['linkid']) ? intval($_GET['linkid']) : '';

	$Link_Model->updateLink(array('hide'=>'n'), $linkId);

	$CACHE->updateCache('link');
	emDirect('./link.php');
}

if ($action == 'operate_link') {
	$operate = isset($_REQUEST['operate']) ? $_REQUEST['operate'] : '';
	$linkids = isset($_POST['linkids']) ? array_map('intval', $_POST['linkids']) : array();
	$linksort = isset($_POST['linksort']) ? intval($_POST['linksort']) : '';
	$linksortid = isset($_POST['linksortid']) ? $_POST['linksortid'] : '';
	
    LoginAuth::checkToken();

	if ($operate == '') {
		emDirect("./link.php?linksortid=$linksortid&error_select_b=1");
	}
	if (empty($linkids)) {
		emDirect("./link.php?linksortid=$linksortid&error_select_a=1");
	}

	switch ($operate) {
		case 'del':
			foreach ($linkids as $val)
			{
				$Link_Model->deleteLink($val);
			}
			$CACHE->updateCache();
			emDirect("./link.php?linksortid=$linksortid&active_del_select=1");
			break;
		case 'hide':
			foreach ($linkids as $val)
			{
				$Link_Model->hideSwitch($val, 'y');
			}
			$CACHE->updateCache();
			emDirect("./link.php?linksortid=$linksortid&active_hide_select=1");
			break;
		case 'show':
			foreach ($linkids as $val)
			{
				$Link_Model->hideSwitch($val, 'n');
			}
			$CACHE->updateCache();
			emDirect("./link.php?linksortid=$linksortid&active_show_select=1");
			break;
		case 'move':
			foreach ($linkids as $val)
			{
				$Link_Model->updateLink(array('linksortid'=>$linksort), $val);
			}
			$CACHE->updateCache();
			emDirect("./link.php?linksortid=$linksort&active_move_select=1");
			break;
	}
}