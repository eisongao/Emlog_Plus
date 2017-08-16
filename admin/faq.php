<?php
/**
 * 帮助
 * @copyright (c) Emlog All Rights Reserved
 */

require_once 'globals.php';
include View::getView('header');
require_once(View::getView('faq'));
include View::getView('footer');
View::output();
