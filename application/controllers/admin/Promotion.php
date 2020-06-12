<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Promotionmodel');
   		$this->load->library('form_validation');
   		$this->load->library('pagination');
	   	if(!$this->session->userdata('logged_in')){
		   	redirect('admin/Login');
		}
	}

	public function index()
	{
		$data['total_num']=$this->Promotionmodel->getPromotionTotal();
		$config['base_url'] = base_url()."admin/Promotion/page";
		$config['total_rows'] = $this->Promotionmodel->getPromotionTotal();
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
		$data['info'] = $this->Promotionmodel->getPromotion($data['start']);
		if($this->uri->segment(4)){
			$data['page'] = "/".$this->uri->segment(4);
		}else{
			$data['page'] = "";
		}
		$hdata['meta_title'] = 'Nitipeechat Work';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/promotion',$data);
		$this->load->view('admin/footer');
	}

	public function page()
	{
		$data['total_num']=$this->Promotionmodel->getPromotionTotal();
		$config['base_url'] = base_url()."admin/Promotion/page";
		$config['total_rows'] = $this->Promotionmodel->getPromotionTotal();
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
		$data['info'] = $this->Promotionmodel->getPromotion($data['start']);
		if($this->uri->segment(4)){
			$data['page'] = "/".$this->uri->segment(4);
		}else{
			$data['page'] = "";
		}
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/promotion',$data);
		$this->load->view('admin/footer');
	}

	public function form()
	{
		$data['action'] = "create";
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/promotion-form',$data);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Promotionmodel->addPromotion($this->input->post());
			if ($result) {
				redirect('admin/Promotion');
			}
		}else{
			$data['action'] = "create";
			$this->load->view('admin/header');
			$this->load->view('admin/nav-menu');
			$this->load->view('admin/promotion-form',$data);
			$this->load->view('admin/footer');
		}
	}

	public function edit()
	{
		$data['action'] = "update";
		$data['info'] = $this->Promotionmodel->getPromotionById($this->uri->segment(4));
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/promotion-form',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Promotionmodel->updatePromotion($this->input->post());
			if ($result) {
				redirect('admin/Promotion');
			}
		}else{
			$hd_id = $this->input->post('hd_id');
			if($hd_id!=""){
				$data['action'] = "update";
				$data['info'] = $this->Promotionmodel->getPromotionById($this->input->post('hd_id'));
				$this->load->view('admin/header');
				$this->load->view('admin/nav-menu');
				$this->load->view('admin/promotion-form',$data);
				$this->load->view('admin/footer');
			}else{
				redirect('admin/Promotion');
			}
		}
	}

	public function Delete(){
		$del = $this->Promotionmodel->Delete($this->input->post('id'));
		if($del){
			$this->load->helper("file");
			$files=glob("uploads/promotion/".$this->input->post('id')."/*");
			foreach($files as $file){ 
				if(is_file($file)){
					unlink($file);
			  	}
			}
			rmdir("uploads/promotion/".$this->input->post('id'));
		}	
	}
	public function UpdateStatus(){
		$data = $this->Promotionmodel->UpdateStatus($this->input->post('id'),$this->input->post('status'));		
	}
	public function DeleteAll(){
		$this->load->helper("file");
		$data=$this->input->post();
		for($n=0;$n<count($data['cb_blogs']);$n++){
			$this->Promotionmodel->Delete($data['cb_blogs'][$n]);
			$files=glob("uploads/promotion/".$data['cb_blogs'][$n]."/*");
			$banners=glob("uploads/promotion/".$data['cb_blogs'][$n]."/banner/*");
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
			rmdir("uploads/promotion/".$data['cb_blogs'][$n]."/banner");
			rmdir("uploads/promotion/".$data['cb_blogs'][$n]);
		}
	}

	public function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_title',
				'label'=>'หัวข้อผลงาน',
				'rules'=>'trim|required'
			),
			array(
				'field'=>'txt_shortdesc',
				'label'=>'ประวัติย่อ',
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