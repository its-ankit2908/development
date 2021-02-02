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

    <title>Admin</title>
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
             <div class="course-heading">
               <h2>
                 Course List
               </h2>
             </div>
             <div class="tablebx">
              <?php                                 //php content
                  $sql = "SELECT * from course";
                  $result = $conn->query($sql);
                 if($result->num_rows > 0)
                 {              
              ?>
               <table class="table table-bordered">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col">Course ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                <?php                              // php content 
                 
                  while($row = $result->fetch_assoc()) 
                  {
                  
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['course_id']; ?></th>
                        <td><?php echo $row['course_name']; ?></td>
                        <td><?php echo $row['course_author']; ?></td>

                        <td>
                        <form action="editCourse.php" method="post" class="d-inline">  <!-- edit course -->
                          <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $row['course_id']; ?>">
                          <button type="submit" name="editCourse" id="editCourse" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                        </form>

                        <form action="" method="post" class="d-inline">  <!-- delete course -->
                        <input type="hidden" name="courseid" id="courseid" value="<?php echo $row['course_id']; ?>">
                        <button type="submit" name="deleteCourse" id="deleteCourse" class="btn btn-primary"><i class="fa fa-trash"></i></button> 
                        </form>
                        </td>
                    </tr>

                 <?php } ?>   
                </tbody>
              </table>
              <?php
               }else{ echo "<div class='alert alert-success'>No Courses Found</div>";}  // php content
              ?>   
             </div>
           </div>   
      </div>
      
      <div class="row">
        <div class="offset-sm-11 col-sm-3">
        
      <div class="add-course-btn" >
      <a href="./addCourses.php" class="btn btn-danger text-white" ><i class="fa fa-plus"></i></a>
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

<?php 
  
  if(isset($_REQUEST['deleteCourse']))
  {
     $sql = "DELETE FROM course WHERE course_id ={$_REQUEST['courseid']}";
     if($conn->query($sql) == TRUE)
     {
       echo '<meta http-eqiv="refresh" content="0;URL=?deleted" />';
     }
  }

 


?>