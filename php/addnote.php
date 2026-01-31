<?php
    ob_start();
    include 'credentials.php';
    $dbuser = $dbusername;
    $password = $dbuserpass;

    try {
        $conn = new PDO("mysql:host=webapp-database-1;dbname=myapp", $dbuser, $password );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e;
    }

    try {
        $title = $_POST['notetitle'];
        $note = $_POST['note'];
        echo $title . " " . $note;
    } catch (PDOException $e) {
        echo "Failed retrieving note";
    }
?>