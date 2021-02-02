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
    <div class="container-fluid p-5" style="background:#000;" >
       <div class="row">
        <div class="col-sm-5 mx-2 " style="background:rgba(255,255,255,0.15); border-radius:15px;" >
          <div class="loginbx">
            <div class="log-heading p-1">
             <h3 class="text-white">Login</h3>
            </div>
            <div class="form-bx">
            <form action="">
                      
                      <div class="form-group text-white">
                        <i class="fa fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">E-mail</label>
                        <input type="email" class="form-control" placeholder="Name" name="stuLogEmail" id="stuLogEmail" required>
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group text-white">
                        <i class="fa fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
                        <input type="text" class="form-control" placeholder="Name" name="stuLogPass" id="stuLogPass" required>
                    </div>
                </form>        
                <span id="loginStatus" class="text-white" ></span>
                <button type="button" class="btn btn-primary" id="stuLogin-btn" onclick="checkUserLogin()" >Log-in</button>   
            </div>
          </div>
        </div>
        <div class="col-sm-6 p-3" style="background:rgba(255,255,255,0.15); border-radius:15px;">
            <div class="signupbx">
               <div class="log-heading p-1">
                <h3 class="text-white">Sign Up</h3>
               </div>
               <div class="form-bx"  >
                 <!-- student registration  form start -->
                            
                 <form action="" id="stuRegForm" >
                              <div class="form-group text-white">
                                  <i class="fa fa-user"></i><label for="stuRegName" class="pl-2 font-weight-bold">Name</label>
                                  <span id = "statusMsg1"></span>
                                  <input type="text" class="form-control" placeholder="Name" name="stuRegName" id="stuRegName" required>
                              </div>
                              <div class="form-group text-white">
                                <i class="fa fa-envelope"></i><label for="stuRegEmail" class="pl-2 font-weight-bold">E-mail</label>
                                <span id = "statusMsg2"></span>
                                <input type="email" class="form-control" placeholder="Name" name="stuRegEmail" id="stuRegEmail" required>
                                <small class="form-text">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group text-white">
                                <i class="fa fa-key"></i><label for="stuRegPass" class="pl-2 font-weight-bold">Password</label>
                                <span id = "statusMsg3"></span>
                                <input type="text" class="form-control" placeholder="Password" name="stuRegPass" id="stuRegPass" required>
                            </div>

                          </form>
                          <!-- student registration  form end -->
                 <span id = "successMsg" class="text-white"></span>
                <button type="button" class="btn btn-primary" id="stuReg-btn" onclick="addStu()">Sign up</button>   
                   
               </div>
            
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
  


 