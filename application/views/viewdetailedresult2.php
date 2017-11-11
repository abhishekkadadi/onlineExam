<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Begin Head -->
<head>
<style type="text/css">
	.mymargin{
		margin-top: 27px;

	}
	.testmargin{
		margin-top: 24px;
	}
</style>


<meta charset="utf-8" />
<title>Infinity Civil Engineering Academy : Test 1</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Infinity Civil Engineering Academy"/>
<meta name="keywords" content="Infinity Civil Engineering Academy" />
<meta name="author"  content="Infinity Civil Engineering Academy"/>
<meta name="MobileOptimized" content="320" />

<!--srart theme style -->
<link href=<?php echo base_url("css/main.css");?> rel="stylesheet" type="text/css"/>
<!-- end theme style -->
<!-- favicon links -->
<link rel="shortcut icon" type="image/png" href=<?php echo base_url("images/header/favicon.png");?> />

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?4Ghv6PICQnbL1AHK2W3VlRHCkPgXew8O";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
<style>
	td, th {
    padding: 10px;
    font-size: 10pt;
}
.options img {
    margin-left: 2%;
}
.que-no {
    font-weight: 600;
}
.question {
    font-weight: 600;
}
.options p {
    font-weight: 400;
}

</style>
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
<div id="educo_wrapper">
<!--Header start-->

<!--header end -->
<!--Breadcrumb start-->

<!--Breadcrumb end-->
<!--Single content start-->

<div class="ed_graysection ed_toppadder80 ed_bottompadder80">
  <div class="container">
    <div class="row">
	<?php //print_r($set_count);
	      
          //$data[] = array('maths', '10','4','6');
	          
//print_r($fusion_feed_array);

foreach ($set_count as $object) {
	//$type=$object['question_type'];
	$total=(int)$object['total'];
	$t1=1;
	$t2=2;
$data[] = array($object['chapterName'],$total,$t1,$t2);
}
//print_r($google_feed_json2);


//print_r($found);

