<?php 
	ob_start();
	session_start();
	$pageCss = "profile.css";
	include "base.php";

	if (empty($_SESSION['id'])) {
		header("Location: http://127.0.0.1:8080/login.php");
		$_SESSION['loginrequired'] = "Please login to see your profile";
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
