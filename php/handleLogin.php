<?php

   /*
   session_start() creates a session or resumes the current one based on 
   a session identifier passed via a GET or POST request, or passed via 
   a cookie. 
   */
   
   session_start();
   
   // Change to POST request
   // Note: $_REQUEST is a global associate array contending GET/POST/cookie
   
   //$user = strtolower($_REQUEST['username']);
   //$password = strtolower($_REQUEST['password']);
   
   $user = strtolower($_POST['username']);
   $password = strtolower($_POST['password']);
   
   /* unset() calls  remove the session variables in case they already exist.
   This is useful where one user tries to log in after another user has left
   */
   
   unset($_SESSION['authd']);
   unset($_SESSION['role']);
   unset($_SESSION['user']);
   
   /* PHP uses a pseudo-random value in a cookie (PHPSESSID). More secure than
   storing session data directly in cookie; harder to guess a different session
   ID.
   */
   
   if(($user == "admin") && ($password == "password")) {
      $_SESSION["authd"] = true;
      $_SESSION["role"] = "admin";
      $_SESSION["user"] = "admin";

   // cookie turns out to be insecure; use session instead      
   /* 
      setcookie("authd", "true", time() + 3600 * 24 * 7, "/");
      setcookie("role", "admin", time() + 3600 * 24 * 7, "/");
      setcookie("user", "admin", time() + 3600 * 24 * 7, "/");
   */   
      header("location: admin.php");
      
   } else if(($user == "test") && ($password == "test")) {
      $_SESSION["authd"] = true;
      $_SESSION["role"] = "admin";
      $_SESSION["user"] = "admin";
      
   /*   
      setcookie("authd", "true", time() + 3600 * 24 * 7, "/");
      setcookie("role", "user", time() + 3600 * 24 * 7, "/");
      setcookie("user", "test", time() + 3600 * 24 * 7, "/");
   */      
      header("location: welcome.php");
   } else {
      header("location: ../html/index.html?errorMessage=Invalid Login");
   }
?>