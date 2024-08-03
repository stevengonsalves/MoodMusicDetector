<?php
session_start();

require_once 'include/connection.php';

if (isset($_POST['login'])) {

    $u_email = $_POST['email'];
    $u_password = $_POST['password'];

    $sql = "SELECT * FROM login_master WHERE email = '$u_email' AND password = '$u_password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        // After a successful login, determine the user's type and set it in the session.
        $_SESSION['isLogin'] = true;
        $_SESSION['email'] = $u_email;
        
        // Determine the user's type from the database result and set it in the session.
        if ($row['user_type'] == 'Admin') {
            $_SESSION['type'] = 'Admin';
        } else {
            $_SESSION['type'] = 'User';
        }

        echo "<script>alert('You have logged in successfully');location.href='home.php'</script>";
    } else {

        echo "<script>alert('Invalid credentials you have entered')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DJoz Template">
    <meta name="keywords" content="DJoz, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/nowfont.css" type="text/css">
    <link rel="stylesheet" href="css/rockville.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Contact Section Begin -->
    <section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="contact__form">
                    <style>
                        .contact__form {
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Adjust the shadow properties */
                            padding: 20px; /* Add padding for a card-like appearance */
                            border-radius: 10px; /* Add rounded corners */
                        }
                    </style>
                    <div class="section-title">
                        <h2 class="text-center">LOGIN</h2>
                    </div>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                        </div>
                        <div class="mt-3">
                            <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="site-btn" name="login">LOGIN</button>
                        </div>
                        <div class="mt-3 text-center">Don't have an account? <a href='register.php'>Register</a></div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</section>


<!-- Contact Section End -->

<!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Music Plugin -->
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/jplayerInit.js"></script>
</body>

</html>