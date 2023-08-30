 <?php 
    include "database.php";
    session_start();
    $user_id = $_SESSION['employeeID'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave History</title>
    <style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
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
  background-color: #ddd;
  color: black;
}
/* Active/current link */
.navbar a.active {
  background-color: #191970;
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
  background-color: #white;
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
  background-image: linear-gradient(to bottom right, #3daeda, #e53395);
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
   
    <div class="container">
        <div class="navbar">
        <center>
        <a> Leave History</a>
        <a><?php echo "Employee ID:".$user_id; ?></a>
        </center>
        </div>
    <div class="main">
        <table class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Number of days</th>
                    <th>CL OR RH</th>
                    <th>Leave from</th>
                    <th>Leave To</th>
                    <th>Reason</th>
                    <th>Arrangements</th>
                    <th>Remaining cl leaves</th>
                    <th>Remaining rh leaves</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody >
                <?php
                $i=1;
                $query="Select * from application where employeeID='$user_id'";
                $res=mysqli_query($conn,$query);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['numberOfDays']; ?></td>
                            <td><?php echo $row['clORrh']; ?></td>
                            <td><?php echo $row['leaveFrom']; ?></td>
                            <td><?php echo $row['leaveTo']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['altArrangements']; ?></td>
                            <td><?php 
                            if($row['cl_Count']=="-1") 
                                echo "0"; 
                            else 
                                echo $row['cl_Count']; 
                                ?>
                            </td>
                            <td><?php 
                            if($row['rh_Count']=="-1") 
                                echo "0"; 
                            else 
                                echo $row['rh_Count']; 
                                ?>
                            </td>
                            <td><?php 
                        if($row['status']=="1") 
                            echo "Approved";
                        else if($row['status']=="-1") 
                            echo "Rejected";
                        else
                            echo "Pending";
                    ?>                          
                </td>

                            
                    </tr>
                    <?php $i++;}} else{
                        echo "No record Found!";
                    }?>
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


    
</body>
</html>