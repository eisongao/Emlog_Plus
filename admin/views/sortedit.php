<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('category_edit')?></li>
</ul>
</div>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('category_name_empty')?>
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
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<form action="sort.php?action=update" method="post">
<div class="form-group">
 <label><?php echo langs('name')?></label>
 <input type="text" value="<?php echo $sortname; ?>" name="sortname" id="sortname"  class="form-control" />
</div>
<div class="form-group">
<label><?php echo langs('alias')?></label>
<input type="text" value="<?php echo $alias; ?>" name="alias" id="alias" class="form-control" />
</div>
<div class="form-group">
<label><?php echo langs('category_parent')?></label>
<?php if (empty($sorts[$sid]['children'])): ?>
<select name="pid" id="pid" class="form-control">
<option value="0"<?php if($pid == 0):?> selected="selected"<?php endif; ?>><?php echo langs('no')?>
</option>
<?php
foreach($sorts as $key=>$value):
if ($key == $sid || $value['pid'] != 0) continue;
?>
<option value="<?php echo $key; ?>"<?php if($pid == $key):?> selected="selected"<?php endif; ?>><?php echo $value['sortname']; ?></option>
			<?php endforeach; ?>
		</select>
	<?php endif; ?>
	</div>
<div class="form-group">
<label><?php echo langs('template')?></label>
<input type="text" name="template" id="template" value="<?php echo $template; ?>"  class="form-control" />
            </div>	
<div class="form-group">
<label><?php echo langs('category_description')?></label>
<textarea name="description" type="text" class="textarea form-control"><?php echo $description; ?></textarea>
</div>
<div class="form-group">
<input type="hidden" value="<?php echo $sid; ?>" name="sid" />
<input type="submit" value="<?php echo langs('save')?>" class="btn btn-primary" id="save"  />
	<input type="button" value="<?php echo langs('cancel')?>" class="btn btn-default" onclick="javascript: window.history.back();" />
    </div>
</div>
</div>
</form>
</div>
</div>
<script>
$("#menu_sort").addClass('active-page');
$("#menu_action").addClass('active');
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
		$("#save").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error"><?php echo langs('alias_invalid_characters')?></span>');
	}else if (2 == issortalias(a)){
		$("#save").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error"><?php echo langs('alias_only_digits')?></span>');
	}else if (3 == issortalias(a)){
		$("#save").attr("disabled", "disabled");
		$("#alias_msg_hook").html('<span id="input_error"><?php echo  langs('alias_system_link')?></span>');
	}else {
		$("#alias_msg_hook").html('');
		$("#msg").html('');
		$("#save").attr("disabled", false);
	}
}
</script>