<?php
  //Session Variables
  session_start();
  //ConnString
  require_once("../initialize.php");
  include("../function.php");
  Is_Company_Logged_In();  
  
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
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
            margin-left: -145px !important;
        }
       
        
  </style>
    <!-- Use for Bootstrap Drop Down -->

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
          
          //if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
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
            //  } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
              ?>
            <!--  <li><a href="company/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>  -->
              <?php //}  else { 
            ?>
              
            <!--  <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>  -->
              
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
              <h1>Create Job Post</h1>
              
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            

    <!-- Job Post Form -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-4 latest-job margin-bottom-20">
            <h2 class="text-center"></h2>
            
            <form method="post" action="update_add_job_post.php">

          <?php
                  $sql="SELECT * FROM job_post WHERE id_company='$_SESSION[id_user]'";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                    
                      $id_jobpost = $row['id_jobpost'];
                      $comp_id=$row['id_company'];
                      $job_title = $row['jobtitle'];
                      $description = $row['description'];
                      $job_status = $row['jobstatus'];
                      $salary = $row['minimumsalary'];
                      $experience = $row['experience'];
                      $qualification = $row['qualification'];
                      $industry = $row['job_industry'];
                      $work_arrangement = $row['work_arrangement'];
                      $job_location = $row['job_location'];
                      $position_type = $row['position_type'];
                      $logo=$row['comp_logo'];
                      // edit job_post table, add experience and certifications_accreditations
                      //$logo=$row['comp_logo'];

                    }
                    
                    $sql="SELECT * FROM compcertificationaccreditation WHERE id_company='$_SESSION[id_user]'";
                    $result=$conn->query($sql);

                    if($result->num_rows >= 0) {
                      $row = $result->fetch_assoc();
                      $certs_accredits=$row['certifications_accreditations'];
                    
                    }

                    $sql="SELECT * FROM compskills WHERE id_company='$_SESSION[id_user]'";
                    $result=$conn->query($sql);

                    if($result->num_rows >= 0) {
                      $row = $result->fetch_assoc();
                      $comp_skills=$row['skills'];
                    
                    }
                    
                    $sql="SELECT * FROM compcorecompetencies WHERE id_company='$_SESSION[id_user]'";
                    $result=$conn->query($sql);

                    if($result->num_rows >= 0) {
                      $row = $result->fetch_assoc();
                      $comp_corecompetencies=$row['core_competencies'];
                    
                    }




           ?>
              
                <br>

                <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" name="jobtitle" id="jobtitle" placeholder="Position Title" value="" required="true" autofocus >
                <label for="jobtitle">Position Title</label>
                </div>

                
			          <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" name="job_location" id="job_location" placeholder="Work Location" value="">
                <label for="address">Work Location</label>
                </div>

                <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="job_setup" id="job_setup" name="job_setup" placeholder="Work Setup">
                <option selected="" value="">Select Work Setup...</option>
                <?php
                     $sql="SELECT * FROM master_job_setup";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['job_setup']."' data-id='".$row['id']."'>".$row['job_setup']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="Select Job Industry" value="<?php //echo @$job_industry;?>"><?php //echo @$job_industry;?></option>-->
                </select>
                <label for="job_setup">Work Setup</label>
                </div>

                <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="experience" id="experience" name="experience" placeholder="Experience">
                <option selected="" value="">Select Years of Experience Required...</option>
				          <option value="1-2">1-2</option>
				          <option value="3-5">3-5 </option>
				          <option value="6-10">6-10</option>
				          <option value="11-15">11-15</option>
				          <option value="More than 16">More than 16</option>
                 <select>
                <label for="experience">Experience Required</label>
                </div>

                      

			          <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="job_industry" id="job_industry" name="job_industry" placeholder="Industry">
                <option selected="" value="">Select Industry...</option>
                <?php
                     $sql="SELECT * FROM master_job_industry ORDER BY job_industry";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['job_industry']."' data-id='".$row['id']."'>".$row['job_industry']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="Select Job Industry" value="<?php //echo @$job_industry;?>"><?php //echo @$job_industry;?></option>-->
                </select>
                <label for="job_industry">Industry</label>
                </div>


                <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="positiontype" id="positiontype" name="positiontype" placeholder="Position Type">
                <option selected="" value="">Select Position Type...</option>
                <?php
                     $sql="SELECT * FROM master_position_type ORDER BY position_type";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['position_type']."' data-id='".$row['id']."'>".$row['position_type']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="<?php //echo @$position_type; ?>" value="<?php //echo @$position_type;?>"><?php //echo @$position_type;?></option>-->
                </select>
                <label for="position_type">Position Type</label>
                </div>

                <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="job_status" id="job_status" name="job_status" placeholder="Job Status">
                <option selected="" value="">Select Job Status...</option>
                <?php
                     $sql="SELECT * FROM master_job_status";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['job_status']."' data-id='".$row['id']."'>".$row['job_status']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="<?php //echo @$job_status; ?>" value="<?php //echo @$job_status;?>"><?php //echo @$job_status;?></option>-->
                </select>
                <label for="job_status">Job Status</label>
                </div>

                
                <div class="form-label-group in-border">
                <select class="form-control shadow-none" width="40" name="salary" id="salary" name="salary" placeholder="Salary" >
                  <option selected="" value="">Select Salary Range...</option>
					        <option value="Less than 30,000">Less than 30,000</option>
					        <option value="30,001 - 50,000">30,001 - 50,000</option>
					        <option value="50,001 - 80,000">50,001 - 80,000</option>
					        <option value="80,001 - 100,000">80,001 - 100,000</option>
					        <option value="More than 100,000">More than 100,000</option>
                </select>
                <label for="salary">Salary Range</label>
                </div>
                <br>          

                <div class="form-label-group in-border">
                <select class="select-toggle form-control shadow-none" width="40" name="certification[]" id="certification" name="certification" placeholder="certification" multiple>
                <?php
                     $sql="SELECT * FROM masster_certifications_accreditations";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['certifications_accreditations']."' data-id='".$row['id']."'>".$row['certifications_accreditations']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="<?php //echo @$job_status; ?>" value="<?php //echo @$job_status;?>"><?php //echo @$job_status;?></option>-->
                </select>
                <label for="certifications">Certifications/ Accreditations</label>
                </div>
                <br>          


                <div class="form-label-group in-border">
                <select class="select-toggle form-control shadow-none" width="40" name="skills[]" id="skills" name="skills" placeholder="Skills" multiple>
                
                <?php
                     $sql="SELECT * FROM master_skills";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['skillsname']."' data-id='".$row['id']."'>".$row['skillsname']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="<?php //echo @$companytype; ?>" value="<?php //echo @$companytype;?>"><?php //echo @$companytype;?></option>-->
                
                </select>
                <label for="skills">Skills Requirement</label>
                </div>
                <br>     

                <div class="form-label-group in-border">
                <select class="select-toggle form-control shadow-none" width="40" name="core_competencies[]" id="core_competencies" name="core_competencies" placeholder="Core Competencies" multiple>
                <?php
                     $sql="SELECT * FROM master_core_competencies";
                     $result=$conn->query($sql);
   
                     if($result->num_rows > 0) {
                       while($row = $result->fetch_assoc()) {
                         echo "<option value='".$row['core_competencies']."' data-id='".$row['id']."'>".$row['core_competencies']."</option>";
                       }
                     }  
                ?>  
                <!--<option selected="<?php //echo @$core_competencies; ?>" value="<?php //echo @$core_competencies;?>"><?php //echo @$core_competencies;?></option>-->

                </select>
                <label for="core_competencies">Core Competencies</label>
                </div>


                
          </div>
    
                <br><br>
              <div class="col-md-8 corporate-profile margin-bottom-20">
			          
                <div class="form-label-group in-border">
			          <textarea id="job_decription" name="job_decription" class="form-control shadow-none" rows="18" placeholder="job_decription" ><?php //echo @$profile;?></textarea>
                <label for="job_decription">Job Description</label>
                </div>
                <br>

                <div class="form-label-group in-border">
			          <textarea id="qualification" name="qualification" class="form-control shadow-none" rows="15" placeholder="qualification" ><?php //echo @$profile;?></textarea>
                <label for="qualification">Qualifications</label>
                </div>     
              
                

              </div>      
                  

          
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

    </section>

                  
            <div class="text-center">
            <button type="submit" class="btn btn-primary">Create Job Post</button>
				
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