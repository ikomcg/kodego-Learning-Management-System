<?php 

    function name(){
        include 'sql.php';

        echo $resultEmail["First_Name"] , " " , $resultEmail["Middle_Name"] , " " , $resultEmail["Last_Name"];
    }
    function user_type(){
        include 'sql.php';
        echo $resultEmail["User_Type"];
    }
    function email(){
        include 'sql.php';

        echo  $resultEmail["Email"];
    }
    function img_user(){
        include 'sql.php';

        echo  $resultEmail["profile_img"];
    }

    function online(){
        include 'sql.php';
         $sqlOnline= "SELECT * FROM account WHERE Status ='Online' AND User_Type ='Student'";
         $result_o = $mysqli->query($sqlOnline);
    
         while($result = mysqli_fetch_array($result_o)){
             echo '
             <li style="border:none;"> 
                <a href= "../student_edit.php?ID='.$result["account_ID"].'">
                    <img src="../upload/profile_img/'.$result['profile_img'].'" style="clip-path:circle();">
                    <span>'.$result['First_Name'].' '.$result['Last_Name'].'</span>
                </a>
            </li>';
         }
    }
    function module_upload($course_ID, $courseName, $resultInfo){
        $user_type = $_SESSION['user_type'];

        if($user_type == "Teacher" || $user_type == "Admin"){
            echo '
            <button id="open_module" class="m-2 mt-0 mb-0" style="background-color: white; border: none; font-size: 18px; padding: 2px 15px; border-radius: 5px;">Upload + </button>
            <div id="form_module" class="form_module" style="position: absolute; z-index:999; background-color:rgba(0,0,0, .6);top: 0; bottom:0; right: 0;  left:0; right:0;">
                <div style="max-width:500px; width:100%; background-color:antiquewhite; padding: 10px; border-radius: 5px ; overflow: hidden; color: black;">
                    <form action="data/upload_module.php" method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                            <h1 style="font-size: 25px;">Upload Module</h1>
                            <i class="bi bi-x" style="background-color: #14599d; color: #ffffff; border: none; padding: 2px 10px; float: right; font-size: 20px; cursor: pointer;" id="close_module"></i>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="moduleName" name="module_title" placeholder="Module Title">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="courseID"  name="Course_ID" value="'.$course_ID.'">
                        </div>
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="courseCode"  name="Course_Code" value="'.$resultInfo['Course_Code'].'">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="file_module" id="formFile">
                        </div>
                        <button type="submit" name="upload_module" style="background-color: #14599d; color: #ffffff; border: none; padding: 2px 40px; float: right; font-size: 18px;">Upload</button>                                 
                    </form>
                </div>
            </div>
            
            
            ';
        }
    }
