<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include 'db.php';

    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Perform form validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        // Handle empty fields
        echo "Please fill in all fields.";
    } elseif ($password != $confirm_password) {
        // Handle password mismatch
        echo "Passwords do not match.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            // Redirect user to login page after successful sign-up
            echo "<script>alert('User registered successfully!');</script>";
            header("Location: index.php");
            exit;
        } else {
            // Handle database error
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles-auth.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="register.php" method="post">
                <div class="field input">
                    <label for="">User Name</label>
                    <input type="text" name="username" required>
                </div>
                <div class="field input">
                    <label for="">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="field input">
                    <label for="">New Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="field input">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm_password">
                </div>
                <div class="field">
                    <input type="submit" class="btn" value="Sign Up" required>
                </div>
                <div class="links">
                    Allready have a account? <a href="index.php">Login Now</a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>