<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
<footer class="footer container-fluid pl-20 pr-20">
<div class="row">
<div class="col-sm-12">
<p>2017 &copy;  <?php echo langs('welcome_using')?><?php doAction('adm_footer');?></p>
</div>
</div>
</footer>
</div>
</div>
 <!-- Admin JavaScript -->
 <script type="text/javascript" src="./views/js/jquery.slideunlock.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
 <script src="./views/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/dist/js/jquery.slimscroll.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/vendors/bower_components/jquery.counterup/jquery.counterup.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php if(Option::get('preloader') == "y"):?>
<script src="./views/dist/js/dropdown-bootstrap-extended.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script src="./views/vendors/bower_components/switchery/dist/switchery.min.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php endif ?>
<script src="./views/dist/js/init.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
</body>
</html>