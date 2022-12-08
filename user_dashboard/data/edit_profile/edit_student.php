<?php 
    include '../../../database/server.php';

    session_start();
# check if image sent
$Student_ID = $_POST['Student_ID'];
    if (isset($_POST['student_update'])) {
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
        

        $mother_name = $_POST['mother_name'];
        $mother_phone = $_POST['mother_phone'];
        $mother_occup = $_POST['mother_occup'];

        $father_name = $_POST['father_name'];
        $father_phone = $_POST['father_phone'];
        $father_occup = $_POST['father_occup'];


        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png", "jfif");

         if(!in_array($img_ex_lc, $allowed_exs)) {
            // echo '<script>alert("This file You Cant upload")</script>';
            echo '<script>window.location.href = "../../student_edit.php?ID='.$Student_ID.'" </script>';
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
                $sqlprofile = "UPDATE account SET Last_Name ='$Last_Name', First_Name='$First_Name', Middle_Name='$Middle_Name', Birth_Day='$B_Day', Year_Section='$Y_S', Phone='$Phone', Email='$Email', Password='$Password', Course_Code='$Course_Code' WHERE account_ID = '$Student_ID'";
            }
            else{
                $sqlprofile = "UPDATE account SET Last_Name ='$Last_Name', First_Name='$First_Name', Middle_Name='$Middle_Name', Birth_Day='$B_Day', Year_Section='$Y_S', Phone='$Phone', Email='$Email', Password='$Password', Course_Code='$Course_Code', profile_img='$new_img_name' WHERE account_ID = '$Student_ID'";
            }     
           
            //parents
            $sqlAcc = "SELECT * FROM parents WHERE  account_ID='$Student_ID'";
            $result = $mysqli->query($sqlAcc);

            if($result->num_rows ==  true){
                $sqlparents = "UPDATE parents SET Mother_Name='$mother_name', Mother_Phone='$mother_phone', Mother_Occupation='$mother_occup', Father_Name='$father_name', Father_Phone='$father_phone', Father_Occupation='$father_occup' WHERE account_ID='$Student_ID' ";
            }
            else{
                $sqlparents = "INSERT INTO parents (account_ID, Mother_Name, Mother_Phone, Mother_Occupation, Father_Name, Father_Phone, Father_Occupation) VALUES ('$Student_ID', '$mother_name','$mother_phone','$mother_occup','$father_name','$father_phone','$father_occup')";

            }

            if($mysqli->query($sqlprofile)== true && $mysqli->query($sqlparents)== true) {
                // echo '<script>alert("Announcement Posted")</script>';
                echo '<script>window.location.href = "../../student_edit.php?ID='.$Student_ID.'" </script>';
                $mysqli->affected_rows;
                $_SESSION['student_txt'] = "Profle";
                $_SESSION['student_info'] = "Student Updated";
                $_SESSION['student_code'] = "success";
                   
                    
            }
        }
        

    }
    else if(isset($_POST['delete_account'])){
        $sqlDelete ="DELETE FROM account WHERE account_ID='$Student_ID'";
        $sqlDeleteMessage ="DELETE FROM message WHERE account_ID='$Student_ID'";
        $sqlDeleteGc ="DELETE FROM groupchat WHERE account_ID='$Student_ID'";
        $sqlDeleteParents ="DELETE FROM parents WHERE account_ID='$Student_ID'";
        echo '<script>window.location.href = "../../student.php" </script>';

    }
    if ($mysqli->query($sqlDelete) == TRUE && $mysqli->query($sqlDeleteMessage) == TRUE && $mysqli->query($sqlDeleteGc) == TRUE && $mysqli->query($sqlDeleteParents) == TRUE ){

        $_SESSION['student_txt'] = "Profile";
        $_SESSION['student_info'] = "Student Deleted";
        $_SESSION['student_code'] = "success";
    }

?>
