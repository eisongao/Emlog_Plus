<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
define('info_url' , 'https://eisongao.github.io/info.json' ); 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE); 
curl_setopt($ch,CURLOPT_URL,info_url); 
$value_info = json_decode(curl_exec($ch)); 
define('get_version' , $value_info->version); 
define('get_fixed' , $value_info->fix_bug); 
define('get_date' , $value_info->last_time ); 
define('get_info_cn' , $value_info->info_cn ); 
define('get_info_en' , $value_info->info_en ); 
define('get_down' , $value_info->download_url ); 
define('get_downs' , $value_info->downloads_url ); 
define('get_sql' , $value_info->sql_url ); 
define('get_mysql' , $value_info->mysql ); 
?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('online_update')?></li>
 </ul>
 </div>
 <?php if(get_version > Option::EMLOG_VERSION || get_fixed > "31" || get_mysql > "4"){ ?>
<div class="alert alert-warning alert-dismissable alert-style-1">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="zmdi zmdi-alert-circle-o"></i>	
<?php
if(Option::get('language')=='cn'){
echo get_info_cn;
}
if(Option::get('language')=='en'){
echo get_info_en;
}
?>
<div style="float:right;color:red">
<b><?php echo get_date ?></b>
</div>
</div>
<?php } ?>              
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('em_info')?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body row">
<div class="pl-15 pr-15 mb-15">
<div class="pull-left">
<i class="zmdi zmdi-google-pages inline-block mr-10 font-16"></i>
<span class="inline-block txt-dark"><?php echo langs('now_version')?></span>
</div>	
<span class="inline-block txt-warning pull-right weight-500"><?php echo Option::EMLOG_VERSION; ?></span>
<div class="clearfix"></div>
</div>
<hr class="light-grey-hr mt-0 mb-15">
<div class="pl-15 pr-15 mb-15">
<div class="pull-left">
<i class="zmdi zmdi-chart-donut  inline-block mr-10 font-16"></i>
<span class="inline-block txt-dark"><?php echo langs('auto_check')?></span>
</div>	
<span class="inline-block txt-danger pull-right weight-500"><?php if(get_version > Option::EMLOG_VERSION || get_fixed > "31" || get_mysql > "4" ){ ?>
<?php if(get_mysql > "4"): ?>
<a  href="./store.php?action=update&type=upd&source=<?php echo get_downs ?>&upsql=<?php echo get_sql ?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('update_pls')?></a>	
<?php else: ?>
<a  href="./store.php?action=update&type=upd&source=<?php echo get_down ?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('update_pls')?></a>	
<?php endif ?>
<?php }else{ ?>								
<?php echo langs('update_news')?>
<?php } ?>
</span>
<div class="clearfix"></div>
</div>
<hr class="light-grey-hr mt-0 mb-15">
<div class="pl-15 pr-15 mb-15">
<div class="pull-left">
<i class="zmdi zmdi-time inline-block mr-10 font-16"></i>
<span class="inline-block txt-dark"><?php echo langs('update_time')?></span>
</div>	
<span class="inline-block txt-primary pull-right weight-500">
2017-09-28
</span>
</div>
</div>
</div>
</div>
</div>
<script>
$("#menu_up").addClass('active');
</script>