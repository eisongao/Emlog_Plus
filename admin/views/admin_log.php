<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
$isdraft = $pid == 'draft' ? '&pid=draft' : '';
$isDisplaySort = !$sid ? "style=\"display:none;\"" : '';
$isDisplayTag = !$tagId ? "style=\"display:none;\"" : '';
$isDisplayUser = !$uid ? "style=\"display:none;\"" : '';
?><div class="heading-bg  card-views">
 <ul class="breadcrumbs">
  <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li><li class="active">
<?php if($pid != "draft"):?>
 <?php echo langs('all') ?>
 <?php else : ?>
 <?php echo langs('draft_manage') ?>
 <?php endif ?>
  </li>
 </ul>
</div>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <?php echo langs('deleted_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_up'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <?php echo langs('sticked_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_down'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <?php echo langs('unsticked_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="actived alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <?php echo langs('select_post_to_operate') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="actived alert alert-warning alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <?php echo langs('select_action_to_perform') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_post'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('published_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_move'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('moved_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_change_author'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('author_modified_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_hide'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('draft_moved_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_savedraft'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('draft_saved_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_savelog'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('saved_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_ck'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('audited_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_unck'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('rejected_ok') ?>
</div>
<?php endif;?>
<div class="row"  id="f_tag" <?php echo $isDisplayTag ?>>
<div class="col-lg-12">
<div class="panel panel-info card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-light"><?php echo langs('tags') ?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<?php 
    if(empty($tags)) echo langs('tags_no');
    foreach($tags as $val):
		$a = 'tag_'.$val['tid'];
		$$a = '';
		$b = 'tag_'.$tagId;
		$$b = "class=\"filter\"";
	?>	
	<span <?php echo $$a; ?>><a href="./admin_log.php?tagid=<?php echo $val['tid'].$isdraft; ?>"><?php echo $val['tagname']; ?></a></span>
	<?php endforeach;?>
									</div>
								</div>
							</div>
						</div>	
			</div>		
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="tab-struct custom-tab-1">
<ul role="tablist" class="nav nav-tabs" id="myTabs_9">
<li <?php if($pid != "draft"){?>class="active"<?php } ?>><a href="admin_log.php"> <?php echo langs('all') ?></a></li>
<li  <?php if ($pid == 'draft'){echo 'class="active"';}?>><a href="admin_log.php?pid=draft"> <?php echo langs('draft') ?></a></li>
<li class="pull-right">
<a id="f_t_tag"  href="javascript:void(0);">
<i class="zmdi zmdi-flag"></i>
</a>
</li>
<li class="pull-right  dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="fa fa-outdent"></i>
</a>											<select name="bysort" id="bysort" onChange="selectSort(this);" class="dropdown-menu bullet dropdown-menu-right form-control" >
            <option value="" selected="selected"><?php echo langs('category_view') ?></option>
            <?php 
            foreach($sorts as $key=>$value):
            if ($value['pid'] != 0) {
                continue;
            }
            $flg = $value['sid'] == $sid ? 'selected' : '';
            ?>
            <option value="<?php echo $value['sid']; ?>" <?php echo $flg; ?>><?php echo $value['sortname']; ?></option>
            <?php
                $children = $value['children'];
                foreach ($children as $key):
                $value = $sorts[$key];
                $flg = $value['sid'] == $sid ? 'selected' : '';
            ?>
            <option value="<?php echo $value['sid']; ?>" <?php echo $flg; ?>>&nbsp; &nbsp; &nbsp; <?php echo $value['sortname']; ?></option>
            <?php
            endforeach;
            endforeach;
            ?>
            <option value="-1" <?php if($sid == -1) echo 'selected'; ?>><?php echo langs('uncategorized')?></option>
            </select>
</li>
<?php if (ROLE == ROLE_ADMIN && count($user_cache) > 1):?>
<li class="pull-right dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button">
<i class="zmdi zmdi-male-female"></i>
</a>											
<select name="byuser" id="byuser" onChange="selectUser(this);" class="dropdown-menu bullet dropdown-menu-right form-control">
                <option value="" selected="selected"><?php echo langs('view_by_author')?></option>
                <?php 
                foreach($user_cache as $key=>$value):
                $flg = $key == $uid ? 'selected' : '';
                ?>
                <option value="<?php echo $key; ?>" <?php echo $flg; ?>><?php echo $value['name']; ?></option>
                <?php
                endforeach;
                ?>
            </select>
     </li>
<?php endif;?>
</ul>
</div>
<div class="clearfix"></div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="tab-content" id="myTabContent_9">
<div id="plus" class="tab-pane fade active in" role="tabpanel">
<form action="admin_log.php?action=operate_log" method="post" name="form_log" id="form_log">
  <input type="hidden" name="pid" value="<?php echo $pid; ?>">	
<div class="table-wrap ">
<div <?php if(Option::get('responsive') == "y") echo 'class="table-responsive"'; ?>>		
<table class="table table-striped table-bordered mb-0">
<thead>
  <tr>
<th id="log_">#</th>
<th id="log_t"><?php echo langs('title')?></th>
<th id="log_v"><?php echo langs('view')?></th><th id="log_c"><?php echo langs('category')?></th>
<th id="log_u"><?php echo langs('user')?></th>
<th id="log_d"><?php echo langs('time')?></th>
<th id="log_com"><?php echo langs('comments')?></th>
<th id="log_r"><?php echo langs('reads')?></th>
</tr>
</thead>
<tbody>
 <?php
    if($logs):
    foreach($logs as $key=>$value):
    $sortName = $value['sortid'] == -1 && !array_key_exists($value['sortid'], $sorts) ? langs('uncategorized') : $sorts[$value['sortid']]['sortname'];
    $author = $user_cache[$value['author']]['name'];
    $author_role = $user_cache[$value['author']]['role'];
    ?>												  <tr>
<td id="log_"><input type="checkbox" name="blog[]" value="<?php echo $value['gid']; ?>" class="ids" /></td>
<td id="log_t"><a href="write_log.php?action=edit&gid=<?php echo $value['gid']; ?>"><?php echo $value['title']; ?></a>
      <?php if($value['top'] == 'y'): ?><img src="./views/images/top.png" align="top" title="<?php echo langs('home_top')?>" /><?php endif; ?>
      <?php if($value['sortop'] == 'y'): ?><img src="./views/images/sortop.png" align="top" title="<?php echo langs('category_top')?>" /><?php endif; ?>
      <?php if($value['attnum'] > 0): ?><img src="./views/images/att.gif" align="top" title="<?php echo langs('attachment_num')?>：<?php echo $value['attnum']; ?>" /><?php endif; ?>
      <?php if($pid != 'draft' && $value['checked'] == 'n'): ?><sapn style="color:red;"> - <?php echo langs('pending')?></sapn><?php endif; ?>
      <span>
        <?php if($pid != 'draft' && ROLE == ROLE_ADMIN && $value['checked'] == 'n'): ?>
       { <a href="./admin_log.php?action=operate_log&operate=check&gid=<?php echo $value['gid']?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('approve')?></a> }
        <?php elseif($pid != 'draft' && ROLE == ROLE_ADMIN && $author_role == ROLE_WRITER):?>
       { <a href="./admin_log.php?action=operate_log&operate=uncheck&gid=<?php echo $value['gid']?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('reject')?></a> 
        }
        <?php endif;?>
      </span>
      </td>										<td id="log_v"><a href="<?php echo Url::log($value['gid']); ?>" target="_blank" title="<?php echo langs('open_new_window')?>">
      <img src="./views/images/vlog.gif" align="absbottom" border="0" /></a></td>
													<td id="log_c"><a href="./admin_log.php?sid=<?php echo $value['sortid'].$isdraft;?>"><?php echo $sortName; ?></a></td>
													<td id="log_u"><a href="./admin_log.php?uid=<?php echo $value['author'].$isdraft;?>"><?php echo $author; ?></a></td>
													 <td id="log_d" class="small"><?php echo $value['date']; ?></td>
													  <td id="log_com" class="tdcenter"><a href="comment.php?gid=<?php echo $value['gid']; ?>"><?php echo $value['comnum']; ?></a></td>
      <td id="log_r" class="tdcenter"><?php echo $value['views']; ?></a></td>
 </tr>
 <?php endforeach;else:?>
      <tr><td class="tdcenter" colspan="8"><?php echo langs('yet_no_posts')?></td></tr>
    <?php endif;?>
</tbody>
</table>										
</div>
</div>
<div class="clearfix"></div>						
 <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
    <input name="operate" id="operate" value="" type="hidden" />
    <div class=" form-group form-inline" style="padding-top:10px">
    <a href="javascript:void(0);" id="select_all"><?php echo langs('select_all')?></a> <?php echo langs('selected_items')?>：
    <a href="javascript:logact('del');" class="care"><?php echo langs('delete')?></a> | 
    <?php if($pid == 'draft'): ?>
    <a href="javascript:logact('pub');"><?php echo langs('publish')?></a>
    <?php else: ?>
    <a href="javascript:logact('hide');"><?php echo langs('add_draft')?></a>
    <?php if (ROLE == ROLE_ADMIN):?>
    <select name="top" id="top" onChange="changeTop(this);" class="form-control">
        <option value="" selected="selected"><?php echo langs('top_action')?>...</option>
        <option value="top"><?php echo langs('home_top')?></option>
        <option value="sortop"><?php echo langs('category_top')?></option>
        <option value="notop"><?php echo langs('unstick')?></option>
    </select>
    <?php endif;?>

	<select name="sort" id="sort" onChange="changeSort(this);" class="form-control">
	<option value="" selected="selected"><?php echo langs('move_to_category')?>...</option>

    <?php 
    foreach($sorts as $key=>$value):
	if ($value['pid'] != 0) {
		continue;
	}
    ?>
    <option value="<?php echo $value['sid']; ?>"><?php echo $value['sortname']; ?></option>
	<?php
		$children = $value['children'];
		foreach ($children as $key):
		$value = $sorts[$key];
	?>
    <option value="<?php echo $value['sid']; ?>">&nbsp; &nbsp; &nbsp; <?php echo $value['sortname']; ?></option>
	<?php
    endforeach;
    endforeach;
    ?>
	<option value="-1"><?php echo langs('uncategorized')?></option>
	</select>

	<?php if (ROLE == ROLE_ADMIN && count($user_cache) > 1):?>
	<select name="author" id="author" onChange="changeAuthor(this);" class="form-control">
	<option value="" selected="selected"><?php echo langs('change_author')?>...</option>
	<?php foreach($user_cache as $key => $val):
	$val['name'] = $val['name'];
	?>
	<option value="<?php echo $key; ?>"><?php echo $val['name']; ?></option>
	<?php endforeach;?>
	</select>
	<?php endif;?>
	<?php endif;?>
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
<h6 class="panel-title txt-dark"><?php echo langs('have')?><?php echo $logNum; ?><?php echo langs('number_of_items')?><?php echo $pid == 'draft' ? langs('drafts') : langs('posts'); ?></h6>
<?php if(!empty($pageurl)){ ?>
 <div id="pagenav">
 <?php echo $pageurl; ?>
</div>
<?php }?>
</div>
</div>
</div>			
<script>
$(document).ready(function(){
    $("#f_t_tag").click(function(){$("#f_tag").toggle();$("#f_sort").hide();$("#f_user").hide();});
    selectAllToggle();
});
setTimeout(hideActived,2600);
function logact(act){
    if (getChecked('ids') == false) {
alert('<?php echo langs('select_post_to_operate_please')?>');
        return;}
    if(act == 'del' && !confirm('<?php echo langs('sure_delete_selected_posts')?>')){return;}
    $("#operate").val(act);
    $("#form_log").submit();
}
function changeSort(obj) {
    if (getChecked('ids') == false) {
        alert('<?php echo langs('select_post_to_operate_please')?>');
        return;}
    if($('#sort').val() == '')return;
    $("#operate").val('move');
    $("#form_log").submit();
}
function changeAuthor(obj) {
    if (getChecked('ids') == false) {
       alert('<?php echo langs('select_post_to_operate_please')?>');
        return;}
    if($('#author').val() == '')return;
    $("#operate").val('change_author');
    $("#form_log").submit();
}
function changeTop(obj) {
    if (getChecked('ids') == false) {
        alert('<?php echo langs('select_post_to_operate_please')?>');
        return;}
    if($('#top').val() == '')return;
    $("#operate").val(obj.value);
    $("#form_log").submit();
}
function selectSort(obj) {
    window.open("./admin_log.php?sid=" + obj.value + "<?php echo $isdraft?>", "_self");
}
function selectUser(obj) {
    window.open("./admin_log.php?uid=" + obj.value + "<?php echo $isdraft?>", "_self");
}
<?php if ($isdraft) :?>
$("#menu_draft").addClass('active');

<?php else:?>
$("#menu_log").addClass('active');
$("#menu_logs").addClass('active-page');
<?php endif;?>
</script>
