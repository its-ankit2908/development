<?php
  

  header("Pragma: no-cache");
  header("Cache-Control: no-cache");
  header("Expires: 0");  
   
	session_start();
   
	if(isset($_SESSION['stuLogEmail']))
	{
		echo $_SESSION['stuLogEmail'];
	}

    include_once('../db_connection.php');

	// if(session_status() == PHP_SESSION_ACTIVE)
	// {
	// 	echo 'Session is active';
	// }

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		if(isset($_POST['ORDERID']) && isset($_POST['TXNAMOUNT']))
		{
			$order_id = $_POST['ORDERID'];
			$stu_email = $_SESSION['stuEmail'];
			$course_id = $_SESSION['c_id'];
			$status = $_POST['STATUS'];
			$resmsg = $_POST['RESPMSG'];
			$amount = $_POST['TXNAMOUNT'];
			$date = $_POST['TXNDATE'];
			$sql = "INSERT INTO courseorder (order_id,stu_email,course_id,status,resmsg,amount,order_date)
			VALUES ('$order_id','$stu_email','$course_id','$status','$resmsg','$amount','$date')";

			if($conn->query($sql) == TRUE)
			{
				echo 'Redirecting to My Profile....';
				echo '<script> window.location.href = "../student/myCourse.php"; </script>';
			}
		}
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		// foreach($_POST as $paramName => $paramValue) {
		// 		echo "<br/>" . $paramName . " = " . $paramValue;
		// }
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>