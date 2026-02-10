<?php

    session_start();
    $pageCss = 'about.css';
    include 'base.php';

?>

<main>
    <div class="aboutgrid">
        <div id="about">
            <h1>About</h1>
        </div>
        <div id="abouttext">
            <p>Welcome to Coffee Notes.</p>
            <p>This is a project by pythonic. My aim is to create an easy to use website, while learning PHP, HTML etc.</p>
            <p>This site runs by implenting docker using three containers. These three containers run nginx, php and a database using MySQL</p>
            <p>One of the features I aim to implement is predicted text</p>
            <p>One of the priorities will be keeping the site secure and safe for our users.</p>
            <p>As I delve deeper into developing, I will add more features. Community suggestions will be listened to.</p>
            <p>So please, log in and start your note taking! Don't forget your coffee.</p>
        </div>
    </div>
</main>