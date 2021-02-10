<!DOCTYPE html>
<html lang="en">

<?php
include 'dbconnection.php';
$sql = "select * from `pothole`";
$result = mysqli_query($conn, $sql);
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Fix My Pothole</title>

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
            <a id="logo-container" href="index.html" class="brand-logo left">Fix My Pothole</a>
            <ul class="right">
                <li>
                    <a href="index.html">
                        Home
                    </a>
                </li>
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

                        if ($row['zipCode'] == "in-progress") {
                            $color = "yellow";
                        } else if ($row['zipCode'] == "complete") {
                            $color = "green";
                        }
                ?>
                        <li class="collection-item avatar">
                            <i class="material-icons circle <?php echo $color ?>">filter_tilt_shift</i>
                            <span class="title"><?php echo $row['streetAddress'] ?></span>
                            <p><?php echo $row['zipCode'] ?> <br>
                                <?php echo $row['timestamp'] ?>
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">create</i></a>
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
                Lab Assignment - NEWM-N-510 <a class="orange-text text-lighten-3" target="_blank" href="https://github.com/garricm/NEWM-N510-Lab-1">Source Code</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>