

function addContact()
{
    const conName = $('#contact_name').val();
    const conSubject = $('#contact_subject').val();
    const conEmail = $('#contact_email').val();
    const conMsg = $('#contact_msg').val();
    
   $.ajax({
     
      url:"student/addContact.php",
      method:"POST",
      dataType:"json",
      data:{
          conName: conName,
          conSubject : conSubject,
          conEmail : conEmail,
          conMsg : conMsg,
      },

      success: function(data){
         
        


        if(data === "OK")
        {    
            $("#contact-msg").html("<div class='alert alert-success text-center '>Send Successfully</div>");
            $('#contactForm').trigger('reset');
            $('#contact-msg').fadeOut(5000);
        }
        else if(data == "Failed")
        {
            $("#contact-msg").html("<span class='alert alert-danger text-center'>Something went wrong</span>");
            $('#contact-msg').fadeOut(5000);
        } 
       
         console.log(data);

      },

      error: function(err){
          console.log("Error occured");
      },


   })

}