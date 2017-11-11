<!DOCTYPE html>

<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->
<head>
<meta charset="utf-8" />
<title>Infinity Civil Engineering Academy : Select Exam</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="MobileOptimized" content="320" />
<link href=<?php echo base_url("css/main.css");?> rel="stylesheet" type="text/css"/>
<!-- end theme style -->

</head>
<body>
<!--Sidebar Social Icons-->
<div class="icea-social-widget" id="icea-left" title="Follow Us" style="top:25%;left:0;">
	<div id="icea-social-inner">
		<div class="icea-sbutton iceabtns">
			<div id="icea-fb" class="icea-fb">
				<a href="#" target="_blank" title="Follow On Facebook"><i class="fa fa-facebook"></i></a>
			</div>
		</div>
		<div class="icea-sbutton iceabtns">
			<div id="icea-tw" class="icea-tw">
				<a href="#" title="Follow On Twitter"><i class="fa fa-twitter"></i></a>
			</div>
		</div>
		<div class="icea-sbutton iceabtns">
			<div id="icea-yt" class="icea-yt">
				<a onclick="window.open('https://www.youtube.com/');" href="javascript:void(0);" title="Watch On Youtube"><i class="fa fa-youtube"></i></a>
			</div>
		</div>
		<div class="icea-sbutton iceabtns">
			<div id="icea-in" class="icea-in">
				<a href="#" title="Follow On LinkedIn"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
	</div>
</div>
<!--Sidebar Social Icons End-->
<!--Page main section start-->

<!--header end -->
<!--Breadcrumb start-->
<!--Breadcrumb end-->
<!--Single content start-->

<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
	
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="ed_time_executor ed_toppadder40">
				<ul>
				<li><a href="#">Please Select Exam to see your result</a></li>
				<?php foreach($sets as $row):?>
				<li><a href=<?php echo site_url("Detailedresult/getresult/".$row['id']."/".$row['ParchaseExamId']);?>><?php echo $row['set_name'];?></a> </li>				<?php endforeach;?>
				</ul>
			</div>
			</div>
		


	</div>
  </div>  
  
</div>


<!--Newsletter Section six end-->
<!--Footer Top section start-->

<!--Footer Top section end-->
<!--Footer Bottom section start-->

<!--Footer Bottom section end-->
</div>
<!--Page main section end-->



<!--main js file start--> 

<script type="text/javascript" src=<?php echo base_url("js/modernizr.js");?>></script> 
<script type="text/javascript" src=<?php echo base_url("js/owl.carousel.js");?>></script> 
<script type="text/javascript" src=<?php echo base_url("js/jquery.stellar.js");?>></script> 
<script type="text/javascript" src=<?php echo base_url("js/smooth-scroll.js");?>></script> 
<script type="text/javascript" src=<?php echo base_url("js/plugins/revel/jquery.themepunch.tools.min.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/plugins/revel/jquery.themepunch.revolution.min.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/plugins/revel/revolution.extension.layeranimation.min.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/plugins/revel/revolution.extension.navigation.min.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/plugins/revel/revolution.extension.slideanims.min.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/plugins/countto/jquery.countTo.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/plugins/countto/jquery.appear.js");?>></script>
<script type="text/javascript" src=<?php echo base_url("js/custom.js");?>></script> 
<!--main js file end-->
</body>
<!-- /.content-wrapper -->
<script>
            $(document).ready(function() {
            	
            	// $('.dque').removeClass('active');
            	 //$('.aque').addClass('active');
            	
            });
</script>
</html>