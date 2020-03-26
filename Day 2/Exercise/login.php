<?php

if (!empty($_POST) && (!empty($_POST['username']) && !empty($_POST['password']))) {
    session_start();
    var_dump($_POST);
    require_once 'database.php';
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    $query = "SELECT * FROM users WHERE username = '" . $user . "'";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $dbPass = $row['password'];
    }
    $decrypted = password_verify($pass, $dbPass);
    if ($decrypted) {
        echo '<p style="color:green;">You are logged in</p> <br>';
        echo '<a href="index.php">Home</a>';
        $_COOKIE += ['username' => $user];
        $_SESSION = ['username' => $user];
        var_dump($_COOKIE);
        var_dump($_SESSION);
    } else {
        echo '<p style="color:red;">Passwords don\'t match</p>';
    }
}
