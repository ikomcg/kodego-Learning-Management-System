<?php 
    include "../../../database/server.php";
    session_start();

    $student_ID = $_SESSION['ID'];

    $sqlStudent= "SELECT * FROM account WHERE Account_ID = '$student_ID'";
    $resultStudent = $mysqli->query($sqlStudent);
    $result_stud= $resultStudent->fetch_assoc(); 

    if(isset($_POST['sub_assignment'])){

        $file_name = $_FILES['ass_file']['name'];
        $img_size = $_FILES['ass_file']['size'];
        $tmp_name = $_FILES['ass_file']['tmp_name'];
      
        $ass_id = $_POST['ass_id'];
        $course_id = $_POST['course_id'];

        $FName = $result_stud['First_Name'];
        $LName = $result_stud['Last_Name'];
        $MName = $result_stud['Middle_Name'];

    

        $file_module = pathinfo($file_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($file_module);

        $allowed_exs = array("jpg", "jpeg", "png", "jfif","pdf","ppt","word");

        if (in_array($img_ex_lc, $allowed_exs)) {		

            $new_file_name = uniqid("file-", true).'.'.$img_ex_lc;
            $img_upload_path = "../submission/".$new_file_name;
            move_uploaded_file($tmp_name, $img_upload_path);
             
            $sqlass = "INSERT INTO submission (Assignment_ID, Account_ID, Course_ID, Student_Name, Assignment_Ans, Score) VALUES ('$ass_id','$student_ID','$course_id','$FName $MName $LName','$new_file_name','?')";

            if($mysqli->query($sqlass)) {
                // echo '<script>window.location.href = "../viewAss.php?course='.$course_name.'&ID='.$course_id.'&assID='.$ass_id.'"</script>';
                $mysqli->affected_rows;
                $_SESSION['ann_text'] = "Submit";
                $_SESSION['ann_info'] = "Assignment Submitted";
                $_SESSION['ann_code'] = "success";
                   
                    
            }
        }
        else if (!in_array($img_ex_lc, $allowed_exs)) {
            $_SESSION['ann_text'] = "Error";
            $_SESSION['ann_info'] = "Something Error";
            $_SESSION['ann_code'] = "warning";
        }
        echo '<script>history.back();</script>';


    }
    
    
?>