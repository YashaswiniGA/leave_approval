<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      <?php include "css/style-index.css" ?>
    </style>
    <title>Leave History</title>
    <style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
   
</style>
</head>
<body>
    <?php 
    include "database.php";
    session_start();
    $user_id = $_SESSION['employeeID'];
    ?>
    <div class="container">
        <h1> Leave History</h1>
        <h2><?php echo "Employee ID:".$user_id; ?></h2>
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


    
</body>
</html>