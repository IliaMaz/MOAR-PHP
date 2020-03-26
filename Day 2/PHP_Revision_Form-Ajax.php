<?php 

/*

	-- Exercice : 

	In this exercise, we will take care of the login/register process.
	We already made an exercise on this. You can have a look.

	1. Create a new table named 'users' with those attributs : username, mail, password.

	2. Create a 'register.php' page.
	This page should display a form asking informations about the user.

	Once the submit button is clicked, you have to save the user in the database.
	!! IMPORTANT !! When a user register, do an AJAX Call to do the validations and save user.

	But don't forget to check the inputs ! It is mandatory to check for the mail to be a valid one.
	Hash the password before saving in your database. You have to use 'password_hash()'.
	
	3. Create a 'login.php' page. This page will be use to login the user to our website.
	This page should display a form asking username and password to log in.

	!! IMPORTANT !! When a user login, do an AJAX Call to check.

	Once the submit button is clicked, you should check if the fields are not empty.
	If they are not empty, you should check if the user exists in the DB and password is ok.

	Display a corresponding message (green/red).
*/
?>