<?php 
function my_message(){
    include '../database/server.php';
    $email = $_SESSION['Email'];
    $sqlMessage = "SELECT * FROM message WHERE Email = '$email' ORDER BY Message_ID DESC";
    $result_m = $mysqli->query($sqlMessage);
    
    
    while($result_message = mysqli_fetch_array($result_m)){

        $email = $result_message['Email_To'];
        $sqlimg = "SELECT * FROM account WHERE Email = '$email'";
        $resultimg = $mysqli->query($sqlimg);
        $img = $resultimg->fetch_assoc();

        echo '
            <div class="col-inbox">
                <div class="d-flex align-items-center top-inbox">
                <img src="upload/profile_img/'.$img['profile_img'].'" style="clip-path:circle();">
                <div class="d-flex flex-column">
                    <span>To: '.$result_message['Email_To'].'</span>
                    <span class="date"><i class="bi bi-clock"></i>'.$result_message['Date_Message'].'</span>
                </div>
            </div>
            <div class="message-inbox">
                <p>
                    '.$result_message['Message'].'
                </p>
            </div>
    </div>';
    }
}              

function inbox(){
    include '../database/server.php';
                           
    $email = $_SESSION['Email'];
    $sqlMessage = "SELECT * FROM message WHERE Email_to = '$email'  ORDER BY Message_ID DESC";
    $result_m = $mysqli->query($sqlMessage);

    while($result_message = mysqli_fetch_array($result_m)){

        $id = $result_message['account_ID'];
        $sqlimg = "SELECT * FROM account WHERE account_ID = '$id'";
        $resultimg = $mysqli->query($sqlimg);
        $img = $resultimg->fetch_assoc();

        echo '
        <div class="col-inbox">
        <div class="d-flex align-items-center top-inbox">
            <img src="upload/profile_img/'.$img['profile_img'].'" style="clip-path:circle();">
            <div class="d-flex flex-column">
                <span>From: '.$result_message['Email'].'</span>
                <span class="date"><i class="bi bi-clock"></i> '.$result_message['Date_Message'].'</span>
            </div>
        </div>
        <div class="message-inbox">
            <p>
            '.$result_message['Message'].'
            </p>
        </div>
    </div> 
        
        ';
    }
}

function gc_message(){
    include '../database/server.php';
                           
    $course_code = $_SESSION['Course_code'];
    $id =  $_SESSION['ID'];

    $sqlMessage = "SELECT * FROM groupchat WHERE Course_Code = '$course_code' ORDER BY Group_ID ASC";
    $result_m = $mysqli->query($sqlMessage);

    while($result_message = mysqli_fetch_array($result_m)){

        $id = $_SESSION['ID'] ;
        $me = $result_message['account_ID'];
        $sqlimg = "SELECT * FROM account WHERE account_ID = '$me'";
        $resultimg = $mysqli->query($sqlimg);
        $img = $resultimg->fetch_assoc();

        if($id == $result_message['account_ID']){

            echo '<div class="col-inbox" id="my_message_group" style="margin-bottom:20px; margin-left:55%">
            <div class="d-flex align-items-center flex-row-reverse  top-inbox">
                <img src="upload/profile_img/'.$img['profile_img'].'" style="clip-path:circle();">
                <span style="margin-right: 5px;">You</span>
            </div>
            <div class="message-inbox">
                <p>
                     '.$result_message['Group_Message'].'
                </p>
            </div>
        </div>';
        }
        else{
            echo '
            <div class="col-inbox" style="margin-left: 35px;">
                <div class="d-flex align-items-center top-inbox">
                    <img src="upload/profile_img/'.$img['profile_img'].'" style="clip-path:circle();">
                    <span style="margin-left: 5px;">'.$result_message['First_Name'].' '.$result_message['Last_Name'].'</span>
                </div>
                <div class="message-inbox">
                    <p>
                    '.$result_message['Group_Message'].'
                    </p>
                </div>
            </div>
            ';
        }
    }
}
 ?>