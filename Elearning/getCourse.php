<?php 
  
  include_once('db_connection.php');

  $sql = "SELECT course_name from course";

  $result =  $conn->query($sql);
  
  
  $sData = array();
  
 
  if($result->num_rows >0 ){

     while($row = $result->fetch_assoc()){
         
        array_push( $sData,$row['course_name']);
        
    }
   }
    
    

echo json_encode($sData);



?>

