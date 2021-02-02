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
    <link rel="stylesheet" href="../css/stuStyle.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <title>Lecture Panel</title>
  </head>
  <body>
    <!-- navbar start  -->
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
      <a href="../index.php" class="navbar-brand">Welcome To E-learning</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#Studentnavbar"
        aria-expanded="false"
        aria-label="Toggle-navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="Studentnavbar">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0 pr-5">
          <li class="nav-item ml-3">
            <a href="../index.php" class="nav-link bg-transparent"
              ><i class="fa fa-home pr-2" aria-hidden="true"></i>Home</a
            >
          </li>
          <li class="nav-item ml-3">
            <a href="./myCourse.php" class="nav-link bg-transparent"
              ><i class="fa fa-book pr-2" aria-hidden="true"></i>My Courses</a
            >
          </li>
          <li class="nav-item ml-3">
            <a href="../logout.php" class="nav-link bg-transparent"
              ><i class="fa fa-sign-out pr-2" aria-hidden="true"></i>Logout</a
            >
          </li>
        </ul>
      </div>
    </nav>

    <!-- navbar end  -->

    <div class="container-fluid watch-course-section">
       <div class="row">
           <div class="col-sm-3 text-white lesson-menu">
               <h4 class="text-center ">Lessons</h4>
               <ul id="playlist" class="nav-flex-column">
                 <?php 
                    if(isset($_GET['course_id'])){
                      $course_id = $_GET['course_id'];
                      $sql = "SELECT * from lesson where course_id = '$course_id'";
                      $result =$conn->query($sql);
                      if($result->num_rows >0){
                        while($row = $result->fetch_assoc()){
                           
                          echo '<li class="les-item p-2 text-white" movieurl='.$row['lesson_link'].'
                          style="cursor:pointer;">'.$row['lesson_name'].'</li>';
                            
                        }
                      }

                    }
                 ?>
               </ul>
           </div>
           <div class="col-sm-8 mx-3 p-3 bg-glass">
               <div class="embed-responsive embed-responsive-21by9">
                   <video src="" id="videoarea" controls ></video>
               </div>
           </div>
       </div>


    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/style.js"></script>
    <script>
      $(document).ready(function () {
  $(function () {
    $("#playlist").on("click", function () {
      $("#videoarea").attr({
        src: $(this).attr("movieurl"),
      });
    });

    $("#videoarea").attr({
      src: $("#playlist li").eq(0).attr("movieurl"),
    });
  });
});
    </script>
  </body>
</html>
