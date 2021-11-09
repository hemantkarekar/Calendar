<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My2021Calender - Login</title>
    <link rel="stylesheet" href="assets/css/layouts.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a0b438cfb9.js" crossorigin="anonymous"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8YYX5CSXC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-Q8YYX5CSXC');
    </script>
</head>

<body>
    <main role="main" class="authenticate">
        <div class="auth">
            <div class="main-wrap">
                <div class="auth-container row">
                    <div class="img-wrap col-lg-6 col-sm-12">
                        <img src="assets/images/poster-bg-calender.jpg" alt="">
                    </div>
                    <div class="auth-wrap col-lg-6 col-sm-12">
                        <div class="auth-heading">
                            <div class="heading-wrap">
                                <h1 class="heading">
                                    Welcome
                                </h1>
                                <h3> to </h3>
                            </div>
                        </div>
                        <div class="auth-interface">
                            <p class="instructions">
                                CREATE YOUR CALENDAR NOW
                            </p>
                            <p class="instructions">
                                CLICK ON START BUTTON
                            </p>
                            <div class="auth-btns">
                                <div class="auth-login"><a href="#" id="loginBtn">START</a></div>
                            </div>
                        </div>
                    </div>
                    <div class=" brandings col-12">
                        <img src="assets/images/brands1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="signup" id="signup">
            <div class="signup-wrap">
                <div class="signup-head"><i class="fas fa-times" id="close-modal1"></i></div>
                <form action="signup.php" method="get">
                    <div class="form-input">
                        <input type="text" name="name" placeholder="Your Name" />
                    </div>
                    <div class="form-input">
                        <input type="email" name="email" placeholder="Your Email" />
                    </div>
                    <div class="form-input">
                        <input type="text" name="contact" placeholder="Contact Number" />
                    </div>
                    <div class="form-input">
                        <input type="text" name="username" placeholder="Create Username" onkeydown="return isValid(event)" />
                    </div>
                    <div class="form-input">
                        <input type="password" name="createpass" placeholder="Create Password">
                    </div>

                    <div class="form-input"><input type="password" name="passreenter" placeholder="Re-enter Password"></div>

                    <div class="form-input submit">
                        <input type="submit" value="Sign Up">
                        <input type="reset" value="Clear">
                    </div>
                </form>
            </div>
        </div>
        <div class="login" id="login">
            <div class="login-wrap">
                <div class="login-head"><i class="fas fa-times" id="close-modal2"></i></div>
                <form action="login.php" method="get">
                    <div class="form-input">
                        <input type="text" name="usrname" placeholder="Employee Code" />
                    </div>
                    <div class="form-input">
                        <input type="password" name="pass" placeholder="Password">
                    </div>
                    <div class="form-input submit text-center">
                        <input type="submit" value="Log In">
                        <input type="reset" value="Clear">
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/custom.js"></script>
</body>

</html>