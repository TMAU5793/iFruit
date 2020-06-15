<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newspromotion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Newspromotionmodel');
   		$this->load->library('form_validation');
   		$this->load->library('pagination');
	   	if(!$this->session->userdata('logged_in')){
		   	redirect('admin/Login');
		}
	}

	public function index()
	{
		$data['total_num']=$this->Newspromotionmodel->getPromotionTotal();
		$config['base_url'] = base_url()."admin/Newspromotion/page";
		$config['total_rows'] = $this->Newspromotionmodel->getPromotionTotal();
		$config['per_page'] =25;
		$config['num_links'] =9;
		$data['start']=0;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['first_link'] = "<span aria-hidden=\"true\">&laquo;</span>";
		$config['last_link'] = "<span aria-hidden=\"true\">&raquo;</span>";
		$this->pagination->initialize($config);
		if($this->uri->segment(4)!=false){
			$data['start']=$this->uri->segment(4);
		}
		$data['info'] = $this->Newspromotionmodel->getPromotion($data['start']);
		if($this->uri->segment(4)){
			$data['page'] = "/".$this->uri->segment(4);
		}else{
			$data['page'] = "";
		}
		$hdata['meta_title'] = 'New & Promotion';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/newspromotion',$data);
		$this->load->view('admin/footer');
	}

	public function page()
	{
		$data['total_num']=$this->Newspromotionmodel->getPromotionTotal();
		$config['base_url'] = base_url()."admin/Newspromotion/page";
		$config['total_rows'] = $this->Newspromotionmodel->getPromotionTotal();
		$config['per_page'] =25;
		$config['num_links'] =9;
		$data['start']=0;
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		$config['first_link'] = "<span aria-hidden=\"true\">&laquo;</span>";
		$config['last_link'] = "<span aria-hidden=\"true\">&raquo;</span>";
		$this->pagination->initialize($config);
		if($this->uri->segment(4)!=false){
			$data['start']=$this->uri->segment(4);
		}
		$data['info'] = $this->Newspromotionmodel->getPromotion($data['start']);
		if($this->uri->segment(4)){
			$data['page'] = "/".$this->uri->segment(4);
		}else{
			$data['page'] = "";
		}
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/newspromotion',$data);
		$this->load->view('admin/footer');
	}

	public function form()
	{
		$data['action'] = "create";
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/newspromotion-form',$data);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Newspromotionmodel->addPromotion($this->input->post());
			if ($result) {
				redirect('admin/Newspromotion');
			}
		}else{
			$data['action'] = "create";
			$data['infotype'] = $this->input->post('txt_type');
			$this->load->view('admin/header');
			$this->load->view('admin/nav-menu');
			$this->load->view('admin/newspromotion-form',$data);
			$this->load->view('admin/footer');
		}
	}

	public function edit()
	{
		$data['action'] = "update";
		$data['info'] = $this->Newspromotionmodel->getPromotionById($this->uri->segment(4));
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/newspromotion-form',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Newspromotionmodel->updatePromotion($this->input->post());
			if ($result) {
				redirect('admin/Newspromotion');
			}
		}else{
			$hd_id = $this->input->post('hd_id');
			if($hd_id!=""){
				$data['action'] = "update";
				$data['info'] = $this->Newspromotionmodel->getPromotionById($this->input->post('hd_id'));
				$this->load->view('admin/header');
				$this->load->view('admin/nav-menu');
				$this->load->view('admin/newspromotion-form',$data);
				$this->load->view('admin/footer');
			}else{
				redirect('admin/Newspromotion');
			}
		}
	}

	public function Delete(){
		$del = $this->Newspromotionmodel->Delete($this->input->post('id'));
		if($del){
			$this->load->helper("file");
			$files=glob("uploads/newspromotion/".$this->input->post('id')."/*");
			foreach($files as $file){ 
				if(is_file($file)){
					unlink($file);
			  	}
			}
			rmdir("uploads/newspromotion/".$this->input->post('id'));
		}	
	}
	public function UpdateStatus(){
		$data = $this->Newspromotionmodel->UpdateStatus($this->input->post('id'),$this->input->post('status'));		
	}
	public function DeleteAll(){
		$this->load->helper("file");
		$data=$this->input->post();
		for($n=0;$n<count($data['cb_blogs']);$n++){
			$this->Newspromotionmodel->Delete($data['cb_blogs'][$n]);
			$files=glob("uploads/newspromotion/".$data['cb_blogs'][$n]."/*");
			$banners=glob("uploads/newspromotion/".$data['cb_blogs'][$n]."/banner/*");
			foreach($files as $file){ 
				if(is_file($file)){
					unlink($file);
				}
			}
			foreach($banners as $banner){ 
				if(is_file($banner)){
					unlink($banner);
			  	}
			}
			rmdir("uploads/newspromotion/".$data['cb_blogs'][$n]."/banner");
			rmdir("uploads/newspromotion/".$data['cb_blogs'][$n]);
		}
	}

	public function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_name',
				'label'=>'ชื่อโปรโมชั่น',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'hd_thumbnail',
				'label'=>'รูป',
				'rules'=>'trim|required'
			)
		);
		$this->form_validation->set_rules($ar);
		$this->form_validation->set_message('required','{field} กรุณากรอกข้อมูล');
		if ($this->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
		}
	}
}