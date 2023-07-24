<?php
  
    // Connect to database 
    $con = mysqli_connect("localhost","root","","leaveapproval");
  
    // Get all the courses from courses table
    // execute the query 
    // Store the result
    $sql = "SELECT * FROM `application`";
    $Sql_query = mysqli_query($con,$sql);
    $All_leave = mysqli_fetch_all($Sql_query,MYSQLI_ASSOC);
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
           content="width=device-width, initial-scale=1.0">
     
    <!-- Using internal/embedded css -->
    <style>
        .btn{
            background-color: red;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 20px;
        }
        .green{
            background-color: #199319;
        }
        .red{
            background-color: red;
        }
        table,th{
            border-style : solid;
            border-width : 1;
            text-align :center;
        }
        td{
            text-align :center;
        }
    </style>    
</head>
  
<body>
    <h2>Leave list Table</h2>
    <table>
        <!-- TABLE TOP ROW HEADINGS-->
        <tr>
            <th>Sr No.</th>
            <th>Name</th>
            <th>EmployeeID</th>
            <th>Number of days</th>
            <th>CL OR RH</th>
            <th>Leave from</th>
            <th>Leave To</th>
            <th>Reason</th>
            <th>Arrangements</th>
            <th>Leave Status</th>
            <th>Approve/Reject</th>
        </tr>
        <?php
  
            // Use foreach to access all the courses data
            $i=1;
            foreach ($All_leave as $row) { ?>
            <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['employeeID']; ?></td>
                            <td><?php echo $row['numberOfDays']; ?></td>
                            <td><?php echo $row['clORrh']; ?></td>
                            <td><?php echo $row['leaveFrom']; ?></td>
                            <td><?php echo $row['leaveTo']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['altArrangements']; ?></td>
                <td><?php 
                        if($row['status']=="1") 
                            echo "Approved";
                        else if($row['status']=="-1") 
                            echo "Rejected";
                        else
                            echo "Pending";
                    ?>                          
                </td>
                <td>
                    <?php 
                        echo 
"<a href=reject.php?id=".$row['id']." class='btn red'>Reject</a>";
                        echo 
"<a href=accept.php?id=".$row['id']." class='btn green'>Accept</a>";
                    ?>
            </tr>
           <?php
                }
                // End the foreach loop 
           ?>
    </table>
</body>
  
</html>