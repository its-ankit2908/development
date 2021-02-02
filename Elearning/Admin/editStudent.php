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

 if(isset($_REQUEST['editSubmitBtn']))
 {
    if( ($_REQUEST['s_name'] == '') ||  ($_REQUEST['s_email'] == '') ||  ($_REQUEST['s_pass'] == '') || 
    ($_REQUEST['s_occ'] == '') ){
      
      $stumsg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
       $s_id =  $_REQUEST['s_id'];
       $s_name = $_REQUEST['s_name'];
       $s_email = $_REQUEST['s_email'];
       $s_pass = $_REQUEST['s_pass'];
       $s_occ = $_REQUEST['s_occ'];
       
       $sql ="UPDATE student SET stuRegId ='$s_id' , stuRegName ='$s_name',stuRegEmail ='$s_email', stuRegPass ='$s_pass',
       StuRegOcc ='$s_occ' WHERE stuRegId ='$s_id' ";
      
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

 if(isset($_REQUEST['editStudent']))
 {
     $sql = "SELECT * FROM student WHERE stuRegId = {$_REQUEST['edit_id']}";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();
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
        <!--  changeable section  start -->
           <div class="col-sm-6 mt-5 ml-3 mx-3 jumbotron">
             <div class="course-heading">
               <h2>
                 Update Student
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
               <div class="form-group">
                      <label for="s_id" class="font-weight-bold" >Student id</label>
                      <input type="text" class="form-control" id="s_id" name="s_id" value="<?php echo $row['stuRegId'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="s_name" class="font-weight-bold" >Name</label>
                      <input type="text" class="form-control" id="s_name" name="s_name" value="<?php echo $row['stuRegName'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="s_email" class="font-weight-bold">E-mail</label>
                      <input type="text" class="form-control" id="s_email" name="s_email"  value="<?php echo $row['stuRegEmail'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="s_pass" class="font-weight-bold">Password</label>
                      <input type="text" class="form-control" id="s_pass" name="s_pass" value="<?php echo $row['stuRegPass'];?>"  required>
                    </div>
                    <div class="form-group">
                      <label for="s_occ" class="font-weight-bold">Occupation</label>
                      <input type="text" class="form-control" id="s_occ" name="s_occ" value="<?php echo $row['StuRegOcc'];?>" required>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="editSubmitBtn" name="editSubmitBtn">Update</button>
                      <a href="./students.php" class="btn btn-light">Close</a>
                    </div>
                <?php if(isset($stumsg)){ echo $stumsg; } ?>
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
