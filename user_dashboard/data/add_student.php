<?php
include "../../database/server.php";
session_start();
$user_type = $_SESSION['user_type'];

if(isset($_POST['lastname'])){

  $lastName = $_POST['lastname'];
  $firstName = $_POST['firstname'];
  $middleName = $_POST['middlename'];
  $BDay = $_POST['BDay'];
  $email = $_POST['signEmail'];
  $pass = $_POST['signPass'];
  $yearSection = $_POST['year_section'];
  $course_code = $_POST['course_code'];


  $response = array();        
  $inserData = array();

    //Account Verify YES
  $sqlStudent = "SELECT Email FROM account WHERE  Email ='$email' and Verify = 'yes'";
  $resultStudent = $mysqli->query($sqlStudent);

  // $sqlTeacher = "SELECT Email FROM teacher_acc WHERE  Email ='$email' and Verify = 'yes'";
  // $resultTeacher = $mysqli->query($sqlTeacher);

    //Account Verify is no
  $sqlStudentN = "SELECT Email FROM account WHERE  Email = '$email' and Verify = 'no'";
  $stdno = $mysqli->query($sqlStudentN);

  // $sqlTeacherN = "SELECT Email FROM teacher_acc WHERE  Email ='$email' and Verify = 'no'";
  // $tchno = $mysqli->query($sqlTeacherN);


  if($resultStudent->num_rows == TRUE ){
    $response[]='Invalid';
    $response[]='This Account is AllReady Register';
    $response[] = 'info';
    $inserData[] = false;
  }
  else if($stdno->num_rows == TRUE  ){
    $response[]='Invalid';
    $response[]='This Account is AllReady Register';
    $response[] = 'info';
    $inserData[] =false;
  }
  else if(empty($email) || empty($pass)  || empty( $lastName ) || empty($firstName) || empty($BDay) || empty($yearSection) || empty($course_code)){
    $response[]='Invalid';
    $response[]='Fill out All Requirments ';
    $response[] = 'error';
    $inserData[] =false;
  }
  else if(strlen($pass) <= 8){
    $response[]='Invalid';
    $response[]="Your Password is to Short must be at least 8 chracters";
    $response[] = 'info';
    $inserData[] = false;
  } 
  
  else{  
       $sqlreg = "INSERT INTO account (Last_Name, First_Name, Middle_Name, Birth_Day, Email, Password, Course_Code, Year_Section, profile_img, User_Type, Status, Verify, VerifyCode) 
            VALUES ('$lastName','$firstName','$middleName','$BDay','$email','$pass','$course_code','$yearSection','account-icon.png','Student','Offline' ,'yes','added by $user_type')";
    
        $response[]='Success';
        $response[]='Account added';
        $response[] = 'success';
        $inserData[] = true;

        if ($mysqli -> query($sqlreg)) {
            $mysqli->affected_rows;
                

    }
    $sqlID = "SELECT account_ID FROM account WHERE User_Type='Student' ORDER BY account_ID DESC Limit 1";
    $resultI = $mysqli->query($sqlID);
    $resultID = $resultI->fetch_assoc();

    $stud_ID = $resultID['account_ID'];

    $sqlper = "INSERT INTO parents (account_ID, Mother_Name, Mother_Phone, Mother_Occupation, Father_Name, Father_Phone, Father_Occupation) 
    VALUES ('$stud_ID','','','','','','')";

     if ($mysqli -> query($sqlper)) {
          $mysqli->affected_rows;
    }
    
  }
  echo json_encode( array (
      'message' => $response,
      'dataStatus' => $inserData    
    ));
}
    $mysqli -> close();
?>