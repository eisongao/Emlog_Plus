<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li>
 <li class="active"><?php echo langs('comment_management') ?></li>
 </ul>
</div>
<?php if(isset($_GET['active_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_delete_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_show'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_audit_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_hide'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_hide_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_edit'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_edit_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_rep'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_reply_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_reply_ok') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_b'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_choose_operation') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_c'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('reply_is_empty') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_d'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_too_long') ?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_e'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('comment_is_empty') ?>
</div>
<?php endif;?>              
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<?php if ($hideCommNum > 0) : 
$hide_ = $hide_y = $hide_n = '';
$a = "hide_$hide";
$$a = "class=\"active\"";
?>
   <ul class="nav nav-tabs">
<li <?php echo $hide_; ?>><a href="./comment.php?<?php echo $addUrl_1 ?>"><?php echo langs('alls')?></a></li>
<li <?php echo $hide_y; ?>><a href="./comment.php?hide=y&<?php echo $addUrl_1 ?>"><?php echo langs('pending')?>
<?php
$hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
if ($hidecmnum > 0) echo '('.$hidecmnum.')';
?>
</a></li>
<li <?php echo $hide_n; ?>><a href="comment.php?hide=n&<?php echo $addUrl_1 ?>"><?php echo langs('audited')?></a>
</li>
<li class="pull-right">
<a href="#" class="full-screen">
<i class="zmdi zmdi-fullscreen"></i>
</a>
</li>
</ul>
<?php endif; ?>
 <form action="comment.php?action=admin_all_coms" method="post" name="form_com" id="form_com">
<div class="table-wrap ">
<div class="table-responsive">
<table class="table table-striped table-bordered mb-0">
<thead>
<tr>
        <th>#</th>
        <th><?php echo langs('content')?></th>
        <th><?php echo langs('commentator')?></th>
        <th><?php echo langs('belongs_to_post')?></th>
      </tr>
    </thead>
    <tbody>
    <?php
    if($comment):
    foreach($comment as $key=>$value):
    $ishide = $value['hide']=='y'?'<font color="red">['.langs('pending').']</font>':'';
    $mail = !empty($value['mail']) ? "({$value['mail']})" : '';
    $ip = !empty($value['ip']) ? "<br />".langs('from')."：{$value['ip']}" : '';
    $poster = !empty($value['url']) ? '<a href="'.$value['url'].'" target="_blank">'. $value['poster'].'</a>' : $value['poster'];
    $value['content'] = str_replace('<br>',' ',$value['content']);
    $sub_content = subString($value['content'], 0, 50);
    $value['title'] = subString($value['title'], 0, 42);
    doAction('adm_comment_display');
    ?>
     <tr>
     <td><input  type="checkbox" value="<?php echo $value['cid']; ?>" name="com[]" class="ids" /></td>
        <td><a href="comment.php?action=reply_comment&amp;cid=<?php echo $value['cid']; ?>" title="<?php echo $value['content']; ?>"><?php echo $sub_content; ?></a>   <?php echo $ishide; ?>
        <br /><?php echo $value['date']; ?>
        <span style="margin-left:8px;">    
            <a href="javascript: em_confirm(<?php echo $value['cid']; ?>, 'comment', '<?php echo LoginAuth::genToken(); ?>');" class="care"><?php echo langs('delete')?></a>
        <?php if($value['hide'] == 'y'):?>
        <a href="comment.php?action=show&amp;id=<?php echo $value['cid']; ?>"><?php echo langs('approve')?></a>
        <?php else: ?>
        <a href="comment.php?action=hide&amp;id=<?php echo $value['cid']; ?>"><?php echo langs('hide')?></a>
        <?php endif;?>
        <a href="comment.php?action=reply_comment&amp;cid=<?php echo $value['cid']; ?>"><?php echo langs('reply')?></a>
        <a href="comment.php?action=edit_comment&amp;cid=<?php echo $value['cid']; ?>"><?php echo langs('edit')?></a>
        </td>
        <td><?php echo $poster;?> <?php echo $mail;?>  <?php echo $ip;?> 
            <?php if (ROLE == ROLE_ADMIN): ?>
            <a href="javascript: em_confirm('<?php echo $value['ip']; ?>', 'commentbyip', '<?php echo LoginAuth::genToken(); ?>');" title="<?php echo langs('delete_comments_from_ip')?>" class="care">(X)</a>
            <?php endif;?></td>
        <td><a href="<?php echo Url::log($value['gid']); ?>" target="_blank" title="<?php echo $seecommp ?>"><?php echo $value['title']; ?></a></td>
     </tr>
    <?php endforeach;else:?>
      <tr><td class="tdcenter" colspan="4"><?php echo langs('no_comments_yet')?></td>
      </tr>
    <?php endif;?>
    </tbody>
  </table>  
  </form>
  </div>
 <div class="form-group form-inline" style="padding-top:10px">
    <a href="javascript:void(0);" id="select_all"><?php echo langs('select_all')?></a> <?php echo langs('selected_items')?>：
    <a href="javascript:commentact('del');" class="care"><?php echo langs('delete')?></a>
    <a href="javascript:commentact('hide');"><?php echo langs('hide')?></a>
    <a href="javascript:commentact('pub');"><?php echo langs('approve')?></a>
    <input name="operate" id="operate" value="" type="hidden" />
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
<h6 class="panel-title txt-dark"><?php echo langs('have')?><?php echo $cmnum; ?><?php echo langs('_comments')?></h6>
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
    selectAllToggle();
    $("#adm_comment_list tbody tr:odd").addClass("tralt_b");
    $("#adm_comment_list tbody tr")
        .mouseover(function(){$(this).addClass("trover");$(this).find("span").show();})
        .mouseout(function(){$(this).removeClass("trover");$(this).find("span").hide();})
});
setTimeout(hideActived,2600);
function commentact(act){
    if (getChecked('ids') == false) {
        alert('<?php echo langs('comment_operation_select')?>');
        return;
    }
    if(act == 'del' && !confirm('<?php echo langs('comment_selected_delete_sure')?>')){return;}
    $("#operate").val(act);
    $("#form_com").submit();
}
$("#menu_cm").addClass('active');
</script>

