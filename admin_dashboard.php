<?php

require_once ("config/db.php");
$sql = "SELECT * from ams";
$result = mysqli_query($con,$sql);
$acc = 2;
$pen = mysqli_num_rows($result);
$rej = 0;

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<!-- <script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Session 2023-27"
            },
            axisY: {
                title: "Strength"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Batch 2023-27",
                dataPoints: [
                    { y: 46, label: "CSE" },
                    { y: 47, label: "IT" },
                    { y: 50, label: "ECE" },
                    { y: 110, label: "Electrical" },
                    { y: 104, label: "Mechanical" },
                    { y: 97, label: "Civil" },
                    { y: 72, label: "Chemical" },
                    { y: 58, label: "Metal" },
                    { y: 53, label: "Mining" },
                    { y: 67, label: "Production" }
                ]
            }]
        });
        chart.render();

    }
</script> -->
<!-- <script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Number of Students of Session - 2023-27"
            },
            data: [{
                type: "pie",
                startAngle: 270,
                yValueFormatString: "##0.00\"%\"",
                indexLabel: "{label} {y}",
                dataPoints: [
                    { y: 40 / 6.80, label: "CSE" },
                    { y: 40 / 6.80, label: "IT" },
                    { y: 50 / 6.80, label: "ECE" },
                    { y: 110 / 6.80, label: "Electrical" },
                    { y: 100 / 6.80, label: "Mechanical" },
                    { y: 100 / 6.80, label: "Civil" },
                    { y: 60 / 6.80, label: "Chemical" },
                    { y: 60 / 6.80, label: "Metal" },
                    { y: 60 / 6.80, label: "Mining" },
                    { y: 60 / 6.80, label: "Production" }
                ]
            }]
        });
        chart.render();
    }
</script> -->

<body>
    <div class="nav">
        <h2>Admin Dashboard</h2>
    </div>
    <div class="admin-container">
        <div class="left">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="right">
            <div class="box">
                <div>Accepted Students : <?php echo $acc ?></div>
                <div>Pending Students : <?php echo $pen-$acc-$rej ?></div>
                <div>Rejected Students : <?php echo $rej ?></div>
            </div>

            <div class="main">
                <div class="nav">
                    <!-- <a href="#">Accepted Students</a>
                    <a href="#">Pending Students</a>
                    <a href="#">Rejected Students</a> -->
                </div>
                <div class="card-header">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>Application no.</td>
                                <td>Email</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <?php
                                
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['sname']; ?></td>
                                    <td><?php echo $row['appid']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><a style="color:blue;" href="#">Accept</a> or <a style="color:blue;" href="#">Reject</a></td>
                                </tr>
                                    <?php
                                }
                                
                                ?>
                        </table>
                </div>
            </div>
            <!-- <div class="chart">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                <ul>
                    <li>CSE</li>
                    <li>IT</li>
                    <li>ECE</li>
                    <li>EE</li>
                    <li>MEC</li>
                    <li>CVL</li>
                    <li>CE</li>
                    <li>ME</li>
                    <li>MI</li>
                    <li>PE</li>
                </ul>
                <div class="cir">
                    <div id="chartContainer" style="height: 200px; width: 100%;"></div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script> -->
</body>

</html>