<?php  
 if(!isset($_SESSION['is_login']))
  {
    session_start();
  }

 include_once('../db_connection.php');


  if(isset($_SESSION['is_login']) )
   {
      $stuEmail = $_SESSION['stuLogEmail'];

   }
   else{
     echo "<script> location.href ='../index.php'; </script>"; 
   }

  $sql = "SELECT * from student WHERE stuRegEmail = '$stuEmail' ";  
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  
  if(isset($_REQUEST['studentUpdateBtn']))
  {  
    // echo '<script> alert("hello");</script>';
      if(($_REQUEST['student_name'] == '') ||  ($_REQUEST['student_occ'] == ''))
      {

          $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
       
          
      }
      else{
          
        $stu_id = $_REQUEST['student_id'];
        $stu_email = $_REQUEST['student_email']; 
        $stu_name = $_REQUEST['student_name']; 
        $stu_occ = $_REQUEST['student_occ']; 
        $stu_img = $_FILES['student_img']['name'];
        $stu_img_temp =  $_FILES['student_img']['tmp_name'];
        $stu_img_folder = '../media/image/stuimg/'.$stu_img;
        move_uploaded_file($stu_img_temp,$stu_img_folder);

        $sql = "UPDATE student SET stuRegId = '$stu_id',stuRegName ='$stu_name', stuRegEmail = '$stu_email'
        , stuRegOcc = '$stu_occ' , stuRegImg = '$stu_img_folder' where stuRegEmail = '$stuEmail' ";
          
       
      if($conn->query($sql) == TRUE)
      {
        $msg = "<div class='alert alert-success col-sm-6 ml-5 mt-2'>Updated successfully</div>";
        echo "<script> window.location.href = './studentProfile.php' </script>";
      }
      else
      {
        $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to Update Profile</div>";

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
    <link rel="stylesheet" href="../css/stuStyle.css">
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
    </header>
    
    <section class="container-fluid student-section">
      <div class="row mt-2">               <!--  student dashborad  start-->
        
            <div class="col-sm-3 position-fixed">
           <div class="stu-dashboard">
             <div class="stu-img">
               <!-- <img src="" alt=""> -->
             </div>
             <ul class="stu-menu">
               <li><a href="../updateProfile.php"><i class="fa fa-user pr-2" aria-hidden="true"></i>Update Profile</a></li>
               <li><a href=""><i class="fa fa-book pr-2" aria-hidden="true"></i>My Courses</a></li>
               <li><a href="./stuFeedback.php"><i class="fa fa-comments pr-2" aria-hidden="true"></i>Feedback</a></li>
               <li><a href="./stuChangePass.php"><i class="fa fa-unlock pr-2" aria-hidden="true"></i>Change Password</a></li>
               <li><a href="../logout.php"><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a></li>
             </ul>
           </div>
            </div>    <!--  student dashborad  end -->
        
         
      <div class="col-sm-6 mt-2 ml-5 mx-3 jumbotron" style="position:relative; left:350px;">
             <div class="course-heading">
               <h2>
                 Update Profile
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
                    <div class="form-group">
                      <label for="student_id" class="font-weight-bold" >Student Id</label>
                      <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $row['stuRegId']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="student_email" class="font-weight-bold">E-mail</label>
                      <input type="email" class="form-control" id="student_email" name="student_email" value="<?php echo $row['stuRegEmail']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="student_name" class="font-weight-bold" >Student Name</label>
                      <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $row['stuRegName']; ?>" required >
                    </div>
                    <div class="form-group">
                      <label for="student_occ" class="font-weight-bold">Occupation</label>
                      <input type="text" class="form-control" id="student_occ" name="student_occ" value="<?php if(isset($row['stuRegOcc'])){echo $row['stuRegOcc'];} ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="student_img" class="font-weight-bold">Upload Image</label>
                      <input type="file" class="form-control-file" id="student_img" name="student_img" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="studentUpdateBtn" name="studentUpdateBtn">Update</button>
                      <a href="./studentProfile.php" class="btn btn-light">Close</a>
                    </div>
                <?php if(isset($stumsg)){ echo $stumsg; } ?>
               </form>
             </div>  <!-- form end -->
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
