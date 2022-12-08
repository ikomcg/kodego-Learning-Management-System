<?php 
include '../../database/server.php';
session_start();

if(isset($_POST['join_course'])){
    $response = array();        
    $inserData = array();

    $studentID =  $_SESSION['ID'];
    $input = $_POST['join_course'];
    $course_code = $mysqli->query("SELECT Course_Code  FROM account WHERE account_ID = '$studentID'");
   
    
    if($course_code->num_rows == true){
        if($input == 'BSIT003'){
            $update = "UPDATE account SET Course_Code = '$input' WHERE account_ID = '$studentID'";

            if($mysqli->query($update)==true){
                // $response[]= 'Course Code';
                // $response[] = "Course code valid";
                // $response[] = "success";
                $inserData[] = true;
            }
            
        }
        if(empty($input)){

                $response[]= 'Course Code';
                $response[] = "Enter course code";
                $response[] = "info";
                $inserData[] = false;
            
            
        }
        else {
            $response[]= 'Course Code';
            $response[] = "Invalid course code";
            $response[] = "warning";
            $inserData[] = false;
        }
        
      
    }
    $mysqli -> close();
    echo json_encode( array (
      'message' => $response,
      'dataStatus' => $inserData    
    ));
}

?>
