<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home') ?></a></li>
<li class="active"><?php echo langs('basic_settings') ?></li>
 </ul>
</div>
<?php if(isset($_GET['activated'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('settings_saved_ok') ?>
</div>
<?php endif;?>								
<form action="configure.php?action=mod_config" method="post" name="input" id="input">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('site_title') ?></label>
<input maxlength="200"  class="form-control" value="<?php echo $blogname; ?>" name="blogname" />
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('site_subtitle') ?></label>
<textarea name="bloginfo" cols="" rows="3"  class="form-control"><?php echo $bloginfo; ?></textarea>
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('site_address') ?></label>
<input maxlength="200" class="form-control" value="<?php echo $blogurl; ?>" name="blogurl" />
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('per_page') ?></label>
<input maxlength="5" size="4" class="form-control" value="<?php echo $index_lognum; ?>" name="index_lognum" /> <label class="control-label mb-10"><?php echo langs('_posts') ?></label>
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('your_timezone') ?></label>
<select name="timezone" class="form-control" >
<?php
foreach($tzlist as $key=>$value):
$ex = $key==$timezone?"selected=\"selected\"":'';
?>
<option value="<?php echo $key; ?>" <?php echo $ex; ?>><?php echo $value; ?></option>
<?php endforeach;?>
</select>
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('local_time') ?></label>
<?php  echo date('Y-m-d H:i:s'); ?>
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('sys_language')?></label>
<select name="language" class="form-control" >
<?php
$lang = array(
'cn'=>langs('cn'),
'en'=>langs('en'),
);
foreach($lang as $key=>$value):
$la = $key==$language?"selected=\"selected\"":'';
?>
<option value="<?php echo $key; ?>" <?php echo $la; ?>><?php echo $value; ?></option>
<?php endforeach;?>
</select>
</div>
<div class="form-group">
<div class="checkbox checkbox-success ">
<input value="y" name="txprotect" type="checkbox"   id="txprotect" <?php echo $conf_txprotect; ?> />
<label class="control-label mb-10"><?php echo langs('txprotect')?></label>
</div>
<div class="form-group">
<div class="checkbox checkbox-primary ">
<input value="y" name="webscan" type="checkbox"   id="webscan" <?php echo $conf_webscan; ?> />
<label class="control-label mb-10"><?php echo langs('webscan')?><?php echo langs('defense')?>(<?php echo $webscan_log ?>)<?php echo langs('defense_num')?><a href="configure.php?action=rest&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('defense_rest')?></a></label>
</div>
<div class="checkbox checkbox-success ">
 <input type="checkbox" value="y" name="detect_url" id="detect_url" <?php echo $conf_detect_url; ?> />
 <label class="control-label mb-10"><?php echo langs('detect_url')?></label>
</div>
<div class="checkbox checkbox-primary ">
<input value="y" name="register_open" type="checkbox"   id="register_open" <?php echo $conf_register_open; ?> />
<label class="control-label mb-10"><?php echo langs('register_open')?></label>
</div>
<div class="checkbox checkbox-success ">
<input value="y" name="login_code" type="checkbox"   id="login_code" <?php echo $conf_login_code; ?> />
<label class="control-label mb-10"><?php echo langs('login_verification_code') ?></label>
</div>
<div class="checkbox checkbox-primary ">
<input type="checkbox"  value="y" name="isgzipenable" id="isgzipenable" <?php echo $conf_isgzipenable; ?> />
<label class="control-label mb-10"><?php echo langs('gzip_compression') ?></label>
</div>
<div class="checkbox checkbox-success">
<input type="checkbox"  value="y" name="isxmlrpcenable" id="isxmlrpcenable" <?php echo $conf_isxmlrpcenable; ?> />
<label class="control-label mb-10"><?php echo langs('offline_writing') ?></label>
</div>
<div class="checkbox checkbox-primary ">
<input type="checkbox" value="y" name="ismobile" id="ismobile" <?php echo $conf_ismobile; ?> />
<label class="control-label mb-10"><?php echo langs('mobile_access_address') ?> <i class="fa fa-mobile"></i> <?php echo BLOG_URL.'m'; ?></label>
</div>
<div class="checkbox checkbox-success ">
<input type="checkbox" value="y" name="isexcerpt" id="isexcerpt" <?php echo $conf_isexcerpt; ?> /><label class="control-label mb-10"><?php echo langs('auto_summary') ?></label>
</div>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('before_summary') ?></label>
<input class="form-control"  size="4" name="excerpt_subnum" maxlength="3" value="<?php echo Option::get('excerpt_subnum'); ?>" /><label class="control-label mb-10"><?php echo langs('characters_as_summary') ?></label>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('rss') ?></label>
<input class="form-control"  maxlength="5" size="4" value="<?php echo $rss_output_num; ?>" name="rss_output_num"/>
<label class="control-label mb-10"><?php echo langs('_posts_and_output') ?><select name="rss_output_fulltext" class="form-control">
		<option value="y" <?php echo $ex1; ?>><?php echo langs('full_text') ?></option>
		<option value="n" <?php echo $ex2; ?>><?php echo langs('summary') ?></option>
        </select>
</label>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group">
<div class="checkbox checkbox-success ">
<input type="checkbox" value="y" name="istwitter" id="istwitter" <?php echo $conf_istwitter; ?> />
<label class="control-label mb-10"><?php echo langs('twitters_enable') ?></label>
</div>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('per_page') ?></label>
<input class="form-control"  size="4" type="text" name="index_twnum" maxlength="3" value="<?php echo Option::get('index_twnum'); ?>" /><label class="control-label mb-10"><?php echo langs('_twitters') ?></label>
</div>
<div class="form-group">
<div class="checkbox checkbox-primary">
<input type="checkbox"  value="y" name="istreply" id="istreply" <?php echo $conf_istreply; ?> />
<label class="control-label mb-10"><?php echo langs('twitter_reply_enable') ?></label>
</div>
<div class="checkbox checkbox-success">
<input type="checkbox"  value="y" name="reply_code" id="reply_code" <?php echo $conf_reply_code; ?> />
<label class="control-label mb-10"><?php echo langs('reply_verification_code') ?></label>
</div>
<div class="checkbox checkbox-primary">
<input type="checkbox" value="y" name="ischkreply" id="ischkreply" <?php echo $conf_ischkreply; ?> />
<label class="control-label mb-10"><?php echo langs('reply_audit') ?></label>
</div>
</div>
</div>
</div>		
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group">
<div class="checkbox checkbox-success">
<input type="checkbox" value="y" name="iscomment" id="iscomment" <?php echo $conf_iscomment; ?> />
<label class="control-label mb-10"><?php echo langs('enable_comment_interval') ?></label>
</div>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('comment_interval_time') ?></label>
<input maxlength="3" class="form-control"  size="4" type="text" value="<?php echo $comment_interval; ?>" name="comment_interval" />
<label class="control-label mb-10"><?php echo langs('_seconds') ?></label>
</div>
<div class="form-group">
<div class="checkbox checkbox-primary">
<input type="checkbox"  value="y" name="ischkcomment" id="ischkcomment" <?php echo $conf_ischkcomment; ?> />
<label class="control-label mb-10"><?php echo langs('comment_moderation') ?></label>
</div>
<div class="checkbox checkbox-success">
<input type="checkbox"  value="y" name="comment_code" id="comment_code" <?php echo $conf_comment_code; ?> />
<label class="control-label mb-10"><?php echo langs('comment_verification_code') ?></label>
</div>
<div class="checkbox checkbox-primary">
<input type="checkbox" value="y" name="isgravatar" id="isgravatar" <?php echo $conf_isgravatar; ?> />
<label class="control-label mb-10"><?php echo langs('comment_avatar') ?></label>
</div>
<div class="checkbox checkbox-success ">
 <input type="checkbox" value="y" name="avatar_cache" id="avatar_cache" <?php echo $conf_avatar_cache; ?> />
 <label class="control-label mb-10"><?php echo langs('location_avatar_cache') ?></label>
</div>
<div class="checkbox checkbox-primary">
<input type="checkbox" value="y" name="comment_needchinese" id="comment_needchinese" <?php echo $conf_comment_needchinese; ?> />
<label class="control-label mb-10"><?php echo langs('comment_must_contain_chinese') ?></label>
</div>
<div class="checkbox checkbox-success">
<input type="checkbox"  value="y" name="comment_paging" id="comment_paging" <?php echo $conf_comment_paging; ?> />
<label class="control-label mb-10"><?php echo langs('comment_per_page') ?></label>
</div>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('per_page') ?></label>
<input maxlength="5" size="4" class="form-control" value="<?php echo $comment_pnum; ?>" name="comment_pnum" /><label class="control-label mb-10"><?php echo langs('_comments') ?><select name="comment_order" class="form-control" ><option value="newer" <?php echo $ex3; ?>><?php echo langs('newer') ?></option><option value="older" <?php echo $ex4; ?>><?php echo langs('older') ?></option></select><?php echo langs('standing_in_front') ?></label>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('upload_max_size') ?></label>
<input maxlength="8" size="5" class="form-control" value="<?php echo $att_maxsize; ?>" name="att_maxsize"  /><label class="control-label mb-10">KB</label>
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('allow_attach_type') ?>"<?php echo langs('separate_by_comma') ?>" </label>
<input maxlength="200" class="form-control" value="<?php echo $att_type; ?>" name="att_type" />
</div>
<div class="form-group">
<div class="checkbox checkbox-success">
<input type="checkbox"  value="y" name="isthumbnail" id="isthumbnail" <?php echo $conf_isthumbnail; ?> />
<label class="control-label mb-10"><?php echo langs('thumbnail') ?></label>
</div>
</div>
<div class="form-group form-inline">
<label class="control-label mb-10"><?php echo langs('thumbnail_max_size') ?></label>
<input maxlength="5" size="4" class="form-control" value="<?php echo $att_imgmaxw; ?>" name="att_imgmaxw" />x<input maxlength="5" size="4" class="form-control" value="<?php echo $att_imgmaxh; ?>" name="att_imgmaxh" /><label class="control-label mb-10"><?php echo langs('unit_pixels') ?></label>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default card-view">
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('icp_reg_no') ?></label>
<input maxlength="200"  class="form-control" value="<?php echo $icp; ?>" name="icp" />
</div><div class="form-group">
<label class="control-label mb-10"><?php echo langs('home_footer_info') ?></label>
<textarea name="footer_info" cols="" rows="6" class="form-control" placeholder="<?php echo langs('home_footer_info_html') ?>" ><?php echo $footer_info; ?></textarea>
</div>
<div class="clearfix"></div>
<div class="form-group text-center">			<button type="submit" class="btn btn-info btn-round" ><?php echo langs('save_settings') ?></button>
</div>
<input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
 </div>
</div>
</div>
</form>
</div>
<script>
       $("#menu_con").addClass('active-page');
        $("#menu_set").addClass('active');
        setTimeout(hideActived,2600);
</script>				
					