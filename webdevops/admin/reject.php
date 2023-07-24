<?php
  
    // Connect to database 
    $con=mysqli_connect("localhost","root","","leaveapproval");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
    if (isset($_GET['id'])){
  
        // Store the value from get to 
        // a local variable "course_id"
        $leave_id=$_GET['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE `application` SET 
            `status`=-1 WHERE id='$leave_id'";
  
        // Execute the query
        mysqli_query($con,$sql);
    }
  
    // Go back to course-page.php
    header('location: leave-status-list.php');
?>