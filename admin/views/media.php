<?php if(!defined('EMLOG_ROOT')) {exit('error!');}
$db=Database::getInstance(); 
?>
 <div class="heading-bg  card-views">
  <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active">
<?php echo langs('media_mange') ?>
  </li>
  </ul>
</div>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <?php echo langs('deleted_ok') ?>
</div>
<?php endif;?>
<div class="row">
<form action="attachment.php?action=dell_all_media" method="post" name="form_media" id="form_media">
<?php 
$num_rec_per_page=18; 
if (isset($_GET['page'])) { 
$page=max(1,intval($_GET['page']));
 } else { 
 $page=1;
  }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM " . DB_PREFIX . "attachment where thumfor = 0 order by aid desc  LIMIT $start_from, $num_rec_per_page"; 
$result = $db->query($sql);
if($db->num_rows($result) != 0): 
while ($row = $db->fetch_array($result)){
$extension  = strtolower(substr(strrchr($row['filepath'], "."),1));
$atturl = BLOG_URL.substr($row['filepath'], 3);
?>
<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
<div class="panel panel-default card-view pa-0">
<div class="panel-wrapper collapse in">
<div class="panel-body pa-0">
<article class="col-item">
<div class="photo">
<div class="options">
<a href="javascript: em_confirm(<?php echo $row['aid']; ?>, 'media', '<?php echo LoginAuth::genToken(); ?>');" class="font-18 txt-grey pull-left sa-warning"><i class="zmdi zmdi-close"></i></a>
</div>
<img src="<?php if ($extension == 'zip' || $extension == 'rar'){ $imgpath = "./views/images/tar.gif";
 ?><?php   echo $imgpath ?><?php }elseif (in_array($extension, array('gif', 'jpg', 'jpeg', 'png', 'bmp'))) { ?><?php echo $atturl ?><?php } ?>" class="img-responsive" style="width:78%;height:100px" alt="<?php echo $row['filename'] ?>" />
</div>
<div class="info">
<h6><input type="checkbox" name="media[<?php echo $row['aid']; ?>]" class="ids" value="1" > <?php echo $row['filename'] ?></h6>
</div>
</article>
</div>
</div>	
</div>	
</div>	
<?php } ?>
</div>
 <div class="form-group">
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
<a href="javascript:void(0);" id="select_all"><?php echo langs('select_all')?></a> <?php echo langs('selected_items')?>：
<a href="javascript:delmedia();" class="care"><?php echo langs('delete')?></a>
</div>
</form>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="form-group text-center">
 <div id="pagenav">
<?php 
$sql = "SELECT * FROM " . DB_PREFIX . "attachment where thumfor = 0" ;
$rs_result =  $db->query($sql); 
$total_records =  $db->num_rows($rs_result);  
$total_pages = ceil($total_records / $num_rec_per_page);  
for ($i=1; $i<=$total_pages; $i++) { 
if($i==$page){
 echo "<span>".$i."</span>"; 
}else{
 echo "<a href='media.php?page=".$i."'>".$i."</a> "; 
}
}; 
?>
</div>
</div>
</div>
</div>		
</div>
</div>	
</div>
<?php else: ?>
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="panel-body"> 
<div class="form-group text-center">
<?php echo langs('no_yet_media')?>
</div>
</div>
</div>
</div>
<?php endif ?>
<script>
selectAllToggle();	
function delmedia(){
	if (getChecked('ids') == false) {
		alert('<?php echo langs('attdellall') ?>');
		return;
	}
	if(!confirm('<?php echo langs('attdellall') ?>')){return;}
	$("#form_media").submit();
}
setTimeout(hideActived,2600);				
$("#menu_action").addClass('active');
$("#menu_media").addClass('active-page');
function em_confirm (id, property, token) {
	switch (property){
	case 'media':
	var urlreturn="attachment.php?action=del_media&aid="+id;
       var msg = "<?php echo langs('attdellall') ?>";break;
}
	if(confirm(msg)){window.location = urlreturn + "&token="+token;}else {return;}
}			
</script>
