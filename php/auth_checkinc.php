<?php
//error_reporting(FALSE);
    session_start();
// $_COOKIE is an array for cookie variable
// 1st check if a cookie named authd exists; if not redirect to login page
// If exist, check if it is boolean and set to true
// Call exit to escape (infinite loop)


// Domain cookie authentication method is insecure
/*  $authd = filter_var($_COOKIE['authd'], FILTER_VALIDATE_BOOLEAN);
  if(!isset($_COOKIE['authd']) || (is_bool($authd) === false) || !$authd) {
*/  
  
// isset() BOOL - Determine if a variable is set & is !NULL (Returns TRUE) 
// If value is FALSE, redirect

    if(!isset($_SESSION['authd']) || !$_SESSION['authd']) {
        header("location: ../html/index.html");
        exit;
    }   
?>