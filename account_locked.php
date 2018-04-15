<?php

/**
 * Account locked page
 */

// Initialisation
require_once('includes/init.php');


// Set the title, show the page header, then the rest of the HTML
$page_title = 'Account locked';
include('includes/header.php');

?>
   
<h1>Account Locked</h1>

<div class="alert alert-danger"><p>You have exceeded the maximum number of login attempts!</p></div>

<p>Please <a href="forgot_password.php">reset your password</a>.</p>

<?php include('includes/footer.php'); ?>
