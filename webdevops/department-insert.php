<?php
include("database.php");
session_start();
$user_id = $_SESSION['employeeID']


  $department = $_POST['department'];
  if(!empty($department)){
      $query = "INSERT INTO signup (department) VALUES('$department') WHERE employeeID = '$user_id'";
      $result = $conn->query($query);
      if($result){
        echo("<script>window.location = 'select.php';</script>");

      }  
    }

?>