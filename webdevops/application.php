<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave application</title>
<link rel="stylesheet" href="./Styles/stylesheet1.css">
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
 background-color:#593869 ;	
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

h1{
    text-align: center;
    color: white;
}
h4{
    text-align: center;
    color: white;
}
 
h2{
    text-align: center;
    color: white;
}

td{
    border-spacing: 0 30px;
}
.main1{
    height: 320px;
    background-color:  #d5c1e3;
}
.main2{
    height: 40px;
    background-color: #d5c1e3;
}


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

.dropdown-content a:hover {
    background-color:  #d5c1e3
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

#submitbutton
{
  background-color:#9265a8;;
  width: 30%;
     height: 3em;
     border-radius: 10px;
     cursor: pointer;
     
}
#submitbutton:hover
{
  background-color: #3e8e41;
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
  <center>  <img src="./Images/BMS_College_of_Engineering.svg.png" alt="B.M.S" height="120px" width="120px"></center>
<h1 >B.M.S. COLLEGE OF ENGINEERING</h1>
<h4>ESTD. 1946 Autonomous Institute, Affiliated to VTU</h4>
<h2>Leave application</h2>
</div>
<div class="main2" > 
    <div class="dropdown"> 
<a style="text-decoration:none; color:inherit"; href="select.php">
    <button class="dropbtn"> HOME</button></a>
    </div>
    <div class="dropdown">
        <button class="dropbtn">
            <a style="text-decoration:none; color:inherit"; href="profile2.php">Profile</a>
        </button>
        <!-- <div class="dropdown-content">
            <a href="#">
               <center> <img src="<?php echo $imageURL; ?>" alt="Profile Picture"></center>
             </a>
             <p style=" font-size: medium;" >Emp ID</p>
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

<form name="leaveapplicationform"  action="insert.php" method="post">
    <center>
<table>   
    <tbody>
    
    <tr>
    <td><p>Choose the type of leave :</p></td>
    <td><input type="radio" name="clORrh" value="cl"> CL
    <input type="radio" name="clORrh" value="rh"> RH</td>
</tr>

<tr>
    <td><label for="employeeID"> Employee ID : </label></td>
    <td><input type="text" name="employeeID" id="employeeID" required placeholder="Enter your Employee ID." style="width:150%; height:3em; border-radius: 3px;"/></td>
</tr>
<tr>
    <td><label for="name"> Name : </label></td>
    <td><input type="text" name="name" id="name" required placeholder="Enter your fullname." style="width:150%; height:3em; border-radius: 3px;"/></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td><label for="division"> Division : </label></td>
    <td><input type="text" name="division" id="division" required placeholder="Enter your division." style="width:150%; height:3em; border-radius: 3px;"/></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td><label for="designation"> Designation : </label></td>
    <td><input type="text" name="designation" id="designation" required placeholder="Enter your Designation." style="width:150%; height:3em; border-radius:3px;"/></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
   <td> <label for="number of days"> Total number of days : </label></td>
   <td> <input type="number" required name="numberOfDays" id="number of days" placeholder="Enter the number of days of leave required" style="width:150%; height:3em;  border-radius:3px;" onblur="checkleavequan(this.value)"/></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    
   <td> <label for="leave from">Date From :</label></td>
   <td> <input type="date" required name="leaveFrom" id="leave from" style="width:150%; height:3em;  border-radius:3px;"/></td>
    
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
   <td> <label for="leave to"> To :</label></td>
    <td><input type="date" required name="leaveTo" id="leave to" style="width:150%; height:3em;  border-radius:3px;" /></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
  <td> <label for="reason"> Reason :</label></td> 
  <td>  <textarea required rows="2" cols="40" name="reason" style="width: 150%; height: 3em; border-radius:3px;"></textarea></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td><label for="alternatives"> Alternative arrangements :</label></td>
    <td><textarea rows="2" cols="40" name="altArrangements" style="width: 150%; height: 3em; border-radius:3px;"></textarea></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="SUBMIT" id="submitbutton"  ></td>
</tr>

</tbody>   
</table>
</center>
</form>

<div class="footer">
<div class="column" style="background-color: #593869; color: white">CONTACT US<br>+91-80-26622130-"35</div>
  <div class="column" style="background-color:#593869; color: white">Address:<br>P.O. Box No.: 1908, Bull Temple Road,<br>Bangalore - 560 019<br>Karnataka, India.</div>
  <div class="column" style="background-color: #593869; color: white">Fax: +91-80-26614357<br>Email: info@bmsce.ac.in</div>
</div>

<script>
  function checkDate()
  {
    var leaveFrom=document.getElementById("leave from").value;
    var leaveTo=document.getElementById("leave to").value;
    

    
    }

    function checkleavequan(str)
    {
      var vfrm=$('.eleave').text();
      var lqty=str;
      if(vfrm>=lqty)
      {
        return true;
      }
      else
      {
        alert('Please enter valid leave quantity');
      }
    }
  </script>

<!-- <script src="./java script/script2.js"></script> -->
</body>
</html>