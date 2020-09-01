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
					$this->confirmation($order->invoice_no);
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

	public function confirmation($invoice_no='INV20090100004'){
		$fied = ['invoice_no','nettotal'];
		if($invoice_no!=null){
			$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
			$data['order'] = $this->Utilitymodel->getOrderByInvoice($invoice_no,$fied);
			$this->load->view('common/header');
			$this->load->view('payment',$data);
			$this->load->view('common/footer',$fdata);
		}else{
			redirect('Order');
		}
	}

	public function payment()
	{
		require_once dirname(__FILE__).'/../third_party/omise-php/lib/Omise.php';
		define('OMISE_API_VERSION', '2019-05-29');
		// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
		// define('OMISE_SECRET_KEY', 'SECRET_KEY');
		define('OMISE_PUBLIC_KEY', 'pkey_test_5kwio2ljfyi61k6jdbx');
		define('OMISE_SECRET_KEY', 'skey_test_5kwio2ljp3puopxlaef');

		$charge = OmiseCharge::create(array(
			'amount' => 10025,
			'currency' => 'thb',
			'card' => $_POST["omiseToken"]
		));

		echo($charge['status']);

		print('<pre>');
		print_r($charge);
		print('</pre>');
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
