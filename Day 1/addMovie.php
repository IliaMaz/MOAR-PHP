<?php

require_once 'database.php';

$errors = array();

if (!empty($_POST)) {

    // Basics validations
    if (empty($_POST['title'])) {
        $errors[] = 'Title is mandatory';
    }

    if (empty($_POST['year'])) {
        $errors[] = 'Year of release is mandatory';
    }

    if (count($errors) === 0) {

        // If no errors, insert into DB
        require_once 'database.php';
        // Open a connection to the DBMS
        $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, '3309');

        $query = "INSERT INTO movies(title, release_year, director_id) 
		VALUES('" . $_POST['title'] . "', '" . $_POST['year'] . "')";

        // Send an SQL request to our DB
        $result_query = mysqli_query($connect, $query);

        if ($result_query) {
            echo 'Movie successfully addded !';
        } else {
            echo 'Error inserting into the DB';
        }
    } else {
        echo implode('<br>', $errors);
    }
}
