<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div id="jenis-usaha" style="width: 500px; height: 300px;"></div>
				</div>
				<div class="col-md-6">
					<div id="spesifikasi-usaha" style="width: 500px; height: 300px;"></div>
				</div>
				<div class="col-md-12">
					<table class="table table-sm table-striped table-bordered">
						<thead>
							<tr>
								<th>NO</th>
								<th>KECAMATAN</th>
								<th>JUMLAH UMKM</th>
								<th>KECIL</th>
								<th>MIKRO</th>
								<th>RATA-RATA OMSET</th>
								<th>RATA-RATA ASSET</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($kecamatan as $k => $d): ?>
							<tr>
								<td><?= $k+1 ?></td>
								<td><?= $d->name ?></td>
								<td><?= number_format($d->total_umkm,0) ?></td>
								<td><?= number_format($d->total_kecil,0) ?></td>
								<td><?= number_format($d->total_mikro,0) ?></td>
								<td>Rp.<?= number_format($d->rata_omset,2) ?></td>
								<td>Rp.<?= number_format($d->rata_asset,2) ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var dataJenisUsaha = google.visualization.arrayToDataTable(<?= json_encode($jenis_usaha) ?>);

		var dataSpesifikasiUsaha = google.visualization.arrayToDataTable(<?= json_encode($spesifikasi_usaha) ?>);

		var optionsJenisUsaha = {
			title: 'JENIS USAHA'
		};
		var optionsSpesifikasiUsaha = {
			title: 'SPESIFIKASI UMKM'
		};
		new google.visualization.PieChart(document.getElementById('jenis-usaha')).draw(dataJenisUsaha, optionsJenisUsaha);
		new google.visualization.PieChart(document.getElementById('spesifikasi-usaha')).draw(dataSpesifikasiUsaha, optionsSpesifikasiUsaha);
	}
</script>
