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


// // Get the paginated data
// $data = User::paginate(isset($_GET['page']) ? $_GET['page'] : 1);


// Show the page header, then the rest of the HTML
include('../../includes/header.php');

?>

<?php
//including the database connection file
include_once("config.php");


//List all repair jobs according to DESC DateTime
$result = mysqli_query($mysqli, "SELECT * FROM `rental_pool_registration_records` WHERE `Updater` LIKE 'Joel' ORDER BY `DateTime` DESC LIMIT 100 "); // using mysqli_query instead
?>

<html>
<head>	
	<title>Updated by Joel</title>
</head>

<body>
	<h3>Registered by Joel</h3>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
<!-- 		<td>RPRecordID</td> -->
        <td>DateTime</td>
        <td>Principal</td>
        <td>Serial Number</td>
        <td>Rental Pool ID</td>
        <td>Status</td>
        <td>Location</td>
<!--         <td>Updater</td> -->
        <td>Remark</td>     
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
//         echo "<td>".$res['RPRecordID']."</td>";
        echo "<td>".$res['DateTime']."</td>";
        echo "<td>".$res['Principal']."</td>";
        echo "<td>".$res['SERIAL NUMBER']."</td>";
        echo "<td>".$res['RentalPoolID']."</td>";
        echo "<td>".$res['Status']."</td>";
        echo "<td>".$res['Location']."</td>";
//         echo "<td>".$res['Updater']."</td>";
        echo "<td>".$res['Remark']."</td>";       				
	}
	?>
	</table>
</body>
</html>
