<?php   
 include_once('./db_connection.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/course.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Courses</title>
</head>
<body>
     <!-- navbar start   -->
     <?php 
       include('./header.php')
     ?> 
      <!-- navbar end -->
     
     <!-- banner start  -->
     <div class="container-fluid course-banner">
      
     </div>
     <!-- banner end -->
     
     <!-- Courses start -->
      
     <section id="course" style="background: #000;">
          <div class="container">
            
            <div class="row">
                  <div class="col-sm-12">
                      <div class="headingtxt">
                          <h2>Our Courses</h2>
                      </div>
                  </div>
              </div>
               <br><br>
              
               <div class="row p-5">    <!-- Card Deck 2 start-->
                 <?php    
                   $sql = "SELECT * from course";
                   $result = $conn->query($sql);
                   if($result->num_rows >0 ){

                   
                      while($row = $result->fetch_assoc()){
                          

                      $course_id = $row['course_id']; 
                      $img = str_replace('..','.',$row['course_img'])  ;
                   
                 ?>  
                 <div class="col-sm-4 mb-3">
                    <div class="card" style="max-width:18rem;"  >   <!-- card -->
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
                      </div>           <!-- card -->
                  </div>

                    <?php }}?>
                </div>    <!-- card deck 2 end -->    
               
          </div>
        <br>
      </section>

     <!-- courses start -->

     <!-- footer start -->
      <?php 
        
        include('./footer.php');
      
      ?>


     <!-- footer end -->
     

  
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/style.js"></script>
    <script src="./js/ajaxRequest.js"></script>
</body>
</html>