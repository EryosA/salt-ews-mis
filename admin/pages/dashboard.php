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
        <ul>
          <li><a href="./all_equipment.php">All Equipment</a></li>
          <!-- <li><a href="./list_all_repair.php">All Repair</a></li> -->
        </ul>
      </div> <!-- Dashboard -->
      
</body>
</html>
