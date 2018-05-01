<?php

/**
 * Pie chart status of equipment
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

//Count and group by status
$result = mysqli_query($mysqli, "SELECT `rental_pool_registration_records`.`Updater`, COUNT(*) as number FROM `rental_pool_registration_records` GROUP BY`rental_pool_registration_records`.`Updater` "); // using mysqli_query instead
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Updater', 'Number'],
        
          <?php 
            while ($row = mysqli_fetch_array($result))
            {
                echo "['".$row["Updater"]."', ".$row["number"]."],";
            }
          ?>
        ]);

        var options = {
          title: 'Engineer Registration',
         	  legend: 'none',
              pieSliceText: 'label',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>