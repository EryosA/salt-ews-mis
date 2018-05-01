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
  </head>
  <body>
  	<script type="text/javascript">
  	google.charts.load('current', {packages: ['corechart', 'bar']});
  	google.charts.setOnLoadCallback(drawTitleSubtitle);

  	function drawTitleSubtitle() {
  	  	
  		var data = google.visualization.arrayToDataTable([
            ['Updater', 'Number'],
          
            <?php 
              while ($row = mysqli_fetch_array($result))
              {
                  echo "['".$row["Updater"]."', ".$row["number"]."],";
              }
            ?>
          ]);

  	      var barOptions = {
  	        chart: {
  	          title: 'Number of Registration Entries by Engineer',
  	          subtitle: 'Based on Rental Pool Database Registration Records',
      	      width: 600,
      	      height: 900,
      	      bar: {groupWidth: "95%"},
      	      legend: { position: "none" }
  	        },
  	        hAxis: {
  	          title: 'Number',
  	          minValue: 0,
  	        },
  	        vAxis: {
  	          title: 'Updater'
  	        },
  	        bars: 'horizontal'
  	      };
  	      var barChart = new google.charts.Bar(document.getElementById('chart_div'));
  	      barChart.draw(data, barOptions);
  	    }
  	</script>
    <div id="chart_div"></div>
  </body>
</html>