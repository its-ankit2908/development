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

 if(isset($_REQUEST['courseSubmitBtn']))
 {
    if( ($_REQUEST['course_name'] == '') ||  ($_REQUEST['course_desc'] == '') ||  ($_REQUEST['course_author'] == '') || 
    ($_REQUEST['course_duration'] == '') ||  ($_REQUEST['course_price'] == '') ||  ($_REQUEST['course_original_price'] == '') ){
      
      $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
      $course_name = $_REQUEST['course_name'];
       $course_desc = $_REQUEST['course_desc'];
       $course_author = $_REQUEST['course_author'];
       $course_duration = $_REQUEST['course_duration'];
       $course_price = $_REQUEST['course_price'];
       $course_original_price = $_REQUEST['course_original_price'];
       $course_img = $_FILES['course_img']['name'];
       $course_img_temp = $_FILES['course_img']['tmp_name'];
       $course_img_folder =  '../media/image/courseimg/'.$course_img ;
       move_uploaded_file($course_img_temp,$course_img_folder);
       
       $sql ="INSERT INTO course (course_name,course_desc,course_author,course_duration,course_price,course_original_price,course_img)
       VALUES ('$course_name','$course_desc','$course_author','$course_duration','$course_price','$course_original_price','$course_img_folder')";
      
      if($conn->query($sql) == TRUE)
      {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Course Submitted successfully</div>";
        echo "<script> window.location.href = './adminCourses.php' </script>";
      }
      else
      {
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add Course</div>";

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
              <a href="adminDashboard.php" class="text-white" ><i class="fa fa-tachometer pr-2" aria-hidden="true"></i> Dashboard</a>
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
                 Add New Course
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
                    <div class="form-group">
                      <label for="course_name" class="font-weight-bold" >Course Name</label>
                      <input type="text" class="form-control" id="course_name" name="course_name" required>
                    </div>
                    <div class="form-group">
                      <label for="course_desc" class="font-weight-bold">Course Description</label>
                      <textarea name="course_desc" id="course_desc" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="course_name" class="font-weight-bold">Author</label>
                      <input type="text" class="form-control" id="course_author" name="course_author" required>
                    </div>
                    <div class="form-group">
                      <label for="course_duration" class="font-weight-bold">Course duration</label>
                      <input type="text" class="form-control" id="course_duration" name="course_duration" required>
                    </div>
                    <div class="form-group">
                      <label for="course_price" class="font-weight-bold">Course Selling Price</label>
                      <input type="text" class="form-control" id="course_price" name="course_price" required>
                    </div>
                    <div class="form-group">
                      <label for="course_original_price" class="font-weight-bold">Course Original Price</label>
                      <input type="text" class="form-control" id="course_original_price" name="course_original_price" required>
                    </div>
                    <div class="form-group">
                      <label for="course_name" class="font-weight-bold">Upload Course Image</label>
                      <input type="file" class="form-control-file" name="course_img" id="course_img" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
                      <a href="./adminCourses.php" class="btn btn-light">Close</a>
                    </div>
                <?php if(isset($msg)){ echo $msg; } ?>
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
