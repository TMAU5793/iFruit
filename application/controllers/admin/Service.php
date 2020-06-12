<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
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
		$data['info'] = $this->Optionmodel->getOption('service');
		$hdata['meta_title'] = 'Nitipeechat Service';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/service',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		$imgWidth = 760;
      $imgHeight = 780;
		if ($this->ChackValidateForm()) {
         if($this->input->post('hd_id')==""){
            $result = $this->Optionmodel->addContent($this->input->post(),'service',$imgWidth,$imgHeight);
         }else{
            $result = $this->Optionmodel->updateContent($this->input->post(),'service',$imgWidth,$imgHeight);
         }
			if ($result) {
				redirect('admin/Service');
			}
		}else{
			redirect('admin/Service');
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