<?php
  //Session Variables
  session_start();
  //ConnString
  require_once("initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Financial Professionals Job Portal-Countworx Inc.</title>
    
    <!-- Front End Visuals -->	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" href="css/mycss.css">
    <link href="css/sticky-menu.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Front End Visuals -->	

    <!--Extras-->
    <link href="css/incremental_counter.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!--Extras-->

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
            <a class="navbar-brand" href="index.php">COUNTWORX INC.</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
          
          if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
              ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
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

      <section class="content-header bg-main">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head">
              <h1>Financial Professionals Job Portal</h1>
              <form class="navbar-form navbar-center" role="search">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Type Job Title" size='40'>
                
                <div class="form-group">
                <select class="form-control" id="industry" name="industry" width="40">
                <option selected="" value="">Select Industry</option>
                <?php
                  $sql="SELECT * FROM master_job_industry";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['job_industry']."' data-id='".$row['id']."'>".$row['job_industry']."</option>";
                    }
                  }
                ?>
                  
                </select>
              </div>  
              
              <div class="form-group">
                <select class="form-control" id="job_status" name="job_status">
                <option selected="" value="">Select Status</option>
                <?php
                  $sql="SELECT * FROM master_job_status";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['job_status']."' data-id='".$row['id']."'>".$row['job_status']."</option>";
                    }
                  }
                ?>
                  
                </select>
              </div>  

              </div>
              <button type="submit" class="btn btn-primary" href="search.php">Search</button>
              </form>
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            

    <!-- LATEST JOB POSTS -->
    <section class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h2 class="text-center">Latest Job Postings</h2>            
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


          
          $sql = "SELECT * FROM job_post Order By Rand() Limit 6";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
                          
               ?>
            <div class="attachment-block clearfix">
              <img class="attachment-img" src="logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href=""><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">Php <?php echo $row['maximumsalary']; ?>/Month</span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row['jobstatus']; ?> | <?php echo $row['work_arrangement']; ?> | <?php echo $row['job_industry']; ?> Company | Location: <?php echo $row['job_location']; ?> |  <?php echo $row['experience']; ?> Year(s) Working Experience Required</strong></div>
                    <?php custom_echo($row['description'],500); ?>
                </div>
              </div>
            </div>
          <?php
              }
            }
            }
          }
          ?>

          </div>
        </div>
      </div>
    </section>

   <section>
  <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header bg-main-next">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head-sub">
              <h2>Why Sign Up With Us? </h2>
              <p></p>
              <!--<p><a class="btn btn-success btn-lg" href="search.php" role="button">Search Jobs</a></p>-->
              <h5>Recruitment portal should give you a solution to get your process automated.
                The portal should give power to store unlimited databases of Job seekers and employers.
                The recruitment process should be easy for both job seekers and employer.
                Automatic scheduling should be done through the cron job facility for system reminders, updates, matching jobs, Bulk mailing.
                Online application submission, tracking of application, manager your methods powerfully without any delay.
                Tracking, Filtering, short-listing the best candidates for your company.
                Management of job seekers, employers, statistics of your data, report generation, CMS management are the best part of a recruitment solution</h5>

            <h5>We, at Countworx Inc.  provide ease to use as well as completely flexible, high class quality and rich features job portal. Also, we have developed a number of job portal on the basis of custom needs of our clients. Check our affordable job portal package and take a first step to be a successful business.</h5>
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>         


    <section id="statistics" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h2>Our Statistics</h2>
          </div>
        </div>
        <div class="counter">
        <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="employees">
                    <p class="counter-count">5321</p>
                    <p class="employee-p">Job Postings</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="customer">
                    <p class="counter-count">361</p>
                    <p class="customer-p">Registered Companies</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="design">
                    <p class="counter-count">8823</p>
                    <p class="design-p">Submitted CV's</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="order">
                    <p class="counter-count">7500</p>
                    <p class="order-p">Daily User Views</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>

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
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Scrolling Nav JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/sticky-menu.js"></script>
<script src="js/incremental_counter.js"></script>

  </body>
</html>