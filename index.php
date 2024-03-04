<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header('Location: dashboard.php');
            exit;
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
            header('Location: index.php');
        }
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
        header('Location: index.php');
    }
}
?>

<!-- Login form  -->
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
            <header>Login</header>
            <form action="index.php" method="post">
                <div class="field input">
                    <label for="">Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="field input">
                    <label for="">Password</label>
                    <input type="password" name="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" value="Login">
                </div>

                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>

        </div>
    </div>

    
    
</body>
</html>