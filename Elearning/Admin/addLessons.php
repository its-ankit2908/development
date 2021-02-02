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


 if(isset($_REQUEST['lessonSubmitBtn']))
 {  
    // echo "<script> alert('hello'); </script>";
     echo $_FILES['lesson_vid'];    

    if( ($_REQUEST['lesson_name'] == '') ||  ($_REQUEST['lesson_desc'] == '') ){
      
      $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
       $lesson_name = $_REQUEST['lesson_name'];
       $lesson_desc = $_REQUEST['lesson_desc'];
       $course_id = $_REQUEST['course_id'];
       $course_name = $_REQUEST['course_name'];
      
       $lesson_vid = $_FILES['lesson_vid']['name'];
       $lesson_vid_temp = $_FILES['lesson_vid']['tmp_name'];
       $lesson_vid_folder =  '../media/video/'.$lesson_vid ;
       move_uploaded_file($lesson_vid_temp,$lesson_vid_folder);
       
       $sql ="INSERT INTO lesson (lesson_name,lesson_desc,lesson_link,course_id,course_name)
       VALUES ('$lesson_name','$lesson_desc','$lesson_vid_folder','$course_id','$course_name')";
      
      if($conn->query($sql) == TRUE)
      {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>lesson Submitted successfully</div>";
        echo "<script> window.location.href = './lessons.php';</script>";
      }
      else
      {
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add Lesson</div>";
         

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

    <title>Add Lessons</title>
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
                 Add New Lesson
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
                    <div class="form-group">
                      <label for="Course_id" class="font-weight-bold" >Course Id</label>
                      <input type="text" class="form-control" id="course_id" name="course_id" value="<?php echo $_SESSION['courseId']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="course_desc" class="font-weight-bold">Course Name</label>
                      <input type="text" class="form-control" id="course_name" name="course_name"  value="<?php echo $_SESSION['courseName']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="lesson_name" class="font-weight-bold">Lesson Name</label>
                      <input type="text" class="form-control" id="lesson_name" name="lesson_name" required>
                    </div>
                    <div class="form-group">
                      <label for="lesson_desc" class="font-weight-bold">Lesson Description</label>
                      <input type="text" class="form-control" id="lesson_desc" name="lesson_desc" required>
                    </div>
                    <div class="form-group">
                      <label for="lesson_name" class="font-weight-bold">Upload Lesson Video</label>
                      <input type="file" class="form-control-file" name="lesson_vid" id="lesson_vid" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
                      <a href="./lessons.php" class="btn btn-light">Close</a>
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
