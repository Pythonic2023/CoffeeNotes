<?php
    session_start();
    ob_start();
?>

<script src="scripts/predicttext.js" defer></script>
<script>
    console.log('Loaded script');
</script>

<?php 
    $script = ob_get_clean();
?>

<?php
    $pageCss = "notes.css";
    include 'base.php';
    require_once '../php/functions.php';
    require '../php/getnotes.php';

    if (isset($_SESSION['user'])) {
        // Array destructering, retrieves the values from keys and stores them in $vars
        ['name' => $username, 'email' => $email] = $_SESSION['user'];
    }

    // If session ID is empty then redirect to login page and ask user to log in.
	if (empty($_SESSION['id'])) {
		header("Location: /login.php");
		$_SESSION['loginrequired'] = "Please login to see your notes";
    }
?>

<main>
    
    <div class="titlecontainer">
        <?php if (isset($_SESSION['user'])): ?> 
            <h2>Saved notes</h2>
            <?php foreach ($retrievetitle as $row): ?>
                <a href="/readnote.php?id=<?php echo $row['note_id'] ?>"> 
                <p class="note-titles">
                    <?php echo convertstring($row['title']); ?>
                </p>
                </a>
            <?php endforeach; ?>
        <?php endif ?>
    </div>
    <form action="/php/addnote.php" method="POST">
    <div class="notecontainer">
        <div>
            <label id="notetitlelabel" for="notetitle">Title</label>
        </div>
        <div>
            <input type="text" id="notetitle" name="notetitle" placeholder="Give me a title!" required>
        </div>
        <div id="notetextdiv">
            <label id="notetextlabel" for="notetext">Note</label>
        </div>
        <div class="container">
            <div>
                <textarea rows="30" cols="80" id="notetext" name="note" placeholder="Give me a note!" required></textarea>
            </div>
            <div>
                <textarea rows="30" cols="80" id="shadowtext"></textarea>
            </div>
        </div>
        <div>
            <button type="submit" id="addnote">
                <img src="asset/images/icons/done_outline.svg">
            </button>
        </div>
    </div>
    </form>
</main>