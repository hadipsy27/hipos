<?php
class User extends CI_Controller{

	// construct adalah function yg pertama kali di load
	function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('user_m');
	}
	public function index(){
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add(){
		// print_r($_POST['username']);
		$this->load->library('form_validation');
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

	public function del(){
		// user_id ini dari name di form input hidden button delete 
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil dihapus!') </script>";
		}
		echo "<script> window.location='".site_url('user')."' </script>";
	}
}