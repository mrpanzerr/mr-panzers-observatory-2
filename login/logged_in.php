<?php 
$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
$music = '<h5>Astral Observatory Ambiance: <br><br>
				<audio src="../media/astral-observatory.mp4" 
				controls style="width: 100px;"></audio>
		</h5>';
$headerText1 = '<h1>In Space, No One Can Hear You Scream.</h1>';
$headerText2 = '<h2>:)</h2>';
session_start();

if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$message = "Welcome back $username!";
		$message2 = "You are now logged in";
	} else { 
		$message = 'You have reached this page in error';
		$message2 = 'Please use the menu at the right';	
	}
	//The require header is deferred until session variables are set so that the menu can display correctly
	require '../includes/header.php';
	// Print the message:
	echo '<section><h2 style="text-align: center">'.$message.'</h2>';
	echo '<h3 style="text-align: center">'.$message2.'</h3>';
	// Include the footer and quit the script:
	include ('../includes/footer.php'); 	
?>
	