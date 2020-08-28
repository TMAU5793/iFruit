<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
		$this->load->model('Ordermodel');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
		$data['shipping'] = $this->Utilitymodel->getShipping();
		$data['shipping_rate'] = $this->Utilitymodel->getShippingRate();
      $this->load->view('common/header');
      $this->load->view('cart',$data);
      $this->load->view('common/footer',$fdata);
	}

	function shipping()
	{
		$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
		$data['provinces']= $this->Utilitymodel->getProvinces();
		$carts = $this->cart->contents();
		if($carts && $_POST){
			$data['postinfo'] = $this->input->post();
			$data['shipping'] = $this->Utilitymodel->getShippingRateById($this->input->post('hd_shippingrate'));
			$this->load->view('common/header');
			$this->load->view('shipping',$data);
			$this->load->view('common/footer',$fdata);
		}else{
			redirect('Order');
		}
	}

	function checkout()
	{
		if($_POST){
			if($this->shippingValidate()){				
				$carts = $this->cart->contents();
				$shipping = $this->Utilitymodel->getShippingRateById($this->input->post('hd_shipment'));
				$order = $this->Ordermodel->AddOrder($this->input->post(),$carts,$shipping);
				if($order){
					$this->cart->destroy();
					$this->Confirmation($order);
				}
			}else{
				$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
				$data['shipping'] = $this->Utilitymodel->getShipping();
				$data['provinces']= $this->Utilitymodel->getProvinces();
				$carts = $this->cart->contents();
				if($carts){
					$data['carts'] = $carts;
					$data['postinfo'] = $this->input->post();
					$this->load->view('common/header');
					$this->load->view('shipping',$data);
					$this->load->view('common/footer',$fdata);
				}
			}
		}else{
			redirect('Order');
		}
	}

	public function Confirmation($order){
		print_r($order);
	}

	public function shippingValidate(){
		$ar=array(
			array(
				'field'=>'txt_name',
				'label'=>'ชื่อ - นามสกุล',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_phone',
				'label'=>'เบอร์โทร',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_email',
				'label'=>'อีเมล',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_address',
				'label'=>'ที่อยู่',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'ddl_province',
				'label'=>'จังหวัด',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'ddl_amphur',
				'label'=>'อำเภอ/เขต',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'ddl_district',
				'label'=>'ตำบล/แขวง',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_postcode',
				'label'=>'รหัสไปรษณีย์',
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
