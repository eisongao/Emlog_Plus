<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('nav_modify')?></li>
</ul>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="tab-content">                  
<form action="navbar.php?action=update" method="post">
<div class="form-group">
<label><?php echo langs('nav_name')?></label>
<input type="text" value="<?php echo $naviname; ?>" name="naviname"  class="form-control" />
</div>
<div class="form-group">
<label><?php echo langs('nav_address')?></label>
<input size="50" value="<?php echo $url; ?>" name="url" <?php echo $conf_isdefault; ?> class="form-control"/> 
</div>
<div class="form-group checkbox checkbox-info"  id="page_options"> 
<input type="checkbox" style="vertical-align:middle;" value="y" name="newtab" <?php echo $conf_newtab; ?> />
<label><?php echo langs('open_new_win')?></label>
</div>
<?php if ($type == Navi_Model::navitype_custom && $pid != 0): ?>	
<div class="form-group">
<label><?php echo langs('nav_parent')?></label><select name="pid" id="pid" class="form-control">
<option value="0"><?php echo langs('no')?></option>
                <?php
                    foreach($navis as $key=>$value):
                        if($value['type'] != Navi_Model::navitype_custom || $value['pid'] != 0) {
                            continue;
                        }
                        $flg = $value['id'] == $pid ? 'selected' : '';
                ?>
                <option value="<?php echo $value['id']; ?>" <?php echo $flg;?>><?php echo $value['naviname']; ?></option>
                <?php endforeach; ?>
            </select>
	</div>
    <?php endif; ?>
 </div>
<div class="form-group" style="padding-top:10px">
	<input type="hidden" value="<?php echo $naviId; ?>" name="navid" />
	<input type="hidden" value="<?php echo $isdefault; ?>" name="isdefault" />
	<input type="submit" value="<?php echo langs('save')?>" class="btn btn-primary"  />
	<input type="button" value="<?php echo langs('cancel')?>" class="btn btn-default"  onclick="javascript: window.history.back();" />
</div>
</form>
</div>
</div>
</div>
</div>
<script>
$("#menu_action").addClass('active');
$("#menu_navbar").addClass('active-page');
</script>