//$trial= json_encode($data);

	
	?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			
			<div class="clear"></div>
			 <div id="showresult">
			 
			
			
			
				<div class="container">
				<div class="row">

				<div class="col-md-12">
				<?php if(isset($google_feed_json1)){?>
				<div class="col-md-12 mymargin">
				 		<center><b style>Your Performance</b></center>
				 	</div>
				<div class="col-md-3 "></div>
					
					<div class="col-md-6 mymargin" >
						 <div id="donutchart" style="width: 100%; display: none;"></div>
					</div>
				<div class="col-md-3 "></div>
				<?php }else{?>
						
					<div class="col-md-12" >
						<!-- <div id="donutchart" style="width: 100%; display: none;"></div>-->
						 <div id="chart-container">FusionCharts XT will load here!</div>
						
					</div>

					<div class="col-md-12"  >
					<?php 
							foreach($student_result as $row){
								$number_questions=$row['total_questions'];
								$right_ans_count=$row['right_ans_count'];
								$wrong_ans_count=$row['wrong_ans_count'];
								$percentage=$row['percentage'];
								$not_answered=$row['not_answered'];	
							}

							$marksDeducted=$wrong_ans_count*$negativeMarksIfAny;
							$TotalTestMarks=($right_ans_count+$wrong_ans_count+$not_answered)*2;
							$marksGained=($right_ans_count*2)-$marksDeducted;
							$percentage2=($marksGained/$TotalTestMarks)*100;
							$percentage1=number_format((float)$percentage2, 2, '.', '');

					?>
						 <div class="total-marks">
                            <div id="showresult">
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<div class="obtain-mark">
                            			<span>Marks:</span> <label id="total_marks"><?php echo $marksGained."/".$TotalTestMarks;?></label>
                            		</div>
	            				</div>	
                            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<table class="table table-bordered res-table">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Total Exam Marks:</span> <span class="res-data"><label id="total_questions_display1"><?php echo $TotalTestMarks;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            		<table class="table table-bordered res-table">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Total number of questions:</span> <span class="res-data"><label id="total_questions_display" ><?php echo $number_questions;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            		<table class="table table-bordered res-table">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Questions Not Answered:</span> <span class="res-data"><label id="total_questions_notanswered" ><?php echo $not_answered;?></label></span></td>                            				
                            				
                            					<td><span class="res-heading">Questions Answered :</span> <span class="res-data"><label id="total_questions_answered" ><?php echo $right_ans_count+$wrong_ans_count;?></label></span></td>
                            				
                            					<td><span class="res-heading">Right Answers:</span> <span class="res-data"><label id="total_questions_right" ><?php echo $right_ans_count;?></label></span></td>
                            				
                            					<td><span class="res-heading">Wrong Answers:</span> <span class="res-data"><label id="wrong_count" ><?php echo $wrong_ans_count;?></label></span></td>
                            				
                            					<td><span class="res-heading">Marks Deducted:</span> <span class="res-data"><label id="marks_deducted"><?php echo $marksDeducted;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>       
                            	<div class="col-lg-12 col-md-12 col-sm-12">
                            		<div class="res-percent">
                            			<div class="res-info">
                            				<span class="head">Percentage:</span><span class="per-data"><label id="total_questions_percentage" ><?php echo $percentage1;?></label></span>
                            			</div>
                            			
                            		</div>
                            	</div>                     	
                                
                            </div>
						</div>

					</div>
				<?php } ?>

					<?php if(isset($google_feed_json1)){?>
					<div class="col-md-5">
						 <div id="donutchart1" style="width: 100%; display: none;"></div>	
					</div>
                 <?php }else{?>
				<div class="col-md-5">
						 <div id="donutchart1" style="width: 100%; display: none;"></div>
						   	
					</div>
               <?php } ?>
                <div class="col-md-1"></div>
				</div>
				<div class="col-md-12">
				
	<?php 
					$i=2;
				 if(isset($google_feed_json1)){
				 	echo '<div class="col-md-12 mymargin">';

				 	echo '<center><b style>Subject wise breakdown of your performance</b></center>';
				 	echo '</div>';
			foreach ($google_feed_json1 as $value):
				//print_r($value);
			       
			?>
					 <div class="col-md-4 mymargin">
						 <div id='<?php echo $value[3];?>' style="width: 100%;"></div>	
					</div>
					
					<?php $i++; endforeach;
                             }
					  ?>
				
				</div>
				<?php foreach ($fusion_feed_array as $key): ?>
					
						  <div class="col-md-6 mymargin" id='<?php echo $key[4];?>'>FusionCharts XT will load here!</div>
				     
						<?php endforeach; ?>
<!-- remove if not working-->

<?php 
 if(isset($google_feed_json2)){
 	echo '<div class="col-md-12 mymargin">';

				 	echo '<center><b style>Chapter wise breakdown of your performance</b></center>';
				 	echo '<center>Only right answers are displayed. If no graph means all wrong answers in that Subject</center>';
				 	echo '</div>';
			foreach ($google_feed_json2 as $key=>$value):
				$string = str_replace(' ', '', $key);

				?>
	<div class="col-md-4 mymargin">
						 <div id='<?php echo $string;?>' style="width: 100%;"></div>	
					</div><br>

<?php endforeach;  }?>
	

			


