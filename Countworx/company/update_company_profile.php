<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../initialize.php");
include("../function.php");
Is_Company_Logged_In(); 


if(isset($_POST)) {

  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
  $companytype = mysqli_real_escape_string($conn, $_POST['companytype']);
  $compprofile = mysqli_real_escape_string($conn, $_POST['compprofile']);
  $website = mysqli_real_escape_string($conn, $_POST['website']);
  $profileimg = trim(mysqli_real_escape_string($conn, $_POST['profileimg']));
}


 //Update company Table
 $sql = "UPDATE company SET headofficecity='$address', contactno='$contactno', website='$website', companytype='$companytype', compprofile='$compprofile', comp_logo='$profileimg' WHERE companyname='$_SESSION[name]'";
 if($conn->query($sql) === TRUE) {
    /*echo '<script>alert("Update Succesful")</script>';*/
    /*Header("Location: index_logged.php");*/

    echo "Update Successful";
    //echo '<script type="text/javascript">';
   // echo ' alert("Profile Update Successful")';  //not showing an alert box.
    //echo '</script>';

   // header("refresh: 0.2; url = index_logged.php"); 

 } else {
     //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
     echo "Error ". $sql . "<br>" . $conn->error;
 } 







?>