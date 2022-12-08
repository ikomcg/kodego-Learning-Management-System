<?php
include '../../database/server.php';

session_start();
$email =  $_SESSION['Email'];
$id =  $_SESSION['ID'];
if(isset($_POST['send_email']) ){

    $to_email = $_POST['send_email'];
    $messages = $_POST['messages'];

    $message = array();
    $credentialStatus = array();


    if(empty($to_email) || empty($messages) ){
            $message[] = 'Invalid';
            $message[] = 'Fill out All requirments';
            $message[] = 'error';
            $credentialStatus[] = false;
            
        
    }
    else{
       
        $sqlreg = "INSERT INTO message (account_ID , Email, Email_To, Message) VALUES ('$id','$email','$to_email','$messages')";
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