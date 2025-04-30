<?php 
	$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
	$extraStyles = '<link rel="stylesheet" href="../styles/photo-gallery.css">';
	$music = '<h5>Astral Observatory Ambiance: <br><br>
					<audio src="../media/astral-observatory.mp4" 
					controls style="width: 100px;"></audio>
			</h5>';
	$headerText1 = '<h1>Moments We Shared</h1>';
	$headerText2 = '<h2>Group Get-Togethers, Outings & Good Times</h2>';
	require '../includes/header.php';
?>
		<section>
			<div class="gallery-container">
				<h1>Events Photo Gallery</h1>
				<div class="filter-menu">
					<button class="halloween2024">Halloween 2024</button>
					<button class="mike-birthday">Mike's Birthday Kickback</button>
					<button class="ibiza">Ibiza</button>
					<button class="halloween2023">Halloween 2023</button>
				</div>
				<div class="photo-grid">
					<!--halloween2024-->
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/alex-and-denise.jpeg" alt="alex and denise dancing">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/alex-and-joel.jpeg" alt="alex and joel dancing">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/alex-lit.jpeg" alt="alex looks like shes had a lot to drink">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/allison-and-caitlynn.jpeg" alt="allison and caitlynn">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/book-club.jpeg" alt="allison and alex and caitlynn">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/boys-gaming.jpeg" alt="the boys playing mario kart on the couch">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/mike-and-gaetano-1.jpeg" alt="mike and gaetano mirror selfie">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/mike-and-gaetano-2.jpeg" alt="mike and gaetano mirror selfie">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/rob-and-caitlynn.jpeg" alt="rob and caitlynn">
					</div>
					<div class="photo halloween2024 hidden">
						<img src="../images/halloween2024/the-boys.jpeg" alt="the boys on the couch">
					</div>
					<!--mikes kickback-->
					<div class="photo mike-birthday hidden">
						<img src="../images/mikes-kickback/pool-1.jpg" alt="alex mike allison drunk in pool">
					</div>
					<div class="photo mike-birthday hidden">
						<img src="../images/mikes-kickback/pool-2.jpg" alt="alex mike allison drunk in pool">
					</div>
					<div class="photo mike-birthday hidden">
						<img src="../images/mikes-kickback/pool-3.jpg" alt="alex mike allison drunk in pool">
					</div>
					<div class="photo mike-birthday hidden">
						<img src="../images/mikes-kickback/pool-4.jpg" alt="alex mike allison drunk in pool">
					</div>
					<!--ibiza-->
					<div class="photo ibiza hidden">
						<img src="../images/ibiza/group-1.jpg" alt="group photo at ibiza bar">
					</div>
					<div class="photo ibiza hidden">
						<img src="../images/ibiza/group-2.jpg" alt="group photo at ibiza bar">
					</div>
					<div class="photo ibiza hidden">
						<img src="../images/ibiza/group-3.jpg" alt="group photo at ibiza bar">
					</div>
					<div class="photo ibiza hidden">
						<img src="../images/ibiza/ibiza-1.jpg" alt="mike and allison dancing">
					</div>
					<div class="photo ibiza hidden">
						<img src="../images/ibiza/ibiza-2.jpg" alt="mike and allison dancing">
					</div>
					<div class="photo ibiza hidden">
						<img src="../images/ibiza/ibiza-3.jpg" alt="mike and allison dancing">
					</div>
					<!--halloween2023-->
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/alex-allison-dom-denise.JPG" alt="girls in costumes">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/alex-allison-dom-denise-2.JPG" alt="girls in costumes being silly">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/alex-gaetano.jpg" alt="alex and gaetano hanging out">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/alex-gaetano-2.jpg" alt="alex and gaetano hanging out">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/alex-gaetano-3.jpg" alt="alex and gaetano hanging out">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/alex-gaetano-4.jpg" alt="alex and gaetano hanging out">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/gaetano.jpg" alt="sleeping gaetano">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/mike-alex-dom-denise.JPG" alt="girls and guy in costume">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/mike-allison-gaetano.JPG" alt="mike allison and gaetano">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/mike-gaetano-1.JPG" alt="mike and gaetano">
					</div>
					<div class="photo halloween2023 hidden">
						<img src="../images/halloween2023/mike-gaetano-2.JPG" alt="mike and gaetano">
					</div>
				</div>
			</div>
			<script src="../scripts/photo-gallery.js"></script>
		<?php include '../includes/footer.php'; ?>