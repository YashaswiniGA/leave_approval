<?php
include 'database.php';
session_start();
$user_id = $_SESSION['employeeID'];

     $select = mysqli_query($conn,"SELECT * FROM application where employeeID='$user_id' ORDER BY id DESC LIMIT 1") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $user = mysqli_fetch_array($select, MYSQLI_ASSOC);
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave approval</title>
    <link rel="stylesheet" href="./Styles/stylesheet2.css">
    <link rel="icon" href="./Images/favicon.ico">
    <style>
    * {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Arial, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 10px;
  text-align: center;
  background: #9265a8;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}


.navbar {
  overflow: hidden;
  background-color: #008080				;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.main a:hover {
  background-color: #ddd;
  color: black;
}
/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 90%; /* IE10 */
  flex: 90%;
  background-color: #e6f7ec;
  padding: 80px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
 background-color: #593869;	
}

.column {
  float: left;
  width: 33%;
  padding: 10px;
  height: 150px; 
}
.footer:after {
  content: "";
  display: table;
  clear: both;
}

//
.button:hover .submit{
    background-color:#3e8e41 ;

}

.dropbtn {
    background-color: #593869;

    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #d5c1e3;
    min-width: 180px;
    box-shadow: 0px 8px 16px
        0px rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
    <div  class="header" style="height:320px; width:100%; background-color:#9265a8;">
        
        <center>  <img src="./Images/BMS_College_of_Engineering.svg.png" alt="B.M.S" height="120px" width="120px"></center>
<h1 style="text-align: center; color: white;" >B.M.S. COLLEGE OF ENGINEERING</h1>
<h4 style="text-align: center; color: white;">ESTD. 1946 Autonomous Institute, Affiliated to VTU</h4>
<h2 style="text-align: center; color: white;">Leave approval</h2>
    </div>

    <div class="main2" style="height: 40px; width: 100%; background-color: #d5c1e3;"> 
    <div class="dropdown"> 
<a style="text-decoration:none; color:inherit"; href="select.php">
    <button class="dropbtn" > HOME</button></a>
    </div>
    <div class="dropdown">
    <a style="text-decoration:none; color:inherit"; href="profile2.php">
        <button class="dropbtn">
            Profile
        </button>
        <!-- <div class="dropdown-content">
            <a href="#">
               <center> <img src="./Images/profile picture.png"></center>
             </a>
             <p style="color: #008080; font-size: medium;" >Emp ID</p>
             <p style="font-size: medium;"> Faculty Name</p>
             <p style="font-size: small;"> Teacher</p>
             <hr>
            <a href="file:///C:/Webdevelopment/create%20account.html"><img src="./Images/change password.png" height="15px">
                Change password</a>
            <a href="file:///C:/Webdevelopment/1st%20page.html?email=yashaswini7122003%40gmail.com&password=abcder">
                <img src="./Images/sign out.png" height="15px">
                 Sign out</a>
            
        </div> -->
        </div>
</div>

    
    <div style="height:40px; width:100%; "></div>
    <div style="height: 300px;width: 40% ; background-color: #d5c1e3; margin-left:auto;margin-right:auto;">
    <div style="height:300px; width:40%; background-color:#9265a8; float: left;">
        <center>
        <?php
          
          $select = mysqli_query($conn,"SELECT * FROM application where employeeID='$user_id' ORDER BY id DESC LIMIT 1") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $user = mysqli_fetch_array($select, MYSQLI_ASSOC);
        if($user['status']==1)
        {
          
          echo "<img src='Images/APPROVED.png' ><br>";
          echo "Leave From: ".$user['leaveFrom']."<br>";
               echo "LeaveTo: ".$user['leaveTo']."<br>";

        }
        else if($user['status']==-1)
        {
          
          echo "<img src='Images/NOT APPROVED.png' ><br>";
          echo "Leave From: ".$user['leaveFrom']."<br>";
               echo "LeaveTo: ".$user['leaveTo']."<br>";

        }
        else{
          echo "<img src='Images/pending.jpg' ><br>";
          echo "Leave From: ".$user['leaveFrom']."<br>";
               echo "LeaveTo: ".$user['leaveTo']."<br>";
        }
      }
          ?>
          

<!-- <h3>APPROVED</h3>
<img src="./Images/APPROVED.png" alt="Approved">
</center> 
    </div>
    <center>
<h2>Details:</h2>
<p style="font-size: large;">Number of days: 3<br>
From: 10/1/2023<br>
To: 12/1/2023<br>
Approved by: HOD of the department<br>
Approved to: The Faculty name
</p> -->
</center>
</div>

<h2></h2>
<h2></h2> 
<div class="footer">
<div class="column" style="background-color: #593869; color: white">CONTACT US<br>+91-80-26622130-"35</div>
  <div class="column" style="background-color:#593869; color: white"> Address:<br>P.O. Box No.: 1908, Bull Temple Road,<br>Bangalore - 560 019<br>Karnataka, India.</div>
  <div class="column" style="background-color: #593869; color: white">Fax: +91-80-26614357<br>Email: info@bmsce.ac.in</div>
</div>

    
</body>
</html>