<?php
// 前端语言
$langs = array(
//---------------------------
//xmlrpc.php
'xmlrpc_is_off'	=> '提示:站点XMLRPC服务未开启.',
 'xmlrpc_only_post'	=> '错误:XML-RPC服务器只能接受POST数据',
 'error_data_empty'	=> '错误:提交数据内容为空',
 'post_no_access'	=> '对不起,您访问的文章不存在',
 'no_posts'		=> '没有文章',
 'file_error'		=> '文件错误',
 'file_name_error'	=> '文件名错误',
 'file_type_error'	=> '文件类型错误',
 'upload_folder_create_error'	=> '创建文件上传目录失败',
 'upload_folder_unwritable'	=> '上传失败。文件上传目录(content/uploadfile)不可写',
 'file_write_error'		=> '文件无法写入',
 'username_password_error'	=> '用户名密码错误',
 
 //---------------------------
//include/model/comment_model.php
 'comment_wait_approve'	=> '评论发表成功，请等待管理员审核',
'no_permission'	=> '权限不足！',

 //---------------------------
//include/model/log_model.php
'msg_pw'=>'加密提示',
 'no_title'		=> '无标题',
 'post_protected_by_password_click_title'	=> '该文章已设置加密，请点击标题输入密码访问',
 'read_more'		=> '阅读全文&gt;&gt;',
 'page_password_enter'	=> '请输入该文章的访问密码',
 'submit_password'	=> '点击进入',
 'back_home'		=> '返回首页',
 
 //---------------------------
//include/model/sort_model.php
'uncategorized'=>'无分类',
 
//---------------------------
//include/controller/comment_controller.php
 'comment_error_comment_disabled'	=> '评论失败：该文章已关闭评论',
 'comment_error_content_exists'		=> '评论失败：已存在相同内容评论',
 'comment_error_flood_control'		=> '评论失败：您提交评论的速度太快了，请稍后再发表评论',
 'comment_error_name_enter'		=> '评论失败：请填写姓名',
 'comment_error_name_invalid'		=> '评论失败：姓名不符合规范',
 'comment_error_email_invalid'		=> '评论失败：邮件地址不符合规范',
 'comment_error_other_user'		=> '评论失败：禁止使用管理员昵称或邮箱评论',
 'comment_error_url_invalid'		=> '评论失败：主页地址不符合规范',
 'comment_error_empty'			=> '评论失败：请填写评论内容',
 'comment_error_content_invalid'	=> '评论失败：内容不符合规范',
 'comment_error_national_chars'		=> '评论失败：评论内容需包含中文',
 'comment_error_captcha_invalid'	=> '评论失败：验证码错误',

//---------------------------
//include/lib/360webscan.php
'safe_tip'=>'安全警告',
'safe_info'=>'安全系统检测到您可能试图执行危险代码，已被系统拦截',
'return_page'=>'返回上一页',


//---------------------------
//include/lib/cache.php
 'cache_date_format'	=> 'Y年n月',
 'cache_read_error'	=> '读取缓存失败。如果您使用的是Unix/Linux主机，请修改缓存目录 (content/cache) 下所有文件的权限为777。如果您使用的是Windows主机，请联系管理员，将该目录下所有文件设为可写',
 'cache_not_writable'	=> '写入缓存失败，缓存目录 (content/cache) 不可写',

//---------------------------
//include/lib/calendar.php

 'weekday1'	=> '一',
 'weekday2'	=> '二',
 'weekday3'	=> '三',
 'weekday4'	=> '四',
 'weekday5'	=> '五',
 'weekday6'	=> '六',
 'weekday7'	=> '日',
 
//---------------------------------------
//include/lib/database.php
 'php_mysql_not_supported'	=> '服务器空间PHP不支持MySql数据库',
 
//---------------------------
//include/lib/function.base.php
 '_load_failed'	=> ' 加载失败。',
 '_bytes'	=> '字节',
 'home'		=> '首页',
 'first_page'	=> '页',
 'last_page'	=> '尾页',
 'read_more'	=> '阅读全文&gt;&gt;',
'just_ago'=>'刚刚',
'_month_ago' =>'个月前',
'_year_ago'	=> '年前',
'_week_ago'=>'周前',
'_day_ago'=>'天前',
'_hour_ago'=>'小时前',
 '_sec_ago'	=> '秒前',
 '_min_ago'	=> '分钟前',
 'file_size_exceeds_system'	=> '文件大小超过系统 ',
 '_limit'			=> '限制',
 'upload_failed_error_code'	=> '上传文件失败,错误码: ',
 'file_type_not_supported'	=> '错误的文件类型',
 'file_size_exceeds_'		=> '文件大小超出',
 '_of_limit'			=> '的限制',
 'upload_folder_create_error'	=> '创建文件上传目录失败',
 'upload_folder_unwritable'	=> '上传失败。文件上传目录(content/uploadfile)不可写',
 '404_description'		=> '抱歉，你所请求的页面不存在！',
 'prompt'			=> '提示信息',
 'click_return'			=> '&laquo;点击返回',

//---------------------------
//include/lib/loginauth.php
 'captcha'			=> '验证码',
 'captcha_error_reenter'	=> '验证错误，请重新输入',
 'user_name_wrong_reenter'	=> '用户名错误，请重新输入',
 'password_wrong_reenter'	=> '密码错误，请重新输入',
 'token_error'			=> 'Token error',

//---------------------------
//include/lib/option.php
 'blogger'		=> '个人资料',
 'calendar'		=> '日历',
 'twitter_latest'	=> '最新微语',
 'tags'			=> '标签',
 'category'		=> '分类',
 'archive'		=> '存档',
 'new_comments'		=> '最新评论',
 'new_posts'		=> '最新文章',
 'random_post'		=> '随机文章',
 'hot_posts'		=> '热门文章',
 'links'		=> '链接',
 'search'		=> '搜索',
 'widget_custom'	=> '自定义组件',
 'search_placeholder'	=> '搜索并回车',

//---------------------------
//include/lib/view.php
 'template_not_found'	=> '当前使用的模板已被删除或损坏，请登录后台更换其他模板。',

//---------------------------------------
//include/lib/mysql.php
 'php_mysql_not_supported'	=> '服务器空间PHP不支持MySql数据库',
 'db_database_unavailable'	=> '连接数据库失败，数据库地址错误或者数据库服务器不可用',
 'db_port_invalid'		=> '连接数据库失败，数据库端口错误',
 'db_server_unavailable'	=> '连接数据库失败，数据库服务器不可用',
 'db_credential_error'		=> '连接数据库失败，数据库用户名或密码错误',
 'db_error_code'		=> '连接数据库失败，请检查数据库信息。错误编号：',
 'db_not_found'			=> '连接数据库失败，未找到您填写的数据库',
 'db_sql_error'			=> 'SQL语句执行错误',

//---------------------------------------
//include/lib/mysqlii.php
 'mysqli_not_supported'		=> '服务器空间PHP不支持MySqli函数',
 'db_error_name'		=> '连接数据库失败，请填写数据库名',

//---------------------------------
//include/lib/tx.php
'thank_used'=>'感谢你使用',
'tx_info'=>'您当前浏览器不支持或操作系统语言设置非中文，无法访问本站！',
'lost_brower'=>'您的IE浏览器版本太低，请复制到其他浏览器打开！',

//---------------------------
//content/templates/default/404.php
 '404_error'		=> '错误提示-页面未找到',
 '404_description'	=> '抱歉，你所请求的页面不存在！',
 'click_return'		=> '点击返回',

//---------------------------
//content/templates/default/footer.php
 'powered_by'		=> 'Powered by',
 'powered_by_emlog'	=> '采用Emlog系统',

//---------------------------
//content/templates/default/module.php
 'view_image'		=> '查看图片',
 'more'			=> '更多',
 'site_management'	=> '管理站点',
 'logout'		=> '退出',
 'top_posts'		=> '置顶文章',
 'cat_top_posts'	=> '分类置顶文章',
 'edit'			=> '编辑',
  'reply'		=> '回复',
 'cancel_reply'		=> '取消回复',
 'comment_leave'	=> '发表评论',
 'nickname'		=> '昵称',
 'email_optional'	=> '邮件地址 (选填)',
 'homepage_optional'	=> '个人主页 (选填)',
 'twitter'		=> '微语',
 'comments'=>'评论',
'views'=>'浏览',
'text_count'=>'本文共计' ,
'views_count'=>'字,感谢您的耐心浏览与评论.',
'copy_info'=>'转载:转载请注明原文链接 ',
'comment_count'=>'条回应',
'login_expired'=>'登录连接已过期咯,ರ_ರ 心塞',
'login_error'=>'登录连接错误, (๑⁼̴̀д⁼̴́๑)干嘛!!',

//---------------------------
//content/templates/default/side.php
 'rss_feed'	=> 'RSS订阅',
 'feed_rss'	=> '订阅Rss',

 'not_found'		=> '未找到',
 'sorry_no_results'	=> '抱歉，没有符合您查询条件的结果',
);
