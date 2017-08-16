<?php
if(!defined('EMLOG_ROOT')) {exit('error!');}
$isdraft = $hide == 'y' ? true : false;
?>
<?php if(Option::get('admin_editor') == 1):?>
<script charset="utf-8" src="./editor/kindeditor.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php if(Option::get('language')=='cn'){?>
<script charset="utf-8" src="./editor/lang/zh_CN.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php } ?>
<?php if(Option::get('language')=='en'){?>
<script charset="utf-8" src="./editor/lang/en.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php } ?>
<?php endif ?>
<?php if(Option::get('admin_editor') == 2):?>
<script src="./tinymce/tinymce.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php if(Option::get('language')=='cn'){?>
<script src="./tinymce/init.min_cn.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php } ?>
<?php if(Option::get('language')=='en'){?>
<script src="./tinymce/init.min_en.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php } ?>
<?php  endif ?>
<?php if(Option::get('admin_editor') == 3):?>
<script charset="utf-8" src="./ueditor/ueditor.all.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script charset="utf-8" src="./ueditor/ueditor.config.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php endif ;?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo  langs('home') ?></a></li>
<li class="active">
<?php if ($isdraft) :?><?php echo  langs('draft_edit') ?><?php else:?><?php echo  langs('post_edit') ?><?php endif;?>
</li>
</ul>
</div>
<div id="msg_2"></div>
<div id="msg"></div>
<form action="save_log.php?action=edit" method="post" id="addlog" name="addlog">
<div class="row">
<div class="col-lg-8">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div id="post" class="form-group">
 <input type="text" name="title" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="<?php echo  langs('enter_post_title') ?>" />
 </div>	            
<div id="post_bar">
<input type="hidden" name="as_logid" id="as_logid" value="<?php echo $logid; ?>">
<?php if (ROLE == ROLE_ADMIN): ?>
<div>
<span onclick="displayToggle('FrameUpload', 0);autosave(1);"><?php echo  langs('upload_insert') ?><i class="fa fa-caret-right fa-fw"></i></span>
	    <?php doAction('adm_writelog_head'); ?>
	    <span id="asmsg"></span>
	</div>
<div id="FrameUpload" style="display: none;">
        <iframe width="100%" height="180px"  frameborder="0" src="attachment.php?action=attlib&logid=<?php echo $logid; ?>"></iframe>
</div>
<?php endif; ?>
</div>
 <?php if(Option::get('admin_editor') == 3){?>
<script id="content" name="content" type="text/plain"><?php echo htmlspecialchars_decode($content);?></script><div class="clear"></div><div class="clear"></div>
 <?php }else{ ?>
<div id="editormd"  style="padding-top:10px">
 <textarea id="content" class="content" name="content" style="width:100%;height:530px;"><?php echo $content;?></textarea>       
</div>
<?php } ?>
<div class="show_advset"  style="padding-top:10px"onclick="displayToggle('advset', 1);"><?php echo  langs('advanced_options') ?><i class="fa fa-caret-right fa-fw"></i>
 </div>
 <div id="advset">
 <div><?php echo  langs('post_description') ?></div>
<?php if(Option::get('admin_editor') == 3){?>
<script id="excerpt" name="excerpt" type="text/plain"><?php echo htmlspecialchars_decode($excerpt);?></script>
<div class="clear"></div>
 <?php }else{ ?>
  <div id="editormde"><textarea id="excerpt" name="excerpt" style="width:100%; height:260px;"><?php echo $excerpt; ?></textarea>
  </div>
  <?php }?>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-default card-view">
<div class="panel-heading">
 <div class="form-group">
  <label><?php echo langs('post_thumbnail') ?></label>
     <?php if (ROLE == ROLE_ADMIN){ ?>
  <label class="pull-right"><a href="#add_thumb" data-toggle="modal" ><?php echo langs('attachment_library')?>+</a></label>
  <?php } ?>
  <input name="thumbs" id="thumbs" class="form-control" placeholder="<?php echo langs('post_thumb') ?>" value="<?php echo $thumbs;?>" />
     <?php if (ROLE == ROLE_ADMIN){ ?>
 <div aria-hidden="true" role="dialog" tabindex="-1" id="add_thumb" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('attachment_library')?></h4>
</div>
<div class="modal-body" style="float: left; width:100%; background: #fff;">
<div class="form-group text-center"  id="load_thumb">	
<button type="button" class="btn btn-danger" id="btn_get"><?php echo langs('load_thumb')?></button>
</div>
<script>
$(document).on('click','#btn_get',function () {
var ele = $(this).parent('li');
        $.ajax({
      url: "attachment.php?action=thumb",
      type: 'POST',
      success: function(response){
           if(response){
             ele.hide();
                $(".modal-body").append(response);
              }
            }
   });
 $("#load_thumb").hide();
});
</script>
</div>
</div>
</div>
 </div>
 <?php } ?>
 </div>
<div class="form-group">
 <select name="sort" id="sort" class="form-control">
 <option value="-1"><?php echo  langs('category_select') ?></option>
                    <?php
                    foreach ($sorts as $key => $value):
                        if ($value['pid'] != 0) {
                            continue;
                        }
                        $flg = $value['sid'] == $sortid ? 'selected' : '';
                        ?>
                        <option value="<?php echo $value['sid']; ?>" <?php echo $flg; ?>><?php echo $value['sortname']; ?></option>
                        <?php
                        $children = $value['children'];
                        foreach ($children as $key):
                            $value = $sorts[$key];
                            $flg = $value['sid'] == $sortid ? 'selected' : '';
                            ?>
                            <option value="<?php echo $value['sid']; ?>" <?php echo $flg; ?>>&nbsp; &nbsp; &nbsp; <?php echo $value['sortname']; ?></option>
                            <?php
                        endforeach;
                    endforeach;
                    ?>
 </select>
</div>
<div class="form-group">
<label><?php echo langs('post_tags_separated')?></label><label class="pull-right"><a href="javascript:displayToggle('tagbox', 0);"><?php echo langs('tags_have')?></a></label>
            <input name="tag" id="tag" class="form-control" value="<?php echo $tagStr; ?>" placeholder="<?php echo langs('post_tags_enter')?>" />            
   <div id="tagbox"  class="row" style="display: none;padding:10px 10px  0px 10px;">
                <?php
                if ($tags) {
                    foreach ($tags as $val) {
                        echo "<a href=\"javascript: insertTag('{$val['tagname']}','tag');\">{$val['tagname']}</a> ";
                    }
                } else {
                    echo langs('tag_not_set');
                }
                ?>     
            </div>
</div>
<div class="form-group">
 <label><?php echo langs('post_time')?></label>
 <input maxlength="200" name="postdate"  id="postdate" value="<?php echo date('Y-m-d H:i:s', $date); ?>" class="form-control" />
                 <input name="date" id="date" type="hidden" value="<?php echo $orig_date; ?>" >

</div>
 <div class="form-group">
  <label><?php echo langs('post_alias')?></label>
  <input name="alias" id="alias" class="form-control" value="<?php echo $alias;?>" />
 </div>
 <div class="form-group">
 <label><?php echo langs('post_access_password')?></label>
 <input type="text" name="password" id="password" class="form-control" value="<?php echo $password; ?>" />
 </div>
 <div class="form-group"  id="post_options"> 
<input type="checkbox" value="y" name="top" id="top" <?php echo $is_top; ?> />
 <label for="top"><?php echo langs('home_top')?></label>
<input type="checkbox" value="y" name="sortop" id="sortop" <?php echo $is_sortop; ?> />
 <label for="sortop"><?php echo langs('category_top')?></label>
 <input type="checkbox" value="y" <?php echo $is_allow_remark; ?> name="allow_remark" id="allow_remark"  />
<label for="allow_remark"><?php echo langs('allow_comments')?></label>
</div>
<div id="post_button">
    <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
    <input type="hidden" name="ishide" id="ishide" value="<?php echo $hide; ?>" />
    <input type="hidden" name="gid" value=<?php echo $logid; ?> />
    <input type="hidden" name="author" id="author" value=<?php echo $author; ?> />
        <input type="submit" value="<?php echo langs('save_and_return')?>" onclick="return checkform();" class="btn btn-primary" />
        <input type="button" name="savedf" id="savedf" value="<?php echo langs('save')?>" onclick="autosave(2);" class="btn btn-success" onclick="return checkform();"/>
        <?php if ($isdraft) :?>
  <input type="submit" name="pubdf" id="pubdf" value="<?php echo langs('publish')?>" onclick="return checkform();" class="btn btn-danger" />
    <?php endif;?>
</div>           
</div>
</div>
</div>	
</form>
</div>			
</div>
<script>
<?php if(Option::get('admin_editor') == 1):?>
loadEditor('content');
loadEditor('excerpt');
<?php endif; ?>
<?php if(Option::get('admin_editor') == 2):?>
tinymce.get('content').getContent();
tinymce.get('excerpt').getContent();
<?php endif; ?>
<?php if(Option::get('admin_editor') == 3):?>
UE.getEditor('content');
UE.getEditor('excerpt');
<?php endif; ?>
checkalias();
$("#alias").keyup(function(){checkalias();});
$("#advset").css('display', $.cookie('em_advset') ? $.cookie('em_advset') : '');
$("#title").focus(function(){$("#title_label").hide();});
$("#title").blur(function(){if($("#title").val() == '') {$("#title_label").show();}});
$("#tag").focus(function(){$("#tag_label").hide();});
$("#tag").blur(function(){if($("#tag").val() == '') {$("#tag_label").show();}});
if ($("#title").val() != '')$("#title_label").hide();
if ($("#tag").val() != '')$("#tag_label").hide();
setTimeout("autosave(0)",60000);
<?php if ($isdraft) :?>
$("#menu_draft").addClass('active');
<?php else:?>
$("#menu_log").addClass('active');
$("#menu_wt").addClass('active-page');
<?php endif;?>
</script>