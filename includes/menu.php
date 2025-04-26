<?php
// Determine the relative path to the root
$depth = substr_count($_SERVER['PHP_SELF'], '/') - 4; 
$basePath = str_repeat('../', $depth);
?>

<nav>
    <ul>
        <li><a href="<?= $basePath ?>index.php" <?= (basename($_SERVER['SCRIPT_FILENAME']) === 'index.php' && basename(dirname($_SERVER['SCRIPT_FILENAME'])) === 'MrPanzersMemories') ? 'id="current"' : '' ?>>Home</a></li>
        <li><a href="<?= $basePath ?>events/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/events/') !== false) ? 'id="current"' : '' ?>>Events</a></li>
        <li><a href="<?= $basePath ?>photo-gallery/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/photo-gallery/') !== false) ? 'id="current"' : '' ?>>Photo Gallery</a></li>
        <li><a href="<?= $basePath ?>pets/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/pets/') !== false) ? 'id="current"' : '' ?>>Pets</a></li>
		<?php if (!isset($_SESSION['username']) or ($_SERVER['SCRIPT_NAME'] == $basePath . 'logout/subscribed.php')){ ?>
			<li><a href="<?= $basePath ?>signup/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/signup/') !== false) ? 'id="current"' : '' ?>>Sign Up</a></li>
			<li><a href="<?= $basePath ?>login/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/login/') !== false) ? 'id="current"' : '' ?>>Log In</a></li>
		<?php } else { ?>
			<li><a href="<?= $basePath ?>upload/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/upload/index.php') !== false) ? 'id="current"' : '' ?>>Upload Story</a></li>
			<li><a href="<?= $basePath ?>upload/display_post.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/upload/display_post.php') !== false) ? 'id="current"' : '' ?>>View Stories</a></li>
			<li><a href="<?= $basePath ?>logout/index.php" <?= (strpos($_SERVER['SCRIPT_NAME'], '/logout/') !== false) ? 'id="current"' : '' ?>>Log Out</a></li>
		<?php } ?>
    </ul>
</nav>

	