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
        $uid = $_SESSION['id'];
        $gettitlestmt = "SELECT title FROM notes WHERE parentid = :parentid";

        $data = [
            'parentid' => $uid['id']
        ];

        $prepstmt = $conn->prepare($gettitlestmt);
        $prepstmt->execute($data);
        $retrievetitle = $prepstmt->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        echo "Failed getting notes";
    }

?>