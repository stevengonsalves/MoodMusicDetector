<?php
// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit_feedback'])) {
    // Check if the user is logged in (you should implement proper user authentication)
    if (isset($_SESSION['type']) && $_SESSION['type'] == 'User') {
        // Database configuration
        $servername = "localhost"; // Change to your database server
        $username = "root"; // Change to your database username
        $password = ""; // Change to your database password
        $dbname = "mood_music"; // Change to your database name

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // User input
        $name = $_POST['name']; // User's name
        $email = $_POST['email']; // User's email
        $feedback_text = $_POST['comment']; // Feedback comment

        // Insert feedback into the database without user ID
        $sql = "INSERT INTO feedback (name, email, comment, timestamp) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $feedback_text);

        if ($stmt->execute()) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "You are not authorized to submit feedback. Please log in as a user.";
    }
}

// Display feedback to the admin
$adminFeedback = [];

if (isset($_SESSION['type']) && $_SESSION['type'] == 'Admin') {
    // Database configuration (use the same as above)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mood_music";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve feedback data from the database
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $adminFeedback[] = $row;
        }
    }

    $conn->close();
}
?>
<!-- The rest of your HTML code remains unchanged -->


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
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="comment" placeholder="Comment" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit_feedback">SEND FEEDBACK</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>

    <!-- Display feedback to the admin -->
    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 'Admin'): ?>
        <section class="admin-feedback spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center">User Feedback</h2>
                        <?php if (empty($adminFeedback)): ?>
                            <p>No feedback available.</p>
                        <?php else: ?>
                            <ul>
                                <?php foreach ($adminFeedback as $feedback): ?>
                                    <li>
                                        <strong>Name:</strong> <?php echo $feedback['name']; ?><br>
                                        <strong>Email:</strong> <?php echo $feedback['email']; ?><br>
                                        <strong>Comment:</strong> <?php echo $feedback['comment']; ?><br>
                                        <strong>Timestamp:</strong> <?php echo $feedback['timestamp']; ?>
                                    </li>
                                    <br>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</body>
</html>
