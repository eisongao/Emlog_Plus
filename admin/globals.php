<?php
/**
 * 后台全局项加载
 * @copyright (c) Emlog All Rights Reserved
 */

require_once '../init.php';


load_languages('admin');

define('TEMPLATE_PATH', EMLOG_ROOT.'/admin/views/');//后台当前模板路径
define('OFFICIAL_SERVICE_HOST', 'http://www.emlog.net/');//官方服务域名

$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';

$avatar = empty($user_cache[UID]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[UID]['avatar'];
$name =  $user_cache[UID]['name'];

//获取最新留言
function newcomm(){
	global $CACHE;
	$db=Database::getInstance();
        $yesterday=60*60*24;
        $now =time();
        $today=$now-$yesterday;
        $sql = "SELECT cid,gid,date,poster,mail,comment FROM " . DB_PREFIX . "comment WHERE  hide='n' and date >='".$today."' ORDER BY date DESC LIMIT 0,5";        
        $ret= $db->query($sql);
        $totals = $db ->num_rows($ret); 
        echo "<li class=\"dropdown alert-drp\">
<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"zmdi zmdi-notifications top-nav-icon\"></i>";
if($totals !="0"){
echo "<span class=\"top-nav-icon-badge\">".$totals."</span>";
}
echo "</a>
<ul  class=\"dropdown-menu alert-dropdown\" data-dropdown-in=\"bounceIn\" data-dropdown-out=\"bounceOut\">
<li>
<div class=\"notification-box-head-wrap\">
<span class=\"notification-box-head pull-left inline-block\">".langs('news_commet')."</span>
<a class=\"txt-danger pull-right clear-notifications inline-block\" href=\"javascript:void(0)\"> ".langs('news_close')."</a>
<div class=\"clearfix\"></div>
<hr class=\"light-grey-hr ma-0\"/>
</div>
<li>
<div class=\"streamline message-nicescroll-bar\">";
 while($row = $db->fetch_array($ret)){
echo "<div class=\"sl-item\"><a href=\"".Url::log($row['gid'])."#comment-".$row["cid"]."\"><div class=\"sl-avatar\">
<img class=\"img-responsive\" src=".getGravatar($row["mail"])." alt=\"avatar\"></div><div class=\"sl-content\"><span class=\"inline-block capitalize-font  pull-left truncate head-notifications\">".$row['poster']."</span><span class=\"inline-block font-11  pull-right notifications-time\">".date("Y-m-d",$row['date'])."</span><div class=\"clearfix\"></div><p class=\"truncate\">".htmlspecialchars($row['comment'])."</p></div></a></div><hr class=\"light-grey-hr ma-0\"/>";        
} 
echo "</div>
</li>
<li>
<div class=\"notification-box-bottom-wrap\">
<hr class=\"light-grey-hr ma-0\"/>
<a class=\"block text-center read-all\" href=\"comment.php\"> ".langs('all_commets')."</a>
<div class=\"clearfix\"></div>
</div>
</li>
</ul>
</li>";               
}

//获取微语
function newt(){
	global $CACHE;
	$db=Database::getInstance();
        $sql = "SELECT date,author,img,content FROM " . DB_PREFIX . "twitter  ORDER BY date DESC LIMIT 0,5";
        $ret= $db->query($sql);
        while($row = $db->fetch_array($ret)){
echo "<div class=\"sl-item\"><a href=\"../t\"><div class=\"sl-avatar\">
<img class=\"img-responsive\" src=\"./views/images/avatar/default_".rand(1,8).".png\" alt=\"avatar\"></div><div class=\"sl-content\"><span class=\"inline-block capitalize-font  pull-left truncate head-notifications\">".langs('notice')."</span><span class=\"inline-block font-11  pull-right notifications-time\">".date("Y-m-d",$row['date'])."</span><div class=\"clearfix\"></div><p class=\"truncate\">".htmlspecialchars($row['content'])."</p></div></a></div><hr class=\"light-grey-hr ma-0\"/>";        
}                
}

//登录验证
if ($action == 'login') {
	$username = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
	$password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
	$ispersis = isset($_POST['ispersis']) ? intval($_POST['ispersis']) : false;
	$img_code = Option::get('login_code') == 'y' && isset($_POST['imgcode']) ? addslashes(trim(strtoupper($_POST['imgcode']))) : '';
$loginAuthRet = LoginAuth::checkUser($username, $password, $img_code);    
       if ($loginAuthRet === true) {
		LoginAuth::setAuthCookie($username, $ispersis);
		emDirect("./");
	} else{
	if(isset($_SESSION['code'])){
             unset($_SESSION['code']);
         }
       LoginAuth::loginPage($loginAuthRet);
	}
}

if ($action == 'mlogin') {
$DB = Database::getInstance();
if($DB->num_rows($DB->query("show columns from ".DB_PREFIX."user like 'github_token'")) == 0){
$sql = "ALTER TABLE ".DB_PREFIX."user ADD github_token varchar(50) DEFAULT '0'";
$DB->query($sql);
}
$rand = base64_encode(time() . microtime());
$getpasstime = time();  
$token=$rand;
$DB->query("update `".DB_PREFIX."user` set `getpasstime`='$getpasstime',`github_token`='$token'"); 
echo "<script>alert('".langs('open_mobile_app')."');location.href = document.referrer;</script>";
}

//用户注册
if ($action == 'reg') {
session_start();
global $CACHE;
$options_cache = $CACHE->readCache('options');
$username = isset($_POST['username']) ? addslashes(trim($_POST['username'])) : '';
$email = isset($_POST['email']) ? addslashes(trim($_POST['email'])) : '';	
$password = isset($_POST['password']) ? addslashes(trim($_POST['password'])) : '';
$password2 = isset($_POST['password2']) ? addslashes(trim($_POST['password2'])) : '';
$imgcode = isset($_POST['imgcode']) ? strtoupper(addslashes(trim($_POST['imgcode']))): '';
if($username && $email && $password && $password2 && $imgcode ){
 $sessionCode = isset($_SESSION['code']) ? $_SESSION['code'] : '';
 if($imgcode == $sessionCode){
  $User_Model = new User_Model();
  if($User_Model -> isUserExist($username)){
  echo'<script>alert("'.langs('user_name_exists').'");</script>';
   }elseif($User_Model -> isEmailExist($email)){
   echo'<script>alert("'.langs('user_name_exists').'");</script>';
  }else{
   $hsPWD = new PasswordHash(8, true);
   $password = $hsPWD->HashPassword($password);
   $User_Model->addUser($username,$password, $email,'','writer', 'y');
   $CACHE->updateCache();
$to = $email;
$subject = langs('thanks_reg');
$message = "<div style=\"color:#555;font:12px/1.5 微软雅黑,Tahoma,Helvetica,Arial,sans-serif;width:600px;margin:50px auto;border: 1px solid #e9e9e9;border-top: none;box-shadow:0 0px 0px #aaaaaa;\">
  <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
    <tbody>
      <tr valign=\"top\" height=\"2\">
        <td width=\"190\" bgcolor=\"#0B9938\"></td>
        <td width=\"120\" bgcolor=\"#9FCE67\"></td>
        <td width=\"85\" bgcolor=\"#EDB113\"></td>
        <td width=\"85\" bgcolor=\"#FFCC02\"></td>
        <td width=\"130\" bgcolor=\"#5B1301\" valign=\"top\"></td>
      </tr>
    </tbody>
  </table>
  <div style=\"padding: 0 15px 8px;\">
    <h2 style=\"border-bottom:1px solid #e9e9e9;font-size:14px;font-weight:normal;padding:10px 0 10px;\"><span style=\"color: #12ADDB\">&gt; </span>".langs('thanks_reg')."</h2>
    <div style=\"font-size:12px;color:#777;padding:0 10px;margin-top:18px\">
      <p></p>
      <p>".langs('reg_info')."</p>
      <p style=\"background-color:#f5f5f5;padding: 10px 15px;margin:18px 0\">".langs('user_name').":{$username},<br/>".langs('email').":{$email}<br/>".langs('password').":{$_POST['password']}</p>
      <p>".langs('reg_click')." <a style=\"text-decoration:none; color:#12addb\" href=\"".BLOG_URL."admin\" target=\"_blank\">".langs('reg_in')."</a></p>
    </div>
  </div>
  <div style=\"color:#888;padding:10px;border-top:1px solid #e9e9e9;background:#f5f5f5;\">
    <p style=\"margin:0;padding:0;\">".langs('reg_footer')."</p>
  </div>
</div>";
$header = "From:".Option::get('blogname')." \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
mail($to,$subject,$message,$header);
  echo '<script>alert("'.langs('reg_ok').'"); window.location.href="'.BLOG_URL.'admin/"</script>';
 }
 }else{
  echo'<script>alert("'.langs('code_error').'");</script>';
 }
}
session_destroy(); 
}


//发送找回密码验证
if ($action == 'sendmail') {
$DB = Database::getInstance();
$email = isset($_POST['mail']) ? addslashes(trim($_POST['mail'])) : '';	
if(empty($email)){
emMsg(langs('no_mail'),'javascript:history.back(-1);');
}
$sql = $DB->query("SELECT uid,username,password FROM `".DB_PREFIX."user`  WHERE email='".$email."' LIMIT 1 ");
if ($DB->num_rows($sql) == 0) {
emMsg(langs('no_reg_user'),'javascript:history.back(-1);');
}else{
    $row = $DB->fetch_array($sql);  
    $uid=$row['uid'];
    $getpasstime = time();  
    $DB->query("update `".DB_PREFIX."user` set `getpasstime`='$getpasstime' where uid='$uid '"); 
   $time = date('Y-m-d H:i'); 
   $token = md5($uid.$row['username'].$row['password'].$row['getpasstime']);
   $url = BLOG_URL."admin/reset.php?email=".$email."&token=".$token;
   $to = $email;  
   $re = langs('user_find'); 
   $msg = "".langs('mgs_user')."".$email."：<br/>".langs('mgs_time')." ".$time." ".langs('mgs_user_')."<br/><a href='".$url."'target='_blank'>".$url."</a>";  
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html;";   
  $headers .= "charset=\"iso-8859-1\"\r\n";
$headers .= "From: ".Option::get('blogname')." \r\n";    
  if(mail($to,$re,$msg, $headers))
  { 
  echo "<script>alert('".langs('send_succes')."');location.href = document.referrer;</script>";
  }
}
}

//退出
if ($action == 'logout') {
session_start(); 
if(isset($_COOKIE[AUTH_COOKIE_NAME])){ 
$_SESSION = array(); 
setcookie(AUTH_COOKIE_NAME, ' ', time() - 31536000, '/');
            }
       session_destroy(); 
	emDirect("../");
}

if (ISLOGIN === false) {
	LoginAuth::loginPage();
}

$request_uri = strtolower(substr(basename($_SERVER['SCRIPT_NAME']), 0, -4));
if (ROLE == ROLE_WRITER && !in_array($request_uri, array('write_log','admin_log','blogger','comment','index','save_log'))) {
	emMsg(langs('no_permission'),'./');
}
