<?php
$insert = false;
if(isset($_POST['sname'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $a=$_POST['sname'];
    $b=$_POST ['fname'];
    $c=$_POST ['mname'];
    $d=$_POST['DOB'];
    $e=$_POST['gender'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $f=$_POST['address'];
    $g=$_POST['appid'];
    $h=$_POST['password'];
    $i=$_POST ['repassword'];
    $j=$_POST ['course'];
    $k=$_POST['marks1'];
    $l=$_POST['marks2'];
    $m=$_POST['jee'];
    // $photo=$_POST['photo'];
    // $marksheet10=$_POST['marksheet10'];
    // $marksheet12=$_POST['marksheet12'];
    // $marksheetJEE=$_POST['marksheetJEE'];
    // $admissionReciept=$_POST['admissionReciept'];
    // $studentReciept=$_POST['studentReciept'];
    // $n='Pending..';
    // $sql = "INSERT INTO `ams`.`ams` (`sname`, `fname`, `mname`, `DOB`, `gender`, `phone`, `email`, `address`, `appid`, `password`, `course`, `marks1`, `marks2`, `jee`,`dt`, `photo`, `marksheet10`, `marksheet12`, `marksheetJEE`, `admissionReciept`, `studentReciept`) VALUES ('$a', '$b', '$c', '$d', '$e', '$phone', '$email', '$f','$g','$h','$j','$k','$l','$m', current_timestamp(), '$photo', '$marksheet10', '$marksheet12', '$marksheetJEE', '$admissionReciept', '$studentReciept');";

    if ($h!=$i || $a==NULL || $b==NULL || $c==NULL || $d==NULL || $e==NULL || $f==NULL || $g==NULL || $h==NULL || $i==NULL || $j==NULL || $k==NULL || $l==NULL || $m==NULL)
   {
    //   echo '<script type="text/javascript">'; 
    //   echo 'alert("review your entries");'; 
    //   echo 'window.location.href = "index6.html";';
    //   echo '</script>';
   }
   else{
    $hash = password_hash($h, PASSWORD_DEFAULT);
    //   $sql = "INSERT INTO `ams`.`ams` (`sname`, `fname`, `mname`, `DOB`, `gender`, `address`, `appid`, `password`, `repassword`, `course`, `marks1`, `marks2`, `jee`,`dt`) VALUES ('$a', '$b', '$c', '$d', '$e', '$f','$g','$h','$i','$j','$k','$l','$m', current_timestamp());";
    $sql = "INSERT INTO `ams`.`ams` (`sname`, `fname`, `mname`, `DOB`, `gender`, `phone`, `email`, `address`, `appid`, `password`, `course`, `marks1`, `marks2`, `jee`,`dt`) VALUES ('$a', '$b', '$c', '$d', '$e', '$phone', '$email', '$f','$g','$hash','$j','$k','$l','$m', current_timestamp());";
   }
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
        include "index7.html";
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>