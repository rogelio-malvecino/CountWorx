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

<style>
html {
  scroll-behavior: smooth;
}
</style>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Financial Professionals Job Portal-HRWORX</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="../js/jquery3.5.1.js"></script>
    <script src="../js/jqueryui/jquery.ui.js"></script>
    
    <!--MODAL-->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--MODAL-->

    <!-- Front End Visuals -->	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <link rel="stylesheet" href="../css/mycss.css">
    <link href="../css/sticky-menu.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Front End Visuals -->	

    <!--Misc-->
    <link href="../css/incremental_counter.css" rel="stylesheet">
    <link href="../js/jqueryui/jquery.ui.css" rel="stylesheet">
    <!--Misc-->
 

 

 <!-- Use for Bootstrap Drop Down -->   
 <<style> 
        .dropdown { 
            position: static !important;
        } 
          
        .dropdown-menu { 
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15)!important; 
            margin-top: -30px !important; 
            width: 20% !important; 
            margin-left: 0px !important;
            
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
          
          if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
              ?>

              <!--<li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="../logout.php">Logout</a></li>-->

              <!-- Drop Down Menu-->

        
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" ><?php echo $_SESSION['name']; ?> <span class="glyphicon glyphicon-user pull-right"></span>
                <span class="caret"></span></button>
                <ul class="dropdown-menu" data-spy="affix" data-offset-top="197" style="top: 91px;">
                    <li><a href="index_logged.php" class="blue-text">Home <span class="glyphicon glyphicon-home pull-right "></span></a></li>
                    <li class="divider" ></li>
                    
                    <li><a href="applied-jobs.php" class="blue-text">Jobs Applied <span class="glyphicon glyphicon-briefcase pull-right"></span></a></li>
                    <li><a href="profile.php" class="blue-text">Profile <span class="glyphicon glyphicon-file pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="change-password.php" class="blue-text">Change Password <span class="glyphicon glyphicon-lock pull-right "></span></a></li>
                    <li><a href="../logout.php" class="blue-text">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                </ul>
              
              </div>  
              
              <!-- Drop Down Menu-->

            <?php
              } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
              ?>
              <li><a href="company/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
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

      <section class="content-header bg-main-user">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head-sub">
              <h1>Your Job Applications</h1>
              
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            


    </div>
    </section>            

    <!--Smooth Scrool-->              
    <section class="content-header" id="job-post">              
    <!--Smooth Scrool-->
    
    
    <!-- LATEST JOB POSTS -->
    <section class="content-header" id="search_result">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h2 class="text-center"></h2>            
            <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */

           /*Limit number of characters for the echo output */
          function custom_echo($x, $length)
          {
            if(strlen($x)<=$length)
            {
              echo $x;
            }
            else
            {
              $y=substr($x,0,$length) . '. . .';
              echo $y;
            }
          }       


          
          //So basically - Select all *job post id* from *apply_job_post table* that match with *job_post table* where user matches currect logged in user in *apply_job post table*.
          $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
          $result = $conn->query($sql);

          //If user applied to job then display that post information.
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {         
                          
               ?>
          <div class="attachment-block clearfix div-fader"> <!--onmouseover="this.style.background='#E6E6E3';" onmouseout="this.style.background='white';">--> 
              <img class="attachment-img" src="../logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Attachment Image">
              <div class="attachment-pushed">
              <h4 class="attachment-heading" ><a style="text-decoration: none;" ><?php echo $row['jobtitle']; ?> </a> - Php <?php echo $row['minimumsalary']; ?>/Month</h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row['jobstatus']; ?> | <?php echo $row['work_arrangement']; ?> | <?php echo $row['job_industry']; ?> Company |  <?php echo $row['job_location']; ?>  | <?php echo $row['experience']; ?> Year(s) Working Experience</strong></div>
                     <?php //custom_echo($row['description'],500); 
					$coreCompetency = "";
					$sql = "SELECT mastcore.core_competencies FROM job_post_competency_detail as jpdtl left join master_core_competencies as mastcore on jpdtl.coreCompetency=mastcore.id where jpdtl.id_jobpost = ".$row['id_jobpost'];
					$coreresults = $mysqli->query($sql);
					//echo "meron b error :".$mysqli->error;
					if($coreresults->num_rows > 0) {
						while($corerow = $coreresults->fetch_assoc())
						{
							$coreCompetency .= "   * ".$corerow['core_competencies'];
						}
						echo "<strong> Core Competencies: </strong>".$coreCompetency;
					}
					
					?>            
                </div>
               
  
  <!-- MODAL -->
               
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" role="dialog" data-target="#myModal<?php echo $row['id_jobpost']; ?>">View Details</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $row['id_jobpost']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
    
      
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $row['jobtitle']; ?></h4>
        </div>
         <div class="modal-body" id="myModal<?php echo $row['id_jobpost']; ?>" >
          <p><img class="logo-img" src="../logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Company Logo"></p>
          <p><span class="a">Salary</span><span class="b">:</span><span class="c"><?php echo $row['minimumsalary']; ?> /Month</span></p>
          <p><span class="a">Job Status</span><span class="b">:</span><span class="c"><?php echo $row['jobstatus']; ?></span></p>
          <p><span class="a">Work Arrangement</span><span class="b">:</span><span class="c"><?php echo $row['work_arrangement']; ?></span></p>
          <p><span class="a">Industry</span><span class="b">:</span><span class="c"><?php echo $row['job_industry']; ?></span></p>
          <p><span class="a">Location</span><span class="b">:</span><span class="c"><?php echo $row['job_location']; ?></span></p>
          <p><span class="a">Work Experience</span><span class="b">:</span><span class="c"><?php echo $row['experience']; ?> Year(s)</span></p>
          <p><span class="a">Job Description</span><span class="b">:</span>
          
          <!--Bulleted List of Job Description----MUST include "." at the end of every paragraph-->  
          <?php 
          $str=$row['description'];
          $arr=explode('.',$str);
          echo "<ul><li>" . implode("</li><li>", array_filter($arr)) . "</li></ul>"
          ?>
          <!--Bulleted List of Job Description----MUST include "." at the end of every paragraph-->

          
          </div>
        
        
        <div class="modal-footer">
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary text-light"><a href="login.php">Submit Application To Employer</a>-->
            
            
                        
          </div>  
        
        </div>
      </div>
      
    
  
  <!-- MODAL -->


          
          </div>
        </div>
      </div>
      </div>
          <?php
              }
            }else{
            
            echo "<div class='alert alert-warning'>";
            echo "<strong><center>Info!</center></strong> ";
            echo "<center> No Job Applications Sent To Employers Yet. See Current Job Listing <a href='index_logged.php'> Here. </center";
            echo "</div>";
              
            }
            
           
          ?>
    </section>

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
<!--<script src="js/jquery.js"></script>-->

<!-- Bootstrap Core JavaScript -->
<!--<script src="js/bootstrap.min.js"></script>-->

<!-- Scrolling Nav JavaScript -->
<!--<script src="js/jquery.easing.min.js"></script>-->
<script src="../js/sticky-menu.js"></script>
<script src="../js/incremental_counter.js"></script>



  </body>
</html>

