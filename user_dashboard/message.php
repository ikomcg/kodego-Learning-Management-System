<?php   
   
    include 'data/includes/include.php';
    dash();
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
    <link rel="stylesheet" href="style/message.css">
    <link rel="stylesheet" href="style/course.css">
    <link rel="stylesheet" href="style/media.css">
    <!-- js -->
    <script src="js/app.js" defer></script>
    <script src="js/message.js" defer></script>
    <script src="data/js/gc.js" defer></script>
    <script src="data/js/message.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/sweetalert.min.js" defer></script>
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
                        <span class="name_student" id="name_user"><?php name(); ?> <i class="bi bi-caret-down-fill"></i></span>
                    </button>
                    <div class="box-acc" id="logout-box">
                         <div class="img-acc" style="text-align: center;">
                            <img src="upload/profile_img/<?php img_user(); ?>" style="margin-right: 15px; clip-path: circle();" alt="">
                        </div>
                        <div class="inf-acc">
                            <h2><?php name(); ?></h2>
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
                    <button id="hide-navbar" style="display:none; float: right; background-color:transparent; color:#14599d; border:none; font-size:22px;"><i class="bi bi-arrow-left"></i></button>
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
                                <a>Courses</a>
                                <ul class="course_user">
                                    <span>Course</span>
                                    <?php nav_course();?>
                                </ul>
                            </li>
                            <li >
                                <i class="bi bi-megaphone-fill"></i>
                                <a href="announcement.php">Announcement</a>
                            </li>
                            <li style="background-color: rgb(20, 89, 157 , .1);">
                                <i class="bi bi-chat-right-text-fill"></i>
                                <a href="message.php">Message</a>
                            </li>
                            <li>
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
                    <div class="top-modul d-flex justify-content-between align-items-center justify-content-center" id="message-top">
                        <h1>Messages</h1>
                        <div class="m-3 mb-0 mt-0 ">
                            <button class="slide">Inbox</button>
                            <button class="slide">My message</button>
                            <button class="slide">Group</button>
                        </div>
                    </div>
                    <div class="message-slide">
                        <div class="message 0 w-100">
                            <h2 style="padding: 10px; margin-bottom: 10px; color: #ffffff; background-color:#14599d; font-size:18px;">Inbox</h2>
                            <div class="message_column" style="height: 100vh; overflow:scroll;">
                                <?php inbox();?>
                            </div>
                        </div>
                        <div class="message 1 w-100">
                            <div style="background-color:#14599d" class="d-flex justify-content-between align-items-center position-relative mb-2">
                                <h2 style="padding: 10px; color: #ffffff; font-size:18px;">My message</h2>
                                <button class="p-0" id="open_message" style="margin-right: 20px; font-size: 22px; color: #ffffff  ;"><i class="bi bi-envelope-plus" ></i></button>
                                <div class="send_message" id="send-message">
                                    <div class="d-flex m-2 align-items-center justify-content-between">   
                                        <h1 class="m-0" style="font-size: 22px;">Message</h1>
                                       <button id="close_message"><i class="bi bi-x"></i></button>
                                    </div>
                                    <div class="message">
                                        <div class="m-1 mb-3">
                                            <label for="exampleInputEmail1" class="form-label" style="font-size: 18px;">Email address</label>
                                            <input type="email" class="form-control" id="email_to"  placeholder="To">
                                            <!-- <div>
                                                <ul style="background-color: #ffffffff; padding:10px;">
                                                   
                                                   // to_email() ?>
                                                    
                                                </ul>
                                            </div> -->
                                        </div>
                                        <div class="form-floating p-2">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                        <button type="button" id="send_message" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                            <div class="message_column" style="height: 100vh; overflow:scroll;">
                            <?php my_message(); ?>
                                
                            </div>
                            
                        </div>
                        <div class="message 2 group">
                            <h2 style="padding: 10px; margin-bottom: 10px; color: #ffffff; background-color:#14599d; font-size:18px;">Group message</h2>
                            <div class="d-flex flex-column justify-content-between" style="height: 90vh;">
                                <div class="message_column" style="overflow:scroll;">
                                        <?php gc_message(); ?>
                                    <!-- <div class="col-inbox" style="margin-left: 35px;">
                                        <div class="d-flex align-items-center top-inbox">
                                            <img src="../images/account-icon.png" alt="">
                                            <span style="margin-left: 5px;">Juan Dela Cruz</span>
                                        </div>
                                        <div class="message-inbox">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, reprehenderit!Lorem Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            </p>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-inbox" id="my_message_group">
                                        <div class="d-flex align-items-center flex-row-reverse  top-inbox">
                                            <img src="../images/account-icon.png" alt="">
                                            <span style="margin-right: 5px;">You</span>
                                        </div>
                                        <div class="message-inbox">
                                            <p>
                                                 Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                            </p>
                                        </div>
                                    </div> -->

                                </div>
                                <div class="send_group_message" style="background-color: #ffffff;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px; background-color: antiquewhite;"> 
                                    <div class="d-flex w-100 align-items-end">
                                        <div class="form-floating p-2 w-100">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="message_gc" style="height: 100px"></textarea>
                                            <label for="message_gc">Message</label>
                                        </div>
                                        <button style="margin:10px; margin-left:0 ;" class="btn btn-primary" type="button" id="send_gc_message">Send</button>
                                    </div>
                                </div>
                            </div>
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