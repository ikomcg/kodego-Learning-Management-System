<?php 
    include '../../../database/server.php';

    session_start();
# check if image sent
    if (isset($_POST['post_announce'])) {
        //file
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $announce = $_POST['txt_announce'];

        //infoTeacher
        $user_id =  $_SESSION['ID'];
        $sqlEmail = "SELECT * FROM account WHERE  account_ID = '$user_id' ";
        $resultE = $mysqli->query($sqlEmail);
        $resultEmail = $resultE->fetch_assoc();

        $lname = $resultEmail['Last_Name'];
        $mname = $resultEmail['Middle_Name'];
        $fname = $resultEmail['First_Name'];

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png", "jfif","webp");

        if(!in_array($img_ex_lc, $allowed_exs)){
            // echo '<script>alert("This file You Cant upload")</script>';
            echo '<script>window.location.href = "../../announcement.php" </script>';
            $_SESSION['ann_text'] = "Error";
            $_SESSION['ann_info'] = "Something Wrong";
            $_SESSION['ann_code'] = "info";
        }
        if(empty($announce)){
            $_SESSION['ann_text'] = "Error";
            $_SESSION['ann_info'] = "";
            $_SESSION['ann_code'] = "info";
        }
       else if (in_array($img_ex_lc, $allowed_exs) || empty(in_array($img_ex_lc, $allowed_exs))) {		

            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = "../../upload/announce_img/".$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

             if(empty(in_array($img_ex_lc, $allowed_exs))){
                $sqlann = "INSERT INTO annoucement (account_ID, Announce_Text, Last_Name, First_Name, Middle_Name)  VALUES ('$user_id','$announce','$lname','$fname','$mname')";
             }  
             else{
                $sqlann = "INSERT INTO annoucement (account_ID, Announce_Text, Announce_img, Last_Name, First_Name, Middle_Name)  VALUES ('$user_id','$announce','$new_img_name','$lname','$fname','$mname')";
             }     
          

            if($mysqli -> query($sqlann)) {
                // echo '<script>alert("Announcement Posted")</script>';
                echo '<script>window.location.href = "../../announcement.php" </script>';
                $mysqli->affected_rows;
                $_SESSION['ann_text'] = "Posted";
                $_SESSION['ann_info'] = "Announcement Posted";
                $_SESSION['ann_code'] = "success";
                   
                    
            }
        }
       

    }


?>
