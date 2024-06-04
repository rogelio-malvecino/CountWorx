

<?php
 //Session Variables
  session_start();
  //ConnString
  require_once("../initialize.php");
  include("../function.php");
  Is_User_Logged_In(); 


?>
   

  <!--Smooth Scrool to this point-->              
 <section class="content-header">           
   <!--Smooth Scrool to this point-->              


  <!--Confirm Send Of Application-->    
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
    $("a.sendapp").click(function(e){
      if(!confirm('Ensure that your Personal and Professional Profile are UPDATED.\nThis will send your job application to the employer.\nProceed? ')){
            e.preventDefault();
            return false;
        }
        return true;
      });
    });
    </script>
  <!--Confirm Send Of Application-->    

  <!-- Already Applied for the Job. -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['jobAlreadyApplied'])) { ?>
      <div class="row">
        <div class="col-md-12 failedMessage">
          <div class="alert alert-danger fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Info!</strong> You Have Already Applied For The Job.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['jobAlreadyApplied']); } ?>
    

      <!-- Applied To Job Success Message. -->
      <!-- Todo: Remove Success Message Without Reload. -->
      <?php if(isset($_SESSION['jobApplySuccess'])) { ?>
      <div class="row">
        <div class="col-md-12 successMessage">
          <div class="alert alert-warning fade in">
          <a href="#" class="close" data-dismiss="alert">&times;</a>
          <center><strong>Congratulations!</strong> Application Successfully Sent To Employer.</center>
          </div>
        </div>
      </div>
      <?php unset($_SESSION['jobApplySuccess']); } ?>

  
  <!-- LATEST JOB POSTS -->
   <section class="content-header" id="search_result"> 
 
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h2 class="text-center">Search Result</h2>            
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
			//arrange years of experience
				$yoemin = 0;
				$yoemax = 0;
			if($_POST['yoe'] == "" )
			{
				$yoemin = 0;
				$yoemax = 100;	
			}		
			if($_POST['yoe'] == 1 )
			{
				$yoemin = 1;
				$yoemax = 2;	
			}	
			if($_POST['yoe'] == 2 )
			{
				$yoemin = 3;
				$yoemax = 5;	
			}			
			if($_POST['yoe'] == 3 )
			{
				$yoemin = 6;
				$yoemax = 10;	
			}	
			if($_POST['yoe'] == 4 )
			{
				$yoemin = 11;
				$yoemax = 15;	
			}
			if($_POST['yoe'] == 5 )
			{
				$yoemin = 16;
				$yoemax = 100;	
			}			
		  	
		  	
		  
		  
			//arrange the salary range
				$salaryRangemin = 0;
				$salaryRangemax = 0;
			if($_POST['salaryRange'] == "" )
			{
				$salaryRangemin = 1;
				$salaryRangemax = 10000000;	
			}	
			if($_POST['salaryRange'] == 1)
			{
				$salaryRangemin = 1;
				$salaryRangemax = 30000;	
			}
			if($_POST['salaryRange'] == 2)
			{
				$salaryRangemin = 30001;
				$salaryRangemax = 50000;	
			}
			if($_POST['salaryRange'] == 3)
			{
				$salaryRangemin = 50001;
				$salaryRangemax = 80000;	
			}
			if($_POST['salaryRange'] == 4)
			{
				$salaryRangemin = 80001;
				$salaryRangemax = 100000;	
			}
			if($_POST['salaryRange'] == 5)
			{
				$salaryRangemin = 100000;
				$salaryRangemax = 10000000;	
			}
          
		  
		   // echo $_POST['salaryRange']." -- ".$salaryRangemin."   --  ".$salaryRangemax;
          //$sql = "SELECT * FROM job_post Order By Rand() Limit 2";
          //$result = $conn->query($sql);
          $result = $conn->query("CALL spsearchresult('".$_POST['jobTitle']."','".$_POST['selectIndustry']."','".$_POST['jobstatus']."','".$_POST['loc']."','".$yoemin."','".$yoemax."','".$_POST['qual']."','".$salaryRangemin."','".$salaryRangemax."')");
		  if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
               ?>
        <div class="attachment-block clearfix div-fader"> <!--onmouseover="this.style.background='#E6E6E3';" onmouseout="this.style.background='white';">--> 
              <img class="attachment-img" src="../logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Attachment Image">
              <div class="attachment-pushed">
              <h4 class="attachment-heading" ><a style="text-decoration: none;" ><?php echo $row['jobtitle']; ?> </a> - Php <?php echo $row['minimumsalary']; ?>/Month</h4>
                <!--<h4 class="attachment-heading" ><a style="text-decoration: none;" ><?php echo $row['jobtitle']; ?> </a> - Php <?php //echo number_format( $row['maximumsalary'],2); ?>/Month</h4>-->
                <div class="attachment-text">
                    <div><strong><?php echo $row['jobstatus']; ?> | <?php echo $row['work_arrangement']; ?> | <?php echo $row['job_industry']; ?> Company |  <?php echo $row['experience']; ?> Year(s) Working Experience Required</strong></div>
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

  <!--Insert notice if applicant already applied for the job-->
  <?php


      //Check if user already applied to jobpost or not. If applied then don't show apply link.
      
      $sql1 = "SELECT id_user FROM apply_job_post WHERE id_user='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]'";
      $applied = $mysqli->query($sql1);
      
        if($applied->num_rows > 0) 
        {
          echo "<span class='label label-warning'>Already Applied</span>";
        }
  ?>  
<!--Insert notice if applicant already applied for the job-->


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
            <!--<button class="btn btn-primary" onclick="window.location.href='apply.php?id=<?php echo $row['id_jobpost']; ?>'">Apply</button>-->
            <a href="apply.php?id=<?php echo $row['id_jobpost'];?>" class='sendapp btn btn-primary' >Apply</a>
            
          
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
          }else {
            echo "<div class='alert alert-warning'>";
            echo "<strong><center>Info!</center></strong> ";
            echo "<center> No Results Were Found Matching Your Search Request </center";
            echo "</div>";
          }
        
          ?>

          </div>
        </div>
      </div>
   </section>
   <!--Smooth Scrool-->
   </section>
    <!--Smooth Scrool-->
   


