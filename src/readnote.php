<?php 
    session_start();
    
    require '../php/retrievenote.php';
    $pageCss = 'readnote.css';
    include 'base.php';

?>


<main>
    <div id="note-content">
        <div class="note"> <?php echo $notecontents['title']; ?> </div>
        <div class="note"> <?php echo $notecontents['content']; ?> </div>
    </div>
</main>