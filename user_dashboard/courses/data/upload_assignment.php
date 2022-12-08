<?php 
    include "../../../database/server.php";
    session_start();

    if(isset($_POST['upload_assignment'])){

        $file_name = $_FILES['assignment_File']['name'];
        $img_size = $_FILES['assignment_File']['size'];
        $tmp_name = $_FILES['assignment_File']['tmp_name'];
      
        $ass_title = $_POST['assigment_Title'];
        $max_score = $_POST['max_score'];
        $due_date = $_POST['assignment_due'];
        $course_id = $_POST['Course_ID'];

        $file_module = pathinfo($file_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($file_module);
        $allowed_exs = array("jpg", "jpeg", "png", "jfif","pdf","ppt","word");

        if (in_array($img_ex_lc, $allowed_exs)) {		

            $new_file_name = uniqid("file-", true).'.'.$img_ex_lc;
            $img_upload_path = "../assignment_upload/".$new_file_name;
            move_uploaded_file($tmp_name, $img_upload_path);
             
            $sqlass = "INSERT INTO assigment (Course_ID, Assignment_File, Assigment_Title, Max_score, Due_Date) VALUES ('$course_id', '$new_file_name','$ass_title', '$max_score', '$due_date')";

            if($mysqli->query($sqlass)) {
                $mysqli->affected_rows;
                $_SESSION['ann_text'] = "Posted";
                $_SESSION['ann_info'] = "Assignment Uploaded";
                $_SESSION['ann_code'] = "success";
                   
                    
            }
        }
        else if (!in_array($img_ex_lc, $allowed_exs)) {
            $_SESSION['ann_text'] = "Error";
            $_SESSION['ann_info'] = "Something Error";
            $_SESSION['ann_code'] = "warning";
        }
        // echo '<script>window.location.href = "../assignment.php?course='.$course_Name.'&ID='.$course_id.'"</script>';
        echo '<script>history.back()</script>';

    }
    
    
?>