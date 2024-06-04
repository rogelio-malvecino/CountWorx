<?php
//To Handle Session Variables on This Page
session_start();

//If user is already logged in then redirect them back to dashboard. 
//This is required if user tries to manually enter company-register.php in URL.
//if(isset($_SESSION['id_user'])) {
//    header("Location: user/dashboard.php");
//    exit();
//  }

require_once("initialize.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Financial Professionals Job Portal-HRWORX</title>

        <!-- Front End Visuals -->	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">    
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet" href="css/mycss.css">
    <link href="css/sticky-menu.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/floating-labels.css" rel="stylesheet"/>
    <!-- Front End Visuals -->	

    <!--Extras-->
    <link href="css/incremental_counter.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!--Extras-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!--Menu transparency and color change-->
<style>
  .affix {
      top: 0;
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
    
    <!-- NAVIGATION BAR -->
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
            <a class="navbar-brand" href="index.php">HRWORX</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
      
            <?php
            //Show user dashboard link once logged in.
            //Todo: Check if Company logged in then show company dashboard? 
            //if(isset($_SESSION['id_user'])) { 
              ?>
            <!--  <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>-->
            <?php
            //} else { 
              //Show Login Links if no one is logged in.
            ?>
              <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>
              
        
            <?php /*}*/ ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well" style = "margin-top: 120px;">
          <h3 class="text-center">Register Your Company</h3>
            <form method="post" action="addcompany.php">
              
            <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" id="companyname" name="companyname" placeholder="Company Name" required="" autofocus>
                <label for="companyname">Company Name</label>
              </div>
              <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" id="headofficecity" name="headofficecity" placeholder="Head Office City" required="">
                <label for="headofficecity">Head Office Address</label>
               </div>
              <div class="form-group">
              <!--  <label for="country">Country</label>
                <select class="form-control" id="country" name="country">
                <option selected="" value="">Select Country</option>-->
                <?php
                /*  $sql="SELECT * FROM countries";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                    }
                  }*/
                ?>
                  
                </select>
              </div>  
              <div id="stateDiv" class="form-group" style="display: none;">
              <!--  <label for="state">Region/ State</label>
                <select class="form-control" id="state" name="state">
                  <option value="" selected="">Select Region/ State</option>
                </select>-->
              </div>   
              <div id="cityDiv" class="form-group" style="display: none;">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city">
                  <option selected="">Select City</option>
                </select>
              </div>               
              <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" id="contactno" name="contactno" placeholder="Contact Number" minlength="11" maxlength="13" autocomplete="off" onkeypress="return validatePhone(event);" required="">
                <label for="contactno">Contact Number</label>
              </div>
              <div class="form-label-group in-border">
                <input type="text" class="form-control shadow-none" id="website" name="website" placeholder="Website">
                <label for="website">Website</label>
              </div>
              <!--<div class="form-group">
                <label for="companytype">Company Type</label>
                <input type="text" class="form-control" id="companytype" name="companytype" placeholder="Company Type">
              </div>-->

              <div class="form-label-group in-border">
              
                <select class="form-control shadow-none" width="40" id="companytype" name="companytype" placeholder="Company Type">
                <option selected="" value="">Select Industry</option>
                <?php
                  $sql="SELECT * FROM master_job_industry ORDER BY job_industry";
                  $result=$conn->query($sql);

                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<option value='".$row['job_industry']."' data-id='".$row['id']."'>".$row['job_industry']."</option>";
                    }
                  }
                ?>
                <br></br>
                
                </select>
                <label for="idustry">Industry</label>
              </div>     



              <div class="form-label-group in-border">
                
                <input type="email" class="form-control shadow-none" id="email" name="email" placeholder="Email" required="">
                <label for="email">Company Email Address</label>
                <span class="glyphicon glyphicon-envelope form-control-feedback text-primary"></span>
              </div>

              <div class="form-label-group in-border">
                <input type="password" class="form-control shadow-none" id="password" name="password" placeholder="Password" required="">
                <label for="password">Password</label>
                <span class="glyphicon glyphicon-lock form-control-feedback text-primary"></span>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <?php 
              //If Company already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div class="alert alert-warning">
                  <strong><center>Registration Failed!</center></strong>
                  <center>Email Already Registered!</center>
                </div>
               <?php
               unset($_SESSION['registerError']); }
              ?>     
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
    </script>

    <script>
      $("#country").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#state").find('option:not(:first)').remove();
        if(id != '') {
          $.post("state.php", {id: id}).done(function(data) {
            $("#state").append(data);
          });
          $('#stateDiv').show();
        } else {
          $('#stateDiv').hide();
          $('#cityDiv').hide();
        }
      });
    </script>

    <script>
      $("#state").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#city").find('option:not(:first)').remove();
        if(id != '') {
          $.post("city.php", {id: id}).done(function(data) {
            $("#city").append(data);
          });
          $('#cityDiv').show();
        } else {
          $('#cityDiv').hide();
        }
      });
    </script>
  
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
  
  </body>
</html>