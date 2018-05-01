<?php

/**
 * Admin dashboard - list MIS features
 */

// Initialisation
require_once('../../includes/init.php');


// Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

// Require the user to be an administrator before they can see this page.
Auth::getInstance()->requireAdmin();


// Show the page header, then the rest of the HTML
include('../../includes/header.php');

?>

<html>
<head>  
    <title>Dashboard</title>
</head>

<body>
<h1>Dashboard</h1>

       <div id="dashboard"> <!-- Dashboard -->
        <!-- <h2>Dashboard</h2> -->
        <ul>
            <li><a href="/vendor/phpgrid/rental_pool.php">Rental Pool Database</a></li>
            <li><a href="./registration_records.php">Registration Records</a></li>
            <li><a href="./repair_status.php">Repair</a></li>
          <!-- <li><a href="./list_all_repair.php">All Repair</a></li> -->
        </ul>
      </div> <!-- Dashboard -->
      
</body>
</html>

<?php include('../../includes/footer.php'); ?>
