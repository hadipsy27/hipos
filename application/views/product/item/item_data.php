<div class="container-fluid">
	<div class="h3 mb-2 text-gray-800">
		Items
	</div>
	<div class="mb-4">
		Data Barang
	</div>

	<?php $this->view('messages') ?>

	<div class="card shadow mb-4">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Data Items</h6>
			<div class=" pull-right">
				<a href="<?= site_url('item/add') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
					<i class="fa fa-plus"></i> Tambah Item
				</a>
			</div>
		</div>
		<div class="card-body table-responsive">
			<table class="table table-hover table-striped table-bordered" id="dataTable">
				<thead>
					<tr>
						<th width="30px">No</th>
						<th>Barcode</th>
						<th>Name</th>
						<th>Category</th>
						<th>Unit</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Image</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<?php 
						$no = 1;
						foreach($row->result() as $key => $data) : ?>

						<td style="text-align: center;"><?= $no++ ?>.</td>
						<td><?= $data->barcode ?></td>
						<td><?= $data->name ?></td>
						<td><?= $data->category_name ?></td>
						<td><?= $data->unit_name ?></td>
						<td><?= $data->price ?></td>
						<td><?= $data->stock ?></td>
						<td>
							<?php if($data->image != null) { ?>
							<img src="<?= base_url('uploads/product/'.$data->image) ?>" style="width: 100px">
							<?php } ?>
						</td>
						<td class="text-center" width="75px">
							<a href="<?= site_url('item/edit/'.$data->item_id) ?>">
								<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>
							</a>

							<a href="<?= site_url('item/delete/'.$data->item_id) ?>" onclick="return confirm('Yakin menghapus data?')"
								class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>

					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>