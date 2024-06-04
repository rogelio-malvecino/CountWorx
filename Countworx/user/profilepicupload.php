<?php
session_start();
  //ConnString
  require_once("../initialize.php");
  include("../function.php");
  Is_User_Logged_In();  
  

if(isset($_FILES['file']['name'])){

   /* Getting file name */
   $filename = $_SESSION['id_user'].$_FILES['file']['name'];
   
   /* Location */
   $location = "../logos/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         $response = $location;
      }
   }

   echo $response;
   exit;
}

echo 0;