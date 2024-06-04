<?php
  //Session Variables
  session_start();
  //ConnString
  require_once("initialize.php");

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
    
    <script src="js/jquery3.5.1.js"></script>
    <script src="js/jqueryui/jquery.ui.js"></script>
    
    <!--MODAL-->
    
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!--MODAL-->


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

    <!--Misc-->
    <link href="css/incremental_counter.css" rel="stylesheet">
    <link href="js/jqueryui/jquery.ui.css" rel="stylesheet">
    <!--Misc-->
 

 <!-- jhun script -->
<script>
$(document).ready(function(){
	  //var salaryRangemin = 0;//ui.values[0];
      //var salaryRangemax = 1000000;//ui.values[1];
	
	$("#btn_searchfilter").click(function(){
	 	$("#inputJobtitle").val("");
		$("#input_loc").val("");
		$("#job_status")[0].selectedIndex = 0;
		$("#industry")[0].selectedIndex = 0;
		$("#yoe")[0].selectedIndex = 0;
		$("#input_qual").val("");	
		$("#salaryRange")[0].selectedIndex = 0;
		
		if ($("#btn_searchfilter").text() == 'Advanced Search'){
			$("#div_industry").show();
			$("#div_yoe").show();
			$("#div_qual").show();
			$("#div_salaryrange").show();
			$("#btn_searchfilter").html("Clear");		
		}else if ($("#btn_searchfilter").text() == 'Clear'){
			$("#div_industry").hide();
			$("#div_yoe").hide();
			$("#div_qual").hide();
			$("#div_salaryrange").hide();
			$("#btn_searchfilter").html("Advanced Search");
		}
		
	});

	$("#btn_Search").click(function(){
			
			var jobTitle = $("#inputJobtitle").val();
			var selectIndustry = $("#industry option:selected").val();
			var jobstatus = $("#job_status option:selected").val();
			var loc = $("#input_loc").val();
			var yoe = $("#yoe option:selected").val();
			var qual = $("#input_qual").val();
			var salaryRange = $("#salaryRange option:selected").val();
			//alert(yoe);
			
			
		$("#search_result").remove();
		$.ajax({
			type:"POST",
			async:false,
			url:"search_result.php",
			data: {jobTitle:jobTitle,selectIndustry:selectIndustry,jobstatus:jobstatus,loc:loc,yoe:yoe,qual:qual,salaryRange:salaryRange},
			success: function(result){
				$("#ajax_search_result").html(result);
			},
			error: function(result){
				alert("error" + result);
			}
		});	
	});

    $( "#inputJobtitle" ).autocomplete({
      source: "autocompletedata.php?functionName=inputJobtitle"
    });
	
	 $( "#input_loc" ).autocomplete({
	  source: "autocompletedata.php?functionName=inputLocation"
    });
	
	 $( "#input_qual" ).autocomplete({
      source: "autocompletedata.php?functionName=inputQual"
    });
	
	/*$(function(){
		$("#slider-range").slider({
		  range: true,
		  min: 0,
		  max: 1000000,
		  values: [ 5000, 20000 ],
		  slide: function( event, ui ) {
			$("#amount").val("P " + ui.values[ 0 ] + " - P " + ui.values[ 1 ]);
			salaryRangemin = ui.values[0];
			salaryRangemax = ui.values[1];
		  }
		});
		initialize default value
		$("#amount").val("P" + $("#slider-range").slider("values", 0) +
		  " - P " + $("#slider-range").slider("values", 1));
	});*/
	
});	
</script>
<!-- jhun script -->

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
    
    
    <header>
    <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197"> <!--data-spy="affix" data-offset-top="197"-->
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
          
          if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged'])) { 
              ?>
              <li><a href="company-register.php">Employer Sign Up</a></li>
              <li><a href="register.php">Jobseeker Sign Up</a></li>
              <li><a href="login.php">Login</a></li>
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

      <section class="content-header bg-main">
        <div class="container">
            <div class="row">
              <div class="col-md-12 text-center index-head">
              <h1>Financial Professionals Job Portal</h1>
             <!-- <form class="navbar-form navbar-center"> -->
			 <table style="margin: 0 auto;">
			 <tr>
				<td>
                <div class="form-group" >
                <input autofocus type="text" class="form-control" placeholder="Type Job Title" size='40' id="inputJobtitle" required>
				</div>
				</td>
				
				  <td>	
			  <div class="form-group"  id="div_loc" >
                <input type="text" class="form-control" placeholder="Location" size='40' id="input_loc" >
			  </div> 
			  </td>
				
				
              
			    <td>
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
				</td>
				<td>
				
				</td>
			
			</tr>
			<tr>
			
			<td>
                <div class="form-group" id="div_industry" style="display: none;">
                <select class="form-control" id="industry" name="industry" width="40" >
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
				</td>	
			
			  <td>
			  <div class="form-group"  id="div_yoe" style="display: none;">
                <!-- <input type="text" class="form-control" placeholder="Years of experience" size='20' id="input_yoe"  >  -->

                <select class="form-control" id="yoe" name="yoe">
                <option selected="" value="">Years of Experience</option>
				<option value="1">1-2</option>
				<option value="2">3-5 </option>
				<option value="3">6-10</option>
				<option value="4">11-15</option>
				<option value="5">More than 16</option>
				</select>

				
			  </div>
				</td>
			   <td>	
			  <div class="form-group"  id="div_qual" style="display: none;">
                <input type="text" class="form-control" placeholder="Qualification" size='20'  id="input_qual">
			  </div>
			  </td>	
			</tr> 
			<tr>
				<td>
				<div class="form-group"  id="div_salaryrange" style="display: none;">
					<!-- <label for="amount" >Salary range</label>
					<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;" class="form-control">
					<div id="slider-range" class="form-group" ></div> -->
					<select class="form-control" id="salaryRange" name="salaryRange">
					<option selected="" value="">Salary Range</option>
					<option value="1"> Less than 30,000 </option>
					<option value="2"> 30,001 - 50,000 </option>
					<option value="3"> 50,001 - 80,000 </option>
					<option value="4"> 80,001 - 100,000 </option>
					<option value="5"> More than 100,000 </option>
					</select>
				</div>
				</td>
			</tr>
			</table> 
			
      
      
     <!-- <button type="submit" onclick="location.href = '#job-post'" class="btn btn-primary" id="btn_Search">Search</button> -->
	  <button type="submit" onclick=" load_to_anchor_search(); return false" class="btn btn-primary" id="btn_Search">Search</button>
      <button type="submit" onclick="return false" class="btn btn-primary" id="btn_searchfilter">Advanced Search</button>
      <!--<button type="submit" onclick="window.location.reload(true)" class="btn btn-primary" id="btn_latestjobs">View Latest Job Post</button>-->
      <button type="submit" onclick="load_to_anchor()" class="btn btn-primary" id="btn_latestjobs">View Latest Job Post</button>
      
      <script type = "text/javascript">  
          function load_to_anchor_search()
          {
          window.location.href = '#job-post';  
          //setTimeout(location.reload.bind(location), 400)
          //window.location.reload(true);
          
          }
          
      </script>


      <script type = "text/javascript">  
          function load_to_anchor()
          {
          window.location.href = '#job-post';  
          setTimeout(location.reload.bind(location), 400)
          //window.location.reload(true);
          
          }
          
      </script>


		         <!-- </form>  -->
			  
              </div>
            </div>
			
			
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


          
          /*$sql = "SELECT * FROM job_post Order By Rand() limit 10";*/
          $sql = "SELECT * FROM job_post Order By createdat DESC";
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
        <div class="attachment-block clearfix div-fader"> <!--onmouseover="this.style.background='#E6E6E3';" onmouseout="this.style.background='white';">--> 
              <img class="attachment-img" src="logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Company Logo">
              <div class="attachment-pushed">
              <h4 class="attachment-heading" ><a style="text-decoration: none;" ><?php echo $row['jobtitle']; ?> </a> - Php <?php echo $row['minimumsalary']; ?>/Month</h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row['jobstatus']; ?> | <?php echo $row['work_arrangement']; ?> | <?php echo $row['job_industry']; ?> Company |  <?php echo $row['job_location']; ?>  | <?php echo $row['experience']; ?> Year(s) Working Experience</strong></div>
                     <?php //custom_echo($row['description'],500); 
					$coreCompetency = "";
					/*$sql = "SELECT mastcore.core_competencies FROM job_post_competency_detail as jpdtl left join master_core_competencies as mastcore on jpdtl.coreCompetency=mastcore.id where jpdtl.id_jobpost = ".$row['id_jobpost'];
					$coreresults = $mysqli->query($sql);
					//echo "meron b error :".$mysqli->error;
					if($coreresults->num_rows > 0) {
						while($corerow = $coreresults->fetch_assoc())
						{
							$coreCompetency .= "   * ".$corerow['core_competencies'];
						}
						echo "<strong> Core Competencies: </strong>".$coreCompetency;
					}*/

          $sql = "SELECT *  FROM compcorecompetencies WHERE id_jobpost = ".$row['id_jobpost'];
					$coreresults = $mysqli->query($sql);
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
    <div class="modal-dialog modal-lg ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $row['jobtitle']; ?></h4>
        </div>
         <div class="modal-body" id="myModal<?php echo $row['id_jobpost']; ?>" >
          <p><img class="logo-img" src="logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Company Logo"></p>
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
          
          <p><span class="a">Qualifications</span><span class="b">:</span>
          <!--Bulleted List of Job Description----MUST include "." at the end of every paragraph-->  
          <?php 
          $str=$row['qualification'];
          $arr=explode('.',$str);
          echo "<ul><li>" . implode("</li><li>", array_filter($arr)) . "</li></ul>"
          ?>
          <!--Bulleted List of Job Description----MUST include "." at the end of every paragraph-->
          
          </div>
        
        
        <div class="modal-footer">
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!--<button type="button" class="btn btn-primary text-light"><a href="login.php">Submit Application To Employer</a>-->
            <button class="btn btn-primary" onclick="window.location.href='login.php'">Login</button>
            
            
          </div>  
        
        </div>
      </div>
      
    </div>
  
  <!-- MODAL -->


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
    <!--Smooth Scrool-->
    </section>
    
    <!--Smooth Scrool-->
    <section>	
	<div id="ajax_search_result">
		<!-- display ajax result here-->
	
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

