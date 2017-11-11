<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="app">
    <!--<![endif]-->

    <!-- Begin Head -->
    <head>
        <meta charset="utf-8" />
        <title>Civil Engineering Institute Information Technology : Select Exam</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />     
        <meta name="MobileOptimized" content="320" />
        <!--srart theme style -->
        <link href=<?php echo base_url("css/main.css"); ?> rel="stylesheet" type="text/css"/>
        <!-- end theme style -->
    </head>
    <body>
       

        <div class="ed_graysection ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_time_executor ed_toppadder40">

                            <ul>
                                <li><a href="#">Select a test</a></li>
                                <?php
                                if (!empty($subjectsSets)) {
                                    foreach ($subjectsSets as $row):
                                        ?>
                                        <li><a href=<?php echo site_url("Instruction/index/" . $row['id']); ?>><?php echo $row['set_name']; ?></a> </li>					    
                                    <?php endforeach;
                                }else { ?>
                                    <li> Oops! Please come back later. No Sets available at this moment</li>					    
<?php } ?>
                            </ul>

                        </div>
                        <br>
                    </div>



                </div>
            </div>  

        </div>

        
        <!--Footer Top section end-->
        <!--Footer Bottom section start-->
        
        <!--Footer Bottom section end-->
        <!--Page main section end-->



        <!--main js file start--> 
        <script type="text/javascript" src=<?php echo base_url("js/jquery-1.12.2.js"); ?>></script> 
        <script type="text/javascript" src=<?php echo base_url("js/bootstrap.js"); ?>></script> 
        <script type="text/javascript" src=<?php echo base_url("js/modernizr.js"); ?>></script> 
        <script type="text/javascript" src=<?php echo base_url("js/owl.carousel.js"); ?>></script> 
        <script type="text/javascript" src=<?php echo base_url("js/jquery.stellar.js"); ?>></script> 
        <script type="text/javascript" src=<?php echo base_url("js/smooth-scroll.js"); ?>></script> 
        <script type="text/javascript" src=<?php echo base_url("js/plugins/revel/jquery.themepunch.tools.min.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/plugins/revel/jquery.themepunch.revolution.min.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/plugins/revel/revolution.extension.layeranimation.min.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/plugins/revel/revolution.extension.navigation.min.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/plugins/revel/revolution.extension.slideanims.min.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/plugins/countto/jquery.countTo.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/plugins/countto/jquery.appear.js"); ?>></script>
        <script type="text/javascript" src=<?php echo base_url("js/custom.js"); ?>></script> 

        <!--main js file end-->





    </body>
</html>