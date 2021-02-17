<?php

session_start();
include 'dbconnection.php';

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
        } else {
            header("Location: index.php");
        }
    }
}
