<?php
 include '../../../database/server.php';
 session_start();


  if(isset($_POST['post_comment'])){

    $sub_id = $_POST['submission_ID'];
    $comment = $_POST['comment'];
    $accID =  $_SESSION['ID'];

    $response = array();        
    $inserData = array();
  
  if(empty($comment)){
    $_SESSION['ann_text'] = "Comment";
    $_SESSION['ann_info'] = "Fill out text box";
    $_SESSION['ann_code'] = "info";  
  }
    
    $sqlcomment = "INSERT INTO comment (Account_ID, Submission_ID, Comment) VALUES ('$accID','$sub_id', '$comment')";
    $_SESSION['ann_text'] = "Comment";
    $_SESSION['ann_info'] = "Comment Posted";
    $_SESSION['ann_code'] = "success";  
    if ($mysqli -> query($sqlcomment)) {
        $mysqli->affected_rows;
            

}
      $mysqli -> close();
      
     echo "<script>history.back()</script>";
  }
?>