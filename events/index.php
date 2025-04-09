<?php 
	$stylesheet = '<link rel="stylesheet" href="../styles/main.css">';
	$extraStyles = '<link rel="stylesheet" href="../styles/events.css">';
	$music = '<h5>Astral Observatory Ambiance: <br><br>
					<audio src="../media/astral-observatory.mp4" 
					controls style="width: 100px;"></audio>
			</h5>';
	$headerText1 = '<h1>Wander Through Our Events</h1>';
	$headerText2 = '<h2>Where Every Path Leads to a Story</h2>'; 
	require '../includes/header.php';?>
		<section>
			<table>
				<caption>Group Events Catalogue</caption>
				<tr>
					<th>Event Name</th>
					<th>Date</th>
					<th>Description</th>
					<th>Location</th>
				</tr>
				<tr>
					<td>Friendsgiving</td>
					<td>November 28, 2024</td>
					<td>A Thanksgiving celebration with friends.</td>
					<td>Rob's House</td>
				</tr>
				<tr>
					<td>Halloween/Birthday Party for Alex and Allison</td>
					<td>October 31, 2024</td>
					<td>Joint party for Alex and Allison's birthdays.</td>
					<td>Rob's House</td>
				</tr>
				<tr>
					<td>Halloween Movie Night</td>
					<td>October 12, 2024</td>
					<td>A spooky movie marathon to celebrate Halloween.</td>
					<td>Rob's House</td>
				</tr>
				<tr>
					<td>Night on the Town</td>
					<td>August 24, 2024</td>
					<td>An evening out in downtown Wilmington at Ibiza.</td>
					<td>Downtown Wilmington</td>
				</tr>
				<tr>
					<td>Gaetano's Birthday</td>
					<td>May 1, 2024</td>
					<td>A birthday celebration for Gaetano.</td>
					<td>Gaetano's Appartment</td>
				</tr>
				<tr>
					<td>Easter Get Together</td>
					<td>April 2024</td>
					<td>A celebration with friends on Easter Sunday.</td>
					<td>Rob's House</td>
				</tr>
				<tr>
					<td>Super Bowl Party</td>
					<td>February 11, 2024</td> <!-- Super Bowl 2024 date -->
					<td>Celebration to watch the big game.</td>
					<td>Gaetano's Dad's House</td>
				</tr>
				<tr>
					<td>Mike's Birthday Party</td>
					<td>TBD</td>
					<td>Party for Mike's birthday. Date to be confirmed.</td>
					<td>Rob's House</td>
				</tr>
				<tr>
					<td>Halloween Party for Alex's Birthday</td>
					<td>October 31, 2023</td>
					<td>A spooky celebration for Alex's birthday.</td>
					<td>Rob's House</td>
				</tr>
			</table>
		</section>
	<?php include '../includes/footer.php'; ?>
	<script src="../scripts/events.js"></script>
</body>
</html>