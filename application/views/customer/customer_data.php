<div class="container-fluid">
	<div class="h3 mb-2 text-gray-800">
		Customers
	</div>
	<div class="mb-4">
		Pelanggan </div>

	<div class="card shadow mb-4">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Data Customers</h6>
			<div class=" pull-right">
				<a href="<?= site_url('customer/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
					<i class="fa fa-plus"></i> Tambah Customer
				</a>
			</div>
		</div>
		<div class="card-body">
			<?php // print_r($row->result()) ?>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="10px">No</th>
							<th>Name</th>
							<th>Jenis Kelamin</th>
							<th>Phone</th>
							<th>Address</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($row->result() as $key => $data) : ?>
						<tr>
							<td style="text-align: center;"><?= $no++ ?>.</td>
							<td><?= $data->name ?></td>
							<td><?= $data->gender == 'L' ? "Laki-Laki" : "Perempuan" ?></td>
							<td><?= $data->phone ?></td>
							<td><?= $data->address ?></td>
							<td class="text-center" width="75px">
								<a href="<?= site_url('customer/edit/'.$data->customer_id) ?>">
									<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>
								</a>
								<a href="<?= site_url('customer/delete/'.$data->customer_id) ?>"
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
</div>