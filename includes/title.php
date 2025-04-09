<?php
// title.php - Dynamically set page title based on the folder name

// Default homepage before switch starts

// Get the folder name using the script path
$pageName = basename(dirname($_SERVER['SCRIPT_FILENAME']));

// Since all files are named "index", swtich $pageTitle based on folder names
switch ($pageName) {
	case 'events':
		$pageTitle = ' - Events';
		break;
	case 'pets':
		$pageTitle = ' - Pets';
		break;
	case 'photo-gallery':
		$pageTitle = ' - Photo Gallery';
		break;
	case 'signup':
		$pageTitle = ' - Sign Up';
		break;
	default:
		// Default title for the home page or any undefined pages
		$pageTitle = ' - Home';
		break;
}