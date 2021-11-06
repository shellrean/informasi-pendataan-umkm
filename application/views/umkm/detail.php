<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('umkm') ?>" class="btn btn-sm btn-warning btn-icon-split">
				<span class="icon text-white-50">
				  <i class="fas fa-fw fa-angle-double-left"></i>
				</span>
				<span class="text">Kembali</span>
			</a>
		</div>
		<div class="card-body">
			<table class="table table-borderless">
				<tr>
					<th width="200px">JENIS USAHA</th>
					<th width="20px">:</th>
					<th><?= $umkm->jenis_usaha ?></th>
				</tr>
				<tr>
					<th>NAMA USAHA</th>
					<th width="20px">:</th>
					<td><?= $umkm->nama_usaha ?></td>
				</tr>
				<tr>
					<th>ALAMAT USAHA</th>
					<th width="20px">:</th>
					<td><?= $umkm->alamat ?></td>
				</tr>
				<tr>
					<th>DESA</th>
					<th width="20px">:</th>
					<td><?= $umkm->desa ?></td>
				</tr>
				<tr>
					<th>BADAN HUKUM</th>
					<th width="20px">:</th>
					<td><?= $umkm->badan_hukum ?></td>
				</tr>
				<tr>
					<th>NAMA PEMILIK</th>
					<th width="20px">:</th>
					<td><?= $umkm->nama_pemilik ?></td>
				</tr>
				<tr>
					<th>JUMLAH KARYAWAN</th>
					<th width="20px">:</th>
					<td><?= $umkm->jumlah_karyawan ?></td>
				</tr>
				<tr>
					<th>OMSET TAHUNAN</th>
					<th width="20px">:</th>
					<td>Rp. <?= number_format($umkm->omset, 2) ?></td>
				</tr>
				<tr>
					<th>NILAI ASSET</th>
					<th width="20px">:</th>
					<td>Rp. <?= number_format($umkm->asset, 2) ?></td>
				</tr>
				<tr>
					<th>NO TELP</th>
					<th width="20px">:</th>
					<td><?= $umkm->telp ?></td>
				</tr>
				<tr>
					<th>SPESIFIKASI UMKM</th>
					<th width="20px">:</th>
					<td><div class="badge badge-info"><?= $umkm->spek ?></div></td>
				</tr>
			</table>
		</div>
	</div>
</div>
