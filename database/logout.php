<?php 
include 'server.php';
session_start();
if(isset($_POST['btn-logout'])){
    
    $id = $_SESSION['ID'];
    $_SESSION["Account"] = "invalid";
    echo ' <script>window.location.href = "http://localhost/eLMS/"</script>';
    $update = "UPDATE account SET Status = 'offline' WHERE account_ID = '$id'";
    $mysqli->query($update);
}
?>