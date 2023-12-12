<?php

require_once ("config/db.php");
$sql = "SELECT * from ams";
$result = mysqli_query($con,$sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="students.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display">Total Students</h2>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>Name</td>
                                    <td>Application no.</td>
                                    <td>Email</td>
                                    <td>Status</td>
                                </tr>
                                <tr>
                                    <?php
                                    
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <td><?php echo $row['sname']; ?></td>
                                        <td><?php echo $row['appid']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><a href="#">Accept</a> or <a href="#">Reject</a></td>
                                    </tr>
                                        <?php
                                    }
                                    
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>