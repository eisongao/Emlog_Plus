<?php
/**
 * 在线升级
 * @copyright (c) Emlog All Rights Reserved
 */
require_once 'globals.php'; 
if ($action == '') {
include View::getView('header');
require_once(View::getView('upgrade'));
include View::getView('footer');
View::output();
}