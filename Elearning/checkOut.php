<?php
   if(!isset($_SESSION['is_login']))
   {
     session_start();
   }
   
   
   
    
     $_SESSION['stuEmail'] = $_SESSION['stuLogEmail'];
   


   $_SESSION['c_id'] = $_SESSION['course_id'];

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
  header("Expires: 0");
  
   if(!isset($_SESSION['is_login']))
   {
      
      echo '<script> location.href = "loginSignup.php"; </script>';

   }
   else {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="GENERATOR" content="Evrsoft First Page"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="./css/payment.css">
    <title>checkOut Page</title>
</head>

<section class="container-fluid pay-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="heading text-center p-3">
          <h2 class="text-white">Payment GateWay</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="offset-sm-2 col-sm-8">
        <div class="pay-form-bx">
          <form action="./PaytmKit/pgRedirect.php" method="POST">
               <div class="form-group p-3">
                 <label class="text-white" for="order_id" >Order Id</label>
                 <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" class="form-control"
						      name="ORDER_ID" autocomplete="off"
						      value="<?php echo  "ORDS" . rand(10000,99999999)?>">
               </div>
               <div class="form-group p-3">
                 <label class="text-white" for="cust_id">Student Email</label>
                 <input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['stuLogEmail']; ?>">
                </div>
                <div class="form-group p-3">
                  <label class="text-white" for="amout">Amount</label>
                 <input title="TXN_AMOUNT" tabindex="10" class="form-control"
                 type="text" name="TXN_AMOUNT"
                 value="<?php echo $_POST['checkId'];  ?>">
                </div>
               <div class="form-group">
                <input id="INDUSTRY_TYPE_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
               </div>
               <div class="form-group">
                <input id="CHANNEL_ID" tabindex="4" maxlength="12" type="hidden"
                size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
               </div>
               <input value="CheckOut" type="submit" class="btn btn-primary ml-3"	onclick="">
               
          </form>
        </div>
      </div>
    </div>

  </div>


</section>


<body>
    

    
<script src="./js/jquery.js"></script>
 <script src="./js/bootstrap.min.js"></script>
</body>
</html>



<?php } ?>