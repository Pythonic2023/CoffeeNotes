<?php 
    require_once 'userlogin.php';
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
        $username = "{$_POST['firstname']} {$_POST['lastname']}";
        $email = $_POST['email'];
        $hashedpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
        $sql = "INSERT INTO user (name, email, password_hash) VALUES (:name, :email, :password)";
        $stmt = $conn->prepare($sql);

        $data = [
            'name' => $username,
            'email' => $email,
            'password' => $hashedpassword
        ];

        $stmt->execute($data); 
    } catch (PDOException $e) {
        echo "Failed to submit data" . $e;
    }

    $password = $_POST['password'];
    verifyEmailPassword($conn, $email, $password);

?>