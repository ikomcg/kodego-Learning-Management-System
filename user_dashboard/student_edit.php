<?php   
    include 'data/includes/include.php';
    dash();
    if(isset($_GET['ID'])){
        $id = $_GET['ID'];
        $userID = $_SESSION['ID'];
        $user_type = $_SESSION['user_type'];
        $sqlacc = "SELECT * FROM account WHERE account_ID = '$id'";
        $result = $mysqli->query($sqlacc);
        $resultInfo = $result->fetch_assoc();

        $sqlparents = "SELECT * FROM parents WHERE account_ID = '$id'";
        $results = $mysqli->query($sqlparents);
        $infoparents = $results->fetch_assoc();
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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/profiles.css">
    <link rel="stylesheet" href="style/course.css">
    <link rel="stylesheet" href="style/media.css">
    <!-- js -->
    <script src="js/app.js" defer></script>
    <script src="js/profile.js" defer></script>
    <title>kodego dashboard</title>
    <style>@media(max-width:1200px){ button#hide-navbar{display: block !important;}}</style>
</head>
<body class="d-flex justify-content-between vh-100 flex-column">
    <div>
        <header>
            <div class="wrap d-flex flex-row justify-content-between align-items-center">
                <div class="d-flex flex-column">
                    <button style="color: #ffffffff; font-size: 30px; display:none" id="btn-navbar"><i class="bi bi-list"></i></button>
                </div>
                <div class="right-user">
                    <button id="btn-message">
                        <i class="bi bi-envelope-fill"></i>
                    </button>
                    <button id="btn-notif">
                        <i class="bi bi-bell-fill"></i>
                    </button>
                    <button id="show-box-logout">
                        <span class="name_student" id="name_user"> <?php name(); ?> <i class="bi bi-caret-down-fill"></i></span>
                    </button>
                    <div class="box-acc" id="logout-box">
                        <div class="img-acc" style="text-align: center;">
                            <img src="upload/profile_img/<?php img_user(); ?>" style="margin-right: 15px; clip-path: circle();" alt="">
                        </div>
                        <div class="inf-acc">
                            <h2> <?php name(); ?> </h2>
                            <span><?php user_type(); ?></span>
                            <br>
                            <span>
                            <?php email(); ?> 
                            </span>
                            <div class="btn-acc">
                                <form action="../database/logout.php" method="POST">
                                    <button type="submit" id="logout-accnt" name="btn-logout">Log-out</button>
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
                    <button id="hide-navbar" style="display:none;  float: right; background-color:transparent; color:#14599d; border:none; font-size:22px;"><i class="bi bi-arrow-left"></i></button>
                    <br>
                    <img src="../images/image-removebg-preview.png" alt="">
                    <nav>
                        <ul>
                            <li>
                                <i class="bi bi-house-fill"></i>
                                <a href="room.php">Home</a>
                            </li>
                            <li>
                                <i class="bi bi-boxes"></i>
                                <a href="room.php">Courses</a>
                                <ul class="course_user">
                                    <span>Course</span>
                                    <?php nav_course();?>
                                </ul>
                            </li>
                            <li >
                                <i class="bi bi-megaphone-fill"></i>
                                <a href="announcement.php">Announcement</a>
                            </li>
                            <li >
                                <i class="bi bi-chat-right-text-fill"></i>
                                <a href="message.php">Message</a>
                            </li>
                            <li style="background-color: rgb(20, 89, 157 , .1);">
                                <i class="bi bi-people-fill"></i>
                                <a href="student.php">Student</a>
                            </li>
                            <li>
                                <i class="bi bi-person-fill"></i>
                                <a href="teacher.php">teacher</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="content-modul">
                    <div class="top-modul">
                        <h1>Students Profile</h1>
                    </div>
                    <div class="student_profile">
                        <img style="clip-path: circle();" src="upload/profile_img/<?php echo $resultInfo['profile_img'] ?>" alt="">

                        <div class="information">
                           
                            <form action="data/edit_profile/edit_student.php" method="POST" class="d-flex " enctype="multipart/form-data">
                                <div class="form_student">
                                    <div class="mb-3">
                                        <label  for="formFile" class="form-label">Change Profile</label>
                                        <input class="form-control" type="file" id="formFile" name="profile" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="LName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="LName" name="Last_Name" value="<?php echo $resultInfo['Last_Name'] ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                      <label for="FName" class="form-label">First Name</label>
                                      <input type="text" class="form-control" id="FName" name="First_Name" value="<?php echo $resultInfo['First_Name'] ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="MName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="MName" name="Middle_Name" value="<?php echo $resultInfo['Middle_Name'] ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="BDay" class="form-label">Birth-Day</label>
                                        <input type="text" class="form-control" id="BDay" name="B_Day" value="<?php echo $resultInfo['Birth_Day'] ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?> />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" name="Email" value="<?php echo $resultInfo['Email'] ?>" <?php  if($user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3 position-relative">
                                        <label for="Password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="Password" id="Password"  value="<?php echo $resultInfo['Password'] ?>" <?php  if( $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?> />
                                        <button type="button" style="color:#14599d; background-color:transparent; position:absolute; top: 55%; right:5%; font-size:18px; border:none; outline:none;" class="p-0 m-0" <?php if($user_type == 'Admin' || $user_type == 'Teacher'){ echo 'id="btn_pass"';} ?>>
                                            <i class="bi bi-eye-fill" id="show_pass" ></i>
                                            <i class="bi bi-eye-slash-fill" id="hide_pass" style="display: none;"></i>
                                        </button>
                                    </div>
                                    <div class="mb-3">
                                        <label for="SY" class="form-label">Year and Section</label>
                                        <input type="text" class="form-control" id="SY" name="Y&S" value="<?php echo $resultInfo['Year_Section'] ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?> />
                                    </div>
                                    <div class="mb-3">
                                        <label for="Phone" class="form-label">Phone number</label>
                                        <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echo $resultInfo['Phone'] ?>"<?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?> />
                                    </div>
                                    <div class="mb-3">
                                        <label for="courseCode" class="form-label">Course Code</label>
                                        <input type="text" class="form-control" id="courseCode" name="Course_Code" value="<?php echo $resultInfo['Course_Code'] ?>"<?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>  />
                                    </div>
                                    
                                    <div class="mb-3">
                                        <!-- <label for="courseCode" class="form-label">Student ID</label> -->
                                        <input type="hidden" class="form-control" id="studenID" name="Student_ID" value="<?php echo $resultInfo['account_ID'] ?>"<?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?> />
                                    </div>
                                </div>
                                <h2>Parents information</h2>
                                <div class="form_parents">
                                   
                                    <div class="mb-3">
                                        <label for="LPName" class="form-label">Mother's Name</label>
                                        <input type="text" class="form-control" id="LPName" name="mother_name" value="<?php echo $infoparents['Mother_Name']; ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="PPhone" class="form-label">Phone number</label>
                                        <input type="text" class="form-control" id="mother_phone" name="mother_phone"  value="<?php echo $infoparents['Mother_Phone']; ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" id="mother_Occupation" name="mother_occup"  value="<?php echo $infoparents['Mother_Occupation']; ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                      <label for="FPName" class="form-label">Father's Name</label>
                                      <input type="text" class="form-control" id="FPName" name="father_name"  value="<?php echo $infoparents['Father_Name']; ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="PPhone" class="form-label">Phone number</label>
                                        <input type="text" class="form-control" id="PPhone" name="father_phone"  value="<?php echo $infoparents['Father_Phone']; ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" id="father_Occupation" name="father_occup"  value="<?php echo $infoparents['Father_Occupation']; ?>" <?php  if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin' ){echo '';} else{echo 'readonly';}?>/>
                                    </div>
                                </div>
                                <div class="btn-info d-flex align-items-center justify-content-center ">
                                    <?php
                                        if($resultInfo['account_ID'] == $userID || $user_type == 'Teacher' || $user_type == 'Admin'){
                                            echo '<button type="submit" class="btn btn-primary" name="student_update">Update</button>';
                                        }
                                        if($user_type == 'Teacher' || $user_type == 'Admin'){
                                            echo '<button class="btn btn-danger" name="delete_account">Delete</button>';
                                        }
                                    ?>
                                    
                                    
                                </div>
                              

                                
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
                        <div>
                            <!-- <button>
                                <a href="">full calendar</a>
                            </button> -->
                        </div>
                    </div>
                    <div class="online">
                        <div>
                            <span style="margin-left: 10px;">Online</span>
                            <div>
                                <ul>
                                    <?php online(); ?>
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
                    <li><a href=""><img src="../images/footer/sm1.png" alt=""></a></li>
                    <li><a href=""><img src="../images/footer/sm2.png" alt=""></a></li>
                    <li><a href=""><img src="../images/footer/Instagram-Icon.png" alt=""></a></li>
                    <li><a href=""><img src="../images/footer/YouTube_full-color_icon_(2017).svg.webp" alt=""></a></li>
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
<?php include 'data/includes/script.php'; ?>