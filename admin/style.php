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

//后台样式
if ($action == 'usestyle') {
    LoginAuth::checkToken();
  $styleName = intval($_POST['styles']);
  $preloader_ =isset($_POST['preloader']) ? addslashes($_POST['preloader']) : 'n';
  $full_screen_ = isset($_POST['full_screen']) ? addslashes($_POST['full_screen']) : 'n';
  $styleSider = isset($_POST['sider']) ? strval($_POST['sider']) : '';
    $styleEditor = isset($_POST['editor']) ? strval($_POST['editor']) : '';
  $responsive_ =isset($_POST['responsive']) ? addslashes($_POST['responsive']) : 'n';
    $scrollable_ =isset($_POST['scrollable']) ? addslashes($_POST['scrollable']) : 'n';
Option::updateOption('scrollable', $scrollable_);
Option::updateOption('responsive', $responsive_);
Option::updateOption('preloader', $preloader_);
Option::updateOption('full_screen', $full_screen_);
Option::updateOption('admin_editor', $styleEditor);
Option::updateOption('admin_style', $styleName);
Option::updateOption('admin_sider', $styleSider);
$CACHE->updateCache('options');
emDirect("style.php?activated=1");
}
