<?php
    require_once("auth_checkinc.php"); // Make sure person is authenticated.

/* This submission metho was unsafe because it didn't check for the user role
   $submittedBy = $_SESSION['user'];
    if(isset($_POST['submittedBy']) && !empty($_POST['submittedBy'])) {
        $submittedBy = $_POST['submittedBy'];
    }
*/

/* Send user back to directoryForm.php unless the formValidated is set to true
*/
    if($_POST['formValidated'] != "true") {
        header("location: directoryForm.php");
        exit;
    }

// fopen() has 2 required arguments
    $list = fopen("list_entries.csv", "a"); // Open file we want to save to with append flag.

    $submittedBy = $_SESSION['user'];
    if(($_SESSION['role'] == "admin") && isset($_POST['submittedBy']) && !empty($_POST['submittedBy'])) {
    $submittedBy = $_POST['submittedBy'];
}
    
    // Create string we want to save. String should equal one line in the file
    
    
    /* fputs is an alias of:
    fwrite() - writes contents of string to file stream pointed to by handle.
    */
    /* $entry = $_POST['name'].",".$_POST['phNum'].",".$_POST['sex'].",".$_POST['comment']."\r\n"; 
    fputs($list, $entry); // Save the data to the file.
    */
    
  /*
  fputcsv() requires each element of CSV line be an element in an array. 
  Done so that each element can be escaped properly and then added to a single entry in CSV
  file. Entry created via fputcsv is different. E.G. All items are wrapped within double quotes
  and any double quote found inside of an item is doubled up ("").
  */
  
    fputcsv($list, array($_POST['name'], $_POST['phNum'], $_POST['sex'], $_POST['comment']
    , $submittedBy));
    
    fclose($list); // Close the file. 
    
    header("location: directory.php"); // Redirect the user.
?>