<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
  <script type="text/javascript" src="./views/js/jquery-ui.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/js/sortable.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>           	<div class="heading-bg  card-views">
 <ul class="breadcrumbs">
  <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
   <li class="active"><?php echo langs('widget_manage')?></li>
 </ul>
</div>
<?php if(isset($_GET['activated'])):?>
<div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('settings_saved_ok')?>
</div>
<?php endif;?>
<div class="row">
    <div class="col-lg-6" id="adm_widget_list">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <?php echo langs('system_widgets')?>
            </div>
  <div class="panel-body"><div class="panel-group" id="accordion"><div id="blogger" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".blogger" aria-expanded="false" class="widget-title"><?php echo langs('blogger')?></a>
 <li class="widget-act-add"></li>
 <li class="widget-act-del"></li></h4></div>
<div class="blogger panel-collapse collapse" aria-expanded="false" style="height: 0px;">
<div class="panel-body">
<form action="widgets.php?action=setwg&wg=blogger" method="post" class="form-inline">
 <div class="panel-body pa-15">
 <input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['blogger']; ?>"  /> 
 <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" />
 </div>
  </form>
  </div>
 </div>
 </div><div id="calendar" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".calendar" class="widget-title" aria-expanded="false"><?php echo langs('calendar')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
<div class="calendar panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=calendar" method="post" class="form-inline">
<div class="panel-body pa-15"><input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['calendar']; ?>"  /> <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" /></div></form>
</div></div>
</div>
<div id="twitter" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".twitter" class="widget-title" aria-expanded="false"><?php echo langs('twitter_latest')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="twitter panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=twitter" method="post" >
                                <div class="panel-body pa-15">
                                <div class="form-group">
<label class="control-label mb-10"><?php echo langs('title')?></label>
<input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['twitter']; ?>"  />
</div>
 <div class="form-group">
<label class="control-label mb-10"><?php echo langs('twitter_latest_num')?></label>
<input class="form-control" maxlength="5" size="10" value="<?php echo Option::get('index_newtwnum'); ?>" name="index_newtwnum" />
</div>
 <div class="form-group">                                  
 <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" />
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
 <div id="tag" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".tag" class="widget-title" aria-expanded="false"><?php echo langs('tags')?></a><li class="widget-act-add"></li>
<li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="tag panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=tag" method="post" class="form-inline"><div class="panel-body pa-15"><input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['tag']; ?>"  /> <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" /></div>
</form>
 </div>
 </div>
 </div><div id="sort" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".sort" class="widget-title" aria-expanded="false"><?php echo langs('categories')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="sort panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=sort" method="post" class="form-inline">
                                    <div class="panel-body pa-15"><input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['sort']; ?>"  /> <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" /></div>
                                </form>
                            </div>
                        </div>
                    </div>                                <div id="archive" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".archive" class="widget-title" aria-expanded="false"><?php echo langs('archive')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="archive panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=archive" method="post" class="form-inline">
                                    <div class="panel-body pa-15"><input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['archive']; ?>"  /> <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" /></div>
                                </form>
                            </div>
                        </div>
                    </div>                                

                    <div id="newcomm" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".newcomm" class="widget-title" aria-expanded="false"><?php echo langs('new_comments')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="newcomm panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=newcomm" method="post" >
                                <div class="panel-body pa-15">
                                <div class="form-group">
<label class="control-label mb-10"><?php echo langs('title')?></label>
<input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['newcomm']; ?>"  /></div><div class="form-group">
<label class="control-label mb-10"><?php echo langs('last_comments_num')?></label>
<input class="form-control" maxlength="5" size="10" value="<?php echo Option::get('index_comnum'); ?>" name="index_comnum" />
</div>
 <div class="form-group">
<label class="control-label mb-10"><?php echo langs('new_comments_length')?></label>
 <input class="form-control" maxlength="5" size="10" value="<?php echo Option::get('comment_subnum'); ?>" name="comment_subnum" /> 
 </div>
 <div class="form-group">                                             
<input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" />
</div>
</div></form>
</div>
</div></div>  <div id="newlog" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".newlog" class="widget-title" aria-expanded="false"><?php echo langs('new_posts')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="newlog panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=newlog" method="post">
                                    <div class="panel-body pa-15">
                                <div class="form-group">
<label class="control-label mb-10"><?php echo langs('title')?></label>
                                   <input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['newlog']; ?>"  /></div>
                                     <div class="form-group">
<label class="control-label mb-10"><?php echo langs('new_posts_show')?></label>
                                 <input class="form-control" maxlength="5" size="10" value="<?php echo Option::get('index_newlognum'); ?>" name="index_newlog" /> 
                                 </div>
                       <div class="form-group">                                          
                              <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" />
                              </div>
                              </div>
                                </form>
                            </div>
                        </div>
                    </div>  <div id="hotlog" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".hotlog" class="widget-title" aria-expanded="false"><?php echo langs('hot_posts')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="hotlog panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=hotlog" method="post"> <div class="panel-body pa-15">
 <div class="form-group">
