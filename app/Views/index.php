<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Codeigniter 4 Google Column Charts Example - XpertPhp</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
	<body>
		<div class="container">
			<div id="columnGraph" style="height: 600px; width: 100%"></div>
		</div>
		<script>
			google.charts.load('visualization', "1", {
				packages: ['corechart']
			});

			function initGraph() {
				var data = google.visualization.arrayToDataTable([
					['Day', 'Product count'], 
					<?php foreach($productData as $row) {
						echo "['".$row['month']."',".$row['sales']."],";
					} ?>
				]);

				var options = {
					title: 'Sales by month',
					isStacked: true
				};

				var chart = new google.visualization.ColumnChart(document.getElementById('columnGraph'));
				chart.draw(data, options);
			}
			google.charts.setOnLoadCallback(initGraph);
		</script>

	</body>

</html>