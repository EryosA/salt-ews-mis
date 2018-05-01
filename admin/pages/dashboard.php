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
        <h4>Rental Pool Database</h4>
        <ul>
        	<li><a href="/vendor/phpgrid/registration_records.php">Registration Records</a></li>
            <li><a href="/vendor/phpgrid/rental_pool.php">Equipment List</a></li>
            <li><a href="/vendor/phpgrid/status_history.php">Status History</a></li>
        </ul>
        </div><!-- Database -->

        <!-- Registration records by Engineer -->
        <h4>Registration Records by Engineer</h4>
        <ul> 
        	<li><a href="recorded_by_chan.php">KC Chan</a></li>
        	<li><a href="recorded_by_anoop.php">Anoop</a></li>
        	<li><a href="recorded_by_joel.php">Joel</a></li>
        	<li><a href="recorded_by_arun.php">Arun</a></li>
        	<li><a href="recorded_by_saneesh.php">Saneesh</a></li>
        	<li><a href="recorded_by_primo.php">Primo</a></li>
        	<li><a href="recorded_by_ramdan.php">Ramdan</a></li>
        	<li><a href="recorded_by_chen.php">Chen</a></li>
        	<li><a href="recorded_by_wang.php">Wang</a></li>
            
        </ul>
        </div><!-- Registration records by Engineer -->
        
        <!-- Database -->
        <h4>Equipment List by Status</h4>
        <ul>
        	<li><a href="status_ready.php">Ready for Hire</a></li>
        	<li><a href="status_repair.php">Under Repair</a></li>
        	<li><a href="status_out.php">Rented Out</a></li>
        	<li><a href="status_in.php">Returned but Untested</a></li>
            
        </ul>
        </div><!-- Database -->

      </div> <!-- Dashboard -->

</body>
</html>
