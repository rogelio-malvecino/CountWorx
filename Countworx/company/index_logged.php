<?php
  //Session Variables
  session_start();
  //ConnString
  require_once("../initialize.php");
  include("../function.php");
  Is_Company_Logged_In(); 
  
  //Check if company is approved
  $sql = "SELECT * FROM company WHERE active='2' AND id_company='$_SESSION[id_user]'";
  $result=$conn->query($sql);

  if($result->num_rows > 0) {
	header("Location: login_notice.php");
		exit();
	} 
  //Check if company is approved
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Financial Professionals Job Portal-HRWORX</title>
    
    <!-- Front End Visuals -->	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <link rel="stylesheet" href="../css/mycss.css">
    <link href="../css/sticky-menu.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/floating-labels.css" rel="stylesheet"/>
    <!-- Front End Visuals -->	

   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Use for Bootstrap Drop Down-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <<style> 
        .dropdown { 
            position: static !important;
        } 
          
        .dropdown-menu { 
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)!important; 
            margin-top: -30px !important; 
            width: 20% !important; 
            margin-left: 0x !important;
        }
       
        
  </style>
    <!-- Use for Bootstrap Drop Down -->

 <script>

      $(document).ready(function(){
		    $(".preview img").show();
			
			
			
			
		    
     //UPDATE Feb 5 2021 by Jhun 
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
	});	
			
			
			
		
		$("#btn_Update").click(function(){
			var address = $("#address").val();
			var contactno = $("#contactno").val();
			var companytype = $("#companytype option:selected").val();
			var compprofile = $("#compprofile").val();
			var website = $("#website").val();
			var profileimg = $('#profileimg').attr('src');
			
			$.ajax({
				type:"POST",
				async:false,
				url:"update_company_profile.php",
				data: {address:address,contactno:contactno,companytype:companytype,compprofile:compprofile,website:website,profileimg:profileimg}, 
				success: function(result){
					//$("#ajax_search_result").html(result);
					alert(result);
				},
				error: function(result){
					alert("error" + result);
				}
			});	
		});
	//UPDATE Feb 5 2021 by Jhun 
 }); 

  </script>

<!--Menu transparency and color change-->
<style>
  .affix {
      top: 0px;
      width: 100%;
      -webkit-transition: all .5s ease-in-out;
      transition: all .55s ease-in-out;
      background-color: #000000;
      border-color: #000000;
      opacity: 0.95; 
      filter:(opacity=50);
    

  }
  .affix a {
      color: #428bca !important;
      
      -webkit-transition: all .5s ease-in-out;
      transition: all .5s ease-in-out;
  }
  .affix-top a {
      
  }
  .affix + .container-fluid {
   
  }
  </style>
