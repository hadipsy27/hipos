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
			<table class="table table-hover table-striped table-bordered" id="dataTable">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Username</th>
						<th>Name</th>
						<th>Address</th>
						<th>Level</th>
						<th style="text-align: center; width: 75px;">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
						$no = 1;
						foreach($row->result() as $key => $data) : ?>
					<tr>
						<td style="text-align: center;"><?= $no++ ?></td>
						<td><?= $data->username ?></td>
						<td><?= $data->name ?></td>
						<td><?= $data->address ?></td>
						<td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
						<td class="row">
							<div class="col-6">
								<a href="<?= site_url('user/edit/'.$data->user_id) ?>">
									<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>
								</a>
							</div>
							<div class="col-6">
								<form action="<?= site_url('user/delete') ?>" method="post">
									<input type="hidden" name="user_id" value="<?= $data->user_id ?>">
									<button onclick="return confirm('Yakin untuk menghapus data?')" class="btn btn-sm btn-danger"><i
											class="fa fa-trash-alt"></i></button>
								</form>
							</div>
						</td>
					</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>