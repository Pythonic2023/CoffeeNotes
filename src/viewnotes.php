<?php 
    session_start();

    $pageCss = 'viewnotes.css';
    include 'base.php';

    if (empty($_SESSION['id'])){
        header("Location: http://127.0.0.1:8080/login.php");
        $_SESSION['loginrequired'] = "Please login to see your notes";
    }
?>

<main>
    <h1>Hello world</h1>
</main>