<?php 
    $pageCss = 'login.css';
    include "base.php";
?>

<main>
    	<div class="login">
		<form id="loginform" action="/php/userlogin.php" method="POST">
			<label for="email">Email</label>
            <input type="text" id="email" name="email">
			<label for="password">Password</label>
			<input type="text" id="password" name="password">
        </form>
		<div class="buttondiv"><button type="submit" form="loginform">Create account</button></div>
</main>