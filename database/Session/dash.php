<?php
session_start();
    function dash(){
            if( $_SESSION["Account"] == "invalid" || empty($_SESSION["Account"])){
                $_SESSION["Account"] = "invalid";
            echo ' <script>window.location.href = "http://localhost/kodegoeLMS/"</script>';
            }
        
    }

?>