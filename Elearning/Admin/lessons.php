<?php 
  
 if(!isset($_SESSION['is_admin_login']))
 {
   session_start();
 }
 
 include_once('../db_connection.php');

 if(isset($_SESSION['is_admin_login']) )
  {
     $adminEmail = $_SESSION['adminLogEmail'];

  }
  else{
    echo "<script> location.href ='../index.php'; </script>"; 
  }


$sql = "SELECT course_id FROM course";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
    if(isset($_REQUEST['check_id']) && $_REQUEST['check_id'] == $row['course_id'] )
    {   
        $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['check_id']} ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($row['course_id'] == $_REQUEST['check_id']){
        $_SESSION['courseId'] = $row['course_id'];
        $_SESSION['courseName'] = $row['course_name'];
        }
    }
}

// if(isset($_SESSION['courseId'])){
//     echo '<script> alert("hello");  </script>';
// }

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

    <title>Lessons</title>
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
              <i class="fa fa-tachometer pr-2" aria-hidden="true"></i> Dashboard
            </h3>
            <ul class="admin-menu">
              <li><a href="addCourses.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Courses</a></li>
              <li><a href="lessons.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Lessons</a></li>
              <li>
                <a href="students.php"><i class="fa fa-graduation-cap pr-2" aria-hidden="true"></i>Students</a>
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
           <div class="col-sm-9 pt-5 pr-2">
              <form action=""  method="POST" class="mt-3 form-inline d-print-none">
                <div class="form-group">
                     <label for="checkid" class="text-white" >Enter Course Id:</label>
                     <input type="text" name="check_id" id="check_id" class="form-control ml-3">
                </div>
                <button type="submit" class="btn btn-danger ml-3" id="checkBtn" names="checkBtn">Search</button>
              </form>
             
             
             <!-- heading of course  -->
                 <div class="col-sm-12 mt-5">
                  <h3 class="text-center text-white bg-primary p-2 mr-2">Course ID: <?php if(isset($_SESSION['courseId'])){ echo $_SESSION['courseId']; } ?>
                   Course Name: <?php if(isset($_SESSION['courseName'])){ echo $_SESSION['courseName']; } ?></h3>
                </div>
            <?php if(isset($_POST['check_id'])){ ?>

             <!-- lesson table start    -->
             <div class="tablebx">
              <?php                                 //php content
                  $sql = "SELECT * from lesson WHERE course_id = {$_SESSION['courseId']} ";
                  $result = $conn->query($sql);
                 if($result->num_rows > 0)
                 {              
              ?>
               <table class="table table-bordered">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col">Lesson Id</th>
                    <th scope="col">Lesson Name</th>
                    <th scope="col">Lesson link</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                <?php                              // php content 
                 
                  while($row = $result->fetch_assoc()) 
                  {
                  
                ?>
                    <tr>
                        <th scope="row"><?php if(isset($row['lesson_id'])){ echo $row['lesson_id']; }?></th>
                        <td><?php if(isset($row['lesson_name'])){ echo $row['lesson_name'];} ?></td>
                        <td><?php if(isset($row['lesson_link'])){ echo $row['lesson_link'];} ?></td>

                        <td>
                        <form action="../Admin/editLesson.php" method="post" class="d-inline">  <!-- edit course -->
                          <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['lesson_id']; ?>">
                          <button type="submit" name="editLesson" id="editLesson" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                        </form>

                        <form action="" method="post" class="d-inline">  <!-- delete course -->
                        <input type="hidden" name="lessonid" id="lessonid" value="<?php echo $row['lesson_id']; ?>">
                        <button type="submit" name="deleteLesson" id="deleteLesson" class="btn btn-primary"><i class="fa fa-trash"></i></button> 
                        </form>
                        </td>
                    </tr>

                 <?php } ?>   
                </tbody>
              </table>
              <?php
               }else{ echo "<div class='alert alert-success mr-3 text-center'>No Lessons Found</div>";}  // php content
              ?>   
             </div>
            <?php }?>
             <!-- lesson table end    -->


        </div>   
      </div>
      <?php 
      
      if(isset($_SESSION['courseId'])){
          echo '<div class="add-course-btn">
          <a href="./addLessons.php" class="btn text-white" ><i class="fa fa-plus"></i></a>
        </div>';
     }   
     ?>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminStyle.js"></script>
    <script src="../js/ajaxRequest.js"></script>
    <script src="../js/adminAjaxRequest.js"></script>
  </body>
</html>

<?php 
  
  if(isset($_REQUEST['deleteLesson']))
  {
     $sql = "DELETE FROM lesson WHERE lesson_id ={$_REQUEST['lessonid']}";
     if($conn->query($sql) == TRUE)
     {
       echo '<meta http-eqiv="refresh" content="0;URL=?deleted" />';
     }
  }

 


?>