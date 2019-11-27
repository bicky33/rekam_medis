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
		
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?= $str_value; ?>
					],
					backgroundColor: [
						<?= implode(",", $str_color); ?>
					],
					label: 'Dataset 1'
				}],
				labels: [
					'<?= implode("','", $str_kota); ?>'
				]
			},
			options: {
				responsive: true
			}
		};
		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};
	</script>
