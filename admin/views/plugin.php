<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('pls_management')?></li>
</ul>
</div>
<?php if(isset($_GET['activate_install'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_upload_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_active_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['activate_del'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('deleted_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_error'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_active_failed')?>
</div>
<?php endif;?>
<?php if(isset($_GET['inactive'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_disable_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
<div class="error alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('plugin_upload_failed_nonwritable')?>
</div>
<?php endif;?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">		
<div class="table-wrap ">
<div <?php if(Option::get('responsive') == "y") echo 'class="table-responsive"'; ?>>				
<table class="table table-striped table-bordered mb-0">
<thead><tr>
<th id="plug_t"><b><?php echo langs('name')?></b></th>
<th id="plug_s" class="tdcenter"><b><?php echo langs('status')?></b></th>
<th id="plug_v" class="tdcenter"><b><?php echo langs('version')?></b></th>
<th id="plug_d"><b><?php echo langs('description')?></b></th>
<th id="plug_o" class="tdcenter"><b><?php echo langs('operate')?></b></th>
      </tr>
  </thead>
  <tbody>
	<?php 
	if($plugins):
	$i = 0;
	foreach($plugins as $key=>$val):
		$plug_state = 'inactive';
		$plug_action = 'active';
		$plug_state_des = langs('plug_active_ok');
		if (in_array($key, $active_plugins))
		{
			$plug_state = 'active';
			$plug_action = 'inactive';
	    $plug_state_des = langs('plug_disable_ok');
		}
		$i++;
        if (TRUE === $val['Setting']) {
            $val['Name'] = "<a href=\"./plugin.php?plugin={$val['Plugin']}\" title=\"".langs('plugin_settings_click')."\">{$val['Name']} <img src=\"./views/images/set.png\" border=\"0\" /></a>";
        }
	?>	
      <tr>
        <td id="plug_t"><?php echo $val['Name']; ?></td>
		<td class="tdcenter" id="plug_s plugin_<?php echo $i;?>">
		<a href="./plugin.php?action=<?php echo $plug_action;?>&plugin=<?php echo $key;?>&token=<?php echo LoginAuth::genToken(); ?>"><img src="./views/images/plugin_<?php echo $plug_state; ?>.gif" title="<?php echo $plug_state_des; ?>" align="absmiddle" border="0"></a>
		</td>
        <td id="plug_v" class="tdcenter"><?php echo $val['Version']; ?></td>
        <td id="plug_d">
		<?php echo $val['Description']; ?>
		<?php if ($val['Url'] != ''):?><a href="<?php echo $val['Url'];?>" target="_blank"><?php echo langs('more_info')?></a><?php endif;?>
		<div style="margin-top:5px;">
		<?php if ($val['ForEmlog'] != ''):?><?php echo langs('ok_for_emlog')?>:<?php echo $val['ForEmlog'];?>&nbsp | &nbsp<?php endif;?>
		<?php if ($val['Author'] != ''):?>
		<?php echo langs('user')?>:<?php if ($val['AuthorUrl'] != ''):?>
			<a href="<?php echo $val['AuthorUrl'];?>" target="_blank"><?php echo $val['Author'];?></a>
			<?php else:?>
			<?php echo $val['Author'];?>
			<?php endif;?>
		<?php endif;?>
		</div>
		</td>
		<td id="plug_o" class="tdcenter">
            <a href="javascript: em_confirm('<?php echo $key; ?>', 'plu', '<?php echo LoginAuth::genToken(); ?>');" class="care" title="<?php echo langs('delete')?>"><i class="zmdi zmdi-delete inline-block"></i></a></td>
      </tr>
	<?php endforeach;else: ?>
	  <tr>
        <td class="tdcenter" colspan="5"><?php echo langs('plugin_no_installed')?></td>
      </tr>
	<?php endif;?>
	</tbody>
  </table>
<div class="clearfix"></div>
</div>
<div class="form-group" style="padding-top:10px">
<a href="./plugin.php?action=install" class="btn btn-success add_plugin"><?php echo langs('plugin_install')?>+</a>
</div>
</div>
</div>
<script>
$("#adm_plugin_list tbody tr:odd").addClass("tralt_b");
$("#adm_plugin_list tbody tr")
	.mouseover(function(){$(this).addClass("trover")})
	.mouseout(function(){$(this).removeClass("trover")})
setTimeout(hideActived,2600);
$("#menu_plug").addClass('active');
</script>