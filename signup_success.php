<?php

/**
 * Signup success page
 */

// Initialisation
require_once('includes/init.php');

// Set the title, show the page header, then the rest of the HTML
$page_title = 'Sign Up';
include('includes/header.php');

?>

<h1>Sign Up</h1>

<div class="alert alert-success">
    <p>Success! Thank you for signing up. We sent you an email to activate your account.</p>
</div>


<div class="alert alert-danger">
    <p>If you couldn't find it in your inbox, please check your SPAM folder.</p>
</div>


<?php include('includes/footer.php'); ?>
