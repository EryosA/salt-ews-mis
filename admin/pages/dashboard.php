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

    <div id="dashboard" class="row"> <!-- Dashboard -->
        <!-- <h2>Dashboard</h2> -->
        
        <!-- Database -->
        <div class="col-sm-3">
        <h5>Rental Pool Database</h5>
        <ul>
        	<li><a href="http://salt-ews-mis.000webhostapp.com/vendor/phpgrid/registration_records.php">Registration Records</a></li>
            <li><a href="http://salt-ews-mis.000webhostapp.com/vendor/phpgrid/rental_pool.php">Equipment List</a></li>
            <li><a href="http://salt-ews-mis.000webhostapp.com/vendor/phpgrid/status_history.php">Status History</a></li>
        </ul>
        </div><!-- Database -->

        <!-- Registration records by Engineer -->
         <div class="col-sm-3">
        <h5>Registration Records by Engineer</h5>
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

        <!-- Status -->
        <div class="col-sm-3">
        <h5>Equipment List by Status</h5>
        <ul>
        	<li><a href="status_ready.php">Ready for Hire</a></li>
        	<li><a href="status_repair.php">Under Repair</a></li>
        	<li><a href="status_out.php">Rented Out</a></li>
        	<li><a href="status_in.php">Returned & Untested</a></li>
			<li><a href="status_unknown.php">Unknown</a></li>
        </ul>
        </div><!-- Status -->
        
        <!-- Data Visualizations -->
         <div class="col-sm-3">
        <h5>Data Visualizations</h5>
        <ul>
        	<li><a href="pie_equipment_status.php">3D Pie Chart - Equipment Status</a></li>
        	<li><a href="bar_engineer.php">Bar Chart - Engineer Registration</a></li>
        	<li><a href="pie_principal.php">Pie Chart - Equipment Count by Principal</a></li>
        </ul>
        </div><!-- Data Visualizations -->

      </div> <!-- Dashboard -->

</body>
</html>