<label class="control-label mb-10">
<?php echo langs('title')?></label>
 <input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['hotlog']; ?>"  />
 </div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('hot_posts_home')?></label>
<input class="form-control" maxlength="5" size="10" value="<?php echo Option::get('index_hotlognum'); ?>" name="index_hotlognum" /> 
</div>
 <div class="form-group">                                                                      
 <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" />
</div>
</div>
</form>
</div>
</div>
</div>
<div id="random_log" class="panel panel-default">
  <div class="panel-heading">
  <h4 class="panel-title">
  <a data-toggle="collapse" data-parent="#accordion" href=".random_log" class="widget-title" aria-expanded="false"><?php echo langs('random_post')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>                                                                                
<div class="random_log panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=random_log" method="post">
  <div class="panel-body pa-15">
  <div class="form-group">
<label class="control-label mb-10"><?php echo langs('title')?></label>
<input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['random_log']; ?>"  />
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('random_post_home')?></label>
  <input class="form-control" maxlength="5" size="10" value="<?php echo Option::get('index_randlognum'); ?>" name="index_randlognum" /> 
  </div>
 <div class="form-group">                                                                      
<input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" />
</div>
</div>
</form>
 </div>
 </div>
</div>                    
<div id="link" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href=".link" class="widget-title" aria-expanded="false"><?php echo langs('links')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="link panel-collapse collapse" aria-expanded="false">
<div class="panel-body"><form action="widgets.php?action=setwg&wg=link" method="post" class="form-inline">
<div class="panel-body pa-15"><input type="text" name="title" class="form-control" value="<?php echo $customWgTitle['link']; ?>"  /> <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" /></div>
</form>
</div>
</div>
</div> <div id="search" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href=".search" class="widget-title" aria-expanded="false"><?php echo langs('search')?></a>
                                <li class="widget-act-add"></li>
                                <li class="widget-act-del"></li>
                            </h4>
                        </div>
                        <div class="search panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <form action="widgets.php?action=setwg&wg=search" method="post" class="form-inline">
                                    <div class="panel-body pa-15"><input type="text" name="title" value="<?php echo $customWgTitle['search']; ?>" class="form-control" /> <input type="submit" name="" value="<?php echo langs('change')?>" class="btn btn-primary btn-sm" /></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<div class="panel panel-default  card-view">
            <div class="panel-heading">
                <?php echo langs('widgets_custom')?>
            </div>
            <div class="panel-body">
                <div class="panel-group" id="accordion"><?php
 foreach ($custom_widget as $key => $val):
preg_match("/^custom_wg_(\d+)/", $key, $matches);
$custom_wg_title = empty($val['title']) ? langs('widget_untitled'). ' (' . $matches[1] . ')' : $val['title'];
?>
 <div class="panel panel-default" id="<?php echo $key; ?>">
 <div class="panel-heading">
 <h4 class="panel-title">
  <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $key; ?>" aria-expanded="false" class="widget-title"><?php echo $custom_wg_title; ?></a>
 <li class="widget-act-add"></li>
 <li class="widget-act-del"></li></h4></div>
 <div id="collapse_<?php echo $key; ?>" class="panel-collapse collapse" aria-expanded="false">
 <div class="panel-body" class="form-group">
 <form action="widgets.php?action=setwg&wg=custom_text" method="post">
 <div class="panel-body pa-15">
 <div class="form-group">
<label class="control-label mb-10"><?php echo langs('widget_title')?></label>
<input type="hidden" name="custom_wg_id" value="<?php echo $key; ?>" />
<input type="text" name="title" class="form-control" value="<?php echo $val['title']; ?>" />
 </div>
 <div class="form-group">
<label class="control-label mb-10"><?php echo langs('widget_content_info')?> </label><textarea class="form-control" name="content" style="overflow:auto; height:260px;"><?php echo $val['content']; ?></textarea>
</div>
  <div class="form-group">
 <input type="submit" class="btn btn-primary" name="" value="<?php echo langs('change')?>" />
<a class="btn btn-danger" href="widgets.php?action=setwg&wg=custom_text&rmwg=<?php echo $key; ?>"><?php echo langs('widget_delete')?></a>
</div>                                        
</div></form>
</div>
</div>
</div>
<?php endforeach; ?>
<div class="clearfix"></div>
<div class="form-group btnbutton">	<a class="btn btn-success" href="#custom_text_new" data-toggle="modal" ><?php echo langs('widget_custom_add')?></a>
</div>
<div aria-hidden="true" role="dialog" tabindex="-1" id="custom_text_new" class="modal fade" style="display: none;">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('widget_add')?></h4>
</div>
<div class="modal-body">
<form action="widgets.php?action=setwg&wg=custom_text" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('widget_title')?></label>
               <div class="col-lg-10"> 
                <input type="text" class="form-control" name="new_title"  value="" />
            </div>
            </div>
           <div class="form-group">
