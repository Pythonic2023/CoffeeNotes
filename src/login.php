<?php 
	session_cache_limiter('nocache'); // Refreshing login page if error code is still on it removes the message. Sends no cache headers to client. 
	session_start();
    $pageCss = 'login.css';
    include "base.php";
?>

<main>
    	<div class="login">
		<form id="loginform" action="/php/userlogin.php" method="POST">
			<label for="email">Email</label>
            <input type="text" id="email" name="email" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
        </form>
		<div class="loginerror">
			<?php
				if (!empty($_SESSION['invalid_password'])){
				print_r($_SESSION['invalid_password']);
				unset($_SESSION['invalid_password']);
				}
				elseif (!empty($_SESSION['invalid_email'])){
					print_r($_SESSION['invalid_email']);
					unset($_SESSION['invalid_email']);
				}
			?>
		</div>
		<div class="buttondiv"><button type="submit" form="loginform">Create account</button></div>
		</div>
</main>