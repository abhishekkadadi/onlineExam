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
                                <i class="fa fa-arrow-right"></i> Credits wallet history
                            </h3>    

                            <div style="clear: both; margin-top: 2%;"></div>
                            <?php// print_r($creditswallethistory); ?>
                            <div class="table-responsive text-center">
                                <table class="table table-bordered  sel-exam-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="font-weight: normal">Transaction id</th>  
                                            <th class="text-center" style="font-weight: normal">Order id</th>
                                            <th class="text-center" style="font-weight: normal">Purchase Exam Name</th> 
                                            <th class="text-center" style="font-weight: normal">Transaction amount</th>   
                                            <th class="text-center" style="font-weight: normal">Payment status</th>
                                            <th class="text-center" style="font-weight: normal">Acknowledgment</th>                                            
                                            <th class="text-center" style="font-weight: normal">Transaction date</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <?php
                                        if(!empty($creditswallethistory)){
                                        $i=1;
                                        foreach ($creditswallethistory as $row): ?>
                                            <tr>
                                                <td><?php echo $i ?> </td>
                                                <td><?php if($row['orderId'] == ""){ echo '-'; }else{ echo $row['orderId'];  }; ?> </td>  
                                                <td><?php if($row['set_Name'] == ""){ echo '-'; }else{ echo $row['set_Name'];  }; ?></td>
                                                <td><?php echo $row['transactionAmount']; ?> </td>
                                                <td><?php echo $row['paymentStatus']; ?> </td>
                                                <td><?php if($row['payment_status'] == "A"){ echo 'Credited'; }else{echo 'Debited';  }$row['payment_status']; ?> </td>
                                                <td><?php echo $row['timeStamp']; ?> </td>
                                            </tr>
                                        <?php $i++; endforeach;  }else{?>
                                            <tr><td colspan="6"><b>No Transaction</b></td></tr>                          
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