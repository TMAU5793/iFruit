<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shippingrate extends CI_Controller {
	public $tbl = 'tbl_shipping_rate';

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
		$data = [
			'info' => $this->Shippingmodel->getItem($this->tbl),
			'cates' => $this->Shippingmodel->getCategory()
		];
		$hdata['meta_title'] = 'iFruit Shipping';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/shipping-rate',$data);
		$this->load->view('admin/footer');
	}

	function form()
	{
		$data = [
			'action' => 'addItem',
			'cates' => $this->Shippingmodel->getCategory()
		];
		$hdata['meta_title'] = 'Add Shipping';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/shippingrate-form',$data);
		$this->load->view('admin/footer');
	}

	function addItem()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Shippingmodel->addItem($this->tbl,$this->input->post());
			if ($result) {
				redirect('admin/Shippingrate');
			}
		}else{
			$data = [
				'action' => 'addItem',
				'cates' => $this->Shippingmodel->getCategory()
			];
			$hdata['meta_title'] = 'Add Shipping';
			$this->load->view('admin/header',$hdata);
			$this->load->view('admin/nav-menu');
			$this->load->view('admin/shippingrate-form',$data);
			$this->load->view('admin/footer');
		}
	}

	public function edit()
	{
		$data = [
			'action' => 'updateItem',
			'cates' => $this->Shippingmodel->getCategory(),
			'info' => $this->Shippingmodel->getItemById($this->tbl,$this->uri->segment(4))
		];
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/shippingrate-form',$data);
		$this->load->view('admin/footer');
	}

	public function updateItem()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Shippingmodel->updateItem($this->tbl,$this->input->post());
			if ($result) {
				redirect('admin/Shippingrate');
			}
		}else{
			$hd_id = $this->input->post('hd_id');
			if($hd_id!=""){
				$data = [
					'action' => 'updateItem',
					'cates' => $this->Shippingmodel->getCategory(),
					'info' => $this->Shippingmodel->getItemById($this->tbl,$this->input->post('hd_id'))
				];		
				$this->load->view('admin/header');
				$this->load->view('admin/nav-menu');
				$this->load->view('admin/shippingrate-form',$data);
				$this->load->view('admin/footer');
			}else{
				redirect('admin/Shippingrate');
			}
		}
	}

	function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'ddl_shipping',
				'label'=>'บริการการจัดส่ง',
				'rules'=>'trim|required'
         ),
         array(
				'field'=>'txt_firstQty',
				'label'=>'จำนวนเริ่มต้น',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_lastQty',
				'label'=>'จำนวนสุดท้าย',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_shippingRate',
				'label'=>'ราคาจัดส่ง',
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
