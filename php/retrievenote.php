<?php 
    // File to fetch contents and pass on to readnote.php
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
        $retrievestmt = "SELECT title, content FROM notes WHERE note_id = :id";
        $note = $_GET['id'];
        $data = [
            'id' => $note
        ];
        $preparedstmt = $conn->prepare($retrievestmt);
        $preparedstmt->execute($data);
        $notecontents = $preparedstmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "failed"; // Fix all these with friendly error page through entire site.
    }
?>