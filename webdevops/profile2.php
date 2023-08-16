<?php

include 'database.php';
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:index.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:index.php');
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
   <title>home</title>

   

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `signup` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['pp'] == ''){
            echo '<img src="Images/download.png">';
         }else{
            echo '<img src="Upload/'.$fetch['pp'].'">';
         }
      ?>
      <h3><?php echo $fetch['firstName']; ?></h3>
      <h3><?php echo $fetch['lastName']; ?></h3>
      <a href="editprofile7.php" class="btn">Update profile</a>
      <a href="profile2.php?logout=<?php echo $user_id; ?>" class="delete-btn">Logout</a>
      <p>New <a href="index.php">login</a> or <a href="index.php">register</a></p>
      <p>Go to <a href="department.php">Home page</a></p>
   </div>

</div>

</body>
</html>