<?php
/**
 * Show equipment details
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
//getting RPRecordID from url
$RPRecordID = $_GET['RPRecordID'];

//selecting data associated with this particular RPRecordID
$result = mysqli_query($mysqli, "SELECT * FROM rental_pool_registration_records WHERE RPRecordID=$RPRecordID");

while($res = mysqli_fetch_array($result))
{
    $Principal= $res['Principal'];
    $Model = $res['Model'];
    $serial_number = $res['SERIAL NUMBER'];
}
?>
<html>
<head>  
    <title><?php echo $RPRecordID ?></title>
</head>

<body>
    <a href="Dashboard.php">Dashboard</a>
    <br/><br/>
        <table border="0">
            <tr> 
                <td>Principal</td>
                <td><input type="text" name="principal" value="<?php echo $Principal;?>"></td>
            </tr>
            <tr> 
                <td>Model</td>
                <td><input type="text" name="model" value="<?php echo $Model;?>"></td>
            </tr>
            <tr> 
                <td>Serial Number</td>
                <td><input type="text" name="serial_number" value="<?php echo $serial_number;?>"></td>
            </tr>
            
        </table>
        
        <a href="all_equipment.php">Back</a>
    </form>
</body>
</html>
