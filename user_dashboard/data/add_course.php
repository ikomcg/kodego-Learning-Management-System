<?php 
    include '../../database/server.php';

    session_start();
# check if image sent
    if (isset($_POST['add_course'])) {
        //file
        $img_name = $_FILES['Course_Img']['name'];
        $img_size = $_FILES['Course_Img']['size'];
        $tmp_name = $_FILES['Course_Img']['tmp_name'];
        
        $course_code = $_POST['Course_Code'];
        $course_name = $_POST['Course_Name'];
        $year_section = $_POST['year_section'];

        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png", "jfif","avif");

        if(!in_array($img_ex_lc, $allowed_exs)){
            // echo '<script>alert("This file You Cant upload")</script>';
            echo '<script>window.location.href = "../room.php" </script>';
            $_SESSION['ann_text'] = "Error";
            $_SESSION['ann_info'] = "This image can't upload";
            $_SESSION['ann_code'] = "info";
        }
       else if (in_array($img_ex_lc, $allowed_exs)) {		

        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = "../courses/course_img/".$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);
        $sqlcourse = "INSERT INTO courses (Course_Code, Course_Name , Course_img, Year_Section)  VALUES ('$course_code','$course_name','$new_img_name','$year_section')";

        if($mysqli -> query($sqlcourse)) {
                // echo '<script>alert("Announcement Posted")</script>';
                echo '<script>window.location.href = "../room.php" </script>';
                $mysqli->affected_rows;
                $_SESSION['ann_text'] = "Course";
                $_SESSION['ann_info'] = "Course added";
                $_SESSION['ann_code'] = "success";                   
        }
    }
}
?>