<!--Menu transparency and color change-->



  </head>
  <body>
  
    
  <header>
  <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197">
        <div class="container-fluid">
          
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index_logged.php">HRWORX</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
          
          if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
              ?>
              <!--<li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="create-job-post.php">Create Job Post</a></li>
              <li><a href="view-job-post.php">View Job Post</a></li>
              <li><a href="../logout.php">Logout</a></li>-->

              <!-- Drop Down Menu-->

                           
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['name']; ?> <span class="glyphicon glyphicon-user pull-right"></span>
                <span class="caret"></span></button>
                <ul class="dropdown-menu" data-spy="affix" data-offset-top="197" style="top: 91px;">
                    <li><a href="index_logged.php" class="blue-text">Home <span class="glyphicon glyphicon-home pull-right "></span></a></li>
                    <li class="divider" ></li>
                    
                    <li><a href="create-job-post.php" class="blue-text">Create Job Post <span class="glyphicon glyphicon-briefcase pull-right"></span></a></li>
                    <li><a href="view-job-post.php" class="blue-text">View Job Post <span class="glyphicon glyphicon-folder-open pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="change-password.php" class="blue-text">Change Password <span class="glyphicon glyphicon-lock pull-right "></span></a></li>
                    <li><a href="../logout.php" class="blue-text">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                </ul>
              
              </div>  
              
              <!-- Drop Down Menu-->
 


            <?php
              } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
              ?>
              <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>
              <?php }  else { 
            ?>
              
              <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>
              
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <section>
  <div class="content-wrapper" style="margin-left: 0px;" >

      <section class="content-header bg-main-sub">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head">
              <h1>Company Profile</h1>
              
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            

    <!-- Company Profile -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 latest-job margin-bottom-20">
            <h2 class="text-center"></h2>
            
           <!--  <form method="post" action="update_company_profile.php"> -->

          <?php
                  $sql="SELECT * FROM company WHERE id_company='$_SESSION[id_user]'";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                    
                      $logo=$row['comp_logo'];
                      $site=$row['website'];
                      $profile=$row['compprofile'];
                      $companytype=$row['companytype'];
                      
                    }
                    
           ?>
              
                <!--Inseet Profile Pic Script-->

                <div align='center' class="row" id="profilepiccontainer" >
					<div class='preview'>
						<img src="<?php echo $logo; ?>" id="profileimg" width="250" height="120" >
					</div>
					<div>
						<input type="file" id="file" name="file" style="display: none">
					</div>
				</div>



                <!--Inseet Profile Pic Script-->        
                  
                
                <br></br>

                <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" name="companyname" id="companyname" placeholder="Company Name" value="<?php echo $_SESSION['name']; ?>" readonly>
                <label for="companyname">Company Name</label>
                </div>

			          <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" name="address" id="address" placeholder="Address" value="<?php echo $row['headofficecity']; ?>">
                <label for="address">Address</label>
                </div>

                <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" name="contactno" id="contactno" placeholder="Contact No" value="<?php echo $row['contactno']; ?>">
                <label for="contactno">Contact Number</label>
                </div>
              


			          <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="companytype" id="companytype" name="companytype" placeholder="Company Type">
                <?php
                     $sql="SELECT * FROM master_job_industry ORDER BY job_industry";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['job_industry']."' data-id='".$row['id']."'>".$row['job_industry']."</option>";
                       }
                     }  
                ?>  
                <option selected="<?php echo @$companytype; ?>" value="<?php echo @$companytype;?>"><?php echo @$companytype;?></option>

                </select>
                <label for="companytype">Industry</label>
                </div>


                <div class="form-label-group in-border">
                <input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo @$site;?>">
                <label for="city">Website</label>
                </div>
                
                
                <div class="form-label-group in-border">
                <input type="text" class="form-control" name="companyemail" id="companyemail" placeholder="Company Email" value="<?php echo $_SESSION['email']; ?>" readonly>
                <label for="companyemail">Company Email</label>
                </div>    
                
                
          </div>
    
                <br><br>
              <div class="col-md-8 corporate-profile margin-bottom-20">
			          
                <div class="form-label-group in-border">
			          <textarea id="compprofile" name="compprofile" class="form-control" rows="19" placeholder="Profile" ><?php echo @$profile;?></textarea>
                <label for="compprofile">Profile</label>
                </div>
		     
              
                

              </div>      
                  

          
        </div>
      </div>
    </section>

                  
            <div class="text-center">
				<!-- UPDATE Feb 5 2021 by Jhun --> 
				<!-- <button type="submit" class="btn btn-primary">Update Profile</button> -->
				<button type="submit" onclick="return false" class="btn btn-primary"  id="btn_Update">Update Profile</button>
				<!-- UPDATE Feb 5 2021 by Jhun --> 
				
           </div>


           </form>                 
          <section id="about" class="content-header">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 text-center latest-job margin-bottom-20">
                  <h2></h2>                      
                </div>
               </div>
              </div>
          </section>

                   

  </div>
  

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Scrolling Nav JavaScript -->
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/sticky-menu.js"></script>
<script src="../js/incremental_counter.js"></script>

  </body>
</html>