<?php 
session_start();
$login = false;
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password_1'];

    // Database connection
    $db = mysqli_connect('localhost', 'root', '', 'bms');
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to validate user
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $sql);
    $num = mysqli_num_rows($result);

    if ($num >= 1) {
        $login = true;
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php"); // Redirect to home page
        exit();
    } else {
        $showError = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body>
    <center>
        <div class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>
                <?php if ($showError): ?>
                    <p style="color: red;"><?php echo $showError; ?></p>
                <?php endif; ?>
                <form method="post" action="login.php"> <!-- Correct action -->
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password_1" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forget">
                        <label><input type="checkbox">Remember me</label>
                        <a href="#">Forget password?</a>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account? <a href="register.php" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>
</html>
