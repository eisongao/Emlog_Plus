<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('links_sort')?></li>
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
<?php echo langs('category_deleted_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_edit'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_modify_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_add'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_add_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_name_empty')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="actived alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_no_order')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">		
<div class="table-wrap ">
<div class="table-responsive">
<form  method="post" action="sortlink.php?action=taxis">
<table id="adm_sort_list"  class="table table-striped table-bordered mb-0">
<thead>
    <tr>
    <th class="tdcenter"><b><?php echo langs('id')?></b></th>
    <th class="tdcenter"><b><?php echo langs('name')?></b></th>
    <th class="tdcenter"><b><?php echo langs('sort_num')?></b></th>
    <th class="tdcenter"><?php echo langs('operate')?></th>
</tr>
</thead>
<tbody>
<?php if($sortlink):
foreach($sortlink as $key=>$value):?>
<tr>
    <td>
        <input type="hidden" value="<?php echo $value['linksort_id'];?>" class="sort_id" />
        <input maxlength="4" class="form-control  em-small"   name="sortlink[<?php echo $value['linksort_id']; ?>]" value="<?php echo $value['taxis']; ?>" />
    </td>
    <td class="sortname">
        <a href="sortlink.php?action=mod_sortlink&linksort_id=<?php echo $value['linksort_id']; ?>"><?php echo $value['linksort_name']; ?></a>
    </td>
    <td class="tdcenter"><a href="./link.php?linksortid=<?php echo $value['linksort_id']; ?>"><?php echo $value['linknum']; ?></a></td>
    <td class="tdcenter">
        <a href="sortlink.php?action=mod_sortlink&linksort_id=<?php echo $value['linksort_id']; ?>" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
        <a href="javascript: em_confirm(<?php echo $value['linksort_id']; ?>, 'sortlink', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block"></i></a>
    </td>
</tr>
<?php endforeach;else:?><tr><td class="tdcenter" colspan="8"><?php echo langs('categories_no')?></td></tr><?php endif;?>  
</tbody>
</table>
<div class="list_footer" style="padding-top:10px">
      <input type="submit" value="<?php echo langs('order_change')?>" class="btn btn-primary" /> 
      <a href="#addsort" data-toggle="modal" class="btn btn-success"><?php echo langs('category_add')?>+</a>
  </div>
</form>
</div>
</div>
</div>
<div aria-hidden="true" role="dialog" tabindex="-1" id="addsort" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('category_add')?></h4>
</div>
<div class="modal-body">
<form action="sortlink.php?action=add" method="post" class="form-horizontal" >
 <div class="form-group">
<label class="col-lg-2 control-label">
<?php echo langs('id')?>
</label>
<div class="col-lg-10"> 
<input  type="text" maxlength="4" name="taxis"  class="form-control  em-small"/> 
 </div>											
 </div>
 <div class="form-group">
<label class="col-lg-2 control-label">
<?php echo langs('name')?>
</label>
<div class="col-lg-10"> 
<input  type="text" name="linksort_name" id="linksort_name" class="form-control" /> 
 </div>											
 </div>
<div class="form-group">
<div class="col-lg-10"> 
    <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
 <input type="submit" class="btn btn-primary" name="" value="<?php echo langs('category_add')?>"  />
 </div>	
 </div>					
</form>
</div>
</div>
</div>									
</div>
<script>
$(document).ready(function(){
	$("#adm_sort_list tbody tr:odd").addClass("tralt_b");
	$("#adm_sort_list tbody tr")
	.mouseover(function(){$(this).addClass("trover")})
	.mouseout(function(){$(this).removeClass("trover")});
});
setTimeout(hideActived,2600);
$("#menu_linksort").addClass('active-page');
$("#menu_links").addClass('active');
</script>