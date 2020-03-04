<div class="container-fluid">
	<div class="h3 mb-2 text-gray-800">
		List Data Users
	</div>
	<div class="mb-4">
		Data User Administrator dan Kasir HiPOS.
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
			<div class=" pull-right">
				<a href="<?= site_url('user/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
					<i class="fa fa-user-plus"></i> Tambah User
				</a>
			</div>
		</div>
		<div class="card-body table-responsive">
			<?php // print_r($row->result()) ?>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Username</th>
						<th>Name</th>
						<th>Address</th>
						<th>Level</th>
						<th colspan="2" style="text-align: center;">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php 
						$no = 1;
						foreach($row->result() as $key => $data) : ?>

						<td style="text-align: center;"><?= $no++ ?></td>
						<td><?= $data->username ?></td>
						<td><?= $data->name ?></td>
						<td><?= $data->address ?></td>
						<td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
						<td width="20px">
							<a href="<?= site_url('user/edit') ?>">
								<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>
							</a>
						</td>
						<td onclick="javascript: return confirm('Anda yakin untuk hapus?')" width=" 20px">
							<a href="<?= site_url('user/delete') ?>">
								<div class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></div>
							</a>
						</td>
					</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>