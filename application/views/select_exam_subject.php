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

        <div class=" ed_toppadder80 ed_bottompadder80" style="padding-top: 130px;">
         
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab1" role="tab" data-toggle="tab">Select Subject</a></li>
                                <li role="presentation"><a href="#tab2" role="tab" data-toggle="tab">Select Full Syllabus Tests</a></li>
                                <li role="presentation"><a href="#tab3" role="tab" data-toggle="tab">Select Demo Exam</a></li>                            
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab1">
                                    <p>
                                    <div class="table-responsive text-center">
                                        <table class="table table-bordered  sel-exam-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Exam</th>                                                   
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                <?php foreach ($subjects as $row): ?>
                                                    <tr>
                                                        <td><?php echo $row['question_type']; ?> </td>                                                    
                                                        <td><a class="Mybtn purple" href=<?php echo site_url("Student_login/load_sets/" . $row['id']); ?>> Select </a></td>
                                                    </tr>
                                                <?php endforeach; ?>    
                                            </tbody>
                                        </table>
                                    </div>    


                                    </p>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab2">
                                    <p>
                                    <div class="table-responsive text-center">
                                        <table class="table table-bordered  sel-exam-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Exam</th>                                                   
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>    
                                            <tbody>

                                                <tr>
                                                    <td>Full Syllabus Tests</td>                                                    
                                                    <td><a class="Mybtn purple" href=<?php echo site_url("Student_login/load_FullSyllabusTests/" . $fullsyllabustests_StreamId); ?>> Select </a></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>        
                                    </p>
                                </div>


                                <div role="tabpanel" class="tab-pane" id="tab3">
                                    <p>
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
                                        <?php foreach ($subjects1 as $row): ?>
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
                                        <?php endforeach; ?>    
                                    </tbody>
                                </table>
                            </div>            
                                        
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
           
        </div>

    </body>
</html>