function modules($resultmodule){
    include 'sql.php';
    $sqlmodule = "SELECT * FROM module WHERE Course_ID = '$resultmodule'";
    $resultmodule = $mysqli->query($sqlmodule);
    
    while($result = mysqli_fetch_array($resultmodule)){
        echo '
            <li>
                <i class="bi bi-journal-album"></i> <a href="module_upload/'.$result['Module_File'].'" target="_blank" type="application/pdf">'.$result['Module_Title'].'</a>
            </li>

        
        ';
    }

}
function nav_course(){
    include 'sql.php';
   $course_code = $resultEmail["Course_Code"];
   $admin = $resultEmail['User_Type'];

   $sqlCourse = "SELECT * FROM courses WHERE Course_Code ='$course_code'";
   $result_course = $mysqli->query($sqlCourse);

    while($result = mysqli_fetch_array($result_course)){
        echo '<li><a href="course.php?course='.$result['Course_Name'].'&ID='.$result['Course_ID'].'">'.$result['Course_Name'].'</a></li>';
    }
    if($admin == "Admin"){

        $sqlCourse = "SELECT * FROM courses";
        $result_course = $mysqli->query($sqlCourse);
 
        while($result = mysqli_fetch_array($result_course)){
            echo '<li><a href="course.php?course='.$result['Course_Name'].'&ID='.$result['Course_ID'].'">'.$result['Course_Name'].'"</a></li>';
        }
    }
}
function add_assignment($courseID, $courseName){
    include 'sql.php';
    $admin = $resultEmail['User_Type'];

    if($admin == "Admin" || $admin == "Teacher"){
        echo '<button id="open_module"><i class="bi bi-plus"></i></button>
        <div id="form_module" class="form_module" style="position: absolute; z-index: 999; top:0; bottom:0; right:0; left:0; background-color: rgba(0,0,0,0.6);">
            <div style="max-width:500px; width:100%; background-color:antiquewhite; right: 0; top: 0;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px; padding: 10px; border-radius: 5px ; overflow: hidden; color: black;">
            
                <form action="data/upload_assignment.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                        <h1 style="font-size: 25px;">Upload Assignment</h1>
                        <i class="bi bi-x" style="background-color: #14599d; color: #ffffff; border: none; padding: 2px 10px; float: right; font-size: 20px; cursor: pointer;" id="close_module"></i>
                    </div>
                    <div class="mb-3">
                    <label>Assignment Title</label>
                        <input type="text" class="form-control" id="assigment_Title" name="assigment_Title" placeholder="Assignment Title">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="assigment_ID" name="Course_ID" value="'.$courseID.'">
                    </div>
                    <div class="mb-3">
                        <label>Max Score</label>
                        <input type="text" class="form-control" id="max_score" name="max_score" placeholder="Max score">
                    </div>
                    <div class="mb-3">
                        <label>Assignment Due</label>
                        <input type="date" class="form-control" id="due_date" name="assignment_due">
                    </div>
                    <div class="mb-3">
                            <input class="form-control" type="file" id="assignment_File" name="assignment_File">
                    </div>
                    <button type="submit" style="background-color: #14599d; color: #ffffff; border: none; padding: 2px 40px; float: right; font-size: 18px;" name="upload_assignment">Upload</button>
                </form>
            </div>
        </div>';
    }
}
function assignment_student($courseID, $courseName){
    include 'sql.php';

    $sqlAss = "SELECT * FROM assigment WHERE Course_ID ='$courseID'";
    $result_Ass = $mysqli->query($sqlAss);

    echo '
    <table class="content-assigment w-100">
        <tr class="assigment">
            <th>Assignment</th>
        </tr>';
                        
        while($result = mysqli_fetch_array($result_Ass)){
            $assID = $result['Assignment_ID']; 
            echo '<tr><td><i class="bi bi-file-earmark"></i> <a href="viewAss.php?course='.$courseName.'&ID='.$courseID.'&assID='.$assID.'">'.$result['Assigment_Title'].'</a></td></tr>';
        }
        echo '</table>';    
}
function assignment_teacher($courseID, $courseName){
    include 'sql.php';

    $sqlAss = "SELECT * FROM assigment WHERE Course_ID ='$courseID'";
    $result_Ass = $mysqli->query($sqlAss);

    echo '<table class="content-assigment w-100">
            <tr class="assigment">
                <th>Assignment</th>
            <th >Student Submitted</th>
            </tr>
            <tr>';
                        
            while($result = mysqli_fetch_array($result_Ass)){

                $assFile = $result['Assignment_File']; 
                $assID = $result['Assignment_ID']; 

                echo '<tr><td><i class="bi bi-file-earmark"></i> <a target="_blank" href="assignment_upload/'.$assFile.'" >'.$result['Assigment_Title'].'</a></td> <td><a href="submit.php?course='.$courseName.'&ID='.$courseID.'&assID='.$assID.'" >View</a></td>   </tr>';
            }
            echo '</table>';
}


