<?php 
    session_start();
    $pageCss = 'viewnotes.css';
    include 'base.php';
    require '../php/getnotes.php';

    if (empty($_SESSION['id'])){
        header("Location: http://127.0.0.1:8080/login.php");
        $_SESSION['loginrequired'] = "Please login to see your notes";
    }
?>

<main>
    <div class="titlecontainer">
    <?php foreach ($retrievetitle as $row): ?>
        <p class="note-titles">
            <?php echo $row['title']; ?>
        </p>
    <?php endforeach; ?>
    </div>
</main>