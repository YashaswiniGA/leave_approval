<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
   
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php include "css/style-index.css" ?>
    </style>
   </head>
<body>
  <div class="container">
	<?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $employeeID = $_POST["employeeID"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM signup WHERE employeeID = '$employeeID'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION['id'] = $user["id"];
                    $_SESSION['employeeID'] = $user["employeeID"];
                    $_SESSION["signup"] = "yes";
                    header("location:profile2.php");
                }
                else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }
            else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
    ?>
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">BMS College of<br> Engineering</span>
          <span class="text-2">ESTD. 1946</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
        
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="index.php" method="post" name="signinform" >
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input  id="employeeID" name="employeeID" placeholder="Enter your emloyeeID" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="login" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Signup now</label></div>
            </div>
        </form>
      </div>
        <?php
        if (isset($_POST["submit"])) {
           $firstName = $_POST["firstName"];
           $lastName = $_POST["lastName"];
           $email = $_POST["email"];
           $employeeID = $_POST["employeeID"];
           $password = $_POST["password"];
           $cpassword = $_POST["cpassword"];
           
           $passwordHash = password_hash($password, PASSWORD_BCRYPT);

           $errors = array();
           
           if (empty($firstName) OR empty($lastName) OR empty($email) OR empty($employeeID) OR empty($password) OR empty($cpassword)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$cpassword) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM signup WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
              echo("<script>alert('$error')</script>");
              echo("<script>window.location = 'index.php';</script>");
            }
           }else{
            if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
                $img_name = $_FILES['pp']['name'];
                $tmp_name = $_FILES['pp']['tmp_name'];
                $error = $_FILES['pp']['error'];
                
                if($error === 0){
                   $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                   $img_ex_to_lc = strtolower($img_ex);
       
                   $allowed_exs = array('jpg', 'jpeg', 'png');
                   if(in_array($img_ex_to_lc, $allowed_exs)){
                      $new_img_name = uniqid($employeeID, true).'.'.$img_ex_to_lc;
                      $img_upload_path = './Upload/'.$new_img_name;
                      move_uploaded_file($tmp_name, $img_upload_path);
       
            
            $sql = "INSERT INTO signup (firstName, lastName,email, employeeID,password,pp) VALUES ( ?, ?, ?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssssss",$firstName, $lastName, $email,$employeeID,$passwordHash,$new_img_name);
                mysqli_stmt_execute($stmt);
                echo("<script>alert('Succesfully registered!')</script>");
                echo("<script>window.location = 'index.php';</script>");
            }
                exit;
            }else {
               $em = "You can't upload files of this type";
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            exit;
         }        
      }else{
                die("Something went wrong");
            }
           }
        }
        ?>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="index.php" method="post" enctype="multipart/form-data" >
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="firstName" placeholder="Enter your first name" required>
              </div>
		<div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="lastName" placeholder="Enter your last name" required>
              </div>
              <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="employeeID" placeholder="Enter your Employee ID" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control" name="cpassword" placeholder="Confirm your password" required>
              </div>
              <div class="form-group">
		    <label class="form-label">Profile Picture</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
              <div class="button input-box">
                <input type="submit" value="Submit" name="submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
