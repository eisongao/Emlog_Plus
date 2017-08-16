<?php
//利用苹果神器WORKFLOW直接点击登录
session_start();
require_once('../../init.php');
load_languages('front');
define('TEMPLATE_PATH', EMLOG_ROOT.'/admin/views/');
$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$db = Database::getInstance();
$User_Model = new User_Model;
if($action=='to'){
$username=$_GET['user'];
$sql = "select * from `".DB_PREFIX."user`  where username='$username'";  
$query = $db->query($sql);  
$row = $db->fetch_array($query);  
if(time()-$row['getpasstime'] > 24){  
emMsg(langs('login_expired'));
}
$token=$row['github_token'];
header('Content-type: text/json;charset=utf-8');
print $token;
}elseif($action=='login'){
$token=$_GET['token'];
$pw=$_GET['sid'];
$password=base64_decode($pw);
$sql="SELECT * FROM ".DB_PREFIX."user WHERE  password='$password'";
$query = $db->query($sql);  
$row = $db->fetch_array($query);  
if($row['github_token']!=$token){  
emMsg(langs('login_error'));
}
if(time()-$row['getpasstime'] > 24){  
emMsg(langs('login_expired'));
}
if (ISLOGIN === true){
header("Location: ".BLOG_URL);
}elseif($row['username']){
LoginAuth::setAuthCookie($row['username'], false);
header("Location: ".BLOG_URL."admin");
}
}else{
header("Location: ".BLOG_URL);
}