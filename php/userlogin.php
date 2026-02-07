<?php
    ob_start();
    session_start();
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

    /*Create prepared statement, query server to check email and password*/
    $useremail = $_POST['email'];
    $userpass = $_POST['password'];

    verifyEmailPassword($conn, $useremail, $userpass);

    /* Function which queries MySQL server for username and password */
    function verifyEmailPassword($conn, $email, $pass){

        $data = [
            'email' => $email
        ];
        // Select the name column from user table whose email is $email
        $sqlcheck = "SELECT name, email FROM user
        WHERE email = :email";

        $stmt = $conn->prepare($sqlcheck);
        $stmt->execute($data);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // If user is returned run the following
        if ($user){
            // Select password_hash column from user table where the email is $email after finding the user in above code if user exists under the email
            $retrievehash = "SELECT password_hash FROM user WHERE email = :email";
            $stmt = $conn->prepare($retrievehash);
            $stmt->execute($data);
            $hash = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashcheck = password_verify($pass, $hash['password_hash']);

            if ($hashcheck) {
                session_regenerate_id(true);
                $retrieveid = "SELECT id FROM user WHERE email = :email";
                $stmt = $conn->prepare($retrieveid);
                $stmt->execute($data);
                $id = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id'] = $id;
                $_SESSION['user'] = $user;
                header("Location: http://127.0.0.1:8080/index.php");
            }
            else {
                $_SESSION['invalid_password'] = "Invalid password";
                header("Location: http://127.0.0.1:8080/login.php");
            }
        }
        // If user is not returned then print invalid email
        else {
            $_SESSION['invalid_email'] = "Invalid email";
            header("Location: http://127.0.0.1:8080/login.php");
        }
        
    }

?>