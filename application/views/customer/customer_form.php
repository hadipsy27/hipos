<div class="container-fluid">
	<div class="h3 mb-4 text-gray-800">
		customer Form <?= ucfirst($page) ?>
	</div>

	<div class="card shadow mb-2">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary"><?= ucfirst($page) ?> Data customer</h6>
		</div>
		<div class="card-body">
			<form method="post" action="<?= site_url('customer/process') ?>">

				<div class="form-group row">
					<div class="col-2"><label>Customer Name *</label></div>
					<input type="hidden" name="id" value="<?= $row->customer_id ?>">
					<div class="col-10"><input type="text" name="customer_name" class="form-control"
							placeholder="Masukkan Nama customer" value="<?= $row->name ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-2"><label>Jenis Kelamin</label></div>
					<div class="col-10">
						<select name="gender" class="form-control" required>
							<option value="">-- Plih -- </option>
							<option value="L" <?= $row->gender == 'L' ? 'selected' : ''?>>Laki-laki</option>
							<option value="P" <?= $row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
						</select>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-2"><label>Phone *</label></div>
					<div class="col-10"><input type="number" name="phone" class="form-control" placeholder="Masukkan No Telepon"
							value="<?= $row->phone ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-2"><label>Address *</label></div>
					<div class="col-10"><textarea type="text" name="addr" class="form-control" placeholder="Masukkan Alamat"
							required><?= $row->address ?></textarea>
					</div>
				</div>


				<div class="form-group">
					<button class="btn btn-success shadow-lg" name="<?= $page ?>"><i class="fa fa-paper-plane"></i>
						Simpan</button>
					<button class="btn btn-secondary"> Reset</button>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<a href="<?= site_url('customer') ?>" class="d-none d-sm-block btn btn-sm btn-primary shadow-sm ">
				<i class="fa fa-undo"></i> Kembali
			</a>
		</div>
	</div>
</div>