<?php
include('header.php');
include('navbar.php');
?>
<style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
</style>
<script src="../assets/chart/Chart.min.js"></script>
<script src="../assets/chart/utils.js"></script>
<div class="page-inner">
	<!-- TimeLine -->
	<div class="row">   
		<div class="col-md-12">
			<div class="card bg-primary-gradient">
				<div class="card-header bubble-shadow">
					<h4 class="card-title"style="color: white">Dashboard
					</h4>
				</div>
			</div>
		</div>	
	</div> 
	<div class="row">		
		<?php if($role=='admin') { ?>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-primary card-round">
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="fas fa-code-branch"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Branches</p>
									<?php
									$query="SELECT id FROM branch ORDER BY id";
									$sql_run=mysqli_query($connection,$query);
									$row=mysqli_num_rows($sql_run);
									echo '<h4 class="card-title">'.$row.'</h4>';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-info card-round">
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="fas fa-stethoscope"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Doctors</p>
									<?php
									$query="SELECT id FROM doctor ORDER BY id";
									$sql_run=mysqli_query($connection,$query);
									$row=mysqli_num_rows($sql_run);
									echo '<h4 class="card-title">'.$row.'</h4>';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-success card-round">
					<div class="card-body ">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="flaticon-users"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Staff</p>
									<?php
									$query="SELECT id FROM staff ORDER BY id";
									$sql_run=mysqli_query($connection,$query);
									$row=mysqli_num_rows($sql_run);
									echo '<h4 class="card-title">'.$row.'</h4>';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-secondary card-round">
					<div class="card-body ">
						<div class="row">
							<div class="col-5">
								<div class="icon-big text-center">
									<i class="icon-people"></i>
								</div>
							</div>
							<div class="col-7 col-stats">
								<div class="numbers">
									<p class="card-category">Patients</p>
									<?php
									$query="SELECT id FROM patient ORDER BY id";
									$sql_run=mysqli_query($connection,$query);
									$row=mysqli_num_rows($sql_run);
									echo '<h4 class="card-title">'.$row.'</h4>';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>		
		<?php if($role!='staff') { ?>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Graph</div>
					</div>
					<div class="card-body">
						<div id="container" style="width: 100%;">
							<div class="wrapper">
								<canvas id="chart-0"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>	
	<?php
	$sql = "SELECT name,noe FROM staff";
	$result = mysqli_query($connection,$sql);
	$datan = array();
	$datae = array();
	while($enr = mysqli_fetch_assoc($result)){
		$a = array($enr['name'],$enr['noe']);
		array_push($datan, $a[0]);
		array_push($datae, $a[1]);
	}
	$name=json_encode($datan);
	$noe=json_encode($datae);
	?>
	<script>
		var staff = <?php echo $name;?>;
		var color = Chart.helpers.color;
		var presets = window.chartColors;
		var utils = Samples.utils;
		var inputs = {
			min: -100,
			max: 100,
			count: 8,
			decimals: 2,
			continuity: 1
		};
		var options = {
			maintainAspectRatio: false,
			spanGaps: false,
			elements: {
				line: {
					tension: 0.4
				}
			},
			plugins: {
				filler: {
					propagate: false
				}
			},
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0
					}
				}]
			}
		};

		[false, 'origin', 'start', 'end'].forEach(function(boundary, index) {
			new Chart('chart-' + index, {
				type: 'line',
				data: {
					labels: staff,
					datasets: [{
						backgroundColor: utils.transparentize(presets.blue),
						borderColor: presets.blue,
						data: <?php echo $noe;?>,
						label: 'Dataset',
						fill: boundary
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'fill: ' + boundary,
						display: true
					}
				})
			});
		});		
	</script>
</div>
</div>
</div>
</div> 
<?php
include('script.php');
?>