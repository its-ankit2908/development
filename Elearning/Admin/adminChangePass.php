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

 if(isset($_REQUEST['changePassBtn']))
 {
    if( ($_REQUEST['admin_email'] == '') ||  ($_REQUEST['admin_pass'] == '') ){
      
      $stumsg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
       
       $admin_pass = $_REQUEST['admin_pass'];
     
       
       $sql ="UPDATE admin SET admin_pass = '$admin_pass' WHERE admin_email ='$adminEmail' ";
      
      if($conn->query($sql) == TRUE)
      {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Student Updated Successfully</div>";
        echo "<script> window.location.href = './students.php' </script>";
      }
      else
      {
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add Student</div>";

      }


       }
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

    <title>Admin</title>
  </head>
  <body>
    <header>
      <a href="#" class="logo">E-Learning.</a>
      <div class="toggleMenu"><img src="../media/menu.png" alt="" /></div>
    </header>
     
   

    <section class="container-fluid admin-section" style="background: #000">
      <div class="row">
        <div class="col-sm-3 pt-3">
          <div class="dash-board">
            <h3>
              <a href="adminDashboard.php"><i class="fa fa-tachometer pr-2" aria-hidden="true"></i> Dashboard</a>
            </h3>
            <ul class="admin-menu">
              <li><a href="addCourses.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Courses</a></li>
              <li><a href=""><i class="fa fa-book pr-2" aria-hidden="true"></i>Lessons</a></li>
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
              <li><a href="">
                <i class="fa fa-unlock pr-2" aria-hidden="true"></i>Change
                Password</a>
              </li>
                
                <li><a href="../logout.php"><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a>
              </li>
            </ul>
          </div>
        </div>
        <!--  changeable section  start -->
           <div class="col-sm-6 mt-5 ml-3 mx-3 jumbotron">
             <div class="course-heading">
               <h2>
                 Change Password
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
               <div class="form-group">
                      <label for="admin_email" class="font-weight-bold" >Email</label>
                      <input type="text" class="form-control" id="admin_email" name="admin_email" value="<?php echo $adminEmail;?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="s_name" class="font-weight-bold" >Password</label>
                      <input type="text" class="form-control" id="admin_pass" name="admin_pass"  required>
                    </div>
                    
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="changePassBtn" name="changePassBtn">Change</button>
                      <a href="./adminDashBoard.php" class="btn btn-light">Cancel</a>
                    </div>
                <?php if(isset($passmsg)){ echo $passmsg; } ?>
               </form>
             </div>
           </div>  
        <!--  changeable section  end -->

      </div>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminStyle.js"></script>
    <script src="../js/ajaxRequest.js"></script>
    <script src="../js/adminAjaxRequest.js"></script>
  </body>
</html>
