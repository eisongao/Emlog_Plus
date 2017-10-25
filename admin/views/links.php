<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="heading-bg  card-views">
 <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('friend_links')?></li>
  </ul>
</div>
<?php if(isset($_GET['active_taxis'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('order_update_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('deleted_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_edit'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('edit_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_hide'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('hide_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_hide_select'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('hide_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_move_select'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('move_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_del_select'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('deleted_ok')?>
</div>
<?php endif;?><?php if(isset($_GET['active_add'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('add_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('site_and_url_empty')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('no_link_order')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">	
<div class="tab-struct custom-tab-1">
<ul role="tablist" class="nav nav-tabs" id="myTabs_9">
<li class="active"><a href="links.php"> <?php echo langs('all_links') ?></a>
</li>
<li class="pull-right  dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="fa fa-outdent"></i>
</a>											 <select name="bysort" id="bysort" onChange="selectSort(this);" class="dropdown-menu bullet dropdown-menu-right form-control" >
            <option value="" selected="selected"><?php echo langs('category_view');?>...</option>
            <?php foreach($sortlink as $key=>$value):$flg = $value['linksort_id'] == $linksortid ? 'selected' : '';?>
            <option value="<?php echo $key; ?>" <?php echo $flg; ?>><?php echo $value['linksort_name']; ?></option>
            <?php endforeach; ?>
            <option value="-1" <?php if($linksortid == -1) echo 'selected'; ?>><?php echo langs('uncategorized');?></option>
        </select>
</li>
<li class="pull-right  dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-search"></i>
</a>
<span class="dropdown-menu  dropdown-menu-right" >
<input type="text" id="input_s" class="form-control" name="keyword" placeholder="<?php echo langs('links_keyword')?>" style="margin:10px 10px 10px 10px;width:90%">
</span>
</li>		
</ul>
</div>
<div class="clearfix"></div>
<div class="table-wrap ">
<div <?php if(Option::get('responsive') == "y") echo 'class="table-responsive"'; ?>>
<form action="link.php?action=operate_link" method="post" name="form_link" id="form_link">
<table id="adm_link_list"  class="table table-striped table-bordered mb-0">
<thead>
  <tr><th id="link_">#</th>
<th id="link_i"><b><?php echo langs('id') ?></b></th>
<th id="link_t"><b><?php echo langs('link') ?></b></th>
<th id="link_s" class="tdcenter"><b><?php echo langs('status') ?></b></th>
<th id="link_c" class="tdcenter"><b><?php echo langs('category')?></b></th>
<th id="link_v" class="tdcenter"><b><?php echo langs('views') ?></b></th>
<th id="link_d"><b><?php echo langs('description') ?></b></th>
<th  id="link_o"><b><?php echo langs('operate')?></b></th>
     </tr>
 </thead>
 <tbody>
    <?php 
    if($links):
    foreach($links as $key=>$value):
    $linkSortName = ($value['linksortid'] == -1 || $value['linksortid'] == 0) && !array_key_exists($value['linksortid'], $sortlink) ? langs('uncategorized') : $sortlink[$value['linksortid']]['linksort_name'];
    doAction('adm_link_display');
    ?>  
      <tr>
      <td id="link_"><input type="checkbox" name="linkids[]" value="<?php echo $value['id']; ?>" class="ids" />
      </td>
<td id="link_i"><input class="form-control  em-small"   name="link[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>" /></td>
<td id="link_t"><a href="link.php?action=mod_link&amp;linkid=<?php echo $value['id']; ?>" title="<?php echo langs('edit_link')?>"><?php echo $value['sitename']; ?></a></td>
		<td id="link_s" class="tdcenter">
		<?php if ($value['hide'] == 'n'): ?>
		<a href="link.php?action=hide&amp;linkid=<?php echo $value['id']; ?>" title="<?php echo langs('link_hide')?>"><?php echo langs('visible')?></a>
		<?php else: ?>
		<a href="link.php?action=show&amp;linkid=<?php echo $value['id']; ?>" title="<?php echo langs('link_show')?>" style="color:red;"><?php echo langs('hidden')?></a>
		<?php endif;?>
		</td>
		<td id="link_c" class="tdcenter">
		<?php echo $linkSortName; ?>
		</td>
		<td id="link_v" class="tdcenter">
	  	<a href="<?php echo $value['siteurl']; ?>" target="_blank" title="<?php echo langs('view_link') ?>">
	  	<img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
	  	</td>
        <td id="link_d"><?php echo $value['description']; ?></td>
        <td id="link_o">
        <a href="link.php?action=mod_link&amp;linkid=<?php echo $value['id']; ?>" title="<?php echo langs('edit') ?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
        <a href="javascript: em_confirm(<?php echo $value['id']; ?>, 'link', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete') ?>"><i class="zmdi zmdi-delete inline-block"></i></a>
        </td>
      </tr>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="7"><?php echo langs('no_links') ?></td></tr>
	<?php endif;?>
    </tbody>
  </table>
  </div>
  <input type="hidden" name="linksortid" id="linksortid" value="<?php echo $linksortid; ?>" />
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
  <input name="operate" id="operate" value="" type="hidden" />
    <div class=" form-group form-inline" style="padding-top:10px">
<a href="javascript:void(0);" id="select_all"><?php echo langs('select_all');?></a> <?php echo langs('selected_items');?>：
    <a href="javascript:linkact('del');" class="care"><?php echo langs('delete');?></a> | 
	<a href="javascript:linkact('hide');"><?php echo langs('hidden');?></a> | 
    <a href="javascript:linkact('show');"><?php echo langs('visible');?></a> | 
	<select name="linksort" id="linksort" onChange="changeLinkSort(this);" class="form-control"  >
	<option value="" selected="selected"><?php echo langs('move_to_category');?>...</option>
    <?php foreach($sortlink as $key=>$value):?>
    <option value="<?php echo $value['linksort_id']; ?>"><?php echo $value['linksort_name']; ?></option>
	<?php endforeach;?>
	<option value="-1"><?php echo langs('uncategorized');?></option>
	</select>
</div>
<div class="list_footer" style="padding-top:10px">
<input type="submit" value="<?php echo langs('order_change') ?>" id="select_order" class="btn btn-primary" /> 
 <a href="#addlink" data-toggle="modal" class="btn btn-success"><?php echo langs('link_add') ?>+</a>
 </div>
</form>		
</div>
</div>
</div>
</div>	
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="form-group text-center">
<h6 class="panel-title txt-dark"><?php echo langs('have')?> <?php echo $linkNum; ?> <?php echo langs('links_of_items')?></h6>
<?php if(!empty($pageurl)){ ?>
 <div id="pagenav">
 <?php echo $pageurl; ?>
</div>
<?php }?>
</div>
</div>
</div>		
</div>
</div>		
<div aria-hidden="true" role="dialog" tabindex="-1" id="addlink" class="modal fade" style="display: none;">	
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('link_add') ?></h4>
</div>
<div class="modal-body">
<form action="link.php?action=addlink" method="post" name="link" class="form-horizontal" id="link">
	<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('id') ?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="taxis"    class="form-control  em-small"   >
            </div>											</div>
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('name') ?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="sitename"    class="form-control"   >
            </div>											</div>
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('address') ?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="siteurl"    class="form-control"   >
            </div>											</div>
 <div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('sitepic') ?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="sitepic"    class="form-control"   >
            </div>											</div>
 <div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('category_select');?></label>
 <div class="col-lg-10">             
 <select name="linksortid" id="linksortid" class="form-control">
        <option value="-1"><?php echo langs('uncategorized');?></option>
        <?php foreach($sortlink as $key=>$value):?>
        <option value="<?php echo $key; ?>"><?php echo $value['linksort_name']; ?></option>
        <?php endforeach; ?>
    </select>      
                  </div>											</div>   
            	<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('description') ?></label>
               <div class="col-lg-10"> 
    <textarea name="description" type="text" class="form-control" style="height:60px;overflow:auto;"></textarea>
            </div>											</div>
            	<div class="form-group">
            	<div class="col-lg-10"> 
<input type="submit" class="btn btn-primary" name="" value="<?php echo langs('add_s') ?>"  /></div>
</div>
</div>					
</form>
</div>
</div>
</div>	
</div>
<script>
$(document).ready(function(){
selectAllToggle();
$("#adm_link_list tbody tr:odd").addClass("tralt_b");
$("#adm_link_list tbody tr").mouseover(function(){$(this).addClass("trover")}).mouseout(function(){$(this).removeClass("trover")})
});
function linkact(act){
	if (getChecked('ids') == false) {
		alert('<?php echo langs('links_operation_select') ?>');
		return;}
	if(act == 'del' && !confirm('<?php echo langs('links_selected_delete_sure') ?>')){
	return;
	}
	$("#operate").val(act);
	$("#form_link").submit();
}
function changeLinkSort(obj) {
	if (getChecked('ids') == false) {
		alert('<?php echo langs('links_operation_select') ?>');
		return;}
	if($('#linksort').val() == '')return;
	$("#operate").val('move');
	$("#form_link").submit();
}

$("#select_order").click(function(){
	$("#form_link").attr("action","link.php?action=link_taxis");
	$("#form_link").submit();
})
function selectSort(obj) {
    window.open("./link.php?linksortid=" + obj.value, "_self");
}
setTimeout(hideActived,2600);
$("#menu_link").addClass('active-page');
$("#menu_links").addClass('active');
</script>