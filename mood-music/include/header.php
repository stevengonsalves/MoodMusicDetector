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

    <!-- Header Section Begin -->
    <header class="header header--normal">
    <div class="container">
        <div class="row">
        <div class="col-lg-2 col-md-2">
    <div class="header__logo">
        <a href="./index.php">
            <img src="music.png" alt="" style="max-width: 100px; max-height: 100px;">
        </a>
    </div>
</div>

            <div class="col-lg-10 col-md-10">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            
                        <?php
                            if ($_SESSION['type'] == 'User') {
                                ?>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="">Detect</a></li>
                                <li><a href="music.php">Music</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="feedback.php">Feedback</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="user_managment.php">User Management</a></li>
                                <li><a href="feedback.php">Report</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="include/logout.php">Logout</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>

    <!-- Header Section End -->
