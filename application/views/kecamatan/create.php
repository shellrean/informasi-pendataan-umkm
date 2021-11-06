<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<a href="<?= base_url('kecamatan') ?>" class="btn btn-sm btn-warning btn-icon-split">
        <span class="icon text-white-50">
          <i class="fas fa-fw fa-angle-double-left"></i>
        </span>
				<span class="text">Kembali</span>
			</a>
		</div>
		<form action="<?= base_url('kecamatan/create'); ?>" method="post">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Kode</label>
							<input type="text" class="form-control" name="kode" id="username" placeholder="Masukkan kode" value="<?= set_value('username') ?>">
							<?= form_error('username','<small class="form-text text-danger">','</small>') ?>
						</div>

						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama kecamatan" value="<?= set_value('name') ?>">
							<?= form_error('name','<small class="form-text text-danger">','</small>') ?>
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
