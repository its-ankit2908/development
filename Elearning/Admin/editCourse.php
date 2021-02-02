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
    if( ($_REQUEST['c_name'] == '') ||  ($_REQUEST['c_desc'] == '') ||  ($_REQUEST['c_author'] == '') || 
    ($_REQUEST['c_duration'] == '') ||  ($_REQUEST['c_price'] == '') ||  ($_REQUEST['c_original_price'] == '') ){
      
      $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
       $c_id =  $_REQUEST['c_id'];
       $c_name = $_REQUEST['c_name'];
       $c_desc = $_REQUEST['c_desc'];
       $c_author = $_REQUEST['c_author'];
       $c_duration = $_REQUEST['c_duration'];
       $c_price = $_REQUEST['c_price'];
       $c_original_price = $_REQUEST['c_original_price'];
       $c_img = $_FILES['c_img']['name'];
       $c_img_temp = $_FILES['c_img']['tmp_name'];
       $c_img_folder =  '../media/image/courseimg/'.$c_img ;
       move_uploaded_file($c_img_temp,$c_img_folder);
       
       $sql ="UPDATE course SET course_id ='$c_id' , course_name ='$c_name',course_desc ='$c_desc',course_author ='$c_author',
       course_duration ='$c_duration',course_price ='$c_price',course_original_price ='$c_original_price',course_img ='$c_img_folder'
       WHERE course_id ='$c_id' ";
      
      if($conn->query($sql) == TRUE)
      {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Course updated Successfully</div>";
        echo "<script> window.location.href = './adminCourses.php' </script>";
      }
      else
      {
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add c</div>";

      }


       }
 }

 if(isset($_REQUEST['editCourse']))
 {
     $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['edit_id']}";
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
                 Update Course
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
               <div class="form-group">
                      <label for="c_id" class="font-weight-bold" >Course id</label>
                      <input type="text" class="form-control" id="c_id" name="c_id" value="<?php echo $row['course_id'];?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="c_name" class="font-weight-bold" >c Name</label>
                      <input type="text" class="form-control" id="c_name" name="c_name" value="<?php echo $row['course_name'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="c_desc" class="font-weight-bold">c Description</label>
                      <textarea name="c_desc" id="c_desc" class="form-control" rows="2" required> <?php echo $row['course_desc']?> </textarea>
                    </div>
                    <div class="form-group">
                      <label for="c_author" class="font-weight-bold">Author</label>
                      <input type="text" class="form-control" id="c_author" name="c_author"  value="<?php echo $row['course_author'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="c_duration" class="font-weight-bold">c duration</label>
                      <input type="text" class="form-control" id="c_duration" name="c_duration" value="<?php echo $row['course_duration'];?>"  required>
                    </div>
                    <div class="form-group">
                      <label for="c_price" class="font-weight-bold">c Selling Price</label>
                      <input type="text" class="form-control" id="c_price" name="c_price" value="<?php echo $row['course_price'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="c_original_price" class="font-weight-bold">c Original Price</label>
                      <input type="text" class="form-control" id="c_original_price" name="c_original_price" value="<?php echo $row['course_original_price'];?>" required>
                    </div>
                    <div class="form-group">
                      <label for="c_image" class="font-weight-bold">Course Image</label>
                      <img src="<?php echo $row['course_img']; ?>" alt="" width="60" height="60" class="img-thumbnail">
                      <input type="file" class="form-control-file" name="c_img" id="c_img" required>
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
