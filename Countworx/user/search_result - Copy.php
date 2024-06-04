

<?php
 //Session Variables
  session_start();
  //ConnString
  require_once("../initialize.php");

?>

<link rel="stylesheet" href="css/mycss.css">


  
   

  <!--Smooth Scrool to this point-->              
 <section class="content-header">           
   <!--Smooth Scrool to this point-->              
  
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


          
          //$sql = "SELECT * FROM job_post Order By Rand() Limit 2";
          //$result = $conn->query($sql);
          $result = $conn->query("CALL spsearchresult('".$_POST['jobTitle']."','".$_POST['selectIndustry']."','".$_POST['jobstatus']."','".$_POST['loc']."','".$_POST['yoe']."','".$_POST['qual']."','".$_POST['salaryRangemin']."','".$_POST['salaryRangemax']."')");
		  if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
               ?>
        <div class="attachment-block clearfix">
              <img class="attachment-img" src="../logos/<?php echo $row['comp_logo']; ?>.jpg" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading" ><a style="text-decoration: none;" ><?php echo $row['jobtitle']; ?> </a> - Php <?php echo number_format( $row['maximumsalary'],2); ?>/Month</h4>
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
          <p><span class="a">Salary</span><span class="b">:</span><span class="c"><?php echo number_format( $row['maximumsalary'],2); ?> /Month</span></p>
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
            <button class="btn btn-primary" onclick="window.location.href='login.php'">Apply</button>
            

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
        
          ?>

          </div>
        </div>
      </div>
   </section>
   <!--Smooth Scrool-->
   </section>
    <!--Smooth Scrool-->
   


