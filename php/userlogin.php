<?php
    include "credentials.php";
    $dbuser = $dbusername;
    $password = $dbuserpass;
    /*Create PDO object and instantiate connection to database*/

    try {
        $conn = new PDO("mysql:host=webapp-database-1;dbname=myapp", $dbuser, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Failed to connect: " . $e;
    }
    
?>