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
                                session_start();

                                if (empty($_SESSION['isLogin'])) {
                                    echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
                                }

                                // Step 1: Database Connection
                                $servername = "localhost"; // Change this to your database server
                                $username = "root"; // Change this to your database username
                                $password = ""; // Change this to your database password
                                $database = "mood_music"; // Change this to your database name

                                $conn = new mysqli($servername, $username, $password, $database);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Check if the 'user_management' table exists, and create it if not
                                $createTableSQL = "CREATE TABLE IF NOT EXISTS user_management (
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    username VARCHAR(255) NOT NULL,
                                    email VARCHAR(255) NOT NULL
                                )";

                                $conn->query($createTableSQL); // Run the query without checking the result

                                // Step 2: Fetch User Details
                                $sql = "SELECT * FROM user"; // Assuming your table name is 'user'
                                $result = $conn->query($sql);

                                // Close the database connection
                                $conn->close();
                                ?>

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
                                } else {
                                    ?>
                                    <li><a href="home.php">Dashboard</a></li>
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

    <div class="container text-center">
        <h1>User Management</h1>

        <?php if ($result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row["user_id"]; ?></td>
                                <td><?php echo $row["user_name"]; ?></td>
                                <td><?php echo $row["user_email"]; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
    </div>

<?php
    require_once 'include/footer.php';
?>