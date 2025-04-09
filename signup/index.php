<!-- Gaetano James Panzer II -->
<?php 
	$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
	$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
	$music = '<h5>Astral Observatory Ambiance: <br><br>
					<audio src="../media/astral-observatory.mp4" 
					controls style="width: 100px;"></audio>
			</h5>';
	$headerText1 = '<h1>Sign Up for Mr. Panzer\'s Observatory</h1>';
	$headerText2 = '<h2>Never Miss an Update!</h2>';
	require_once '../../../secure_conn.php'; 
	require '../includes/header.php';
	session_start(); 
	
	if (isset($_POST['submit']) && $_POST['submit'] == "Register") {
		$missing = array();
		
		// Username validation
		$username = trim($_POST['username']);
		if (empty($username)) {
			$missing['username'] = "Username is required";
		}

		// Email validation with FILTER_VALIDATE_EMAIL
		$valid_email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
		if (empty($_POST['email'])) {
			$missing['email'] = "Email address is required";
		} elseif (!$valid_email) {
			$missing['email'] = "Please enter a valid email address";
		} else {
			$email = $valid_email;
		}

		// Password validation
		$password1 = trim($_POST['password']);
		$password2 = trim($_POST['confirm_password']);

		if (empty($password1) || empty($password2)) {
			$missing['password'] = "Please enter the password twice";
		} elseif ($password1 !== $password2) {
			$missing['password_mismatch'] = "The passwords don't match";
		} else {
			$password = $password1;
		}
		
		try {
			require_once '../../../../pdo_connect.php';
			$sql = "SELECT * FROM MPO_reg_users WHERE email = :email";
			$stmt = $dbc->prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			$numRows = $stmt->rowCount();
			if ($numRows >= 1)
				$missing['exists'] = "That email address is already registered.";
			
			if (empty($missing)) {
				$sql2 = "INSERT INTO MPO_reg_users (username, email, pw) VALUES (?, ?, ?)";
				$stmt2 = $dbc->prepare($sql2);
				$pw_hash= password_hash($password, PASSWORD_DEFAULT);
				$stmt2->bindParam(1, $username);
				$stmt2->bindParam(2, $email);
				$stmt2->bindParam(3, $pw_hash);
				$stmt2->execute();
				$numRows = $stmt2->rowCount();
				if ($numRows != 1)
					echo "<h2>We are unable to process your request at  this  time. Please try again later.</h2>";
				else {
					$_SESSION['username'] = $username;
					header('Location: subscribed.php');
				}
				include 'includes/footer.php'; 
				exit;
			}#end !missing	
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
?>
		<section>
			<h2>Please enter the following information:</h2>
			<form name="input" method="post" action="index.php">
				<?php 
				// Show blanket error message if any field needs to be corrected
				if (!empty($missing))
					echo '<h3>Please fix the item(s) indicated</h3>';
				?>
				
				<?php 
				// Show username error
				if (isset($missing['username']))
					echo '<strong>' . htmlspecialchars($missing['username']) . '</strong><br>';
				?>
				<label for="username">Username:</label>
				<input type="text" placeholder="Enter Username" name="username" id="username" autofocus 
				<?php if (isset($username)) echo 'value="' . htmlspecialchars($username) . '"';?>><br>
				
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
				
				<?php 
				// Show password errors
				if (isset($missing['password_mismatch'])) 
					echo '<strong>' . $missing['password_mismatch'] . '</strong><br>';
				if (isset($missing['password'])) 
					echo '<strong>'. $missing['password'] . '</strong><br>';
				?>
 				<label for="password">Password:</label>
				<input type="password" placeholder="Enter Password" name="password" id="password"><br>
				
				<label for="confirm_password">Confirm Password:</label>
				<input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password"><br>
				
				<input type="submit" name="submit" value="Register" id="button">
			</form>
			<?php include '../includes/footer.php'; ?>