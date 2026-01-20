<?php
    include "credentials.php";
    $dbuser = $dbusername;
    $password = $dbuserpass;

    /*Create PDO object and instantiate connection to database*/
    try {
        $conn = new PDO("mysql:host=webapp-database-1;dbname=myapp", $dbuser, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Success";

    } catch (PDOException $e) {
        echo "Failed to connect: " . $e;
    }

    /*Create prepared statement, query server to check email and password*/
    $useremail = $_POST['email'];
    $userpass = $_POST['password'];

    verifyEmailPassword($conn, $useremail, $userpass);

    /* Function which queries MySQL server for username and password */
    function verifyEmailPassword($conn, $email, $pass){
        $sqlcheck = "SELECT name FROM user
        WHERE email = :email AND password_hash = :pass;";

        $hashed_pass = password_verify($pass, PASSWORD_DEFAULT);
        $stmt = $conn->prepare($sqlcheck);

        $data = [
            'email' => $email,
            'pass' => $hashed_pass
        ];

        $result = $stmt->execute($data);
        echo $result;
        
    }

?>