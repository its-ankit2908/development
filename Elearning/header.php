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
            <!-- search box -->
               <div class="form-inline wrapper">
                     <div class="search-input">
                        <input type="text" name="searchbox" id="searchbox" placeholder="Type to Search..." autocomplete="off">
                   <div class="autocom-box" style="z-index:100000;" >
                     <li>Finding purpose & meaning in life</li>
                     <li>Understanding medical Research</li>
                     <li>Japanese for Beginners</li>
                     <li>Machine Learning</li>
                     <li>AI for everyone</li>
                   </div>
                   <div class="icon"><i class="fa fa-search"></i></div>
         </div>
               </div>
            <!-- search box -->

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 pl-3" >
                <li class="nav-item" ><a  href="index.php" class="nav-link aknav mr-1" >Home</a></li>
                <li class="nav-item" ><a href="courses.php" class="nav-link aknav mr-1" >Courses</a></li>
                <li class="nav-item" ><a href="paymentstatus.php" class="nav-link aknav mr-1" >Payment Status</a></li>
                
                <?php 
                   if(isset($_SESSION['is_login']))
                   {
                        echo '<li class="nav-item" ><a href="student/studentProfile.php" class="nav-link aknav mr-1" >My Profile</a></li> 
                              <li class="nav-item" ><a  href="./logout.php" class="nav-link aknav mr-1" >Logout</a></li>';
                   }
                   else{
                      echo '
                      <li class="nav-item" ><a href="#" class="nav-link aknav mr-1" data-toggle="modal" data-target="#stuLogModal">Login</a></li>
                      <li class="nav-item" ><a href="#" class="nav-link aknav mr-1" data-toggle="modal" data-target="#stuRegModal" >Signup</a></li>';
                   }
                
                
                ?>
                <li class="nav-item" ><a href="#feedback" class="nav-link aknav mr-1" >Testimonials</a></li>
                <li class="nav-item" ><a href="#contact" class="nav-link aknav mr-1" >Contact</a></li>  
            
            <form  class="form-inline ml-3">
             <button id="offer-zone-btn" class="btn btn-outline-light" type="button">Offer Zone</button>
            </form>
            </ul>
         </div> 
       </nav>