<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="app">
    <!--<![endif]-->

    <!-- Begin Head -->
    <head>
        <meta charset="utf-8" />
        <title>Exam Forgot Password Form</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />    
        <meta name="MobileOptimized" content="320" />
        <!--srart theme style -->
        <link href=<?php echo base_url("css/main.css"); ?> rel="stylesheet" type="text/css"/>
        <!-- end theme style -->

    </head>
    <body>
            <div id="educo_wrapper">
            <!--Header start-->
            <header id="ed_header_wrapper">
                <div class="ed_header_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="educo_logo"> <a href="<?php echo site_url("Student_login/load_stream/"); ?>"><img style="margin-top: -15px;" src=<?php echo base_url("images/header/logo.png"); ?> alt="logo" /></a> </div>
                                </div>	                       
                            </div>
                        </div>
                    </div>
                </div>                
            </header>           
        </div>
        <!--Single content start-->

        <div class="ed_graysection ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ed_time_executor ed_toppadder40">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="box box-success">
                                    <center>
                                    <div class="box-header">
                                        <h3 class="box-title">Re-send password on your email</h3>
                                    </div>
                                    <div class="box-body">
                                        <form action="" method="post" id="add_question" enctype="multipart/form-data" name="add_product" class="form-inline"> 

                                            <label class="sr-only" for="Source Station">Re-send password on your email</label>
                                            <div class="row">                                    
                                                <div class="col-md-3">
                                                    
                                                </div> 
                                                <div class="col-md-6">
                                                    <input type="text" id="email" name="op1" ng-model='pw2' placeholder="Enter your Email Address" class="form-control">  
                                                    <button  type="button"  id="change_password" class="btn btn-primary" name="add_product" class="form-inline" >Submit</button>
                                                </div>
                                                 <div class="col-md-3">
                                                    
                                                </div>  
                                            </div>

                                        </form>
                                        <div class="form-group" style="margin-left: 13px;">
                                            <div id="progressbox" style="display:none;"><div id="progressbar"></div><div id="statustxt">0%</div></div>
                                            <label id='message'></label>
                                            <div id="output" class="output"></div>
                                        </div>
                                    </div><!-- /.box-body --></center>
                                </div>



                            </div>

                        </div>
                    </div>


                    <!--Sidebar End-->

                </div>
            </div>  

        </div>


    </div>
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

    <script type="text/javascript">
        $(document.body).on('click', '#change_password', function(e) {
            //	alert('what?');
            var email1 = document.getElementById("email").value;
            var email = email1.trim();
            if (email) {

                $.ajax({
                    url: "<?php echo site_url('Forgotpassword/send_email'); ?>",
                    //base_url("index.php/Login/login_check"); 
                    type: "POST",
                    data: {'email': email},
                    cache: false,
                    beforeSend: function()
                    {
                        console.log('going');
                    },
                    success: function(response) {
                      //  alert(response);
                        if (response == '1') {
                            document.getElementById('message').innerHTML = 'Email Sent. Please check your mail.';
                        } else
                        if (response == '0') {
                            document.getElementById('message').innerHTML = 'Email address not found';
                        }
                    }
                });
            } else {
                document.getElementById('message').innerHTML = 'Please fill the email address';
            }
        });



    </script>
    <script>
        $(document).ready(function() {
            $('.take_test').removeClass('active');
            //$('.qtype').removeClass('active');
            $('.result').removeClass('active');
            $('.changepwd').addClass('active');
            // $('.stuall').removeClass('active');
            // $('.dque').removeClass('active');
            //$('.aque').addClass('active');

        });
    </script>



</body>
</html>