<?php   
  // if(!isset($_SESSION['is_login']))
  // {
  //   session_start();
  // }  

  include_once('./db_connection.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>E-Learning</title>
</head>
<body>

    <!-- navbar start -->
      <?php  
          include('header.php');
           
      ?>

    <!-- navbar end -->


    <!-- banner start -->
     <div class="container-fluid banner">
           
        <video class="banner-video" src="./media/Pexels Videos 1580507.mp4 " autoplay muted loop></video>
        <div class="overlay"></div>

        <div class="banner-content">
            <h2>Welocome To iSchool</h2>
            <h3>Learn And Explore Yourself</h3>
           <?php 
             if(isset($_SESSION['is_login']))
             {
                echo '<a href="student/studentProfile.php" class="btn banner-btn" >View Profile</a>';
             }
             else
             {
                echo '<a href="#" class="btn banner-btn" data-toggle="modal" data-target="#stuRegModal" >Get Started</a>';
             }
           
           
           ?>

            
        </div>

     </div>

    
    <!-- banner end -->
    <!-- banner bottom footer -->
     <div class="container-fluid banner-bottom">

        <div class="row banner-bottom-content">
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-book mr-3" aria-hidden="true"></i>100+ Online Courses</h5>
            </div>
        
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-user mr-3" aria-hidden="true"></i>Expert Instructors</h5>
            </div>
    
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-keyboard-o mr-3" aria-hidden="true"></i>LifeTime Access</h5>
            </div>
        
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-inr mr-3" aria-hidden="true"></i>Money Back Gurantee</h5>
            </div>
        </div>


    <!-- banner bottom footer end -->

    <!-- course section start  -->

      <section id="course" class="pb-5">
          <div class="container">
            
            <div class="row">
                  <div class="col-sm-12">
                      <div class="headingtxt">
                          <h2>Popular Courses</h2>
                      </div>
                  </div>
              </div>
               <br><br>
               <div class="container">  
              <div class="card-deck">    <!-- Card Deck 1 start-->
                 <?php    
                   $sql = "SELECT * from course LIMIT 3";
                   $result = $conn->query($sql);
                   if($result->num_rows >0 ){

                   
                      while($row = $result->fetch_assoc()){
                          

                      $course_id = $row['course_id']; 
                      $img = str_replace('..','.',$row['course_img'])  ;
                   
                 ?>
                    <div class="card mb-3" style="max-width:18rem;"  >   <!-- card -->
                      <img src="<?php echo $img; ?>" class="card-img-top" alt="" width="300" height="180">
                      <div class="card-body">
                          <h3 class="card-title font-weight-bolder"><?php echo $row['course_name'];   ?></h3>
                          <p class="card-text"><?php echo $row['course_desc'];   ?></p>
                      </div>

                      <div class="card-footer">
                            <p class="card-text d-inline">Price: <Small><del>&#8377 <?php echo $row['course_original_price'];   ?></del></Small>
                            <span class="font-weight-bolder">&#8377 <?php echo $row['course_price'];   ?></span></p>
                            <form action="./coursedetails.php" method="post">
                            <input type="hidden" name="courseId" id="courseId" value="<?php echo $row['course_id'];?>">
                            <button type="submit" class="btn card-btn float-right">Enroll</button>
                            </form>
                      </div>
                    </div>   <!-- card -->
                    <?php }}?>
                </div>    <!-- card deck 1 end -->
                    
                
              <div class="card-deck">    <!-- Card Deck 2 start-->
                 <?php    
                   $sql = "SELECT * from course LIMIT 3,3";
                   $result = $conn->query($sql);
                   if($result->num_rows >0 ){

                   
                      while($row = $result->fetch_assoc()){
                          

                      $course_id = $row['course_id']; 
                      $img = str_replace('..','.',$row['course_img'])  ;
                   
                 ?>
                    <div class="card mb-3" style="max-width:18rem;"  >   <!-- card -->
                      <img src="<?php echo $img; ?>" class="card-img-top" alt="" width="300" height="180">
                      <div class="card-body">
                          <h3 class="card-title font-weight-bolder"><?php echo $row['course_name'];   ?></h3>
                          <p class="card-text"><?php echo $row['course_desc'];   ?></p>
                      </div>

                      <div class="card-footer">
                            <p class="card-text d-inline">Price: <Small><del>&#8377 <?php echo $row['course_original_price'];   ?></del></Small>
                            <span class="font-weight-bolder">&#8377 <?php echo $row['course_price'];   ?></span></p>
                            <a href="./coursedetails.php" class="btn card-btn float-right">Enroll</a>
                      </div>
                    </div>   <!-- card -->
                    <?php }}?>
                </div>    <!-- card deck 2 end -->
                
                
                </div>
                 <br><br>
                <div class="row">
                    <div class="col-sm-12 d-flex" style="justify-content: center;">
                        <a href="./courses.php" class="btn btn-primary">View All Courses</a>
                    </div>
                </div>
          </div>
          </div>
        
      </section>


    <!-- course section end -->



    <!-- contact Section  start-->
      <?php
       include('./contact.php');
      
      ?>
     
    <!-- contact section end -->
 

    <!-- feedback section start -->
      
    <section class="container-fluid bg-primary" id="feedback" >
          
        <div class="row">
            <div class="col-sm-12">
                <div class="headingtxt">
                    <h2>FeedBack</h2>
                </div>
            </div>
        </div>
         <br><br>

         <div id = "carouselControl" class="carousel slide pb-5" data-ride="carousel">
          <div class="carousel-inner">
              
              <?php    
                $sql = "SELECT s.stuRegName,s.stuRegOcc,s.stuRegImg,f.stu_feed FROM student AS s JOIN feedback as f
                ON s.stuRegEmail = f.stuRegEmail LIMIT 3";

                $result = $conn->query($sql);
                $num = $result->num_rows;
                if($num >0 ){
                 
                
              ?>
                    
                  <div class="carousel-item active">   <!-- slide 1-->          
                     
                      <div class="card-deck">

                       <?php while($row = $result->fetch_assoc()){   
                            
                            $img = str_replace('..','.',$row['stuRegImg']);
                         ?>
                       <div class="card border-primary mb-3" style="max-width: 18rem;">
                          <div class="card-header bg-transparent border-primary font-weight-bold ">FeedBack</div>
                          
                          <div class="card-body text-primary">
                      
                            <p class="card-text"><?php echo $row['stu_feed'] ?></p>
                          </div>
                          <div class="card-footer bg-transparent border-primary d-flex">
                              <div class="feedback-imgbx d-inline mt-3 bg-white"><img src="<?php echo $img; ?>" alt="" class="img-fluid" style="border-radius:50%; object-fit:cover;"></div>
                              <h3 class="feedback-name text-center" ><?php echo $row['stuRegName']; ?><br> <span><?php echo $row['stuRegOcc']; ?></span></h3>
                          </div>
                       </div>

                        <?php }}?>
                  </div>
                </div>    <!--slide 1 end-->



                <!--slide 2 start-->
               
                   
                
               
             
               
              
              
          
          </div>
          
          <a href="#carouselControl" class="carousel-control-prev" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>

          <a href="#carouselControl" class="carousel-control-next" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>  
      </div>


        
    </section>



    <!-- feedback section end -->

    <!-- footer start -->
    <?php 
      include('./footer.php') 
    ?>
    <!-- foooter end -->

    