<!--  removeeeeeeeeeeeeeeeeeeeee  -->





                 <div class="col-md-12">

                 	<div class="col-md-12 mymargin">
				 		<center><b style>Marks Obtained</b></center>
				 	</div>
                	<!--<div class="col-md-5 mymargin">
                 		<div id="chart_div" style="display: none;"></div>
                	</div>-->
                	

					
					






















			<div class="col-md-3 "></div>	
                </div>

				</div>	
				</div>

				
			
				
				<!--<button type="button" class="btn ed_btn pull-left ed_orange">preview lesson</button>-->
				<!--<a href="#" type="button" class="btn ed_btn pull-right ed_orange">Start Test</a>-->
			  </div>
			   
			<form id="answers_form" class="form" action="" method="post">
			
		<?php 
			/*
			$sent_assoc = array();
				foreach ($trial as $el1) {
    			
    			$sent_assoc[$el1['question_no']] = $el1;
				
				}	
			$default_sent = array('student_answer' => null);
			foreach ($detailed_result as &$el) {
   			$id = $el['id'];
    		$sent = isset($sent_assoc[$id]) ? $sent_assoc[$id] : $default_sent;
    		$el = array_merge($el, $sent);
    		//print_r($el);
			}
			
			
			*/
			//print_r($detailed_result);	?>
			
			
			<?php 
			$i=1;
			foreach($detailed_result as $row):
			?>
			<style>
                                        .mainQusClass{
                                            background: white;
                                            padding: 0px 17px;
                                            border: 1px solid lightgray;
                                        }
                                        .mainQusClass .options{
                                            padding: 9px 26px;
                                        }

                                        .mainQusClass .options span{
                                            padding: 0px 7px;    
                                        }

                                    </style>
			
			
			
			
			<div class="test mainQusClass testmargin">
			<!--<div id="piechart" style="width: 900px; height: 500px;"></div>-->
			<br/>
			<?php 
			     $right_image=base_url('images/accept.png');
			     $wrong_image=base_url('images/wrong.gif');
			     if(empty($row['student_answer'])){
				echo "<p><b>You Did not answer this question</p><br>";
			}?>
			
			
		<span class="que-no">Q.<?php echo $i++;?></span>&nbsp;<span class="question"><?php echo $row['question'];?></span>
				<div class="clear"></div>
				<div class="options">
					<p><span>A.</span><?php echo $row['option1'];?><?php if($row['answer_option']=='a'){ echo "<img src=$right_image>";}else if ($row['answer_option']!=$row['student_answer'] && $row['student_answer']=='a'){echo "<img src=$wrong_image>";}?></p><br />
					<p><span>B.</span><?php echo $row['option2'];?><?php if($row['answer_option']=='b'){ echo "<img src=$right_image>";}else if ($row['answer_option']!=$row['student_answer'] && $row['student_answer']=='b'){echo "<img src=$wrong_image>";}?></p><br />
					<p><span>C.</span><?php echo $row['option3'];?><?php if($row['answer_option']=='c'){ echo "<img src=$right_image>";}else if ($row['answer_option']!=$row['student_answer'] && $row['student_answer']=='c'){echo "<img src=$wrong_image>";}?></p><br />
					<p><span>D.</span><?php echo $row['option4'];?><?php if($row['answer_option']=='d'){ echo "<img src=$right_image>";}else if ($row['answer_option']!=$row['student_answer'] && $row['student_answer']=='d'){echo "<img src=$wrong_image>";}?></p><br />
					<div><p><b>Your Answer: </b> <span><?php echo strtoupper($row['student_answer']);?></span></p></div>
					<div><p><b>Correct Answer: </b> <span><?php echo strtoupper($row['answer_option']);?></span></p></div>
				</div>
				
				</div>
				<?php endforeach; ?>
			   
		
			</form>
			</div>
		


	</div>
  </div>  
  
</div>


<!--Newsletter Section six end-->
<!--Footer Top section start-->
<div class="ed_footer_wrapper">
	<div class="ed_footer_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="widget text-widget">
						<p><a href="index.html"><img src=<?php echo base_url("images/footer/F_Logo.png");?> alt="Footer Logo" /></a></p>
						<p>Transforming dreams into reality.
						</p>
						<div class="ed_sociallink">
						<ul>
							<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook-official"></i></a></li>
						</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="widget text-widget">
						<h4 class="widget-title">find us</h4>
						<p><i class="fa fa-safari"></i>Office No.6, Mantri House, 929,<br/>Tukaram Paduka Chowk,FC Road, <br/>Pune- 411004.</p>
						<p><i class="fa fa-envelope-o"></i><a href="#">info@infinitycivilacademy.com</a> <br/><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
						<p><i class="fa fa-phone"></i> 18008339977</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="widget text-widget">
						<h4 class="widget-title">Subscribe Now</h4>
							<div class="ed_newsletter_section_form">
								<form class="form" action="subscribe.php" method="post">
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
										<input class="form-control" type="email" name="subscribeEmail" placeholder="Newsletter Email" required/>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
										<button class="btn ed_btn ed_green">confirm</button>
									</div>
								</form>
							</div>
						<!--<p><strong>@education </strong> How many students do you educate monthly? Open <a href=""> http://t.co/KFDdzLSD9</a><br/>2 days ago</p>
						
						<p><strong>@educationUK </strong> Web Design that works. Have a look at this masterpiece. <a href="">http://t.co/9j8DH93zrO</a><br/>5 days ago</p>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Footer Top section end-->
