<section class="container-fluid contact" id="contact" style="background: url(./media/coursebanner.jpg); background-size: cover;
     background-repeat: no-repeat;
     background-position: center;
     background-attachment: fixed;">
        <div class="row">
            <div class="col-sm-12">
                <div class="headingtxt">
                    <h2>Contact Us</h2>
                </div>
            </div>
        </div>
         <br><br>
 

        <div class="row">
            <div class="col-sm-6 mb-3">
                <div class="contactinfo shadow-lg">
                    
                    <div class="infobx">
                         <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                         <h3>27,keshav nagar,khandwa,450001</h3>
                    </div>

                    <div class="infobx">
                        <a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
                        <h3>9589634830</h3>
                   </div>

                   <div class="infobx">
                    <a href="#"><i class="fa fa-mail-reply" aria-hidden="true"></i></a>
                    <h3>27,keshav nagar,khandwa,450001</h3>
                    </div>

                </div>
            </div>

            <div class="col-sm-6 mb-3">

                <div class="contactform shadow-lg">
                    <form action=""  name="contact" id="contactForm" >
                      <div class="inputbx">
                            <label for="name">Name: </label>
                            <input type="text" name="contact_name" id="contact_name" autocomplete="off">
                        </div>
                    
                        <div class="inputbx">
                            <label for="subject">Subject: </label>
                            <input type="text" name="contact_subject" id="contact_subject" autocomplete="off">
                        </div>

                        <div class="inputbx">
                            <label for="email">E-mail: </label>
                            <input type="email" name="contact_email" id="contact_email" autocomplete="off">
                        </div>

                        <div class="inputbx">
                            <label for="message">Message: </label>
                            <textarea name="contact_msg" id="contact_msg"></textarea>
                        </div>

                        <div class="inputbx">
                           <button type="button" class="contact-btn" onclick ="addContact()" >Send</button>
                        </div>
                        <div class="w-100" id="contact-msg"></div>
                    </form>
                </div>
            </div>
        </div>

     </section>
   