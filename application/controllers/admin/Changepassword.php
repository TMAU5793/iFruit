<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Optionmodel');
      $this->load->library('form_validation');
      if(!$this->session->userdata('logged_in')){
         redirect('admin/Login');
		}
	}

	public function index()
	{
		$hdata['meta_title'] = 'Nitipeechat Changepassword';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/change-password');
		$this->load->view('admin/footer');
   }

   public function update()
   {
      if ($this->ChackValidateForm()) {
         $update = $this->Optionmodel->GetPassword($this->input->post('hd_id'),$this->input->post('txt_password_old'));
			if ($update) {
				$result = $this->Optionmodel->Updatepassword($this->input->post());
				if ($result) {
					redirect('admin/Employee');
				}
			}else{
				$data['action'] = "admin/Admin/update";
				$data['pass_err'] = "*รหัสผ่านเดิมไม่ถูกต้อง";
				$this->load->view('admin/header');
				$this->load->view('admin/change-password',$data);
				$this->load->view('admin/footer');
			}
      }else{
         $hdata['meta_title'] = 'Nitipeechat Changepassword';
         $this->load->view('admin/header',$hdata);
         $this->load->view('admin/nav-menu');
         $this->load->view('admin/change-password');
         $this->load->view('admin/footer');
      }
   }

   public function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_password_old',
				'label'=>'รหัสผ่านเก่า',
				'rules'=>'trim|required'
         ),
         array(
				'field'=>'txt_password_new',
				'label'=>'รหัสผ่านใหม่',
				'rules'=>'trim|required'
         ),
         array(
				'field'=>'txt_password_confirm',
				'label'=>'ยืนยันรหัสผ่านใหม่',
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