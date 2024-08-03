<?php
session_start();

if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    // Validate form data (e.g., password complexity checks)

    // Check if the current password matches the user's actual password (you need to implement user authentication)
    $user_id = $_SESSION['user_id']; // Get the user's ID from the session
    $current_password = $_POST['current_password']; // Current password from the form

    // Connect to your database and fetch the user's actual password
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT password FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();

    if (password_verify($current_password, $db_password)) {
        // Current password is correct

        // Check if the new password and confirmation match
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($new_password === $confirm_password) {
            // Update the user's password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            $update_sql = "UPDATE users SET password = ? WHERE user_id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $hashed_password, $user_id);

            if ($update_stmt->execute()) {
                echo "Password changed successfully!";
            } else {
                echo "Error updating password: " . $update_stmt->error;
            }
        } else {
            echo "New password and confirmation do not match.";
        }
    } else {
        echo "Current password is incorrect.";
    }

    $stmt->close();
    $update_stmt->close();
    $conn->close();
} else {
    echo "All fields are required.";
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
                                    <li><a href="music.php">Music</a></li>
                                    <li><a href="predict.php">Predict</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <!-- Add Feedback link for users -->
                                    <li><a href="feedback.php">Feedback</a></li>
                                    <?php
                                } elseif ($_SESSION['type'] == 'Admin') {
                                    ?>
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                    <li><a href="profile.php">Profile</a></li>
                                    <li><a href="user_managment.php">User Management</a></li>
                                    <!-- Add Feedback link for admins -->
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
    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center"> <!-- Center-align the row content -->
                <div class="col-lg-3">
                    <!-- Contact info section (same as your provided HTML) -->
                    <!-- ... -->
                </div>
                <div class="col-lg-6">
                    <!-- Feedback card with shadow -->
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title text-center">Feedback</h2>
                            <!-- Feedback form with Bootstrap form styling -->
                            <h2 class="text-center">Change Password</h2>
                        <form action="change_password_process.php" method="post">
                            <label for="current_password">Current Password:</label>
                            <input type="password" name="current_password" id="current_password" required><br><br>
        
                            <label for="new_password">New Password:</label>
                            <input type="password" name="new_password" id="new_password" required><br><br>
        
                            <label for="confirm_password">Confirm New Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" required><br><br>
        
                            <input type="submit" value="Change Password">
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>


