<?php

/**
 * Reset password form
 */

// Initialisation
require_once('includes/init.php');

// Require the user to NOT be logged in before they can see this page.
Auth::getInstance()->requireGuest();


// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $user = User::findForPasswordReset($_POST['token']);

  if ($user !== null) {

    $user->password = $_POST['password'];
    $user->password_confirmation = $_POST['password_confirmation'];

    if ($user->resetPassword()) {

      // Redirect to success page
      Util::redirect('/reset_password_success.php');
    }
  }

} else {  // GET

  // Find the user based on the token
  if (isset($_GET['token'])) {
    $user = User::findForPasswordReset($_GET['token']);
  }
}


// Set the title, show the page header, then the rest of the HTML
$page_title = 'Reset password';
include('includes/header.php');

?>

<h1>Reset password</h1>

<?php if (isset($user)): ?>

  <?php if ( ! empty($user->errors)): ?>
    <ul>
      <?php foreach ($user->errors as $error): ?>
        <li><?php echo $error; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <form method="post" id="resetPasswordForm" class="form-horizontal">
    <input type="hidden" id="token" name="token" value="<?php echo $_GET['token']; ?>" />

    <div class="form-group">
      <label for="password" class="control-label col-sm-2">New password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" required="required" autofocus="autofocus" />
      </div>
    </div>

    <div class="form-group">
      <label for="password_confirmation" class="control-label col-sm-2">Confirm password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="required" />
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button class="btn btn-primary">Reset password</button>
      </div>
    </div>
  </form>

<?php else: ?>

  <p>Reset token not found or expired. Please <a href="forgot_password.php">try resetting your password again</a>.</p>
  
<?php endif; ?>

<?php include('includes/footer.php'); ?>
