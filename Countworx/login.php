<?php
//To Handle Session Variables on This Page
session_start();

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
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<!--Extras-->


<script src="js/jquery3.5.1.js"></script>
<script src="js/jqueryui/jquery.ui.js"></script>



<script>
$(document).ready(function(){



	$("#btnLogIn").click(function(){
			var userName = $("#email").val();
			var passWord = $("#password").val();
			//alert(userName + " === " + passWord);
		$.ajax({
			url:"checklogin.php",
			type:"POST",
			//contentType:"application/json",
			dataType:"json",
			data: {userName:userName,passWord:passWord},
			success: function(result){
				//$("#returnMessage").html(result);
				//alert("a "+ result.logas);
				//alert(result);
				if(result.loginfailed =='loginfailed'){
					$("#returnMessage").html("<div class='alert alert-warning'><strong><center>Info!</center></strong><center>Login Failed: Please Check Your Login Credentials</center>");
					return;
				}
				
				
				if(result.logas == 'user'){
					window.location.href = "user/index_logged.php";
				}else if(result.logas =='company'){
					window.location.href = "company/index_logged.php";
          
				}
				
				
			},
			error: function(result){
				alert("error" + result);
			}
		});	
	});


});	
</script>

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
    <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="100">
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
            if(isset($_SESSION['id_user'])) { 
              ?>
              <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>
            <?php
            } else { 
              //Show Login Links if no one is logged in.
            ?>
              <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>

            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>


    <br><br>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well" style = "margin-top: 120px;">
          <h3 class="text-center">Log Into Countworx</h3>
		  <br></br>
           <!-- <form method="post" action="checklogin.php"> -->
				        
                
                <div class="form-label-group in-border">
                <input type="email" class="form-control shadow-none" id="email" name="email" placeholder="Email" required="true" autofocus>
                <label for="email">Email Address</label>
                <span class="glyphicon glyphicon-envelope form-control-feedback text-primary"></span>
                </div>
                
                <div class="form-label-group in-border">
                <input type="password" class="form-control shadow-none" id="password" name="password" placeholder="Password" required="true">
                <label for="password">Password</label>
                <span class="glyphicon glyphicon-lock form-control-feedback text-primary"></span>
				        </div>
        
        <div class="form-group has-feedback">
                <a href="forgot-password.php">Forgot Password?</a>
				</div>
				<div class="text-center">
                <button type="submit" onclick="return false" id="btnLogIn" class="btn btn-primary">Log In</button>
				</div>
             
                <div class="text-center" id="returnMessage">
                 
                </div>
              
                   
            <!--</form> -->
          </div>
        </div>
      </div>
     </section>

     <!-- Check for initial company registration -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['CompregisterCompleted'])) { ?>
      <div class="row">
        <div class="col-md-12 failedMessage">
          <div class="alert alert-warning fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Congratulations!</strong> Registration Successful.</center>
          <center>An email will be sent to you by the Administrators for your notice of account approval.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['CompregisterCompleted']); } ?>
    <!-- Check for initial company registration -->

      <!-- Check for initial jobseeker registration. -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['UserregisterCompleted'])) { ?>
      <div class="row">
        <div class="col-md-12 successMessage">
          <div class="alert alert-warning fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Congratulations!</strong> Registration Successful.</center>
          <center>Please check your email for account verification procedure.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['UserregisterCompleted']); } ?>
      <!-- Check for initial jobseeker registration. -->


     <section>

     <br><br>
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
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->

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
<script src="js/sticky-menu.js"></script>
<script src="js/incremental_counter.js"></script>
  </body>
</html>