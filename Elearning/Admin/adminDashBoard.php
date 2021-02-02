<?php  
 if(!isset($_SESSION['is_admin_login']))
  {
    session_start();
  }

  if(isset($_SESSION['is_admin_login']) )
   {
      $adminEmail = $_SESSION['adminLogEmail'];

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
              <li><a href="adminCourses.php"><i class="fa fa-book pr-2" aria-hidden="true"></i>Courses</a></li>
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
            <?php 
               $sql = "SELECT course_id from course";
               $result = $conn->query($sql);
               $num_course = $result->num_rows;
            
            ?>
        <div class="col-sm-9 pt-3">
          <div class="card-group p-3">
            <div class="card bg-light mr-3" style="max-width: 18rem">
              <div class="card-header text-center bg-primary">Courses</div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $num_course; ?></h5>
                <p class="card-text text-center"><a href="adminCourses.php">View</a></p>
              </div>
            </div>
            <?php 
               $sql = "SELECT stuRegid from student";
               $result = $conn->query($sql);
               $num_student = $result->num_rows;
            
            ?>
            <div class="card bg-light mr-3" style="max-width: 18rem">
              <div class="card-header text-center bg-primary">Students</div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $num_student; ?></h5>
                <p class="card-text text-center"><a href="students.php">View</a></p>
              </div>
            </div>
            <?php 
               $sql = "SELECT co_id from courseorder";
               $result = $conn->query($sql);
               $num_order = $result->num_rows;
            
            ?>
            <div class="card bg-light mr-3" style="max-width: 18rem">
              <div class="card-header text-center bg-primary">Sold</div>
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $num_order ?></h5>
                <p class="card-text text-center"><a href="#">View</a></p>
              </div>
            </div>
          </div>

          <h2 class="course-heading pb-2">Course Ordered</h2>

          <table class="table table-bordered bg-light mr-5">
            <thead class="bg-primary">
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Course ID</th>
                <th scope="col">Student Email</th>
                <th scope="col">Order Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
             $sql = "SELECT * from courseorder";
             $result = $conn->query($sql);
             if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                  ?>
               
                <tr>
                    <th scope="row"><?php echo $row['order_id']; ?></th>
                    <td><?php echo $row['course_id']; ?></td>
                    <td><?php echo $row['stu_email']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['amount']; ?></td>

                    <td><form action="" method="post" class="form-inline">
                     <input type="hidden" name="coid" id="coid" value="<?php echo $row['co_id']; ?>">
                    <button  type="submit" class="btn  btn-primary"></button>                        
                    </form>
                    </td>
                </tr>
                <?php  }
             }  
            ?>
            </tbody>
          </table>
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
  
  if(isset($_POST['coid'])){
    $sql ="DELETE FROM courseorder where co_id = {$_POST['coid']}";
    if($conn->query($sql) == TRUE)
     {
       echo '<meta http-equiv="refresh" content="0?deleted" />';
     }

  }


?>