<!--Footer Bottom section start-->
<div class="ed_footer_bottom">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="ed_copy_right">
					<p>&copy; Copyright 2016, All Rights Reserved | Powered by <a href="www.whitecode.co.in" target="_blank"> WhiteCode</a></p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="ed_footer_menu">
						<ul>
							<li><a href="index.html">home</a></li>
							<li><a href="#">private policy</a></li>
							<li><a href="about.html">about</a></li>
							<li><a href="contact.html">contact us</a></li>
						</ul>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<!--Footer Bottom section end-->
</div>
<!--Page main section end-->



<!--main js file start--> 
<script type="text/javascript" src=<?php echo base_url("js/jquery-1.12.2.js");?>></script> 
<script type="text/javascript" src=<?php echo base_url("js/bootstrap.js");?>></script> 
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--main js file end-->
</body>
<!-- /.content-wrapper -->
 

    <script type="text/javascript">
    
      google.charts.load('current', {'packages':['line','corechart']});
   
  </script>

    <script type="text/javascript">
    	<?php 
			foreach($student_result as $row){
				$number_questions=$row['total_questions'];
				$right_ans_count=$row['right_ans_count'];
				$wrong_ans_count=$row['wrong_ans_count'];
				$percentage=$row['percentage'];
				$not_answered=$row['not_answered'];		
			}
			?>
      //google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart1);
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
         // ['Total Questions', <?php echo (int)$number_questions;?>],
          ['Right Answer',<?php echo (int)$right_ans_count;?>],
          ['Wrong Answers',<?php echo (int)$wrong_ans_count;?>],
          ['Not Answered',<?php echo (int)$not_answered;?>]
          //['Sleep',    7]
        ]);

        var options = {
          title: 'Your Overall Performance for this test',
         // pieHole: 0.4,
is3D: true,
 titleTextStyle: {
        //color: 'red',    // any HTML string color ('red', '#cc00cc')
        fontName: 'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 13, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: true   // true of false
    }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
     // google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart2() {
          var data = new google.visualization.DataTable();
        	data.addColumn('string','Title');
        	data.addColumn('number','Total');

       		data.addRows(<?php  echo $google_feed_json; ?>);	
        var options = {
          title: 'Right answers in lession',
         // pieHole: 0.4,
         is3D: true,
          titleTextStyle: {
        //color: 'red',    // any HTML string color ('red', '#cc00cc')
        fontName: 'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 13, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: true   // true of false
    }
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
        chart.draw(data, options);
      }
    </script>


 <script type="text/javascript">
 
      google.charts.setOnLoadCallback(drawChart4);
      function drawChart4() {
      	var i=2;
    	<?php 
			foreach ($google_feed_json1 as $value):



			?>

      	var myCustomVar = '<?php echo $value[3];?>';
      	//alert(myCustomVar);
      	//eval("dynamic" + i + " = val[i]");
       var data=   google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Right Answer',<?php echo $value[1];?>],
          ['Wrong Answers',<?php echo $value[2];?>],
          
        ]);

        var options = {
          title: '<?php  echo $value[0];?>',
          //pieHole: 0.4,
		  is3D: true,
		   titleTextStyle: {
        //color: 'red',    // any HTML string color ('red', '#cc00cc')
        fontName: 'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 13, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: true   // true of false
    }

        };

        var chart = new google.visualization.PieChart(document.getElementById('<?php echo $value[3];?>'));
        chart.draw(data, options);
         i++;
      <?php endforeach;?>
      }
     
    </script>

