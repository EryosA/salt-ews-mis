<?php

/**
 * List all repair jobs
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

<?php
//including the database connection file
include_once("config.php");




//List all equipment that are ready for hire
$result = mysqli_query($mysqli, "SELECT * FROM `rental_pool_status_history` WHERE `STATUS` LIKE 'Ready' ORDER BY `DateTime` DESC "); // using mysqli_query instead
?>

<html>
<head>	
	<title>Ready</title>
</head>

<body>
	<div><h3>Ready for Hire</h3></div>
	
	<table class="table table-striped" width='80%' border=0>

	<thead>
    	<tr bgcolor='#CCCCCC'>
    <!-- 		<td>RPRecordID</td> -->
            <th>DateTime</th>
            <th>Principal</th>
            <th>Model</th>
            <th>Description</th>
            <th>Serial Number</th>
            <th>Rental Pool ID</th>
            <th>Status</th>
            <th>Comments</th>
  			<th>Location</th>
		</tr>
	</thead>
	
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
//         echo "<td>".$res['RPRecordID']."</td>";
        echo "<td>".$res['DateTime']."</td>";
        echo "<td>".$res['Principal']."</td>";
        echo "<td>".$res['Model']."</td>";
        echo "<td>".$res['Description']."</td>";
        echo "<td>".$res['SERIAL NUMBER']."</td>";
        echo "<td>".$res['RentalPoolID']."</td>";
        echo "<td>".$res['STATUS']."</td>";
        echo "<td>".$res['COMMENTS']."</td>";
        echo "<td>".$res['Location']."</td>";	
	}
	?>
	</table>
</body>
</html>
