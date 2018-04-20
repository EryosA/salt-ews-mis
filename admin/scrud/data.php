<?php
// Database details
$db_server   = 'localhost';
$db_username = 'root';
$db_password = '';
//$db_name     = 'it_companies';
$db_name     = 'salt_db';

// Get job (and id)
$job = '';
$id  = '';
if (isset($_GET['job'])){
  $job = $_GET['job'];
  if ($job == 'get_rental_pool_registration_records' ||
      $job == 'get_rental_pool'   ||
      $job == 'add_rental_pool'   ||
      $job == 'edit_rental_pool'  ||
      $job == 'delete_rental_pool'){
    if (isset($_GET['id'])){
      $id = $_GET['id'];
      if (!is_numeric($id)){
        $id = '';
      }
    }
  } else {
    $job = '';
  }
}

// Prepare array
$mysql_data = array();

// Valid job found
if ($job != ''){
  
  // Connect to database
  $db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);
  if (mysqli_connect_errno()){
    $result  = 'error';
    $message = 'Failed to connect to database: ' . mysqli_connect_error();
    $job     = '';
  }
  
  // Execute job
  if ($job == 'get_rental_pool_registration_records'){
    
    // Get rental pool records
    $query = "SELECT * FROM 'rental_pool_registration_records' ORDER BY 'DateTime'";
    $query = mysqli_query($db_connection, $query);
    if (!$query){
      $result  = 'error';
      $message = 'query error';
    } else {
      $result  = 'success';
      $message = 'query success';
      while ($rental_pool = mysqli_fetch_array($query)){
        $functions  = '<div class="function_buttons"><ul>';
        $functions .= '<li class="function_edit"><a data-id="'   . $rental_pool['RPRecordID'] . '" data-name="' . $rental_pool['Model'] . '"><span>Edit</span></a></li>';
        $functions .= '<li class="function_delete"><a data-id="' . $rental_pool['RPRecordID'] . '" data-name="' . $rental_pool['Model'] . '"><span>Delete</span></a></li>';
        $functions .= '</ul></div>';
        $mysql_data[] = array(
//          "rank"          => $rental_pool['rank'],
          "Model"  => $rental_pool['Model'],
//          "industries"    => $rental_pool['industries'],
//          "revenue"       => '$ ' . $rental_pool['revenue'],
//          "fiscal_year"   => $rental_pool['fiscal_year'],
//          "employees"     => number_format($rental_pool['employees'], 0, '.', ','),
//          "market_cap"    => '$ ' . $rental_pool['market_cap'],
//          "headquarters"  => $rental_pool['headquarters'],
          "functions"     => $functions
        );
      }
    }
    
  } elseif ($job == 'get_rental_pool'){
    
    // Get company
    if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {
      $query = "SELECT * FROM 'rental_pool_registration_records' WHERE RPRecordID = '" . mysqli_real_escape_string($db_connection, $id) . "'";
      $query = mysqli_query($db_connection, $query);
      if (!$query){
        $result  = 'error';
        $message = 'query error';
      } else {
        $result  = 'success';
        $message = 'query success';
        while ($rental_pool = mysqli_fetch_array($query)){
          $mysql_data[] = array(
//            "rank"          => $rental_pool['rank'],
            "Model"  => $rental_pool['Model'],
//            "industries"    => $rental_pool['industries'],
//            "revenue"       => $rental_pool['revenue'],
//            "fiscal_year"   => $rental_pool['fiscal_year'],
//            "employees"     => $rental_pool['employees'],
//            "market_cap"    => $rental_pool['market_cap'],
//            "headquarters"  => $rental_pool['headquarters']
          );
        }
      }
    }
  
  } elseif ($job == 'add_rental_pool'){
    
    // Add company
    $query = "INSERT INTO it_companies SET ";
    if (isset($_GET['rank']))         { $query .= "rank         = '" . mysqli_real_escape_string($db_connection, $_GET['rank'])         . "', "; }
    if (isset($_GET['Model'])) { $query .= "company_name = '" . mysqli_real_escape_string($db_connection, $_GET['Model']) . "', "; }
    if (isset($_GET['industries']))   { $query .= "industries   = '" . mysqli_real_escape_string($db_connection, $_GET['industries'])   . "', "; }
    if (isset($_GET['revenue']))      { $query .= "revenue      = '" . mysqli_real_escape_string($db_connection, $_GET['revenue'])      . "', "; }
    if (isset($_GET['fiscal_year']))  { $query .= "fiscal_year  = '" . mysqli_real_escape_string($db_connection, $_GET['fiscal_year'])  . "', "; }
    if (isset($_GET['employees']))    { $query .= "employees    = '" . mysqli_real_escape_string($db_connection, $_GET['employees'])    . "', "; }
    if (isset($_GET['market_cap']))   { $query .= "market_cap   = '" . mysqli_real_escape_string($db_connection, $_GET['market_cap'])   . "', "; }
    if (isset($_GET['headquarters'])) { $query .= "headquarters = '" . mysqli_real_escape_string($db_connection, $_GET['headquarters']) . "'";   }
    $query = mysqli_query($db_connection, $query);
    if (!$query){
      $result  = 'error';
      $message = 'query error';
    } else {
      $result  = 'success';
      $message = 'query success';
    }
  
  } elseif ($job == 'edit_rental_pool'){
    
    // Edit company
    if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {
      $query = "UPDATE it_companies SET ";
      if (isset($_GET['rank']))         { $query .= "rank         = '" . mysqli_real_escape_string($db_connection, $_GET['rank'])         . "', "; }
      if (isset($_GET['Model'])) { $query .= "company_name = '" . mysqli_real_escape_string($db_connection, $_GET['Model']) . "', "; }
      if (isset($_GET['industries']))   { $query .= "industries   = '" . mysqli_real_escape_string($db_connection, $_GET['industries'])   . "', "; }
      if (isset($_GET['revenue']))      { $query .= "revenue      = '" . mysqli_real_escape_string($db_connection, $_GET['revenue'])      . "', "; }
      if (isset($_GET['fiscal_year']))  { $query .= "fiscal_year  = '" . mysqli_real_escape_string($db_connection, $_GET['fiscal_year'])  . "', "; }
      if (isset($_GET['employees']))    { $query .= "employees    = '" . mysqli_real_escape_string($db_connection, $_GET['employees'])    . "', "; }
      if (isset($_GET['market_cap']))   { $query .= "market_cap   = '" . mysqli_real_escape_string($db_connection, $_GET['market_cap'])   . "', "; }
      if (isset($_GET['headquarters'])) { $query .= "headquarters = '" . mysqli_real_escape_string($db_connection, $_GET['headquarters']) . "'";   }
      $query .= "WHERE company_id = '" . mysqli_real_escape_string($db_connection, $id) . "'";
      $query  = mysqli_query($db_connection, $query);
      if (!$query){
        $result  = 'error';
        $message = 'query error';
      } else {
        $result  = 'success';
        $message = 'query success';
      }
    }
    
  } elseif ($job == 'delete_rental_pool'){
  
    // Delete company
    if ($id == ''){
      $result  = 'error';
      $message = 'id missing';
    } else {
      $query = "DELETE FROM it_companies WHERE company_id = '" . mysqli_real_escape_string($db_connection, $id) . "'";
      $query = mysqli_query($db_connection, $query);
      if (!$query){
        $result  = 'error';
        $message = 'query error';
      } else {
        $result  = 'success';
        $message = 'query success';
      }
    }
  
  }
  
  // Close database connection
  mysqli_close($db_connection);

}

// Prepare data
$data = array(
  "result"  => $result,
  "message" => $message,
  "data"    => $mysql_data
);

// Convert PHP array to JSON array
$json_data = json_encode($data);
print $json_data;
?>