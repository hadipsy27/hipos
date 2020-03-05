<div class="container-fluid">
	<div class="h3 mb-3 text-gray-800">
		Form Edit User
	</div>

	<div class="card shadow mb-1">
		<div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
		</div>
		<div class="card-body">

			<form method="post" action="">
				<div class="form-group row">
					<div class="col-2"><label>Full Name *</label></div>
					<input type="hidden" name="user_id" value="<?= $row->user_id ?>">
					<div class="col-10"><input type="text" name="fullname" class="form-control"
							placeholder="Masukkan Nama Lengkap" value="<?= $this->input->post('fullname') ?? $row->name ?>">
						<?= form_error('fullname','<div class="text-danger small ml-2 mt-1">','</div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2"><label>Username *</label></div>
					<div class="col-10"><input type="text" name="username" class="form-control" placeholder="Masukkan Username"
							value="<?= $this->input->post('username') ?? $row->username ?>">
						<?= form_error('username','<div class="text-danger small ml-2 mt-1">','</div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2"><label>Password</label></div>
					<div class="col-10"><input type="password" name="password" class="form-control"
							placeholder="Biarkan kosong jika tidak diganti" value="<?= $this->input->post('password') ?>">
						<?= form_error('password','<div class="text-danger small ml-2 mt-1">','</div>') ?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-2"><label>Password Confirmation</label></div>
					<div class="col-10"><input type="password" name="passconf" class="form-control"
							placeholder="Konfirmasi Password jika diganti" value="<?= $this->input->post('passconf') ?>">
						<?= form_error('passconf','<div class="text-danger small ml-2 mt-1">','</div>') ?>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-2"><label>Address</label></div>
					<div class="col-10"><textarea name="address" id="" cols="4" rows="2" class="form-control"
							placeholder="Alamat Lengkap Domisili"><?= $this->input->post('address') ?? $row->address ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-2"><label>Level *</label></div>
					<div class="col-10">
						<select name="level" class="form-control">
							<?php $level =  $this->input->post('level') ? $this->input->post('level') : $row->level ?>
							<option value="1">Admin</option>
							<option value="2" <?= $level == 2 ? "selected" : null ?>>Kasir</option>
						</select>
						<?= form_error('level','<div class="text-danger small ml-2 mt-1">','</div>') ?> </div>
				</div>

				<div class="form-group mb-1">
					<button class="btn btn-success shadow-lg"><i class="fa fa-paper-plane"></i> Simpan</button>
					<button class="btn btn-secondary"> Reset</button>
				</div>

			</form>

		</div>
		<div class="card-footer">
			<a href="<?= site_url('user') ?>" class="d-none d-sm-block btn btn-sm btn-primary shadow-sm ">
				<i class="fa fa-undo"></i> Kembali
			</a>
		</div>
	</div>
</div>