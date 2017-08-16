<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('link_edit')?></li>
</ul>
</div>
 <div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
 <div class="tab-content">
<form action="link.php?action=update_link" method="post">
<div class="form-group">
<label><?php echo langs('name')?></label>
 <input type="text"  value="<?php echo $sitename; ?>"   name="sitename"   class="form-control">
</div>
<div class="form-group">
<label><?php echo langs('address')?></label>
<input type="text"  value="<?php echo $siteurl; ?>"   name="siteurl"   class="form-control">
</div>
<div class="form-group">
<label><?php echo langs('sitepic')?></label>
 <input type="text"  value="<?php echo $sitepic; ?>"   name="sitepic"   class="form-control">
 </div>
<div class="form-group"><label><?php echo langs('category_select')?></label>          
<select name="linksortid" id="linksortid" class="form-control">
<option value="-1"><?php echo langs('uncategorized')?></option>
 <?php foreach($sortlink as $key=>$value):?>
<option value="<?php echo $key; ?>"<?php if($linksortid == $key):?> selected="selected"<?php endif; ?>><?php echo $value['linksort_name']; ?></option>
<?php endforeach; ?>
</select>
</div>
<div class="form-group">
<label><?php echo langs('link_description')?></label>
<textarea name="description" rows="3" class="form-control textarea" cols="42"><?php echo $description; ?></textarea>
</div>	
<div class="form-group">
<input type="hidden" value="<?php echo $linkId; ?>" name="linkid" />
<input type="submit" value="<?php echo langs('save')?>" class="btn btn-primary" />
<input type="button" value="<?php echo langs('cancel')?>" class="btn btn-default" onclick="javascript: window.history.back();" />
</div>
</form>
</div>
</div>
</div>
<script>
$("#menu_link").addClass('active-page');
$("#menu_links").addClass('active');
</script>
