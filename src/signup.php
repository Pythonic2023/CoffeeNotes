<?php 
	session_start();
	$pageCss = "signup.css";
	include 'base.php';
?>

<main>	
	<div class="signup">
		<form id="signupform" action="/php/submitsignup.php" method="POST">
            <label for="firstname">First name</label>
            <input type="text" id="firstname" name="firstname">
			<label for="lastname">Last name</label>
            <input type="text" id="lastname" name="lastname">
			<label for="email">Email</label>
            <input type="text" id="email" name="email">
			<label for="password">Password</label>
			<input type="text" id="password" name="password">
			<label for="confirmpassword">Confirm password</label>
			<input type="text" id="confirmpassword" name="confirmpassword">
        </form>
		<div class="buttondiv"><button type="submit" form="signupform">Create account</button></div>
	</div>
</main>