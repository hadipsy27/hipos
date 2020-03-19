<div class="container-fluid">
	<div class="h3 mb-4 text-gray-800">
		Items Form <?= ucfirst($page) ?>
	</div>

	<?php $this->view('messages') ?>

	<div class="card shadow mb-2">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary"><?= ucfirst($page) ?> Data Item</h6>
		</div>
		<div class="card-body">
			<?php echo form_open_multipart('item/process') ?>

			<div class="form-group row">
				<div class="col-2"><label>Barcode *</label></div>
				<input type="hidden" name="id" value="<?= $row->item_id ?>">
				<div class="col-10"><input type="text" name="barcode" class="form-control" placeholder="Masukkan Kode Barcode"
						value="<?= $row->barcode ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-2"><label for="product_name">Product Name *</label></div>
				<div class="col-10"><input type="text" id="product_name" name="product_name" class="form-control"
						placeholder="Masukkan Nama Item" value="<?= $row->name ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-2"><label>Category *</label></div>
				<div class="col-10">
					<select name="category" class="form-control" required>
						<option value="">-- Pilih --</option>
						<?php foreach($category->result() as $key => $data) { ?>
						<option value="<?= $data->category_id ?>"
							<?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->name ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-2"><label>Unit *</label></div>
				<div class="col-10">
					<!-- dengan menambahkan 'form' di autoload helper (bawaan CI) -->
					<?= form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-2"><label>Price *</label></div>
				<div class="col-10"><input type="number" name="price" class="form-control" placeholder="Masukkan harga"
						value="<?= $row->price ?>" required>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-2"><label>Image</label></div>
				<?php if($page == 'edit') {
					if($row->image != null){ ?>
				<div><img src="<?= base_url('uploads/product/'.$row->image) ?>" style="width: 100px; margin-left: 13px;"></div>
				<?php	}
				}?>
			</div>
			<div class="mb-4" style="margin-left: 17%"><input type="file" name="image" class="form-control">
				<small>png / jpg / jpeg / pdf / zip | Max. 2 mb | (Biarkan Kosong jika tidak
					<?= $page == 'edit' ? "diganti" : "ada" ?>)</small>
			</div>

			<div class="form-group">
				<button class="btn btn-success shadow-lg" name="<?= $page ?>"><i class="fa fa-paper-plane"></i>
					Simpan</button>
				<button class="btn btn-secondary"> Reset</button>
			</div>

			<?php echo form_close() ?>
		</div>

		<div class="card-footer">
			<a href="<?= site_url('item') ?>" class="d-none d-sm-block btn btn-sm btn-primary shadow-sm ">
				<i class="fa fa-undo"></i> Kembali
			</a>
		</div>
	</div>
</div>