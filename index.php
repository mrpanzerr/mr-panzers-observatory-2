<?php 
$stylesheet = '<link rel="stylesheet" href="styles/main.css">';
$extraStyles = '<link rel="stylesheet" href="styles/print.css" media="print">';
$music = '<h5>Astral Observatory Ambiance: <br><br>
				<audio src="media/astral-observatory.mp4" 
				controls style="width: 100px;"></audio>
		</h5>';
require 'includes/header.php'; 
?>
		<section>
			<p>Welcome to my personal site, a place where you can explore the stories and adventures I share with my friends. Join me as I recount memorable moments and experiences that shape my journey.</p>
			<p>In addition to my adventures, you’ll find a special section dedicated to my cats, who have all added a unique charm to my life. Get ready to discover the delightful antics of my furry companion!</p>
			<p>Don't miss out on any updates! Be sure to sign up for notifications about new stories and exciting content as I continue to add to this space.</p>
			<p>Below are some of the incredible people I call friends, each a shining light in my world. Discover more about their journeys and the bonds we share in our past and future events <a href="events/index.php"> here!</a></p>
			<div class="image-grid">
				<figure id="i1">
					<img src="images/allison.JPEG" alt="allison image">
					<figcaption>Allison - The Crowned Jewel</figcaption>
				</figure>
				<figure id="i2">
					<img src="images/alex.jpg" alt="alex image">
					<figcaption>Alex - Joyous Firecracker</figcaption>
				</figure>
				<figure id="i3">
					<img src="images/mike.JPG" alt="mike image">
					<figcaption>Mike - Big Brother Slime </figcaption>
				</figure>
				<figure id="i4">
					<img src="images/rob.jpg" alt="rob image">
					<figcaption>Rob - The Woodsman</figcaption>
				</figure>
			</div>
		<?php include 'includes/footer.php'; ?>