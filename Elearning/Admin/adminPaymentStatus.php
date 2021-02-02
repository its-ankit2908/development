 <?php  
 if(!isset($_SESSION['is_admin_login']))
  {
    session_start();
  }

  if(isset($_SESSION['is_admin_login']) )
   {
      $adminEmail = $_SESSION['adminLogEmail'];

   }
   else{
     echo "<script> location.href ='../index.php'; </script>"; 
   }

   include_once('../db_connection.php');

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("../PaytmKit/lib/config_paytm.php");
	require_once("../PaytmKit/lib/encdec_paytm.php");
  
  
  

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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/adminStyle.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />

    <title class="d-print-none" >Admin</title>
  </head>
  <body>
    <header class="d-print-none">
      <a href="#" class="logo">E-Learning.</a>
      <div class="toggleMenu"><img src="../media/menu.png" alt="" /></div>
    </header>

    <section class="container-fluid admin-section " style="background: #000">
      <div class="row">
        <div class="col-sm-3 pt-3">
          <div class="dash-board d-print-none">
            <h3>
              <i class="fa fa-tachometer pr-2" aria-hidden="true"></i> Dashboard
            </h3>
            <ul class="admin-menu">
              <li><a href="adminCourses.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Courses</a></li>
              <li><a href="lessons.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Lessons</a></li>
              <li>
                <a href="students.php"><i class="fa fa-graduation-cap pr-2" aria-hidden="true"></i>Students</a>
              </li>
              <li>
                <a href="sellReport.php"><i class="fa fa-table pr-2" aria-hidden="true"></i>Sell Report</a>
              </li>
              <li><a href="adminPaymentStatus.php"><i class="fa fa-table pr-2" aria-hidden="true"></i>Payment Status</a>
              </li>
              <li>
                <a href="adminFeedback.php"><i class="fa fa-commenting pr-2" aria-hidden="true"></i>FeedBack</a>
              </li>
              <li><a href="adminChangePass.php">
                <i class="fa fa-unlock pr-2" aria-hidden="true"></i>Change
                Password</a>
              </li>
                
                <li><a href="../logout.php"><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a>
              </li>
            </ul>
          </div>
        </div>
              
        <div class="col-sm-9 pt-3">
            <form action=""  method="POST" class="mt-3 form-inline d-print-none">
                <div class="form-group">
                     <label for="checkid" class="text-white" >Enter Order Id:</label>
                     <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" class="form-control ml-3"
                     name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
                </div>
                <input value="Status Query" type="submit" class="btn btn-primary ml-3"	onclick="">
              </form>
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
                   ?>
                    <tr >
                    <td style="border: 1px solid"><label><?php echo $paramName?></label></td>
                    <td style="border: 1px solid"><?php echo $paramValue?></td>
                    </tr>
                    <?php
		                 }
		                ?>
                 </tbody>
            </table>  
            <button class="btn btn-danger d-print-none" onclick="javascript:window.print();">Print</button>
            <?php
		        }
		      ?>
        </div>
      </div>

    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminStyle.js"></script>
    <script src="../js/ajaxRequest.js"></script>
    <script src="../js/adminAjaxRequest.js"></script>
  </body>
</html>
