<?php 
    include "../../../database/server.php";
    session_start();

    if(isset($_POST['upload_module'])){

        $file_name = $_FILES['file_module']['name'];
        $img_size = $_FILES['file_module']['size'];
        $tmp_name = $_FILES['file_module']['tmp_name'];
      
        $module_title = $_POST['module_title'];
        $course_id = $_POST['Course_ID'];
        $course_code = $_POST['Course_Code'];

        $file_module = pathinfo($file_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($file_module);
        $allowed_exs = array("jpg", "jpeg", "png", "jfif","pdf","ppt","word");

        if (in_array($img_ex_lc, $allowed_exs)) {		

            $new_file_name = uniqid("file-", true).'.'.$img_ex_lc;
            $img_upload_path = "../module_upload/".$new_file_name;
            move_uploaded_file($tmp_name, $img_upload_path);

             
            $sqlmodule = "INSERT INTO module (Course_ID, Module_Title, Module_File, Course_Code)  VALUES ('$course_id','$module_title','$new_file_name','$course_code')";


            if($mysqli->query($sqlmodule)) {
                // echo '<script>window.location.href = "../course.php?course='.$course_Name.'&ID='.$course_id.'"</script>';
                $mysqli->affected_rows;
                $_SESSION['ann_text'] = "Posted";
                $_SESSION['ann_info'] = "Module Uploaded";
                $_SESSION['ann_code'] = "success";
                   
                    
            }
        }

    }
    echo '<script>history.back()</script>';

?>