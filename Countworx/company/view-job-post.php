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

    <!--Confirm Delete-->    
    <script language="JavaScript" type="text/javascript">
     $(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('This will permanently DELETE the job post. Do you want to proceed? ')){
            e.preventDefault();
            return false;
        }
        return true;
      });
    });
  </script>
<!--Confirm Delete-->


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
             // } else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged'])) { 
              ?>
             <!-- <li><a href="company/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li> -->
              <?php // }  else { 
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
              <h1>Job Posts</h1>
              
              </div>
            </div>
        </div>
        </section>            
    </div>
    </section>            


    <!-- Already Applied for the Job. -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['jobPostDeleteSuccess'])) { ?>
      <div class="row">
        <div class="col-md-12 failedMessage">
          <div class="alert alert-danger fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Info!</strong> Job Post Deleted.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['jobPostDeleteSuccess']); } ?>
    
    
    <!-- Already Applied for the Job. -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['newjobPOST'])) { ?>
      <div class="row">
        <div class="col-md-12 failedMessage">
          <div class="alert alert-warning fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Info!</strong> Successfully Added A New Job Post.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['newjobPOST']); } ?>
    

      <!-- Applied To Job Success Message. -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['editjobPOST'])) { ?>
      <div class="row">
        <div class="col-md-12 successMessage">
          <div class="alert alert-warning fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Info!</strong> Job Post Successfully Edited.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['editjobPOST']); } ?>




    <!-- LATEST JOB POSTS -->
    <section class="content-header">
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
          ?>            
            <p></p>
            <div class="container">
      <div class="row ">
        <div class="col-md-12">
          <div class="table-responsive">
            <h2 class="text-center"></h2>
            <table class="table table-striped ">
              <thead>
                <th>Job Name</th>
                <th>Job Description</th>
                <th>Minimum Salary</th>
                <!--<th>Maximum Salary</th>-->
                <th>Experience</th>
                <th>Work Arrangement</th>
                <th>Job Status</th>
                <th>Created On</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php 
                
                $stmt = $conn->prepare("SELECT * FROM job_post WHERE id_company=? ORDER BY createdat DESC");

                $stmt->bind_param("i", $_SESSION['id_user']);

                $stmt->execute();

                $result = $stmt->get_result();

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {
                   ?>
                    <tr  onmouseover="this.style.background='#E6E6E3';" onmouseout="this.style.background='white';">
                      <td><?php echo $row['jobtitle']; ?></td>
                      <td><?php custom_echo ($row['description'],500); ?></td>
                      <td><?php echo $row['minimumsalary']; ?></td>
                      <!--<td><?php echo $row['maximumsalary']; ?></td>-->
                      <td><?php echo $row['experience']; ?></td>
                      <td><?php echo $row['work_arrangement']; ?></td>
                      <td><?php echo $row['jobstatus']; ?></td>
                      <td><?php echo date("d-M-Y", strtotime($row['createdat'])); ?></td>
                      <td><a href="edit-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Edit</a> <a href="delete-job-post.php?id=<?php echo $row['id_jobpost'];?>" class='delete'>Delete</a></td>
                    </tr>
                   <?php
                 }
               }

               $stmt->close();


                //Sql Query to show all job_post created by logged in company
                  // $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_user]'";
                  // $result = $conn->query($sql);

                  // //If Job Post exists then display details of post
                  // if($result->num_rows > 0) {
                  //   while($row = $result->fetch_assoc()) 
                  //   {
                     ?>
                   <!--    <tr>
                        <td><?php echo $row['jobtitle']; ?></td>
                        <td><?php echo $row['job_description']; ?></td>
                        <td><?php echo $row['minimumsalary']; ?></td>
                        <td><?php echo $row['maximumsalary']; ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td><?php echo $row['qualification']; ?></td>
                        <td><?php echo date("d-M-Y", strtotime($row['createdat'])); ?></td>
                        <td><a href="edit-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Edit</a> <a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Delete</a></td>
                      </tr> -->
                     <?php
                  //   }
                  // }
                  //Close database connection. Not compulsory but good practice.
                
                  $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
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
<script src="../js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Scrolling Nav JavaScript -->
<script src="../js/jquery.easing.min.js"></script>
<script src="../js/sticky-menu.js"></script>
<script src="../js/incremental_counter.js"></script>

  </body>
</html>