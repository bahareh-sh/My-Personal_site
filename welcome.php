<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginsite.php");
    exit;
}
?>
<?php include('inc/header.php'); ?>
    <div class="welcome_box">
        <div class="container">
        <div class="welcome">Welcome</div>
        <div class="page-header" style="padding-bottom: 36px; margin: 40px 0 20px; border-bottom: none;">
            <h1 style="text-align: center;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
        </div>
        <p>
            <a href="http://localhost/mysite/register.php" class="read_btn" style="    margin-left: 370px;">Reset Your Password</a>
            <a href="logout.php" class="read_btn">Sign Out of Your Account</a>
        </p>
        </div>
    </div>
<?php include('inc/footer.php'); ?>

