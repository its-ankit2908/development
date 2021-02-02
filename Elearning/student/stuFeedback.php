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


   
 if(isset($_REQUEST['feedBtn']))
 {
    if( ($_REQUEST['stu_email'] == '') ||  ($_REQUEST['stu_feed'] == '') ){
      
      $stumsg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Fill All Fields</div>";
    }
    else
    {
       
       $stu_feed = $_REQUEST['stu_feed'];
       
       
       $sql ="INSERT INTO feedback (stuRegEmail,stu_feed) VALUES ('$stuEmail','$stu_feed') ";
      
      if($conn->query($sql) == TRUE)
      {
        $stumsg = "<div class='alert alert-success col-sm-6 ml-5 mt-2 msg'>Submitted Successfully</div>";
       
      }
      else
      {
        $stumsg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to add FeedBack</div>";

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

    <title>Student FeedBack</title>
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
        </div>
        
        <div class="col-sm-6 mt-2 ml-5 mx-3 jumbotron" style="position:relative; left:350px;">
             <div class="heading text-center">
               <h2>
                 FeedBack Section
               </h2>
             </div>
             <div class="add-course-form">
               <form action="" method="POST" enctype = "multipart/form-data">
                   <div class="form-group">
                      <label for="stu_email" class="font-weight-bold" >Student Email</label>
                      <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php echo $stuEmail;?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="stu_feed" class="font-weight-bold" >Feedback</label>
                      <textarea name="stu_feed" id="stu_feed" class="form-control" rows="10" placeholder="Enter Feedback Here" required></textarea>
                    </div>
                    
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="feedBtn" name="feedBtn">Submit</button>
                      <a href="./studentProfile.php" class="btn btn-light">Cancel</a>
                    </div>
                    
                <?php if(isset($stumsg)){ echo $stumsg; } ?>
               </form>
             </div>    
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
