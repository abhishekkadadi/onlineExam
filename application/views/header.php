<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">    
    <head>
        <meta charset="utf-8" />
        <title>Online Exam</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />       
        <meta name="MobileOptimized" content="320" />
        <!--srart theme style -->
        <link href=<?php echo base_url("css/main.css"); ?> rel="stylesheet" type="text/css"/>
        <!-- end theme style -->
        <!-- favicon links -->
       
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
                                    <div class="educo_logo"> <a href="<?php echo site_url("Student_login/load_stream/"); ?>"><img style="margin-top: -15px;    width: 67%;" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg" alt="logo" /></a> </div>
                                </div>	
                                <?php $newdata = $this->session->all_userdata(); ?>
                                <div class="dropdown pull-right expiry">
                                    <a href="<?php echo site_url("Student_login/load_stream/"); ?>" class="btn btn-default" type="button" data-toggle=""><i class="fa fa-home"></i></a>
                                    <a class="btn btn-default" type="button" data-toggle="" id="AvailableCredits">Available Credits: <?php echo $newdata['payment_amount']; ?></b></a>
                                    <a class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">Add More Credits</b></a>
                                    <a class="btn btn-default dropdown-toggle " type="button" data-toggle="dropdown"><?php echo $newdata['username']; ?> <i class="fa fa-user"></i>
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">                                    
                                        <li class="result"><a href=<?php echo site_url("Detailedresult/"); ?>>See Detail Result</a></li>
                                        <li class="divider"></li>
                                        <li class="result"><a href=<?php echo site_url("Purchasedexamhistory/"); ?>>Purchased Exam History</a></li>
                                        <li class="divider"></li>
                                        <li class="result"><a href=<?php echo site_url("Creditswallethistory/"); ?>>Credits wallet history</a></li>
                                        <li class="divider"></li>
                                        <li class="changepwd"><a href=<?php echo site_url('Changepassword'); ?>>Change Password</a></li>
                                        <li class="divider"></li>
                                        <li><a href=<?php echo site_url('Logout'); ?>>Logout</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <!-- <div class="expiry col-md-4 pull-right" align="center" style="margin-top: 10px;"><b>Account expires: <?php //echo $newdata['expiry'];                      ?></b></div> -->
                                </div>		
                            </div>
                        </div>
                    </div>
                </div>                
            </header>           
        </div>
        <!--Page main section end-->
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center">Add Credits</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">                           
                            <input class="form-control input-sm" onkeypress="return isNumberKey(event)" id="inputamount" placeholder="Enter amount" type="text">
                        </div>
                        <div class="form-group">    
                            <a class="Mybtn purple AddCredits" style="width: 100%;padding: 2px 10px;"> Submit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <script src="http://bootboxjs.com/bootbox.js"></script>
        <style>

            .quetionBoxDesign{
                background: rgba(211, 211, 211, 0.97);
                color: white;
                padding: 7px;
                margin: 1px;
                text-align: center;
                cursor: pointer;
                width: 12%;
            }
            .quetionBoxDesign:hover{
                background: #69b831;color: white;
            }
            .quetionGivenActive{
                background: #69b831 !important;color: white;
            }
            .bootbox-body{
                font-size: 20px;
            }

        </style>
        <script>
                                $(document).ready(function() {
                                    $(document.body).on('click', '.AddCredits', function(e) {
                                        var Getamount = $("#inputamount").val();
                                        if (Getamount == "") {
                                            alert("Please enter amount");
                                        } else {
                                            if (Getamount < "20") {
                                                alert("Entered amount must be greater than 20");
                                            } else {
                                                window.location.href = "<?php echo site_url('CcavRequestHandler/index/'); ?>" + Getamount + "";
                                            }
                                        }
                                    });

                                    $(document.body).on('click', '.PurchaseExam', function(e) {
                                        var GetsessionAmount = "<?php
                                $newdata = $this->session->all_userdata();
                                echo $newdata['payment_amount'];
                                ?>";
                                        var percaseSetId = $(this).attr('id');
                                        var GetAmount = $(this).attr('setAmount');
                                        var NumberOfperchaseExam = $(this).attr('NumberOfperchaseExam');
                                        if ((parseInt(NumberOfperchaseExam) + 1) == 2) {
                                            GetAmount = GetAmount / 2;
                                        }
                                        if (parseInt(GetsessionAmount) >= parseInt(GetAmount)) {
                                           if(GetAmount == 0){
                                               var obj = {"percaseSetId": percaseSetId, "GetAmount": GetAmount};
                                                    var datastring = 'data=' + JSON.stringify(obj);
                                                    var CheckURl = '<?php echo base_url() . "index.php/Student_login/PurchaseExam"; ?>';
                                                    $.ajax({
                                                        type: "POST",
                                                        url: CheckURl,
                                                        data: datastring,
                                                        cache: false,
                                                        beforeSend: function() {
                                                        },
                                                        success: function(dataString)
                                                        {                                                          
                                                                    window.location.href = "<?php echo site_url('Instruction/index/'); ?>" + percaseSetId + "/" + dataString + "";                                                   
                                                        }
                                                    });
                                           }else{
                                        bootbox.confirm("Are you sure want to purchase exam?", function(result) {
                                                if (result == true) {
                                                    var obj = {"percaseSetId": percaseSetId, "GetAmount": GetAmount};
                                                    var datastring = 'data=' + JSON.stringify(obj);
                                                    var CheckURl = '<?php echo base_url() . "index.php/Student_login/PurchaseExam"; ?>';
                                                    $.ajax({
                                                        type: "POST",
                                                        url: CheckURl,
                                                        data: datastring,
                                                        cache: false,
                                                        beforeSend: function() {
                                                        },
                                                        success: function(dataString)
                                                        {
                                                            //  alert(dataString);
                                                            bootbox.confirm("Exam purchase successfully..", function(result) {
                                                                if (result == true) {
                                                                    window.location.href = "<?php echo site_url('Instruction/index/'); ?>" + percaseSetId + "/" + dataString + "";
                                                                }
                                                            });
                                                        }
                                                    });
                                                }
                                            });
                                           }
                                        } else {
                                            $('#myModal').modal('show');
                                        }

                                    });
                                });

                                function isNumberKey(evt)
                                {
                                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                                    if (charCode != 46 && charCode > 31
                                            && (charCode < 48 || charCode > 57))
                                        return false;

                                    return true;
                                }


        </script>
        <!--main js file end-->
    </body>
</html>