<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Loginmodel','',TRUE);
	}

	public function index()
	{
		$this->load->helper(array('form'));
		$data['fail_login']="";
   	$data['action']="Login/Verifylogin";
		$this->load->view('admin/login',$data);
	}

	function Verifylogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_account', 'account', 'trim|required');
		$this->form_validation->set_rules('txt_password', 'password', 'trim|required|callback_check_database');

		if($this->form_validation->run() == FALSE)
		{
			$data['action']="Verifylogin";
			$this->load->view('admin/login',$data);
		}else{
			redirect('admin/Product');
		}
	}

	function check_database($password)
	{
		$account = $this->input->post('txt_account');
		$result = $this->Loginmodel->login($account, $password);
		if($result)
		{
			$sess_array = array(
				'id' => $result->id,
				'name' => $result->name,
				'account' => $result->account,
				'profile' => $result->profile,
				'last_login' => $result->last_login
			);
			$this->session->set_userdata('logged_in',$sess_array);
			$this->Loginmodel->UpdateLogin($result->id);
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง');
			return false;
		}
	}
}