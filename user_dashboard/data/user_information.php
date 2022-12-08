<?php 

    function name(){
        include 'roomsql.php';

        echo $resultEmail["First_Name"] , " " , $resultEmail["Middle_Name"] , " " , $resultEmail["Last_Name"];
    }
    function user_type(){
        include 'roomsql.php';

        echo $resultEmail["User_Type"] ;
    }
    function email(){
        include 'roomsql.php';

        echo  $resultEmail["Email"];
    }
    function img_user(){
        include 'roomsql.php';

        echo  $resultEmail["profile_img"];
    }
    function nav_course(){
        include 'roomsql.php';
       $course_code = $resultEmail["Course_Code"];
       $admin = $resultEmail['User_Type'];

       $sqlCourse = "SELECT * FROM courses WHERE Course_Code ='$course_code'";
       $result_course = $mysqli->query($sqlCourse);

     while($result = mysqli_fetch_array($result_course)){
        echo '<li><a href="courses/course.php?course='.$result['Course_Name'].'&ID='.$result['Course_ID'].'">'.$result['Course_Name'].'</a></li>';
     }


       if($admin == "Admin"){

        $sqlCourse = "SELECT * FROM courses";
        $result_course = $mysqli->query($sqlCourse);
 
        while($result = mysqli_fetch_array($result_course)){
            echo '<li><a href="courses/course.php?course='.$result['Course_Name'].'&ID='.$result['Course_ID'].'">'.$result['Course_Name'].'</a></li>';
        }
    }
}
    function course(){
        include 'roomsql.php';
       $course_code = $resultEmail["Course_Code"];
       $admin = $resultEmail['User_Type'];

       $sqlCourse = "SELECT * FROM courses WHERE Course_Code ='$course_code'";
       $result_course = $mysqli->query($sqlCourse);
       

     while($result = mysqli_fetch_array($result_course)){
        $id = $result['Course_ID'];

        $sqlnum = "SELECT * FROM module WHERE Course_ID = '$id'";
        $result_module = $mysqli->query($sqlnum);
       


        echo '<div class="column-modul">
                <div>
                    <a href="courses/course.php?course='.$result['Course_Name'].'&ID='.$result['Course_ID'].'">
                   <img src="courses/course_img/'.$result['Course_img'].'" alt="">
                   <div class="info-modul">
                       <h2>'.$result['Course_Name'].'</h2>
                       <span>Year & Section '.$result['Year_Section'].'</span>
                       <div class="bot-course">
                           <span>1.25</span>
                           <div class="assignment-course">
                                <i class="bi bi-file-earmark"></i>
                           </div>
                           <span>'.mysqli_num_rows($result_module).'-modules</span>
                       </div>
                   </div>
               </a>
            </div>
       </div>';
     }


       if($admin == "Admin"){

        $sqlCourse = "SELECT * FROM courses";
        $result_course = $mysqli->query($sqlCourse);
 
        while($result = mysqli_fetch_array($result_course)){

            $id = $result['Course_ID'];
            $sqlnum = "SELECT * FROM module WHERE Course_ID = '$id'";
            $result_module = $mysqli->query($sqlnum);

            echo '<div class="column-modul">
                <div>
                <a href="courses/course.php?course='.$result['Course_Name'].'&ID='.$result['Course_ID'].'">
                        <img src="courses/course_img/'.$result['Course_img'].'" alt="">
                        <div class="info-modul">
                            <h2>'.$result['Course_Name'].'</h2>
                            <span>Year & Section '.$result['Year_Section'].'</span>
                            <div class="bot-course">
                                <span>1.25</span>
                                <div class="assignment-course">
                                    <i class="bi bi-file-earmark"></i>
                                </div>
                                <span>'.mysqli_num_rows($result_module).'-module</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>';
        }
    }
}
    function Join_course(){
        include 'roomsql.php';
        $course_code = $resultEmail["Course_Code"];
        $admin = $resultEmail['User_Type'];
        if(!empty($course_code) || $admin == 'Admin' ) {
            echo '';
        }
        else if(empty($course_code)){
            echo '<div class="join-code-course">
            <div>
                <div class="d-flex align-items-center"> 
                    <img src="../images/image-removebg-preview (2).png" alt="">
                    <div class="p-3">
                        <h2>Join our courses</h2>
                        <span>Become a part of our kodego family</span>
                        <br>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum tempora, quae sunt tempore laudantium delectus maiores voluptatibus accusamus inventore officia vitae velit,</span>
                    </div>
                </div>
                
                <div class="m-3 d-flex flex-row align-items-center">
                    <input type="text" placeholder="Enter Course Code" id="inpt-course_code" name="course_code">
                    <button id="btn-join-courses" class="btn btn-primary">Join the classes!</button>
                </div>
            </div>
        </div>';
           }
    }
