<?php
   
    // initiate database connection

	$servername = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'registration';

	$conn = mysqli_connect($servername, $dbuser, $dbpass, $dbname);

	if (!$conn) {

		echo "Cannot connect to the database, please try again!";
	}
	