<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->

    <!-- Begin Head -->
    <head>
        <meta charset="utf-8" />
        <title>Civil Engineering Academy : Test</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta name="MobileOptimized" content="320" />
        <!--srart theme style -->
        <link href=<?php echo base_url("css/main.css"); ?> rel="stylesheet" type="text/css"/>
        <link href=<?php echo base_url("css/shree.css"); ?> rel="stylesheet" type="text/css"/>
        <link href=<?php echo base_url("css/animations.css"); ?> rel="stylesheet" type="text/css"/>
        <!-- end theme style -->

        <style>
            td, th {
                padding: 10px;
                font-size: 10pt;
            }
            #icea-left{display: none;}
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
                background: #387988;color: white;
            }
            .quetionGivenActive{
                background: #387988 !important;color: white;
            }
            .bootbox-body{
                font-size: 20px;
            }

            .questionclass{    width: 100%;
                               background-color: #387988;
                               color: #ffffff;
                               padding: 10px;}
            </style>
            <style>
            .mainQusClass{
                background: white;
                padding: 0px 17px;
                border: none;
                box-shadow: 1px 1px 16px #888888;
            }
            .mainQusClass .options{
                padding: 9px 0px;
            }

            .mainQusClass .options span{
                padding: 0px 7px;    
            }

        </style>
    </head>
    <body>


        <div class="ed_graysection ed_toppadder80 ed_bottompadder80">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                        <!-- Display result------------------- -->
                        <img src="<?php echo base_url("spinner.gif"); ?>" style="display: none;" id="spinner">
                        <div class="ed_time_executor ed_toppadder40 fixedElement" style="padding: 0px; margin-bottom: 2%;">
                            <ul>
                                <?php foreach ($set_info as $row): ?>                           
                                    <li>  <a href="#"><?php echo $row['set_name']; ?></a><span id="time" style="color: #387988;"></span></li>
                                <?php endforeach; ?>			
                            </ul>
                        </div>
                        <form id="answers_form" class="form" action=<?php echo site_url("Exam/store_answer/"); ?> method="post">

                            <?php
                            $x = 1;
                            $i = 0;
                            ?>
                            <?php
                            $gettotalquestions = count($questions);
                            foreach ($questions as $row1):
                                $i++;
                                ?>
                                <input type="hidden" id="set_id" name="set_id" value="<?php echo $set_id; ?>"/>
                                <input type="hidden" id="ParchaseExam_Id" name="ParchaseExam_Id" value="<?php echo $ParchaseExamId; ?>"/>
                                <?php if ($i == 1) break; ?>
                            <?php endforeach; ?>

                            <?php
                            $i1 = 0;

                            foreach ($questions as $row):
                                if ($i1 == 0) {
                                    ?>
                                    <div class="test mainQusClass CommonClassForApllyleft" id="<?php echo "Div_" . $i1; ?>" style="visibility: visible">
                                        <br/>
                                        <?php
                                        $newdata = $this->session->all_userdata();
                                        ?>                                    
                                        <span class="question questionclass">Q.<?php echo $x++; ?>  <?php if ($row['questionImage'] == 1) { ?> <img src="<?php echo base_url($row['question']); ?>" style="width: 85%;">  <?php } else { ?> <?php echo $row['question'];
                                } ?></span>
                                        <div class="clear"></div>
                                        <div class="options">
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="a"/><span>A. <?php if ($row['optionAImage'] == 1) { ?> <img src="<?php echo base_url($row['option1']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option1'];
                                } ?></span></p>
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="b"/><span>B. <?php if ($row['optionBImage'] == 1) { ?> <img src="<?php echo base_url($row['option2']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option2'];
                                } ?></span></p>
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="c"/><span>C. <?php if ($row['optionCImage'] == 1) { ?> <img src="<?php echo base_url($row['option3']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option3'];
                                } ?></span></p>
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="d"/><span>D. <?php if ($row['optionDImage'] == 1) { ?> <img src="<?php echo base_url($row['option4']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option4'];
                        } ?></span></p>
                                        </div>                                       
                                    </div>
        <?php
        $i1++;
    } else {
        ?>

                                    <div class="test mainQusClass CommonClassForApllyleft" id="<?php echo "Div_" . $i1; ?>" style="visibility: hidden;position:absolute">
                                        <br/>
        <?php
        $newdata = $this->session->all_userdata();
        ?>  

                                        <span class="question questionclass">Q.<?php echo $x++; ?>  <?php if ($row['questionImage'] == 1) { ?> <img src="<?php echo base_url($row['question']); ?>" style="width: 85%;" /> <?php } else { ?><?php echo $row['question'];
        } ?></span>
                                        <div class="clear"></div>
                                        <div class="options">
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="a"/><span>A. <?php if ($row['optionAImage'] == 1) { ?> <img src="<?php echo base_url($row['option1']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option1'];
        } ?></span></p>
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="b"/><span>B. <?php if ($row['optionBImage'] == 1) { ?> <img src="<?php echo base_url($row['option2']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option2'];
                        } ?></span></p>
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="c"/><span>C. <?php if ($row['optionCImage'] == 1) { ?> <img src="<?php echo base_url($row['option3']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option3'];
                        } ?></span></p>
                                            <p><input type="radio" class="radiobtn" name="<?php echo $row['id']; ?>" value="d"/><span>D. <?php if ($row['optionDImage'] == 1) { ?> <img src="<?php echo base_url($row['option4']); ?>" style="width: 86%;vertical-align: text-top;margin-top: -4px;"> <?php } else { ?><?php echo $row['option4'];
                        } ?></span></p>
                                        </div>                                           
                                    </div>
        <?php
        $i1++;
    } endforeach;
