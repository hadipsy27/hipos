<div class="container-fluid">
	<div class="h3 mb-4 text-gray-800">
		Categories Form <?= ucfirst($page) ?>
	</div>

	<div class="card shadow mb-2">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary"><?= ucfirst($page) ?> Data category</h6>
		</div>
		<div class="card-body">
			<form method="post" action="<?= site_url('category/process') ?>">

				<div class="form-group row">
					<div class="col-2"><label>Category Name *</label></div>
					<input type="hidden" name="id" value="<?= $row->category_id ?>">
					<div class="col-10"><input type="text" name="category_name" class="form-control"
							placeholder="Masukkan Nama category" value="<?= $row->name ?>" required>
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
			<a href="<?= site_url('category') ?>" class="d-none d-sm-block btn btn-sm btn-primary shadow-sm ">
				<i class="fa fa-undo"></i> Kembali
			</a>
		</div>
	</div>
</div>