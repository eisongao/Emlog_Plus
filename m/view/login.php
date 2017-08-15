<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<div id="m">
	<form method="post" action="./index.php?action=auth">
		<?php echo langs('user_name')?><br />
	    <input type="text" name="user" /><br />
	    <?php echo langs(''password)?><br />
	    <input type="password" name="pw" /><br />
	    <?php echo $ckcode; ?>
	    <br /><input type="submit" class="replys" value="  <?php echo langs(''log_in)?>" />
	</form>
</div>