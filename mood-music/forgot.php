<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <!-- Add your CSS and other head content here -->
</head>
<body>
    <?php
    // Define variables
    $email = "";
    $token = "";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];

        // Check if the email exists in your database (you should have a users table)
        // If the email exists, generate a unique token and store it in the database
        // Here's a basic example of how to generate a token:
        $token = bin2hex(random_bytes(32));

        // Store the token in your database along with the user's email
        // You should have a table to store password reset tokens

        // Send the password reset email
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: http://example.com/reset_password.php?token=$token";
        $headers = "From: webmaster@example.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Password reset link sent to your email.";
        } else {
            echo "Error sending email.";
        }
    }
    ?>

    <h2>Forgot Password</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo $email; ?>">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
