<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="app">
    <!--<![endif]-->

    <!-- Begin Head -->
    <head>
        <meta charset="utf-8" />
        <title>Civil Engineering Institute Information Technology : Purchased exam history</title>
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
                                <i class="fa fa-arrow-right"></i> Purchased exam history
                            </h3>    

                            <div style="clear: both; margin-top: 2%;"></div>
                            <?php // print_r($purchasedexamhistory); ?>
                            <div class="table-responsive text-center">
                                <table class="table table-bordered  sel-exam-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="font-weight: normal">Purchased id</th>  
                                            <th class="text-center" style="font-weight: normal">Purchased exam name</th>                                                   
                                            <th class="text-center" style="font-weight: normal">Purchased date</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php
                                        if (!empty($purchasedexamhistory)) {
                                            $i = 1;
                                            foreach ($purchasedexamhistory as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $i ?> </td>
                                                    <td><?php echo $row['set_name']; ?> </td>                                                    
                                                    <td><?php echo $row['purchased_date']; ?> </td>
                                                </tr>
                                            <?php $i++; endforeach;
                                            
                                        }else { ?>
                                            <tr><td colspan="3"><b>No transection</b></td></tr>                          
                                        <?php } ?>    
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