<?php

//Your Mysql Config
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "countworxjobportal";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);
$mysqli = new mysqli($servername, $username, $password, $dbname);
//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);

}

