<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../initialize.php");
include("../function.php");
Is_Company_Logged_In(); 


if(isset($_POST)) {
  
  $comp_id=$_SESSION['id_user'];
  $job_title = mysqli_real_escape_string($conn, $_POST['jobtitle']);
  $description = mysqli_real_escape_string($conn, $_POST['job_decription']);
  $job_status = mysqli_real_escape_string($conn, $_POST['job_status']);
  $salary = mysqli_real_escape_string($conn, $_POST['salary']);
  $experience = mysqli_real_escape_string($conn, $_POST['experience']);
  $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
  $industry = mysqli_real_escape_string($conn, $_POST['job_industry']);
  $work_arrangement = mysqli_real_escape_string($conn, $_POST['job_setup']);
  $job_location = mysqli_real_escape_string($conn, $_POST['job_location']);
  $position_type = mysqli_real_escape_string($conn, $_POST['positiontype']);
  //$logo=$row['comp_logo'];
  
  $certs_accredits = "";
  IF(ISSET($_POST['certification'])){$certs_accredits =$_POST['certification'];};
  
  $comp_skills = "";
  IF(ISSET($_POST['skills'])){$comp_skills =$_POST['skills'];};
  
  $comp_corecompetencies = "";
	IF(ISSET($_POST['core_competencies'])){$comp_corecompetencies =$_POST['core_competencies'];};
  
}


 //Update Job Post Table
 $sql = "INSERT INTO job_post(id_company, jobtitle, description, jobstatus, minimumsalary, maximumsalary, experience, qualification, job_industry, work_arrangement, job_location, position_type) VALUES ('$comp_id', '$job_title', '$description', '$job_status', '$salary', 0, '$experience', '$qualification', '$industry', '$work_arrangement', '$job_location', '$position_type')";
 if (mysqli_query($conn, $sql)) {
  $last_id_inserted = mysqli_insert_id($conn);
 //echo "New record created successfully. Last inserted ID is: " . $last_id;
}


 //Update Certifications and Accreditations Detail
if ($certs_accredits != ""){
  foreach($certs_accredits as $yourcerts_accredits){
    $sql = "INSERT INTO  compcertificationaccreditation (id_company, certifications_accreditations, id_jobpost) values('$_SESSION[id_user]','$yourcerts_accredits','$last_id_inserted')";
    if($conn->query($sql) === TRUE) {
        }
     }
 } 

//Update Skills Detail
if ($comp_skills != ""){
  foreach($comp_skills as $yourcomp_skills){
    $sql = "INSERT INTO  compskills (id_company, skills, id_jobpost) values('$_SESSION[id_user]','$yourcomp_skills','$last_id_inserted')";
    if($conn->query($sql) === TRUE) {
        }
     }
 } 

//Update Core Competencies Detail
if ($comp_corecompetencies != ""){
  foreach($comp_corecompetencies as $yourcomp_corecompetencies){
    $sql = "INSERT INTO  compcorecompetencies (id_company, core_competencies, id_jobpost) values('$_SESSION[id_user]','$yourcomp_corecompetencies','$last_id_inserted')";
    if($conn->query($sql) === TRUE) {
        }
     }
 } 



 $_SESSION['newjobPOST'] = true;
 header("Location: view-job-post.php");
 exit();




 
 //if($conn->query($sql) === TRUE) {
 //   echo '<script>alert("Update Succesful")</script>';
 //   Header("Location: view-job-post.php");

    
    /*echo '<script type="text/javascript">';
    echo ' alert("Profile Update Successful")';  //not showing an alert box.
    echo '</script>';

    header("refresh: 0.2; url = index_logged.php"); */

// } else {
     //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
//     echo "Error ". $sql . "<br>" . $conn->error;
// } 


?>