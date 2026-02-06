<?php 
    // Initiate a session to establish connection between browser and server, populating the session variables. 
    session_start();

    // Set all $_SESSION for the duration of this script to empty
    $_SESSION = [];

    // Delete the session cookie from our browser, setting time to -42000 will make browser delete it. 
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'], 
            $params['secure'], $params['httponly'],
        );    
    }
    
    // Destroy use session, removes session file from the server 
    session_destroy();

    // Perform a redirect using header, calling exit after to terminate the script so nothing else happens.
    header("Location: /index.php");
    exit();

?>