<?php 
    include "../../../database/server.php";
    session_start();

    if (isset($_POST['Post_Grade'])) {

        $grade = $_POST['score'];
        $sub_id = $_POST['Sub_ID'];
        

        $sqlGrade = "UPDATE submission SET Score ='$grade' WHERE Submission_ID = '$sub_id'";
        
       if($mysqli->query($sqlGrade)== true) {
                echo '<script>history.back()</script>';
                $mysqli->affected_rows;
                $_SESSION['ann_text'] = "Score";
                $_SESSION['ann_info'] = "Graded Successful";
                $_SESSION['ann_code'] = "success";  
        }

    }

?>


