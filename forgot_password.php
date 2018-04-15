<?php

/**
 * Forgotten password form
 */

// Initialisation
require_once('includes/init.php');

// Require the user to NOT be logged in before they can see this page.
Auth::getInstance()->requireGuest();

// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  Auth::getInstance()->sendPasswordReset($_POST['email']);
  $message_sent = true;
}


// Set the title, show the page header, then the rest of the HTML
$page_title = 'Forgotten password';
include('includes/header.php');

?>

<h1>Forgotten password</h1>

<?php if (isset($message_sent)): ?>
  <p>If we found an account with that email address, we have sent password reset instructions to it. Please check your email.</p>

<?php else: ?>

  <form method="post" class="form-horizontal">
    <div class="form-group">
      <label for="email" class="control-label col-sm-2">Email address</label>
      <div class="col-sm-10">
        <input id="email" class="form-control" name="email" type="email" required="required" autofocus="autofocus" />
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary">Send password reset instructions</button>
      </div>
    </div>
  </form>
  
<?php endif; ?>

<?php include('includes/footer.php'); ?>
