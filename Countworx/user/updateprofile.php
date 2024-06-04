<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");
  include("../function.php");
  Is_User_Logged_In();  
  
//if user Actually clicked update profile button

	$whaterror = "";
	//Escape Special Characters
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
	$child = mysqli_real_escape_string($conn, $_POST['child']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$contactno = mysqli_real_escape_string($conn, $_POST['contactno']);
	$alternatecontact = mysqli_real_escape_string($conn, $_POST['alternatecontact']);
	$country = mysqli_real_escape_string($conn, $_POST['country']);
	$region = mysqli_real_escape_string($conn, $_POST['region']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$profilepic = trim(mysqli_real_escape_string($conn, $_POST['profilepic']));
	$skills = "";
	IF(isset($_POST['skills'])){$skills =$_POST['skills'];};
	$corecompetency = "";
	IF(isset($_POST['corecompetency'])){$corecompetency =$_POST['corecompetency'];};
	$certificationaccreditations = "";
	IF(isset($_POST['certificationaccreditations'])){$certificationaccreditations =$_POST['certificationaccreditations'];};
	
	
	//educ background
	$educationalBackground = stripcslashes($_POST['educationalBackground']);
	$educationalBackground = json_decode($educationalBackground,TRUE);
	//workexperienced
	$workExperienced = stripcslashes($_POST['workExperienced']);
	$workExperienced = json_decode($workExperienced,TRUE);
	//tbltrainingattended
	$trainingattended = stripcslashes($_POST['trainingattended']);
	$trainingattended = json_decode($trainingattended,TRUE);




	////////////////////////////////////////////////////////
	/////////////////////////Profile////////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	//Update User Header Query
	$sql = "UPDATE users SET firstname='$fname', lastname='$lname', gender='$gender', civilstatus='$civilstatus', child='$child', dob='$dob', age='$age', contactno='$contactno', alternatecontact='$alternatecontact', country='$country', region='$region', city='$city', address='$address', profilepic='$profilepic' WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql) === TRUE) {
		//echo "Update Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	//delete / update User Detail skills
	$sql = "DELETE FROM userskills";
	if($conn->query($sql) === TRUE) {
		//echo "Delete Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	IF ($skills != ""){
		foreach($skills as $yourskills){
			$sql = "INSERT INTO  userskills (id_user, skills) values('$_SESSION[id_user]','$yourskills')";
			if($conn->query($sql) === TRUE) {
				//echo "Delete Sucess!";
			} else {
				//echo "Error ". $sql . "<br>" . $conn->error;
				$whaterror .=  $conn->error;
			}
		}
	}
	
	//delete/update User Detail skills
	
	//delete / update User Detail competencies
	$sql = "DELETE FROM usercorecompetencies";
	if($conn->query($sql) === TRUE) {
		//echo "Delete Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	if ($corecompetency != ""){
		foreach($corecompetency as $yourcompetency){
			$sql = "INSERT INTO  usercorecompetencies (id_user, corecompetency) values('$_SESSION[id_user]','$yourcompetency')";
			if($conn->query($sql) === TRUE) {
				//echo "Delete Sucess!";
			} else {
				//echo "Error ". $sql . "<br>" . $conn->error;
				$whaterror .=  $conn->error;
			}
		}
	}
	//delete/update User Detail competencies
	
	//delete / update User Detail certification accreditation
	$sql = "DELETE FROM usercertificationaccreditation WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql) === TRUE) {
		//echo "Delete Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	IF ($certificationaccreditations != ""){
		foreach($certificationaccreditations as $yourcertificationaccreditations){
			$sql = "INSERT INTO  usercertificationaccreditation (id_user, certifications_accreditations) values('$_SESSION[id_user]','$yourcertificationaccreditations')";
			if($conn->query($sql) === TRUE) {
				//echo "Delete Sucess!";
			} else {
				//echo "Error ". $sql . "<br>" . $conn->error;
				$whaterror .=  $conn->error." @user certification";
			}
		}
	}
	//delete / update User Detail certification accreditation





	////////////////////////////////////////////////////////
	/////////////////educ background////////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	//Delete User detail educationalBackground Query
	$sql = "DELETE FROM usereducbackground WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql) === TRUE) {
		//If data Updated successfully then redirect to dashboard
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	//Insert User detail educationalBackground Query
	foreach ($educationalBackground as $v){
		$School = $v["School"];
		$Location = $v["Location"];
		$Degree = $v["Degree"];
		$Years = $v["Years"];
		$Detail = $v["Detail"];
		
	$sql = "INSERT INTO usereducbackground(id_user,school,degree,year,location,additionalinformation) VALUES('$_SESSION[id_user]','$School','$Degree','$Years','$Location','$Detail')";
	if($conn->query($sql) === TRUE) {
		//If data Updated successfully then redirect to dashboard
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	}
	
	
	////////////////////////////////////////////////////////
	/////////////////work experienced///////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	//Delete User detail $workExperienced Query
	$sql = "DELETE FROM workexperienced WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql) === TRUE) {
		//echo "Update Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	//get the last controlnumber
	$controlnumber =0;
	$sql = "SELECT controlnumber FROM workexperienced order by controlnumber desc limit 1";
	$result=$conn->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$controlnumber  = $row['controlnumber'];
		}
	}
	//Insert User detail $workExperienced Query
	foreach ($workExperienced as $v){
		$controlnumber = $controlnumber + 1;
		$Positiontitle = $v["Positiontitle"];
		$Role = $v["Role"];
		$Benefit = $v["Benefit"];
		$Company = $v["Company"];
		$Positionlevel = $v["Positionlevel"];
		$Workduration = $v["Workduration"];
		$Experiencelevel = $v["Experiencelevel"];
		$Industry = $v["Industry"];
		$Companyaddress = $v["Companyaddress"];
		$Country = $v["Country"];
		$Region = $v["Region"];
		$Currency = $v["Currency"];
		$Amount = $v["Amount"];
		$Reference= $v["Reference"];
		$Contact = $v["Contact"];
		$Jobdescription = $v["Jobdescription"];
		
		$sql = "INSERT INTO workexperienced(controlnumber,id_user,positiontitle,company,positionlevel,workduration,experiencelevel,industry,companyaddress,country,region,currency,amount,reference,contact,jobdescription) VALUES('$controlnumber','$_SESSION[id_user]','$Positiontitle','$Company','$Positionlevel','$Workduration','$Experiencelevel','$Industry','$Companyaddress','$Country','$Region','$Currency','$Amount','$Reference','$Contact','$Jobdescription')";
		if($conn->query($sql) === TRUE) {
			//If data Updated successfully then redirect to dashboard
		} else {
			//echo "Error ". $sql . "<br>" . $conn->error;
			$whaterror .=  $conn->error;
		}
		//delete / update User Detail workexperiencedrole
		$sql = "DELETE FROM workexperiencedrole";
		if($conn->query($sql) === TRUE) {
			//echo "Delete Sucess!";
		} else {
			//echo "Error ". $sql . "<br>" . $conn->error;
			$whaterror .=  $conn->error;
		}
		foreach($Role as $yourrole){
			$sql = "INSERT INTO  workexperiencedrole (controlnumber, rolename) values('$controlnumber','$yourrole')";
			if($conn->query($sql) === TRUE) {
				//echo "Delete Sucess!";
			} else {
				//echo "Error ". $sql . "<br>" . $conn->error;
				$whaterror .=  $conn->error;
			}
		}
		
		//delete / update User Detail workexperiencedbenefit
		$sql = "DELETE FROM workexperiencedbenefit";
		if($conn->query($sql) === TRUE) {
			//echo "Delete Sucess!";
		} else {
			//echo "Error ". $sql . "<br>" . $conn->error;
			$whaterror .=  $conn->error;
		}
		foreach($Benefit as $yourbenefit){
			$sql = "INSERT INTO  workexperiencedbenefit (controlnumber, benefitname) values('$controlnumber','$yourbenefit')";
			if($conn->query($sql) === TRUE) {
				//echo "Delete Sucess!";
			} else {
				//echo "Error ". $sql . "<br>" . $conn->error;
				$whaterror .=  $conn->error;
			}
		}
	
	
	


	
	
	}
	
	



	////////////////////////////////////////////////////////
	////////////////////////Training////////////////////////
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	//Delete User detail $trainingattended Query
	$sql = "DELETE FROM trainingattended WHERE id_user='$_SESSION[id_user]'";
	if($conn->query($sql) === TRUE) {
		//echo "Update Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	//Insert User detail $trainingattended Query
	foreach ($trainingattended as $v){
		$Title = $v["Title"];
		$Duration = $v["Duration"];
		$Conductedby = $v["Conductedby"];
		$Date = $v["Date"];
	$sql = "INSERT INTO trainingattended(id_user,title,duration,conductedby,date) VALUES('$_SESSION[id_user]','$Title','$Duration','$Conductedby','$Date')";
	if($conn->query($sql) === TRUE) {
		//echo "Update Sucess!";
	} else {
		//echo "Error ". $sql . "<br>" . $conn->error;
		$whaterror .=  $conn->error;
	}
	}	
	
	if($whaterror === ""){
		echo "Update Success";
	}else{
		echo $whaterror;
	}
	
	
	
	//Close database connection. Not compulsory but good practice.
	$conn->close();
	
	

