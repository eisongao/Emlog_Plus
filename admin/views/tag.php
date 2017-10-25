<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
 <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active"><?php echo langs('tag_management')?></li>
  </ul>
</div>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('tag_delete_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_edit'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('tag_modify_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('tag_select_to_delete')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<form action="tag.php?action=dell_all_tag" method="post" name="form_tag" id="form_tag">
<?php 
if($tags):
foreach($tags as $key=>$value): ?>	
<span class="tag label "><input type="checkbox" name="tag[<?php echo $value['tid']; ?>]" class="ids" value="1" >
<a href="tag.php?action=mod_tag&tid=<?php echo $value['tid']; ?>"><?php echo $value['tagname']; ?></a></span>
<?php endforeach; ?>
 <div class="form-group">
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
<a href="javascript:void(0);" id="select_all"><?php echo langs('select_all')?></a> <?php echo langs('selected_items')?>：
<a href="javascript:deltags();" class="care"><?php echo langs('delete')?></a>
</div>
<?php else:?>
<li style="margin:20px 30px"><?php echo langs('tags_no_info')?></li>
<?php endif;?>
</div>
</form>
</div>
</div>
</div><script>
selectAllToggle();
function deltags(){
	if (getChecked('ids') == false) {
		alert('<?php echo langs('tag_select_to_delete')?>');
		return;
	}
	if(!confirm('<?php echo langs('tag_delete_sure')?>')){return;}
	$("#form_tag").submit();
}
setTimeout(hideActived,2600);
$("#menu_action").addClass('active');
$("#menu_tag").addClass('active-page');
</script>