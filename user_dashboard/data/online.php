<?php 
function online(){
    include '../database/server.php';
     $sqlOnline= "SELECT * FROM account WHERE Status ='Online' AND User_Type ='Student'";
     $result_o = $mysqli->query($sqlOnline);

     while($result = mysqli_fetch_array($result_o)){
         echo '
         <li style="border:none;">
            <a href= "student_edit.php?ID='.$result["account_ID"].'">
                <img src="upload/profile_img/'.$result['profile_img'].'" style="clip-path:circle();">
                <span>'.$result['First_Name'].' '.$result['Last_Name'].'</span>
            </a>
        </li>';
     }
}

?>