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
    	
    	<div class="container-fluid">
    	 <!-- Brand -->
        <a class="navbar-brand" href="/index.php"><img src="/images/SALT_Logo.png" alt="Logo" style="width:150px;"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    		<span class="navbar-toggler-icon"></span>
 		 </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">

                <?php if (Auth::getInstance()->isLoggedIn()): ?>

                <?php if (Auth::getInstance()->isAdmin()): ?>
                <li><a href="/admin/pages/dashboard.php" style="padding-right: 10px;padding-left: 10px;">Dashboard</a></li>
                <li><a href="/admin/pages/query.php" style="padding-right: 10px;padding-left: 10px;">Query</a></li>
                <li><a href="/admin/users" style="padding-left: 10px;padding-right: 10px;">Users</a></li>

                <?php endif; ?>
                <li><a href="/profile.php" style="padding-left: 10px;padding-right: 10px;">Profile</a></li>
                <li><a href="/logout.php" style="padding-left: 10px;padding-right: 10px;">Logout</a></li>

                <?php else: ?>

                <li><a href="/login.php">Login</a></li>

                <?php endif; ?>

            </ul>
        </div>
    	
    	</div>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                
            </ul>
        </div>
    	
       
    </nav>


    <div id="content">
