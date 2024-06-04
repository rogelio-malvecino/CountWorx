<?php
//Session Variables
  session_start();
  //ConnString
  require_once("initialize.php");
  
 
 if ($_GET["functionName"] == 'inputJobtitle')
	{
 		$searchkeyword = $_GET['term'];
		$sql="SELECT jobtitle FROM job_post WHERE jobtitle like '%".$searchkeyword."%'";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $res[] = $row['jobtitle'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}
	
if ($_GET["functionName"] == 'inputLocation')
	{
 		$searchkeyword = $_GET['term'];
		$sql="SELECT job_location FROM job_post WHERE job_location like '%".$searchkeyword."%'";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $res[] = $row['job_location'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}	
	
if ($_GET["functionName"] == 'inputQual')
	{
 		$searchkeyword = $_GET['term'];
		$sql="SELECT qualification FROM job_post WHERE qualification like '%".$searchkeyword."%'";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $res[] = $row['qualification'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}	

if ($_GET["functionName"] == 'country')
	{
 		$searchkeyword = $_GET['term'];
		$sql="SELECT name FROM countries WHERE name like '%".$searchkeyword."%'";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $res[] = $row['name'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}
	if ($_GET["functionName"] == 'city')
	{
 		$searchkeyword = $_GET['term'];
		$sql="SELECT name FROM cities WHERE name like '%".$searchkeyword."%'";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $res[] = $row['name'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}	
	if ($_GET["functionName"] == 'region')
	{
 		$searchkeyword = $_GET['term'];
		$sql="SELECT name FROM states WHERE name like '%".$searchkeyword."%'";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $res[] = $row['name'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}
	
	if ($_GET["functionName"] == 'experiencelevel')
	{
 		$sql="SELECT * FROM experience_level";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$res[] = $row['experiencelevelname'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}	
	
	if ($_GET["functionName"] == 'corecompetency')
	{
 		$sql="SELECT * FROM master_core_competencies";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$res[] = $row['core_competencies'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}	

	if ($_GET["functionName"] == 'roles')
	{
 		$sql="SELECT * FROM master_roles";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$res[] = $row['roles'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}		
	
	if ($_GET["functionName"] == 'positionlevel')
	{
 		$sql="SELECT * FROM position_level";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$res[] = $row['positionlevelname'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}		
	
	if ($_GET["functionName"] == 'currency')
	{
 		$sql="SELECT * FROM currency";
                  $result=$conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
						$res[] = $row['isocode'];
                    }
                  }else{
					$res = array();
				  }
				  echo json_encode($res);
	}		
?>