<?php session_start();?>
<?php 
$stylesheet = $stylesheet ?? "";
$extraStyles = $extraStyles ?? "";
$headerText1 = $headerText1 ?? "<h1>Welcome to Mr. Panzer's Observatory</h1>"; 
$headerText2 = $headerText2 ?? "<h2>Peer into the Hidden Corners of My Universe</h2>";

$basePath = (basename(dirname($_SERVER['SCRIPT_FILENAME'])) === 'MrPanzersMemories') ? '' : '../';

include $basePath . 'includes/title.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Gaetano James Panzer II -->
	<meta charset="utf-8">
	<meta name="description" content="A webpage about the life and times of Gaetano James Panzer II">
	<meta name="keywords" content="blog,friend,party,story,cat,pet,space">
	<title>Mr. Panzer's Observatory <?php echo $pageTitle; ?>
	</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
	<?= $stylesheet; ?>
	<?= $extraStyles; ?>
	<style>
		h1, h2 {
			font-family: Audiowide;
		}
	</style>
</head>
<body>
	<header>
		<a href="<?= $basePath . "index.php"; ?>">
			<img src="<?= $basePath . "images/telescope.gif"; ?>" alt="telescope image">
		</a>
		<?= $headerText1; ?>
		<?= $headerText2; ?>
	</header>
	<?php require $basePath . 'includes/menu.php'; ?>
	<main>