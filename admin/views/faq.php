<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
 <div class="heading-bg  card-views">
  <ul class="breadcrumbs">
 <li><a href="./"><i class="fa fa-home"></i> <?php echo langs('home')?></a></li>
  <li class="active">
   <?php echo langs('faq')?>
  </li>
  </ul>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-primary contact-card card-view">
<div class="panel-heading">
<div class="pull-left">
<div class="pull-left user-img-wrap mr-15">
<img class="card-user-img img-circle pull-left" src="./views/dist/img/logo.png" alt="user"/>
</div>
<div class="pull-left user-detail-wrap">	
<span class="block card-user-name">FLYER
</span>
<span class="block card-user-desn"><?php echo langs('faq_info')?>
</span>
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body row">
<div class="user-others-details pl-15 pr-15">
<div class="mb-15">
<i class="zmdi zmdi-email-open inline-block mr-10"></i>
<span class="inline-block txt-dark">858280596@qq.com</span>
</div>
<div class="mb-15">
<i class="zmdi zmdi-link inline-block mr-10"></i>
<span class="inline-block txt-dark">https://crazyus.ga</span>
</div>
<div class="mb-15">
<i class="zmdi zmdi-github inline-block mr-10"></i>
<span class="inline-block txt-dark">https://github.com/eisongao</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-8">
<div class="panel panel-default card-view">
<div class="panel-wrapper collapse in">
<div class="panel-body pa-15">
<div class="panel-group accordion-struct"  role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading activestate" role="tab" id="headingFive">
<a role="button" data-toggle="collapse" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" ><?php echo langs('faq_em')?></a> 
</div>
<div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
<div class="panel-body pa-15"> <?php echo langs('faq_em_info')?>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingSix">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix" ><?php echo langs('faq_em_qution')?></a>
</div>
<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
<div class="panel-body pa-15"> <?php echo langs('faq_invalid')?>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingEight">
<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight" > <?php echo langs('faq_help')?></a>
</div>
<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
<div class="panel-body pa-15"> 
<?php echo langs('faq_no')?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-info card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title  txt-light"><?php echo langs('weixin')?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body pa-15"> 				
<div class="testimonial-wrap text-center  pl-30 pr-30">
<img src="./views/dist/img/weixin.png" style="width:150px;height:150px"> 
<p class="mt-10 font-16"><?php echo langs('get_weixin')?></p>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default card-view">
<div class="panel-heading">
<div class="pull-left">
<h6 class="panel-title txt-dark"><?php echo langs('faq_user')?></h6>
</div>
<div class="clearfix"></div>
</div>
<div class="panel-wrapper collapse in">
<div class="panel-body">
<div class="row">
<div class="col-sm-12 col-xs-12">
<div class="form-wrap">
<form action="./faq.php?action=post" method="post">
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('faq_name')?></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-user"></i></div>
<input type="text" class="form-control" name="username" placeholder="Username">
</div>
</div>
<div class="form-group">
<label class="control-label mb-10"><?php echo langs('faq_mail')?></label>
<div class="input-group">
<div class="input-group-addon"><i class="fa fa-at"></i></div>
<input type="email" class="form-control" name="email" placeholder="Enter email">
</div>
</div>
<div class="form-group">
<label class="control-label mb-10" ><?php echo langs('faq_content')?></label>
<div class="textarea-group">
<textarea class="form-control" name="descrption" rows="5">
 </textarea>
</div>
</div>										
<button type="submit" class="btn btn-success mr-10"><?php echo langs('faq_ok')?></button>
<button type="reset"   class="btn btn-default"><?php echo langs('faq_res')?></button>
</form>
</div>
</div>
</div>
</div>
</div>									
<?php
if ($action == 'post') {
$username = $_POST['username'];
$useraddr = $_POST['email'];
$descrption= $_POST['descrption'];
$to = "gao.eison@gmail.com";  
$re = langs('faq_user');         
$msg = $descrption;            
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html;";   
  $headers .= "charset=\"iso-8859-1\"\r\n";
$headers .= "From: $useraddr \r\n";    
  if(mail($to,$re,$msg, $headers))
  { 
  echo "<script>alert('".langs('faq_su')."');</script>";
  }
  }
?>					
<script>
$("#menu_faq").addClass('active');
</script>