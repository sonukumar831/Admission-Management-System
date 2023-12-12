<?php

// session_start();
// if(isset($_SESSION['username'])){
//     header("location: admin_dashboard.html");
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // include 'dbconnect.php';
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "ams";
    $conn = mysqli_connect($server,$username,$password,$database);
    if($conn){
        echo "Successfully connected Database<br>";
        $username = $_POST["admin_name"];
        $password = $_POST["admin_pass"];
        $sql = "Select * from admin where admin_id = '$username' AND admin_password = '$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["loggedin"] = true;
            include 'admin_dashboard.php';
        }
        else{
            echo "Invalid Credentials";
        }
    }
    else{
        die("Error" . mysqli_connect_error());
    }
}

?>