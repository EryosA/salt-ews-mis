<?php
/**
 * Edit an equipment record
 */

// Initialisation
require_once('../../includes/init.php');


// Require the user to be logged in before they can see this page.
Auth::getInstance()->requireLogin();

// Require the user to be an administrator before they can see this page.
Auth::getInstance()->requireAdmin();

// Show the page header, then the rest of the HTML
include('../../includes/header.php');

// including the database connection file
include_once("config.php");
 ?>
 
<?php
//Update
if(isset($_POST['update']))
{	

	$RPRecordID = mysqli_real_escape_string($mysqli, $_POST['RPRecordID']);
	
	$principal = mysqli_real_escape_string($mysqli, $_POST['Principal']);
	$model = mysqli_real_escape_string($mysqli, $_POST['Model']);
	$serial_number = mysqli_real_escape_string($mysqli, $_POST['SERIAL NUMBER']);	
	
	// checking empty fields
	if(empty($principal) || empty($model) || empty($serial_number)) {	
			
		if(empty($principal)) {
			echo "<font color='red'>Principal field is empty.</font><br/>";
		}
		
		if(empty($model)) {
			echo "<font color='red'>Model field is empty.</font><br/>";
		}
		
		if(empty($serial_number)) {
			echo "<font color='red'>Serial Number field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE rental_pool_registration_records SET Principal='$principal',Model='$model',serial_number='$SERIAL NUMBER' WHERE RPRecordID='$RPRecordID'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: dashboard.php");
	}
}
?>

<?php
//getting RPRecordID from url
$RPRecordID = $_GET['RPRecordID'];

//selecting data associated with this particular RPRecordID
$result = mysqli_query($mysqli, "SELECT * FROM rental_pool_registration_records WHERE RPRecordID=$RPRecordID");

while($res = mysqli_fetch_array($result))
{
	$principal= $res['Principal'];
	$model = $res['Model'];
	$serial_number = $res['SERIAL NUMBER'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="dashboard.php">Dashboard</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Principal</td>
				<td><input type="text" name="principal" value="<?php echo $principal;?>"></td>
			</tr>
			<tr> 
				<td>Model</td>
				<td><input type="text" name="model" value="<?php echo $model;?>"></td>
			</tr>
			<tr> 
				<td>Serial Number</td>
				<td><input type="text" name="serial_number" value="<?php echo $serial_number;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="RPRecordID" value=<?php echo $_GET['RPRecordID'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
