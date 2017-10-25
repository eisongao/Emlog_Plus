<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div class="heading-bg  card-views">
 <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active"><?php echo langs('twitter')?></li>
  </ul>
</div>	
<?php if(isset($_GET['active_t'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('published_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_set'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('settings_saved_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['active_del'])):?>
 <div class="actived alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('twitter_delete_ok')?>
</div>
<?php endif;?>
<?php if(isset($_GET['error_a'])):?>
 <div class="actived alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<?php echo langs('twitter_empty')?>
</div>
<?php endif;?>
<div class="heading-bg  icard-views">
 <form method="post" action="twitter.php?action=post">
 <section class="panel profile-info">
 <textarea class="form-control input-lg p-text-area" rows="2" id ="comment" name="t" placeholder="<?php echo langs('twitter_write_placeholder')?>"></textarea>
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
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-body">
<ul class="timeline">
  <?php
    $sid=0;
    foreach($tws as $val):
    $author = $user_cache[$val['author']]['name'];
    $avatar = empty($user_cache[$val['author']]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[$val['author']]['avatar'];
    $tid = (int)$val['id'];
    $replynum = $Reply_Model->getReplyNum($tid);
    $hidenum = $replynum - $val['replynum'];
    $img = empty($val['img']) ? "" : '<a title="'.$checkpic.'" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
?>									
<li <?php  if($sid % 2 == 0) {?><?php }else{ ?>class="timeline-inverted"<?php }?>>
<div class="post timeline-badge bg-pink">
<?php  if($replynum > 0){?><a href="#<?php echo $tid?>" data-toggle="modal" title="<?php echo langs('reply')?>"><i class="fa fa-comment  txt-light" ></i></a><?php }else{ ?><i class="fa fa-user  txt-light" ></i><?php }?>
</div><div class="timeline-panel pa-30">
<div class="timeline-heading">
<h6 class="mb-15"><?php echo $val['date'];?> </h6>
</div>
<div class="timeline-body">
<p>
<?php echo $val['t'];?> <br/><?php echo $img;?>
</p>
<a href="javascript: em_confirm(<?php echo $tid;?>, 'tw', '<?php echo LoginAuth::genToken(); ?>');" class="care" style="float:right"><?php echo langs('delete')?></a>		
</div>
</div>
</li>
<?php  if($replynum > 0):?>
<div aria-hidden="true" role="dialog" tabindex="-1" id="<?php echo $tid ?>" class="modal fade" style="display: none;">		
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
<h4 class="modal-title"><?php echo langs('reply')?>(<?php echo $replynum;?>)</h4>
</div>
<div class="recent-chat-box-wrap">
<div class="recent-chat-wrap">
<div class="panel-wrapper collapse in">
<div class="panel-body pa-0">
<div class="chat-content">
<ul class="nicescroll-bar pt-20">
<?php 
$i=0;
$db=Database::getInstance();
$sql = " SELECT * FROM `".DB_PREFIX."reply` WHERE `tid` = $tid  ";
$rs = $db -> query($sql);
while( $row = $db -> fetch_array($rs) ){
$i++;
?>
<?php  if($i% 2 == 0) {?>
<li class="self mb-10">
<div class="self-msg-wrap">
<div class="msg block pull-right"> 
<?php }else{ ?>
<li class="friend">
<div class="friend-msg-wrap">
<img class="user-img img-circle block pull-left"  src="./views/images/avatar/default_<?php echo rand(1,8) ?>.png" alt="user"/>
<div class="msg pull-left">
<?php }?>
<p><?php echo $row['name']?>:<?php echo $row['content']?></p>
<div class="msg-per-detail text-right">
<span class="msg-time txt-grey"><?php echo date('Y-m-d',$row['date'])?></span>
<script>
   function insert(){
       $("#r_<?php echo $row['tid'] ?>").insertString("@<?php echo $row['name']?>	");
    }
 </script>
<a id="insert" onclick="insert()"><?php echo langs('reply')?></a>
<?php  if($row['hide'] == 'n') {?>
<a href="./twitter.php?action=hidereply&id=<?php echo $row['id'] ?>&tid=<?php echo $row['tid'] ?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('hide')?></a>
<?php }else{ ?>
<a href="./twitter.php?action=pubreply&id=<?php echo $row['id'] ?>&tid=<?php echo $row['tid'] ?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('approve')?></a>
<?php } ?>
<a href="./twitter.php?action=delreply&id=<?php echo $row['id']?>&tid=<?php echo $row['tid'] ?>&token=<?php echo LoginAuth::genToken(); ?>"><?php echo langs('delete')?></a> 
</div>
</div>
<div class="clearfix"></div>
</div>	
</li>
<?php }?>
</ul>
</div>
 <form method="post" action="twitter.php"  onsubmit="c(this)">
<div class="input-group"  >
<input type="text" id="r_<?php echo $val['id'] ?>" name="r" class="input-msg-send form-control" placeholder="<?php echo langs('want_reply')?>">
</div>
</form>
<script>
function c(obj){
obj.action+="?action=reply&tid=<?php echo $val['id'] ?>&r="+document.getElementById("r_<?php echo $val['id'] ?>").value;
}
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>				
<?php endif;?>			
<?php 
$sid++;endforeach;?>	
<li class="clearfix no-float"></li>    				
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="form-group text-center">
<h6 class="panel-title txt-dark"><?php echo langs('have')?><?php echo $twnum; ?><?php echo langs('_twitters')?></h6>
<?php if(!empty($pageurl)){ ?>
 <div id="pagenav">
 <?php echo $pageurl; ?>
</div>
<?php }?>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$("#face").click(function(){
var wrap = $("#faceWraps");wrap.show();
});
});
$.extend($.fn,{
        getSelectionStart: function() {
            var e = this[0];
            if (e.selectionStart) {
                return e.selectionStart;
            } else if (document.selection) {
                e.focus();
                var r=document.selection.createRange();
                var sr = r.duplicate();
                sr.moveToElementText(e);
                sr.setEndPoint('EndToEnd', r);
                return sr.text.length - r.text.length;
            }
            return 0;
        },
        getSelectionEnd: function() {
            var e = this[0];
            if (e.selectionEnd) {
                return e.selectionEnd;
            } else if (document.selection) {
                e.focus();
                var r=document.selection.createRange();
                var sr = r.duplicate();
                sr.moveToElementText(e);
                sr.setEndPoint('EndToEnd', r);
                return sr.text.length;
            }
            return 0;
        },
        insertString: function(str) {
            $(this).each(function() {
                var tb = $(this);
                tb.focus();
                if (document.selection){
                    var r = document.selection.createRange();
                    document.selection.empty();
                    r.text = str;
                    r.collapse();
                    r.select();
                } else {
                    var newstart = tb.get(0).selectionStart+str.length;
                    tb.val(tb.val().substr(0,tb.get(0).selectionStart) +
                            str + tb.val().substring(tb.get(0).selectionEnd));
                    tb.get(0).selectionStart = newstart;
                    tb.get(0).selectionEnd = newstart;
                }
            });

            return this;
        },
        setSelection: function(startIndex,len) {
            $(this).each(function(){
                if (this.setSelectionRange){
                    this.setSelectionRange(startIndex, startIndex + len);
                } else if (document.selection) {
                    var range = this.createTextRange();
                    range.collapse(true);
                    range.moveStart('character', startIndex);
                    range.moveEnd('character', len);
                    range.select();
                } else {
                    this.selectionStart = startIndex;
                    this.selectionEnd = startIndex + len;
                }
            });

            return this;
        },
        getSelection: function() {
            var elem = this[0];

            var sel = '';
            if (document.selection){
                var r = document.selection.createRange();
                document.selection.empty();
                sel = r.text;
            } else {
                var start = elem.selectionStart;
                var end = elem.selectionEnd;
                var content = $(elem).is(':input') ? $(elem).val() : $(elem).text();
                sel = content.substring(start, end);
            }
            return sel;
        }
    })
setTimeout(hideActived,2600);    
$("#menu_tw").addClass('active-page');
$("#menu_log").addClass('active');
</script>