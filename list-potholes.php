<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}

include 'dbconnection.php';

$sql = "select * from `pothole` order by timestamp desc";
$result = mysqli_query($conn, $sql);

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>SPOTHOLE</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />

    <style>
        .secondary-content {
            float: right;
            color: #000;
        }
    </style>
</head>

<body>
    <nav class="red darken-4" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo left">Spothole</a>
            <ul class="right">
                <li>
                    <a href="report-pothole.php">
                        Report Pothole
                    </a>
                </li>
                <?php
                if (isset($_SESSION['user_id'])) {
                ?>
                    <li>
                        <a href="#">
                            <?php echo $_SESSION['user_id'] ?>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            Logout
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="section" style="min-height: 300px;">
            <div>
                <h3 class="header center">List - Reported Potholes</h3>
            </div>

            <ul class="collection">
                <?php

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        // var_dump($row);
                        $color = "red";

                        if ($row['status'] == "in-progress") {
                            $color = "yellow";
                        } else if ($row['status'] == "complete") {
                            $color = "green";
                        }
                ?>
                        <li class="collection-item avatar">
                            <i class="material-icons circle <?php echo $color ?>" style="margin-top: 10px;">filter_tilt_shift</i>
                            <span class="title"><?php echo $row['streetAddress'] ?></span>
                            <p><?php echo $row['zipCode'] ?> <br>
                                Status - <b><?php echo strtoupper($row['status']) ?></b>
                            </p>
                            <a href="view-pothole.php?id=<?php echo $row["potholeId"] ?>" class="secondary-content" style="margin-top: 10px;margin-right: 20px;">
                                <span style="font-weight: bold; font-size: 13px;">Modify</span>
                                <!-- <a class="waves-effect waves-light btn">button</a> -->

                                <!-- <i class="material-icons">create</i> -->
                            </a>
                        </li>
                    <?php
                    }
                } else {
                    ?>

                    <h5 style="text-align: center;">No records found..</h5>

                <?php
                }
                ?>
            </ul>
        </div>
        <br><br>
    </div>

    <footer class="page-footer red darken-4">
        <div class="container">
            <div class="row">
                <!-- Project Description -->
                <div class="col l8 s12">
                    <h5 class="white-text">About</h5>
                    <p class="grey-text text-lighten-4">This is a Web database application that will allow citizens to
                        report potholes within their local community so that they can be fixed. The application
                        allows users to submit information about the pothole including their name, phone number and/or
                        email, the location of the pothole, and a description to provide additional
                        information about the location and/or pothole. The user can also report the pothole anonymously.
                    </p>


                </div>
                <!-- Team Members -->
                <div class="col l4 s12">
                    <h5 class="white-text">Team Members</h5>
                    <ul>
                        <li><a class="orange-text text-lighten-3" target="_blank" href="https://www.linkedin.com/in/miguel-angel-llamas-estrada">Miguel Angel Llamas
                                Estrada</a></li>
                        <li><a class="orange-text text-lighten-3" target="_blank" href="#!">Shruti Devulapalli</a></li>
                        <li><a class="orange-text text-lighten-3" target="_blank" href="https://www.linkedin.com/in/garric/">Garric Mathias</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                Lab Assignment - NEWM-N-510 <a class="orange-text text-lighten-3" target="_blank" href="https://github.com/garricm/SPOTHOLE/tree/garric-assignment-1">Source Code</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>