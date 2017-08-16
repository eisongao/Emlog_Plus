<?php
/**
 * 数据缓冲
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';

if ($action == '') {
	include View::getView('header');
	require_once(View::getView('cache'));
	include View::getView('footer');
	View::output();
}


if ($action == 'Cache') {
	$CACHE->updateCache();
	emDirect('./cache.php?active_mc=1');
}