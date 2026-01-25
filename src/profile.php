<?php 
	$pageCss = "profile.css";
	include "base.php";

	if (empty($_SESSION['id'])) {
		echo "Please log in to see this page";
	}
?>

<main>
	<div id=welcome-message>
		<h2>Welcome, user</h2>
		<div class=user-grid>
			<div id="name"><p>Name</p></div>
			<div id="email"><p>Email</p></div>
			<div id="location"><p>Location</p></div>
			<div id="favorite-coffee"><p>Favorite coffee</p></div>
		</div>
	</div>
</main>
