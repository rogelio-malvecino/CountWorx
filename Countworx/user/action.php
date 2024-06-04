<?php 
include('header.php');
?>
<title>phpzag.com : Demo Multi Select Dropdown with Checkbox using Bootstrap, jQuery and PHP</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<?php include('container.php');?>
<div class="container">
	<h2>Example: Multi Select Dropdown with Checkbox using Bootstrap, jQuery and PHP</h2>
    <br><br>	
	<pre><?php print_r ($_POST['benefits']); ?></pre>
	
	<div style="margin:10px 0px 0px 0px;">
		<a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/demo/multi-select-dropdown-with-checkbox-using-bootstrap-jquery-and-php" title="">Back</a>			
	</div>		
</div>
<?php include('footer.php');?>