<?php
   if(!isset($_SESSION['is_login']))
   {
       session_start();
   }
?>


<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark wow animated fadeUp">
        <a href="./index.html" class="navbar-brand logo"> iSchool <span>Learn and Implement</span></a>

           <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#akmymenu">
              <span class="navbar-toggler-icon"></span>
           </button>

          <div class="collapse navbar-collapse" id="akmymenu">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 pl-5" >
                <li class="nav-item" ><a  href="index.php" class="nav-link aknav mr-3" >Home</a></li>
                <li class="nav-item" ><a href="courses.php" class="nav-link aknav mr-3" >Courses</a></li>
                <li class="nav-item" ><a href="paymentstatus.php" class="nav-link aknav mr-3" >Payment Status</a></li>
                
                <?php 
                   if(isset($_SESSION['is_login']))
                   {
                        echo '<li class="nav-item" ><a href="student/studentProfile.php" class="nav-link aknav mr-3" >My Profile</a></li> 
                              <li class="nav-item" ><a  href="./logout.php" class="nav-link aknav mr-3" >Logout</a></li>';
                   }
                   else{
                      echo '
                      <li class="nav-item" ><a href="#" class="nav-link aknav mr-3" data-toggle="modal" data-target="#stuLogModal">Login</a></li>
                      <li class="nav-item" ><a href="#" class="nav-link aknav mr-3" data-toggle="modal" data-target="#stuRegModal" >Signup</a></li>';
                   }
                
                
                ?>
                <li class="nav-item" ><a href="#" class="nav-link aknav mr-3" >Feedback</a></li>
                <li class="nav-item" ><a href="#" class="nav-link aknav mr-3" >Contact</a></li>  
            
            <form  class="form-inline ml-5">
             <button class="btn btn-outline-light" type="button">Offer Zone</button>
            </form>
            </ul>
         </div> 
       </nav>