function btn_announce(){
    include 'roomsql.php';
    $user_type = $resultEmail["User_Type"];

    if($user_type == 'Teacher' || $user_type == "Admin"){
        echo '
        <button id="open_announce"  style="background-color: #14599d; border: none; padding: 0 10px; color: #ffffff; font-size: 22px; border-radius: 5px;  margin-right: 10px;"><i class="bi bi-megaphone-fill"></i></button>
        <div id="form_announce" class="form_announce position-absolute w-75 " style="background-color:antiquewhite; right: 0; top: 0;box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px; padding: 10px; border-radius: 5px ; overflow: hidden;">
            <form action="data/add_announce/add_announcement.php" method="POST" enctype="multipart/form-data" >
                <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                    <h1 style="font-size: 22px;">Post Announcements</h1>
                    <i class="bi bi-x" style="background-color: #14599d; color: #ffffff; border: none; padding: 2px 10px; float: right; font-size: 20px; cursor: pointer;" id="close_announce"></i>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" name="txt_announce" id="floatingTextarea" style="height: 300px;"></textarea>
                    <label for="floatingTextarea">Announcement</label>
                </div>
                <div class="mb-3 mt-2">
                    <input class="form-control" type="file" id="formFile" name="my_image">
                </div>
                <button type="submit" name="post_announce" style="background-color: #14599d; color: #ffffff; border: none; padding: 2px 40px; float: right; font-size: 18px;">Post</button>
                </form>
        </div>
        
        ';
    }
}
function add_student(){
    include 'roomsql.php';
    $user_type = $resultEmail["User_Type"];
    if($user_type == "Teacher" || $user_type == "Admin"){
        echo '
        <button id="add_student" style="background-color: #14599d; border: none; padding: 0 10px; color: #ffffff; font-size: 22px; border-radius: 5px;  margin-right: 10px;"><i class="bi bi-people-fill"></i></button>
        
        <div class="align-items-center justify-content-center position-absolute" style="background-color: rgba(0,0,0, .7); top:0; bottom:0; right:0; left:0; z-index:999;" id="card_add_user">
            <div class="" style="max-width: 900px; width:100%; background-color:white; padding:10px 20px; border-radius: 10px;">    
                <div class="d-flex align-items-center justify-content-between">
                    <h2>New Student</h2>
                    <button style="background-color: transparent; color:#14599d; font-size:27px;" id="btn_close_student"><i class="bi bi-x-circle"></i></button>
                </div>    
                <div class="form_student d-flex flex-wrap mt-5">
                    <div class="mb-3">
                        <label for="LName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="L_name" name="Last_Name" />
                    </div>
                    <div class="mb-3">
                        <label for="FName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="F_name" name="First_Name" />
                    </div>
                    <div class="mb-3">
                        <label for="MName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="M_name" name="Middle_Name" />
                    </div>
                    <div class="mb-3">
                        <label for="BDay" class="form-label">Birth-Day</label>
                        <input type="date" class="form-control" id="B_Day" name="B_Day"  />
                    </div>
                    <div class="mb-3">
                        <label for="add_Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="add_Email" name="add_Email" />
                    </div>
                    <div class="mb-3 position-relative">
                            <label for="Password" class="form-label">Password</label>
                            <input type="Password" class="form-control" id="Password" name="Password"  />
                            <button type="button" style="color:#14599d; background-color:transparent; position:absolute; top: 55%; right:15%; font-size:18px; border:none; outline:none;" class="p-0 m-0" id="btn_pass">
                                <i class="bi bi-eye-fill" id="show_pass" ></i>
                                <i class="bi bi-eye-slash-fill" id="hide_pass" style="display: none;"></i>
                            </button>
                    </div>
                    <div class="mb-3">
                        <label for="SY" class="form-label">Year and Section</label>
                        <input type="text" class="form-control" id="SY" name="Y&S"  />
                    </div>
                    <div class="mb-3">
                        <label for="courseCode" class="form-label">Course Code</label>
                        <input type="text" class="form-control" id="courseCode" name="Course_Code"  />
                    </div>
                    
                </div>
                <div class="btn-add-student d-flex align-items-center justify-content-center">
                        <button id="new_student">Add Student</button>
                    </div>
            </div>
        </div>
        ';
    }
}

