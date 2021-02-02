function checkAdminLogin()
{   
    
    var adminLogEmail = $("#adminLogEmail").val();
    var adminLogPass = $("#adminLogPass").val();
    // console.log(adminLogEmail,adminLogPass);s
    $.ajax({
        url:"Admin/admin.php",
        method:"POST",
        data:{
            checkAdminEmail:"checkmail",
            adminLogEmail:adminLogEmail,
            adminLogPass: adminLogPass,
        },

        success: function(data){
            console.log(data);

            if(data == 0)
            {
                $("#adminStatus").html("<span class='alert alert-danger'>Invalid credintials!</span>");
            }
            else if(data == 1)
            {  
               $("#adminStatus").html("<div class='spinner-border text-success' role='status'></div>");
               setTimeout(()=>{
                  window.location.href = "Admin/adminDashBoard.php";
               },1000);
            }
        }
    })

}