<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>
	<div class="card mb-4">
		<div class="card-header py-3">
			<a href="<?= base_url('kecamatan/create') ?>" class="btn btn-sm btn-info btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-fw fa-user-plus"></i>
            </span>
				<span class="text">Tambah kecamatan</span>
			</a>
		</div>
		<div class="card-body">

			<div class="table-responsive">
				<table class="table table-bordered" id="table" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>#</th>
						<th>Kode</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php $no = 1;
					foreach ($desas as $user) : ?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $user->kode ?></td>
							<td><?= $user->name ?></td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Aksi
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= base_url('kecamatan/edit/'.$user->id) ?>">Edit</a>
										<a class="dropdown-item confirm" href="<?= base_url('kecamatan/delete/'.$user->id) ?>">Hapus</a>
									</div>
								</div>
							</td>
						</tr>
						<?php $no++;
					endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