?>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <a  class="Mybtn purple" CustomeID="Div_0" totalQuetions="<?php echo $gettotalquestions; ?>" id="Next_Pre" style="float: left;width: 100%;display: none">Previous</a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <button type="button" class="btn ed_btn ed_green" id="submit_test" style="width: 100%">Submit Exam</button>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                    <a  class="Mybtn purple" CustomeID="Div_0" id="Next_Btn" totalQuetions="<?php echo $gettotalquestions; ?>" style="float: right;width: 100%">Next</a>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                        <div class="ed_time_executor ed_toppadder40 fixedElement" style="padding: 0px; margin-bottom: 4%;">
                            <ul>                                                  
                                <li><a href="">All Questions</a></li>                                  			
                            </ul>
                        </div>
                        <div class="ed_time_executor ed_toppadder40 fixedElement" style="padding: 0px;margin: 0px;background: white;box-shadow: 1px 1px 16px #888888;">
                            <?php
                            $i12 = 0;
                            $gettotalquestions1 = count($questions);
                            foreach ($questions as $row):
                                if ($i12 === 0) {
                                    ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 quetionBoxDesign commonClickJumpToQus" comid="<?php echo "Div_" . $i12; ?>" totalQuetions="<?php echo $gettotalquestions1; ?>">
                                    <?php echo "1" ?>
                                    </div>
    <?php } else {
        ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 quetionBoxDesign commonClickJumpToQus" comid="<?php echo "Div_" . $i12; ?>" totalQuetions="<?php echo $gettotalquestions1; ?>">
        <?php echo ($i12 + 1); ?>
                                    </div>
        <?php
    }$i12++;
