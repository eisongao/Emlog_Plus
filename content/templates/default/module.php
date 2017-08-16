<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
<li>
<h2 class="widgettitle"><?php echo $title; ?></h2>
<div id="bloggerinfo">
<h3><?php if (!empty($user_cache[1]['photo']['src'])): ?>
<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>">
<?php endif;?>
<span><?php echo $name; ?></span>
</h3>
<ul>
<a><?php echo $user_cache[1]['des']; ?></a>
<br/>
<p><?php echo langs('email')?>：<?php echo $user_cache[1]['mail']?></p>
<br/>
<p><?php echo langs('feed_rss')?>：<a href='rss.php' target='_blank'>RSS</a> 
</p>
</ul>
</div>
</li>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
<li>
<h2 class="widgettitle"><?php echo $title; ?></h2>
<div class="f_calendar" id="calendar">
</div><script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
</li>
<?php }?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<li id="blogtags" class="widget">
	<h2 class="widgettitle"><?php echo $title; ?></h2>
		<ul>
		<?php foreach($tag_cache as $value): ?>
		<span style="font-size:<?php echo $value['fontsize']; ?>pt; line-height:30px;">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> <?php echo langs('_posts')?>"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</ul>
	</li>
<?php }?>
<?php
//widget：分类
function widget_sort($title){
    global $CACHE;
    $sort_cache = $CACHE->readCache('sort'); ?>
	<h2 class="widgettitle"><?php echo $title; ?></h2>
    <ul class="list-unstyled" style="color:#666">
        <?php
        foreach($sort_cache as $value):
            if ($value['pid'] != 0) continue;
        ?>
        <li  id="sortm">
        <a href="<?= Url::sort($value['sid']) ?>"><?= $value['sortname'] ?>(<?= $value['lognum'] ?>)</a>
        <?php if (!empty($value['children'])): ?>
            <ul>
            <?php
            $children = $value['children'];
            foreach ($children as $key):
                $value = $sort_cache[$key];
            ?>
            <li id="sortc">
                <a href="<?= Url::sort($value['sid']) ?>"><?= $value['sortname'] ?>(<?= $value['lognum'] ?>)</a>
            </li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<li id="newlog" class="widget">
<h2 class="widgettitle"><?php echo $title; ?></h2>
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="'.langs('view_image').'" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?><label style="float:right"><?php echo smartDate($value['date']); ?></label>
	</li></li>
	<?php endforeach; ?>
    <?php if ($istwitter == 'y') :?>
	<p><a href="<?php echo BLOG_URL . 't/'; ?>"><?php echo langs('more')?></a></p>
	<?php endif;?>
	</ul>
	</li>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<li id="newcomment" class="widget">
	<h2 class="widgettitle"><?php echo $title; ?></h2>
		<ul>
		<?php
		foreach($com_cache as $value):
		$url = Url::comment($value['gid'], $value['page'], $value['cid']);
		?>
		<li id="comment"><?php echo $value['name']; ?>
		<a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
		<?php endforeach; ?>
				</ul>
	</li>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<li id="newlog" class="widget">
	<h2 class="widgettitle"><?php echo $title; ?></h2>
		<ul>
		<?php foreach($newLogs_cache as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
				</ul>
		</li>
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	
		<li id="hotlog" class="widget">
		<h2 class="widgettitle"><?php echo $title; ?></h2>
		<ul>
		<?php foreach($randLogs as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
				</ul>
		</li>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<li id="randlog" class="widget">
		<h2 class="widgettitle"><?php echo $title; ?></h2>
		<ul>
		<?php foreach($randLogs as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
				</ul>
		</li>
<?php }?>
<?php
//widget：搜索
function widget_search($title){ ?>
<li id="logsearch" class="widget">
	<h2 class="widgettitle"><?php echo $title; ?></h2>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo BLOG_URL; ?>index.php">
<div>
<label class="screen-reader-text" for="s"><?php echo $title; ?></label>
<input value="" name="keyword" id="s" type="text">
</div>
</form>
</li>
<?php } ?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<li id="record" class="widget">
	<h2 class="widgettitle"><?php echo $title; ?></h2>
		<ul id="record">
		<?php foreach($record_cache as $value): ?>
			<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
		<?php endforeach; ?>
				</ul>
		</li>
<?php } ?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<li>
<h2 class="widgettitle"><?php echo $title; ?></h2>
	<ul>
	<?php echo $content; ?>
	</ul>
	</li>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	
	<li id="link" class="widget">
		<h2 class="widgettitle"><?php echo $title; ?></h2>
	<ul class="xoxo blogroll">
		<?php foreach($link_cache as $value): ?>
		<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
		<?php endforeach; ?>
	</ul>
</li>
<?php }?> 
<?php
//导航
function blog_navi(){
    global $CACHE; 
    $navi_cache = $CACHE->readCache('navi');
    ?>
<?php
            foreach($navi_cache as $value):
            if ($value['pid'] != 0) {
                continue;
            }
            if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
            ?>
<li class="item common"><a href="<?php echo  BLOG_URL ?>admin/"><?php echo langs('site_management')?></a></li>
<li class="item common"><a href="<?php echo BLOG_URL ?>admin/?action=logout"><?php echo langs('logout')?></a></li>
 <?php 
           continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
            ?>
            <?php if (!empty($value['children']) || !empty($value['childnavi'])) :?>
            <li class="item <?php echo $current_tab;?>">
                <?php if (!empty($value['children'])):?>
                <a href="<?php echo  $value['url'] ?>"><?php echo  $value['naviname'] ?></a>
                <ul class="dropdown-menu">
                    <?php foreach ($value['children'] as $row){
                            echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                    }?>
                </ul>
                <?php endif;?>
                <?php if (!empty($value['childnavi'])) :?>
                <a href="<?php echo  $value['url'] ?>" <?= $newtab ?>><?php echo  $value['naviname'] ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <?php foreach ($value['childnavi'] as $row){
                            $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                            echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                    }?>
                </ul>
                <?php endif;?>
            </li>
            <?php else:?>
            <li    class="item <?php echo $current_tab;?>"><a href="<?php echo $value['url'] ?>" ><?php echo $value['naviname'] ?></a></li>
            <?php endif;?>
            <?php endforeach; ?>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
echo $top == 'y' ? "<i class=\"icon iconfont\" title=\"".langs('top_posts')."\">&#xe717</i> " : '';
    } elseif($sortid){
echo $sortop == 'y' ? "<i class=\"icon iconfont\" title=\"".langs('top_posts')."\"title=\"".langs('cat_top_posts')."\">&#xe717</i> " : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">'.langs('edit').'</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = langs('tags').': ';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>

<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
    extract($neighborLog);?>
    <?php if($prevLog):?>
    &laquo; <a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'] ?></a>
    <?php endif;?>
    <?php if($nextLog && $prevLog):?>
        |
    <?php endif;?>
    <?php if($nextLog):?>
         <a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'] ?></a>&raquo;
    <?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
<div id="comment" class="comment-wrapper">
<a name="comments"></a>
<?php endif; ?>
<ol class="commentlist">
<?php
$isGravatar = Option::get('isgravatar');
				foreach($commentStacks as $cid):
				$comment = $comments[$cid];
				$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
			?>
<li class="comment even thread-even depth-1 parent" id="comment-<?php echo $comment['cid']; ?>">
<a name="<?php echo $comment['cid']; ?>"></a>
<div id="div-comment-<?php echo $comment['cid']; ?>" class="comment-body">
<div class="comment-author vcard">
<?php if($isGravatar == 'y'): ?>
<img alt="" src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-32 photo" height="32" width="32">
<?php endif; ?>
<cite class="fn">
<?php echo $comment['poster']; ?></cite>
<span class="says"></span>		
</div>
<div class="comment-meta commentmetadata">
<a name="comments">
<?php echo $comment['date']; ?>
</a>
</div>
<p><?php echo $comment['content']; ?></p>
<div class="reply">
<a href="#comment-<?= $comment['cid'] ?>" onclick="commentReply(<?= $comment['cid'] ?>,this)"><?php echo langs('reply')?></a>
</div>
</div>
<ul class="children">
<?php blog_comments_children($comments, $comment['children']); ?>
</ul>
</li>
<?php endforeach; ?>
</ol>
<div class="pageNo">
<?php echo $commentPageUrl;?>
</div>
<br/>
</div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
<ul class="children">
<li class="comment" id="comment-<?php echo $comment['cid']; ?>">
<div id="div-comment-<?php echo $comment['cid']; ?>" class="comment-body">
<div class="comment-author vcard">
<?php if($isGravatar == 'y'): ?>
<img alt="" src="<?php echo getGravatar($comment['mail']); ?>" class="avatar avatar-32 photo" height="32" width="32">
<?php endif; ?>
<cite class="fn"><?php echo $comment['poster']; ?></cite>
<span class="says"></span>
<div class="comment-meta commentmetadata">
<a name="comments">
<?php echo $comment['date']; ?></a>		
</div>
<a href="#-<?php echo $comment['cid']; ?>" class="reportname">
<i class="iconfont"></i>
</a> 
<p >
<?php echo $comment['content']; ?>
</p>
<?php if($comment['level'] < 4): ?>
<div class="reply"><a href="#comment-<?= $comment['cid'] ?>" onclick="commentReply(<?= $comment['cid'] ?>,this)"><?php echo langs('reply')?></a>
</div>
<?php endif; ?>
</div>
</li>
<?php blog_comments_children($comments, $comment['children']); ?>
<?php endforeach; ?>
</ul>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
    if($allow_remark == 'y'): ?>
    <div id="comment-place" class="comment-respond">
    <div class="comment-post" id="comment-post">
<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()"><?php echo langs('cancel_reply')?></a></div>
<h2 class="widgettitle"><?php echo langs('comment_leave')?></h2> <a name="respond"></a></p>
        <form method="post" name="commentform" action="<?= BLOG_URL ?>index.php?action=addcom" id="commentform">
            <input type="hidden" name="gid" value="<?= $logid ?>">
<?php if(ROLE == ROLE_VISITOR): ?>
			<p class="comment-form-author">
			    <label for="author"><?php echo langs('nickname')?><span class="required">*</span></label>
			    <input name="comname" id="author" onblur="if (this.value =='') this.value='<?php if(empty($ckname)){echo preg_replace('/((?:\d+\.){3})\d+/',"\\1*",getIp());}else{echo $ckname;} ?>'" onclick="this.value=''" value="<?php if(empty($ckname)){echo preg_replace('/((?:\d+\.){3})\d+/',"\\1*",getIp());}else{echo $ckname;} ?>" size="22" tabindex="1" required="required" type="text">
			</p>
			<p class="comment-form-email">
				<label for="email"><?php echo langs('email_optional')?> <span class="required">*</span></label>
				<input type="email" name="commail"  maxlength="128"  value="<?php echo $ckmail; ?>" required="required" size="22" tabindex="2">
			</p>
			<p class="comment-form-url">
				<label for="url"><?php echo langs('homepage_optional')?></label>
				<input type="text" name="comurl" maxlength="128"  value="<?php echo $ckurl; ?>" size="22" tabindex="3">
			</p>
		    <?php else: ?>
		        <p><a class="no-ajax" href="./admin/?action=logout"><?php echo langs('logout')?> »</a></p>
			<?php endif; ?>
            <p><textarea name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
<?php echo $verifyCode ?> 
<p><button type="submit" class="comment_submit"  ><?php echo langs('comment_leave')?></button></p>
            <input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1">
        </form>
    </div>
    </div>
    <?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>