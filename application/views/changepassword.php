<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="app">
    <!--<![endif]-->

    <!-- Begin Head -->
    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

        <title>CEIIT Exam</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta name="MobileOptimized" content="320" />
        <!--srart theme style -->
        <link href=<?php echo base_url("css/main.css"); ?> rel="stylesheet" type="text/css"/>

    </head>
    <body>

        <div class="ed_graysection ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Change Password</h3>
                            </div>
                            <div class="box-body">
                                <form action="" method="post" id="add_question" enctype="multipart/form-data" name="add_product" class="form-inline"> 
                                    <div class="form-group" style="display: block">                                
                                        <label class="sr-only" for="Source Station">Change Password </label>
                                        <div class="row">                                  

                                            <div class="col-md-3">
                                                <input type="password" id="old_password" style="width: 100%" name="op1" ng-model="option_a" placeholder="Enter old password" class="form-control">  
                                            </div>   

                                            <div class="col-md-3">
                                                <input type="password" id="new_password" style="width: 100%" name="op1" ng-model='pw1' placeholder="Enter New password" class="form-control">  
                                            </div>  
                                            <div class="col-md-3">
                                                <input type="password" id="confirm" style="width: 100%" name="op1" ng-model='pw2' placeholder="Re-enter new password" class="form-control" onkeyup="check()">  
                                            </div>  





                                            <div class="col-md-9">
                                                <br/>
                                                <button  type="button"  style="float: right" id="change_password" class="btn btn-primary ed_green" name="add_product" class="form-inline" >Submit</button>
                                            </div>
                                        </div>



                                </form>
                                <div class="form-group" style="margin-left: 13px;">
                                    <div id="progressbox" style="display:none;"><div id="progressbar"></div><div id="statustxt">0%</div></div>
                                    <label id='message'></label>
                                    <div id="output" class="output"></div>
                                </div>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>  
        </div>       
    </div>
    <!--Page main section end-->



    <script type="text/javascript">
                                                    $(document.body).on('click', '#change_password', function(e) {
                                                        //alert('what?');
                                                        var password1 = document.getElementById("new_password").value;
                                                        var confrim_password1 = document.getElementById("confirm").value;
                                                        var old_password1 = document.getElementById("old_password").value;
                                                        var password = password1.trim();
                                                        var confrim_password = confrim_password1.trim();
                                                        var old_password = old_password1.trim();
                                                        if (password && confrim_password && old_password) {
                                                            var value = check();
                                                            if (value == true) {
                                                                $.ajax({
                                                                    url: "<?php echo site_url('Changepassword/change_password'); ?>",
                                                                    //base_url("index.php/Login/login_check"); 
                                                                    type: "POST",
                                                                    data: {'old_password': old_password,
                                                                        'password': password},
                                                                    cache: false,
                                                                    beforeSend: function()
                                                                    {
                                                                        console.log('going');
                                                                    },
                                                                    success: function(response) {
                                                                        //alert(response);
                                                                        if (response == '1') {
                                                                            document.getElementById('message').innerHTML = 'Password Changed Successfully';
                                                                        } else
                                                                        if (response == '0') {
                                                                            document.getElementById('message').innerHTML = 'Old Password Wrong';
                                                                        }
                                                                    }
                                                                });
                                                            } else {
                                                                document.getElementById('message').innerHTML = 'Please check passwords you enter';
                                                            }
                                                        } else {
                                                            document.getElementById('message').innerHTML = 'All Fields Compulsary';
                                                        }

                                                    });


                                                    function check() {
                                                        var password = document.getElementById("new_password").value;
                                                        var confrim_password = document.getElementById("confirm").value;
                                                        if (password) {
                                                            if (confrim_password == password) {

                                                                document.getElementById('message').innerHTML = 'Password Match';
                                                                return true;
                                                            } else {

                                                                document.getElementById('message').innerHTML = 'Password are not matching';
                                                                return false;
                                                            }

                                                        } else {

                                                            document.getElementById('message').innerHTML = 'Please fill the new-password field';
                                                            return false;
                                                        }
                                                    }


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