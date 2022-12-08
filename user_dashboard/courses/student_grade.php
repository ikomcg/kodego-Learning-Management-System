<?php 
 include "data/include/include.php";
 dash();
 if(isset($_GET['ID']) ){
    $courseID = $_GET['ID'];
    $courseName = $_GET['course'];
    $course_code = $_GET['courseCode'];

    $sqlcourse = "SELECT * FROM courses WHERE Course_ID = '$courseID'";
    $resultCourse = $mysqli->query($sqlcourse);
    $resultInfo = $resultCourse->fetch_assoc(); 
         
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
    <link rel="stylesheet" href="style/student_Grade.css">
    <link rel="stylesheet" href="../style/media.css">
    <link rel="stylesheet" href="style/media.css">
    <!-- js -->
    <script src="../js/app.js" defer></script>
    <script src="../../js/sweetalert.min.js" defer></script>
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
                                <a >Courses</a>
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
                    <div class="btn_course d-flex justify-content-between mt-4 ">
                        <ul class="d-flex">
                            <li><a href="course.php?course=<?php echo$courseName?>&ID=<?php echo$courseID ?>">Modules</a></li>
                            <li ><a href="assignment.php?course=<?php echo$courseName?>&ID=<?php echo$courseID ?>">Assignment</a></li>
                            <?php 

                            ?>
                            <li class="assigment" ><a href="student_grade.php?course=<?php echo $courseName?>&ID=<?php echo$courseID ?>&courseCode=<?php echo$resultInfo['Course_Code'] ?>">Grade</a></li>
                        </ul>
                    </div>
                    <div >
                        <table id="student_grade">
                            <tr>
                                <th style="width: 300px;">Student </th>
                                <?php assignment($courseID); ?>
                            </tr>
                            
                            <?php student_name($course_code, $courseID)?>
                        </table>
                        <div>
                            <form action="data/export_grade.php" method="POST">
                                <input type="hidden" name="course_ID" value="<?php echo $courseID ?>">
                                <input type="hidden" name="course_code" value="<?php echo $course_code ?>">
                                <button class="btn btn-success" style="font-size: 14px; padding:5px; margin-top:10px" name="export_grade">Export to excel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="right-modul">
                    <div class="calendar">
                        <div>
                            <h1>September 2022</h1>
                        </div>
                        <table>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thur</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td style="background-color: #14599d; color: #ffffffff;" >8</td>
                                <td>9</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>19</td>
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                                <td>30</td>
                                <td>31</td>
                            </tr>
                        </table>
                    </div>
                    <div class="online">
                        <div>
                            <span style="margin-left: 10px;">Online</span>
                            <div>
                                <ul>
                                    <?php online() ?>
                                </ul>
                            </div>
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