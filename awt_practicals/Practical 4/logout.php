<?php
// Start the session
session_start();

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header("Location:form.html")
?>
