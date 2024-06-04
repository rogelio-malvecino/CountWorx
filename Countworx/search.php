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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.css">

    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">

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
      <nav class="navbar navbar-default">
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
        
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">
              <h1>Search Job</h1>
              <p>Find Your Dream Job</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- LATEST JOB POSTS -->
    <section>
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form id="myForm" class="form-inline">
            <div class="form-group">
              <label>Experience</label>
              <select id="experience" class="form-control">
                <option value="" selected="">Select Experience (Years)</option>
                 <?php 
                // SQL query to get all differnet qualification that has been entered in our database
                  $sql ="SELECT DISTINCT(experience) FROM job_post WHERE experience IS NOT NULL ORDER BY experience";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      echo "<option value'".$row['experience']."'>".$row['experience']."</option>";
                    }
                  }
                ?>
                
              </select>
            </div>
            <div class="form-group">
              <label>Qualification</label>
              <select id="qualification" class="form-control">
                <option value="" selected="">Select Qualification</option>
                <?php 
                // SQL query to get all differnet qualification that has been entered in our database
                  $sql ="SELECT DISTINCT(qualification) FROM job_post WHERE qualification IS NOT NULL";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                      echo "<option value'".$row['qualification']."'>".$row['qualification']."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <button class="btn btn-success">Search</button>
          </form>
        </div>
      </div>
        <div class="row" style="margin-top: 5%;">
          <div class="table-responsive">
            <table id="myTable" class="table">
              <thead>
                <th>Job Name</th>
                <th>Job Description</th>
                <th>Minimum Salary</th>
                <th>Maximum Salary</th>
                <th>Experience</th>
                <th>Qualification</th>
                <th>Action</th>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    <script src="//bartaz.github.io/sandbox.js/jquery.highlight.js"></script>

    <script src="//cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.min.js"></script>

    <script type="text/javascript">
      $(function() {
        //this is how datatables are created. we are getting data from refresh_job_search page using ajax
        var oTable = $('#myTable').DataTable({
          "autoWidth": false,
          "ajax" : {
            "url" : "refresh_job_search.php",
            "dataSrc" : "",
          "data" : function (d) {
              d.experience = $("#experience").val();
              d.qualification = $("#qualification").val();
            }
          }
        });

        oTable.on('draw', function() {
          var body = $(oTable.table().body());

          body.unhighlight();

          body.highlight(oTable.search());


        });

        //We only want to reload the ajax on submit button click instead of redirecting to form post page. so we use preventDefault();
        $("#myForm").on("submit", function(e) {
          e.preventDefault();
          oTable.ajax.reload( null, false);
        })

      });
    </script>
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
              <li><a href="#">Contribute</a></li>
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
  </body>
</html>