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
    <form action="/php/addnote.php" method="POST">
    <div class="notecontainer">
        <div>
            <label id="notetitlelabel" for="notetitle">Title</label>
        </div>
        <div>
            <input type="text" id="notetitle" name="notetitle" placeholder="Give me a title!" required>
        </div>
        <div id="notetextdiv">
            <label id="notetextlabel" for="notetext">Your note</label>
        </div>
        <div>
            <textarea rows="30" cols="80" id="notetext" placeholder="Give me a note!" name="note" require="required"></textarea>
        </div>
        <div>
            <button type="submit" id="addnote">
                <img src="asset/images/icons/done_outline.svg">
            </button>
        </div>
    </div>
    </form>
</main>