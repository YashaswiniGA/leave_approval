<?php

//forget_password.php

include('database.php');

$message = '';

session_start();

if(isset($_SESSION["id"]))
{
 header("location:index.php");
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["email"]))
 {
  $message = '<div class="alert alert-danger">Email Address is required</div>';
 }
 else
 {
  $data = array(
   ':user_email' => trim($_POST["email"])
  );

  $query = "
  SELECT * FROM signup 
  WHERE email = :email
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);

    {
     $user_otp = rand(100000, 999999);

     $sub_query = "
     UPDATE signup 
     SET user_otp = '".$user_otp."' 
     WHERE id = '".$row["id"]."'
     ";

     $connect->query($sub_query);

     require 'class/class.phpmailer.php';

     $mail = new PHPMailer;

     $mail->IsSMTP();

     $mail->Host = 'smtpout.secureserver.net';

     $mail->Port = '80';

     $mail->SMTPAuth = true;

     $mail->Username = 'xxxxxxxxxxxx';

     $mail->Password = 'xxxxxxxxxxx';

     $mail->SMTPSecure = '';

     $mail->From = 'yashasvinirm@gmail.com';

     $mail->FromName = 'LeaveApproval';

     $mail->AddAddress($row["email"]);

     $mail->IsHTML(true);

     $mail->Subject = 'Password reset request for your account';

     $message_body = '
     <p>For reset your password, you have to enter this verification code when prompted: <b>'.$user_otp.'</b>.</p>
     <p>Sincerely,</p>
     ';

     $mail->Body = $message_body;

     if($mail->Send())
     {
      echo '<script>alert("Please Check Your Email for password reset code")</script>';

      echo '<script>window.location.replace("forget_password.php?step2=1&code=' . $row["user_activation_code"] . '")</script>';
     }
    }
   }
  }
  else
  {
   $message = '<div class="alert alert-danger">Email Address not found in our record</div>';
  }
 


if(isset($_POST["check_otp"]))
{
 if(empty($_POST["user_otp"]))
 {
  $message = '<div class="alert alert-danger">Enter OTP Number</div>';
 }
 else
 {
  $data = array(
   ':user_activation_code'  => $_POST["user_code"],
   ':user_otp'     => $_POST["user_otp"]
  );

  $query = "
  SELECT * FROM signup 
  WHERE activation_code = :activation_code 
  AND user_otp = :user_otp
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);

  if($statement->rowCount() > 0)
  {
   echo '<script>window.location.replace("forget_password.php?step3=1&code=' . $_POST["user_code"] . '")</script>';
  }
  else
  {
   $message = '<div class="alert alert-danger">Wrong OTP Number</div>';
  }
 }
}

if(isset($_POST["change_password"]))
{
 $new_password = $_POST["user_password"];
 $confirm_password = $_POST["confirm_password"];

 if($new_password == $confirm_password)
 {
  $query = "
  UPDATE signup 
  SET password = '".password_hash($new_password, PASSWORD_DEFAULT)."' 
  WHERE activation_code = '".$_POST["user_code"]."'
  ";

  $connect->query($query);

  echo '<script>window.location.replace("signup.php?reset_password=success")</script>';
 }
 else
 {
  $message = '<div class="alert alert-danger">Confirm Password is not match</div>';
 }
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>Forgot Password script in PHP using OTP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="http://code.jquery.com/jquery.js"></script>
    <link rel="stylesheet" href="css/style-index.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Forgot Password script in PHP using OTP</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Forgot Password script in PHP using OTP</h3>
    </div>
    <div class="panel-body">
     <?php

     echo $message;

     if(isset($_GET["step1"]))
     {
     ?>
     <form method="post">
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="submit" class="btn btn-success" value="Send" />
      </div>
     </form>
     <?php
     }
     if(isset($_GET["step2"], $_GET["code"]))
     {
     ?>
     <form method="POST">
      <div class="form-group">
       <label>Enter OTP Number</label>
       <input type="text" name="user_otp" class="form-control" />
      </div>
      <div class="form-group">
       <input type="hidden" name="user_code" value="<?php echo $_GET["code"]; ?>" />
       <input type="submit" name="check_otp" class="btn btn-success" value="Send" />
      </div>
     </form>
     <?php
     }

     if(isset($_GET["step3"], $_GET["code"]))
     {
     ?>
     <form method="post">
      <div class="form-group">
       <label>Enter New Password</label>
       <input type="password" name="password" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Confirm Password</label>
       <input type="password" name="confirm_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="hidden" name="user_code" value="<?php echo $_GET["code"]; ?>" />
       <input type="submit" name="change_password" class="btn btn-success" value="Change" />
      </div>
     </form>
     <?php 
     }
     ?>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>