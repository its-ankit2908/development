
// check the email already exists in student table
$(document).ready(function(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    
    $("#stuRegEmail").on("keypress blur",function () {
       var stuRegEmail = $("#stuRegEmail").val(); 
        $.ajax({
              url:"student/addStudent.php",
              method:"POST",
              data:{
                  checkemail:"checkmail",
                  stuRegEmail:stuRegEmail,
              },
              success: function(data){
                 // console.log(typeof(data));
                //   var res = parseInt(data);
                 console.log(data);
                                
                if(data != 0 )
                {
                    $("#statusMsg2").html('<small style="color:red;">Email you entered already exists </small>');
                    $("#stuReg-btn").attr('disabled',true);
                }
                else if(!reg.test(stuRegEmail))
                { 
                    $("#statusMsg2").html('<small style="color:red;">Enter Valid email address</small>');
                   
                }
                else if(data == 0  && reg.test(stuRegEmail))
                {
                    $("#statusMsg2").html('<small style="color:green;">There you go</small>');
                    $("#stuReg-btn").attr('disabled',false);
                }
              },


        });
      });
});





// inserting data from registration form to student table
function addStu(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuRegName = $('#stuRegName').val();
    var stuRegEmail = $('#stuRegEmail').val(); 
    var stuRegPass = $('#stuRegPass').val(); 

    //checking form fields on form submission
    if(stuRegName.trim() == ""){
        $("#statusMsg1").html('<small style="color:red;">Please Enter Name!</small>');
        $("#stuRegName").focus();
        return false;
    }
    else if(stuRegEmail.trim() == "")
    {

        $("#statusMsg2").html('<small style="color:red;">Please Enter Email e.g. abc@mail.com!</small>');
        $("#stuRegEmail").focus();
        return false;
    }
    else if(stuRegEmail != "" && !reg.test(stuRegEmail)){

        $("#statusMsg2").html('<small style="color:red;">Please Enter Valid Email e.g. abc@mail.com</small>');
        $("#stuRegEmail").focus();
        return false;
             
    }
    else if(stuRegPass.trim() == "")
    {

        $("#statusMsg3").html('<small style="color:red;">Please Enter Password!</small>');
        $("#stuRegPass").focus();
        return false;
    }
    else
    {

    
     $.ajax({
        url:"student/addStudent.php",
        method:"POST",
        dataType:"json",
        data:{
               stuSignUp: "stuSignUp",
               stuRegName: stuRegName,
               stuRegEmail: stuRegEmail,
               stuRegPass: stuRegPass,
             },
        
        success: function(data){
            console.log(data);
            if(data == "OK")
            {    
                $("#successMsg").html("<span class='alert-success'>Hurrah! Registered Successfully</span>");
                clearFormContent();
            }
            else if(data == "Failed")
            {
                $("#successMsg").html("<span class='alert-danger'>Alas! Not Registered Successfully</span>");

            }
            
        },

     });

    }

}

// reset the form content
function clearFormContent()
{
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
    $("#successMsg").fadeOut(5000);
}




//login form verification 

function checkUserLogin()
{
    var stuLogEmail = $("#stuLogEmail").val();
    var stuLogPass = $("#stuLogPass").val();

    $.ajax({
        url:"student/addStudent.php",
        method:"POST",
        data:{
            checklogemail:"checkmail",
            stuLogEmail:stuLogEmail,
            stuLogPass: stuLogPass,
        },

        success: function(data){
            console.log(data);

            if(data == 0)
            {
                $("#loginStatus").html("<span class='alert alert-danger'>Invalid credintials!</span>");
            }
            else if(data == 1)
            {  
               $("#loginStatus").html("<div class='spinner-border text-success' role='status'></div>");
               setTimeout(()=>{
                  window.location.href = "index.php";
               },1000);
            }
        }
    })

}




// for contact submission 


function addContact(){

console.log("contact clicked");

}