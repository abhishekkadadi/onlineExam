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
      
        <div class=" ed_toppadder80 ed_bottompadder80">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> -->
                            <div class="ed_time_executor ed_toppadder40">
                                <h3 class="h3class">
                                    <i class="fa fa-arrow-right"></i> Select Stream
                                </h3>    
                               
                                  <div style="clear: both; margin-top: 2%;"></div>
                                    <div class="table-responsive text-center">
                                        <table class="table table-bordered  sel-exam-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Stream</th>                                                   
                                                    <th class="text-center">Action</th>
                                                </tr>
                                             </thead>    
                                            <tbody>
                                                <?php foreach ($stream as $row): ?>
                                                <tr>
                                                    <td><?php echo $row['streanName']; ?> </td>
                                                    
                                                    <td><a class="Mybtn purple" href=<?php echo site_url("Student_login/load_subjects/" . $row['streamId']); ?>> Select </a></td>
                                                </tr>
                                                <?php endforeach; ?>    
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