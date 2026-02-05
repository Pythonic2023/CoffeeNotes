<?php 
	ob_start();
	session_start();
	$pageCss = "profile.css";
	include "base.php";

	['name' => $username, 'email' => $email] = $_SESSION['user'];

	if (empty($_SESSION['id'])) {
		header("Location: http://127.0.0.1:8080/login.php");
		$_SESSION['loginrequired'] = "Please login to see your profile";
	}
?>

<main>
	<div id=welcome-message>
		<h2>Welcome, user</h2>
		<div class=user-grid>
			<div id="name"><p><?php echo $username?></p></div>
			<div id="email"><p><?php echo $email?></p></div>
		</div>
	</div>
</main>
