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

 <!-- course details  section start -->
   <div class="container-fluid course-detail-section">
        <?php 
          if(isset($_POST['courseId']))
          {
            $_SESSION['course_id'] = $_POST['courseId'];
           $sql ="SELECT * FROM course where course_id = {$_POST['courseId']}";
           $result = $conn->query($sql);
           $row = $result->fetch_assoc();
           $img = str_replace('..','.',$row['course_img'])  ;
           
          }
        ?>
       <div class="container" style="padding:40px;">
           <div class="row">
               <div class="col-sm-4">
                <div class="course-details-imgbx img-thumbnail">
                    <img src="<?php echo $img;?>" alt="phpimage" style="width:100%; height:100%; object-fit:cover">
                </div>
               </div>
               <div class="col-sm-8">
                   <div class="card">
                       <div class="card-body">
                           <div class="card-title">Course Name:<?php echo $row['course_name'];?></div>
                           <p class="card-text">Description:<?php echo $row['course_desc'];?></p>
                           <p class="car-text">Duration:<?php echo $row['course_duration'];?></p>
                           <form action="./checkOut.php" method="post">
                               <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_price'];?></del></small>
                               <span class="font-weight-bolder">&#8377 <?php echo $row['course_original_price'];?></span></p>
                               <input type="hidden" name="checkId" id="checkId" value="<?php echo $row['course_price'];  ?>">
                               <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right">Buy Now</button>
                           </form>

                       </div>
                   </div>
               </div>
           </div>
           <?php 
           
           $sql = "SELECT * from lesson WHERE course_id = {$_POST['courseId']}";
           $result = $conn->query($sql);
           
           ?>

           <div class="row course-detail-table">  <!--Lesson table -->
                  <div class="col-sm">
                       <table class="table table-hover  table-bordered">
                         <thead class="bg-dark text-white">
                             <tr>
                                 <th scope="col" >Lesson No.</th>
                                 <th scope = "col">Lesson Name</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php  
                                if($result->num_rows >0 ){  $count=0;
                                    while($row = $result->fetch_assoc())
                                    {   $count++;
                             ?>
                             <tr>
                                 <th scope="row"><?php echo $count; ?></th>
                                 <td><?php echo $row['lesson_name'];?></td>
                             </tr>
                             <?php 
                                   }
                                   } ?>
                         </tbody>

                       </table>
                                                         
                  </div>
            </div>

       </div>



   </div>
   


 <!-- course details section end -->




     <!-- footer start -->
     <?php 
        
     include('./footer.php');
   
   ?>


  <!-- footer end -->
  


 