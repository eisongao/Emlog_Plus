<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
//ini_set('memory_limit','128M');
 $user = $_GET['users'];
   $token = 'dbbd9f4a08f534a448516829bde591b577d46722';
 $url = 'https://api.github.com/users/'.$user.'/repos';
$curl_token_auth = 'If-None-Match:W/"'.$token.'"';
//$curl_token_auth = 'Authorization: token ' . $toke'n;
 $ch = curl_init(); 
 curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE); 
curl_setopt($ch, CURLOPT_POST, 0); 
curl_setopt($ch, CURLOPT_TIMEOUT, 50); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Awesome-Octocat-App', $curl_token_auth));
$output = curl_exec($ch); 
curl_close($ch); 
$output = json_decode($output);
$per_page = 20;
if (isset($_GET['p'])) { 
$p=max(1,intval($_GET['p']));
 } else { 
 $p=1;
  }; 
$total_rows = count($output);
$pages = ceil($total_rows / $per_page);
$current_page = isset($_GET['p']) ? $_GET['p'] : 1;
$current_page = ($total_rows > 0) ? min($pages, $current_page) : 1;
$start = $current_page * $per_page - $per_page;
$slice = array_slice($output, $start, $per_page);
?>
<?php if(!empty($_GET['users'])): ?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('applications')?></li>
</ul>
</div>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="tab-struct custom-tab-1">
<ul role="tablist" class="nav nav-tabs" id="myTabs_9">
<li <?php if($_GET['users']=="emlog-plus"){ ?>class="active" <?php } ?>><a  href="store.php?users=emlog-plus"><?php echo langs('plugin')?></a></li>
<li <?php if($_GET['users']=="emlog-theme"){ ?>class="active" <?php } ?>><a  href="store.php?users=emlog-theme"><?php echo langs('template')?></a></li>
</ul>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="tab-content">
<div id="plus" class="tab-pane fade active in" role="tabpanel">
<div class="table-wrap ">
<div class="table-responsive">					
<table class="table table-striped table-bordered mb-0">
<thead>
<tr>
<?php if($_GET['users']=="emlog-plus"){ ?>
<th><?php echo langs('pls_name')?></th>
<?php }elseif($_GET['users']=="emlog-theme") {?>
<th><?php echo langs('tpl_name')?></th>
<?php }?>  	
<th class="tdcenter"><?php echo langs('template_Preview')?></th>
<th><?php echo langs('description')?></th>
<th><?php echo langs('last_time')?></th>
<th><?php echo langs('file_size')?></th>
<th><?php echo langs('operate')?></th>
</tr>
</thead>
<tbody>				
<?php 
if (!empty($output)) :
$i=1;
foreach ($slice as $output => $repo) :
 ?>					
<tr role="row" class="even">
<td class="sorting_1"><a href="https://github.com/<?php echo $_GET['users'] ?>/<?php echo $repo->name; ?>" target="_blank" class="pr-4"><?php echo $repo->name; ?></a></td>
<td class="tdcenter"><a href="#prew_<?php echo $i ?>" data-toggle="modal" >
      <img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
</td>
<div aria-hidden="true" role="dialog" tabindex="-1" id="prew_<?php echo $i ?>" class="modal fade" style="display: none">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('template_Preview')?></h4>
</div>
<div class="modal-body">
<img src="https://github.com/<?php echo $_GET['users'] ?>/<?php echo $repo->name; ?>/blob/master/preview.jpg?raw=true" style="width:100%">
</div>
</div>
</div>
</div>
<td><?php if(empty($repo->description)){; ?>
<?php echo langs('no_something')?>
<?php }else{ ?>
<?php echo $repo->description; ?>
<?php }?></td>
<td><?php echo substr($repo->updated_at,0,-10); ?></td>
<td>
<span class="label label-danger">
<?php echo changeFileSize($repo->size); ?>
</span>
</td>
<?php if($_GET['users']=="emlog-plus"){ ?>
<td><a href="./store.php?action=insplu&typename=<?php echo $repo->name; ?>&type=plu&source=https://github.com/emlog-plus/<?php echo $repo->name; ?>/archive/master.zip?raw=true&token=<?php echo LoginAuth::genToken(); ?>" class="pr-10"><?php echo langs('auto_down')?></a><i class="zmdi zmdi-more-vert top-nav-icon"></i>&nbsp;<a href="https://github.com/emlog-plus/<?php echo $repo->name; ?>" target="_blank" class="pr-4"> <?php echo langs('manual_down')?></a></td>
<?php }else {?>
<td>
<a href="./store.php?action=instpl&typename=<?php echo $repo->name; ?>&type=tpl&source=https://github.com/emlog-theme/<?php echo $repo->name; ?>/archive/master.zip?raw=true&token=<?php echo LoginAuth::genToken(); ?>" class="pr-10"><?php echo langs('auto_down')?></a><i class="zmdi zmdi-more-vert top-nav-icon"></i>&nbsp;<a href="https://github.com/emlog-theme/<?php echo $repo->name; ?>" target="_blank" class="pr-4"> <?php echo langs('manual_down')?></a></td>
<?php }?>
</tr>
<?php 
$i++;
endforeach;
else:
?>
<tr>	
<td class="tdcenter" colspan="8"><?php echo langs('no_yet_add')?></td>
</tr>
<?php endif;?>
</tbody>
</table>
</div>
</div>	
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="form-group text-center">
<h6 class="panel-title txt-dark"><?php echo langs('have')?> <?php echo $total_rows; ?> <?php if($_GET['users']=="emlog-plus"){ ?><?php echo langs('plugin')?> <?php } ?>
<?php if($_GET['users']=="emlog-theme"){ ?><?php echo langs('template')?> <?php } ?>
</h6>
<?php if ($pages > 1) : ?>
<div id="pagenav">
<?php
for($i=1;$i<=$pages;$i++) {
        if($i==$p) {
            echo ' <span>',$i,'</span>';
     } else {
            echo ' <a href="./store.php?users='.$_GET['users'].'&p=',$i,'">',$i,'</a>';
        }
    }
?>
</div>
<?php endif ?>
</div>
</div>
</div>		
</div>
</div>		
<?php else:?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('applications')?></li>
</ul>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<div class="panel panel-info card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-light"><?php echo langs('select_pls')?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="form-group text-center">	
<a class="btn btn-primary" href="store.php?users=emlog-plus"><?php echo langs('online_plus')?></a>
<a class="btn btn-danger" href="store.php?users=emlog-theme"><?php echo langs('online_theme')?></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php endif ?>						
<script>
<?php if($_GET['users']=="emlog-plus"){ ?>
$("#menu_store_plu").addClass('active-page');
<?php }elseif($_GET['users']=="emlog-theme") {?>
$("#menu_store_theme").addClass('active-page');
<?php }?>
$("#menu_store").addClass('active');
</script>