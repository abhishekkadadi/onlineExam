<!DOCTYPE html>
<html lang="en" ng-app="app">    
    <head>
        <meta charset="utf-8" />
        <title>Civil Engineering Institute Information Technology : Select Exam</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />   
        <meta name="MobileOptimized" content="320" />
        <link href=<?php echo base_url("css/main.css"); ?> rel="stylesheet" type="text/css"/>            
    </head>
    <body>
        <div class=" ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                       
                        <div class="ed_time_executor ed_toppadder40">
                            <h3 class="h3class">
                                <i class="fa fa-arrow-right"></i> Select Exam
                            </h3>    
                            <div style="clear: both; margin-top: 2%;"></div>
                            <div class="table-responsive text-center">                               
                                <table class="table table-bordered  sel-exam-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Exam</th>
                                            <th class="text-center">Credits</th>
                                            <th class="text-center">No Of Attempts</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php if(!empty($subjects)){ foreach ($subjects as $row): ?>
                                         <?php if ($row['setAmount'] == 0) { ?>                                            
                                             <?php } else { ?>
                                            <tr>
                                                <td><?php echo $row['set_name']; ?> </td>
                                                <td><?php echo $row['setAmount']; ?></td>
                                                <td><?php echo $row['NumberOfAttempts']; ?></td>
                                                <?php if ($row['AlreadyParchaseExamId'] == 0) { ?>                                                   
                                                        <td><a class="Mybtn purple PurchaseExam" setAmount="<?php echo $row['setAmount']; ?>" NumberOfperchaseExam="<?php echo $row['NumberOfperchaseExam']; ?>" id="<?php echo $row['id']; ?>" > Purchase </a></td>
                                                <?php } else { ?>
                                                    <td><a class="Mybtn purple" id="$row['id']" href=<?php echo site_url("Instruction/index/" . $row['id']."/". $row['AlreadyParchaseExamId']); ?>> Take Exam </a></td>
                                                <?php } ?>
                                            </tr>
                                             <?php } ?>
                                        <?php endforeach; } else{?>
                                            <tr><td colspan="6"><b>No More Exams</b></td></tr>                          
                                       <?php  } ?>        
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                        
                        
                           <div class="ed_time_executor ed_toppadder40">
                            <h3 class="h3class">
                                <i class="fa fa-arrow-right"></i> Select Demo Exam
                            </h3>    
                            <div style="clear: both; margin-top: 2%;"></div>
                            <div class="table-responsive text-center">                                
                                <table class="table table-bordered  sel-exam-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Exam</th>                                           
                                            <th class="text-center">No Of Attempts</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php if(!empty($subjects)){ foreach ($subjects as $row): ?>
                                        <?php  if ($row['setAmount'] == 0) {  ?>
                                            <tr>
                                                <td><?php echo $row['set_name']; ?> </td>                                                
                                                <td><?php echo $row['NumberOfAttempts']; ?></td>
                                                <?php if ($row['AlreadyParchaseExamId'] == 0) { ?>                                                   
                                                        <td><a class="Mybtn purple PurchaseExam" setAmount="<?php echo $row['setAmount']; ?>" NumberOfperchaseExam="<?php echo $row['NumberOfperchaseExam']; ?>" id="<?php echo $row['id']; ?>" > Free Exam </a></td>                                                  
                                                <?php } else { ?>
                                                    <td><a class="Mybtn purple" id="$row['id']" href=<?php echo site_url("Instruction/index/" . $row['id']."/". $row['AlreadyParchaseExamId']); ?>> Free Exam </a></td>
                                                <?php } ?>
                                            </tr>
                                            <?php } else { ?>
                                            
                                            <?php } ?>
                                        <?php endforeach; } else{?>
                                            <tr><td colspan="6"><b>No More Exams</b></td></tr>                          
                                       <?php  } ?>           
                                    </tbody>
                                </table>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </body>
</html>