<!DOCTYPE html>

	<head>
		<title>CoffeeNotes</title>
		<link rel="stylesheet" href="/asset/css/index.css">

		<?php if (isset($pageCss)): ?>
			<link rel="stylesheet" href="/asset/css/<?php echo $pageCss; ?>">
		<?php endif ?> 
		
		<script type="module" src="scripts/main.js"></script>
	</head>

	<body>
		<div class=titlebar>
			<div class=menu-button>
				<button type="button" class=menu>
					<img src="asset/images/icons/menu3_icon.svg">
				</button>
			</div>			
			<div id=title>
				<h1>Coffee Notes</h1>
			</div>
			<div id="logoutbtndiv">
				<form action="#">
					<button type="button" id="logoutbtn">
						<img src="asset/images/icons/logouticon.svg">
					</button>
				</form>
			</div>
		</div>
		<div id=menu-modal class=modal>
			<div class=modal-content>
				<span class=close>&times;</span>
				<li><a href="index.php">Home</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="signup.php">Sign up</a></li>
				<li><a href="notes.php">My notes</a></li>
				<li><a href="#">About</a></li>
			</div>
		</div>
        
	</body>

</html>
