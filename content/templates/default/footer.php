<?php 
/**
 * 页面底部信息
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="wrapper">
</div>
</div>
</div>
<div class="footer" id="footer">
&copy; 2017-2018 <a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>.<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $icp; ?></a> <?php echo $footer_info; ?>
<br/><br/>
Powered by <a href="http://www.emlog.net" title="<?php echo langs('powered_by_emlog')?>">Emlog</a>
<?php doAction('index_footer'); ?>
</div>
<script>
prettyPrint();
var main = new main(); 
var Scroll = new iScroll('swipe',{hScroll:false,hScrollbar:false, vScrollbar:false});
</script>
</body>
</html>