<!DOCTYPE html>
<html lang="en">

<?php

session_start();

include 'dbconnection.php';
$potholeId = $_GET["id"];

$sql = "select * from `pothole` where potholeId=" . $potholeId;
$result = mysqli_query($conn, $sql);

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>SPOTHOLE</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
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
                        <a href="list-potholes.php">
                            List
                        </a>
                    </li>
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
                <h3 class="header center">Modify Pothole</h3>
            </div>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $street_address = $row["streetAddress"];
                    $city = $row["city"];
                    $state = $row["state"];
                    $zip_code = $row["zipCode"];
                    $description = $row["description"];
                    $first_name = $row["firstName"];
                    $last_name = $row["lastName"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $status = $row["status"];

                    $isAnonymous = $row["isAnonymous"];
            ?>
                    <div class="row">
                        <form class="col s12" action="edit-pothole.php" method="POST">
                            <input type="hidden" id="potholeId" name="potholeId" value="<?php echo $potholeId ?>">
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="status" id="status-dropdown">
                                        <option value="new" <?php if ($status == "new") echo "selected" ?>>New</option>
                                        <option value="in-progress" <?php if ($status == "in-progress") echo "selected" ?>>In-Progress</option>
                                        <option value="complete" <?php if ($status == "complete") echo "selected" ?>>Complete</option>
                                    </select>
                                    <label>Pothole Status</label>
                                </div>
                            </div>
                            <!-- Pothole Location -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">description</i>
                                    <textarea name="street_address" placeholder="<?php echo $street_address ?>" required="" aria-required="true" id="street_address" class="materialize-textarea" data-length="100" disabled></textarea>
                                    <label for="street_address">Street Address</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">location_city</i>
                                    <input name="city" required="" value="<?php echo $city ?>" aria-required="true" id="city" type="text" class="validate" disabled>
                                    <label for="city">City</label>
                                </div>
                                <!-- TODO: Change to Dropdown -->
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">my_location</i>
                                    <input name="state" required="" value="<?php echo $state ?>" aria-required="true" id="state" type="text" class="validate" disabled>
                                    <label for="state">State</label>
                                </div>
                                <div class="input-field col s12 m4">
                                    <i class="material-icons prefix">location_on</i>
                                    <input name="zip_code" required="" value="<?php echo $zip_code ?>" aria-required="true" id="zip_code" type="tel" class="validate" disabled>
                                    <label for="zip_code">Zip Code</label>
                                </div>
                            </div>
                            <!-- Pothole Description -->
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">description</i>
                                    <textarea name="description" id="description" placeholder="<?php echo $description ?>" class="materialize-textarea" data-length="256" disabled></textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <?php if ($isAnonymous != "Y") { ?>
                                <!-- User Info -->
                                <div id="user-info">
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input name="first_name" id="first_name" type="text" value="<?php echo $first_name ?>" class="validate" disabled>
                                            <label for="first_name">First Name</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input name="last_name" id="last_name" type="text" value="<?php echo $last_name ?>" class="validate" disabled>
                                            <label for="last_name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">email</i>
                                            <input name="email" id="email" type="email" value="<?php echo $email ?>" class="validate" disabled>
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">phone</i>
                                            <input name="telephone" id="telephone" type="tel" value="<?php echo $phone ?>" class="validate" disabled>
                                            <label for="telephone">Telephone</label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <!-- Buttons -->
                            <div class="row">
                                <button class="btn waves-effect waves-light submit-btn right" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
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
                    <p class="grey-text text-lighten-4">This is a Web database application that will allow citizens
                        to
                        report potholes within their local community so that they can be fixed. The application
                        allows users to submit information about the pothole including their name, phone number
                        and/or
                        email, the location of the pothole, and a description to provide additional
                        information about the location and/or pothole. The user can also report the pothole
                        anonymously.
                    </p>


                </div>
                <!-- Team Members -->
                <div class="col l4 s12">
                    <h5 class="white-text">Team Members</h5>
                    <ul>
                        <li><a class="orange-text text-lighten-3" target="_blank" href="https://www.linkedin.com/in/miguel-angel-llamas-estrada">Miguel Angel Llamas
                                Estrada</a></li>
                        <li><a class="orange-text text-lighten-3" target="_blank" href="#!">Shruti Devulapalli</a>
                        </li>
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


<?php

                }
            }

?>

</html>