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

?>

<?php
//including the database connection file
include_once("config.php");

//include_once("paginate.php");


//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated

//List all equipment
$result = mysqli_query($mysqli, "SELECT * FROM `rental_pool_registration_records` ORDER BY `DateTime` DESC "); // using mysqli_query instead
?>

<html>
<head>	
	<title>All Registration Records</title>
</head>

<body>
<!-- <a href="add.html">Add New Equipment</a><br/><br/> -->

<h1>All Registration Records</h1>

	<table class="table table-hover table-striped" width='80%' border=0>
    
	<tr bgcolor='#CCCCCC'>
		<!-- <td>RPRecordID</td> -->
        <td>Date Time</td>
		<td>Principal</td>
		<td>Serial Number</td>
		<td>Rental Pool ID</td>
		<td>Status</td>
		<td>Location</td>
		<!-- <td>Updater</td>
		<td>Remark</td> -->
		<!-- <td>Test Report</td> -->
		<!-- <td>Conformance Cert</td> -->
		<td>Action</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		//echo "<td>".$res['RPRecordID']."</td>";
		echo "<td>".$res['DateTime']."</td>";
		echo "<td>".$res['Principal']."</td>";
        echo "<td>".$res['SERIAL NUMBER']."</td>";
        echo "<td>".$res['RentalPoolID']."</td>";
        echo "<td>".$res['Status']."</td>";
        echo "<td>".$res['Location']."</td>";
        //echo "<td>".$res['Updater']."</td>";
        //echo "<td>".$res['Remark']."</td>";
        // echo "<td>".$res['TRLink']."</td>";	
        // echo "<td>".$res['CERTLink']."</td>"; 
		echo "<td><a href=\"edit.php?RPRecordID=$res[RPRecordID]\">Edit</a> | <a href=\"delete.php?RPRecordID=$res[RPRecordID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
