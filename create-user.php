<!DOCTYPE html>
<html lang="en">

<?php

if (!empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Generate SHA-256 Hash
        $password = hash('sha256', $password);

        $sql = "INSERT INTO `users`(`username`, `password`, `status`) VALUES ('$username', '$password', 'ACTIVE');";
        $sql = "select * from `users` where username ='" . $username . "' and password = '" . $password . "' and status = 'ACTIVE';";
        $result = mysqli_query($conn, $sql);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows == 1) {
            // Login Successfull
            $_SESSION['user_id'] = $username;
            header("Location: list-potholes.php");
        } else {
            $msg = "Invalid Credentials";
        }
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

        .login-btn input {
            color: #FFF !important;
        }

        .card-title {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="valign-wrapper row login-box">
        <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
            <form method="POST" action="login.php">
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
                    </div>
                </div>
                <div class="card-action right-align">
                    <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
                    <input type="submit" class="btn red darken-4 waves-effect waves-light login-btn" value="Create User">
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
    </script>

</body>

</html>