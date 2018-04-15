<?php

/**
 * Sign up a new user
 */

// Initialisation
require_once('includes/init.php');

// Require the user to NOT be logged in before they can see this page.
Auth::getInstance()->requireGuest();

// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $user = User::signup($_POST);

  if (empty($user->errors)) {

    // Redirect to signup success page
    Util::redirect('/signup_success.php');
  }
}


// Set the title, show the page header, then the rest of the HTML
$page_title = 'Sign Up';
include('includes/header.php');

?>

<h1>Sign Up</h1>

<?php if (isset($user)): ?>
  <ul>
    <?php foreach ($user->errors as $error): ?>
      <li><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form method="post" id="signupForm" class="form-horizontal">
  
  <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input id="name" name="name" class="form-control" required="required" value="<?php echo isset($user) ? htmlspecialchars($user->name) : ''; ?>" autofocus="autofocus" />
      </div>
    </div>
  
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email</label>
      <div class="col-sm-10">
        <input id="email" name="email" class="form-control" required="required" type="email" value="<?php echo isset($user) ? htmlspecialchars($user->email) : ''; ?>" />
      </div>
    </div>

  <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password</label>
      <div class="col-sm-10">          
        <input type="password" id="password" name="password" class="form-control" required="required" pattern=".{5,}" placeholder="Minimum 5 characters" />
      </div>
    </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button class="btn btn-primary">Sign Up</button>
    </div>
  </div>
</form>

<?php include('includes/footer.php'); ?>
