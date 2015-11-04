
<?php
	error_reporting(0); 
	session_destroy();
	echo "Successfully Logout!";
	header("Refresh:3;url = index.php");
	
?>