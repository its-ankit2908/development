<?php
if(!isset($_SESSION['is_login']))
{
    session_start();
}

include_once('../db_connection.php');


//  check email already exists in student table
if(isset($_POST['checkemail']) && isset($_POST['stuRegEmail']))
{
    $stuRegEmail = $_POST['stuRegEmail'];
    
     
    $sql ="SELECT stuRegEmail From student WHERE stuRegEmail = '".$stuRegEmail."' ";

    

    // $result = $conn->query($sql);
    $result= $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
    
    
}










// code of inserting form data to table
if( isset($_POST['stuSignUp']) && isset($_POST['stuRegName']) && isset($_POST['stuRegEmail']) 
&& isset($_POST['stuRegPass'])  ){

$stuName = $_POST['stuRegName'];
$stuEmail = $_POST['stuRegEmail'];
$stuPass = $_POST['stuRegPass'];



$sql = "INSERT INTO student(stuRegName,stuRegEmail,stuRegPass) values('$stuName','$stuEmail','$stuPass')";

if($conn->query($sql) == TRUE){
    echo json_encode("OK");
}else{
    echo json_encode("Failed");
}


}


// verify that user exist in database
if(!isset($_SESSION['is_login']))
{
if(isset($_POST['checklogemail']) && isset($_POST['stuLogEmail']) && isset( $_POST['stuLogPass']) )
{
    $stuLogEmail = $_POST['stuLogEmail'];
    $stuLogPass = $_POST['stuLogPass'];

    $sql = "SELECT stuRegEmail,stuRegPass FROM student WHERE stuRegEmail = '".$stuLogEmail."' AND stuRegPass = '".$stuLogPass."'  ";
   
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row == 1)
    {  
        $_SESSION['is_login'] = true;
        $_SESSION['stuLogEmail'] = $stuLogEmail;
        echo json_encode($row);

    }
    else if($row == 0)
    {
        echo json_encode($row);
    }


}

}
?>
