<?php

include 'database.php';
session_start();
$user_id = $_SESSION['id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `signup` SET firstName = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   //$update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    // $try="shree@1234";
    // $hashtry = password_hash($try, PASSWORD_BCRYPT);
    // echo $hashtry;
    // echo"........";
    // // $trial="shree@2003"
    // // $hashtrial=password_hash($trial, PASSWORD_BCRYPT);
    // // echo $hashtrial;
    // // echo".......";

   $update_pass=$_POST['update_pass'];
   //$passwordHashupdate = password_hash($update_pass, PASSWORD_BCRYPT);
   //$new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   //$confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));
   $new_pass=$_POST['new_pass'];
   $confirm_pass=$_POST['confirm_pass'];

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
    $verify=password_verify($update_pass, $old_pass);
      if(!$verify){
         $message[] = 'old password not matched!';
      }
      elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
        $passwordHash = password_hash($confirm_pass, PASSWORD_BCRYPT);
        //echo $passwordHash;
         mysqli_query($conn, "UPDATE `signup` SET password = '$passwordHash' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   //$update_image_folder = 'Upload/'.$update_image;
   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
        $img_ex = pathinfo($update_image, PATHINFO_EXTENSION);
                   $img_ex_to_lc = strtolower($img_ex);
       
                   $allowed_exs = array('jpg', 'jpeg', 'png');
                   if(in_array($img_ex_to_lc, $allowed_exs)){
                    $select=mysqli_query($conn, "SELECT employeeID FROM `signup` WHERE id = '$user_id'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                     }
                      $new_img_name = uniqid($fetch['employeeID'], true).'.'.$img_ex_to_lc;
                      $img_upload_path = './Upload/'.$new_img_name;
                   }
         $image_update_query = mysqli_query($conn, "UPDATE `signup` SET pp = '$new_img_name' WHERE id= '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name,$img_upload_path );
         }
         $message[] = 'Image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
       <?php include "css/style-profile.css" ?>
    </style>
   <title>update profile</title>


</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `signup` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['pp'] == ''){
            echo '<img src="Images/download.png">';
         }else{
            echo '<img src="Upload/'.$fetch['pp'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>Username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['firstName']; ?>" class="box">
            <span>Your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>Update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Update profile" name="update_profile" class="btn">
      <a href="profile2.php" class="delete-btn">Go back</a>
   </form>

</div>

</body>
</html>