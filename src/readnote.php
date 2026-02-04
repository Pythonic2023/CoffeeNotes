<?php 
    session_start();
    require '../php/retrievenote.php';

?>


<main>
    <?php echo $notecontents['content']; ?>
</main>