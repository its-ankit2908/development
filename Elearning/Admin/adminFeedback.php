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
                 Student's FeedBack
               </h2>
             </div>
             <div class="tablebx">
              <?php                                 //php content
                  $sql = "SELECT * from feedback";
                  $result = $conn->query($sql);
                 if($result->num_rows > 0)
                 {              
              ?>
               <table class="table table-bordered">
                <thead class="bg-primary">
                  <tr>
                    <th scope="col">FeedBack ID</th>
                    <th scope="col">FeedBack Content</th>
                    <th scope="col">student Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="bg-white">
                <?php                              // php content 
                 
                  while($row = $result->fetch_assoc()) 
                  {
                  
                ?>
                    <tr>
                        <th scope="row"><?php echo $row['feedback_id']; ?></th>
                        <td><?php echo $row['stu_feed']; ?></td>
                        <td><?php echo $row['stuRegEmail']; ?></td>

                        <td>
                        <form action="" method="post" class="d-inline">  <!-- delete course -->
                        <input type="hidden" name="feedid" id="feedid" value="<?php echo $row['feedback_id']; ?>">
                        <button type="submit" name="deleteFeed" id="deleteFeed" class="btn btn-primary"><i class="fa fa-trash"></i></button> 
                        </form>
                        </td>
                    </tr>

                 <?php } ?>   
                </tbody>
              </table>
              <?php
               }else{ echo "<div class='alert alert-success'>No FeedBack Found</div>";}  // php content
              ?>   
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
  
  if(isset($_REQUEST['deleteFeed']))
  {
     $sql = "DELETE FROM feedback WHERE feedback_id ={$_REQUEST['feedid']}";
     if($conn->query($sql) == TRUE)
     {
       echo '<meta http-eqiv="refresh" content="0;URL=?deleted" />';
     }
  }

 


?>