<?php
        $login=false;
        $showError=false;
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username=$_POST['username'];
            $password=$_POST['password_1'];
            $servername="localhost";
            $database="bms";
            $db=mysqli_connect('localhost','root','test','bms');
            
            $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result=mysqli_query($db,$sql);
            $num=mysqli_num_rows($result);
            if($num==1){
                $login=true;
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                header("location: index.php");
            }
            else{
                $showError="Invalid credentials";
            }
        }
    ?>
    <?php
        if($login)
            include('index.php');
        if($showError)
        echo "Incorrect username/password";
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='stylesheet' href='style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <center>
        <div class="wrapper">
            <span class="icon-close">
                <i class="fa-solid fa-x"></i>
            </span>
            <div class="form-box login">
                <h2>Login</h2>
                <form method='post' action="/TASK3/login.php">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name='username' required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name='password_1' required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forget">
                        <label><input type="checkbox">Remember me</label>
                        <a href="#">Forget password?</a>
                    </div>
                    <button type="submit" name='login_user' class="btn">Login</button>
                    <div class="login-register">
                        <p>Don't have an account?<a href="register.php" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </center>    
</body>
</html>