<?php   
   include "data/include/include.php";
    dash();

if(isset($_GET['ID'])){
        $courseID = $_GET['ID'];
        $courseName = $_GET['course'];

        $assID = $_GET['assID'];
        $accID = $_SESSION['ID'];

        $sqlcourse = "SELECT * FROM courses WHERE Course_ID = '$courseID'";
        $resultCourse = $mysqli->query($sqlcourse);
        $resultInfo = $resultCourse->fetch_assoc(); 

        $sqlassignment = "SELECT * FROM assigment WHERE Assignment_ID = '$assID'";
        $resultAssignment = $mysqli->query($sqlassignment);
        $result_ass = $resultAssignment->fetch_assoc(); 

        $sqlsubmission = "SELECT * FROM submission WHERE Assignment_ID = '$assID' AND Account_ID = '$accID'";
        $resultSubmission = $mysqli->query($sqlsubmission);
        $result_sub = $resultSubmission->fetch_assoc(); 

       
        

    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonst -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abyssinica+SIL&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/footer.css">
    <link rel="stylesheet" href="style/course.css">
    <link rel="stylesheet" href="style/viewAss.css">
    <link rel="stylesheet" href="../style/media.css">
    <link rel="stylesheet" href="style/media.css">
    <!-- js -->
    <script src="../js/app.js" defer></script>
    <script src="../js/sub_ass.js" defer></script>
    <title>kodego dashboard</title>
    <style>@media(max-width:1200px){ button#hide-navbar{display: block !important;}}</style>
</head>
<body class="d-flex justify-content-between vh-100 flex-column">
    <div>
        <header>
            <div class="wrap d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <button style="color: #ffffffff; font-size: 30px; display:none; margin-right:10px;" id="btn-navbar"><i class="bi bi-list"></i></button>
                </div>
                <div class="right-user">
                    <button id="btn-message">
                        <i class="bi bi-envelope-fill"></i>
                    </button>
                    <button id="btn-notif">
                        <i class="bi bi-bell-fill"></i>
                    </button>
                    <button id="show-box-logout">
                        <span class="name_student" id="name_user"><?php name(); ?> <i class="bi bi-caret-down-fill"></i></span>
                    </button>
                    <div class="box-acc" id="logout-box">
                        <div class="img-acc">
                            <img src="../upload/profile_img/<?php echo img_user(); ?>" style="height: 60px; margin-right: 15px; clip-path: circle();" alt="">
                        </div>
                        <div class="inf-acc">
                            <h2><?php name();?></h2>
                            <span><?php user_type(); ?></span>
                            <br>
                            <span>
                                <?php email(); ?>
                            </span>
                            <div class="btn-acc">
                                <form action="../../database/logout.php" method="POST">
                                    <button id="logout-accnt" type="submit" name="btn-logout">Log-out</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="dashboard">
            <div class="wrap d-flex ">
                <div class="nav-bar">
                    <button id="hide-navbar" style="display:none; float: right; background-color:transparent; color:#14599d; border:none; font-size:22px;"><i class="bi bi-arrow-left"></i></button>
                    <br>
                    <img src="../../images/image-removebg-preview.png" alt="">
                    <nav>
                        <ul>
                            <li>
                                <i class="bi bi-house-fill"></i>
                                <a href="../room.php
                                ">Home</a>
                            </li>
                            <li style="background-color: rgb(20, 89, 157 , .1);">
                                <i class="bi bi-boxes"></i>
                                <a>Courses</a>
                                <ul class="course_user">
                                    <span>Course</span>
                                    <?php nav_course(); ?>
                                </ul>
                            </li>
                            <li >
                                <i class="bi bi-megaphone-fill"></i>
                                <a href="../announcement.php
                                ">Announcement</a>
                            </li>
                            <li >
                                <i class="bi bi-chat-right-text-fill"></i>
                                <a href="">Message</a>
                            </li>
                            <li >
                                <i class="bi bi-people-fill"></i>
                                <a href="../student.php
                                ">Student</a>
                            </li>
                            <li>
                                <i class="bi bi-person-fill"></i>
                                <a href="../teacher.php
                                ">teacher</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="content-modul">
                <h1 style="color: #000; font-size: 26px;"><?php echo $resultInfo['Course_Name']  ?></h1>
                    <div class="top-modul">
                    </div>
                    <div class="btn_course d-flex justify-content-between position-relative">
                        <ul class="d-flex">
                        <li><a href="course.php?course=<?php echo$courseName?>&ID=<?php echo$courseID ?>">Modules</a></li>
                            <li class="assigment" ><a href="assignment.php?course=<?php echo $resultInfo['Course_Name']; ?>&ID=<?php echo $courseID?>">Assignment</a></li>
                        </ul>

                    </div>
                     <div class="mt-3 m-3">
                        <h3 style="font-size: 30px; border-bottom: 2px solid rgb(141, 141, 146);" >Instructions</h3>
                        <br>
                        <a style="font-size: 24px; text-decoration:underline;" href="assignment_upload/<?php echo $result_ass['Assignment_File']; ?>" type="application/pdf" target="_blank"><?php echo $result_ass['Assigment_Title'] ?></a>
                        <br>
                        <button id="submit-ass" class="btn btn-primary mt-3 " ><i class="bi bi-plus"></i> Prepare answer</button>

                        <div id="prepare-answer" style="position: absolute; top: 0; left: 0; right: 0; bottom:0; z-index: 999; background-color: rgba(0, 0, 0, 0.5); display: none; align-items: center; justify-content: center;">
                            <div class="form" style="background-color:antiquewhite; width: 40%; padding: 10px 20px; border-radius: 10px;">
                                <h4 style="font-size: 25px; font-weight: 600;">Prepare answer for <?php echo $result_ass['Assigment_Title'] ?></h4>
                                <h5 style="font-size: 22px; margin: 10px 0;" >Your answer</h5>
                                <span>Select the files to upload and then select one of the Save options.
                                    The maximum total size of the files is 200 MB.</span>
                                <form action="data/submit_assignment.php" method="POST" enctype="multipart/form-data">
                                    <div class="m-3">
                                        <input class="form-control form-control-sm" id="formFileSm" name="ass_file" type="file">
                                    </div>
                                    <div class="m-3">
                                        <input class="form-control form-control-sm" id="formFileSm" name="ass_id" type="hidden" value="<?php echo $assID ?>">
                                    </div>
                                    <div class="m-3">
                                        <input class="form-control form-control-sm" id="formFileSm" name="course_id" type="hidden" value="<?php echo $courseID ?>">
                                    </div>
                                    <button id="btn-sub" class="btn btn-primary" name="sub_assignment" type="submit" style="font-size: 14px; padding: 5px 20px; margin-top: 20px;">Submit</button> 
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="right-modul">
                    
                    <div class="top-right">
                        <h3>Assigment</h3>
                        <ul>
                            <li>
                                Max score: <?php echo $result_ass['Max_score'] ?>
                            </li>
                            <li>
                                Due: <?php echo $result_ass['Due_Date'] ?>
                            </li>
                        </ul>
                    </div>
                    <div class="mid-right">
                        <h3>Score</h3>
                        <ul>
                            <?php 
                                if($resultSubmission-> num_rows == true){
                                    echo '
                                    <li>
                                        <div class="m-2">
                                            <label for="">Score: </label>
                                            <input readonly value="'.$result_sub['Score'].'" type="text" name="score" style="width:40%; text-align: center; border: none;  outline: none;"  />
                                        </div>
                                    </li>
                                    ';
                                }
                                else{
                                    echo '<li>
                                            <i class="bi bi-x-circle" style="margin-right: 5px; "></i>Nothing Submission 
                                        </li>';
                                }
                            
                            ?>
                        </ul>
                    </div>
                    <div class="mid-right">
                        <h3>Answer</h3>
                        <ul>
                        <?php 
                                if($resultSubmission-> num_rows == false){
                                    echo '
                                    <li>
                                        <i class="bi bi-x-circle" style="margin-right: 5px; "></i>Nothing Submitted
                                    </li>
                                    
                                    ';
                                }
                                else{
                                    echo '<li>
                                            <a href="submission/'.$result_sub['Assignment_Ans'].'" target="_blank" type="application/pdf">View answer</a>
                                        </li>';
                                }
                            
                            ?>
                        </ul>
                    </div>
                    <div class="bot-right">
                        <h3>Comments</h3>
                        <div class="mt-3">
                            <?php 
                            if($resultSubmission->num_rows ==  true ){
          
                                $subID = $result_sub['Submission_ID'];
                                comment($subID);
                                
                    
                            }
                            ?>
                        </div>
                        <div>
                        <form action="data/comment.php" method="POST">
                                <div class="form-floating">
                                    <input type="hidden" name="submission_ID" value="<?php echo $subID  ?>">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comment" style="height: 200px; resize: none;"></textarea>
                                    <label for="floatingTextarea">Comments</label>
                                  </div>
                                  <button type="submit" name="post_comment" style="color: #ffffffff;">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="">
        <div class="wrap d-flex justify-content-around">
            <div class="">
                <span>Follow Us</span>
                <ul class="d-flex justify-content-center">
                    <li><a href=""><img src="../../images/footer/sm1.png" alt=""></a></li>
                    <li><a href=""><img src="../../images/footer/sm2.png" alt=""></a></li>
                    <li><a href=""><img src="../../images/footer/Instagram-Icon.png" alt=""></a></li>
                    <li><a href=""><img src="../../images/footer/YouTube_full-color_icon_(2017).svg.webp" alt=""></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class=" wrap bot-footer">
                <h5>© 2022 KodeGo All Rights Reserved</h5>
            </div>
        </div>
    </footer>
</body>
</html>
<?php include 'data/script.php'; ?>

