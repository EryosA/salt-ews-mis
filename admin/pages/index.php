<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM `rental_pool_registration_records` WHERE `Status` = 'Repair' ORDER BY `Principal` ASC "); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Updater</td>
<!--		<td>Age</td>-->
		<td>DateTime</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['Updater']."</td>";
//		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['DateTime']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[Updater]\">Edit</a> | <a href=\"delete.php?id=$res[Updater]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
