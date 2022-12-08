<?php
 include 'server.php';
 session_start();
 $_SESSION["Account"] = "invalid";
 
 if( $_SESSION["Account"] == "invalid" || empty($_SESSION["Account"]) ){
    $_SESSION["Account"] = "invalid";
   
 }

 if( $_SESSION["Account"] == "valid"){
  echo ' <script>window.location.href = "http://localhost/eLMS/user_dashboard/room.php"</script>';
 
}

  if(isset($_POST['sign_Email'])){

    $email = $mysqli ->real_escape_string($_POST['sign_Email']);
    $pass = $mysqli -> real_escape_string($_POST['sign_Pass']);

    //Account 
    $sqlAcc = "SELECT * FROM account WHERE  Email ='$email' AND Password = '$pass' AND Verify = 'yes'";
    $result = $mysqli->query($sqlAcc);

    //Account Verify is no
    $sqlUser = "SELECT Email FROM account WHERE  Email = '$email' and Verify = 'no'";
    $resultUser = $mysqli->query($sqlUser);
    
    //student
    $sqlEmail = "SELECT * FROM account WHERE  Email ='$email' AND Password = '$pass'";
    $resultE = $mysqli->query($sqlEmail);

    $resultEmail = $resultE->fetch_assoc();

  

    $response = array();        
    $inserData = array();
  
      if($result->num_rows ==  true ){
        //update online user
        $update = "UPDATE account SET Status = 'Online' WHERE  Email ='$email' AND Password = '$pass'";
        $mysqli->query($update);
        
        $_SESSION['Account'] = "valid";

        $_SESSION['ID'] = $resultEmail['account_ID'];
        $_SESSION['Email'] = $resultEmail['Email'];
        $_SESSION['profile_img'] = $resultEmail['profile_img'];
        $_SESSION['Course_code'] = $resultEmail['Course_Code'];
        $_SESSION['user_type'] = $resultEmail['User_Type'];
        $inserData[] = true;
       
        
      }
      else if($resultUser-> num_rows == TRUE  ){
        $response[]='Invalid';
        $response[]='This email is not verify';
        $response[] = 'info';
        $inserData[] =false;
    }
      else if(empty($email) || empty($pass) ){
        $_SESSION["Account"] = "invalid";
        $response[]='Invalid';
        $response[]='Enter all requirements';
        $response[] = 'warning';
        $inserData[] = false;
      }
      else{
        $_SESSION["Account"] = "invalid";
        $response[]='Invalid';
        $response[]='Account is not register or Email and Password is wrong';
        $response[] = 'info';
        $inserData[] = false;
        
      
     
      }
    
      $mysqli -> close();
      echo json_encode( array (
        'message' => $response,
        'dataStatus' => $inserData    
      ));
  }
?>