<label class="col-lg-2 control-label"><?php echo langs('widget_content_info')?></label>
               <div class="col-lg-10"> 
                <textarea name="new_content" class="form-control" rows="10" ></textarea>
            </div>											</div>
       <div class="form-group">
            	<div class="col-lg-10"> 
            	   <input type="submit" class="btn btn-primary btn-sm" name="" value="<?php echo langs('widget_add')?>"  />
            	   </div>	
   </div>					
   </form>
</div>
</div>
</div>
</div>
</div>
 </div>
 </div>
 </div>
<div class="col-lg-6">
        <div class="panel panel-default  card-view">
            <div class="panel-heading">
                <?php echo langs('widget_use')?>
            </div>
            <form action="widgets.php?action=compages" method="post" class="form-inline">
<?php if($tpl_sidenum > 1):?>
<div class="form-group">
<select id="wg_select"  class="form-control">
<?php for ($i=1; $i<=$tpl_sidenum; $i++):
if($i == $wgNum):
?>
<option value="<?php echo $i;?>" selected><?php echo langs('sidebar')?><?php echo $i;?></option>
<?php else:?>
<option value="<?php echo $i;?>"><?php echo langs('sidebar')?><?php echo $i;?></option>
<?php endif;endfor;?>
</select>
</div>
 <?php endif;?>  <div class="panel-body">
  <div class="panel-group adm_widget_box" id="sortable">
<?php
                        foreach ($widgets as $widget):
                            $flg = strpos($widget, 'custom_wg_') === 0 ? true : false; //是否为自定义组件
                            $title = ($flg && isset($custom_widget[$widget]['title'])) ? $custom_widget[$widget]['title'] : ''; //获取自定义组件标题
                            if ($flg && empty($title)) {
                                preg_match("/^custom_wg_(\d+)/", $widget, $matches);
                                $title = langs('widget_untitled'). ' (' . $matches[1] . ')';
                            }
                            ?>
                        <div class="panel panel-default active_widget" id="em_<?php echo $widget; ?>" style="cursor:move;">
                                <div class="panel-heading">
                     <input type="hidden" name="widgets[]" value="<?php echo $widget; ?>" />
                                    <h4 class="panel-title">
                                        <?php if ($flg) {
                                            echo $title;
                                        } else {
                                            echo $widgetTitle[$widget];
                                        } ?>                                        
                              </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                
                <input type="hidden" name="wgnum" id="wgnum" value="<?php echo $wgNum; ?>" />
<div class="form-group text-center">	
<input type="submit" value="<?php echo langs('widget_order_save')?>" class="btn btn-primary" /> <a href="javascript:em_confirm(0, 'reset_widget', '<?php echo LoginAuth::genToken(); ?>');" class="btn btn-danger" ><?php echo langs('widget_setting_reset')?></a></div>
            </form>
        </div>
    </div>
</div>
<script>
setTimeout(hideActived,2600);
$(document).ready(function () {
var widgets = $(".active_widget").map(function(){return $(this).attr("id");});
        $.each(widgets,function(i,widget_id){
            var widget_id = widget_id.substring(3);
            $("#"+widget_id+" .widget-act-add").hide();
            $("#"+widget_id+" .widget-act-del").show();
        });

        //添加组件
        $("#adm_widget_list .widget-act-add").click(function(){
            var title = $(this).prevAll(".widget-title").html();
            var widget_id = $(this).parent().parent().parent().attr("id");
            var widget_element = "<div class=\"panel panel-default active_widget\" id=\"em_"+widget_id+"\">";
                widget_element += "<div class=\"panel-heading\">";
                widget_element += "<input type=\"hidden\" name=\"widgets[]\" value=\""+widget_id+"\" />";
                widget_element += "<h4 class=\"panel-title\">"+title+"</h4>";
                widget_element += "</div>";
                widget_element += "</div>";
            $(".adm_widget_box").append(widget_element);
            $(this).hide();
            $(this).next(".widget-act-del").show();
        });
        //删除组件
        $("#adm_widget_list .widget-act-del").click(function(){
            var widget_id = $(this).parent().parent().parent().attr("id");
            $(".adm_widget_box #em_" + widget_id).remove();
            $(this).hide();
            $(this).prev(".widget-act-add").show();
        });

        //拖动
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
        var el = document.getElementById('sortable');
        var sortable = Sortable.create(el);

     //自定义组件记忆
        $("#custom_text_new").css('display', $.cookie('em_custom_text_new') ? $.cookie('em_custom_text_new') : 'none');

        $("#menu_view").addClass('in');
        $("#menu_action").addClass('active');
        $("#menu_widget").addClass('active-page');
        
    });
    $("#wg_select").change(function(){
		window.location = "widgets.php?wg="+$(this).val();
	});

</script>
