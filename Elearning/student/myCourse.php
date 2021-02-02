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
      <a href="#" class="logo">E-Learning.</a>
    </header>
    
    <section class="container-fluid student-section">
      <div class="row mt-2">          <!--  student dashborad  start-->
        <div class="col-sm-3 position-fixed">
           <div class="stu-dashboard">
             <div class="stu-img">
               <!-- <img src="" alt=""> -->
             </div>
             <ul class="stu-menu">
               <li><a href="./updateProfile.php"><i class="fa fa-user pr-2" aria-hidden="true"></i>Update Profile</a></li>
               <li><a href=""><i class="fa fa-book pr-2" aria-hidden="true"></i>My Courses</a></li>
               <li><a href="./stuFeedback.php"><i class="fa fa-comments pr-2" aria-hidden="true"></i>Feedback</a></li>
               <li><a href="./stuChangePass.php"><i class="fa fa-unlock pr-2" aria-hidden="true"></i>Change Password</a></li>
               <li><a href="../logout.php"><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a></li>
             </ul>
           </div>
        </div>  <!--  student dashborad  end -->
        <div class="col-sm-8 mt-2 ml-5 mx-3 jumbotron" style="position:relative; left:320px;">
            <h3 class="text-center" style="font-size: 2.1em;">Your Courses</h3>
            <?php 
               if(isset($stuEmail))
                 {
                   
                     $sql = "SELECT co.order_id, c.course_id,c.course_name,c.course_duration,c.course_desc,
                     c.course_img,c.course_author,c.course_original_price,c.course_price FROM courseorder as co
                    INNER JOIN course AS c ON co.course_id = c.course_id WHERE co.stu_email = '$stuEmail'";                     
                   
                    $result = $conn->query($sql);
                    if($result->num_rows >0){
                      while($row = $result->fetch_assoc()){
                        
              ?>

            <div class="coursebx">  <!--box start -->
              <div class="c-head"><h3><?php echo $row['course_name']; ?></h3></div>
              <div class="c-content">
                <div class="imgbx"><img src="<?php echo $row['course_img']; ?>" alt=""></div>
                <div class="details">
                   <p><?php echo $row['course_desc'] ?></p>
                   <h3 style="font-size: 18px;">Duration: <?php echo $row['course_duration'] ?></h3>
                   <h3 style="font-size: 18px;">Instructor: <?php echo $row['course_author'] ?> </h3>
                   <p class="d-inline font-weight-bold">Price: <Small><del>&#8377 <!--<?php echo $row['course_original_price'];   ?>--> </del></Small>
                    <span class="font-weight-bolder">&#8377<!--<?php echo $row['course_price'];   ?>--></span></p>
                   <br><a href="watchCourse.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-primary p-2 mt-3">Watch Course</a>    
                </div>
              </div>
            </div>  <!--box end -->
            <?php
                 }
              }else{
                echo '<div class="alert alert-success p-2">No course Registered</div>';
              }
               
              }
            
            ?>
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
