<?php
include("database.php");
session_start();
$user_id = $_SESSION['id'];
if(isset($_POST['submit'])){
  $department = $_POST['department'];

  if(!empty($department)){
    mysqli_query($conn, "UPDATE `signup` SET department = '$department' WHERE id = '$user_id'") or die('query failed');
                echo("<script>window.location = 'select.php';</script>");
      }  
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Department</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  background: linear-gradient(to bottom right, #3daeda, #e53395);
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}


.navbar {
  overflow: hidden;
  background-color: #191970;
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
  background-color: #af63c2;
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
  background-color: #white;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 90%; /* IE10 */
  flex: 90%;
  background-color:  #af63c2;
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
 background-color: #191970;
 color: white;	
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

<div class="header">
<img src="./Images/BMS_College_of_Engineering.svg.png" alt="B.M.S" height="120px" width="120px">
  <h1>BMS COLLEGE OF ENGINEERING</h1>
<p> ESTD. 1946 Autonomous Institute, Affiliated to VTU </p>
<pre>


</pre>
<h2> Leave Application </h2>

  <p> </p>
</div>

<div class="navbar">
  <a href="select.php" >Home</a>
  <a href="profile2.php" >Profile</a>
  <a href="#"></a>
  <a href="#"></a>
  <a href="#" class="right"></a>
</div>


  <div class="main">
<center>
    <h2>DEPARTMENT</h2>
    <h4>Please select your department</h4>
<form action="" method="post">
  <label for="cars"> </label>
  <select name="department" id="department">
    <option value="cse">Computer Science and Engineering</option>
    <option value="ise">Information Science and Engineering</option>
    <option value="aiml">Artificial Intelligence and Machine Learning</option>
    <option value="ece">Electronics and Communication</option>
    <option value="eee">Electrical and Electronics Engineering</option>
    <option value="mech">Mechanical Engineering</option>
    <option value="civ">Civil Engineering</option>
    <option value="ete">Electronics and Telecommunication Engineering</option>
    <option value="mel">Medical Electronics</option>
    <option value="aer">Aerospace Engineering</option>
    <option value="chem">Chemistry</option>
    <option value="math">Mathematics</option>
    <option value="phy">Physics</option>
    <option value="ide">IDE</option>
    <option value="lang">Languages</option>

  </select>
  <br><br>
  
  <input type="submit" value="Submit" name="submit" style="background-color:#9265a8;width: 7%;height: 3em;border-radius: 18px"/>
</form>


<pre>
<pre>
<pre>

</center>




</div>

<div class="footer">
<div class="row">
  <div class="side">
    
    <h5>CONTACT US: </h5>
    
    <p>+91-80-26622130-35</p>
    
  </div>

<div class="side">
    
    <h5>Address:</h5>
    
    <p>P.O. Box No.: 1908, Bull Temple Road,
       Bangalore - 560 019
       Karnataka, India.</p>
    
  </div>


<div class="side">
    <h5>Fax:</h5>
    
    <p>+91-80-26614357</p>

<h5>Email:</h5>
    
    <p>info@bmsce.ac.in</p>
    
  </div>


 
</div>
  <h2> </h2>
</div>

</body>
</html>