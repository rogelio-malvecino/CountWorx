<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../initialize.php");
include("../function.php");
Is_Company_Logged_In(); 


if(ISSET($_POST)) {

  $comp_id=$_SESSION['id_user'];
  $id_jobpost = $_SESSION['id_jobpost'];
  //$id_jobpost =mysqli_real_escape_string($conn,  $_GET['id']);
  $job_title = mysqli_real_escape_string($conn, $_POST['jobtitle']);
  $description = mysqli_real_escape_string($conn, $_POST['job_decription']);
  $job_status = mysqli_real_escape_string($conn, $_POST['job_status']);
  $salary = mysqli_real_escape_string($conn, $_POST['salary']);
  $experience = mysqli_real_escape_string($conn, $_POST['experience']);
  $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
  $industry = mysqli_real_escape_string($conn, $_POST['job_industry']);
  $work_arrangement = mysqli_real_escape_string($conn, $_POST['work_arrangement']);
  $job_location = mysqli_real_escape_string($conn, $_POST['job_location']);
  $position_type = mysqli_real_escape_string($conn, $_POST['positiontype']);
  //$logo=$row['comp_logo'];
  $logo='logo5';

  $certs_accredits = "";
  IF(ISSET($_POST['certification'])){$certs_accredits =$_POST['certification'];};
  
  $comp_skills = "";
  IF(ISSET($_POST['skills'])){$comp_skills =$_POST['skills'];};
  
  $comp_corecompetencies = "";
	IF(ISSET($_POST['core_competencies'])){$comp_corecompetencies =$_POST['core_competencies'];};


//Update company Table
  //$sql = "UPDATE job_post SET id_company='$comp_id', jobtitle='$job_title', descriptio='$description', jobstatus='$job_status', minimumsalary='$minimun_salary', experience='$experience', qualification='$qualification', job_industry='$industry', work_arramgement='$work_arrangement', job_location='$job_location', WHERE id_company='$_SESSION[id_user]'";//
 
 //Insert THIS
 //$sql = "UPDATE job_post SET jobtitle='$job_title', description='$description', jobstatus='$job_status', minimumsalary='$salary', maximumsalary='0', experience='$experience', qualification='$qualification', job_industry='$industry', work_arrangement='$work_arrangement', job_location='$job_location,' position_type='$position_type,' WHERE id_jobpost='$id_jobpost' AND id_company = '$_SESSION[id_user]'";
 //if($conn->query($sql) === TRUE) {
 //}
 
 //Insert THIS
 
 //$sql = "UPDATE job_post SET jobtitle='$job_title' WHERE id_jobpost='$id_jobpost' AND id_company = '$_SESSION[id_user]'";
 //$sql = "UPDATE job_post SET jobtitle='$job_title' WHERE id_jobpost='$_SESSION[id_jobpost]' AND id_company = '$_SESSION[id_user]'";
 
 //Update Job Post Details
 $sql = "UPDATE job_post SET jobtitle='$job_title', description='$description', jobstatus='$job_status', minimumsalary='$salary', maximumsalary='0', experience='$experience', qualification='$qualification', job_industry='$industry', work_arrangement='$work_arrangement', job_location='$job_location', comp_logo='$logo', position_type='$position_type' WHERE id_jobpost='$id_jobpost' AND id_company = '$_SESSION[id_user]'";
 if($conn->query($sql) === TRUE) {
 
}


//delete User Detail certification accreditation
$sql1 = "DELETE FROM compcertificationaccreditation WHERE id_jobpost='$id_jobpost' AND id_company = '$_SESSION[id_user]'";
if($conn->query($sql1) === TRUE) {
 } 

//Update Certifications and Accreditations Detail
if ($certs_accredits != ""){
  foreach($certs_accredits as $yourcerts_accredits){
    $sql2 = "INSERT INTO  compcertificationaccreditation (id_company, certifications_accreditations, id_jobpost) values('$_SESSION[id_user]','$yourcerts_accredits','$id_jobpost')";
    if($conn->query($sql2) === TRUE) {
        }
     }
 }
//delete User Detail Skills
$sql = "DELETE FROM compskills WHERE id_jobpost='$id_jobpost' AND id_company = '$_SESSION[id_user]'";
if($conn->query($sql) === TRUE) {
 } 


//Update Skills Detail
if ($comp_skills != ""){
  foreach($comp_skills as $yourcomp_skills){
    $sql = "INSERT INTO  compskills (id_company, skills, id_jobpost) values('$_SESSION[id_user]','$yourcomp_skills','$id_jobpost')";
    if($conn->query($sql) === TRUE) {
        }
     }
 } 

//delete User Detail Core Competence
$sql = "DELETE FROM compcorecompetencies WHERE id_jobpost='$id_jobpost' AND id_company = '$_SESSION[id_user]'";
if($conn->query($sql) === TRUE) {
 } 


 //Update Core Competencies Detail
if ($comp_corecompetencies != ""){
  foreach($comp_corecompetencies as $yourcomp_corecompetencies){
    $sql = "INSERT INTO  compcorecompetencies (id_company, core_competencies, id_jobpost) values('$_SESSION[id_user]','$yourcomp_corecompetencies','$id_jobpost')";
    if($conn->query($sql) === TRUE) {
        }
     }
 } 

 
 $_SESSION['editjobPOST'] = true;
 header("Location: view-job-post.php");
 exit();



}



 /*if($conn->query($sql) === TRUE) {
    echo '<script>alert("Update Succesful")</script>';
    Header("Location: view-job-post.php");*/

    
    /*echo '<script type="text/javascript">';
    echo ' alert("Profile Update Successful")';  //not showing an alert box.
    echo '</script>';

    header("refresh: 0.2; url = index_logged.php"); */

 //} else {
     //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
 //    echo "Error ". $sql . "<br>" . $conn->error;
 //} 


?>