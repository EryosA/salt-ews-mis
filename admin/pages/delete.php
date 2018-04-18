<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$RPRecordID = $_GET['RPRecordID'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM rental_pool_registration_records WHERE RPRecordID=$RPRecordID");

//redirecting to the display page (index.php in our case)
header("Location:dashboard.php");
?>

