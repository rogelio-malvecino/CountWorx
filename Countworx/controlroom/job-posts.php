<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter dashboard.php in URL.
if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../initialize.php");
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
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

    <!--Misc-->
    <link href="..js/jqueryui/jquery.ui.css" rel="stylesheet">
    <!--Misc-->
    
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
            <a class="navbar-brand" href="">COUNTWORX INC.</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="list-group">
            <a href="dashboard.php" class="list-group-item">Dashboard</a>
            <a href="user.php" class="list-group-item">Users</a>
            <a href="company.php" class="list-group-item ">Company</a>
            <a href="job-posts.php" class="list-group-item active">Job Posts</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-6">
        <?php
          $sql = "SELECT * FROM job_post";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            echo '<h3>Total Job Posts: ' . $result->num_rows . '</h3>'; 
          }

        ?>
          
          
          <table class="table">
            <thead>
              <th>SNo</th>
              <th>Job Tile</th>
              <th>Posting Date</th>
              <th>Company</th>
              <th>Minimum Salary</th>
              <th>Maximum Salary</th>
              <th>Total Users Applied</th>
              <th>Action</th>
              
            </thead>
            <tbody>
            
              <?php
                $sql = "SELECT * FROM job_post ORDER BY createdat DESC";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $row['jobtitle']; ?></td>
                        <td><?php echo date("d M Y H:i:s", strtotime($row['createdat'])); ?></td>
                        <?php
                        $c=$row['id_company'];
                        
                        $sql2 = "SELECT company.companyname FROM company WHERE company.id_company =$c";
                          $result2 = $conn->query($sql2);
                          if($result2->num_rows > 0) {
                             while($row2 = $result2->fetch_assoc()) {
                            ?>
                             <td><?php echo $row2['companyname']; ?></td>
                            <?php
                          }
                        
                        }

                        ?>
                        
                        <td><?php echo number_format($row['minimumsalary']); ?></td>
                        <td><?php echo number_format($row['maximumsalary']); ?></td>
                        <?php
                          $sql1 = "SELECT COUNT(apply_job_post.id_apply) AS totalNo FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE job_post.id_jobpost='$row[id_jobpost]'";
                          $result1 = $conn->query($sql1);
                          if($result1->num_rows > 0) {
                             while($row1 = $result1->fetch_assoc()) {
                            ?>
                             <!--<td><?php /*echo $row1['totalNo'];*/ ?></td>-->
                             <td><button type="button" class="btn btn-default btn-sm" data-toggle="modal" role="dialog" data-target="#myModalcount<?php echo $row['id_jobpost']; ?>"><?php echo $row1['totalNo']; ?></button></td>
                            <?php
                          }
                        
                        }
                        ?>
                        <td><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>">Delete</a></td>
                        <!-- MODAL -->
               
  
                        <!-- Trigger the modal with a button -->
                        <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" role="dialog" data-target="#myModal<?php echo $row['id_jobpost']; ?>">View Details</button></td>
      
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
                             <!--     <button class="btn btn-primary" onclick="window.location.href='login.php'">Apply</button>-->
        
                              </div>              
                            </div>                
                          </div>
                        </div>  
                      </tr>
                    <?php
                
                }
                }
              ?>

              
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="../js/sticky-menu.js"></script>
  </body>
</html>