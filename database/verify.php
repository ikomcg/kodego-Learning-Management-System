<?php 
include 'server.php';
session_start();
$_SESSION['_status'] = 'no';
if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];

    $verify = $mysqli->query("SELECT Email  FROM account WHERE Verify='no' AND VerifyCode='$vkey'");

    $verifyYes = $mysqli->query("SELECT Email  FROM account WHERE Verify='yes' AND VerifyCode='$vkey'");
    // $verifyUser = $mysqli->query("SELECT UserName FROM logreg WHERE VerifyCode='$vkey'");
    // $uname = $verifyUser->fetch_assoc(); 
   
    if($verify->num_rows == true){
        $update = "UPDATE account SET Verify = 'yes' WHERE VerifyCode = '$vkey' LIMIT 1";
        if($mysqli->query($update)==true){
            $_SESSION['_status'] = 'yes';
            $_SESSION['status_text'] = 'Verify';
            $_SESSION['status_info'] = "Email verify successful";
            $_SESSION['status_code'] = "success";
           
         
        }
      
    }
    else if($verifyYes->num_rows == true){
        $_SESSION['_status'] = 'no';
        $_SESSION['status_text'] = "Verify";
        $_SESSION['status_info'] = "This Email is verify";
        $_SESSION['status_code'] = "info";       
    }
    else{
    $_SESSION['_status'] = 'no';
    $_SESSION['status_text'] = "Register";
    $_SESSION['status_info'] = "Register Now";
    $_SESSION['status_code'] = "info";
    }
    echo '<script>window.location.href = "http://localhost/kodegoeLMS/index.php" </script>';
}
else{
    $_SESSION['_status'] = 'no';
    $_SESSION['status_text'] = "Register";
    $_SESSION['status_info'] = "Register Now";
    $_SESSION['status_code'] = "info";
    echo '<script>window.location.href = "http://localhost/kodegoeLMS/index.php" </script>';
}

?>
