<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Check</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <nav>
        <div class="links">
            <a class="homeLink" href="index.html">HOME</a>
            <a href="#">ABOUT</a>
            <a href="#">CONTACT</a>
            <a href="#">CHECK STATUS</a>
        </div>
    </nav>

    <?php

    include 'dbconnection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql1 = "SELECT userID FROM Person WHERE Person.Email= '" . $email . "' and Person.Passcode = '" . $password . "';";


    $result = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result) > 0) {
        echo "Login successful!";
        header('Location: https://in-info-web4.informatics.iupui.edu/~gamath/spothole');
    } else {
        echo "Invalid Credentials";
    }

    mysqli_close($conn);

    ?>


    <footer class="footer">
        <div class="footText">
            <h5>This is Web Database Development Lab 1 application to report potholes.</h5>
        </div>
    </footer>
</body>

</html>