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

 if(isset($_REQUEST['studentSubmitBtn']))
 {
    if( ($_REQUEST['student_name'] == '') ||  ($_REQUEST['student_email'] == '') ||  ($_REQUEST['student_pass'] == '') || 
    ($_REQUEST['student_occ'] == '')  ){
      
      $stumsg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
      $student_name = $_REQUEST['student_name'];
      $student_email = $_REQUEST['student_email'];
      $student_pass = $_REQUEST['student_pass'];
      $student_occ = $_REQUEST['student_occ'];
    
       
       $sql ="INSERT INTO student (stuRegName,stuRegEmail,stuRegPass,stuRegOcc) VALUES 
       ('$student_name','$student_email','$student_pass','$student_occ')";
      
      if($conn->query($sql) == TRUE)
      {
        $stumsg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Student Added successfully</div>";
        echo "<script> window.location.href = './students.php' </script>";
      }
      else
      {
        $stumsg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add Student</div>";

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
                 Add Student
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
                    <div class="form-group">
                      <label for="student_name" class="font-weight-bold" >Name</label>
                      <input type="text" class="form-control" id="student_name" name="student_name" required>
                    </div>
                    <div class="form-group">
                      <label for="student_email" class="font-weight-bold">E mail</label>
                      <input type="email" class="form-control" id="student_email" name="student_email" required>
                    </div>
                    <div class="form-group">
                      <label for="student_pass" class="font-weight-bold">Password</label>
                      <input type="text" class="form-control" id="student_pass" name="student_pass" required>
                    </div>
                    <div class="form-group">
                      <label for="student_occ" class="font-weight-bold">Occupation</label>
                      <input type="text" class="form-control" id="student_occ" name="student_occ" required>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="studentSubmitBtn" name="studentSubmitBtn">Submit</button>
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
