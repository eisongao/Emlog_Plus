<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li><li class="active">
<?php echo langs('page_management') ?></li>
</ul>
</div>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('page_deleted_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_hide_n'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('page_published_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_hide_y'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('page_disabled_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_pubpage'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('page_saved_ok') ?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="table-wrap ">
<div class="table-responsive">
<form action="page.php?action=operate_page" method="post" name="form_page" id="form_page">
<input type="hidden" name="pid" value="<?php echo $pid; ?>">
<table class="table table-striped table-bordered mb-0">
  	<thead>
      <tr>
       <th><b>#</b></th> 
        <th><b><?php echo langs('title') ?></b></th>
        <th><b><?php echo langs('views') ?></b></th>
        <th class="tdcenter"><b><?php echo langs('template')?></b></th>
        <th class="tdcenter"><b><?php echo langs('comments')?></b></th>
        <th class="tdcenter"><b><?php echo langs('time')?></b></th>
      </tr>
    </thead>
    <tbody>
	<?php
	if($pages):
	foreach($pages as $key => $value):
	if (empty($navibar[$value['gid']]['url']))
	{
		$navibar[$value['gid']]['url'] = Url::log($value['gid']);
	}
	$isHide = $value['hide'] == 'y' ? 
'<font color="red">'.langs('drafts').'</font>' : 
	'<a href="'.$navibar[$value['gid']]['url'].'" target="_blank" title="'.langs('page_view').'"><img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>';
	?>
     <tr>
     	<td width="21"><input type="checkbox" name="page[]" value="<?php echo $value['gid']; ?>" class="ids" /></td>
        <td>
        <a href="page.php?action=mod&id=<?php echo $value['gid']?>"><?php echo $value['title']; ?></a> 
   		   <?php if($value['attnum'] > 0): ?><img src="./views/images/att.gif" align="top" title="<?php echo langs('attachments')?>：<?php echo $value['attnum']; ?>" /><?php endif; ?>
        </td>
        <td><?php echo $isHide; ?> </td>        
        <td class="tdcenter"><?php if(empty($value['template'])){ ?><font color="#00A3A3"><?php echo langs('default')?></font><?php }else{ ?><?php echo $value['template']; ?><?php }?></td>
        <td class="tdcenter"><a href="comment.php?gid=<?php echo $value['gid']; ?>"><?php echo $value['comnum']; ?></a></td>
        <td class="tdcenter"><?php echo $value['date']; ?></td>
     </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="6"><?php echo langs('no_pages')?></td></tr>
	<?php endif;?>
	</tbody>
  </table>
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
  <input name="operate" id="operate" value="" type="hidden" />
</form>
  </div>
 <div class="list_footer" style="padding-top:10px">
<a href="javascript:void(0);" id="select_all"><?php echo langs('select_all')?></a> <?php echo langs('selected_items')?>：
<a href="javascript:pageact('del');" class="care"><?php echo langs('delete')?></a> | 
<a href="javascript:pageact('hide');"><?php echo langs('make_draft')?></a> | 
<a href="javascript:pageact('pub');"><?php echo langs('publish')?></a>
</div>
<div class="form-group">
<a href="page.php?action=new" class="btn btn-success"><?php echo langs('add_page')?>+</a>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="form-group text-center">
<h6 class="panel-title txt-dark"><?php echo langs('have')?><?php echo $pageNum; ?><?php echo langs('_pages')?></h6>
<?php if(!empty($pageurl)){ ?>
 <div id="pagenav">
 <?php echo $pageurl; ?>
</div>
<?php } ?>
</div>
</div>
</div>	
<script>
$(document).ready(function(){
    $("#adm_comment_list tbody tr:odd").addClass("tralt_b");
    $("#adm_comment_list tbody tr")
        .mouseover(function(){$(this).addClass("trover")})
        .mouseout(function(){$(this).removeClass("trover")});
    selectAllToggle();
});
setTimeout(hideActived,2600);
function pageact(act){
    if (getChecked('ids') == false) {
       alert('<?php echo langs('select_page_to_operate')?>');
        return;}
    if(act == 'del' && !confirm('<?php echo langs('sure_delete_selected_pages')?>')){return;}
    $("#operate").val(act);
    $("#form_page").submit();
}
$("#menu_action").addClass('active');
$("#menu_page").addClass('active-page');
</script>