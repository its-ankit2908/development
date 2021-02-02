

<!-- footer section start -->
<footer id="footer" class="container-fluid">
        
        <div class="row banner-bottom-content bg-danger" >
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-facebook mr-3" aria-hidden="true"></i>Facebook</h5>
            </div>
        
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-twitter mr-3" aria-hidden="true"></i>Twitter</h5>
            </div>
    
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-whatsapp mr-3" aria-hidden="true"></i>Whatsapp</h5>
            </div>
        
            <div class="col-sm-3 banner-bottom-content-tab">
                <h5 class="text-white"><i class="fa fa-instagram mr-3" aria-hidden="true"></i>Instagram</h5>
            </div>
        </div>

     <div class="row footer-section">
            
        <div class="col-sm">
             <div class="footer-content">
                 <h2>About Us</h2>
                 <p>iSchool provides universal access to the world's best education,partnering with top universities
                     and organisations to offer courses.
                 </p>
             </div>
        </div>
        <div class="col-sm">
            <div class="footer-content">
                <h2>Category</h2>
                <a href="#">Web Development</a>
                <a href="#">Web Designing</a>
                <a href="#">Andriod Dev</a>
                <a href="#">iOS Development</a>
                <a href="#">Data Analysis</a>
            </div>
       </div>
       <div class="col-sm">
            <div class="footer-content">
                <h2>Contact Us</h2>
                <p>iSchool pvt. ltd.<br>
                    Near Police Camp,jabalpur<br>
                    ph.1234567890
                </p>
            </div>
        </div>
     </div>

     <div class="row copyright-section p-3">
         <div class="col-sm-12 d-flex" style="justify-content: center;">
            <small class="text-white">Copyright &copy; 2019 || Designed By E-Learning || <a href="#admin" data-toggle="modal" data-target="#adminLogModal" class="text-white" id="adminLog-btn">Admin Login</a></small>
         </div>
     </div>


    </footer>
   <!-- footer section end -->

    <!-- Student registration popup start -->
        
    <div class="modal fade " id="stuRegModal" tabindex="-1" role="dialog" aria-labelledby="stuRegModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stuRegModalLabel">Registration Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                          <!-- student registration  form start -->
                            
                          <form action="" id="stuRegForm">
                              <div class="form-group">
                                  <i class="fa fa-user"></i><label for="stuRegName" class="pl-2 font-weight-bold">Name</label>
                                  <span id = "statusMsg1"></span>
                                  <input type="text" class="form-control" placeholder="Name" name="stuRegName" id="stuRegName" required>
                              </div>
                              <div class="form-group">
                                <i class="fa fa-envelope"></i><label for="stuRegEmail" class="pl-2 font-weight-bold">E-mail</label>
                                <span id = "statusMsg2"></span>
                                <input type="email" class="form-control" placeholder="Name" name="stuRegEmail" id="stuRegEmail" required>
                                <small class="form-text">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <i class="fa fa-key"></i><label for="stuRegPass" class="pl-2 font-weight-bold">Password</label>
                                <span id = "statusMsg3"></span>
                                <input type="text" class="form-control" placeholder="Password" name="stuRegPass" id="stuRegPass" required>
                            </div>
                          </form>
                          <!-- student registration  form end -->


                    </div>
                    <div class="modal-footer">
                     <span id = "successMsg"></span>
                     <button type="button" class="btn btn-primary" id="stuReg-btn" onclick="addStu()">Sign up</button>   
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>    
    <!-- Student registration popup end -->


  <!-- Student Login popup start -->
        
  <div class="modal fade " id="stuLogModal" tabindex="-1" role="dialog" aria-labelledby="stuLogModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuLogModalLabel">Student Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                  <!-- student Login  form start -->
                    
                  <form action="">
                      
                      <div class="form-group">
                        <i class="fa fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">E-mail</label>
                        <input type="email" class="form-control" placeholder="Name" name="stuLogEmail" id="stuLogEmail" required>
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
                        <input type="text" class="form-control" placeholder="Name" name="stuLogPass" id="stuLogPass" required>
                    </div>
                  </form>
                  <!-- student Login  form end -->


            </div>
            <div class="modal-footer">
            <span id="loginStatus"></span>
             <button type="button" class="btn btn-primary" id="stuLogin-btn" onclick="checkUserLogin()" >Log-in</button>   
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>    
<!-- Student Login popup end -->


<!-- Admin Login popup start -->
        
<div class="modal fade " id="adminLogModal" tabindex="-1" role="dialog" aria-labelledby="adminLogModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminLogModalLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                  <!-- Admin Login  form start -->
                    
                  <form action="">
                      
                      <div class="form-group">
                        <i class="fa fa-envelope"></i><label for="adminLogEmail" class="pl-2 font-weight-bold">E-mail</label>
                        <input type="email" class="form-control" placeholder="Name" name="adminLogEmail" id="adminLogEmail">
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-key"></i><label for="adminLogPass" class="pl-2 font-weight-bold">Password</label>
                        <input type="text" class="form-control" placeholder="Password" name="adminLogPass" id="adminLogPass">
                    </div>
                  </form>
                  <!-- Admin Login  form end -->


            </div>
            <div class="modal-footer">
              <span id="#adminStatus"></span>
             <button type="button" class="btn btn-primary" id="adminLogin-btn" onclick="checkAdminLogin()" >Log-in</button>   
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>    
<!-- Admin Login popup end -->




  

<script src="./js/jquery.js"></script>
 <script src="./js/bootstrap.min.js"></script>
 <script src="./js/style.js"></script>
 <script src="./js/ajaxRequest.js"></script>
 <script src="./js/adminAjaxRequest.js"></script>


</body>
</html>