<!--remove if wont work-->
<script type="text/javascript">
 
      google.charts.setOnLoadCallback(drawChart5);
      function drawChart5() {
      	
    	<?php 
			foreach ($google_feed_json2 as $key=>$value):
				$result1=array();
				$string1 = str_replace(' ', '', $key);
	        foreach ($value as $key2):

	        		 $feed_google22=array($key2[0],(int)$key2[1]);
	        		 if (!isset($result1[$feed_google22['0']]))
       				 $result1[$feed_google22['0']] = $feed_google22;
    				else
        			$result1[$feed_google22['0']]['1'] += $feed_google22['1'];
                    $result2 = array_values($result1);	
                    

	       //$feed_google[]=$result2;
	     //$feed_google[]=array($key2[0],(int)$key2[1]);
		

			?>
		<?php endforeach; 
		 $gfeed_json=json_encode($result2);
		 unset($feed_google);
		?>
      	
      	
      	var data = new google.visualization.DataTable();
        	data.addColumn('string','Title');
        	data.addColumn('number','Total');
        	
       		data.addRows(<?php  echo $gfeed_json; ?>);
         
          
        
      

        var options = {
          title: '<?php echo "$key";?>',
          //pieHole: 0.4,
		  is3D: true,
		   titleTextStyle: {
        //color: 'red',    // any HTML string color ('red', '#cc00cc')
        fontName: 'Times New Roman', // i.e. 'Times New Roman'
        fontSize: 13, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
        italic: true   // true of false
    }

        };
     
        var chart = new google.visualization.PieChart(document.getElementById('<?php echo $string1;?>'));
        chart.draw(data, options);
        
      <?php endforeach;?>
      }
     
    </script>
<!-- fusion charts below this point-->

<script type="text/javascript" src=<?php echo base_url("graph_js/fusion/fusioncharts.js");?>></script>

<script type="text/javascript" src=<?php echo base_url("graph_js/fusion/themes/fusioncharts.theme.fint.js");?>></script>
<script type="text/javascript">
<?php 
			foreach($student_result as $row){
				$number_questions=$row['total_questions'];
				$right_ans_count=$row['right_ans_count'];
				$wrong_ans_count=$row['wrong_ans_count'];
				$percentage=$row['percentage'];
				$not_answered=$row['not_answered'];		
			}
			$marksDeducted=$wrong_ans_count*$negativeMarksIfAny;
							$TotalTestMarks=($right_ans_count+$wrong_ans_count+$not_answered)*2;
							$marksGained=($right_ans_count*2)-$marksDeducted;
							$percentage2=($marksGained/$TotalTestMarks)*100;
							$percentage1=number_format((float)$percentage2, 2, '.', '');
			?>

  FusionCharts.ready(function(){
  	
    var fusioncharts = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container',
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Your performance",
            "subCaption": "Overall",
            "numberPrefix": "",
            "startingAngle": "310",
            "decimals": "0",
            "defaultCenterLabel": "Your Percentage: <?php echo $percentage1;?> %",
            "centerLabel": "$label: $value",
            "useDataPlotColorForLabels": "1",
            "theme": "fint",
            "paletteColors" : "#008000,#FF0000,#FF8C00",
            "showPercentValues":"1",
            
            "canvasBgAlpha":"0",
            "outCnvBaseFontSize":"72"
        },
        "data": [{
            "label": "RIGHT",
            "value": "<?php echo $right_ans_count;?>"
        }, {
            "label": "WRONG",
            "value": "<?php echo $wrong_ans_count;?>",
            "isSliced": "1"
        }, {
            "label": "NOT ANSWERED",
            "value":"<?php echo $not_answered;?>"
        }]
    }
}
);
    fusioncharts.render();



});
</script>

<script type="text/javascript">
	
FusionCharts.ready(function(){
	<?php foreach ($fusion_feed_array as $key): ?>
  		
  
    var fusioncharts = new FusionCharts({

    type: 'doughnut2d',
    renderAt: "<?php echo $key['4']; ?>",
    width: '100%',
    height: '400',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Graph for",
            "subCaption": "<?php echo $key['0']; ?>",
            "numberPrefix": "",
            "startingAngle": "310",
            "decimals": "0",
            "defaultCenterLabel": "Total Question: <?php echo $key[3];?>",
            "centerLabel": "$label: $value",
            "useDataPlotColorForLabels": "1",
            "theme": "fint",
            "paletteColors" : "#008000,#FF0000,#FF8C00",
            "showPercentValues":"1",
            "outCnvBaseFontSize":"72"
            
        },
        "data": [{
            "label": "RIGHT",
            "value": "<?php echo $key[1];?>"
        }, {
            "label": "WRONG",
            "value": "<?php echo $key[2];?>"
            
        }, {
            "label": "NOT ANSWERED",
            "value":"<?php echo $key[3]-($key[2]+$key[1]);?>"
        }]
    }
}
);
    fusioncharts.render();
	
<?php endforeach; ?>


});


</script>

<!--fusion charts end-->





</html>