<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Online Exam Login</title>
        <link rel="stylesheet" href="<?php echo base_url("css/reset.min.css"); ?>">
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
        <link rel='stylesheet prefetch' href='<?php echo base_url("css/font-awesome.css"); ?>'>
        <link rel="stylesheet" href="<?php echo base_url("css/Login_style.css"); ?>">
        
    </head>
    <body>  
        <div class="container">
            <div class="info">
                <h1>Online Examination Login</h1></span>
            </div>
        </div>
        <div class="form">
            
            <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
            <form class="register-form">   
                <p style="display: none;margin-top: 10px;margin-bottom:10px;" class="messagedisplay"></p>
                <input type="text" placeholder="Name" id="Name"/>
                <input type="text" placeholder="Email address" id="Email"/>
                <input type="password" placeholder="Password" id="Password"/>
                <input type="text" placeholder="Mobile number" maxlength="10" id="Mobile"/>
                <input type="button" value="create" class="buttonclass createbtn" name="Create"  />                
                <p class="message">Already registered? <a >Sign In</a></p>
            </form>
            <form class="login-form" role="form" action=<?php echo site_url('Student_login/login_check'); ?> method="post" id="login_form">
                <input type="text" name="username" placeholder="Email address..."  id="username" required>
                <input type="password" name="password" placeholder="Password..." id="password" required>                              
                <button>Login</button>
                <p style="display: none;color: #ed5151;margin-top: 10px;" id="messagedisplay"></p>
                <p class="message">Not registered? <a >Create an account</a></p>
                <p class="message1"><a href=<?php echo site_url('Forgotpassword'); ?>>Forgot password?</a></p>
            </form>
        </div>       
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="<?php echo base_url("js/index.js"); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                var status = getQueryVariable("status");
                if (status == "invalid") {
                    $("#messagedisplay").css('display', 'block');
                    $("#messagedisplay").html("Invalid User or Password");
                } else if (status == "notverify") {
                    $("#messagedisplay").css('display', 'block');
                    $("#messagedisplay").html("Email not verify. please verify your mail.");
                } else if (status == "block") {
                    $("#messagedisplay").css('display', 'block');
                    $("#messagedisplay").html("Your Account blocked by admin. please contact to administrator");
                } else {
                    $("#messagedisplay").css('display', 'block');
                    $("#messagedisplay").html("");
                }

                function getQueryVariable(variable) {
                    var query = window.location.search.substring(1);
                    var vars = query.split("&");
                    for (var i = 0; i < vars.length; i++) {
                        var pair = vars[i].split("=");
                        if (pair[0] == variable) {
                            return pair[1].replace(/%20/g, " ");
                        }
                    }
                    // alert('Query Variable ' + variable + ' not found');
                }
            });

        </script>
        <script>
            $(document).ready(function() {
                $(document.body).on('click', '.createbtn', function(e) {
                    var Name = $("#Name").val();
                    var Email = $("#Email").val();
                    var Password = $("#Password").val();
                    var Mobile = $("#Mobile").val();

                    if (Name == "")
                    {
                        $(".messagedisplay").css('display', 'block');
                        $(".messagedisplay").css('color', '#ed5151');
                        $(".messagedisplay").html("Please enter name");
                    } else {
                        if (Email == "") {
                            $(".messagedisplay").css('display', 'block');
                            $(".messagedisplay").css('color', '#ed5151');
                            $(".messagedisplay").html("Please enter email.");
                        } else {
                            if (!validateEmail(Email)) {
                                $(".messagedisplay").css('display', 'block');
                                $(".messagedisplay").css('color', '#ed5151');
                                $(".messagedisplay").html("Please enter valid email.");
                            } else {
                                if (Password == "") {
                                    $(".messagedisplay").css('display', 'block');
                                    $(".messagedisplay").css('color', '#ed5151');
                                    $(".messagedisplay").html("Please enter password.");
                                } else {
                                    if (Mobile == "") {
                                        $(".messagedisplay").css('display', 'block');
                                        $(".messagedisplay").css('color', '#ed5151');
                                        $(".messagedisplay").html("Please enter mobile number.");
                                    } else {
                                        var obj = {"Name": Name, "Email": Email, "Password": Password, "Mobile": Mobile};
                                        var datastring = 'data=' + JSON.stringify(obj);
                                        var CheckURl = '<?php echo base_url() . "index.php/Student_login/CreateNewUser"; ?>';
                                        $.ajax({
                                            type: "POST",
                                            url: CheckURl,
                                            data: datastring,
                                            cache: false,
                                            beforeSend: function() {

                                            },
                                            success: function(dataString)
                                            {
                                                if (dataString == 1) {
                                                    $("#Name").val('');
                                                    $("#Email").val('');
                                                    $("#Password").val('');
                                                    $("#Mobile").val('');
                                                    $(".messagedisplay").css('display', 'block');
                                                    $(".messagedisplay").css('color', 'green');
                                                    $(".messagedisplay").html("Ragister Successfully. Please check your email and verify your email address");
                                                } else if (dataString == 3) {
                                                    $(".messagedisplay").css('display', 'block');
                                                    $(".messagedisplay").css('color', '#ed5151');
                                                    $(".messagedisplay").html("Email already exists. try another one");
                                                    $("#Email").val('');
                                                } else {
                                                    $("#Name").val('');
                                                    $("#Email").val('');
                                                    $("#Password").val('');
                                                    $("#Mobile").val('');
                                                    $(".messagedisplay").css('display', 'block');
                                                    $(".messagedisplay").css('color', '#ed5151');
                                                    $(".messagedisplay").html("Something went wrong please try again later");
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        }
                    }


                });

                $("#Mobile").keydown(function(e) {
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            (e.keyCode >= 35 && e.keyCode <= 40)) {
                        return;
                    }
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
            });

            function validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }



        </script>
    </body>
</html>

