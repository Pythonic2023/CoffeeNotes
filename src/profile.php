<?php 
	ob_start();
	session_start();
	$pageCss = "profile.css";
	include "base.php";

	['name' => $username, 'email' => $email] = $_SESSION['user'];

	if (empty($_SESSION['id'])) {
		header("Location: /login.php");
		$_SESSION['loginrequired'] = "Please login to see your profile";
	}
?>

<main>
	<div id=welcome-message>
		<h2>Welcome, user</h2>
		<div class=user-grid>
			<div id="name"><p><?php echo convertstring($username) ?></p></div>
			<div id="email"><p><?php echo convertstring($email) ?></p></div>
		</div>
	</div>
</main>
