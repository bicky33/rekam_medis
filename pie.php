<<<<<<< HEAD
<div id="canvas-holder" style="width:40%;">
		<canvas id="chart-area"></canvas>
</div>

	<?php
	require_once "_config/config.php";
	$con = mysqli_connect('localhost','root','','rekam_medis');
	$sql = "SELECT COUNT(*) as num, alamat FROM tb_dokter GROUP BY alamat";
	$query = mysqli_query($con, $sql);
	$data = [];
	while($row = mysqli_fetch_array($query)){
		$data[$row['alamat']] = $row['num'];
	}
	$total = array_sum($data);
	foreach ($data as $alamat => $num) {
		$data[$alamat] = round($num*100/$total,2);
	}
	
	$color = ['red', 'orange', 'yellow',  'green','blue'];
	$str_value = implode(",", array_values($data));
	$i = 0;
	foreach($data as $asal => $presentase){
	$str_color[]= "window.chartColors.".$color[$i];
	$str_kota[] = $asal;
	$i++;
	
	}
	?>
	
	<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
	<script>
		
=======
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	
</head>

<body>
	<div id="canvas-holder" style="width:40%">
		<canvas id="chart-area"></canvas>
	</div>
    <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
	<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
	<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

>>>>>>> 6285fc1601fa240380d5d938a8c62da8f96035af
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
<<<<<<< HEAD
						<?= $str_value; ?>
					],
					backgroundColor: [
						<?= implode(",", $str_color); ?>
=======
						20,
						20,
						20,
						20,
						20,
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
>>>>>>> 6285fc1601fa240380d5d938a8c62da8f96035af
					],
					label: 'Dataset 1'
				}],
				labels: [
<<<<<<< HEAD
					'<?= implode("','", $str_kota); ?>'
=======
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
>>>>>>> 6285fc1601fa240380d5d938a8c62da8f96035af
				]
			},
			options: {
				responsive: true
			}
		};
<<<<<<< HEAD
=======

>>>>>>> 6285fc1601fa240380d5d938a8c62da8f96035af
		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};
<<<<<<< HEAD
	</script>
=======

		var colorNames = Object.keys(window.chartColors);
	
	</script>
</body>

</html>
>>>>>>> 6285fc1601fa240380d5d938a8c62da8f96035af
