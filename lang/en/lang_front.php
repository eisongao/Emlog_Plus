<?php
// 前端语言
$langs = array(
//---------------------------
//xmlrpc.php
'xmlrpc_is_off'	=> 'Tip: The site XML-RPC service is not turned on.',
 'xmlrpc_only_post'	=> 'Error: XML-RPC server can accept only POST data',
 'error_data_empty'	=> 'Error: Data cannot be empty',
 'post_no_access'	=> 'Sorry, you have no access to artcile',
 'no_posts'		=> 'No posts',
 'file_error'		=> 'File error',
 'file_name_error'	=> 'File name error',
 'file_type_error'	=> 'File type error',
 'upload_folder_create_error'	=> 'Failed to create file upload directory.',
 'upload_folder_unwritable'	=> 'Upload failed. Directory (content/uploadfile) cannot be written',
 'file_write_error'		=> 'Unable to write to file',
 'username_password_error'	=> 'Username or password error',
 
 //---------------------------
//include/model/comment_model.php
 'comment_wait_approve'	=> 'Thank you. Your comment is waiting for approval',
'no_permission'	=> 'Insufficient permissions!！',

 //---------------------------
//include/model/log_model.php
'msg_pw'=>'Encryption tips',
 'no_title'		=> 'Untitled',
 'post_protected_by_password_click_title'	=> 'This entry is protected. Click on title and enter the password to access this page',
 'read_more'		=> 'Read more&gt;&gt;',
 'page_password_enter'	=> 'Please enter password to access this page',
 'submit_password'	=> 'Enter',
 'back_home'		=> 'Back to home',
 
 //---------------------------
//include/model/sort_model.php
'uncategorized'=>'Uncategorized',
 
//---------------------------
//include/controller/comment_controller.php
 'comment_error_comment_disabled'	=> 'Comment error: The comments for this entry has been closed',
 'comment_error_content_exists'		=> 'Comment error: The same content already exists',
 'comment_error_flood_control'		=> 'Comment error: You must wait before sending another comment',
 'comment_error_name_enter'		=> 'Comment error: Please, enter your name',
 'comment_error_name_invalid'		=> 'Comment error: Name does not meet requirements',
 'comment_error_email_invalid'		=> 'Comment error: E-mail address does not meet requirements',
 'comment_error_other_user'		=> 'Comment error: User data cannot be the same as administrator or other users',
 'comment_error_url_invalid'		=> 'Comment error: Homepage URL is invalid',
 'comment_error_empty'			=> 'Comment error: Please, enter some content',
 'comment_error_content_invalid'	=> 'Comment error: Content does not meet requirements',
 'comment_error_national_chars'		=> 'Comment error: Content must contain Chinese characters',
 'comment_error_captcha_invalid'	=> 'Comment error: Invalid captcha',

//---------------------------
//include/lib/360webscan.php
'safe_tip'=>'Security warning',
'safe_info'=>'The security system detected that you may try to execute dangerous code and has been blocked by the system',
'return_page'=>'Return to page',


//---------------------------
//include/lib/cache.php
 'cache_date_format'	=> 'm.Y',
 'cache_read_error'	=> 'Cache read failed. If you are using a Unix/Linux host, modify the permissions of the cache directory (content/cache) and all the folders inside it to 777. If you are using a Windows host, please contact the administrator, and make all files under this directory writeable',
 'cache_not_writable'	=> 'The cache directory (content/cache) is not writable',

//---------------------------
//include/lib/calendar.php

 'weekday1'	=> 'Mo',
 'weekday2'	=> 'Tu',
 'weekday3'	=> 'We',
 'weekday4'	=> 'Th',
 'weekday5'	=> 'Fr',
 'weekday6'	=> 'Sa',
 'weekday7'	=> 'Su',
 
//---------------------------------------
//include/lib/database.php
 'php_mysql_not_supported'	=> 'Server does not support PHP MySql database',
 
//---------------------------
//include/lib/function.base.php
 '_load_failed'	=> ' load failed.',
 '_bytes'	=> 'bytes',
 'home'		=> 'Home',
 'first_page'	=> 'First',
 'last_page'	=> 'Last',
 'read_more'	=> 'Read more&gt;&gt;',
'just_ago'=>'now',
'_month_ago' =>'month ago',
'_year_ago'	=> 'year ago',
'_week_ago'=>'week ago',
'_day_ago'=>'day ago',
'_hour_ago'=>'hour(s) ago',
 '_sec_ago'	=> 'seconds ago',
 '_min_ago'	=> 'minutes ago',
 'file_size_exceeds_system'	=> 'File size exceeds the system limit',
 '_limit'			=> 'limit',
 'upload_failed_error_code'	=> 'Upload failed. Error code: ',
 'file_type_not_supported'	=> 'This file type is not supported',
 'file_size_exceeds_'		=> 'File size exceeds the limit',
 '_of_limit'			=> 'limit',
 'upload_folder_create_error'	=> 'Failed to create file upload directory.',
 'upload_folder_unwritable'	=> 'Upload failed. Directory (content/uploadfile) cannot be written.',
 '404_description'		=> 'Sorry, the page that you requested does not exist',
 'prompt'			=> 'Prompt Message',
 'click_return'			=> '&laquo;Return back',

//---------------------------
//include/lib/loginauth.php
 'captcha'			=> 'Captcha',
 'captcha_error_reenter'	=> 'Captcha error. Please, re-enter',
 'user_name_wrong_reenter'	=> 'Wrong username. Please, re-enter',
 'password_wrong_reenter'	=> 'Wrong password. Please, re-enter.',
 'token_error'			=> 'Token error',

//---------------------------
//include/lib/option.php
 'blogger'		=> 'Personal info',
 'calendar'		=> 'Calendar',
 'twitter_latest'	=> 'Latest twits',
 'tags'			=> 'Tags',
 'category'		=> 'Category',
 'archive'		=> 'Archive',
 'new_comments'		=> 'Latest comments',
 'new_posts'		=> 'Latest posts',
 'random_post'		=> 'Random entry',
 'hot_posts'		=> 'Popular entries',
 'links'		=> 'Links',
 'search'		=> 'Search',
 'widget_custom'	=> 'Custom widget',
 'search_placeholder'	=> 'Search...and Enter',

//---------------------------
//include/lib/view.php
 'template_not_found'	=> 'The current template has been deleted or corrupted. Please please login as administrator to replace other template',

//---------------------------------------
//include/lib/mysql.php
 'php_mysql_not_supported'	=> 'Server does not support PHP MySql database',
 'db_database_unavailable'	=> 'Database connection error: The database server or database is unavailable',
 'db_port_invalid'		=> 'Database connection error: The database port is invalid',
 'db_server_unavailable'	=> 'Database connection error: The database server is unavailable.',
 'db_credential_error'		=> 'Database connection error: Wrong username or password',
 'db_error_code'		=> 'Database connection error: Please, check database information. Error code: ',
 'db_not_found'			=> 'Database connection failed. The database you filled in was not found.',
 'db_sql_error'			=> 'SQL statement execution error',

//---------------------------------------
//include/lib/mysqlii.php
 'mysqli_not_supported'		=> 'Server does not support PHP MySqli extension',
 'db_error_name'		=> 'Database connection error:  Please fill out the database name',

//---------------------------------
//include/lib/tx.php
'thank_used'=>'Thank you for your use',
'tx_info'=>'Your current browser does not support, unable to access the site!',
'lost_brower'=>'Your IE version is too low, please copy to another browser!',

//---------------------------
//content/templates/default/404.php
 '404_error'		=> 'Error - page not found',
 '404_description'	=> 'Sorry, the page that you requested does not exist',
 'click_return'		=> 'Return back',

//---------------------------
//content/templates/default/footer.php
 'powered_by'		=> 'Powered by',
 'powered_by_emlog'	=> 'Powered by Emlog',

//---------------------------
//content/templates/default/module.php
 'view_image'		=> 'View image',
 'more'			=> 'More',
 'site_management'	=> 'Site management',
 'logout'		=> 'Logout',
 'top_posts'		=> 'Top entries',
 'cat_top_posts'	=> 'Category Top entries',
 'edit'			=> 'Edit',
 'reply'		=> 'Reply',
 'cancel_reply'		=> 'Cancel reply',
 'comment_leave'	=> 'Leave a comment',
 'nickname'		=> 'Nicname',
 'email_optional'	=> 'E-Mail adress (optional)',
 'homepage_optional'	=> 'Homepage (optional)',
 'twitter'		=> 'Twitter',
 'comments'=>'Comment',
'views'=>'View',
'text_count'=>'This article total' ,
'views_count'=>',Thank you for your comment.',
'copy_info'=>'Reprint: reprint please indicate the original link ',
'comment_count'=>' Comment.',
'login_expired'=>'The login connection has expired',
'login_error'=>' Login the connection error.',

//---------------------------
//content/templates/default/side.php
 'rss_feed'	=> 'RSS Subscription',
 'feed_rss'	=> 'RSS Subscription',

 'not_found'		=> 'Not found.',
 'sorry_no_results'	=> 'Sorry, no results found.',
);
