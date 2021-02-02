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
    if( ($_REQUEST['l_name'] == '') ||  ($_REQUEST['l_desc'] == '') ){
      
      $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
       $c_id =  $_REQUEST['c_id'];
       $c_name = $_REQUEST['c_name'];
       $l_id =  $_REQUEST['l_id'];
       $l_name = $_REQUEST['l_name'];
       $l_desc = $_REQUEST['l_desc'];
       
       $l_vid = $_FILES['l_vid']['name'];
       $l_vid_temp = $_FILES['l_vid']['tmp_name'];
       $l_vid_folder =  '../media/video/'.$l_vid ;
       move_uploaded_file($l_vid_temp,$l_vid_folder);
       
       $sql ="UPDATE lesson SET course_id ='$c_id' , course_name ='$c_name',lesson_id ='$l_id' , lesson_name ='$l_name',
       lesson_desc ='$l_desc',lesson_link ='$l_vid_folder' WHERE lesson_id ='$l_id' ";
      
      if($conn->query($sql) == TRUE)
      {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Course updated Successfully</div>";
        echo "<script> window.location.href = './lessons.php' </script>";
      }
      else
      {
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add c</div>";

      }


       }
 }

 if(isset($_REQUEST['editLesson']))
 {
     $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['edit_id']}";
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
              <li><a href="addcs.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>cs</a></li>
              <li><a href="lessons.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Lessons</a></li>
              <li>
                <a href=""><i class="fa fa-graduation-cap pr-2" aria-hidden="true"></i>Students</a>
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
                 Update Lesson
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
               <div class="form-group">
                      <label for="c_id" class="font-weight-bold" >Course id</label>
                      <input type="text" class="form-control" id="c_id" name="c_id" value="<?php echo $row['course_id'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="c_name" class="font-weight-bold" >Course Name</label>
                      <input type="text" class="form-control" id="c_name" name="c_name" value="<?php echo $row['course_name'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="l_id" class="font-weight-bold">Lesson id</label>
                      <input type="text" class="form-control" id="l_id" name="l_id"  value="<?php echo $row['lesson_id'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="l_name" class="font-weight-bold">Lesson Name</label>
                      <input type="text" class="form-control" id="l_name" name="l_name" value="<?php echo $row['lesson_name'];?>"  required>
                    </div>
                    
                    <div class="form-group">
                      <label for="l_desc" class="font-weight-bold">Lesson Description</label>
                      <textarea name="l_desc" id="l_desc" class="form-control" rows="2" required> <?php echo $row['lesson_desc']?> </textarea>
                    </div>
            
                    <div class="form-group">
                      <label for="l_image" class="font-weight-bold">Lesson link</label>
                      <video src="<?php echo $row['lesson_link']; ?>" controls width="200" height="200"></video>
                      <input type="file" class="form-control-file" name="l_vid" id="l_vid" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="editSubmitBtn" name="editSubmitBtn">Update</button>
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
