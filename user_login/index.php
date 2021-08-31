<?php
  include("db.php");

  error_reporting(0);

  session_start();

  $admin="";


  if(isset($_SESSION["user_id"])){
    header("Location: welcome.php");
  }

  

  if (isset($_POST["signup"])){
    $full_name = mysqli_real_escape_string($conn,$_POST["signup_full_name"]);
    $email = mysqli_real_escape_string($conn,$_POST["signup_email"]);
    $password = mysqli_real_escape_string($conn,md5($_POST["signup_password"]));
    $cpassword = mysqli_real_escape_string($conn,md5($_POST["signup_cpassword"]));
    $token = md5(rand());

    $check_email = mysqli_num_rows(mysqli_query($conn,"select email from student where email='$email'"));

    if($password !== $cpassword){
      echo "<script>alert('Password did not match')</script>";
    }
    else if($check_email > 0){
      echo "<script>alert('Email already exists')</script>";
    }
    else{
      $sql = "insert into student (full_name,email,password,token,status) values('$full_name','$email','$password','$token','0')";
      $result = mysqli_query($conn,$sql);

      if($result){
        $_POST["signup_full_name"] = "";
        $_POST["signup_email"] = "";
        $_POST["signup_password"] = "";
        $_POST["signup_cpassword"] = "";

        $to = $email;
        $subject = "Email Verification - CourseMe";

        $message = "
        <html>
        <head>
        <title>{$subject}</title>
        </head>
        <body>
        <p><strong>Hello {$full_name}, </strong></p>
        <p>Thanks for Registration Verify your email to access the courses from CourseMe.
        click below link to verify your email</p>
        <p><a href='{$base_url}'>Verify Email</a></p>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= "From: ". $email;

        if (mail($to,$subject,$message,$headers)){
          echo "<script>alert('we've sent verification link to your email - {$email}')</script>";
        }      
      }
      else{
        echo "<script>alert('Email not sent, Please try again')</script>";
      }
    }
  }
  if (isset($_POST["signin"])){
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,md5($_POST["password"]));


    $check_email = mysqli_query($conn,"select id from student where email='$email' and password='$password'");
    
    if(mysqli_num_rows($check_email)>0){
      $_row = mysqli_fetch_assoc($check_email);
      $admin = $_row['email'];
      $admin_pass = $_row['password'];
    
      $_SESSION["user_id"] = $_row['id'];
      header("Location: index.php");
  
    }
    else{
      echo "<script>alert('Login details is incorrect. Please try again')</script>";
    }
  }
  


?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

        <!-- Sign in form for the user -->
          <form action="#" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email Address" value="<?php echo $_POST['email'];?>" name="email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" value="<?php echo $_POST['password'];?>" name="password" required/>
            </div>
            <input type="submit" value="Login" name="signin" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <!-- Sign Up form for the e learning Website -->
          <form action="#" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="signup_full_name" placeholder="Enter your Full name" value="<?php echo $_POST['signup_full_name'];?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="signup_email" placeholder="Enter your Email" value="<?php echo $_POST['signup_email'];?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="signup_password" placeholder="Enter your Password" value="<?php echo $_POST['signup_password'];?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="signup_cpassword" placeholder="ReEnter your Password" value="<?php echo $_POST['signup_cpassword'];?>" required />
            </div>
            <input type="submit" class="btn" name="signup" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