endforeach;
?>
                        </div>
                    </div>

                </div>
                <div class="row" id="showresult" style=" display:none;background: white;">
                    <div class="total-marks">
                        <div  >
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="obtain-mark">
                                    <span>Marks:</span> <label id="total_marks"></label>
                                </div>
                            </div>	
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <table class="table table-bordered res-table">
                                    <tbody>
                                        <tr>
                                            <td><span class="res-heading">Total Exam Marks:</span> <span class="res-data"><label id="total_exam_marks" ></label></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <table class="table table-bordered res-table">
                                    <tbody>
                                        <tr>
                                            <td><span class="res-heading">Total number of questions:</span> <span class="res-data"><label id="total_questions_display" ></label></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered res-table">
                                        <tbody>
                                            <tr>
                                                <td><span class="res-heading">Questions Not Answered:</span> <span class="res-data"><label id="total_questions_notanswered" ></label></span></td>                            				

                                                <td><span class="res-heading">Questions Answered :</span> <span class="res-data"><label id="total_questions_answered" ></label></span></td>

                                                <td><span class="res-heading">Right Answers:</span> <span class="res-data"><label id="total_questions_right" ></label></span></td>

                                                <td><span class="res-heading">Wrong Answers:</span> <span class="res-data"><label id="wrong_count" ></label></span></td>

                                                <td><span class="res-heading">Marks Deducted:</span> <span class="res-data"><label id="marks_deducted"></label></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>    
                            <div style="clear: both;"></div>   
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="res-percent">
                                    <div class="res-info">
                                        <span class="per-data"><label id="total_questions_percentage" ></label>%</span>
                                    </div>

                                </div>
                            </div>                     	

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
        <script type="text/javascript" src=<?php echo base_url("js/jquery-1.10.2.min.js"); ?>></script>
        <!--main js file end-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" data-semver="3.1.1" data-require="bootstrap"></script>
        <script src="http://bootboxjs.com/bootbox.js"></script>
        <script type="text/javascript">
            var timeout_var;
            $(document).ready(function() {

<?php foreach ($set_info as $row): ?>
                    var time_set = "<?php echo $row['set_time']; ?>";
<?php endforeach; ?>

                function countdown(elementName, minutes, seconds)
                {
                    var element, endTime, hours, mins, msLeft, time;

                    function twoDigits(n)
                    {
                        return (n <= 9 ? "0" + n : n);
                    }

                    function updateTimer()
                    {
                        msLeft = endTime - (+new Date);
                        if (msLeft < 1000) {
                            element.innerHTML = "countdown's over!";
                        } else {
                            time = new Date(msLeft);
                            hours = time.getUTCHours();
                            mins = time.getUTCMinutes();
                            element.innerHTML = (hours ? hours + ':' + twoDigits(mins) : mins) + ':' + twoDigits(time.getUTCSeconds());
                            setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
                        }

                    }

                    element = document.getElementById(elementName);
                    endTime = (+new Date) + 1000 * (60 * minutes + seconds) + 500;
                    updateTimer();
                }

                countdown("time", 0, time_set);


                $(function() {  // document.ready function...
                    timeout_var = setTimeout(function() {
                        form_submit();
                    }, time_set * 1000);
                });

            });



            function form_submit() {
                var result = check();
                if (result == true) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo site_url("Exam/store_answer"); ?>',
                        data: $('#answers_form').serialize(),
                        beforeSend: function() {
                            document.getElementById('spinner').style.display = 'block';
                        },
                        success: function(html) {
                            document.getElementById('spinner').style.display = 'none';
                            var data = JSON.parse(html);
                            var success = data['success'];
                            if (success == '1') {
                                var question_answered = data['question_answered'];
                                var correct_count = data['correct_count'];
                                var not_answered = data['not_answered'];
                                var wrong_count = data['wrong_count'];
                                var percentage = data['percentage'];
                                var total_questions = data['total_questions'];
                                var total_gained_marks = data['marks_gained'];
                                var total_exam_marks = data['total_test_marks'];
                                var marks_deducted = data['marks_deducted'];
                                //display
                                document.getElementById('showresult').style.display = 'block';
                                document.getElementById("total_questions_display").textContent = total_questions;
                                document.getElementById("total_questions_answered").textContent = question_answered;
                                document.getElementById("total_questions_notanswered").textContent = not_answered;
                                document.getElementById("total_questions_right").textContent = correct_count;
                                document.getElementById("total_questions_percentage").textContent = percentage.toFixed(2);

                                document.getElementById("total_marks").textContent = total_gained_marks;
                                document.getElementById("total_exam_marks").textContent = total_exam_marks;
                                document.getElementById("marks_deducted").textContent = marks_deducted;
                                document.getElementById("wrong_count").textContent = wrong_count;

                            } else {
                                alert('no');
                            }
                            $(".ed_time_executor").hide();
                            $("#answers_form").hide();
                        }
                    });
                } else {
                    alert('Atleast one question must be answered');
                }



            }//function submit





            function check() {
                var radios = document.getElementsByTagName('input');
                var value;
                for (var i = 0; i < radios.length; i++) {
                    if (radios[i].type === 'radio' && radios[i].checked) {
                        // get value, set checked flag or do whatever you need to
                        value = radios[i].value;
                        return true;
                    }
                }
            }

            $(document.body).on('click', '.radiobtn', function(e) {
                GetDivId = $(this).parent('p').parent('div').parent('div').attr('id');
                $('[comid="' + GetDivId + '"]').removeClass("bounce");
                $('[comid="' + GetDivId + '"]').addClass('quetionGivenActive');
                setTimeout(function() {
                    $('[comid="' + GetDivId + '"]').addClass('bounce');
                }, 200);


            });

            $(document.body).on('click', '#Next_Btn', function(e) {
                var totalQuetions = $(this).attr('totalQuetions');
                var BeforeGetDivId = $(this).attr('CustomeID');
                var GetDivId = $(this).attr('CustomeID');
                var SplitDivId = GetDivId.split("_");
                $("#Next_Pre").css('display', 'block');
                if (totalQuetions == parseInt(SplitDivId[1]) + 2) {
                    $("#Next_Btn").css('display', 'none');
                    SplitDivId = parseInt(SplitDivId[1]) + 1;
                    $("#" + BeforeGetDivId).css('visibility', 'hidden');
                    $("#" + BeforeGetDivId).css('position', 'absolute');
                    $("#Div_" + SplitDivId).css('visibility', 'visible');
                    $("#Div_" + SplitDivId).css('position', 'relative');
                    $(this).attr('CustomeID', "Div_" + SplitDivId);
                    $("#Next_Pre").attr('CustomeID', "Div_" + SplitDivId);
                    $("#" + BeforeGetDivId).removeClass("pullDown");
                    $("#Div_" + SplitDivId).addClass("pullDown");
                } else {
                    SplitDivId = parseInt(SplitDivId[1]) + 1;
                    $("#" + BeforeGetDivId).css('visibility', 'hidden');
                    $("#" + BeforeGetDivId).css('position', 'absolute');
                    $("#Div_" + SplitDivId).css('visibility', 'visible');
                    $("#Div_" + SplitDivId).css('position', 'relative');
                    $(this).attr('CustomeID', "Div_" + SplitDivId);
                    $("#Next_Pre").attr('CustomeID', "Div_" + SplitDivId);
                    $("#" + BeforeGetDivId).removeClass("pullDown");
                    $("#Div_" + SplitDivId).addClass("pullDown");
                }

            });

            $(document.body).on('click', '.commonClickJumpToQus', function(e) {
                var totalQuetions = $(this).attr('totalquetions');
                var GetDivId = $(this).attr('comid');
//                /alert(GetDivId);
                var GetDivIdnew = $(this).attr('comid');
                var SplitDivId = GetDivIdnew.split("_");
                //    alert(parseInt(SplitDivId[1]))
                if (parseInt(SplitDivId[1]) == 0) {
                    $("#Next_Pre").css('display', 'none');
                } else {
                    $("#Next_Pre").css('display', 'block');
                }

                if ((parseInt(SplitDivId[1]) + 1) == parseInt(totalQuetions)) {
                    $("#Next_Btn").css('display', 'none');
                } else {
                    $("#Next_Btn").css('display', 'block');
                }
                $(".CommonClassForApllyleft").css('visibility', 'hidden');
                $(".CommonClassForApllyleft").css('position', 'absolute');
                $(".CommonClassForApllyleft").removeClass("pullDown");
                $("#" + GetDivId).css('visibility', 'visible');
                $("#" + GetDivId).css('position', 'relative');
                $("#Next_Pre").attr('CustomeID', GetDivId);
                $("#Next_Btn").attr('CustomeID', GetDivId);

                $("#" + GetDivId).addClass("pullDown");


            });

            $(document.body).on('click', '#Next_Pre', function(e) {
                var totalQuetions = $(this).attr('totalQuetions');
                var BeforeGetDivId = $(this).attr('CustomeID');
                var GetDivId = $(this).attr('CustomeID');
                var SplitDivId = GetDivId.split("_");
                $("#Next_Btn").css('display', 'block');
                if (parseInt(SplitDivId[1]) - 1 == "0") {
                    $("#Next_Pre").css('display', 'none');
                    SplitDivId = parseInt(SplitDivId[1]) - 1;
                    $("#" + BeforeGetDivId).css('visibility', 'hidden');
                    $("#" + BeforeGetDivId).css('position', 'absolute');
                    $("#Div_" + SplitDivId).css('visibility', 'visible');
                    $("#Div_" + SplitDivId).css('position', 'relative');
                    $(this).attr('CustomeID', "Div_" + SplitDivId);
                    $("#Next_Btn").attr('CustomeID', "Div_" + SplitDivId);
                    $("#" + BeforeGetDivId).removeClass("pullDown");
                    $("#Div_" + SplitDivId).addClass("pullDown");
                } else {
                    SplitDivId = parseInt(SplitDivId[1]) - 1;
                    $("#" + BeforeGetDivId).css('visibility', 'hidden');
                    $("#" + BeforeGetDivId).css('position', 'absolute');
                    $("#Div_" + SplitDivId).css('visibility', 'visible');
                    $("#Div_" + SplitDivId).css('position', 'relative');
                    $(this).attr('CustomeID', "Div_" + SplitDivId);
                    $("#Next_Btn").attr('CustomeID', "Div_" + SplitDivId);
                    $("#" + BeforeGetDivId).removeClass("pullDown");
                    $("#Div_" + SplitDivId).addClass("pullDown");
                }
            });

            $(document.body).on('click', '#submit_test', function(e) {
                bootbox.confirm("Are you sure want to submit the exam?", function(result) {
                    if (result == true) {
                        form_submit();
                    }
                });
            });



