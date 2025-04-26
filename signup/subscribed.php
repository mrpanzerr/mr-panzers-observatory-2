<?php 
$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
$music = '<h5>Astral Observatory Ambiance: <br><br>
				<audio src="../media/astral-observatory.mp4" 
				controls style="width: 100px;"></audio>
		</h5>';
$headerText1 = '<h1>We Are Stardust Dreaming of Stars</h1>';
$headerText2 = '<h2>Whispers of the Cosmos Echo Through Our Veins</h2>';
session_start();

if (isset($_SESSION['username'])) {
	$username = htmlspecialchars($_SESSION['username']);
	$message = "Welcome, $username!";
	$message2 = "Thanks for joining my journey! Please login to continue.";
	
	// Empty the $_SESSION array
	$_SESSION = array();
				
	// Remove the session data
	session_destroy();
				
	// Delete the cookie from the user's browser
	setcookie('PHPSESSID', '', time() - 3600, '/');
} else { 
	$message = 'You have reached this page in error';
	$message2 = 'Please register first to continue.';	
}

require '../includes/header.php';

// Print the message:
echo '<section>';
echo '<h2 style="text-align: center">'.$message.'</h2>';
echo '<h3 style="text-align: center">'.$message2.'</h3>';
?>

<script>
	let funFactArray = [
		"Space is so vast that the observable universe is estimated to be about 93 billion light-years in diameter.",
		"The Cosmic Microwave Background Radiation is the oldest light in the universe, dating back about 13.8 billion years to the Big Bang.",
		"Black holes are so dense that their gravitational pull is so strong that not even light can escape them, making them invisible.",
		"The universe has been expanding since the Big Bang, and galaxies are moving away from us in all directions.",
		"Launched in 1990, the Hubble Space Telescope has provided some of the most detailed images of distant galaxies, nebulae, and other astronomical phenomena.",
		"The International Space Station orbits Earth approximately every 90 minutes, traveling at a speed of about 17,500 miles per hour (28,000 km/h).",
		"Astronomers estimate that there are over 100 billion galaxies in the observable universe and you have happened upon mine!",
		"Astrobiology is the study of the possibility of life beyond Earth, focusing on conditions that could support life in extreme environments.",
		"A light year is the distance that light travels in one year, approximately 5.88 trillion miles (9.46 trillion kilometers).",
		"The Hercules-Corona Borealis Great Wall is the largest known structure in the universe, spanning about 10 billion light-years.",
		"Observatories use adaptive optics to reduce the blurring effects of Earth’s atmosphere, allowing for clearer images of celestial objects.",
		"It takes about 8 minutes and 20 seconds for sunlight to travel from the Sun to Earth. I wonder how long it will take for you to travel my universe.",
		"Saturn is the only planet in our solar system that is less dense than water; it could theoretically float in a large enough body of water.",
		"According to Einstein's theory of relativity, time moves slower in stronger gravitational fields, meaning time passes differently on the surface of a black hole.",
		"The first telescope was invented in 1608 by Hans Lippershey, but Galileo Galilei was the first to use it for astronomical observations."
	]
	let pElement = document.getElementById("funfact");
	pElement.textContent = "Fun Fact: " + funFactArray[Math.floor(Math.random() * funFactArray.length)];
</script>

<?php 
include '../includes/footer.php';
?>
