<?php
    ob_start();
    session_start();
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
        $email = $_SESSION['user']['email'];
        $sqpuid = "SELECT id FROM user WHERE email = :email";
        $data = [
            'email' => $email   
        ];
        $prepstmt = $conn->prepare($sqpuid);
        $prepstmt->execute($data);
        $fetchedid = $prepstmt->fetch(PDO::FETCH_ASSOC);
        if ($fetchedid) {
            $sqlinsertnote = "INSERT INTO notes (title, content, parentid) VALUES (:title, :note, :parentid)";
            $title = $_POST['notetitle'];
            $note = $_POST['note'];

            $data = [
                'title' => $title,
                'note' => $note,
                'parentid' => $fetchedid['id']
            ];

            $prepinsert = $conn->prepare($sqlinsertnote);
            $success = $prepinsert->execute($data);
            if ($success) {
                header("Location: /notes.php");
            }
        }
    } catch (PDOException $e) {
        echo $e;
    }
?>