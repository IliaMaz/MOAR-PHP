<?php
if (!empty($_POST) && $_POST['title']) {
    var_dump($_POST);
    // * include DB_S_U_P_N
    require_once 'database.php';
    // * Trim input
    $search = trim($_POST['title']);
    // * Connection
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, '3309');
    // * Query to use
    $query = 'SELECT * FROM movies WHERE title LIKE ' . "'%$search%'";
    var_dump($query);
    // * The actual query + connection and assignment of the result to a var
    $res_query = mysqli_query($connect, $query);
    // * Show the result, while the results exists
    while ($row = mysqli_fetch_assoc($res_query)) {
        echo $row['title'] . '<br>' . $row['description'] . '<br>' . $row['realease_date'];
    }
}
