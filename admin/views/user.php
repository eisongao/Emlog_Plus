<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('user_management')?></li>
</ul>
</div>              
 <?php if(isset($_GET['active_del'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('deleted_ok')?>
</div>
 <?php endif;?>
<?php if(isset($_GET['active_update'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('user_modify_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_add'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('user_add_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_login'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('user_name_empty')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_exist'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('user_name_exists')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_pwd_len'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('password_length_short')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_pwd2'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('passwords_not_equal')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_del_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('founder_not_delete')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_del_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('founder_not_edit')?>
</div>
<?php endif;?>             
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">		
<div class="table-wrap ">
<div <?php if(Option::get('responsive') == "y") echo 'class="table-responsive"'; ?>>
<form action="comment.php?action=admin_all_coms" method="post" name="form" id="form">
<table class="table table-striped table-bordered mb-0" id="adm_comment_list">
<thead>
 <tr>
 <th id="user_av" class="tdcenter" ><b><?php echo langs('avatar')?></b></th> <th id="user_t"><b><?php echo langs('user')?></b></th>
 <th id="user_d"><b><?php echo langs('description')?></b></th>
 <th id="user_e"><b><?php echo langs('email')?></b></th>
 <th id="user_p" class="tdcenter" ><b><?php echo langs('posts')?></b></th>
 <th id="user_o" class="tdcenter" ><b><?php echo langs('operate')?></b></th>
  </tr>
</thead>
<tbody>
<?php
	if($users):
	foreach($users as $key => $val):
	$avatar = empty($user_cache[$val['uid']]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[$val['uid']]['avatar'];
	?>
      <tr>
        <td id="user_av" style="padding:3px; text-align:center;"><img src="<?php echo $avatar; ?>" height="40" width="40" /></td>
		<td id="user_t">
		<?php echo empty($val['name']) ? $val['login'] : $val['name']; ?><br />
		<?php echo $val['role'] == ROLE_ADMIN ? $val['uid'] == 1 ? langs('founder') : langs('admin') : langs('user') ; ?>
        <?php if ($val['role'] == ROLE_WRITER && $val['ischeck'] == 'y') echo langs('posts_need_audit');?>
		</td>
<td id="user_d"><?php echo $val['description']; ?></td>
<td id="user_e"><?php echo $val['email']; ?></td>
<td id="user_p" class="tdcenter"><a href="./admin_log.php?uid=<?php echo $val['uid'];?>"><?php echo $sta_cache[$val['uid']]['lognum']; ?></a></td>
<td id="user_o" class="tdcenter" ><?php if (UID != $val['uid']): ?>
<a href="user.php?action=edit&uid=<?php echo $val['uid']?>" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
<a href="javascript: em_confirm(<?php echo $val['uid']; ?>, 'user', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block"></i></a><?php else:?>
<a href="blogger.php" title="<?php echo langs('edit')?>"><i class="zmdi zmdi-edit inline-block mr-5"></i></a>
<?php endif;?></td>
</tr>
<?php endforeach;else:?>
<tr><td class="tdcenter" colspan="6"><?php echo langs('no_authors_yet')?></td>
</tr>
<?php endif;?>
</tbody>
</table>
<div class="list_footer" style="padding-top:10px">
  <a href="#add_user" data-toggle="modal" class="btn btn-success"><?php echo langs('user_add')?>+</a>
  </div>
</form>		
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
<h6 class="panel-title txt-dark"><?php echo langs('have')?><?php echo $usernum; ?><?php echo langs('_users'); ?></h6>
<?php if(!empty($pageurl)){ ?>
 <div id="pagenav">
 <?php echo $pageurl; ?>
</div>
<?php }?>
</div>
</div>
</div>		
<div aria-hidden="true" role="dialog" tabindex="-1" id="add_user" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('user_add')?></h4>
</div>
<div class="modal-body">
<form action="user.php?action=new" method="post" class="form-horizontal" >
<div class="form-group">
<div class="col-lg-12"> 
<select name="role" id="role" class="form-control">
<option value="writer"><?php echo langs('author_contributor')?></option>
<option value="admin"><?php echo langs('admin')?></option>
</select>
 </div>											
 </div>
 <div class="form-group">
<label class="col-lg-2 control-label">
<?php echo langs('user_name')?>
</label>
<div class="col-lg-10"> 
<input name="login" type="text" id="login" value="" class="form-control" /> 
 </div>											
 </div>
 <div class="form-group">
<label class="col-lg-2 control-label">
<?php echo langs('website')?>
</label>
<div class="col-lg-10"> 
<input name="website" type="text" id="website" value="" class="form-control" /> 
 </div>											
 </div>
  <div class="form-group">
<label class="col-lg-2 control-label">
<?php echo langs('email')?>
</label>
<div class="col-lg-10"> 
<input name="email" type="text" id="email" value="" class="form-control" /> 
 </div>											
 </div>
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('password_min_length')?></label>
<div class="col-lg-10"> <input name="password" type="password" id="password" value="" class="form-control" />
</div>											
</div>
<div class="form-group">
<label class="col-lg-2 control-label"><?=langs('password_repeat')?></label>
<div class="col-lg-10"> <input name="password2" type="password" id="password2" value="" class="form-control" />
</div>											
</div>
<div class="form-group">
<div class="col-lg-12"  id="ischeck"> 
<select name="ischeck" class="form-control">
<option value="n"><?php echo langs('posts_not_need_audit')?></option><option value="y"><?php echo langs('posts_need_audit')?></option>
</select>
</div>											
</div>
<div class="form-group">
<div class="col-lg-10"> 
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
 <input type="submit" class="btn btn-primary" name="" value="<?php echo langs('user_add')?>"  />
 </div>	
 </div>					
</form>
</div>
</div>
</div>									
</div>						
<script>
$(document).ready(function(){
	$("#adm_comment_list tbody tr:odd").addClass("tralt_b");
	$("#adm_comment_list tbody tr")
		.mouseover(function(){$(this).addClass("trover");$(this).find("span").show();})
		.mouseout(function(){$(this).removeClass("trover");$(this).find("span").hide();})
    $("#role").change(function(){$("#ischeck").toggle()})
});
setTimeout(hideActived,2600);
$("#menu_user").addClass('active');
</script>