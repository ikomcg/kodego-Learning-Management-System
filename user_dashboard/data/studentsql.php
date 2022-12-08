<?php 

        include '../../database/server.php';
        $user_id = $_SESSION['ID']; 
        $sqlEmail = "SELECT * FROM account WHERE  account_ID= '$user_id' ";
        $resultE = $mysqli->query($sqlEmail);
        $resultEmail = $resultE->fetch_assoc();
?>