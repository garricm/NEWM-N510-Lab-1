<!DOCTYPE html>
<html lang="en">

<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: list-potholes.php");
}


include 'dbconnection.php';

$msg = "";

if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Generate SHA-256 Hash
        $password = hash('sha256', $password);

        $sql = "select * from `users` where username ='" . $username . "' and password = '" . $password . "' and status = 'ACTIVE';";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            // Login Successfull
            $_SESSION['user_id'] = $username;
            header("Location: list-potholes.php");
            mysqli_close($conn);
        } else {
            $msg = "Invalid Credentials";
            mysqli_close($conn);
        }
    }
}


?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>SPOTHOLE - Login</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />


    <style>
        html,
        body,
        .login-box {
            height: 100%;
            background-color: #e53935;
        }

        .login-btn input {
            color: #FFF !important;
        }

        .card-title {
            text-align: center;
        }

        .error-msg {
            color: #ff082a;
        }

        .card-header {
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="valign-wrapper row login-box">
        <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
            <form method="POST" action="index.php" id="login-form">
                <div class="card-image">
                    <span class="card-header"></span>
                    <span>
                        <a class="btn-flat waves-effect" style="float: left; color: #000;" href="report-pothole.php">Report
                            Pothole</a>
                        <a class="btn-flat waves-effect" style="float: left; color: #000;" href="create-user.php">Create
                            User</a>
                    </span>
                    <br><br>
                    <hr>
                </div>
                <div class="card-content">
                    <span class="card-title">Login</span>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input type="email" class="validate" name="username" id="username" />
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">enhanced_encryption</i>
                            <input type="password" class="validate" name="password" id="password" />
                            <label for="password">Password</label>
                        </div>
                        <?php if ($msg != "") { ?>
                            <div class="col s12" style="margin-bottom: -20px;">
                                <p class="error-msg"><?php echo $msg ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-action right-align">
                    <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
                    <button class="btn red darken-4 waves-effect waves-light login-btn">Login</button>
                </div>
            </form>
        </div>
    </div>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

    <script>
        $("#reset").on("click", function() {
            $('label').removeClass('active');
        });

        $('.login-btn').on('click', (e) => {
            e.preventDefault();

            if ($('#username').val() == "") {
                M.toast({
                    html: 'Enter Email'
                });

                $('#username').focus();
            } else if ($('#password').val() == "") {
                M.toast({
                    html: 'Enter Password'
                });

                $('#password').focus();
            } else {
                console.log("Submitting form");
                $('#login-form').submit();
            }
        });
    </script>

</body>

</html>