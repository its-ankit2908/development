<?php   

  // if(!isset($_SESSION['is_login']) || !isset($_SESSION['user_email_address'])   )
  // {
  //     session_start();
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" 
    integrity="sha512-9my9Mb2+0YO+I4PUCSwUYO7sEK21Y0STBAiFEYoWtd2VzLEZZ4QARDrZ30hdM1GlioHJ8o8cWQiy8IAb1hy/Hg==" crossorigin="anonymous" />
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>E-Learning</title>
    <style>
       .contact:before
       {
         position:absolute;
         width:100%;
         height:100%;
         background: linear-gradient(rgba(0,0,0,0.15),#fff);          
        }

        
#offer-zone-btn
{
    animation: offer 2s ease-in-out infinite;
    opacity: 0 !important;
    color:#fff;
    background:none;
    
}

#offer-zone-btn:hover 
{
   background:#fff;
   color:#000;
   animation:none;
   opacity: 1 !important;
  }

@keyframes offer
{
    0,100%
    {
        opacity: 0;
    }
    50%
    {
        opacity: 1;
    }

}


      
    </style>
</head>
<body>

    <!-- navbar start -->
      <?php  
          include('header.php');
      ?>

    <!-- navbar end -->

    <!-- google auth login  -->
     






    <!-- banner start -->
     <div class="container-fluid banner">
           
        <video class="banner-video" src="./media/Pexels Videos 1580507.mp4 " autoplay muted loop></video>
        <div class="overlay"></div>

        <div class="banner-content" >
            <h2 class="text-layers">Welocome To iSchool</h2>
            <h3 class="text-layers">Learn And Explore Yourself</h3>
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
     
     <div class="container-fluid about-page">
       
       <div class="container">
             <div class="row">
                  <div class="col-sm-12">
                      <div class="headingtxt">
                          <h2 style="color:#000; text-shadow:10px 10px 35px rgba(0,0,0,0.15); letter-spacing:4px;  " >Popular Courses</h2>
                      </div>
                  </div>
              </div>
               <br><br>

             <div class="row mb-5">
               
               <div class="col-md-6 col-sm-12 mb-sm-3 d-flex align-items-center">
                   <div class="about-content">
                      <p  style="font-size:1.2rem;" class="text-black-50">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum totam vel vero ipsa 
                      maiores ex repellendus voluptatem alias ea aspernatur, quidem ipsum cupiditate doloribus 
                      reiciendis illo odit consequatur nobis, laudantium saepe hic! Harum atque voluptas vel 
                      blanditiis exercitationem molestiae deleniti autem possimus nobis? Mollitia accusamus 
                      ea voluptatibus libero vitae possimus?</p>
                   
                   </div>
                  
               </div>
               <div class="col-md-6 col-sm-12 mb-sm-3 shadow-lg m-0 p-0">
                   
                      <img src="./media/online-1.jpg" alt="" class="img-fluid">
                   
                  
               </div>
             
             
             
             </div>  
       </div>
     
     </div>


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

      <section id="course" class="pb-5" style="background: rgb(236, 231, 231)" >
          <div class="container">
            
            <div class="row">
                  <div class="col-sm-12">
                      <div class="headingtxt">
                          <h2 style="color:#000; text-shadow:10px 10px 35px rgba(0,0,0,0.15); letter-spacing:4px;  " >Popular Courses</h2>
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
                    <div class="card mb-3 shadow-lg" style="max-width:18rem;"  >   <!-- card -->
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
                    <div class="card mb-3 shadow-lg" style="max-width:18rem;"  >   <!-- card -->
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
      
    <section class="feedback-sec" id = "feedback" >
        <div class="swiper-container">
            <div class="swiper-wrapper">
              
            <?php    
                $sql = "SELECT s.stuRegName,s.stuRegOcc,s.stuRegImg,f.stu_feed FROM student AS s JOIN feedback as f
                ON s.stuRegEmail = f.stuRegEmail LIMIT 3";

                $result = $conn->query($sql);
                $num = $result->num_rows;
                if($num >0 ){
                 
                
              ?>
                       <?php while($row = $result->fetch_assoc()){   
                            
                            $img = str_replace('..','.',$row['stuRegImg']);
                         ?>


            <div class="swiper-slide" style="max-width: 18rem;">  <!--slide start-->
                    <div class="testimonialBox">
                        <i class="fa fa-quote-right quote" aria-hidden="true"></i>
                        <div class="content">
                            <p><?php echo $row['stu_feed'] ?></p>
                            </div>
                        <div class="details">
                            <div class="imgbx">
                              <img src="<?php echo $img; ?>" alt="feed_img">
                            </div>
                            <h3><?php echo $row['stuRegName']; ?><br><span><?php echo $row['stuRegOcc']; ?></span></h3>
                        </div>
                    </div>
              </div>  <!--slide end-->
             
             <?php }} ?> 
              
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
          </div>
    </section>
    
    

    <!-- feedback section end -->

    <!-- footer start -->
    <?php 
      include('./footer.php') 
    ?>
    <!-- foooter end -->

    

