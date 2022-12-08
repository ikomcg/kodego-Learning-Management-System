<?php
    include '../../../database/server.php';

	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=student_grade.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

    $courseID = $_POST['course_ID'];
    $course_code = $_POST['course_code'];
    $sqlAssignment = "SELECT * FROM assigment WHERE Course_ID = '$courseID' ORDER BY Assignment_ID ASC";
    $result_Assignment = $mysqli->query($sqlAssignment);
    // $result_Submission = $resultSub->fetch_assoc(); 
    
    $output = "";

    $output .="
    <table >
        <tr>
        <th>Student</th>";
        while($results = mysqli_fetch_array($result_Assignment)){
       
            $output .= "<th>".$results['Assigment_Title']." </th>";
    
        }
    $output .="
        </tr>
        ";

        $sqlAccount = "SELECT * FROM account WHERE Course_Code = '$course_code' AND User_Type= 'Student' ORDER BY Account_ID ASC";
    $result_Account = $mysqli->query($sqlAccount);

    while($result = mysqli_fetch_array($result_Account)){

        $acc_ID = $result['account_ID'];

         $output .= "
         <tr> 
            <td>".$result['First_Name']." ".$result['Middle_Name']." ".$result['Last_Name']."</td>";

        $sqlAss = "SELECT * FROM assigment WHERE Course_ID = '$courseID'  ORDER BY Assignment_ID ASC";
        $result_Ass = $mysqli->query($sqlAss);

        while($ass = mysqli_fetch_array($result_Ass)){
            $assID = $ass['Assignment_ID'];

            $sqlSubmissions = "SELECT * FROM submission WHERE  Account_ID= '$acc_ID' AND Assignment_ID='$assID' ORDER BY Assignment_ID ASC";  
            $result_Submissions = $mysqli->query($sqlSubmissions);

            if($result_Submissions->num_rows == true){
                $a = $result_Submissions->fetch_assoc();
                    $output .= "<td>".$a['Score']."</td>";
                
            }
            else{
                $output .= "<td></td>";
            }
        }
         $output .="</tr>";
    }
    $output .= "</table>";

 
	 echo $output;

?>