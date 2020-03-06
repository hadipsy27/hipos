<div class="container-fluid">
	<div class="h3 mb-2 text-gray-800">
		Suppliers
	</div>
	<div class="mb-4">
		Pemasok Barang
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Data Suppliers</h6>
			<div class=" pull-right">
				<a href="<?= site_url('supplier/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
					<i class="fa fa-user-plus"></i> Tambah Suppliler
				</a>
			</div>
		</div>
		<div class="card-body table-responsive">
			<?php // print_r($row->result()) ?>
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th width="10px">No</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Description</th>
						<th colspan="2" style="text-align: center;">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php 
						$no = 1;
						foreach($row->result() as $key => $data) : ?>

						<td style="text-align: center;"><?= $no++ ?>.</td>
						<td><?= $data->name ?></td>
						<td><?= $data->phone ?></td>
						<td><?= $data->address ?></td>
						<td><?= $data->description ?></td>
						<td width="20px">
							<a href="<?= site_url() ?>">
								<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>
							</a>
						</td>
						<td width="20px">
							<a href="<?= site_url('supplier/delete/'.$data->supplier_id) ?>"
								onclick="return confirm('Yakin menghapus data?')" class="btn btn-sm btn-danger"><i
									class="fa fa-trash"></i></a>
						</td>
					</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>