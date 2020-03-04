<?php
class User extends CI_Controller{
	public function index(){
		check_not_login();

		$this->load->model('user_m');
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
			echo 'Simpan data user'	;
		}

		
	}
}