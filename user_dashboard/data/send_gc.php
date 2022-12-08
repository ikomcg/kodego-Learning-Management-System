<?php
include '../../database/server.php';

session_start();
$email =  $_SESSION['Email'];
$sqlemail = "SELECT * FROM account WHERE Email = '$email' ";
$result = $mysqli->query($sqlemail);
$resultEmail = $result->fetch_assoc();

$Lname = $resultEmail['Last_Name'];
$Fname = $resultEmail['First_Name'];
$courseCode = $resultEmail['Course_Code'];
$accID = $resultEmail['account_ID'];


if(isset($_POST['messages']) ){

    $messages = $_POST['messages'];
    $profile_img = $_SESSION['profile_img'];

    $message = array();
    $credentialStatus = array();


    if(empty($messages) ){
            $message[] = 'Invalid';
            $message[] = 'Fill out All requirments';
            $message[] = 'error';
            $credentialStatus[] = false;
            
        
    }
    else{
       
        $sqlreg = "INSERT INTO groupchat (account_ID ,Course_Code, Last_Name, First_Name, Group_Message) VALUES ('$accID','$courseCode','$Lname', '$Fname','$messages')";
        $_SESSION['message_txt'] = "Message";
        $_SESSION['message_info'] = "Message sent";
        $_SESSION['message_code'] = "success";    
            
        $credentialStatus[] = true;
        if($mysqli -> query($sqlreg)) {
            $mysqli->affected_rows;
          
        }
    }

        
      echo json_encode(array(
          'message' => $message,
          'credentialStatus' => $credentialStatus
          
      ));
      $mysqli -> close();
      
  }
?>