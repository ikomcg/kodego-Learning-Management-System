<?php
include 'server.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['last_name'])){

  $lastName = $_POST['last_name'];
  $firstName = $_POST['first_name'];
  $middleName = $_POST['middle_name'];
  $gender = $_POST['gender'];
  $BDay = $_POST['B-Day'];
  $email = $_POST['sign_Email'];
  $pass = $_POST['sign_Pass'];
  $Confirmpass = $_POST['confirm_Pass'];
  $userType = $_POST['user_Type'];

  $vkey = md5(time().$email);
  $verify = 'no';
  $status = 'offline';

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
    $response[]='This Account is AllReady Register Check Your Email';
    $response[] = 'info';
    $inserData[] =false;
  }
  else if(empty($email) || empty($pass) || empty($Confirmpass) || $userType == 'User type' || $gender == 'Gender' || empty( $lastName ) || empty($firstName) || empty($BDay)){
    $response[]='Invalid';
    $response[]='Fill out All Requirments  ';
    $response[] = 'error';
    $inserData[] =false;
  }
  else if($pass !== $Confirmpass){
    $response[]='Invalid';
    $response[]='Password not match ';
    $response[] = 'error';
    $inserData[] =false;
  }
  else if(strlen($pass) <= 8){
    $response[]='Invalid';
    $response[]="Your Password is to Short must be at least 8 chracters";
    $response[] = 'info';
    $inserData[] =false;
  } 
  
  else{  
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";
    $mail = new PHPMailer();
    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "elms00001@gmail.com";
    $mail->Password = 'equyblddldpztcjn';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";
        
    //email settings
    $mail->isHTML(true);
    $mail->setFrom("UranusPH");
    $mail->addAddress("$email");
    $mail->Subject = ("Verification Code");
    $mail->Body =("Hello kodego student Welcome to kodego School click the link to validate your account http://localhost/kodegoeLMS/database/verify.php?vkey=$vkey");

    if($mail->send()){

       $sqlreg = "INSERT INTO account (Last_Name, First_Name, Middle_Name, Gender, Birth_Day, Email, Password, profile_img, User_Type, Status, Verify, VerifyCode) 
            VALUES ('$lastName','$firstName','$middleName','$gender','$BDay','$email','$pass','account-icon.png','$userType','$status' ,'$verify','$vkey')";

        $response[]='Success';
        $response[]='We Send Verification to Email You Provide';
        $response[] = 'success';
        
        $inserData[] = true;

        if ($mysqli -> query($sqlreg)) {
            $mysqli->affected_rows;
        }
        
    }
    else{
      $response[]='Invalid';
      $response[]= $mail->ErrorInfo;
      $response[] = 'warning';
      $inserData[] = false;
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