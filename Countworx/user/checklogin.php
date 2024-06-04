<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("initialize.php");

		//session_destroy();

		$userName = mysqli_real_escape_string($conn, $_POST['userName']);
		$passWord = mysqli_real_escape_string($conn, $_POST['passWord']);
		//Encrypt Password
		$passWord = base64_encode(strrev(md5($passWord)));


		 $result = $conn->query("CALL spchecklogin('".$userName."','".$passWord."')");
		//echo "meron b error :".$conn->error;
		$arrayFields= array();
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
					$arrayFields['logas'] = $row['logas'];
					$arrayFields['loginame'] = $row['loginname'];
					$arrayFields['email'] = $row['email'];
					$arrayFields['active'] = $row['active'];
					
					$_SESSION['name'] = $row['loginname'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['id_user'] = $row['id'];
			}	
					echo json_encode($arrayFields);
		}else{
				$arrayFields['loginfailed'] = "loginfailed";
				$arrayFields['logas'] = "anonymouse";
				echo json_encode($arrayFields);
			
		} 			







//If user Actually clicked login button 
///if(isset($_POST)) {

	//Escape Special Characters in String
	///$email = mysqli_real_escape_string($conn, $_POST['email']);
	///$password = mysqli_real_escape_string($conn, $_POST['password']);

	//Encrypt Password
	///$password = base64_encode(strrev(md5($password)));

	//sql query to check user login
	///$sql = "SELECT id_user, firstname, lastname, email, active FROM users WHERE email='$email' AND password='$password'";
	///$result = $conn->query($sql);

	//if user table has this this login details
	///if($result->num_rows > 0) {
		//output data
		///while($row = $result->fetch_assoc()) {

			///if($row['active'] == '0') {
				///$_SESSION['loginActiveError'] = true;
		 		///header("Location: login.php");
				///exit();
			///} else if($row['active'] == '1') { 

				//Set some session variables for easy reference
				///$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
				///$_SESSION['email'] = $row['email'];
				///$_SESSION['id_user'] = $row['id_user'];

				///if(isset($_SESSION['callFrom'])) {
				///	$location = $_SESSION['callFrom'];
				///	unset($_SESSION['callFrom']);
					
				///	header("Location: " . $location);
				///	exit();
				///} else {
				///	header("Location: user/dashboard.php");
				///	exit();
				//}
			///}

			//Redirect them to user dashboard once logged in successfully
			
		///}
 	///} else {

 		//if no matching record found in user table then redirect them back to login page
 		///$_SESSION['loginError'] = $conn->error;
 		///header("Location: login.php");
		///exit();
 	///}

 	//Close database connection. Not compulsory but good practice.
 	///$conn->close();

///} else {
	//redirect them back to login page if they didn't click login button
///	header("Location: login.php");
///	exit();
///}


?>