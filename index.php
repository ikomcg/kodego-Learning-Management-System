<?php 
session_start();
if(isset($_SESSION["Account"])){
    if( $_SESSION["Account"] == "valid"){

    echo ' <script>window.location.href = "http://localhost/eLMS/user_dashboard/room.php"</script>';
    }
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
    <!-- Style -->
    <link rel="stylesheet" href="style/style.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/footer.css">
    <link rel="stylesheet" href="style/account.css">
    <link rel="stylesheet" href="style/media.css">
    <!-- js -->
    <script src="js/portal.js" defer></script>
    <script src="database/js/register.js" defer></script>
    <script src="database/js/login.js"defer></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Kodego eLMS</title>
</head>
<body>
     <header>
         <div class="wrap">
             <div class="header d-flex flex-row justify-content-between align-items-center">
                 <div class="left-header d-flex align-items-center">
                    <a href="index.html">
                        <img src="images/image-removebg-preview.png" alt="">
                    </a>
                    <span class="mt-3 mb-2" style="margin-left: 10px;">Kodego Learning Management System</span>
                 </div>
                
             </div>
        </div>
    </header>
    <section class="home-page-top">
        <div class="home-kodego d-flex flex-column align-items-start justify-content-center">
            <div class="wrap d-flex justify-content-around">
                <div class=" d-flex flex-column align-items-start justify-content-center" id="kodego">
                    <img src="images/image-removebg-preview.png" alt="">
                    <div class="bot-kodego">
                        <h1>Welcome to KodeGo</h1>
                        <p>
                             We warmly welcome high school graduates, college transferees, second coursers, foreign applicants, and graduate program applicants to our campuses.
                        </p>
                    </div>
                    <button class="btn btn-primary" id="btn-enroll">Register now</button>
                </div>
                <div class="form-login">
                    <div class="">
                        <h2>Login</h2>
                        <span>Build Your Tech Career</span>
                        <div class="forms" style="text-align: left;">
                            <div class="mb-3 mt-3">
                                <label for="loginEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp" placeholder="Email" />
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="loginPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                                <button style="color:#14599d; background-color:transparent; position:absolute; top: 55%; right:5%; font-size:18px; border:none; outline:none;" class="p-0 m-0" id="btn_pass_log">
                                    <i class="bi bi-eye-fill" id="show_pass_log" ></i>
                                    <i class="bi bi-eye-slash-fill" id="hide_pass_log" style="display: none;"></i>
                                </button>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between mt-3 mb-3">
                                    <div>
                                         <input type="checkbox">
                                        <label for="checkremember">Remember me</label>
                                    </div>
                                    <a href="forgot.php">forgot password?</a>
                                </div>
                            </div>
                            
                                <button id="btn_login" type="submit" class="btn btn-primary">Login</button>
                           
                        </div>
                    </div>
                </div>
            </div>
         </div>
         
    </section>
    <div class="register-form" id="register-form">
            
        <div style="max-width: 900px; width: 100%; background-color: #ffffffff;">
            <button id="close-register" style="background-color: transparent; border: none; color: #14599d; font-size: 30px; float: right; margin: 0;"><i class="bi bi-x-circle" ></i></button>
            <div class="d-flex justify-content-center">
                <div>
                    <h2>Register</h2>
                    <span >Welcome to KodeGo</span>
                </div>
            </div>
           
            <div class="form">
                    <div class="mb-3">
                        <label for="">Last Name</label>
                        <input type="text" id="Lname" name="Lname" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="">First Name</label>
                        <input type="text" id="Fname" name="Fname" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <label for="">Middle Name</label>
                        <input type="text" id="Mname" name="Mname" placeholder="Middle Name">
                    </div>
                    <div class="mb-3">
                        <label for="">Birth Day</label>
                        <input type="date" id="B-Day" name="B-Day" placeholder="Birth Day">
                    </div>
                    <div class="mb-3">
                        <label for="">Gender</label>
                        <select class="form-select" aria-label="Default select example" id="gender">
                            <option selected style="display: none;">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Emai</label>
                        <input type="text" id="registerEmail" name="register_email" placeholder="Email">
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="">Password</label>
                        <input type="password" id="register_password" name="register_password" placeholder="Create Password">
                        <button style="color:#14599d; background-color:transparent; position:absolute; top: 55%; right:15%; font-size:18px; border:none; outline:none;" class="p-0 m-0" id="btn_pass">
                            <i class="bi bi-eye-fill" id="show_pass" ></i>
                            <i class="bi bi-eye-slash-fill" id="hide_pass" style="display: none;"></i>
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="">Confirm Password</label>
                        <input type="password" id="register_ConfirmPassword" name="ConPass" placeholder="Confirm Password">
                    </div>
                    <div class="mb-3">
                        <label for="">Select User </label>
                        <select class="form-select" id="user_Type" aria-label="Default select example">
                            <option selected style="display: none;">User type</option>
                            <option value="Student">Student</option>
                            <option value="Teacher">Teacher</option>
                          </select>
                    </div>
            </div>
            <button type="submit" id="btn_register" class="btn btn-primary">Register</button>
        </div>
     </div>
     <div id="loading" style="display:none; align-items:center; justify-content:center; position:absolute; top:0; bottom:0; left:0; right:0; background-color: rgba(0,0,0, 0.6);">
        <img style="width: 6%;" src="images/loading/35771931234507.564a1d2403b3a.gif" alt="">
     </div>
</body>
</html>
<?php require 'database/includes/script.php' ?>