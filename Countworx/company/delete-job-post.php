<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../initialize.php");
  include("../function.php");
  Is_Company_Logged_In(); 

  
//If user Actually clicked Delete button

if(isset($_POST)) {


	//delete User Detail certification accreditation
	$sql = "DELETE FROM compcertificationaccreditation WHERE id_jobpost='$_GET[id]' AND id_company = '$_SESSION[id_user]'";
		if($conn->query($sql) === TRUE) {
	 }

	//delete User Detail Skills
	$sql = "DELETE FROM compskills WHERE id_jobpost='$_GET[id]' AND id_company = '$_SESSION[id_user]'";
		if($conn->query($sql) === TRUE) {
	 }
	 
	 //delete User Detail Core Competence
	$sql = "DELETE FROM compcorecompetencies WHERE id_jobpost='$_GET[id]' AND id_company = '$_SESSION[id_user]'";
		if($conn->query($sql) === TRUE) {
 	 } 



	 //delete Job Post Data

	$stmt1 = $conn->prepare("DELETE FROM job_post WHERE id_jobpost=? AND id_company=?");

	$stmt1->bind_param("ii", $_GET['id'], $_SESSION['id_user']);

	if($stmt1->execute()) {
		//If data Deleted successfully then redirect to dashboard
		$_SESSION['jobPostDeleteSuccess'] = true;
		header("Location: view-job-post.php");
		exit();
	} else {
		//If data failed to delete then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
		echo "Error " . $sql . "<br>" . $conn->error;
	}

	$stmt1->close();
	
	
	 
	




	
	/*$sql = "DELETE FROM compcertificationaccreditation WHERE id_company='$_SESSION[user]' AND id_jobpost='$id_jobpost'";
	//$sqlcertdel = "DELETE FROM compcertificationaccreditation WHERE id_company='$_SESSION[id_user]' AND 'id_jobpost=$_GET[id]'";
		if($conn->query($sql) === TRUE) {
  			echo "Delete Sucess!";
		} else {
		echo "Error ". $sql . "<br>" . $conn->error;
  		//$whaterror .=  $conn->error;
		}*/


	//Sql Query to delete selected jobpost. 
	//Note: We are using GET id which normally not considered safe as anyone can put any id in url and delete but I am using sess
	// $sql = "DELETE FROM job_post WHERE id_jobpost='$_GET[id]' AND id_company='$_SESSION[id_user]'";

	// if($conn->query($sql)===TRUE) {
	// 	//If data Deleted successfully then redirect to dashboard
	// 	$_SESSION['jobPostDeleteSuccess'] = true;
	// 	header("Location: dashboard.php");
	// 	exit();
	// } else {
	// 	//If data failed to delete then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
	// 	echo "Error " . $sql . "<br>" . $conn->error;
	// }

	//Close database connection. Not compulsory but good practice.

} 
	