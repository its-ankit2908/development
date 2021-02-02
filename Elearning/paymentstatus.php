<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./PaytmKit/lib/config_paytm.php");
	require_once("./PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Courses</title>
</head>
<body>
   <!-- navbar start   -->
   <?php 
   include('./header.php')
 ?> 
  <!-- navbar end -->
 
 <!-- banner start  -->
 <div class="container-fluid course-banner d-print-none">
  
 </div>
 <!-- banner end -->

 <!-- payment  status section start -->
   <div class="container-fluid payment-status-section" style="min-height:100vh">
        
       <div class="row">
           <div class="col-sm-12">
               <div class="payment-content">
                   <h2>Payment Status</h2>
                   <div class="statusbx">
                       <form action="" method="POST" class="mt-3 form-inline d-print-none">
                        <label for="order">Order Id: </label>
                        <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" class="form-control ml-3"
                     name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
                         <input type="submit" value="View" name="viewOrder" class="btn btn-primary" onclick=""> 
                       </form>
                   </div>
               </div>
           </div>
       </div>
       <div class="row">
       <div class="col-sm-12 d-print-table" >
       <?php
		        if(isset($responseParamList) && count($responseParamList)>0)
		        { 
		        ?>
            <table class="table table-bordered border-dark table-hover mt-5 d-print-table">
                 <thead>
                     <tr><th colspan="2" class="text-center text-white bg-primary">Payment Receipt</th></tr>
                 </thead>	
                 <tbody class="bg-light">
                    <?php
                    foreach($responseParamList as $paramName => $paramValue) {
                      if(($paramName == "TXNID") || ($paramName == "ORDERID")||($paramName == "TXNAMOUNT")||
                      ($paramName == "STATUS")){
                   ?>
                    <tr >
                    <td style="border: 1px solid"><label><?php echo $paramName?></label></td>
                    <td style="border: 1px solid"><?php echo $paramValue?></td>
                    </tr>
                    <?php
		                 }}
		                ?>
                 </tbody>
            </table>  
            <button class="btn btn-danger d-print-none" onclick="javascript:window.print();">Print</button>
            <?php
		        }
		      ?>
       </div>
       </div>

   </div>
   


 <!-- payment  status section end -->

 <!-- contact section start -->
  <?php
  
    include('./contact.php');
  ?>

 <!-- contact section end -->


     <!-- footer start -->
     <?php 
        
     include('./footer.php');
   
   ?>


  <!-- footer end -->
  

