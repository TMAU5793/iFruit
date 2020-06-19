<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}
	public function index()
	{
		$hdata['metatitle'] = 'Contact iFruit';
		$data['info'] = $this->Utilitymodel->getOptionTable($page='contact');
      $this->load->view('common/header',$hdata);
      $this->load->view('contact',$data);
      $this->load->view('common/footer');
	}
	public function testmail()
	{
		print_r($this->input->post());
		$data['success'] = "success";
	}
	public function sendmail()
	{
		$data = $this->input->post();
		$config = Array(
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'graspasia@gmail.com', // change it to yours
			'smtp_pass' => 'graspasia2012', // change it to yours
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'wordwrap' => TRUE
		);
		$mailto = "thank@grasp.asia";
		$subject = "ติดต่อจากหน้าเว็บ";
		$ms='<div style="width: 800px; margin: auto; border:4px solid #129647; border-radius:10px; padding:20px;">
				<div style="width: 100%;">
					<div style="width: 50%;float:left;">
						<img src="http://ifruitbrand.com/assets/images/logo-footer.png" alt="" style="max-width: 120px;">
						<p class="pt-3">I fruit CO., LTD 645/4 Sukhumvit Road Prakanong, Khlong toei ,Bangkok 10260</p>
					</div>
					<div style="width: 50%;float:left; text-align: right;">
						<strong>ติดต่อจากคุณ : '.$data['txt_name'].'</strong><br>
						<strong>อีเมล : '.$data['txt_email'].'</strong><br>
						<strong>เบอร์โทร : '.$data['txt_phone'].'</strong>
					</div>
				</div>
				<div style="clear:both; float:none;"></div>
				<hr style="margin-top: 0; border:1px solid #129647;">
				<div style="text-align:center;">
					<strong style="display:block; margin-top:15px;"> ติดต่อเรื่อง : '.$data['txt_subject'].'</strong>
					<p>'.$data['txt_message'].'</p>
				</div>
			</div>';
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($data['txt_email'],$data['txt_name']);
		$this->email->to($mailto);
		$this->email->subject($subject);
		$this->email->message($ms);
		if($this->email->send()){
			$data['success'] = "success";
		}else{
			echo $this->email->print_debugger();
		}
	}
}