//            var ctrlDown = false;
//            var ctrlKey = 17, f5Key = 116, rKey = 82;
//
//            $(document).keydown(function(e) {
//                if (e.keyCode == f5Key)
//                {
//                    //F5 pressed. Copy your code here or try
//                    //window.location   = window.location;
//                    //It will avoid if-modified-since requests.
//                    e.preventDefault( );
//                }
//
//                if (e.keyCode == ctrlKey)
//                    ctrlDown = true;
//                if (ctrlDown && (e.keyCode == rKey))
//                {
//                    //Ctrl + R pressed. Do whatever you want
//                    //or copy the same code here that you did above
//                    e.preventDefault( );
//                }
//
//            }).keyup(function(e) {
//                if (e.keyCode == ctrlKey)
//                    ctrlDown = false;
//            });
//            window.onbeforeunload = function() {
//                return false;
//            }
//            $('body').bind('cut copy paste', function(e) {
//                e.preventDefault();
//            });
//
//            //Disable mouse right click
//            $("body").on("contextmenu", function(e) {
//                return false;
//            });


//            $(window).scroll(function(e) {
//                var $el = $('.fixedElement');
//                var isPositionFixed = ($el.css('position') == 'fixed');
//                if ($(this).scrollTop() > 400 && !isPositionFixed) {
//                    $('.fixedElement').css({'position': 'fixed', 'top': '0px', 'width': '84.5%', 'padding': '0px'});
//                }
//                if ($(this).scrollTop() < 200 && isPositionFixed)
//                {
//                    $('.fixedElement').css({'position': 'static', 'top': '0px', 'width': '100%'});
//                }
//            });
        </script>

        <style>

            .fixedElement {


                top:0;

                z-index:100;
            }
            * { -webkit-user-select: none; }
        </style>

        <script>
            $(document).ready(function() {
                var sessionlanguage = "<?php
$newdata = $this->session->all_userdata();
echo $newdata['language'];
?>";

                $(document.body).on('click', '.SelectLanguageClass', function(e) {
                    //$('#myModal').modal('show');
                    var GetLanguage = $(this).attr("Lang");
                    var obj = {"Language": GetLanguage};
                    var datastring = 'data=' + JSON.stringify(obj);
                    var CheckURl = '<?php echo base_url() . "index.php/Student_login/SetLanguage"; ?>';
                    $.ajax({
                        type: "POST",
                        url: CheckURl,
                        data: datastring,
                        cache: false,
                        beforeSend: function() {

                        },
                        success: function(dataString)
                        {
                            window.location.href = '<?php echo site_url("Student_login/load_sets/"); ?>';
                        }
                    });
                });
            });




        </script>

    </body>
</html>


