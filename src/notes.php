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
            <label id="notetitlelabel" for="notetitle">Title</label>
        </div>
        <div>
            <input type="text"  id="notetitle" name="notetitle" placeholder="Give me a title!">
        </div>
        <div id="notetextdiv">
            <label id="notetextlabel" for="notetext">Your note</label>
        </div>
        <div>
            <textarea rows="30" cols="80" id="notetext" placeholder="Give me a note!"></textarea>
        </div>
        <div>
            <button type="button" id="addnote">
                <img src="asset/images/icons/done_outline.svg">
            </button>
        </div>
    </div>
</main>