function student_view_submitted($assID,  $courseName, $course_ID, $courseCode){
    include '../../database/server.php';
    $sql_Student = "SELECT * FROM account WHERE Course_Code='$courseCode' AND User_Type='Student' ORDER BY account_ID ASC";
    $result_stud = $mysqli->query($sql_Student);

    while($resultStudent = mysqli_fetch_array($result_stud)){
        $accID = $resultStudent['account_ID'];
        echo '
            <tr >
                <td  ><img src="../upload/profile_img/'.$resultStudent['profile_img'].'" style="max-width: 50px; clip-path:circle(); margin-right:15px" alt="">'.$resultStudent['First_Name'].' '.$resultStudent['Last_Name'].' </td>';
                
                $sqlSubmisson = "SELECT * FROM submission WHERE Assignment_ID = '$assID' AND Account_ID = '$accID'";
                $resultSubmisson = $mysqli->query($sqlSubmisson);
                while($resultSub = mysqli_fetch_array($resultSubmisson)){
                    echo '<td><a style="font-size: 18px;" href="grade.php?course='.$courseName.'&ID='.$course_ID.'&assID='.$assID.'&subID='.$resultSub ['Submission_ID'].'" type="">Answer</a></td>';
                    
                }
        echo'</tr>';
    }

}

function student_name($course_code, $courseID){
    include "../../database/server.php";

    $sqlAccount = "SELECT * FROM account WHERE Course_Code = '$course_code' AND User_Type= 'Student' ORDER BY Account_ID ASC";
    $result_Account = $mysqli->query($sqlAccount);

    while($result = mysqli_fetch_array($result_Account)){

        $acc_ID = $result['account_ID'];

         echo "
         <tr> 
            <td><img src=../upload/profile_img/".$result['profile_img']." style='max-width:60px; clip-path: circle(); margin: 5px;' />".$result['First_Name']." ".$result['Last_Name']."</td>";

        $sqlAss = "SELECT * FROM assigment WHERE Course_ID = '$courseID'  ORDER BY Assignment_ID ASC";
        $result_Ass = $mysqli->query($sqlAss);

        while($ass = mysqli_fetch_array($result_Ass)){
            $assID = $ass['Assignment_ID'];

            $sqlSubmissions = "SELECT * FROM submission WHERE  Account_ID= '$acc_ID' AND Assignment_ID='$assID' ORDER BY Assignment_ID ASC";  
            $result_Submissions = $mysqli->query($sqlSubmissions);

            if($result_Submissions->num_rows == true){
                $a = $result_Submissions->fetch_assoc();
                    echo "<td style='text-align: center; font-size:20px;'>".$a['Score']."</td>";
                
            }
            else{
                echo "<td style='text-align: center; font-size:20px;'></td>";
            }
        }
         echo"</tr>";
    }
}
function assignment($courseID){
    include "../../database/server.php";

    $sqlAssignment = "SELECT * FROM assigment WHERE Course_ID = '$courseID' ORDER BY Assignment_ID ASC";
    $result_Assignment = $mysqli->query($sqlAssignment);
    // $result_Submission = $resultSub->fetch_assoc(); 

    while($results = mysqli_fetch_array($result_Assignment)){
       
        echo "<th>".$results['Assigment_Title']." </th>";

    }
}
function comment($subID){
    include "../../database/server.php";
    $sqlcomment = "SELECT * FROM comment WHERE Submission_ID = '$subID' ORDER BY Comment_ID ASC";
    $result_Comment = $mysqli->query($sqlcomment);
    // $result_Submission = $resultSub->fetch_assoc(); 

    if($result_Comment->num_rows ==  true ){

        while($results = mysqli_fetch_array($result_Comment)){
        $accID = $results['Account_ID'];

            $sqlacc = "SELECT * FROM account WHERE account_ID = '$accID'";
            $result_account = $mysqli->query($sqlacc);
            $resulAccount = $result_account->fetch_assoc();


            echo '
                <div class="d-flex align-items-start" >
                    <img src="../upload/profile_img/'.$resulAccount['profile_img'].'" alt="" style="clip-path:circle(); margin-right:10px;">
                    <div>
                        <span>'.$resulAccount['First_Name'].' '.$resulAccount['Middle_Name'].' '.$resulAccount['Last_Name'].'</span>
                        <br>
                        <span style="font-size:12px;">'.$results['Date_Comment'].'</span>
                    </div>
                </div>
                <p style="font-size:18px; margin-top:10px;">
                    '.$results['Comment'].'
                </p> ';
        }
    }
}
?>