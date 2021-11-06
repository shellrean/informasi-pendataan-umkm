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
		<form action="<?= base_url('umkm/edit/'.$umkm->id); ?>" method="post">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Jenis Usaha</label>
							<select name="jenis_usaha" class="select2 form-control">
								<option value="UJ" <?= ($umkm->jenis_usaha == 'UJ') ? 'selected' : '' ?>>UJ</option>
								<option value="IKM" <?= ($umkm->jenis_usaha == 'IKM') ? 'selected' : '' ?>>IKM</option>
							</select>
						</div>

						<div class="form-group">
							<label>Spesifikasi UMKM</label>
							<select name="spek" class="select2 form-control">
								<option value="MIKRO" <?= ($umkm->spek == 'MIKRO') ? 'selected' : '' ?>>MIKRO</option>
								<option value="KECIL" <?= ($umkm->spek == 'KECIL') ? 'selected' : '' ?>>KECIL</option>
							</select>
						</div>

						<div class="form-group">
							<label>Desa/Kecamatan</label>
							<select name="desa" class="select2 form-control">
								<?php foreach($desa as $d): ?>
									<option value="<?= $d->kode ?>" <?= ($umkm->desa == $d->kode) ? 'selected' : '' ?>><?= $d->name ?></option>
								<?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label>Nama usaha</label>
							<input type="text" class="form-control" name="nama_usaha" placeholder="Masukkan nama usaha" value="<?= $umkm->nama_usaha ?>">
							<?= form_error('nama_usaha','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Nama pemilik</label>
							<input type="text" class="form-control" name="nama_pemilik" placeholder="Masukkan nama pemilik" value="<?= $umkm->nama_pemilik ?>">
							<?= form_error('nama_pemilik','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Badan hukum</label>
							<input type="text" class="form-control" name="badan_hukum" placeholder="Masukkan badan hukum" value="<?= $umkm->badan_hukum ?>">
							<?= form_error('badan_hukum','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Jumlah karyawan</label>
							<input type="number" class="form-control" name="jumlah_karyawan" placeholder="Masukkan jumlah karyawan" value="<?= $umkm->jumlah_karyawan ?>">
							<?= form_error('jumlah_karyawan','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Omset /tahun</label>
							<input type="number" class="form-control" name="omset" placeholder="Masukkan omset / tahun" value="<?= $umkm->omset ?>">
							<?= form_error('omset','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Total aset</label>
							<input type="number" class="form-control" name="asset" placeholder="Masukkan total asset" value="<?= $umkm->asset ?>">
							<?= form_error('asset','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>No telp</label>
							<input type="text" class="form-control" name="telp" placeholder="Masukkan no telp" value="<?= $umkm->telp ?>">
							<?= form_error('telp','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat" class="form-control" placeholder="Alamat "><?= $umkm->alamat ?></textarea>
							<?= form_error('alamat','<small class="form-text text-danger">','</small>') ?>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer text-muted">
				<button type="submit" class="btn btn-success btn-sm btn-icon-split">
        <span class="icon text-white-50">
          <i class="far fa-save"></i>
        </span>
					<span class="text">Simpan</span>
				</button>
			</div>
		</form>
	</div>
</div>
