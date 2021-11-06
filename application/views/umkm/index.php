<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>
	<div class="card mb-4">
		<div class="card-header py-3">
			<a href="<?= base_url('umkm/create') ?>" class="btn btn-sm btn-info btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-fw fa-user-plus"></i>
            </span>
				<span class="text">Tambah data umkm</span>
			</a>
			<a href="<?= base_url('umkm/upload') ?>" class="btn btn-sm btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-cloud-upload-alt"></i>
            </span>
				<span class="text">Upload umkm</span>
			</a>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="table-umkm" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>#</th>
						<th>Nama usaha</th>
						<th>Nama pemilik</th>
						<th>Omset</th>
						<th>Telp</th>
						<th>Sepsifikasi</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
