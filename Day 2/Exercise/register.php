<?php
// !! Validation is only done for email due to time constraints, otherwise can do full validation

if (!empty($_POST)) {
    var_dump($_POST);
    $email = $_POST['email'];
    $emailC = $_POST['emailC'];
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $password = $_POST['password'];
    if ($email === $emailC && (strlen($email) > 5 && strpos($email, '@') >  0)) {
        require_once 'database.php';
        $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        $queryInsert = "INSERT INTO users(username, email, password) VALUES ('$user','$email','$pass')";
        $query = "SELECT * FROM users WHERE email = '" . $email . "'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result)) {
            echo 'User with this email already exists';
        } else {
            echo 'Registration complete';
            $resultInsert = mysqli_query($connect, $queryInsert);
        }
    }
}
