<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?><div class="heading-bg  card-views">
<ul class="breadcrumbs">
<li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
<li class="active"><?php echo langs('admin_center')?></li>
</ul>
</div>
<?php if (ROLE == ROLE_ADMIN){?>
<div class="heading-bg  icard-views">
 <form method="post" action="twitter.php?action=post">
 <section class="panel profile-info">
 <textarea class="form-control input-lg p-text-area" rows="2" id="comment" name="t" placeholder="<?php echo langs('twitter_write_placeholder')?>"></textarea>
 <footer class="panel-footer">
 <button class=" btn btn-info pull-right"   type="submit"  ><?php echo langs('publish')?></button>
  <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden" />
<ul class="navs">
<li>
 <a id="face"  ><i class="fa fa-smile-o"></i></a>
 </li>
<div id="faceWraps">
<?php include View::getView('smiley');?>
</div> 
</ul>
</footer>
</section>                  
</form>
</div>
<div class="row">
 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
<div class="panel panel-default card-view pa-0"><div class="panel-wrapper collapse in">
<div class="panel-body pa-0">
<div class="sm-data-box bg-red">
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
<span class="txt-light block counter"><span class="counter-anim"><?php echo count_user_all() ; ?>
</span>
</span>
<span class="weight-500 uppercase-font txt-light block font-13">
<?php echo langs('_user')?></span>
</div>
<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i></div>
</div>	
</div></div>
</div>
</div>
</div>
</div><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><div class="panel panel-default card-view pa-0">
<div class="panel-wrapper collapse in">
<div class="panel-body pa-0">
<div class="sm-data-box bg-yellow">
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
<span class="txt-light block counter"><span class="counter-anim"><?php echo $sta_cache['comnum_all'];?></span></span>
<span class="weight-500 uppercase-font txt-light block">
<?php echo langs('comments')?>
</span>
</div>
<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
<i class="fa fa-comment txt-light data-right-rep-icon"></i>					
</div>
</div>	
</div></div></div>
</div>
</div></div>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><div class="panel panel-default card-view pa-0">
<div class="panel-wrapper collapse in">
<div class="panel-body pa-0">
<div class="sm-data-box bg-green">
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
<span class="txt-light block counter">
<span class="counter-anim">
<?php echo $sta_cache['lognum'];?>
</span>
</span>
<span class="weight-500 uppercase-font txt-light block">
<?php echo langs('posts')?>
</span>
</div>
<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
<i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
</div>
</div>	
</div>
</div>
</div>
</div>
</div>
</div><div class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><div class="panel panel-default card-view pa-0"><div class="panel-wrapper collapse in"><div class="panel-body pa-0"><div class="sm-data-box bg-blue">
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
<span class="txt-light block counter">
<span class="counter-anim">
<?php echo $sta_cache['twnum'];?>
</span>
</span>
<span class="weight-500 uppercase-font txt-light block">
<?php echo langs('twitter')?>
</span>
</div>
<div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
<i class="fa fa-coffee txt-light data-right-rep-icon"></i>
</div></div>	
</div></div>
</div>
</div>
</div></div></div>
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><i class="fa fa-laptop "></i> <?php echo langs('site_info')?></h6>
</div>
<div class="pull-right">
<a href="index.php?action=phpinfo" class="pull-left inline-block">
<i class="zmdi zmdi-more-vert"></i>
</a>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div>
<span class="pull-left inline-block capitalize-font txt-dark">
<?php echo langs('db_prefix')?>
</span>
<span class="pull-right"><?php echo DB_PREFIX; ?></span>
<div class="clearfix"></div>
<hr class="light-grey-hr row mt-10 mb-10"/>
<span class="pull-left inline-block capitalize-font txt-dark">
<?php echo langs('php_version')?>
</span>
<span class="pull-right"><?php echo $php_ver; ?></span>
<div class="clearfix"></div>
<hr class="light-grey-hr row mt-10 mb-10"/>
<span class="pull-left inline-block capitalize-font txt-dark">
<?php echo langs('mysql_version')?>
</span>
<span class="pull-right"><?php echo $mysql_ver; ?></span>
<div class="clearfix"></div>
<hr class="light-grey-hr row mt-10 mb-10"/>
<span class="pull-left inline-block capitalize-font txt-dark">
<?php echo langs('server_environment')?>
</span>
<span class="pull-right"><?php echo $serverapp; ?></span>
<div class="clearfix"></div>
<hr class="light-grey-hr row mt-10 mb-10"/>
<span class="pull-left inline-block capitalize-font txt-dark">
<?php echo langs('gd_library')?>
</span>
<span class="pull-right"><?php echo $gd_ver; ?></span>
<div class="clearfix"></div>
<hr class="light-grey-hr row mt-10 mb-10"/>
<span class="pull-left inline-block capitalize-font txt-dark">
<?php echo langs('server_max_upload_size')?>
</span>
<span class="pull-right"><?php echo $uploadfile_maxsize; ?></span>
<div class="clearfix"></div>
</div>
</div>	
</div>
</div>
<?php }else{ ?>
<div class="row">
<div class="col-lg-3 col-xs-12">
<div class="panel panel-default card-view  pa-0">
<div class="panel-wrapper collapse in">
<div class="panel-body  pa-0">
<div class="profile-box">
<div class="profile-cover-pic">
<div class="profile-image-overlay"></div>
</div>
<div class="profile-info text-center">
<div class="profile-img-wrap">
<img class="inline-block mb-10" src="<?php echo $avatar =preg_replace('/thum-|thum52-/','',$avatar); ?>"   alt="user"/>
</div>	
<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-danger"><?php echo $name ?></h5>
<h6 class="block capitalize-font pb-20"><?php if (ROLE == ROLE_ADMIN):?><?php echo langs('admin')?><?php else:?><?php echo langs('user')  ?><?php endif;?></h6>
</div>	
<div class="social-info">
<div class="row">
<div class="col-xs-4 text-center">
<span class="counts block head-font"><span class="counter-anim"><?php echo $sta_cache[UID]['lognum'];?></span></span>
<span class="counts-text block">
<?php echo langs('posts')?>
</span>
</div>
<div class="col-xs-4 text-center">
<span class="counts block head-font"><span class="counter-anim"><?php echo $sta_cache[UID]['commentnum'];?></span></span>
<span class="counts-text block">
<?php echo langs('comments')?>
</span>
</div>
<div class="col-xs-4 text-center">
<span class="counts block head-font"><span class="counter-anim">
<?php 
if (ROLE == ROLE_ADMIN){
echo $sta_cache['draftnum'] == 0 ? '' : ''.$sta_cache['draftnum'].''; 
}else{
echo $sta_cache[UID]['draftnum'] == 0 ? '' : ''.$sta_cache[UID]['draftnum'].'';
}
?>
</span>
</span>
<span class="counts-text block"><?php echo langs('drafts')?></span>
</div>
</div>
<div class="btn btn-default btn-block btn-outline btn-anim mt-30"><a href="blogger.php"><i class="fa fa-pencil"></i><span class="btn-text"><?php echo langs('editor_user')?></span></a></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-9 col-xs-12">
<div class="panel panel-default card-view pa-0">
<div class="panel-wrapper collapse in">
<div  class="panel-body pb-0">
<div  class="tab-struct custom-tab-1">
<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
<li class="active" role="presentation">
<a><span><?php echo langs('news_commet')?></span></a></li>
</ul>
<div class="tab-content">
<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
<div class="col-md-12">
<div class="pt-20">
<div class="streamline user-activity">
<?php echo yourcom() ?>						
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<script type="text/javascript">
$(document).ready(function(){
$("#face").click(function(){
var wrap = $("#faceWraps");wrap.show();
});
});
 $("#menu_index").addClass('active');
 </script>