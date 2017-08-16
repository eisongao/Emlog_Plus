<?php 
/**
 * 404页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');}
?>
<!DOCTYPE html>
<html dir="<?php echo  EMLOG_LANGUAGE_DIR ?>" lang="<?php echo EMLOG_LANGUAGES?>">
<head>
<meta charset="utf-8">
<title><?php echo langs('404_error')?></title>
<style type="text/css">
<!--
body {
	background-color:#F7F7F7;
	font-family: Arial;
	font-size: 12px;
	line-height:150%;
}
.main {
	background-color:#FFFFFF;
	font-size: 12px;
	color: #666666;
	width:650px;
	margin:60px auto 0px;
	border-radius: 10px;
	padding:30px 10px;
	list-style:none;
	border:#DFDFDF 1px solid;
}
.main p {
	line-height: 18px;
	margin: 5px 20px;
}
.main a{
color:#666;
}
a:link { text-decoration: none;}
a:active { color:blue}
-->
</style>
</head>
<body>
<div class="main">
<p><?php echo langs('404_description')?></p>
<p><a href="javascript:history.back(-1);"><?php echo langs('click_return')?></a></p>
</div>
</body>
</html>