<!DOCTYPE html>
<html lang="en">
<head>
<title>Select</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  /* font-family: Arial, Helvetica, sans-serif; */
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
  background-color: #593869				;
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
  color: white;
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
  color: white;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: #d5c1e3;
  padding: 200px;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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
<img src="./Images/BMS_College_of_Engineering.svg.png" alt="BMSCE" width="120" height="120">
  <h1>B.M.S COLLEGE OF ENGINEERING</h1>
<p> ESTD. 1946 Autonomous Institute, Affiliated to VTU </p>
<pre>


</pre>
<h2> Leave Application </h2>

  <p> </p>
</div>

<div class="navbar">
  <a href="profile2.php" >Profile</a>
  <a href="#"></a>
  <a href="#"></a>
  <a href="#" class="right"></a>

  
</div>


  <div class="main">
    <!-- <h2>DEPARTMENT</h2> -->
    <h4>Please select your choice</h4>
<table>
  <tr>
    <th><a href="application.php">Apply Leave</a></th>
    <th><a href="approval.php">Approve Leave</a></th>
    <th><a href="leave-list.php">Leave History</a></th>
  </tr>
  </table>
</div>
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