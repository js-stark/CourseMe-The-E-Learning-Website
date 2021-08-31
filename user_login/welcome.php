<?php

    session_start();
    if(!isset($_SESSION["user_id"])){
        header("Location: index.php");
      }

    include ("db.php");

    if(isset($_POST["submit"])){
        $full_name = mysqli_real_escape_string($conn,$_POST["full_name"]);
        $password = mysqli_real_escape_string($conn,md5($_POST["password"]));
        $cpassword = mysqli_real_escape_string($conn,md5($_POST["cpassword"]));

        if ($password === $cpassword){
            if(isset($_FILES["photo"])){
                $photo_name = $_FILES["photo"]["name"];
                $photo_tmp_name = $_FILES["photo"]["tmp_name"];
                $photo_size = $_FILES["photo"]["size"];
                $photo_new_name = rand() .$photo_name;

                if ($photo_size > 5242880){
                    echo "<script>alert('Photo size has to be less than 5 mb')</script>";
                }
                else{
                    $sql = "update student set full_name='$full_name',password='$password',photo='$photo_new_name' where id='{$_SESSION["user_id"]}'";
                    $_result = mysqli_query($conn,$sql);
                    if($_result){
                        echo "<script>alert('Profile updated succesfully')</script>";
                    }
                    else{
                        echo "<script>alert('Profile not updated')</script>";
                    }
                }
            }
        }
        else{
            echo "<script>alert('Password Not Matched, Please try again')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="profile-page">
    <div class="wrapper">
        <h2>Profile</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <?php 
            $sql = "select * from student where id='{$_SESSION["user_id"]}'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="inputBox">
                
                <input type="text" id="full_name" placeholder="Full Name" value="<?php echo $row['full_name']?>" name="full_name" required>
            </div>
            <div class="inputBox">
            
                <input type="email" id="email" placeholder="Email" name="email" value="<?php echo $row['email']?>" disabled required>
            </div>
            <div class="inputBox">
        
                <input type="password" id="password" placeholder="Password" value="<?php echo $row['password']?>" name="password" required>
            </div>
            <div class="inputBox">
            
                <input type="password" id="cpassword" placeholder="Confirm Password" value="<?php echo $row['password']?>" name="cpassword" required>
            </div>
            <div class="inputBox pic">
                <label for="photo">Upload Profile Photo</label>
                <input type="file" accept="image/*" id="photo" name="photo">
            </div>

            <div class="inputBox">
                <button type="submit" name="submit" class="btn">Update Profile</button>
            </div>
            <div class="inputBox">
                <a class="my_redirect" href="logout.php">Logout</a>
                <a class="my_redirect" href="../index.php">Explore Courses</a>
            </div>
            <?php


                }
            }
            ?>
            


        </form>
    </div>
</body>
</html>