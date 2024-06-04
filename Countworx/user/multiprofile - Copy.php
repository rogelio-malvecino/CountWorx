<?php
  //Session Variables
  session_start();
  //ConnString
  require_once("../initialize.php");
  include("../function.php");
  Is_User_Logged_In();  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Financial Professionals Job Portal-Countworx Inc.</title>
    
	<!-- Use for Search Function -->
    <script src="../js/jquery3.5.1.js"></script>
    <script src="../js/jqueryui/jquery.ui.js"></script>
	<!-- Use for Search Function -->
	
	
    <!-- Front End Visuals -->	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <link rel="stylesheet" href="../css/mycss.css">
    <link href="../css/sticky-menu.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/jhuncss.css" rel="stylesheet">
    <!-- Front End Visuals -->	

    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --> <!-- replace with other version -->
    
    <!-- Use for Bootstrap Drop Down-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<!-- Use for Bootstrap Drop Down -->
	
	<!--Misc-->
    <link href="../css/incremental_counter.css" rel="stylesheet">
    <link href="../js/jqueryui/jquery.ui.css" rel="stylesheet">
    <!--Misc-->
	 
  <style> 
        .dropdown { 
            position: static !important; 
        } 
          
        .dropdown-menu { 
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)!important; 
            margin-top: -30px !important; 
            width: 20% !important; 
            margin-left: -120px !important;
        }
		
		
		#tbleducationbackground td{
			display: block;
		}
		
		#tbleducationbackground td, #tblworkExperienced td{
			display: inline-block;
		}
		
		/*#tbleducationbackground{
			border-collapse:collapse; 
			border-spacing: 5em;
			
		}*/
		
		#tbleducationbackground tr, #tblworkExperienced tr{
			border-bottom: 5px solid gray;
			border-spacing: 5em;
			display: block;
			padding-bottom: 10px;
			
		}
		#tbleducationbackground tr:nth-child(even), #tblworkExperienced tr:nth-child(even){ 
            background-color: #d9d9d9; 
        } 
		
  </style>
   



	<script>
	$(document).ready(function(){
		$(".preview img").show();
		var educationalBackground = [];
		var workExperienced =[];
		var trainingattended = [];
		var index = $('#tblworkExperienced tr').length;
		var countryindex = '';
		var regionindex ='';
		
		$("#tbleducationbackground").on('click', 'tr button', function () {
			//alert("hello");
			$(this).closest('tr').remove();
			//$(this).remove();
		});
	
		$("#btnrowaddeducbackground").click(function(){
			//alert("row add");
			$("#tbleducationbackground").append("\
			<tr>\
			<td width='35%'><label for='School'>School</label><input type='text' class='form-control'></td>\
			<td width='30%'><label for='Location'>Location</label><input type='text' class='form-control'></td>\
			<td width='30%'><label for='Certification'>Certification</label><input type='text' class='form-control'></td>\
			<td width='20%'><label for='Degree'>Degree</label><input type='text' class='form-control'></td>\
			<td width='15%'><label for='Year'>Year Graduated</label><input type='date' class='form-control'></td>\
			<td width='40%'><label for='Detail'>Detail</label><textarea class='form-control' rows='1'></textarea></td>\
			<td width='15%'><button class='jadddeleterow'><img src='../img/rowdelete.png' width='20' height='20'></button></td>\
			</tr>");
		});	
		
		
		
		$("#tblworkExperienced").on('click', 'tr button', function () {
			$(this).closest('tr').remove();
		});
		
		$("#tblworkExperienced").on('click', 'input', function () {
			var whatinput =  $(this).attr('id').substr(0,8);
			countryindex = '#'+$(this).attr('id');
			regionindex = '#'+$(this).attr('id');
			
			if(whatinput === 'wcountry'){
				$(countryindex).autocomplete({
					source: "../autocompletedata.php?functionName=country"
				});
			}else{
				$(regionindex).autocomplete({
					source: "../autocompletedata.php?functionName=region"
				});
			}
		});
		
		
		
		
		$("#btnrowaddworkx").click(function(){
			var experiencelevel ="";
			var corecompetencies ="";
			var roles="";
			var positionlevel="";
			var currency="";
			index =index + 1;
			
			$.ajax({
				type:"POST",
				dataType: "json",
				async:false,
				url:"../autocompletedata.php?functionName=experiencelevel",
				success: function(result){
					$.each(result, function (index, value) {
						experiencelevel = experiencelevel + "<option value='" + value + "'>" + value + "</option>";
					});	
				},
				error: function(result){
					alert("error" + result);
				}
			});	
			
			$.ajax({
				type:"POST",
				dataType: "json",
				async:false,
				url:"../autocompletedata.php?functionName=corecompetency",
				success: function(result){
					$.each(result, function (index, value) {
						corecompetencies = corecompetencies + "<option value='" + value + "'>" + value + "</option>";
					});	
				},
				error: function(result){
					alert("error" + result);
				}
			});	
			$.ajax({
				type:"POST",
				dataType: "json",
				async:false,
				url:"../autocompletedata.php?functionName=roles",
				success: function(result){
					$.each(result, function (index, value) {
						roles = roles + "<option value='" + value + "'>" + value + "</option>";
					});	
				},
				error: function(result){
					alert("error" + result);
				}
			});	
			
			$.ajax({
				type:"POST",
				dataType: "json",
				async:false,
				url:"../autocompletedata.php?functionName=positionlevel",
				success: function(result){
					$.each(result, function (index, value) {
						positionlevel = positionlevel + "<option value='" + value + "'>" + value + "</option>";
					});	
				},
				error: function(result){
					alert("error" + result);
				}
			});	
			
			$.ajax({
				type:"POST",
				dataType: "json",
				async:false,
				url:"../autocompletedata.php?functionName=currency",
				success: function(result){
					$.each(result, function (index, value) {
						currency = currency + "<option value='" + value + "'>" + value + "</option>";
					});	
				},
				error: function(result){
					alert("error" + result);
				}
			});	


			
			$("#tblworkExperienced").append("\
			<tr>\
			<td width='20%'><label for='experiencedlevel'>Experience Level</label><select class='form-control' id='experiencelevel' name='experiencelevel' width='40'>"+experiencelevel+"</select></td>\
			<td width='25%'><label for='corecompetencies'>Core Competencies</label><select class='form-control' id='corecompetency' name='corecompetency' width='40'>"+corecompetencies+"</select></td>\
			<td width='25%'><label for='positiontitle'>Position Title</label><input type='text' class='form-control'></td>\
			<td width='20%'><label for='role'>Role</label><select class='form-control' id='roles' name='roles' width='40'>"+roles+"</select></td>\
			<td width='20%'><label for='workduration'>Work Duration</label><input type='text' class='form-control'></td>\
			<td width='25%'><label for='company'>Company</label><input type='text' class='form-control'></td>\
			<td width='25%'><label for='industry'>Industry</label><input type='text' class='form-control'></td>\
			<td width='20%'><label for='country'>Country</label><input type='text' id='wcountry"+index+"' class='form-control'></td>\
			<td width='20%'><label for='region'>Region</label><input type='text' id='wregion"+index+"' class='form-control'></td>\
			<td width='25%'><label for='positionlevel'>Position Level</label><select class='form-control' id='positionlevel' name='positionlevel' width='40'>"+positionlevel+"</select></td>\
			<td width='10%'><label for='currency'>Montly Salary</label><select class='form-control' id='currency' name='currency' width='40'>"+currency+"</select></td>\
			<td width='15%'><label for='amount'> Amount </label><input type='number'  min='0' value='0' step='0.01' class='form-control'</td>\
			<td width='20%'><label for='otherbenefit'>Other Benefit</label><input type='text' class='form-control'></td>\
			<td width='20%'><label for='reference'>Reference</label><input type='text' class='form-control'></td>\
			<td width='25%'><label for='contact'>Contact</label><input type='text' class='form-control'></td>\
			<td width='35%'><label for='jobdescription'>Job Description</label><textarea class='form-control' rows='1'></textarea></td>\
			<td width='15%'><button class='jadddeleterow'><img src='../img/rowdelete.png' width='20' height='20'></button></td>\
			</tr>");
		});	
		
		
		$("#tbltrainingattended").on('click', 'tr button', function () {
			//alert("hello");
			$(this).closest('tr').remove();
			//$(this).remove();
		});
		
		$("#btnrowaddtrainingattended").click(function(){
			//alert("row add");
			$("#tbltrainingattended").append("\
			<tr>\
			<td width='20%'><input type='text' class='form-control'></td>\
			<td width='15%'><input type='text' class='form-control'></td>\
			<td width='20%'><input type='text' class='form-control'></td>\
			<td width='15%'><input type='text' class='form-control'></td>\
			<td width='15%'><button class='jadddeleterow'><img src='../img/rowdelete.png' width='20' height='20'></button></td>\
			</tr>");
		});	
		
	function getTabledata(){
		$('#tbleducationbackground tr:not(:has(th))').each(function(row, tr){
			var School = $(tr).find('td:eq(0)').find('input').val();
			var Location = $(tr).find('td:eq(1)').find('input').val();
			var Certificate = $(tr).find('td:eq(2)').find('input').val();
			var Degree = $(tr).find('td:eq(3)').find('input').val();
			var Years = $(tr).find('td:eq(4)').find('input').val();
			var Detail = $(tr).find('td:eq(5)').find('textarea').val();
			educationalBackground[row]={"School":School,"Degree":Degree,"Years":Years,"Location":Location,"Certificate":Certificate,"Detail":Detail};  
		}); 

		$('#tblworkExperienced tr:not(:has(th))').each(function(row, tr){
			
			var Experiencelevel = $(tr).find('td:eq(0)').find('option:selected').val();
			var Corecompetency = $(tr).find('td:eq(1)').find('option:selected').val();
			var Positiontitle = $(tr).find('td:eq(2)').find('input').val();
			var Role = $(tr).find('td:eq(3)').find('option:selected').val();
			var Workduration = $(tr).find('td:eq(4)').find('input').val();
			var Company = $(tr).find('td:eq(5)').find('input').val();
			var Industry = $(tr).find('td:eq(6)').find('input').val();
			var Country = $(tr).find('td:eq(7)').find('input').val();
			var Region = $(tr).find('td:eq(8)').find('input').val();
			var Positionlevel = $(tr).find('td:eq(9)').find('option:selected').val();
			var Currency = $(tr).find('td:eq(10)').find('option:selected').val();
			var Amount = $(tr).find('td:eq(11)').find('input').val();
			var Otherbenefit = "";//$(tr).find('td:eq(12)').find('input').val();
			var Reference = $(tr).find('td:eq(13)').find('input').val();
			var Contact = $(tr).find('td:eq(14)').find('input').val();
			var Jobdescription = $(tr).find('td:eq(15)').find('textarea').val();
			workExperienced[row]={"Experiencelevel":Experiencelevel,"Corecompetency":Corecompetency,"Positiontitle":Positiontitle,"Role":Role,"Workduration":Workduration,"Company":Company,"Industry":Industry,"Country":Country,"Region":Region,"Positionlevel":Positionlevel,"Currency":Currency,"Amount":Amount,"Otherbenefit":Otherbenefit,"Reference":Reference,"Contact":Contact,"Jobdescription":Jobdescription};  
		}); 
		
		$('#tbltrainingattended tr:not(:has(th))').each(function(row, tr){
			var Title = $(tr).find('td:eq(0)').find('input').val();
			var Duration = $(tr).find('td:eq(1)').find('input').val();
			var Conductedby = $(tr).find('td:eq(2)').find('input').val();
			var Date = $(tr).find('td:eq(3)').find('input').val();
			trainingattended[row]={"Title":Title,"Duration":Duration,"Conductedby":Conductedby,"Date":Date};  
		}); 
		
		//alert(JSON.stringify(educationalBackground));
	}
	
	

	
	
		$("#btn_Update").click(function(){
			getTabledata();
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var gender = $("#gender option:selected").val();
			var civilstatus = $("#civilstatus option:selected").val();
			var child = $("#child option:selected").val();
			var dob = $("#dob").val();
			var age = $("#age").val();
			var email = $("#email").val();
			var contactno = $("#contactno").val();
			var alternatecontact = $("#alternatecontact").val();
			var country = $("#country").val();
			var region = $("#region").val();
			var city = $("#city").val();
			var address = $("#address").val();
			var profilepic = $('#profileimg').attr('src');
			
			
			$.ajax({
				type:"POST",
				async:false,
				url:"updateprofile.php",
				data: {fname:fname,lname:lname,gender:gender,civilstatus:civilstatus,child:child,dob:dob,age:age,email:email,contactno:contactno,alternatecontact:alternatecontact,country:country,region:region,city:city,address:address,profilepic:profilepic,educationalBackground:JSON.stringify(educationalBackground),workExperienced:JSON.stringify(workExperienced),trainingattended:JSON.stringify(trainingattended)}, 
				success: function(result){
					//$("#ajax_search_result").html(result);
					alert(result);
				},
				error: function(result){
					alert("error" + result);
				}
			});	
		});
	
	
	
	//$("#but_upload").click(function(){
	function uploadprofilepic(){
        var fd = new FormData();
        var files = $('#file')[0].files;
	
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
			//alert(files);
           $.ajax({
              url: 'profilepicupload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
					$("#profileimg").attr("src",response); 
                    $(".preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        }else{
           alert("Please select a file.");
        }
	};	
    //});
	
	
	$(".preview").click(function(){
	   $('#file').trigger('click');	
	});    
	
	$("#file").change(function(){
		
		if (confirm("Upload Image!")) {
			uploadprofilepic();
		} else {
			
		} 
		
         //submit the form here
	});
	
	
	
	
		
		$( "#country" ).autocomplete({
			source: "../autocompletedata.php?functionName=country"
		});
		$( "#city" ).autocomplete({
			source: "../autocompletedata.php?functionName=city"
		});
		$( "#region" ).autocomplete({
			source: "../autocompletedata.php?functionName=region"
		});
	
	
	});	
	
	
</script>

	

  </head>
  <body>
    
    
  <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index_logged.php">COUNTWORX INC.</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
          
          //if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
              
            ?>
            <!--<li><a href="applied-jobs.php">Jobs Applied</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="../logout.php">Logout</a></li>-->

            <button class="btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown"><?php echo $_SESSION['name']; ?> <span class="glyphicon glyphicon-user pull-right"></span>
                <span class="caret"></span></button>
                <ul class="dropdown-menu " style="right:auto; left: auto; ">
                    <li><a href="index_logged.php" class="blue-text">Home <span class="glyphicon glyphicon-home pull-right "></span></a></li>
                    <li class="divider" ></li>
                    
                    <li><a href="applied-jobs.php" class="blue-text"> Jobs Applied <span class="glyphicon glyphicon-briefcase pull-right "></span></a></li>
                    <li><a href="profile.php" class="blue-text">Profile <span class="glyphicon glyphicon-heart pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="../logout.php" class="blue-text">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                </ul>
              
              </div>  
              
              <!-- Drop Down Menu-->

            <?php
             // } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
              ?>
             <!-- <li><a href="company/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li> -->
              <?php //}  else { 
            ?>
              
             <!-- <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li> -->
              
              <?php //} ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section>
  <div class="content-wrapper" style="margin-left: 0px;" >

      <section class="content-header bg-main-user-profile">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head-sub">
              <h1>Your Personal Profile</h1>
              
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            

    <section>
      

	  
    <div class="container">      
      <div class="row">
        <h2 class="text-center"></h2>
        <div class="col-md-2">
		
          <a href="resume-upload.php" class="my-button">Upload Resume</a>
          <!--<a href="generate-resume.php" class="btn btn-success">Generate Resume</a>-->
        </div>
        <div class="col-md-2">
          <!--<a href="#" class="btn btn-success">Create Cover Letter</a>-->
        </div>
        <div class="col-md-2">
          <!--<a href="resume-upload.php" class="btn btn-success">Upload Resume</a>-->
        </div>
        <?php
        //If resume is uploaded then show download link.
        $sql = "SELECT resume FROM users WHERE id_user='$_SESSION[id_user]' AND resume IS NOT NULL";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          ?>
        <div class="col-md-2">
          <a href="../uploads/resume/<?php echo $row['resume']; ?>" class="my-button" download="MyUploadedResume">Download Resume</a>
        </div>
        <?php }  ?>
      </div>
    </div>
      
        <div class="container">
        <div class="row">

			
		  
		  
       <!--  <form method="post" action="updateprofile.php"> -->
          <?php
            //Sql to get logged in user details.
            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            $result = $conn->query($sql);

            //If user exists then show his details.
            //Todo: Create Seprate Page For Password Change.
            if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
            ?>
				<div class="row" id="profilepiccontainer" >
				<!-- <form method="post" action="" enctype="multipart/form-data" id="profilepicform"> -->
					<div class='preview'>
						<img src="<?php echo $row['profilepic']; ?>" id="profileimg" width="150" height="150">
					</div>
					<div>
					<input type="file" id="file" name="file" style="display: none" >
					</div>
				<!-- </form> -->
				</div>
			    <h2 class="text-center">Profile</h2>
		  
          <div class="jcol-md-4 jwell">      
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?php echo $row['firstname']; ?>" required="">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" value="<?php echo $row['lastname']; ?>" required="">
              </div>
			  <div class="form-group">
				<label for="gender">Gender</label>
				<select class="form-control" id="gender" name="gender">
                <option value="Male" <?php if ($row["gender"] == 'Male') { ?>selected<?php } ?>>Male</option>
				<option value="Female" <?php if ($row["gender"] == 'Female') { ?>selected<?php } ?>>Female</option>
				</select>
			  </div>
			   <div class="form-group">
				<label for="civilStatus">Civil Status</label>
				<select class="form-control" id="civilstatus" name="civilstatus">
                <option value="Single" <?php if ($row["civilstatus"] == 'Single') { ?>selected<?php } ?>>Single</option>
				<option value="Married" <?php if ($row["civilstatus"] == 'Married') { ?>selected<?php } ?>>Married</option>
				<option value="Widow" <?php if ($row["civilstatus"] == 'Widow') { ?>selected<?php } ?>>Widow</option>
				</select>
			  </div>
			   <div class="form-group">
				<label for="child">Child</label>
				<select class="form-control" id="child" name="child">
                <option value="without" <?php if ($row["child"] == 'without') { ?>selected<?php } ?> >without</option>
				<option value="with" <?php if ($row["child"] == 'with') { ?>selected<?php } ?> >with</option>
				</select>
			  </div>
	      </div>
		  
		  
         <div class="jcol-md-4 jwell">
             <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $row['dob']; ?>">
             </div>
			  
			  <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $row['age']; ?>" readonly>
              </div>
        	   <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="contactno">Contact Number</label>
                <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']; ?>">
            </div>
              <div class="form-group">
                <label for="alternatecontact">Alternate Contact</label>
                <input type="text" class="form-control" id="alternatecontact" name="alternatecontact" placeholder="alternatecontact" value="<?php echo $row['alternatecontact']; ?>">
              </div>
		 </div>
		 
         <div class="jcol-md-4 jwell">
			<div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" id="country" size='50' value="<?php echo $row['country']; ?>">
            </div>
			<div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" id="region" placeholder="region" value="<?php echo $row['region']; ?>">
            </div>
			<div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="city" value="<?php echo $row['city']; ?>">
            </div>
			
			<div class="form-group">
			  <label for="address">Address</label>
              <textarea id="address" name="address" class="form-control" rows="3" placeholder="Address"><?php echo $row['address']; ?></textarea>
            </div>
		 
		   <div class="form-group">
                <!--<label for="stream">Stream</label>
                <input type="text" class="form-control" id="stream" name="stream" placeholder="stream" value="<?php echo $row['stream']; ?>">-->
           </div>
         </div>
		  
		
		               
              
            <?php
                }
              }
            ?>  

		<h2 class="text-center">Educationl Background</h2>
 <!-- for educational background -->
		  <div class="jcol-md-5 jwell">
            <div class="form-group">
				<table id="tbleducationbackground">
					<!-- <thead>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></th>
					<td></th>
					<td></td>
					<td></td>
					</tr>
					</thead> -->
					<!-- <tbody> -->
					
					<?php $sql = "SELECT * FROM usereducbackground WHERE id_user='$_SESSION[id_user]'";
					$result = $conn->query($sql);
					//If user exists then show his details.
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
					?>		
					<tr>
					<td width="35%"><label for="School">School</label><input type="text" class="form-control" value="<?php echo $row['school']?>"></td>
					<td width="30%"><label for="Location">Location</label><input type="text" class="form-control" value="<?php echo $row['location']?>"></td>
					<td width="30%"><label for="Certification">Certification</label><input type="text" class="form-control" value="<?php echo $row['certification']?>"></td>
					<td width="20%"><label for="Degree">Degree</label><input type="text" class="form-control" value="<?php echo $row['degree']?>"></td>
					<td width="15%"><label for="Year">Year Graduated</label><input type="date" class="form-control" value="<?php echo $row['year']?>"></td>
					<td width="40%"><label for="Detail">Detail</label><textarea class="form-control" rows="1" ><?php echo $row['additionalinformation']?></textarea></td>
					<td width="15%"><button class="jadddeleterow"><img src="../img/rowdelete.png" width="20" height="20"> </button> </td>
					</tr>
					<?php
						}
					}else{ ?>
					<tr>
					<td width="35%"><label for="School">School</label><input type="text" class="form-control"></td>
					<td width="30%"><label for="Location">Location</label><input type="text" class="form-control"></td>
					<td width="30%"><label for="Certification">Certification</label><input type="text" class="form-control"></td>
					<td width="20%"><label for="Degree">Degree</label><input type="text" class="form-control"></td>
					<td width="15%"><label for="Year">Year Graduated</label><input type="date" class="form-control"></td>
					<td width="40%"><label for="Detail">Detail</label><textarea class="form-control" rows="1" ></textarea></td>
					<td width="15%"><button class="jadddeleterow"><img src="../img/rowdelete.png" width="20" height="20"> </button> </td>
					</tr>	
						
					<?php	
					}	
					?>
					<!-- </tbody> -->
				</table>	

				<button class="my-button" id="btnrowaddeducbackground" >Add Educational Background<img src="../img/rowadd.png" width="20" height="20"></button>
            </div>
          </div>
		 
		  
		  <!-- for educational background -->

			<h2 class="text-center">Work Experience</h2>
		  <!-- for work experience -->
		  <div class="jcol-md-5 jwell">
            <div class="form-group">
				<table id="tblworkExperienced">
					<!-- <thead>
					<tr>
					<th>Skills</th>
					<th>Company</th>
					<th>Position</th>
					<th>Job Description</th>
					<th>Reference</th>
					<th>Years</th>
					<th></th>
					</tr>
					</thead>
					<tbody> -->
					<?php $sql = "SELECT * FROM workexperienced WHERE id_user='$_SESSION[id_user]'";
					$result = $conn->query($sql);
					//If user exists then show his details.
					if($result->num_rows > 0) {
						$index = 0;
						while($row = $result->fetch_assoc()) {
							$index = $index +1;
					?>		
					<tr>

					<td width="25%"><label for="positiontitle">Position Title</label><input type="text" class="form-control" value="<?php echo $row['positiontitle']?>"></td>
					
						<?php
						echo "<td width='20%'><label for='corecompetencies'>Core Competencies</label>";
						echo "<select class='select-toggle' id='corecompetency' name='corecompetency' multiple idth='40'>";
								$sql="SELECT * FROM master_core_competencies";
								$resultcore=$conn->query($sql);
								if($resultcore->num_rows > 0) {
									while($rowcore = $resultcore->fetch_assoc()) {
										$napili = '';
										if($rowcore['core_competencies'] == $row['corecompetency']){$napili = 'selected';}
										echo "<option value='".$rowcore['core_competencies']."' ".$napili." >".$rowcore['core_competencies']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>
				
						<?php
						echo "<td width='20%'><label for='role'>Role</label>";
						echo "<select class='select-toggle' id=role' name='role' multiple width='20'>";
								$sql="SELECT * FROM master_roles";
								$resultrole=$conn->query($sql);
								if($resultrole->num_rows > 0) {
									while($rowrole = $resultrole->fetch_assoc()) {
										$napili = '';
										if($rowrole['roles'] == $row['role']){$napili = 'selected';}
										echo "<option value='".$rowrole['roles']."' ".$napili." >".$rowrole['roles']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>
					
						<?php
						echo "<td width='16%'><label for='Benefit'>Benefits</label>";
						echo "<select class='select-toggle' id='test' name='test' multiple width='20'>";
								$sql="SELECT * FROM benefits";
								$resultbenefit=$conn->query($sql);
								if($resultbenefit->num_rows > 0) {
									while($rowbenefit = $resultbenefit->fetch_assoc()) {
										$napili = '';
										if($rowbenefit['benefitname'] == $row['otherbenefit']){$napili = 'selected';}
										echo "<option value='".$rowbenefit['benefitname']."' ".$napili." >".$rowbenefit['benefitname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>		

						<!--EDIT Create master_skills Table-To Follow n un Skills List ie Financial Statement Preparation and Analysis-->
						<?php
						echo "<td width='10%'><label for='skills'>Skills</label>";
						echo "<select class='select-toggle' id='test' name='test' multiple width='20'>";
								$sql="SELECT * FROM benefits";
								$resultbenefit=$conn->query($sql);
								if($resultbenefit->num_rows > 0) {
									while($rowbenefit = $resultbenefit->fetch_assoc()) {
										$napili = '';
										if($rowbenefit['benefitname'] == $row['otherbenefit']){$napili = 'selected';}
										echo "<option value='".$rowbenefit['benefitname']."' ".$napili." >".$rowbenefit['benefitname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>		
						<!--EDIT Create master_skills Table-To Follow n un Skills List ie Financial Statement Preparation and Analysis-->


						<td width="25%"><label for="company">Company</label><input type="text" class="form-control" value="<?php echo $row['company']?>"></td>

						<?php
						echo "<td width='25%'><label for='positionlevel'>Position Level</label>";
						echo "<select class='form-control' id='positionlevel' name='positionlevel' width='15'>";
								$sql="SELECT positionlevelname FROM position_level";
								$resultpos=$conn->query($sql);
								if($resultpos->num_rows > 0) {
									while($rowpos = $resultpos->fetch_assoc()) {
										$napili = '';
										if($rowpos['positionlevelname'] == $row['positionlevel']){$napili = 'selected';}
										echo "<option value='".$rowpos['positionlevelname']."' ".$napili." >".$rowpos['positionlevelname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
					?>		

						<td width="20%"><label for="workduration">Work Duration</label><input type="text" class="form-control" value="<?php echo $row['workduration']?>"></td>		
						
						<?php
						echo "<td width='25%'><label for='experiencelevel'>Experience Level</label>";
						echo "<select class='form-control' id='experiencelevel' name='experiencelevel' width='40'>";
								$sql="SELECT * FROM experience_level";
								$resultxlevel=$conn->query($sql);
								if($resultxlevel->num_rows > 0) {
									while($rowxlevel = $resultxlevel->fetch_assoc()) {
										$napili = '';
										if($rowxlevel['experiencelevelname'] == $row['experiencelevel']){$napili = 'selected';}
										echo "<option value='".$rowxlevel['experiencelevelname']."' ".$napili." >".$rowxlevel['experiencelevelname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>
						
					<!--EDIT Get Industry PullDown Details from master_job_industry Table-->	
					<td width="20%"><label for="industry">Industry</label><input type="text" class="form-control" value="<?php echo $row['industry']?>"></td>
					<!--EDIT Get Industry PullDown Details from master_job_industry Table-->				
													


					<!--EDIT Add compaddress Filed sa Table-->			
					<td width="25%"><label for="wordaddress">Company Address</label><input type="text" class="form-control"></td>
					<!--EDIT Add compaddress Filed sa Table-->
					
					<?php
						echo "<td width='25%'><label for='country'>Country</label><input type='text' id='wcountry".$index."' class='form-control' value='".$row['country']."'></td>";
						echo "<td width='25%'><label for='region'>Region</label><input type='text' id='wregion".$index."' class='form-control' value='".$row['region']."'></td>";
					?>
					
					
					<!-- EDIT Paki palitan un none n lumalabas pag not selected-->
					<?php
						echo "<td width='10%'><label for='currency'>Salary Currency</label>";
						echo "<select class='form-control' id='currency' name='currency' width='15'>";
								$sql="SELECT isocode FROM currency where isocode <> ''";
								$resultcurrency=$conn->query($sql);
								if($resultcurrency->num_rows > 0) {
									while($rowcurrency = $resultcurrency->fetch_assoc()) {
										$napili = '';
										if($rowcurrency['isocode'] == $row['currency']){$napili = 'selected';}
										echo "<option value='".$rowcurrency['isocode']."' ".$napili." >".$rowcurrency['isocode']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
					?>
					<!-- EDIT Paki palitan un none n lumalabas pag not selected-->

					<td width="15%"><label for="amount"> Amount </label><input type="number" class="form-control" value="<?php echo $row['amount']?>"></td>
					<!-- <td width="20%"><label for="otherbenefit">Other Benefit</label><input type="text" class="form-control" value=" --> <? //php echo $row['otherbenefit']?> <!-- "></td> -->
						
					<td width="20%"><label for="reference">Reference</label><input type="text" class="form-control" value="<?php echo $row['reference']?>"></td>
					<td width="25%"><label for="contact">Reference Contact</label><input type="text" class="form-control" value="<?php echo $row['contact']?>"></td>
					<td width="35%"><label for="jobdescription">Job Description</label><textarea class="form-control" rows="1" ><?php echo $row['jobdescription']?></textarea></td>
					<td width="15%"><button class="jadddeleterow"><img src="../img/rowdelete.png" width="20" height="20"> </button> </td>
					</tr>
					<?php
						}
					}else{ ?>
					<tr>
						<td width="25%"><label for="positiontitle">Position Title</label><input type="text" class="form-control"></td>

						<?php
						echo "<td width='20%'><label for='experiencelevel'>Experience Level</label>";
						echo "<select class='form-control' id='experiencelevel' name='experiencelevel' width='40'>";
								$sql="SELECT * FROM experience_level";
								$resultxlevel=$conn->query($sql);
								if($resultxlevel->num_rows > 0) {
									while($rowxlevel = $resultxlevel->fetch_assoc()) {
										echo "<option value='".$rowxlevel['experiencelevelname']."' >".$rowxlevel['experiencelevelname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>
					
					
						<?php
						echo "<td width='25%'><label for='corecompetencies'>Core Competenciessss</label>";
						echo "<select class='form-control' id='corecompetency' name='corecompetency' width='40'>";
								$sql="SELECT * FROM master_core_competencies";
								$resultcore=$conn->query($sql);
								if($resultcore->num_rows > 0) {
									while($rowcore = $resultcore->fetch_assoc()) {
										echo "<option value='".$rowcore['core_competencies']."' >".$rowcore['core_competencies']."</option>";
									}
								}
							
						echo "</select>";
						echo "</td>";
						?>
					
					<?php
						echo "<td width='25%'><label for='roles'>Role</label>";
						echo "<select class='form-control' id='role' name='role' width='40'>";
								$sql="SELECT * FROM master_roles";
								$resultrole=$conn->query($sql);
								if($resultrole->num_rows > 0) {
									while($rowrole = $resultrole->fetch_assoc()) {
										echo "<option value='".$rowrole['roles']."' >".$rowrole['roles']."</option>";
									}
								}
						
						echo "</select>";
						echo "</td>";
						?>

<?php
						echo "<td width='10%'><label for='Benefit'>Benefit</label>";
						echo "<select class='select-toggle' id='test' name='test' multiple width='20'>";
								$sql="SELECT * FROM benefits";
								$resultbenefit=$conn->query($sql);
								if($resultbenefit->num_rows > 0) {
									while($rowbenefit = $resultbenefit->fetch_assoc()) {
										echo "<option value='".$rowbenefit['benefitname']."' >".$rowbenefit['benefitname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>		
					
						<!--EDIT Create master_skills Table-To Follow n un Skills List ie Financial Statement Preparation and Analysis-->
						<?php
						echo "<td width='10%'><label for='skills'>Skills</label>";
						echo "<select class='select-toggle' id='test' name='test' multiple width='20'>";
								$sql="SELECT * FROM benefits";
								$resultbenefit=$conn->query($sql);
								if($resultbenefit->num_rows > 0) {
									while($rowbenefit = $resultbenefit->fetch_assoc()) {
										echo "<option value='".$rowbenefit['benefitname']."' ".$napili." >".$rowbenefit['benefitname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>		
						<!--EDIT Create master_skills Table-To Follow n un Skills List ie Financial Statement Preparation and Analysis-->

						<td width="25%"><label for="company">Company</label><input type="text" class="form-control" value="<?php echo $row['company']?>"></td>

					<?php
						echo "<td width='25%'><label for='positionlevel'>Position Level</label>";
						echo "<select class='form-control' id='positionlevel' name='positionlevel' width='15'>";
								$sql="SELECT positionlevelname FROM position_level";
								$resultpos=$conn->query($sql);
								if($resultpos->num_rows > 0) {
									while($rowpos = $resultpos->fetch_assoc()) {
										echo "<option value='".$rowpos['positionlevelname']."'>".$rowpos['positionlevelname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
					?>			

						<td width="25%"><label for="workduration">Work Duration</label><input type="text" class="form-control" value="<?php echo $row['workduration']?>"></td>		

					<?php
						echo "<td width='25%'><label for='experiencelevel'>Experience Level</label>";
						echo "<select class='form-control' id='experiencelevel' name='experiencelevel' width='40'>";
								$sql="SELECT * FROM experience_level";
								$resultxlevel=$conn->query($sql);
								if($resultxlevel->num_rows > 0) {
									while($rowxlevel = $resultxlevel->fetch_assoc()) {
										echo "<option value='".$rowxlevel['experiencelevelname']."' >".$rowxlevel['experiencelevelname']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
						?>			

					<!--EDIT Get Industry PullDown Details from master_job_industry Table-->	
					<td width="20%"><label for="industry">Industry</label><input type="text" class="form-control" value="<?php echo $row['industry']?>"></td>
					<!--EDIT Get Industry PullDown Details from master_job_industry Table-->				
													


					<!--EDIT Add compaddress Filed sa Table-->			
					<td width="25%"><label for="wordaddress">Company Address</label><input type="text" class="form-control"></td>
					<!--EDIT Add compaddress Filed sa Table-->
					
					
					<?php
						echo "<td width='25%'><label for='country'>Country</label><input type='text' id='wcountry".$index."' class='form-control' value='".$row['country']."'></td>";
						echo "<td width='25%'><label for='region'>Region</label><input type='text' id='wregion".$index."' class='form-control' value='".$row['region']."'></td>";
					?>
					
					
					
					
					<?php
						echo "<td width='10%'><label for='currency'>Salary Currency</label>";
						echo "<select class='form-control' id='currency' name='currency' width='15'>";
								$sql="SELECT isocode FROM currency where isocode <> ''";
								$resultcurrency=$conn->query($sql);
								if($resultcurrency->num_rows > 0) {
									while($rowcurrency = $resultcurrency->fetch_assoc()) {
										echo "<option value='".$rowcurrency['isocode']."'>".$rowcurrency['isocode']."</option>";
									}
								}
						echo "</select>";
						echo "</td>";
					?>
					<td width="15%"><label for="amount"> Amount </label><input type="number"  min="0" value="0" step="0.01" class="form-control" value="<?php echo $row['amount']?>"></td>
					<!--<td width="20%"><label for="otherbenefit">Other Benefit</label><input type="text" class="form-control"></td>-->
					<td width="20%"><label for="reference">Reference</label><input type="text" class="form-control"></td>
					<td width="25%"><label for="contact">Reference Contact</label><input type="text" class="form-control"></td>
					<td width="35%"><label for="jobdescription">Job Description</label><textarea class="form-control" rows="1" ></textarea></td>
					<td width="15%"><button class="jadddeleterow"><img src="../img/rowdelete.png" width="20" height="20"> </button> </td>					
					</tr>
						
					<?php	
					}	
					?>
					
					<!-- </tbody> -->
 				</table>	

				<button class="my-button" id="btnrowaddworkx" >Add Work Experience<img src="../img/rowadd.png" width="20" height="20"></button>
            </div>
          </div>
		
		
		<!--Script for Multi-Select List Box-->
		<script>			
			  	$('.select-toggle').each(function(){    
    		  		var select = $(this), values = {};    
    			$('option',select).each(function(i, option){
        			values[option.value] = option.selected;        
    			}).click(function(event){        
        			values[this.value] = !values[this.value];
        		$('option',select).each(function(i, option){            
            		option.selected = values[option.value];        
        		});    
    			});
			});
		</script>
		<!--Script for Multi-Select List Box-->


		  <!-- for work experience -->

			<h2 class="text-center">Training</h2>
<!-- for seminar attended -->
		  <div class="jcol-md-5 jwell">
            <div class="form-group">
				<table id="tbltrainingattended">
					<thead>
					<tr>
					<th>Title</th>
					<th>Duration</th>
					<th>Conducted by</th>
					<th>Date</th>
					<th></th>
					</tr>
					</thead>
					<tbody>
					<?php $sql = "SELECT * FROM trainingattended WHERE id_user='$_SESSION[id_user]'";
					$result = $conn->query($sql);
					//If user exists then show his details.
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
					?>		
					<tr>
					<td width="20%"><input type="text" class="form-control" value="<?php echo $row['title']?>"></td>
					<td width="15%"><input type="text" class="form-control" value="<?php echo $row['duration']?>"></td>
					<td width="20%"><input type="text" class="form-control" value="<?php echo $row['conductedby']?>"></td>
					<td width="15%"><input type="text" class="form-control" value="<?php echo $row['date']?>"></td>
					<td width="15%"><button class="jadddeleterow"><img src="../img/rowdelete.png" width="20" height="20"> </button> </td>
					</tr>
					<?php
						}
					}else{ ?>
					<tr>
					<td width="20%"><input type="text" class="form-control"></td>
					<td width="15%"><input type="text" class="form-control"></td>
					<td width="20%"><input type="text" class="form-control"></td>
					<td width="15%"><input type="text" class="form-control"></td>
					<td width="15%"><button class="jadddeleterow"><img src="../img/rowdelete.png" width="20" height="20"> </button> </td>
					</tr>
					<?php	
					}	
					?>
					
					</tbody>
				</table>	

				<button class="my-button" id="btnrowaddtrainingattended" >Add Seminar Attended<img src="../img/rowadd.png" width="20" height="20"></button>
            </div>
          </div>

<!-- for seminar attended -->


	   <div class="text-center">
                <button type="submit" onclick="return false" class="my-button"  id="btn_Update">Update</button>
				
           </div>

			
         <!-- </form> -->
          </div>
        </div>
      </div>
    </section>

 
<section>

<div id="footer">
	
 <!-- Site footer -->
 <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About Our Job Portal</h6>
            <p class="text-justify">Countworx Inc. provide ease to use as well as completely flexible, high class quality and rich features job portal. Also, we have developed a number of job portal on the basis of custom needs of our clients. Check our affordable job portal package and take a first step to be a successful business.</p>
          </div>

          
          <div class="col-xs-6 col-md-3">
            <h6>Our Company</h6>
            <ul class="footer-links">
              <li><a href="about_us.php">About Us</a></li>
              <li><a href="contact_us.php">Contact Us</a></li>
              <li><a href="terms_of_service.php">Terms of Service</a></li>
              <li><a href="our_privacy_policy.php">Privacy Policy</a></li>
              <li><a href="site_map.php">Sitemap</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Logo</h6>
            <ul class="footer-links">
            </ul>
          </div>


        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
         <a href="#">COUNTWORX INC.</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

    <script type="text/javascript">
      $(function() {
        var maxHeight = 0;

        $(".fixHeight").each(function() {
          maxHeight = ($(this).height() > maxHeight ? $(this).height() : maxHeight);
        });

        $(".fixHeight").height(maxHeight);
      });
    </script>

<a id="back2Top" title="Back to top" href="#">&#10148;</a>

<!-- jQuery -->
<!-- <script src="../js/jquery.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<!-- <script src="../js/bootstrap.min.js"></script> -->

<!-- Scrolling Nav JavaScript -->
<!-- <script src="../js/jquery.easing.min.js"></script> -->
<script src="../js/sticky-menu.js"></script>
<script src="../js/incremental_counter.js"></script>

  </body>
</html>