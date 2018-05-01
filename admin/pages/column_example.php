<?php

/**
 * Pie chart status of equipment
 */

// Initialisation
require_once('../../includes/init.php');


// Require the user to be logged in before they can see this page.
//Auth::getInstance()->requireLogin();

// Require the user to be an administrator before they can see this page.
//Auth::getInstance()->requireAdmin();

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
  	google.charts.setOnLoadCallback(drawTopX);

  	function drawTopX() {
  	      var data = new google.visualization.DataTable();
  	    data.addColumn('Updater', 'Updater');
        data.addColumn('number', 'Number');
        //data.addColumn('number', 'Energy Level');
  	      
  	      data.addRows([
//   	        [{v: [8, 0, 0], f: '8 am'}, 1, .25],
//   	        [{v: [9, 0, 0], f: '9 am'}, 2, .5],
//   	        [{v: [10, 0, 0], f:'10 am'}, 3, 1],
//   	        [{v: [11, 0, 0], f: '11 am'}, 4, 2.25],
//   	        [{v: [12, 0, 0], f: '12 pm'}, 5, 2.25],
//   	        [{v: [13, 0, 0], f: '1 pm'}, 6, 3],
//   	        [{v: [14, 0, 0], f: '2 pm'}, 7, 4],
//   	        [{v: [15, 0, 0], f: '3 pm'}, 8, 5.25],
//   	        [{v: [16, 0, 0], f: '4 pm'}, 9, 7.5],
//   	        [{v: [17, 0, 0], f: '5 pm'}, 10, 10],

  	    	<?php 
  	              while ($row = mysqli_fetch_array($result))
  	              {
  	                  echo "[{'".$row["Updater"]."'}, ".$row["number"]."],";
  	              }
  	            ?>
  	      ]);

  	      var options = {
  	        chart: {
  	          title: 'Number of Registration Records by Engineer',
  	          subtitle: 'Based on Rental Pool Database Registration Records'
  	        },
  	        axes: {
  	          x: {
  	            0: {side: 'top'}
  	          }
  	        },
  	        hAxis: {
  	          title: 'Updater',
//   	          format: 'h:mm a',
//   	          viewWindow: {
//   	            min: [7, 30, 0],
//   	            max: [17, 30, 0]
  	          }
  	        },
  	        vAxis: {
  	          title: 'Number'
  	        }
  	      };

  	      var columnChart = new google.charts.Bar(document.getElementById('chart_div'));
  	      columnChart.draw(data, options);
  	    }

  	</script>
    <div id="chart_div"></div>
  </body>
</html>