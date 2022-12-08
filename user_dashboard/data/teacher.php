<?php 

function teacher(){
    include '../database/server.php';
    $courseID =  $_SESSION['ID'];
    $admin =  $_SESSION['user_type'];
    
    $sqlemail = "SELECT * FROM account WHERE account_ID = '$courseID'";
    $result = $mysqli->query($sqlemail);
    $resultAccount = $result->fetch_assoc();
    $courseCode = $resultAccount['Course_Code'];

    $sqlemail = "SELECT * FROM account WHERE Course_Code = '$courseCode' AND User_Type='Teacher'";
    $resultStudent = $mysqli->query($sqlemail);

    while($result_student = mysqli_fetch_array($resultStudent)){

        echo '<div class="card-row" style="height: 270px !important;"> 
        <div class="card-col p-2">
            <img src="upload/profile_img/'.$result_student['profile_img'].'" alt="">
            <div class="card-info">
                <h2>'.$result_student['First_Name'].' '.$result_student['Middle_Name'].' '.$result_student['Last_Name'].'</h2>
                <span>'.$result_student['Email'].'</span>
            </div>
            <div class="btn-view-more">
            <button><a href= "teacher_edit.php?ID='.$result_student['account_ID'].'">View</a></button>
            </div>
        </div>
    </div>';
    }
    if($admin == "Admin"){
        $sqlemail = "SELECT * FROM account WHERE  User_Type='Teacher'";
        $result = $mysqli->query($sqlemail);
    
        while($result_student = mysqli_fetch_array($result)){
    
            echo '<div class="card-row" style="height: 270px !important;"> 
            <div class="card-col p-2">
                <img src="upload/profile_img/'.$result_student['profile_img'].'" alt="">
                <div class="card-info">
                    <h2>'.$result_student['First_Name'].' '.$result_student['Middle_Name'].' '.$result_student['Last_Name'].'</h2>
                    <span>'.$result_student['Email'].'</span>
                </div>
                <div class="btn-view-more">
                <button><a href= "teacher_edit.php?ID='.$result_student['account_ID'].'">View</a></button>
                </div>
            </div>
        </div>';
        }

    }

}


?>