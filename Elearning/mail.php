<?php
// $to_email = "ap826690@gmail.com";
// $subject = "Simple Email Test via PHP";
// $body = "Hi, This is test email send by PHP Script";
// $headers = "From: sender email";

// if (mail($to_email, $subject, $body, $headers)) {
//     echo "Email successfully sent to $to_email...";
// } else {
//     echo "Email sending failed...";
// }


 $pass = "ankit";

 $new_pass = password_hash($pass,PASSWORD_BCRYPT);
 
 echo $new_pass;


  $aak = "arpan";

 $check = password_verify($aak,$new_pass);

  if($check)
  {
      echo "Login successfully";
  }else{
      echo "not liogin succefullt";
  }

?>


