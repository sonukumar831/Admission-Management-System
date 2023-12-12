<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $serverName = "localhost";
    $connectionOptions = array(
        "Database" => "ams",
        "Uid" => "root",
        "PWD" => ""
    );

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $a = $_POST['sname'];
    $b = $_POST['fname'];
    $c = $_POST['mname'];
    $d = $_POST['DOB'];
    $e = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $f = $_POST['address'];
    $g = $_POST['appid'];
    $h = $_POST['password'];
    $i = $_POST['repassword'];
    $j = $_POST['course'];
    $k = $_POST['marks1'];
    $l = $_POST['marks2'];
    $m = $_POST['jee'];

    // ... (validation and other form data collection)

    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoData = file_get_contents($_FILES['photo']['tmp_name']);
        // ... (rest of the code)
    } else {
        echo "File upload error: " . $_FILES['photo']['error'];
    }
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $marksheet10Data = file_get_contents($_FILES['marksheet10']['tmp_name']);
        // ... (rest of the code)
    } else {
        echo "File upload error: " . $_FILES['marksheet10']['error'];
    }
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $marksheet12Data = file_get_contents($_FILES['marksheet12']['tmp_name']);
        // ... (rest of the code)
    } else {
        echo "File upload error: " . $_FILES['marksheet12']['error'];
    }
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $marksheetJEEData = file_get_contents($_FILES['marksheetJEE']['tmp_name']);
        // ... (rest of the code)
    } else {
        echo "File upload error: " . $_FILES['marksheetJEE']['error'];
    }
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $admissionRecieptData = file_get_contents($_FILES['admissionReciept']['tmp_name']);
        // ... (rest of the code)
    } else {
        echo "File upload error: " . $_FILES['admissionReciept']['error'];
    }
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $studentRecieptData = file_get_contents($_FILES['studentReciept']['tmp_name']);
        // ... (rest of the code)
    } else {
        echo "File upload error: " . $_FILES['studentReciept']['error'];
    }

    // Handle image uploads and convert to binary data
    
    
    
    
    
    

    // Hash the password
    $hash = password_hash($h, PASSWORD_DEFAULT);

    // Prepare the SQL query
    $sql = "INSERT INTO ams (sname, fname, mname, DOB, gender, phone, email, address, appid, password, course, marks1, marks2, jee, photo, marksheet10, marksheet12, marksheetJEE, admissionReciept, studentReciept) VALUES ('$a', '$b', '$c', '$d', '$e', '$phone', '$email', '$f','$g','$hash','$j','$k','$l','$m', current_timestamp(), '$photo', '$marksheet10', '$marksheet12', '$marksheetJEE', '$admissionReciept', '$studentReciept')";
    $params = array(
        &$a, &$b, &$c, &$d, &$e, &$phone, &$email, &$f, &$g, &$hash, &$j, &$k, &$l, &$m,
        &$photoData, &$marksheet10Data, &$marksheet12Data, &$marksheetJEEData, &$admissionRecieptData, &$studentRecieptData
    );

    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if ($stmt) {
        if (sqlsrv_execute($stmt)) {
            echo "Successfully inserted";
        } else {
            echo "Execution failed.";
        }
        sqlsrv_free_stmt($stmt);
    } else {
        echo "Preparation failed.";
    }

    sqlsrv_close($conn);
}
?>