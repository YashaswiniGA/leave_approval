<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-dashboard</title>
    <style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
    <?php include "database.php";?>
    <div class="container">
        <h1> Leave list</h1>
        <table class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>EmployeeID</th>
                    <th>CL OR RH</th>
                    <th>Leave from</th>
                    <th>Leave To</th>
                </tr>
            </thead>
            <tbody >
                <?php
                $i=1;
                $query="Select *from application";
                $res=mysqli_query($conn,$query);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['employeeID']; ?></td>
                            <td><?php echo $row['clORrh']; ?></td>
                            <td><?php echo $row['leaveFrom']; ?></td>
                            <td><?php echo $row['leaveTo']; ?></td>
                            
                    </tr>
                    <?php $i++;}} else{
                        echo "No record Found!";
                    }?>


    
</body>
</html>