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
	.table{
		margin-bottom: 10px !important;
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
					<div class="box box-danger">	
					<div class="box-header with-border">
					  <h3  style="text-align: center;">Your overall Performance</h3>
					<div class="col-md-12" >
						<!-- <div id="donutchart" style="width: 100%; display: none;"></div>-->
						 <div class="chart" id="chart-container" style="height: 300px; position: relative;">Your chart will load here!</div>
						
					</div>
					</div>
                  </div>
					<div>
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
                            	<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                            		<table class="table table-bordered">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Total Marks:</span> <span class="res-data"><label id="total_questions_display1"><?php echo $TotalTestMarks;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<table class="table table-bordered ">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Total Questions:</span> <span class="res-data"><label id="total_questions_display" ><?php echo $number_questions;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<table class="table table-bordered ">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading"> Not Attempted:</span> <span class="res-data"><label id="total_questions_notanswered" ><?php echo $not_answered;?></label></span></td> 
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<table class="table table-bordered ">
                            			<tbody>
                            				<tr>	
                            				
                            					<td><span class="res-heading">Attempted :</span> <span class="res-data"><label id="total_questions_answered" ><?php echo $right_ans_count+$wrong_ans_count;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<table class="table table-bordered ">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Right Answers:</span> <span class="res-data"><label id="total_questions_right" ><?php echo $right_ans_count;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<table class="table table-bordered ">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Wrong Answers:</span> <span class="res-data"><label id="wrong_count" ><?php echo $wrong_ans_count;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            		<table class="table table-bordered ">
                            			<tbody>
                            				<tr>
                            					<td><span class="res-heading">Marks Deducted:</span> <span class="res-data"><label id="marks_deducted"><?php echo $marksDeducted;?></label></span></td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                       
                            	<div style="clear: both;"></div>
                            	<div class="col-lg-12 col-md-12 col-sm-12">
                            		<div class="res-percent" >
                            			<div class="res-info" style="width: 100%;">
                            				<span class="per-data"><label id="total_questions_percentage" ><?php echo $percentage1;?></label>%</span>
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
				<div class="col-md-12 mymargin">
				 		<center><b><h2>Lesson wise breakdown</h2></b></center>
				 	</div>
				 	<div class="col-md-12">
				<?php foreach ($fusion_feed_array as $key): ?>
					<div class="col-md-3 mymargin" style="padding-right: 0px;padding-left: 0px;">
					<div class="box box-danger ">	
					<div class="box-header with-border">
					  <h4 style="text-align: center;"><?php echo $key['0'];?></h4>
						  <div style="height: 300px; position: relative;" class="chart" id='<?php echo $key[4];?>'></div>
				     </div>
				     </div>
				     </div>
						<?php endforeach; ?>
						</div>
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

<!--Footer Top section end-->
<!--Footer Bottom section start-->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script type="text/javascript" src=<?php echo base_url("graph_js/morris/morris.min.js");?>></script>
<link rel="stylesheet" href=<?php echo base_url("graph_js/morris/morris.css");?>>
<link rel="stylesheet" href=<?php echo base_url("graph_js/morris/dist/css/AdminLTE.min.css");?>>

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
var donut = new Morris.Donut({
      element: 'chart-container',
      resize: true,
      colors: ["#008000","#FF0000","#FF8C00"],
      data: [
        {label: "RIGHT", value: "<?php echo $right_ans_count;?>", formatted: '<?php echo ($right_ans_count/$number_questions)*100;?>%'},
        {label: "WRONG", value: "<?php echo $wrong_ans_count;?>", formatted: '<?php echo ($wrong_ans_count/$number_questions)*100;?>%'},
        {label: "NOT ANSWERED", value: "<?php echo $not_answered;?>"
, formatted: '<?php echo ($not_answered/$number_questions)*100;?>%'}
      ],
      hideHover: 'auto',
       formatter: function (x, data) { return data.formatted; }
    });
/*
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
*/
</script>

<script type="text/javascript">
	
FusionCharts.ready(function(){
	<?php foreach ($fusion_feed_array as $key): 
	$right1=$key[1]/($key[1]+$key[2]+$key[3])*100;
	$wrong1=$key[2]/($key[1]+$key[2]+$key[3])*100;
	$na1=$key[3]/($key[1]+$key[2]+$key[3])*100;
	$right=number_format((float)$right1, 2, '.', '');
	$wrong=number_format((float)$wrong1, 2, '.', '');
	$na=number_format((float)$na1, 2, '.', '');

	?>
  	
	var donut = new Morris.Donut({
      element: '<?php echo $key['4']; ?>',
      resize: true,
      colors: ["#008000","#FF0000","#FF8C00"],
      data: [
        {label: "RIGHT", value: "<?php echo $key[1];?>", formatted: '<?php echo $right;?>%'},
        {label: "WRONG", value: "<?php echo $key[2];?>", formatted: '<?php echo $wrong;?>%'},
        {label: "NOT ANSWERED", value: "<?php echo $key[3];?>"
, formatted: '<?php echo $na;?>%'}
      ],
      hideHover: 'auto',
       formatter: function (x, data) { return data.formatted; }
    });



  /*
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
	*/
<?php endforeach; ?>


});


</script>

<!--fusion charts end-->





</html>