<?php

/**
 * Log in a user
 */

// Initialisation
require_once('includes/init.php');

// Require the user to NOT be logged in before they can see this page.
Auth::getInstance()->requireGuest();

// Get checked status of the "remember me" checkbox
$remember_me = isset($_POST['remember_me']);


// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = $_POST['email'];

  if (Auth::getInstance()->login($email, $_POST['password'], $remember_me)) {

    // Redirect to home page or intended page, if set
    if (isset($_SESSION['return_to'])) {
      $url = $_SESSION['return_to'];
      unset($_SESSION['return_to']);
    } else {
        $url = '/index.php';
    }
      
    Util::redirect($url);
  }
    
    // Check if the attempts are greater than 3
      if ($_SESSION['attempts'] > 2){
          header('location: account_locked.php');
          
      } else {
          // Increment the session variable
          $_SESSION['attempts'] = $_SESSION['attempts'] + 1;
          //header('location: index.php');
      }

}


// Set the title, show the page header, then the rest of the HTML
$page_title = 'Login';
include('includes/header.php');

?>

<h1>Login</h1>

<?php if (isset($email)): ?>
  <div class="alert alert-warning">Invalid login</div>
<?php endif; ?>

<form method="post" class="form-horizontal">
  
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" type="email" class="form-control" autofocus="autofocus" required="required" />
      </div>
    </div>

  <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" name="password" required="required" />
      </div>
    </div>

  <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label for="remember_me">
            <input id="remember_me" name="remember_me" type="checkbox" value="1"
               <?php if ($remember_me): ?>checked="checked"<?php endif; ?>/> Remember me
        </label>
        </div>
      </div>
    </div>  

<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="forgot_password.php">Forgot password?</a>
      </div>
    </div>
</form>

<?php include('includes/footer.php'); ?>
