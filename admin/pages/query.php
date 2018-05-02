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
    <title>Query</title>
</head>

<body>
<h1>Query</h1>

       <div id="query"> <!-- Dashboard -->
        <!-- <h2>Dashboard</h2> -->
        <ul>
<!--
            <li><a href="/vendor/phpgrid/rental_pool.php">Rental Pool Database</a></li>
            <li><a href="./registration_records.php">Registration Records</a></li>
            <li><a href="./repair_status.php">Repair</a></li>
-->
            <li>Is the equipment <a href="status_ready.php">available and ready</a>  for hire?</li>
            <li>Has the <a href="recorded_by_joel.php">engineer</a> tested equipment in the recently assigned job?</li>
            <li>What happened to these equipment with <a href="status_unknown.php">Unknown</a> status?</li>
            <li>Give me a <a href="status_repair.php">complete list of equipment under repair</a>.</li>
            <li>I want to search or edit a <a href="http://salt-ews-mis.000webhostapp.com/vendor/phpgrid/registration_records.php">Registration Record</a>.</li>
            <li>Show me <a href="http://salt-ews-mis.000webhostapp.com/vendor/phpgrid/rental_pool.php">all the Rental Pool assets</a>.</li>
            <li>I want to know how may equipment are currently hired. Summarize <a href="pie_equipment_status.php">Equipment Status</a>.</li>
            <li>Count the number of <a href="pie_principal.php">equipment by principal</a>.</li>
            
            
            
            
            
            
            
            
        </ul>
      </div> <!-- Dashboard -->
      
</body>
</html>

<?php include('../../includes/footer.php'); ?>
