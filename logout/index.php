<?php 
	$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
	$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
	$music = '<h5>Astral Observatory Ambiance: <br><br>
					<audio src="../media/astral-observatory.mp4" 
					controls style="width: 100px;"></audio>
			</h5>';
	$headerText1 = '<h1>Space smells like seared steak.</h1>';
	$headerText2 = '<h2>likely due to high-energy particles in space</h2>';
	require_once '../../../reg_conn.php';
	
	session_start(); 
	// Check for the $_SESSION variables you stored at login
	// If they are set:
	if (isset($_SESSION['username'])) {
		// Set the $message variables to output that the user is successfully logged out
		$username = $_SESSION['username'];
		$message = "$username, thanks for using our site";
		$message2 = "You have successfully logged out";
		
		// Empty the $_SESSION array
		$_SESSION=array();
		
		// Remove the session data
		session_destroy();
		
		// Delete the cookie from the user's browser
		setcookie('PHPSESSID','', time()-3600, '/');
	} else { // If it is not set: indicate that the user has reached the page in error
		$message = 'You have reached this page in error';
		$message2 = 'Please use the menu at the right';	
	}
	//The require header is deferred until session variables are set so that the menu can display correctly
	require '../includes/header.php';
	// Print the message:
	echo '<section>';
	echo '<h2 style="text-align: center">'.$message.'</h2>';
	echo '<h3 style="text-align: center">'.$message2.'</h3>';
	// Include the footer and quit the script:
	include ('../includes/footer.php'); 	
?>