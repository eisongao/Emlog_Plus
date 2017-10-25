<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('nav_settings')?></li>
</ul>
</div>
<?php if(isset($_GET['active_taxis'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_update_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_delete_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_edit'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_edit_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_add'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_add_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_name_url_empty')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_no_order')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_default_nodelete')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('select_category')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('select_page')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_f'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('nav_url_invalid')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="table-wrap ">
<div <?php if(Option::get('responsive') == "y") echo 'class="table-responsive"'; ?>>		
<form action="navbar.php?action=taxis" method="post">
<table class="table table-striped table-bordered mb-0">
    <thead>
      <tr><th id="nav_i"><b><?php echo langs('id')?></b></th> 
<th id="nav_t"><b><?php echo langs('navigation')?></b></th>
<th id="nav_c" class="tdcenter"><b><?php echo langs('type')?></b></th>
<th id="nav_s" class="tdcenter"><b><?php echo langs('status')?></b></th>
<th  id="nav_v" class="tdcenter"><b><?php echo langs('view')?></b></th>
<th id="nav_a"><b><?php echo langs('address')?></b></th>
<th id="nav_o" class="tdcenter"><b><?php echo langs('operate')?></b></th>
      </tr>
</thead>
    <tbody>
	<?php 
	if($navis):
	foreach($navis as $key=>$value):
        if ($value['pid'] != 0) {
            continue;
        }
        $value['type_name'] = '';
        switch ($value['type']) {
            case Navi_Model::navitype_home:
            case Navi_Model::navitype_t:
            case Navi_Model::navitype_admin:
                $value['type_name'] =langs('system');
                break;
            case Navi_Model::navitype_sort:
                $value['type_name'] = '<font color="blue">'.langs('category').'</font>';
                break;
            case Navi_Model::navitype_page:
                $value['type_name'] = '<font color="#00A3A3">'.langs('page').'</font>';
                break;
            case Navi_Model::navitype_custom:
                $value['type_name'] = '<font color="#FF6633">'.langs('custom').'</font>';
                break;
        }
        doAction('adm_navi_display');    
	?>  
<tr>
<td id="nav_i"><input class="form-control  em-small" name="navi[<?php echo $value['id']; ?>]" value="<?php echo $value['taxis']; ?>"/>
</td>
<td id="nav_t"><a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>" title="<?php echo langs('nav_edit')?>"><?php echo $value['naviname']; ?></a>
</td>
<td id="nav_c" class="tdcenter">
<?php echo $value['type_name'];?>
</td>
<td id="nav_v" class="tdcenter">
		<?php if ($value['hide'] == 'n'): ?>
		<a href="navbar.php?action=hide&amp;id=<?php echo $value['id']; ?>" title="<?php echo langs('nav_hide_click')?>"><?php echo langs('show')?></a>
		<?php else: ?>
		<a href="navbar.php?action=show&amp;id=<?php echo $value['id']; ?>" title="<?php echo langs('nav_show_click')?>" style="color:red;"><?php echo langs('hide')?></a>
		<?php endif;?>
</td>
<td id="nav_s" class="tdcenter"><a href="<?php if(empty($value['url'])){?>../<?php }else{?><?php echo $value['url']; ?><?php } ?>" target="_blank">
<img src="./views/images/<?php echo $value['newtab'] == 'y' ? 'vlog.gif' : 'vlog2.gif';?>" align="absbottom" border="0" /></a></td>
<td id="nav_a"><?php if(empty($value['url'])){?>index.php<?php }else{?><?php echo $value['url']; ?><?php } ?></td>
<td id="nav_o" class="tdcenter">
        <a href="navbar.php?action=mod&amp;navid=<?php echo $value['id']; ?>" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
        <?php if($value['isdefault'] == 'n'):?>
        <a href="javascript: em_confirm(<?php echo $value['id']; ?>, 'navi', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block"></i></a>
        <?php endif;?></td>
</tr>
<?php
		if(!empty($value['childnavi'])):
		foreach ($value['childnavi'] as $val):
?>
 <tr>
<td id="nav_i">
<input class="form-control  em-small" name="navi[<?php echo $val['id']; ?>]" value="<?php echo $val['taxis']; ?>" maxlength="4" />
</td>
<td id="nav_t">---- <a href="navbar.php?action=mod&amp;navid=<?php echo $val['id']; ?>" title="<?php echo langs('nav_edit')?>"><?php echo $val['naviname']; ?></a>
</td>
<td id="nav_c" class="tdcenter">
<?php echo $value['type_name'];?>
</td>
<td  id="nav_v" class="tdcenter">
		<?php if ($val['hide'] == 'n'): ?>
		<a href="navbar.php?action=hide&amp;id=<?php echo $val['id']; ?>" title="<?php echo langs('nav_hide_click')?>"><?php echo langs('show')?></a>
		<?php else: ?>
		<a href="navbar.php?action=show&amp;id=<?php echo $val['id']; ?>" title="<?php echo langs('nav_hide_click')?>" style="color:red;"><?php echo langs('hide')?></a>
		<?php endif;?>
</td>
<td id="nav_a" class="tdcenter">
	  	<a href="<?php echo $val['url']; ?>" target="_blank">
	  	<img src="./views/images/<?php echo $val['newtab'] == 'y' ? 'vlog.gif' : 'vlog2.gif';?>" align="absbottom" border="0" /></a>
</td>
<td id="nav_a"><?php echo $val['url']; ?></td>
 <td  id="nav_o" class="tdcenter">
        <a href="navbar.php?action=mod&amp;navid=<?php echo $val['id']; ?>" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
        <?php if($val['isdefault'] == 'n'):?>
        <a href="javascript: em_confirm(<?php echo $val['id']; ?>, 'navi', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block"></i></a>
        <?php endif;?>
 </td>
</tr>
      <?php endforeach;endif; ?>
	<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="4"><?php echo langs('nav_no')?></td>
</tr>
	<?php endif;?>
    </tbody>
</table>
<div class="list_footer" style="padding-top:10px">
  <input type="submit" value="<?php echo langs('order_change')?>" class="btn btn-success" />
  <a href="#add_nav" data-toggle="modal" class="inline-block btn btn-warning" /><?php echo langs('nav_add_nav')?>
</a>
</div>
</form>
</div>
</div>
</div>
</div>
<div aria-hidden="true" role="dialog" tabindex="-1" id="add_nav" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('nav_add_nav')?></h4>
</div>
<div class="modal-body">
<div class="form-group">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('nav_add_custom')?></h6>
</div>
<div class="clearfix"></div>
</div>							
<div class="tab-content">
<form action="navbar.php?action=add" method="post" name="navi" id="navi">
<div class="form-group">
<label><?php echo langs('id')?></label>
<input maxlength="4" class="em-small form-control"  name="taxis" />
</div>
<div class="form-group">
<label><?php echo langs('nav_name')?></label>
<input maxlength="200" class="form-control" name="naviname" />
</div>
<div class="form-group">
<label><?php echo langs('nav_url_http')?></label>
<input maxlength="200" class="form-control" name="url" id="url" />
</div>
<div class="form-group form-inline">
<label><?php echo langs('nav_parent')?></label>
 <select name="pid" id="pid" class="form-control">
 <option value="0"><?php echo langs('no')?></option>
  <?php
  foreach($navis as $key=>$value):
    if($value['type'] != Navi_Model::navitype_custom || $value['pid'] != 0) {
        continue;
        }
   ?>
  <option value="<?php echo $value['id']; ?>"><?php echo $value['naviname']; ?></option>
   <?php endforeach; ?>
  </select>
</div>
 <div class="form-group checkbox checkbox-info"> 
<input type="checkbox" style="vertical-align:middle;" value="y" name="newtab" />
<label><?php echo langs('open_new_win')?></label>
</div>
<div class="form-group text-center">	
<input type="submit" class="btn btn-primary" name="" value="<?php echo langs('add')?>"  />
</div>
 </form>
<div class="form-group">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('nav_add_category')?></h6>
</div>
<div class="clearfix"></div>
</div>
<form action="navbar.php?action=add_sort" method="post" name="navi" id="navi">			
<div class="todo-box-wrap">
<ul  class="todo-list">
	<?php 
	if($sorts):
    foreach($sorts as $key=>$value):
	if ($value['pid'] != 0) {
		continue;
	}
    ?>
<li class="todo-item">
<div class="checkbox checkbox-danger">
<input type="checkbox"  name="sort_ids[]" value="<?php echo $value['sid']; ?>" class="ids" />
<label ><?php echo $value['sortname']; ?></label >
</li>
<li>
<hr class="light-grey-hr">
</li>
	<?php
		$children = $value['children'];
		foreach ($children as $key):
		$value = $sorts[$key];
	?>
<li class="todo-item">
<div class="checkbox checkbox-danger">
        &nbsp; &nbsp; &nbsp;  <input type="checkbox" style="vertical-align:middle;" name="sort_ids[]" value="<?php echo $value['sid']; ?>" class="ids" />
<label ><?php echo $value['sortname']; ?></label >
</li>
<li>
<hr class="light-grey-hr">
</li>
<?php 
  endforeach;
   endforeach;
 ?>
</div>
<div class="form-group text-center" style="padding-top:10px">	
<input type="submit" name="" class="btn btn-info"  value="<?php echo langs('add')?>"  /></div>
	<?php else:?>
<li class="list-group-item node-treeview3">
<?php echo langs('no_categories')?>,<a href="sort.php"><?php echo langs('new_category')?></a>
</li>
	<?php endif;?> 
</ul>
</div>
</form>
<div class="form-group">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('nav_page_add')?></h6>
</div>
<div class="clearfix"></div>
</div>	
<form action="navbar.php?action=add_page" method="post" name="navi" id="navi">			
<div class="todo-box-wrap">
<ul  class="todo-list">
	<?php 
	if($pages):
	foreach($pages as $key=>$value): 
	?>
<li class="todo-item">
<div class="checkbox checkbox-danger">
        <input type="checkbox" name="pages[<?php echo $value['gid']; ?>]" value="<?php echo $value['title']; ?>" class="ids" />
	<label ><?php echo $value['title']; ?></label>
</div>
</li>
<li>
<hr class="light-grey-hr">
</li>
	<?php endforeach;?>
	</div>
	<div class="form-group text-center" style="padding-top:10px">	
	<input type="submit" name="" class="btn btn-success"  value="<?php echo langs('add')?>"  />
	</div>
	<?php else:?>
	<li class="list-group-item node-treeview3"><?php echo langs('pages_no')?>,<a href="page.php"><?php echo langs('add_page')?></a></li>
	<?php endif;?> 
</ul>
</div>
</form>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
	$("#adm_navi_list tbody tr:odd").addClass("tralt_b");
	$("#adm_navi_list tbody tr")
		.mouseover(function(){$(this).addClass("trover")})
		.mouseout(function(){$(this).removeClass("trover")})
});
setTimeout(hideActived,2600);
$("#menu_action").addClass('active');
$("#menu_navbar").addClass('active-page');
</script>