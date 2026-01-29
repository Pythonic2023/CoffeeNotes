<?php 
    session_start();

    $pageCss = "notes.css";
    include 'base.php';

    // Array destructering, retrieves the values from keys and stores them in $vars
    ['name' => $username, 'email' => $email] = $_SESSION['user'];

    // If session ID is empty then redirect to login page and ask user to log in.
	if (empty($_SESSION['id'])) {
		header("Location: http://127.0.0.1:8080/login.php");
		$_SESSION['loginrequired'] = "Please login to see your notes";
	}

?>

<main>
    <div class="notecontainer">
        <div>
            <label for="title">Title</label>
            <input type="text"  id="title" name="title">
        </div>
        <div>
            <label for="note">Note</label>
            <input type="text" id="note" name="note">
        </div>
    </div>
</main>