<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
}

include 'dbconnection.php';

$potholeId = $_POST["potholeId"];
$status = $_POST["status"];

$sql = "update `pothole` set status='" . $status . "' where potholeId=" . $potholeId;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>SPOTHOLE - Edit Pothole</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />


    <style>
        .section {
            padding-top: 1rem;
            padding-bottom: 1rem;
            padding: 2.5rem;
            margin-top: 1rem;
            background: #fffffb;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <nav class="red darken-4" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo left">Spothole</a>
            <ul class="right">
                <li>
                    <a href="list-potholes.php">
                        List
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
                <?php

                if ($conn->query($sql) === TRUE) {
                ?>
                    <h3 class="header center">Pothole record updated</h3>
                <?php
                } else {

                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                ?>
            </div>
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