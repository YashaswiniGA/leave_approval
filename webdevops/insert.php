 <!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "leaveapproval");
         
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        session_start();
        $user_id = $_SESSION['employeeID'];
        
        
        $clORrh=$_POST['clORrh'];
        $employeeID=$_POST['employeeID'];
        $name=$_POST['name'];
        $division=$_POST['division'];
        $designation=$_POST['designation'];
        $numberOfDays=$_POST['numberOfDays'];
        $leaveFrom=$_POST['leaveFrom'];
        $leaveTo=$_POST['leaveTo'];
        $reason=$_POST['reason'];
        $altArrangements=$_POST['altArrangements'];

        if($user_id!=$employeeID)
        {
            echo("<script>alert('Please enter valid employeeID')</script>");
            echo("<script>window.location = 'application.php';</script>");
        }
         

        $date1 = strtotime($leaveFrom);
    $date2 = strtotime($leaveTo);
    $diff = $date2 - $date1;
   $days = floor($diff / (60 * 60 * 24));
   if($days<=0)
   {
    echo("<script>alert('Please enter valid date')</script>");
    echo("<script>window.location = 'application.php';</script>");
   }
   if($days!=$numberOfDays)
   {
    echo("<script>alert('Number of days of leave and the dates you have mentioned are not matching')</script>");
    echo("<script>window.location = 'application.php';</script>");
   }
   else{
    if($clORrh==='cl')
    {
        $select = mysqli_query($conn, "SELECT MIN(cl_Count) as cl_Count, rh_Count FROM `application` WHERE employeeID = '$employeeID'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $user = mysqli_fetch_array($select, MYSQLI_ASSOC);
        if($user["cl_Count"]==0)
                {
                    $user["cl_Count"]=15;
                }
                if($user["rh_Count"]==0)
                {
                    $user["rh_Count"]=3;
                }
                else if($numberOfDays>$user["cl_Count"]||$cl_Count==-1)
            {
                    echo("<script>alert('Leave limit exceeded')</script>");
                    echo("<script>window.location = 'application.php';</script>");
                    die();
                }
                $cl_Count=$user["cl_Count"]-$numberOfDays;
                $rh_Count=$user["rh_Count"];
                if($cl_Count==0)
                $cl_Count=-1;
        $sql = "INSERT INTO application(clORrh,employeeID,name,division,designation,numberOfDays,leaveFrom,leaveTo,reason,altArrangements,cl_Count,rh_Count ) 
        VALUES ('$clORrh','$employeeID','$name','$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count')";
            if(mysqli_query($conn, $sql)){
                echo("<script>alert('Information has been saved')</script>");
            echo("<script>window.location = 'logout.php';</script>");

      }
    }
}
else{
    $select = mysqli_query($conn, "SELECT MIN(rh_Count) as rh_Count, cl_Count FROM `application` WHERE employeeID = '$employeeID'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
        $user = mysqli_fetch_array($select, MYSQLI_ASSOC);
        if($user["rh_Count"]==0)
                {
                    $user["rh_Count"]=3;
                }
                if($user["cl_Count"]==0)
                {
                    $user["cl_Count"]=15;
                }
                if($numberOfDays>$user["rh_Count"]||$rh_Count==-1)
            {
                    echo("<script>alert('Leave limit exceeded')</script>");
                    echo("<script>window.location = 'application.php';</script>");
                    die();
                }
                $rh_Count=$user["rh_Count"]-$numberOfDays;
                $cl_Count=$user["cl_Count"];
                if($rh_Count==0)
                $rh_Count=-1;
        $sql = "INSERT INTO application(clORrh,employeeID,name,division,designation,numberOfDays,leaveFrom,leaveTo,reason,altArrangements,cl_Count,rh_Count ) 
        VALUES ('$clORrh','$employeeID','$name','$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count')";
            if(mysqli_query($conn, $sql)){
                echo("<script>alert('Information has been saved')</script>");
            echo("<script>window.location = 'logout.php';</script>");

      }
    }

}
   }
//    else{
//     if($clORrh==='cl')
//     {

//         $sql = "SELECT MIN(cl_Count) as cl_Count,rh_Count FROM application WHERE employeeID = '$employeeID'";
//             $result = mysqli_query($conn, $sql);
//             if(mysqli_num_rows($result) == 0)
//             {
//                 echo("<script>alert('No entrys')</script>");
//                     echo("<script>window.location = 'application.php';</script>");
//                     die();

//                 $cl_Count=15-$numberOfDays;
//                 $rh_count=3;
//                 $sql = "INSERT INTO application VALUES ('$clORrh','$employeeID','$name',
//             '$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count')";
//             if(mysqli_query($conn, $sql)){
//                 echo("<script>alert('Information has been saved')</script>");
//             echo("<script>window.location = 'logout.php';</script>");
                
//             }
//    }
                
//             // if ($user) {
//             //     if($user["cl_Count"]==0)
//             //     {
//             //         $user["cl_Count"]=15;
//             //     }
//             else if($numberOfDays>$user["cl_Count"])
//             {
//                     echo("<script>alert('Leave limit exceeded')</script>");
//                     echo("<script>window.location = 'application.php';</script>");
//                     die();
//                 }
//                 else{
//                     $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
//                 $cl_Count=$user["cl_Count"]-$numberOfDays;
//                 $rh_Count=$user["rh_Count"];
//         $sql = "INSERT INTO application VALUES ('$clORrh','$employeeID','$name',
//             '$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count')";
//             if(mysqli_query($conn, $sql)){
//                 echo("<script>alert('Information has been saved')</script>");
//             echo("<script>window.location = 'logout.php';</script>");
//                 }
//    }
// }
//    else
//    {
//     $sql = "SELECT MIN(rh_Count) as rh_Count, cl_Count FROM application WHERE employeeID = '$employeeID'";
//             $result = mysqli_query($conn, $sql);
//             $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
//             if (!$user) {
//                     $cl_Count=3-$numberOfDays;
//                     $cl_count=15;
//                     $sql = "INSERT INTO application VALUES ('$clORrh','$employeeID','$name',
//             '$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count')";
//                 }
//                 // if($user["rh_Count"]==0)
//                 // {
//                 //     $user["cl_Count"]=15;
//                 // }
//                  else if($numberOfDays>$user["rh_Count"])
//                 {
//                     echo("<script>alert('Leave limit exceeded')</script>");
//                     echo("<script>window.location = 'application.php';</script>");
//                     die();
//                 }
//                 else
//                 {
//                 $rh_Count=$user["rh_Count"]-$numberOfDays;
//                 $cl_Count=$user["cl_Count"];

//         $sql = "INSERT INTO application VALUES ('$clORrh','$employeeID','$name',
//             '$division','$designation','$numberOfDays','$leaveFrom','$leaveTo','$reason','$altArrangements','$cl_Count','$rh_Count')";
//                 }
//    }
// }


         
        // if(mysqli_query($conn, $sql)){
        //     echo("<script>alert('Information has been saved')</script>");
        // echo("<script>window.location = 'logout.php';</script>");
            
        // } 
        // else{
        //     echo "ERROR: Hush! Sorry $sql. "
        //         . mysqli_error($conn);
        // }
         
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
 
</html>