<?php
class Supplier extends CI_Controller{
	public function index(){
		$this->template->load('template','supplier/supplier_data');
	}
}