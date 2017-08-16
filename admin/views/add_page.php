<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
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
<script charset="utf-8" src="./ueditor/ueditor.all.min.js?v=<?php echo Option::EMLOG_VERSION; ?>""></script>
<script charset="utf-8" src="./ueditor/ueditor.config.js?v=<?php echo Option::EMLOG_VERSION; ?>""></script>
<?php endif ;?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active">
<?php echo langs('add_page')?>
</li>
</ul>
</div>
<div id="msg_2"></div>
<div id="msg"></div>
<form action="page.php?action=add" method="post" enctype="multipart/form-data" id="addlog" name="addlog">
<div class="row">
<div class="col-lg-8">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div id="post" class="form-group">
<input type="text" name="title" id="title" value="<?php echo $title; ?>" class="form-control" placeholder="<?php echo langs('page_title_info')?>" />
 <input name="date" id="date" type="hidden" value="" >
</div>	            
<div id="post_bar">
<div class="show_advset">
 <span onclick="displayToggle('FrameUpload', 0);autosave(4);"><?php echo langs('upload_insert')?><i class="fa fa-caret-right fa-fw"></i></span>
  <?php doAction('adm_writelog_head'); ?>
<span id="asmsg"></span>
<input type="hidden" name="as_logid" id="as_logid" value="-1">
 </div>
 <?php if (ROLE == ROLE_ADMIN): ?>
 <div id="FrameUpload" style="display: none;">
 <iframe width="100%" height="180px"  frameborder="0" src="attachment.php?action=selectFile"></iframe>
 </div>    
 <?php endif; ?>
 </div>
 <?php if(Option::get('admin_editor') == 3){?>
 <script id="content" name="content" type="text/plain"></script><div class="clear"></div>
 <?php }else{ ?>
<div id="editormd"  style="padding-top:10px">
<textarea id="content" class="content" name="content" style="width:100%;height:430px;"><?php echo $content; ?>
</textarea>       
</div>
<?php } ?>             		
</div>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-default card-view">
<div class="form-group">
 <label><?php echo langs('page_template')?></label>
<input maxlength="200" class="form-control" name="template" id="template" value="page" placeholder="<?php echo langs('page_template_info')?>"/> 
</div>
 <div class="form-group">
  <label><?php echo langs('link_alias')?></label>
  <input name="alias" id="alias" class="form-control" value="<?php echo $alias;?>" placeholder="<?php echo langs('link_alias_info')?>"/>
 </div>
 <div class="form-group checkbox checkbox-info"  id="page_options"> 
<input type="checkbox" value="y" name="allow_remark" id="allow_remark" />
<label for="allow_remark"><?php echo langs('page_enable_comments')?></label>
</div>            
<div class="form-group footer-list">	
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
    <input type="hidden" name="ishide" id="ishide" value="">       
    <input type="submit" value="<?php echo langs('page_publish')?>" onclick="return checkform();" class="btn btn-primary" />
        <input type="button" name="savedf" id="savedf" value="<?php echo langs('save')?>" onclick="autosave(3);" class="btn btn-success" onclick="return checkform();"/>     
</div>
</div>
</form>
</div>			
</div>	
<script>
<?php if(Option::get('admin_editor') == 1):?>
loadEditor('content');
<?php endif; ?>
<?php if(Option::get('admin_editor') == 2):?>
tinymce.get('content').getContent();
<?php endif; ?>
<?php if(Option::get('admin_editor') == 3):?>
UE.getEditor('content');
<?php endif; ?>
$("#menu_page").addClass('active-page');
$("#menu_action").addClass('active');
$("#alias").keyup(function(){checkalias();});
$("#title").focus(function(){$("#title_label").hide();});
$("#title").blur(function(){if($("#title").val() == '') {$("#title_label").show();}});
setTimeout("autosave(0)",60000);
setTimeout(hideActived,2600);
</script>