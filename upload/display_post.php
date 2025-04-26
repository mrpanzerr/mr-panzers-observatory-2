<?php
	$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
	$extraStyles = '<link rel="stylesheet" href="../styles/signup.css">';
	$music = '<h5>Astral Observatory Ambiance: <br><br>
		<audio src="../media/astral-observatory.mp4" controls style="width: 100px;"></audio></h5>';
	$headerText1 = '<h1>Look At Your Universe</h1>';
	$headerText2 = '<h2>You\'ve Come So Far But There\'s More To Go</h2>';

	require '../includes/header.php';
	
	if (isset($_SESSION['username'], $_SESSION['folder'], $_SESSION['email'])) {
		try {
			require_once '../../../../pdo_connect.php';
			// Count of posts
			$sql = $dbc->prepare("SELECT COUNT(fileName) AS post_count FROM MPO_user_uploads WHERE email = ?");
			$sql->execute([$_SESSION['email']]);
			$result = $sql->fetch();
			$postCount = $result['post_count'];
			
			$sql->closeCursor();

			// Array of posts
			$sql = $dbc->prepare("SELECT * FROM MPO_user_uploads WHERE email = ?");
			$sql->execute([$_SESSION['email']]);
			$uploads = $sql->fetchAll();

			// Example: how many posts are being displayed right now
			$postNum = count($uploads);

			$pageNum = isset($_GET['page']) ? (int) $_GET['page'] : 1;
			
		} catch (Exception $e) {
			echo '<p>Error: ' . $e->getMessage() . '</p>';
			include '../includes/footer.php';
			exit;
		} 
	} else {
		echo '<section><h2>You are not supposed to be here.</h2>';
		echo '<h3>Sign up or login to continue</h3></section>';
		include '../includes/footer.php';
		exit;
	}
?>
	<section>
	<?php if ($postNum == 0) { ?>
		<h2>No stories yet! Upload some stories using this link: <a href="index.php">Upload Story</a></h2>
	<?php } else { // If page number is 1 and theres more posts to show, display Next>> arrow 
		
		$currentUpload = $uploads[$pageNum - 1];
		
		echo '<div>';
		// Show title
		echo '<h2>' . (html_entity_decode($currentUpload['title'])) . '</h2>';
		
		// $currentUpload['fileName'] contains the image name from DB
		$imageURL = 'serve_image.php?image=' . urlencode($currentUpload['fileName']);
		echo '<img src="' . $imageURL . '" alt="Uploaded image" style="max-width: 300px;">';
		
		// Show the story
		echo '<p><strong>Story:</strong> ' . (html_entity_decode($currentUpload['comments'])) . '</p>';
		if ($pageNum > 1) {
			echo '<a href="display_post.php?page=' . ($pageNum - 1) . '">&lt;&lt; PREV</a> ';
		}
		if ($pageNum < $postCount) {
			echo '<a href="display_post.php?page=' . ($pageNum + 1) . '">NEXT &gt;&gt;</a>';
		}
		echo '<p style="text-align: right">Displaying ' . $pageNum . ' of ' . $postCount . '</p>';} 
		echo '</div>';
	?>
<?php include '../includes/footer.php'; ?>