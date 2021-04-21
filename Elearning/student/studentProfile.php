<?php  
 if(!isset($_SESSION['is_login']))
  {
    session_start();
  }

  if(isset($_SESSION['is_login']) )
   {
      $stuEmail = $_SESSION['stuLogEmail'];

   }
   else{
     echo "<script> location.href ='../index.php'; </script>"; 
   }

   include_once('../db_connection.php');
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

    <title>Student Profile</title>
  </head>
  <body>
    <header>
      <a href="../index.php" class="logo">E-Learning.</a>
    </header>
    
    <section class="container-fluid student-section">
      <div class="row mt-2">          <!--  student dashborad  start-->
        <div class="col-sm-3 position-fixed">
           <div class="stu-dashboard">
             <div class="stu-img">
             <?php    
                    $sql = "select stuRegImg from student where stuRegEmail = '$stuEmail' ";

                    $result =  $conn->query($sql);
                    
                     $row = $result->fetch_assoc();

                    ?>
                    
                    <img src="<?php echo $row['stuRegImg'] ?>" alt="">
             </div>
             <ul class="stu-menu">
               <li><a href="./updateProfile.php"><i class="fa fa-user pr-2" aria-hidden="true"></i>Update Profile</a></li>
               <li><a href="./myCourse.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>My Courses</a></li>
               <li><a href="./stuFeedback.php"><i class="fa fa-comments pr-2" aria-hidden="true"></i>Feedback</a></li>
               <li><a href="./stuChangePass.php"><i class="fa fa-unlock pr-2" aria-hidden="true"></i>Change Password</a></li>
               <li><a href="../logout.php"><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a></li>
             </ul>
           </div>
        </div>
      </div>    <!--  student dashborad  end -->

    </section>
    


    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminStyle.js"></script>
    <script src="../js/ajaxRequest.js"></script>
    <script src="../js/adminAjaxRequest.js"></script>
  </body>
</html>
