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

    
    <!-- Use for Bootstrap Drop Down-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
       
        
  </style>
    <!-- Use for Bootstrap Drop Down -->
    <!-- Use for Search Function -->
    <script src="../js/jquery3.5.1.js"></script>
    <script src="../js/jqueryui/jquery.ui.js"></script>
    <!-- END Use for Search Function -->

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
          
         // if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
              ?>
              <!--<li><a href="applied-jobs.php">Jobs Applied</a></li>
              <li><a href="profile.php">Profile</a></li>
              <li><a href="../logout.php">Logout</a></li>-->

              <!-- Drop Down Menu-->

                                         
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
              <?php// }  else { 
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

    <!-- Applied Jobs -->
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


          
         //Sql Query for showing all applied job posts. 
                //
                //So basically - Select all *job post id* from *apply_job_post table* that match with *job_post table* where user matches currect logged in user in *apply_job post table*.
                $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
                $result = $conn->query($sql);

                //If user applied to job then display that post information.
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {         
                          
               ?>
          <div class="attachment-block clearfix">
              <img class="attachment-img" src="../logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href=""><?php echo $row['jobtitle']; ?></a> - Php <?php echo number_format( $row['maximumsalary'],2); ?>/Month</h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row['jobstatus']; ?> | <?php echo $row['work_arrangement']; ?> | <?php echo $row['job_industry']; ?> Company |  <?php echo $row['experience']; ?> Year(s) Working Experience Required</strong></div>
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
              
              
              </div>
            </div>
          <?php
              }
            }
            
          
          ?>

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


  </body>
</html>