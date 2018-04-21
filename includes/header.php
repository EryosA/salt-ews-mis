<!DOCTYPE html>
<html>

<head>
    <title>
        <?php if (isset($page_title)): ?>
        <?php echo $page_title; ?> |
        <?php endif; ?>SALT MIS</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styles.css" />

</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="./"><img src="./images/SALT_logo.png" alt="Logo" style="width:150px;"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <?php if (Auth::getInstance()->isLoggedIn()): ?>
                
                <?php if (Auth::getInstance()->isAdmin()): ?>
                <li><a href="/admin/pages/dashboard.php">&nbsp;&nbsp;Dashboard</a></li>
                <li><a href="/admin/users">&nbsp;&nbsp;Users</a></li>
                
                <?php endif; ?>
                <li><a href="/profile.php">&nbsp;&nbsp;Profile</a></li>
                <li><a href="/logout.php">&nbsp;&nbsp;Logout</a></li>

                <?php else: ?>

                <li><a href="/login.php">Login</a></li>

                <?php endif; ?>

            </ul>
        </div>
    </nav>


    <div id="content">