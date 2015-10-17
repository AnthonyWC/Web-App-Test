<?php 
session_start();
            
// Remove all session data from the global array
$_SESSION = array();

// remove the cookie, by setting the expiration into the past
// session_get_cookie_params — Get the session cookie parameters; returns an array
$cookie_params = session_get_cookie_params();
setcookie(session_name(), "", time() - 42000, $cookie_params['path'], $cookie_params['domain'], $cookie_params['secure'], $cookie_params['httponly']);

// finally destroy the session
session_destroy();

header("location: ../html/index.html");
?>