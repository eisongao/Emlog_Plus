<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('sort_management')?></li>
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
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_name_empty')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_no_order')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('alias_format_invalid')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('alias_unique')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('alias_no_keywords')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">		
<div class="table-wrap ">
<div class="table-responsive">
<form  method="post" action="sort.php?action=taxis">
<table id="adm_sort_list"  class="table table-striped table-bordered mb-0">
<thead>
<tr>
<th><b><?php echo langs('id')?></b></th>
<th><b><?php echo langs('name')?></b></th>
<th><b><?php echo langs('description')?></b></th>
<th><b><?php echo langs('alias')?></b></th>
<th><b><?php echo langs('template')?></b></th>
<th class="tdcenter"><b><?php echo langs('views')?></b></th>
<th class="tdcenter"><b><?php echo langs('posts')?></b></th>
<th class="tdcenter"><b><?php echo langs('operate')?></b></th>
</tr>
</thead>
<tbody>
<?php 
if($sorts):
foreach($sorts as $key=>$value):
	if ($value['pid'] != 0) {
		continue;
	}
?>
	<tr>
		<td>
			<input type="hidden" value="<?php echo $value['sid'];?>" class="sort_id" />
			<input maxlength="4" class="form-control  em-small" name="sort[<?php echo $value['sid']; ?>]" value="<?php echo $value['taxis']; ?>" />
		</td>
		<td class="sortname">
            <a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></a>
        </td>
<td><?php echo $value['description']; ?></td>
<td class="alias"><?php echo $value['alias']; ?></td>
<td class="alias">
  <?php if(empty($value['template'])){ ?>
  <?php echo langs('default')?>
  <?php }else{ ?>
 <?php echo $value['template']; ?>
 <?php } ?>
</td>
		<td class="tdcenter">
			<a href="<?php echo Url::sort($value['sid']); ?>" target="_blank"><img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
		</td>
		<td class="tdcenter"><a href="./admin_log.php?sid=<?php echo $value['sid']; ?>"><?php echo $value['lognum']; ?></a></td>
		<td class="tdcenter">
			<a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
			<a href="javascript: em_confirm(<?php echo $value['sid']; ?>, 'sort', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block"></i></a>
</td>
	</tr>
	<?php
		$children = $value['children'];
		foreach ($children as $key):
		$value = $sorts[$key];
	?>
	<tr>
		<td>
			<input type="hidden" value="<?php echo $value['sid'];?>" class="sort_id" />
			<input maxlength="4" class="form-control  em-small" name="sort[<?php echo $value['sid']; ?>]" value="<?php echo $value['taxis']; ?>" />
		</td>
		<td class="sortname">---- <a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></a></td>
		<td><?php echo $value['description']; ?></td>
<td class="alias"><?php echo $value['alias']; ?></td>
 <td class="alias">
  <?php if(empty($value['template'])){ ?>
  <?php echo langs('default')?>
  <?php }else{ ?>
 <?php echo $value['template']; ?>
 <?php } ?>
 </td>
		<td class="tdcenter">
			<a href="<?php echo Url::sort($value['sid']); ?>" target="_blank"><img src="./views/images/vlog.gif" align="absbottom" border="0" /></a>
		</td>
		<td class="tdcenter"><a href="./admin_log.php?sid=<?php echo $value['sid']; ?>"><?php echo $value['lognum']; ?></a></td>
		<td class="tdcenter">
			<a href="sort.php?action=mod_sort&sid=<?php echo $value['sid']; ?>" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
			<a href="javascript: em_confirm(<?php echo $value['sid']; ?>, 'sort', '<?php echo LoginAuth::genToken(); ?>');" class="care"  title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block mr-5"></i></a>
		</td>
	</tr>
	<?php endforeach; ?>
<?php endforeach;else:?>
	  <tr><td class="tdcenter" colspan="8"><?php echo langs('categories_no')?></td></tr>
<?php endif;?>  
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
<div class="modal-body" >
<form action="sort.php?action=add" method="post"
class="form-horizontal" >
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('id')?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="taxis" class="form-control  em-small"   >
            </div>											</div>
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('name')?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="sortname" id="sortname" class="form-control"   >
            </div>											</div>
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('alias')?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="alias" id="alias" class="form-control"   >
            </div>											</div>
 <div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('category_parent')?></label>
               <div class="col-lg-10"> 
                <select name="pid" id="pid" class="form-control">
			<option value="0"><?php echo langs('no')?></option>
			<?php
				foreach($sorts as $key=>$value):
					if($value['pid'] != 0) {
						continue;
					}
			?>
			<option value="<?php echo $key; ?>"><?php echo $value['sortname']; ?></option>
			<?php endforeach; ?>
		</select>
            </div>											</div>
            <div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('template')?></label>
               <div class="col-lg-10"> 
                <input type="text"  name="template" id="template" value="log_list"  class="form-control"   >
            </div>											</div>
            	<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('category_description')?></label>
               <div class="col-lg-10"> 
    <textarea name="description" type="text" class="form-control" style="height:60px;overflow:auto;"></textarea>
            </div>											</div>
            	<div class="form-group">
            	<div class="col-lg-10"> 
          <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
   <input type="submit" class="btn btn-primary" name="" id="addsort" value="<?php echo langs('category_new_add')?>" /></div>
   </div>					
 </form>
</div>
</div>
</div>									
</div>		
<script>
$("#alias").keyup(function(){checksortalias();});
function issortalias(a){
	var reg1=/^[\w-]*$/;
	var reg2=/^[\d]+$/;
	if(!reg1.test(a)) {
		return 1;
	}else if(reg2.test(a)){
		return 2;
	}else if(a=='post' || a=='record' || a=='sort' || a=='tag' || a=='author' || a=='page'){
		return 3;
	} else {
		return 0;
	}
}
function checksortalias(){
	var a = $.trim($("#alias").val());
	if (1 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error"><?php echo langs('alias_invalid_characters')?></span>');
	}else if (2 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error"><?php echo langs('alias_only_digits')?></span>');
	}else if (3 == issortalias(a)){
		$("#addsort").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error"><?php echo langs('alias_system_link')?></span>');
	}else {
		$("#alias_msg_hook").html('');
		$("#msg").html('');
		$("#addsort").attr("disabled", false);
	}
}
$(document).ready(function(){
	$("#adm_sort_list tbody tr:odd").addClass("tralt_b");
	$("#adm_sort_list tbody tr")
	.mouseover(function(){$(this).addClass("trover")})
	.mouseout(function(){$(this).removeClass("trover")});
	$("#menu_action").addClass('active');
	$("#menu_sort").addClass('active-page');
});
setTimeout(hideActived,2600);
</script>