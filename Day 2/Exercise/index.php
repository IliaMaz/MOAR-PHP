<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <style>
        a,
        p,
        div {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            justify-content: space-between;
        }

        p {
            font-style: oblique;
        }
    </style>
</head>

<body>
    <div style="display: flex;">
        <a href="login-register.php">Login/Register</a>
        <b>
            <p id="loggedIn"><?php echo 'Welcome ' . $_SESSION['username']; ?></p>
        </b>
    </div>
</body>

</html>

<?php
// var_dump($_COOKIE);
// var_dump($_SESSION);
