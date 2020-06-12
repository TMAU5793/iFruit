<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Optionmodel');
      $this->load->library('form_validation');
      if(!$this->session->userdata('logged_in')){
         redirect('admin/Login');
		}
	}

	public function form()
	{
		$data['info'] = $this->Optionmodel->getOption('home');
		$hdata['meta_title'] = 'Nitipeechat Home';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		if ($this->ChackValidateForm()) {
         $imgWidth = 370;
         $imgHeight = 406;
         if($this->input->post('hd_id')==""){
            $result = $this->Optionmodel->addContent($this->input->post(),'home',$imgWidth,$imgHeight);
         }else{
            $result = $this->Optionmodel->updateContent($this->input->post(),'home',$imgWidth,$imgHeight);
         }
			if ($result) {
				redirect('admin/Home/form');
			}
		}else{
			redirect('admin/Home/form');
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