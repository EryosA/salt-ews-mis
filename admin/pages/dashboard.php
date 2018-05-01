<?php

/**
 * List all rental pool equipment
 */

// Initialisation
require_once('../../includes/init.php');


// Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

// Require the user to be an administrator before they can see this page.
Auth::getInstance()->requireAdmin();


// // Get the paginated data
// $data = User::paginate(isset($_GET['page']) ? $_GET['page'] : 1);


// Show the page header, then the rest of the HTML
include('../../includes/header.php');

//including the database connection file
include_once("config.php");

?>

<html>
<head>  
    <title>Dashboard</title>
</head>

<body>


<h1>Dashboard</h1>

       <div id="dashboard"> <!-- Dashboard -->
        <!-- <h2>Dashboard</h2> -->
        <div>
        <!-- Database -->
        <h4>Database</h4>
        <ul> 
        	<li><a href="/vendor/phpgrid/registration_records.php">Registration Records</a></li>
            <li><a href="/vendor/phpgrid/rental_pool.php">Equipment List</a></li>
            <li><a href="/vendor/phpgrid/status_history.php">Status History</a></li>
        </ul>
        </div><!-- Database -->
        
        <!-- Registration records by Engineer -->
        <h4>Registration Records by Engineer</h4>
        <ul> 
        	<li><a href="/vendor/phpgrid/registration_records.php">Joel</a></li>
            <li><a href="/vendor/phpgrid/rental_pool.php">Arun</a></li>
            <li><a href="/vendor/phpgrid/status_history.php">Saneesh</a></li>
        </ul>
        </div><!-- Registration records by Engineer -->
        
      </div> <!-- Dashboard -->
      
</body>
</html>
