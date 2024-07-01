
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel='stylesheet' href='style.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password_1'];
        
        
        $servername="localhost";
        $database="bms";

        $db=mysqli_connect('localhost','root','test','bms');

        if (!$db){
            die("sorry we failed to connect: ".mysqli_connect_error());
        }
        else{

            $sql="INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";
            $result=mysqli_query($db,$sql);
            if($result){
                echo "Successfully submited<br>Now login";
                
            }
            else{
                echo "Error : ". mysqli_error($db);
            }
        }
        
    }
    ?>

    <center>
        <div class="wrapper">
            <span class="icon-close">
                <i class="fa-solid fa-x"></i>
            </span>
            <div class="form-box register">
                <h2 class='regis'>Registration</h2>
                <form method="post" class='form' action="/TASK3/register.php">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input name='username' id='username' type="text" required>
                        <label for='username'>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" id='email' name='email' required>
                        <label for='email'>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" id='password_1' name='password_1' required>
                        <label for='password_1'>Password</label>
                    </div>
                    <button type="submit" name='register_user' class="btn">Register</button>
                    <div class="login-register">
                        <p>Already have an account?<a href="login.php" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </center>    
</body>
</html>