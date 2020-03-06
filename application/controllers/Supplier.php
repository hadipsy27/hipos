<?php
class Supplier extends CI_Controller{
	function __construct(){
		
		parent::__construct();
		check_not_login();
		$this->load->model('supplier_m');
	}
	
	public function index(){
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template','supplier/supplier_data', $data);
	}

	public function delete($id){
		$this->supplier_m->del($id);
		if ($this->supplier_m->del($id)) {
			echo "<script> alert('Data Berhasil dihapus!') </script>";
		}
		echo "<script> window.location='".site_url('supplier')."' </script>";
	}
	
}