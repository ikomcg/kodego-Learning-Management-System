<?php 
function announce(){
    include '../database/server.php';
     $sqlAnnounce = "SELECT * FROM annoucement ORDER BY Announce_ID DESC";
     $result_a = $mysqli->query($sqlAnnounce);

     while($result_announce = mysqli_fetch_array($result_a)){
        $id = $result_announce['account_ID'];

        $sqlimg = "SELECT * FROM account WHERE account_ID = '$id'";
        $resultimg = $mysqli->query($sqlimg);
        $img = $resultimg->fetch_assoc();

         echo '
         <div class="col-announcement-upload">
             <div class="d-flex justify-content-between align-items-center">
                 <div class="tea-upload d-flex">
                    <img src="upload/profile_img/'.$img['profile_img'].'" alt="">
                     <div class="name-date-announce d-flex flex-column">
                         <span>'.$result_announce['First_Name'].' '. $result_announce['Last_Name'].'</span>
                         <span class="d-flex align-items-center"><i class="bi bi-clock m-1 mb-0 mt-0"></i>'.$result_announce['Date_Announce'] .'</span>
                     </div>
                 </div>
                 <!-- <div>
                     <button style="margin-right: 20px;">Delete</button>
                 </div> -->
             </div>
             <div class="announce-message">
                 <p>'.$result_announce['Announce_Text'].'</p>
                 '?> 
                 <?php 
                     if(empty($result_announce['Announce_img'])){
                         echo'';
                     }
                     else{
                        echo '<img src="upload/announce_img/'.$result_announce['Announce_img'].'" alt="">';
                     }
                echo'
             </div>
         </div>
         ';
     }
}

?>