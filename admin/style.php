<?php
/**
 * 基本设置
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

if ($action == '') {


	include View::getView('header');
	require_once(View::getView('style'));
	include View::getView('footer');
	View::output();
}

//update
if ($action == 'usestyle') {
    LoginAuth::checkToken();
  $styleName = intval($_POST['styles']);
  $styleSider = isset($_POST['sider']) ? strval($_POST['sider']) : '';
    $styleEditor = isset($_POST['editor']) ? strval($_POST['editor']) : '';

	Option::updateOption('admin_editor', $styleEditor);
	Option::updateOption('admin_style', $styleName);
	Option::updateOption('admin_sider', $styleSider);
	$CACHE->updateCache('options');
	echo '<script>alert("'.langs('set_ok').'");location.href = document.referrer;</script>';
	
}
