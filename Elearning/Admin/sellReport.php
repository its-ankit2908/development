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
            
        <div class="col-sm-9 pt-3">
           <form action="" method="post" class="form-inline p-5 ">
              <div class="form-group">
              <label for="" class="text-white p-2" >Start Date:</label>
              <input type="date" name="start_date" id="start_date" class="form-control">
               
              </div>
              <div class="form-group mr-2">
              <label for="" class="text-white p-2">End Date:</label>
              <input type="date" name="end_date" id="end_date" class="form-control" >
              </div>
              <button type="submit" class="btn btn-primary" name="searchBtn" id="searchBtn" >Search</button>
           </form>

          <h2 class="course-heading pb-2">Sell Report</h2>

          <table class="table table-bordered bg-light mr-5">
            <thead class="bg-primary">
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Course ID</th>
                <th scope="col">Student Email</th>
                <th scope="col">Order Date</th>
                <th scope="col">Amount</th>
                
              </tr>
            </thead>
            <tbody>
            <?php 
              $start_date = $_POST['start_date'];
              $end_date = $_POST['end_date'];
             $sql = "SELECT * from courseorder WHERE order_date BETWEEN '$start_date' AND '$end_date'";
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

