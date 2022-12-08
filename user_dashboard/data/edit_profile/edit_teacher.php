<?php 
    include '../../../database/server.php';

    session_start();
# check if image sent
    if (isset($_POST['teacher_update'])) {
        //file
        $img_name = $_FILES['profile']['name'];
        $img_size = $_FILES['profile']['size'];
        $tmp_name = $_FILES['profile']['tmp_name'];
   
        $Last_Name = $_POST['Last_Name'];
        $Middle_Name = $_POST['Middle_Name'];
        $First_Name = $_POST['First_Name'];
        $Middle_Name = $_POST['Middle_Name'];
        $B_Day = $_POST['B_Day'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $Y_S = $_POST['Y&S'];
        $Phone = $_POST['Phone'];
        $Course_Code = $_POST['Course_Code'];
        $Teacher_ID = $_POST['Teacher_ID'];


        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png", "jfif");

         if(!in_array($img_ex_lc, $allowed_exs)) {
            // echo '<script>alert("This file You Cant upload")</script>';
            echo '<script>window.location.href = "../../teacher_edit.php?ID='.$Teacher_ID.'" </script>';
            $_SESSION['student_txt'] = "Error";
            $_SESSION['student_info'] = "Something Wrong";
            $_SESSION['student_code'] = "info";
        }
        if(in_array($img_ex_lc, $allowed_exs) || empty(in_array($img_ex_lc, $allowed_exs))) {		

            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = "../../upload/profile_img/".$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            //student
            if(empty(in_array($img_ex_lc, $allowed_exs))){
                $sqlprofile = "UPDATE account SET Last_Name ='$Last_Name', First_Name='$First_Name', Middle_Name='$Middle_Name', Birth_Day='$B_Day', Phone='$Phone', Email='$Email', Password='$Password' WHERE account_ID = '$Teacher_ID'";
            }
            else{
                $sqlprofile = "UPDATE account SET Last_Name ='$Last_Name', First_Name='$First_Name', Middle_Name='$Middle_Name', Birth_Day='$B_Day', Phone='$Phone', Email='$Email', Password='$Password', profile_img='$new_img_name' WHERE account_ID = '$Teacher_ID'";
            }     
           
            if($mysqli->query($sqlprofile)== true ) {
                // echo '<script>alert("Announcement Posted")</script>';
                // echo '<script>window.location.href = "../../teacher_edit.php?ID='.$Teacher_ID.'" </script>';
                echo '<script>history.back()</script>';
                $mysqli->affected_rows;
                $_SESSION['student_txt'] = "Teacher profile";
                $_SESSION['student_info'] = "Profile Updated";
                $_SESSION['student_code'] = "success";
                   
                    
            }
        }
        

    }
    else if(isset($_POST['teacher_delete'])){
        $Teacher_ID = $_POST['Teacher_ID'];
        $sqlDelete ="DELETE FROM account WHERE account_ID='$Teacher_ID'";
        $sqlDeleteMessage ="DELETE FROM message WHERE account_ID='$Teacher_ID'";
        $sqlDeleteGc ="DELETE FROM groupchat WHERE account_ID='$Teacher_ID'";
        
        if ($mysqli->query($sqlDelete) == TRUE && $mysqli->query($sqlDeleteMessage) == TRUE && $mysqli->query($sqlDeleteGc) == TRUE ){
            echo '<script>window.location.href = "../../teacher.php" </script>';
            $_SESSION['student_txt'] = "Profile";
            $_SESSION['student_info'] = "Teacher Deleted";
            $_SESSION['student_code'] = "success";
        }

    }
  


?>
