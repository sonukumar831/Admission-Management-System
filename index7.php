<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // include 'dbconnect.php';
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "ams";
    $conn = mysqli_connect($server,$username,$password,$database);
    if($conn){
        // echo "Successfully connected Database<br>";
        $username = $_POST["aid"];
        $password = $_POST["psw"];
        // $sql = "Select * from ams where appid = '$username' AND password = '$password'";
        $sql = "Select * from ams where appid = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            while ($row= mysqli_fetch_assoc($result)) {
                if(password_verify($password,$row['password'])){
                    // session_start();
                    // $_SESSION['loggedin'] = true;
                    // $_SESSION['username'] = $username;
                    echo "Successfully loggedin";
                    header("location: student_dashboard.html");
                    // include 'student_dashboard.html';
                }
                else{
                    echo "Invalid Credentials";
                    // header("location: index7.html");
                    include 'index7.html';
                }
            }
        }
        else{
            echo "Invalid username or password !";
            // header("location: index7.html");
            include 'index7.html';
        }
    }
    else{
        die("Error" . mysqli_connect_error());
    }
}

?>