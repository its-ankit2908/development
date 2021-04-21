

<?php 
include_once('../db_connection.php');
?>

<?php 
   
   $conName = $_REQUEST['conName'];
   $conSubject = $_REQUEST['conSubject'];
   $conEmail = $_REQUEST['conEmail'];
   $conMsg  = $_REQUEST['conMsg'];


   $sql = "INSERT into contact(contact_name,contact_email,contact_sub,contact_msg) values('$conName','$conEmail','$conSubject','$conMsg')";

   if($conn->query($sql) == TRUE){
    
    $to_email = $conEmail;
    $subject = "E-Learning";
    $body = "Your Query will resolve soon";
    $headers = "From: sender email";
    

    mail($to_email, $subject, $body, $headers);
    


    echo json_encode("OK");
}else{
    echo json_encode("Failed");
}

?>