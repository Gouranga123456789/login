<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'bms');

// Check for connection error
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php"); // Redirect to login page if not logged in
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $message = mysqli_real_escape_string($db, $_POST['message']);

    // Insert data into 'contacts' table
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($db, $sql)) {
        echo "<p style='color: green;'>Your message has been sent successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . mysqli_error($db) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cat Blogs</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="main-header">
        <h1>Cat Blogs</h1>
        <nav>
            <div class="nav-items nav-home"><a href="index.php">Home</a></div>
            <div class="nav-items"><a href="#about">About</a></div>
            <div class="nav-items dropdown">
                <div class="dropbtn">Blog 
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="dropdown-content">
                    <ul>
                        <li><a href="index2.php">Latest Blogs</a></li>
                        <li><a href="#">Check Blog 1</a></li>
                        <li><a href="#">Check Blog 2</a></li>
                        <li><a href="#">Check Blog 3</a></li>
                        <li><a href="#">More...</a></li>
                    </ul>
                </div>
            </div>
            <div class="nav-items"><a href="#contact">Contact</a></div>
            <div class="nav-items"><a href="logout.php">Logout</a></div>
        </nav>
    </header>

    <section id="home" class="home-section">
        <div class="overlay"></div>
        <div class="home-content">
            <h2>Welcome to Cat Blogs </h2>
            <p>Your daily dose of cat stories and tips.<br>We love cats and we love <br>sharing our experiences with them.</p>
            </div>
    </section>

    <section id="about" class="about-section">
        <div class="about-content">
            <h2>About Us</h2>
            <p>Welcome to Cat Blogs, your ultimate online destination for everything feline! Whether you’re a seasoned cat lover or a new pet parent, our website offers a delightful mix of heartwarming stories, expert advice, and captivating photos that celebrate our furry friends. Dive into our latest blog posts to discover tips on cat care, behavior insights, and fun anecdotes that showcase the unique personalities of cats from around the world. Join our community of cat enthusiasts and share in the joy and charm that our beloved kitties bring into our lives every day. Happy reading, and we hope you enjoy your time at Cat Blogs!</p>
        </div>
    </section>

    <section id="blog" class="blog-section">
        <h2>Latest Blogs</h2>
        <div class="blog-container">
            <div class="blog-card">
                <img src="images/cat2.jpg" alt="Cat 1">
                <div class="blog-text">
                    <h3>Blog Post Title 1</h3>
                    <p>This is a short description of the blog post.</p>
                </div>
            </div>
            <div class="blog-card">
                <img src="images/cat3.jpg" alt="Cat 2">
                <div class="blog-text">
                    <h3>Blog Post Title 2</h3>
                    <p>This is a short description of the blog post.</p>
                </div>
            </div>
            <!-- Add more blog cards as needed -->
        </div>
    </section>

    <section id="contact" class="contact-section">
        <h2>Contact Us</h2>
        <form method='post' action='index.php' class="contact-form">
            <label for="name" >Name:</label>
            <input type="text" placeholder="Enter your name" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </section>

    <footer class="main-footer">
        <p>&copy; 2024 Cat Blogs. All rights reserved.</p>
    </footer>
</body>
</html>
