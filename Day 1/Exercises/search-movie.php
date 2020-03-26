<?php
if (!empty($_POST)) {
    var_dump($_POST);
    require_once 'database.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, '3309');
    $query = 'SELECT * FROM movies WHERE title LIKE ' . "'%$_POST[title]%'";
    var_dump($query);
    $res_query = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($res_query)) {
        echo $row['title'] . '<br>' . $row['description'] . '<br>' . $row['realease_date'];
    }
}
