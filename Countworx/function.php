<?php

function Is_User_Logged_In() 
	{
  		if (!($_SESSION['id_user']) || $_SESSION['id_user'] == "") 
			{
				session_unset();
				session_destroy();
    			Header("Location: ../login.php");
    			exit();
				return 0;
			}
			
		if ($_SESSION['logas'] != "user")
			{
				session_unset();
				session_destroy();
				Header("Location: ../login.php");
    			exit();
				return 0;
			}
		
		
			
  	}
	
function Is_Company_Logged_In() 
	{
  		if (!($_SESSION['id_user']) || $_SESSION['id_user'] =="") 
			{
				session_unset();
				session_destroy();	
    			Header("Location: ../login.php");
    			exit();
				return 0;
			}
		if ($_SESSION['logas'] != "company")
			{
				session_unset();
				session_destroy();
				Header("Location: ../login.php");
    			exit();
				return 0;
			}
		
  	}
	

			
	
?>	