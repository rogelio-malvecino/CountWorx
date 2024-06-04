<?php

//Your Mysql Config
$servername = "localhost";
$username = "root";
$password = "vertrigo";
$dbname = "job_portal";

//Create New Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}