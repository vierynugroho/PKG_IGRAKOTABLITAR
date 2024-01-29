<?php if ($_SESSION[md5('level')] == 3 || $_SESSION[md5('level')] == 2): ?>
	<style>
	.jumbotron {
		background: rgba(204, 204, 204, 0.5);
		padding: 20px;
	}

	.img-logo {
		width: 100px;
	}
	</style>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php?p=home"><i class="fas fa fa-home text-success"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
			</ol>
		</nav>
		<div class="shadow mb-4 p-3">

			<div class="jumbotron">
				<div class="container text-center">
					<img src="assets/img/logo_ra.png" class="img-logo img-fluid">
					<h3>RA Perwanida Blitar</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Periode Aktif</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_tahun_ajar() ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Jumlah Guru</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_count_user(6); ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user-friends fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
										Data Dihitung
									</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
												<span class="text-success"><?= get_guru_selesai_dinilai() ?></span>
												/ <span class="text-danger"><?= get_guru_belum_dinilai() ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										Jumlah Tata Usaha</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?= get_count_user(7) ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user-shield fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header bg-success">
							<p class="card-title text-white"><strong>5 Nilai Tertinggi</strong></p>
						</div>
						<div class="card-body overflow-auto">
							<div id="chart-nilai-tertinggi"></div>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="card">
						<div class="card-header bg-danger">
							<p class="card-title text-white"><strong>5 Nilai Terendah</strong></p>
						</div>
						<div class="card-body overflow-auto">
							<div id="chart-nilai-terendah"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12" style="margin-top:20px">
					<div class="card">
						<div class="card-header bg-warning">
							<p class="card-title text-white"><strong>Nilai Perperiode</strong></p>
						</div>
						<div class="card-body">
							<form>
								<div class="form-group">
									<select class="form-select cb_guru">
										<option value="">Semua Guru</option>
										<?php
										$sql = "SELECT * FROM user a JOIN jenis_user b  ON a.id_jenis_user = b.id_jenis_user WHERE b.level = 1";
										$q = mysqli_query($con, $sql);
										while ($row = mysqli_fetch_array($q)) {
											echo "<option value='$row[nip]'>$row[nama_guru]</option>";
										}
										?>
									</select>
								</div>
							</form>
							<hr>
							<div id="chart-nilai-periode" style="height: 300px; width: 100%;"></div>
							<div class="load_chart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php

	echo "<script>";
	// tertinggi
	$id_periode = get_tahun_ajar_id();
	$sql = "SELECT
			d.nip,
			d.nama_guru,
			SUM(a.hasil_nilai) as nilai,
			COUNT(a.id_nilai) as jml
		FROM penilaian a
		JOIN penilai_detail b ON a.id_penilai_detail = b.id_penilai_detail
		JOIN penilai c ON b.id_penilai = c.id_penilai
		JOIN user d ON c.nip = d.nip
		WHERE c.id_periode = $id_periode
		GROUP BY d.nip
		HAVING COUNT(a.id_nilai) = (
										SELECT 
										(
											(SELECT COUNT(*) FROM penilai p
											JOIN penilai_detail pd ON p.id_penilai = pd.id_penilai
											WHERE p.nip = d.nip)
											*
											(SELECT COUNT(*) FROM isi_kompetensi)
										) as tot
										FROM dual
									)
		ORDER BY nilai DESC
		";
	$q = mysqli_query($con, $sql);
	$i = 0;
	echo "var data_tertinggi = [";
	while ($b = mysqli_fetch_array($q)) {
		$a[] = array('nilai' => get_tot_nilai($b['nip'], get_tahun_ajar_id()), 'nama_guru' => $b['nama_guru']);
		;
	}
	arsort($a);
	//while($row = mysql_fetch_array($q)){
	foreach ($a as $key => $row) {
		if ($i < 5) {
			if ($i == 0) {
				echo "{nama:'$row[nama_guru]', nilai:$row[nilai]}";
			} else {
				echo ", {nama:'$row[nama_guru]', nilai:$row[nilai]}";
			}
		}
		$i++;
	}
	echo "];";

	echo "\n";
	// terendah
	$sql = "SELECT
			d.nip,
			d.nama_guru,
			SUM(a.hasil_nilai) as nilai,
			COUNT(a.id_nilai) as jml
		FROM penilaian a
		JOIN penilai_detail b ON a.id_penilai_detail = b.id_penilai_detail
		JOIN penilai c ON b.id_penilai = c.id_penilai
		JOIN user d ON c.nip = d.nip
		WHERE c.id_periode = $id_periode
		GROUP BY d.nip
		HAVING COUNT(a.id_nilai) = (
										SELECT 
										(
											(SELECT COUNT(*) FROM penilai p
											JOIN penilai_detail pd ON p.id_penilai = pd.id_penilai
											WHERE p.nip = d.nip)
											*
											(SELECT COUNT(*) FROM isi_kompetensi)
										) as tot
										FROM dual
									)
		ORDER BY nilai ASC";
	$q = mysqli_query($con, $sql);
	$i = 0;
	echo "var data_terendah = [";
	$a = [];
	while ($b = mysqli_fetch_array($q)) {
		$a[] = array('nilai' => get_tot_nilai($b['nip'], get_tahun_ajar_id()), 'nama_guru' => $b['nama_guru']);
		;
	}
	asort($a);
	foreach ($a as $key => $row) {
		if ($i < 5) {
			if ($i == 0) {
				echo "{nama:'$row[nama_guru]', nilai:$row[nilai]}";
			} else {
				echo ", {nama:'$row[nama_guru]', nilai:$row[nilai]}";
			}
		}
		$i++;
	}
	echo "];";
	echo "\n";
	echo "</script>";
	?>

	<script type="text/javascript" src="assets/plugins/canvas/canvasjs.min.js"></script>
	<script type="text/javascript" src="assets/js/home.js"></script>


	<script>
	var data_periode = [];
	var chart = new CanvasJS.Chart("chart-nilai-periode", {
		theme: "light2",
		animationEnabled: true,
		title: {
			text: "Nilai Per-periode"
		},
		axisY: {
			includeZero: false,
			title: "Nilai",
			valueFormatString: "###.##"
		},
		toolTip: {
			shared: "true"
		},
		legend: {
			cursor: "pointer",
			itemclick: toggleDataSeries
		},
		data: data_periode
	});

	chart.render();

	function toggleDataSeries(e) {
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else {
			e.dataSeries.visible = true;
		}
		chart.render();
	}

	function ren() {
		console.log("rem");
		chart.render();
	}
	</script>

	<script type="text/javascript">
	$(document).ready(function() {
		$(".cb_guru").change(function() {
			var va = $(this).val();
			var url = "pages/chart_periode.php";
			if (va != "") {
				url = "pages/chart_periode.php?nip=" + va;
			}
			console.log(url);
			//data_periode = [{}];
			$.getJSON(url, function(data) {
				$.each(data, function(key, value) {

					var a = {
						type: value.type,
						visible: value.visible,
						showInLegend: value.showInLegend,
						yValueFormatString: value.yValueFormatString,
						name: value.name,
						dataPoints: value.dataPoints
					}
					data_periode.push(a);
					//data_periode = a;
				});
				data_periode.splice(0, 1);
				ren();
			});
			console.log(data_periode);

		});
	});
	$.getJSON("pages/chart_periode.php", function(data) {
		$.each(data, function(key, value) {

			var a = {
				type: value.type,
				visible: value.visible,
				showInLegend: value.showInLegend,
				yValueFormatString: value.yValueFormatString,
				name: value.name,
				dataPoints: value.dataPoints
			}
			data_periode.push(a);
		});
		ren();
	});
	</script>
<?php else: ?>

	<style>
	.jumbotron {
		background: rgba(204, 204, 204, 0.5);
	}
	</style>
	<!-- Guru -->
	<div class="jumbotron">
		<div class="container text-center w-75">
			<img src="assets/img/logo_ra.png" class="img-fluid w-25">
			<h1 class="display-4">RA Perwanida Blitar</h1>
		</div>
	</div>

<?php endif; ?>