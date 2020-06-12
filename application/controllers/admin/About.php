<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
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
		$data['info'] = $this->Optionmodel->getOption('about');
		$hdata['meta_title'] = 'Nitipeechat About';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/about',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		if ($this->ChackValidateForm()) {
         $imgWidth = 1200;
         $imgHeight = 680;
         if($this->input->post('hd_id')==""){
            $result = $this->Optionmodel->addContent($this->input->post(),'about',$imgWidth,$imgHeight);
         }else{
            $result = $this->Optionmodel->updateContent($this->input->post(),'about',$imgWidth,$imgHeight);
         }
			if ($result) {
				redirect('admin/About');
			}
		}else{
			redirect('admin/About');
		}
	}

	public function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_description',
				'label'=>'รายละเอียด',
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