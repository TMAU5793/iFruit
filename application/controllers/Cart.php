<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
		$this->load->model('Ordermodel');
		$this->load->library('form_validation');
		require_once dirname(__FILE__).'/../third_party/omise-php/lib/Omise.php';
		define('OMISE_API_VERSION', '2019-05-29'); // เข้าระบบ omise และคลิกที่อีเมล คลิก api version เลือกระหว่าง ทดสอบ กับ ใช้งานจริง
		define('OMISE_PUBLIC_KEY', 'pkey_test_5kwio2ljfyi61k6jdbx');
		define('OMISE_SECRET_KEY', 'skey_test_5kwio2ljp3puopxlaef');
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
					$this->omise_method($order->invoice_no);
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

	public function omise_method($invoice_no='INV20082800002'){
		$fied = ['invoice_no','nettotal'];
		$data['order'] = $this->Utilitymodel->getOrderByInvoice($invoice_no,$fied);
		if($data['order']){
			$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');			
			$this->load->view('common/header');
			$this->load->view('payment',$data);
			$this->load->view('common/footer',$fdata);
		}else{
			redirect('Order');
		}
	}

	public function confirmation()
	{
		print_r($this->input->post());
	}

	public function confirmation2()
	{	
		$post = $this->input->post();
		if($post){
			$ref_id = $post['hd_invoice'];
			$amount = str_replace('.','',$post['hd_nettotal']);
			$return_uri = base_url("Cart/payment/".$ref_id); // ในขั้นตอนนี้ให้สร้าง ref_id สำหรับอ้างอิงไว้ใช้ในขั้นตอนต่อไป อาจจะใช้เป็น order id ก็ได้ ประมาณว่า order นี้กำลังจะชำระเงิน

			//echo $post['hd_method'];
			if($post['hd_method']=="bill_payment_tesco_lotus"){
				$source = OmiseSource::create(array(
					'amount' => $amount,
					'currency' => 'thb',
					'type' => 'bill_payment_tesco_lotus',
					'return_uri' => $return_uri,
				));
				print_r($source);
			}else if($post['hd_method']=="internet_banking"){
				$source = OmiseSource::create(array(
					'amount' => $amount,
					'currency' => 'thb',
					'type' => 'internet_banking',
					'return_uri' => $return_uri,
				));
				print_r($source);
			}else{				
				$omiseToken = $post['omiseToken']; // omiseToken จะถูกส่งมาอัตโนมัติผ่าน omise form				
				$charge = OmiseCharge::create(array(
					'amount' => $amount,
					'currency' => 'THB',
					'card' => $omiseToken,
					'return_uri' => $return_uri, // return_uri คือ uri สุดท้ายที่จะกลับมาที่หน้าเว็บไซต์ของเรา
				));
				if($charge){
					$update_order =[
						'invoice' => $ref_id,
						'status' => $charge['status'],
						'charge_id' => $charge['id']
					];
					$update_order = $this->Ordermodel->updateOrderPayment($update_order);
					if($update_order){
						$authorize_uri = $charge['authorize_uri'];
						redirect($authorize_uri,'refresh');
					}
				}else{
					print('<pre>');
					print_r($charge);
					print('</pre>');
				}
				//$charge_id = $charge['id'];
				//$authorize_uri = $charge['authorize_uri'];        
				// จังหวะนี้สำคัญ ก่อนที่จะ redirect ไปจากหน้านี้ ให้บันทึก ref_id และ charge_id ไว้ในฐานข้อมูลของเรา 
				// เพื่อใช้อ้างอิงว่า transaction นี้ สำเร็จ หรือ ไม่สำเร็จ 
				//redirect($authorize_uri,'refresh'); // เราจะรีไปยังหน้าการยืนยันตัวตนผ่านระบบ OTP ของธนาคารนั้น ๆ
			}
		}else{
			redirect('Order');
		}
	}

	public function payment(){
		$invoice = $this->uri->segment(3); // ใช้ ref_id คิวรี่หา charge_id แล้วใช้หาค่า status ว่า transaction นี้สำเร็จหรือไม่สำเร็จ
		if($invoice){
			$result = $this->Ordermodel->getOrderByInvoice($invoice);
			//$charge = OmiseCharge::retrieve($result->charge_id);
			if($result->payment_status === 'successful') {
				echo 'เงินเข้าบัญชีเรียบร้อยแล้ว';
			}else{
				echo 'อาจจะ failed หรือ pending อยู่';
			}
		}else{
			redirect('Order');
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
