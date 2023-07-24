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
    <div>
        <a href="leave-status-list.php">All Leave list</a>
</div>
    <div class="container">
        <?php echo "Welcome to admin Dashboard";?>
        <h1> User Records</h1>
        <table class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Name</th>
                    <th>EmployeeID</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody >
                <?php
                $i=1;
                $query="Select *from signup";
                $res=mysqli_query($conn,$query);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['employeeID']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php $i++;}} else{
                        echo "No record Found!";
                    }?>


    
</body>
</html>