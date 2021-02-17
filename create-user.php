<!DOCTYPE html>
<html lang="en">

<?php

$errorMsg = "";
$successMsg = "";

include 'dbconnection.php';


if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Generate SHA-256 Hash
        $password = hash('sha256', $password);

        // Check if user exists
        $sql = "select * from `users` where username ='" . $username . "' and password = '" . $password . "' and status = 'ACTIVE';";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            // User already exists
            $errorMsg = "Username '" . $username . "' already exists";
        } else {
            // New User
            $sql = "INSERT INTO `users` (`username`, `password`, `status`) VALUES ('" . $username . "', '" . $password . "', 'ACTIVE');";

            if ($conn->query($sql) === TRUE) {
                $successMsg = "User created succesfully";
            } else {
                $errorMsg = "Error: " . $sql . "<br>" . $conn->error;
            }
        }



        $conn->close();
    }
}

?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>SPOTHOLE - Create Users</title>

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

        .create-user-btn input {
            color: #FFF !important;
        }

        .card-title {
            text-align: center;
        }

        .error-msg {
            color: #e53935;
        }

        .success-msg {
            color: #09c117;
        }
    </style>
</head>

<body>
    <div class="valign-wrapper row login-box">
        <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
            <form method="POST" action="create-user.php" id="create-user-form">
                <div class="card-content">
                    <span class="card-title">SpotHole - Create User</span>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="email">Username</label>
                            <input type="email" class="validate" name="username" id="username" />
                        </div>
                        <div class="input-field col s12">
                            <label for="password">Password</label>
                            <input type="password" class="validate" name="password" id="password" />
                        </div>
                        <div class="input-field col s12">
                            <label for="password">Re-enter Password</label>
                            <input type="password" class="validate" name="password2" id="password2" />
                        </div>
                        <?php if ($errorMsg != "") { ?>
                            <div class="col s12" style="margin-bottom: -20px;">
                                <p class="error-msg"><?php echo $errorMsg ?></p>
                            </div>
                        <?php } ?>
                        <?php if ($successMsg != "") { ?>
                            <div class="col s12" style="margin-bottom: -20px;">
                                <p class="success-msg"><?php echo $successMsg ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-action right-align">
                    <a class="btn-flat waves-effect" style="float: left; color: #000;" href="index.php">Login</a>
                    <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
                    <button class="btn red darken-4 waves-effect waves-light create-user-btn">Create User</button>
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

        $('.create-user-btn').on('click', (e) => {
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
            } else if ($('#password2').val() == "") {
                M.toast({
                    html: 'Re-Enter Password'
                });

                $('#password2').focus();
            } else if ($('#password').val() != $('#password2').val()) {
                M.toast({
                    html: 'Passwords do not match'
                });

                $('#password2').focus();
            } else {
                console.log("Submitting form");
                $('#create-user-form').submit();
            }
        });
    </script>

</body>

</html>