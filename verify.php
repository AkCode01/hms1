<?php
if (isset($_POST['username'])) {
	$un = $_POST['username'];
	$up = $_POST['userpass'];

	if ($un == "Admin" && $up == "123") {
	    // echo "Working";
	    
		session_start();
		$_SESSION['logeduser'] = $un;
		// echo $_SESSION['logeduser'];
		header("location:index.php");
		
	} else {
		header("location:login.php?err=Invalid User Or Pass");
	}
} else {
	header("location:welcome.php?err=Please Login First");
}
