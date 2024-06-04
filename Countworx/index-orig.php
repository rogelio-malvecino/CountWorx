<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  require_once("initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Financial Professionals Job Portal-Countworx Inc.</title>
    
    <!-- Front End Visuals -->	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" href="css/mycss.css">
    <link href="css/sticky-menu.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <!-- NAVIGATION BAR -->
    <header>
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
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
            //Show user dashboard link once logged in.
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
              //Show Login Links if no one is logged in.
            ?>
              
              <li><a href="company.php">Post A Job/ Employers</a></li>
              <li><a href="register.php">FREE Sign Up</a></li>
              <li><a href="login.php">Jobseeker Login</a></li>
              
              <!--<li><a class="btn btn-default btn-block" href="company.php" role="button">Post A Job/ Employers</a></>
              <li><a class="btn btn-default btn-block" href="register.php" role="button">FREE Sign Up</a></>
              <li><a class="btn btn-default btn-block" href="login.php" role="button">Jobseeker Logins</a></>-->


            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <!--<section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">
              <h1>Financial Professionals Job Portal</h1>
              <p>Find Your Dream Job</p>
              <p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a></p>
              <p><a class="btn btn-primary btn-lg" href="search.php" role="button">Search Job</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>-->

    <!-- Content Wrapper. Contains page content -->
  
  <section>
  <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header bg-main">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head">
              <h1>Financial Professionals Job Portal</h1>
              <p></p>
              
              <p><a class="btn btn-primary btn-lg" href="search.php" role="button">Search Jobs</a></p>
              
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            




    <!-- LATEST JOB POSTS -->
    <section>
      <div class="container">
        <div class="row">
          <h2 class="text-center">Latest Job Posts</h2>
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
             ?>
            <div class="col-md-6 fixHeight">             
              <h4 style="color:#337AB7;"><?php echo $row['jobtitle']; ?></h4>
              <span class="bg-primary text-white badge py-2 px-3"><?php echo $row['jobstatus']; ?></span>
              <p><?php custom_echo($row['description'],500); ?></p>
              <button class="btn btn-default">View</button>
            </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>

    

    <section>
  <div class="content-wrapper" style="margin-left: 0px;">

      <section class="content-header bg-main-next">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head">
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
            <h1>Our Statistics</h1>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>1021</h3>

              <p>Job Offers</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>103</h3>

              <p>Registered Company</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>2800+</h3>

              <p>CV'S/Resume</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>7500+</h3>

              <p>Daily Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
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
        <!--<div class="row">
          <div class="col-md-6">
            <img src="img/browse.jpg" class="img-responsive">
          </div>
          <div class="col-md-6 about-text margin-bottom-20">
            <p>Recruitment portal should give you a solution to get your process automated.
                The portal should give power to store unlimited databases of Job seekers and employers.
                The recruitment process should be easy for both job seekers and employer.
                Automatic scheduling should be done through the cron job facility for system reminders, updates, matching jobs, Bulk mailing.
                Online application submission, tracking of application, manager your methods powerfully without any delay.
                Tracking, Filtering, short-listing the best candidates for your company.
                Management of job seekers, employers, statistics of your data, report generation, CMS management are the best part of a recruitment solution</p>

            <p>We, at Countworx Inc.  provide ease to use as well as completely flexible, high class quality and rich features job portal. Also, we have developed a number of job portal on the basis of custom needs of our clients. Check our affordable job portal package and take a first step to be a successful business.</p>
          </div>
        </div>-->
      </div>
    </section>

  </div>


<section>
<div id="footer">
	

<!-- Bottom -->
	
<!--<section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">

            <a href="#">About Us  |</a>
            <a href="#">  Work With Countworx Inc.  |</a>
            <a href="#">  Contact Us</a>
        
              <h1></h1>
              <p>&nbsp;&nbsp;&nbsp;&nbsp;   Follow Us</p>
              
	      		<ul class="social-icons">
				    <a class="facebook" href="#"><i class="fa fa-facebook-official fa-2x"></i></a>&nbsp;&nbsp;
				    <a class="twitter" href="#"><i class="fa fa-twitter fa-2x"></i></a>&nbsp;&nbsp;
				    <a class="gplus" href="#"><i class="fa fa-instagram fa-3x"></i></a>
				    <a class="linkedin" href="#"><i class="fa fa-linkedin fa-2x"></i></a>&nbsp;&nbsp;
			      </ul>	
            <div class="copyrights">©  Copyright 2020 by <a href="#">COUNTWORX INC.</a>. All Rights Reserved.</div>
	    </div>
          </div>
        </div>
      </div>

</section>-->

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
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Terms of Service</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Sitemap</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Logo</h6>
            <ul class="footer-links">
              <!--<li><a href="http://scanfcode.com/category/c-language/">C</a></li>
              <li><a href="http://scanfcode.com/category/front-end-development/">UI Design</a></li>
              <li><a href="http://scanfcode.com/category/back-end-development/">PHP</a></li>
              <li><a href="http://scanfcode.com/category/java-programming-language/">Java</a></li>
              <li><a href="http://scanfcode.com/category/android/">Android</a></li>
              <li><a href="http://scanfcode.com/category/templates/">Templates</a></li>-->
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

  </body>
</html>