function add_teacher(){
    include 'roomsql.php';
    $user_type = $resultEmail["User_Type"];
    if($user_type == "Admin"){
        echo '
        <button id="add_student" style="background-color: #14599d; border: none; padding: 0 10px; color: #ffffff; font-size: 22px; border-radius: 5px;  margin-right: 10px;"><i class="bi bi-people-fill"></i></button>
        
        <div class="align-items-center justify-content-center position-absolute" style="background-color: rgba(0,0,0, .7); top:0; bottom:0; right:0; left:0; z-index:999;" id="card_add_user">
            <div class="" style="max-width: 900px; width:100%; background-color:white; padding:10px 20px; border-radius: 10px;">    
                <div class="d-flex align-items-center justify-content-between">
                    <h2>New Teacher</h2>
                    <button style="background-color: transparent; color:#14599d; font-size:27px;" id="btn_close_student"><i class="bi bi-x-circle"></i></button>
                </div>    
                <div class="form_student d-flex flex-wrap mt-5">
                    <div class="mb-3">
                        <label for="LName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="L_name" name="Last_Name" />
                    </div>
                    <div class="mb-3">
                        <label for="FName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="F_name" name="First_Name" />
                    </div>
                    <div class="mb-3">
                        <label for="MName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="M_name" name="Middle_Name" />
                    </div>
                    <div class="mb-3">
                        <label for="BDay" class="form-label">Birth-Day</label>
                        <input type="date" class="form-control" id="B_Day" name="B_Day"  />
                    </div>
                    <div class="mb-3">
                        <label for="add_Email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="add_Email" name="add_Email" />
                    </div>
                    <div class="mb-3 position-relative">
                            <label for="Password" class="form-label">Password</label>
                            <input type="Password" class="form-control" id="Password" name="Password"  />
                            <button type="button" style="color:#14599d; background-color:transparent; position:absolute; top: 55%; right:15%; font-size:18px; border:none; outline:none;" class="p-0 m-0" id="btn_pass">
                                <i class="bi bi-eye-fill" id="show_pass" ></i>
                                <i class="bi bi-eye-slash-fill" id="hide_pass" style="display: none;"></i>
                            </button>
                    </div>
                    <div class="mb-3">
                        <label for="SY" class="form-label">Year and Section</label>
                        <input type="text" class="form-control" id="SY" name="Y&S"  />
                    </div>
                    <div class="mb-3">
                        <label for="courseCode" class="form-label">Course Code</label>
                        <input type="text" class="form-control" id="courseCode" name="Course_Code"  />
                    </div>
                    
                </div>
                <div class="btn-add-student d-flex align-items-center justify-content-center">
                        <button id="new_student">Add Teacher</button>
                    </div>
            </div>
        </div>
        ';
    }
}
function add_course(){
    include 'roomsql.php';
    $user_type = $resultEmail["User_Type"];
    if($user_type == "Admin"){
        echo '
        <button style="background-color: #14599d; border: none; padding: 0 10px; color: #ffffff; font-size: 26px; border-radius: 5px;  margin-right: 10px;" class="d-flex align-items-center justify-content-center" id="btn_add_course">
            <i class="bi bi-plus"></i>
            <i class="bi bi-boxes"></i>
        </button>
        <div style="position: absolute; top: 0; bottom:0; left:0; right:0; background-color:rgba(0,0,0, 0.6); display:none;" class="align-items-center justify-content-center" id="add_course_page">
            <div style="background-color: #ffffffff; width:40%; padding:10px 20px; border-radius:10px;">
                <div class="d-flex align-items-center justify-content-between" style="margin-bottom: 30px;">
                    <h2>Course</h2>
                    <button style="color: #14599d; border: none; padding: 0 10px; background-color: transparent; font-size: 26px; " id="btn_close_course"><i class="bi bi-x-circle"></i></button>
                </div>
                <form action="data/add_course.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <div class="mb-">
                            <label for="" class="form-label">Course Code</label>
                            <input type="text" class="form-control" name="Course_Code" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Course Name</label>
                            <input type="text" class="form-control" name="Course_Name" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Course Image</label>
                            <input type="file" class="form-control" name="Course_Img" >
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Year and Section</label>
                            <input type="text" class="form-control" name="year_section" >
                        </div>
                        </div>
                        <div  class="d-flex align-items-center justify-content-center m-3 mt-5">
                                <button style="background-color: #14599d; border: none; padding: 3px 10px; color: #ffffff; " id="add_course" name="add_course" type="submit">Add Course</button>
                        </div>
                </form>
            </div>
        </div>
        ';
    }
}

function to_email(){
    include 'roomsql.php';
    $sqlemail = "SELECT * FROM account WHERE User_Type= 'Student'";
    $result_email = $mysqli->query($sqlemail);
 
        while($result = mysqli_fetch_array($result_email)){
            echo '<li style="margin: 5px 0; font-size:18px; cursor:pointer;">'.$result['Email'].'</li>';
        }



}
?>