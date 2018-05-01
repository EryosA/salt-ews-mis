<?php

// Initialisation
require_once('../../includes/init.php');


// Require the user to be logged in before they can see this page.
//Auth::getInstance()->requireLogin();

// Require the user to be an administrator before they can see this page.
//Auth::getInstance()->requireAdmin();

// Show the page header, then the rest of the HTML
include('../../includes/header.php');

//including the database connection file
include_once("config.php");

?>

<?php


// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

// $string = file_get_contents("sampleData.json");
// echo $string;

// Instead you can query your database and parse into JSON etc etc
$result = mysqli_query($mysqli, "SELECT * FROM `rental_pool_status_history` ORDER BY `STATUS` DESC ");
$json_array = array();

while ($row = mysqli_fetch_assoc($result)){
    $json_array[] = $row;  
}
//echo json_encode($json_array);
$string = file_get_contents($json_array);
echo $string;
?>