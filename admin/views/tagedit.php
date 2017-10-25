<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
 <li class="active"><?php echo langs('tag_edit')?></li>
 </ul>
</div>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('tag_empty')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">
<form  method="post" action="tag.php?action=update_tag">
<div class="form-group">
               <input type="text" value="<?php echo $tagname; ?>" name="tagname" class="form-control" />
            </div>
<div class="form-group">
<input type="hidden" value="<?php echo $tagid; ?>" name="tid" />
<input type="submit" value="<?php echo langs('save')?>" class="btn btn-primary" />
<input type="button" value="<?php echo langs('cancel')?>" class="btn btn-default" onclick="javascript: window.location='tag.php';"/>
</div>
</div>
</form>
</div>
<script>
$("#menu_action").addClass('active');
$("#menu_tag").addClass('active-page');
</script>