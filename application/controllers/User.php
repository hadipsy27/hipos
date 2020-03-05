<?php
class User extends CI_Controller{

	// construct adalah function yg pertama kali di load
	function __construct(){
		
		parent::__construct();
		check_not_login();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}
	public function index(){
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add(){
		// print_r($_POST['username']);
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'required|matches[password]',array('matches' => '%s Tidak sesuai dengan Password'));
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter');
		$this->form_validation->set_message('is_unique', '{field} Username ini sudah ada');

		if ($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'user/user_form_add');
		} else {
			
			$post = $this->input->post(null , TRUE);
			$this->user_m->add($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>
					alert('Data Berhasil disimpan');
				</script>";
			}
			echo"<script>window.location='".site_url('user')."'</script>";
			
		}
	}

	public function edit($id){
		$this->form_validation->set_rules('fullname', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'matches[password]',array('matches' => '%s Tidak sesuai dengan Password'));
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'matches[password]',array('matches' => '%s Tidak sesuai dengan Password'));
		}
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s Tidak Boleh Kosong');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				// row disini akan di jadikan variabel untuk memanggil data ex: $data->username di view edit data
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);
			} else {
				echo "<script> alert('Data Tidak ada!');";
				echo"window.location='".site_url('user')."'</script>";
			}
		} else {
			
			$post = $this->input->post(null , TRUE);
			$this->user_m->edit($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>
					alert('Data Berhasil diedit');
				</script>";
			}
			echo"<script>window.location='".site_url('user')."'</script>";
			
		}
	}

	public function username_check(){
		$post = $this->input->post(null , TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]' ");

		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check','{field} ini sudah di pakai, silakan ganti yang lain');
			return FALSE;
		} else {
		return TRUE; 
		}
	}


	public function delete(){
		// user_id ini dari name di form input hidden button delete 
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil dihapus!') </script>";
		}
		echo "<script> window.location='".site_url('user')."' </script>";
	}
}