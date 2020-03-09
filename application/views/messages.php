<?php if($this->session->has_userdata('success')) { ?>

<div class="alert alert-success alert-dismissible fade show " role="alert">
	<?= $this->session->flashdata('success') ?>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>

<?php } ?>