<?php 
$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
$music = '<h5>Astral Observatory Ambiance: <br><br>
				<audio src="../media/astral-observatory.mp4" 
				controls style="width: 100px;"></audio>
		</h5>';
$headerText1 = '<h1>Log into Mr. Panzer\'s Observatory</h1>';
$headerText2 = '<h2>Acknowledge My Universe</h2>';
require_once '../../../secure_conn.php'; 
require '../includes/header.php';
if (isset($_POST['submit']) && $_POST['submit']=="Login" ) {
	$missing = array();
	
	$valid_email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL); // returns a string null if empty or false if not valid
	if (empty($_POST['email']))
		$missing['email'] = 'Please enter a valid email address';
	elseif (!$valid_email)
		$missing['email'] = 'Please enter a valid email address';
	else 
		$email = $valid_email;
	
	$password = trim($_POST['password']);
	if (empty($password))
		$missing['pw']= "A password is required";

	while (empty($missing)){ 
		try{
			require_once ('../../../../pdo_connect.php'); // Connect to the db.
			//Query for email
			$sql = "SELECT * FROM MPO_reg_users WHERE email = :email";
			$stmt = $dbc->prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$numRows = $stmt->rowCount();
			if ($numRows==0) 
				$missing['exists'] = "That email address wasn't found";
			else { // email found, validate password
				$result = $stmt->fetch(); //convert the result object pointer to an associative array 
				$pw_hash=$result['pw'];
				if (password_verify($password, $pw_hash )) { //passwords match
					$username = $result['username'];
					$folder = $result['folder'];
					
					// Start a session
					session_start();
					
					// Store the user's first name and email in separate $_SESSION variables
					$_SESSION['username'] = htmlspecialchars($username);
					$_SESSION['email'] = htmlspecialchars($email);
					$_SESSION['folder'] = htmlspecialchars($folder);

					header('Location: logged_in.php');
					
					exit;
				}
				else {
					$missing['wrong_pw'] = "That isn't the correct password";
				}
			} 
			}catch (PDOException $e){
				echo $e->getMessage();	
			}
	   } // end while 	
} //end isset $_POST['send']
?>
	<section>
		<h2>Please Login Here</h2>
		<form name="input" method="post" action="index.php">
		<?php // Show blanket error message if any field needs to be corrected
		if (!empty($missing))
			echo '<h3>Please fix the item(s) indicated</h3>';
		?>
		
		<?php
			// Show email error
			if (isset($missing['email']))
				echo '<strong>' . htmlspecialchars($missing['email']) . '</strong><br>';
			if (isset($missing['exists']))
				echo '<strong>' . htmlspecialchars($missing['exists']) . '</strong><br>';
		?>
		<label for="email">Email:</label>
		<input type="email" placeholder="Enter Email" name="email" id="email" 
		<?php if (isset($email)) echo 'value="' . htmlspecialchars($email) . '"';?>><br>
				
		<?php // Show password errors
			if (isset($missing['wrong_pw'])) 
				echo '<strong>' . $missing['wrong_pw'] . '</strong><br>';
			if (isset($missing['pw'])) 
				echo '<strong>'. $missing['pw'] . '</strong><br>';
		?>
 		<label for="password">Password:</label>
		<input type="password" placeholder="Enter Password" name="password" id="password"><br>
			
		<input type="submit" name="submit" value="Login" id="button">
		</form>
		<?php include '../includes/footer.php'; ?>

	