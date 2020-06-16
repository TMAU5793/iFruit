<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
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
		$data['info'] = $this->Optionmodel->getOption('contact');
		$hdata['meta_title'] = 'iFruit Contact';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/contact',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		if ($this->ChackValidateForm()) {
         if($this->input->post('hd_id')==""){
            $result = $this->Optionmodel->addContact($this->input->post(),'contact');
         }else{
            $result = $this->Optionmodel->updateContact($this->input->post(),'contact');
         }
			if ($result) {
				redirect('admin/Contact');
			}
		}else{
			$data['info'] = $this->Optionmodel->getOption('contact');
         $hdata['meta_title'] = 'iFruit Contact';
         $this->load->view('admin/header',$hdata);
         $this->load->view('admin/nav-menu');
         $this->load->view('admin/contact',$data);
         $this->load->view('admin/footer');
		}
	}

	public function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_address',
				'label'=>'ที่อยู่',
				'rules'=>'trim|required'
         ),
         array(
				'field'=>'txt_email',
				'label'=>'อีเมล',
				'rules'=>'trim|required'
         ),
         array(
				'field'=>'txt_tel',
				'label'=>'เบอร์โทร',
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