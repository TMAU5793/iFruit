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
					$this->payment($order->invoice_no);
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

	public function payment($invoice_no='INV20090100004'){
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

	public function confirmation()
	{
		require_once dirname(__FILE__).'/../third_party/omise-php/lib/Omise.php';
		define('OMISE_API_VERSION', '2019-05-29'); // เข้าระบบ omise และคลิกที่อีเมล คลิก api version เลือกระหว่าง ทดสอบ กับ ใช้งานจริง
		define('OMISE_PUBLIC_KEY', 'pkey_test_5kwio2ljfyi61k6jdbx');
		define('OMISE_SECRET_KEY', 'skey_test_5kwio2ljp3puopxlaef');

		$post = $this->input->post();
		$ref_id = $this->Utilitymodel->getOrderByInvoice($post['hd_invoice'],'invoice_no');
		$omiseToken = $post['omiseToken']; // omiseToken จะถูกส่งมาอัตโนมัติผ่าน omise form		
		$return_uri = base_url("Cart/complete/".$ref_id->invoice_no); // ในขั้นตอนนี้ให้สร้าง ref_id สำหรับอ้างอิงไว้ใช้ในขั้นตอนต่อไป อาจจะใช้เป็น order id ก็ได้ ประมาณว่า order นี้กำลังจะชำระเงิน 
		$charge = OmiseCharge::create(array(
			'amount' => $amount,
			'currency' => 'THB',
			'card' => $omiseToken,
			'return_uri' => $return_uri, // return_uri คือ uri สุดท้ายที่จะกลับมาที่หน้าเว็บไซต์ของเรา
      ));
        
		$charge_id = $charge['id'];
      $authorize_uri = $charge['authorize_uri'];        
      // จังหวะนี้สำคัญ ก่อนที่จะ redirect ไปจากหน้านี้ ให้บันทึก ref_id และ charge_id ไว้ในฐานข้อมูลของเรา 
      // เพื่อใช้อ้างอิงว่า transaction นี้ สำเร็จ หรือ ไม่สำเร็จ 
		redirect($authorize_uri,'refresh'); // เราจะรีไปยังหน้าการยืนยันตัวตนผ่านระบบ OTP ของธนาคารนั้น ๆ 
	}

	public function complete(){
		$ref_id = $this->input->get("ref_id"); // ใช้ ref_id คิวรี่หา charge_id แล้วใช้หาค่า status ว่า transaction นี้สำเร็จหรือไม่สำเร็จ		
		$charge = OmiseCharge::retrieve($charge_id);
		if($charge['status'] === 'successful') {
			// เงินเข้าบัญชีเรียบร้อยแล้ว
		}else{
			// อาจจะ failed หรือ pending อยู่
		}
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
