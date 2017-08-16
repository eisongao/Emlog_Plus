<?php
/**
 * 找回密码
 * @copyright (c) Emlog All Rights Reserved
 */

require_once '../init.php';
define('TEMPLATE_PATH', EMLOG_ROOT.'/admin/views/');//后台当前模板路径
define('OFFICIAL_SERVICE_HOST', 'http://www.emlog.net/');//官方服务域名


$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
require_once(View::getView('reset'));
View::output();


