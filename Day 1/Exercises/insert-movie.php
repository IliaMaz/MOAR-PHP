<?php

$errors = array();
var_dump($_POST);
if (!empty($_POST)) {

    if (empty($_POST['title'])) {
        $errors[] = 'Title is mandatory';
    }
    if (empty($_POST['description'])) {
        $errors[] = 'Description is mandatory';
    }
    if (empty($_POST['release_date'])) {
        $errors[] = 'Release date is mandatory';
    }
    if (empty($_POST['director_id'])) {
        $errors[] = 'Director name is mandatory';
    }

    if (count($errors) === 0) {
        require_once 'database.php';
        var_dump($_POST);
        $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, '3309');
        $query = "INSERT INTO movies( title, description, realease_date, director_id) VALUES (" . "'$_POST[title]'" . "," . "'$_POST[description]'" . "," . "'$_POST[release_date]'" . "," . "'$_POST[director_id]'" . ")";
        var_dump($query);
        $res_query = mysqli_query($connect, $query);
        var_dump($res_query);
        if ($res_query)
            echo 'Added successfully';
        else
            echo 'Failure, error unknown, bye laddie!';
    } else {
        echo implode('<br>', $errors);
    }
}
