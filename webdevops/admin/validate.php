<?php
 
// include_once('database.php');
  
// function test_input($data) {
     
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }
  
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
//     $username = test_input($_POST["username"]);
//     $password = test_input($_POST["password"]);
//     $stmt = $conn->prepare("SELECT * FROM adminlogin");
//     $stmt->execute();
//     $users = $stmt->fetchAll();
     
//     foreach($users as $user) {
         
//         if(($user['username'] == $username) &&
//             ($user['password'] == $password)) {
//                 header("location: admin-dashboard.php");
//         }
//         else {
//             echo "<script language='javascript'>";
//             echo "alert('WRONG INFORMATION')";
//             echo "</script>";
//             die();
//         }
//     }
// }
 
?>



<?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM signup WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION["signup"] = "yes";
                    header("location:profile2.php");
                }
                else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }
            else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
    ?>