<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {
	public $tbl = 'tbl_shipping';

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Shippingmodel');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		if(!$this->session->userdata('logged_in')){
			redirect('admin/Login');
		}
	}

	function index(){
		$data['info'] = $this->Shippingmodel->getItem($this->tbl);
		$hdata['meta_title'] = 'iFruit Shipping';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/shipping',$data);
		$this->load->view('admin/footer');
	}

	function form()
	{
		$data['action'] = 'addItem';
		$hdata['meta_title'] = 'Add Shipping';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/shipping-form',$data);
		$this->load->view('admin/footer');
	}

	function addItem()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Shippingmodel->addItem($this->tbl,$this->input->post());
			if ($result) {
				redirect('admin/Shipping');
			}
		}else{
			$data['action'] = "addItem";
			$hdata['meta_title'] = 'Add Shipping';
			$this->load->view('admin/header',$hdata);
			$this->load->view('admin/nav-menu');
			$this->load->view('admin/shipping-form',$data);
			$this->load->view('admin/footer');
		}
	}

	public function edit()
	{
		$data['action'] = "updateItem";
		$data['info'] = $this->Shippingmodel->getItemById($this->tbl,$this->uri->segment(4));		
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/shipping-form',$data);
		$this->load->view('admin/footer');
	}

	public function updateItem()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Shippingmodel->updateItem($this->tbl,$this->input->post());
			if ($result) {
				redirect('admin/Shipping');
			}
		}else{
			$hd_id = $this->input->post('hd_id');
			if($hd_id!=""){
				$data['action'] = "update";
				$data['info'] = $this->Shippingmodel->getItemById($this->input->post('hd_id'));				
				$this->load->view('admin/header');
				$this->load->view('admin/nav-menu');
				$this->load->view('admin/shipping-form',$data);
				$this->load->view('admin/footer');
			}else{
				redirect('admin/Shipping');
			}
		}
	}

	function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_name',
				'label'=>'ชื่อบริการ',
				'rules'=>'trim|required'
         )
		);
		$this->form_validation->set_rules($ar);
		
		if ($this->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}
}
?>
