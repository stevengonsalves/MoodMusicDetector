<!DOCTYPE html>
<html>
<head>
    <title>Feedback Reports</title>
</head>
<body>
    <?php
    session_start(); // Start the session

    // Check if the user is logged in and their role
    if (isset($_SESSION['type']) && $_SESSION['type'] == 'Admin') {
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

        // Fetch feedback data
        $sql = "SELECT * FROM feedback ORDER BY timestamp DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h1>Feedback Reports</h1>";
            echo "<table>";
            echo "<tr><th>ID</th><th>User ID</th><th>Feedback</th><th>Timestamp</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["feedback_text"] . "</td>";
                echo "<td>" . $row["timestamp"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No feedback available.";
        }

        $conn->close();
    } else {
        echo "Access denied. This page is for admin access only.";
    }
    ?>

    <br><br>
    <a href="logout.php">Logout</a>
</body>
</html>
