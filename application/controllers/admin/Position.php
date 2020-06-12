<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends CI_Controller {
	function __construct()
	{
		parent::__construct();
      $this->load->model('admin/Positionmodel');
      $this->load->model('admin/Employeemodel');
      $this->load->library('form_validation');
      $this->load->library('pagination');
      if(!$this->session->userdata('logged_in')){
         redirect('admin/Login');
		}
	}

	public function index()
	{
		$data['total_num']=$this->Positionmodel->getPositionTotal();
		$config['base_url'] = base_url()."admin/Position/page";
		$config['total_rows'] = $this->Positionmodel->getPositionTotal();
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
		$data['info'] = $this->Positionmodel->getPosition($data['start']);
		if($this->uri->segment(4)){
			$data['page'] = "/".$this->uri->segment(4);
		}else{
			$data['page'] = "";
		}
		$hdata['meta_title'] = 'Executive';
		$this->load->view('admin/header',$hdata);
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/position',$data);
		$this->load->view('admin/footer');
	}

	public function page()
	{
		$data['total_num']=$this->Positionmodel->getPositionTotal();
		$config['base_url'] = base_url()."admin/Position/page";
		$config['total_rows'] = $this->Positionmodel->getPositionTotal();
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
		$data['info'] = $this->Positionmodel->getPosition($data['start']);
		if($this->uri->segment(4)){
			$data['page'] = "/".$this->uri->segment(4);
		}else{
			$data['page'] = "";
		}
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/position',$data);
		$this->load->view('admin/footer');
	}

	public function Filter()
	{
		if($this->input->post('txt_title')=="" && $this->input->post('ddl_recommend')==""){			
			redirect('admin/Position');
		}else{
			$data['total_num']=$this->Positionmodel->FilterTotal($this->input->post());
			$config['base_url'] = base_url()."admin/Position/page";
			$config['total_rows'] = $this->Positionmodel->FilterTotal($this->input->post());
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
			$data['info'] = $this->Positionmodel->Filter($data['start'],$this->input->post());
			if($this->uri->segment(4)){
				$data['page'] = "/".$this->uri->segment(4);
			}else{
				$data['page'] = "";
			}
			$this->load->view('admin/header');
			$this->load->view('admin/nav-menu');
			$this->load->view('admin/position',$data);
			$this->load->view('admin/footer');		
		}
	}

	public function form()
	{
		$data['action'] = "create";
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/position-form',$data);
		$this->load->view('admin/footer');
	}

	public function create()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Positionmodel->addPosition($this->input->post());
			if ($result) {
				redirect('admin/Position');
			}
		}else{
			$data['action'] = "create";
			$this->load->view('admin/header');
			$this->load->view('admin/nav-menu');
			$this->load->view('admin/position-form',$data);
			$this->load->view('admin/footer');
		}
	}

	public function edit()
	{
		$data['action'] = "update";
		$data['info'] = $this->Positionmodel->getPositionById($this->uri->segment(4));
		$this->load->view('admin/header');
		$this->load->view('admin/nav-menu');
		$this->load->view('admin/position-form',$data);
		$this->load->view('admin/footer');
	}

	public function update()
	{
		if ($this->ChackValidateForm()) {
			$result = $this->Positionmodel->updatePosition($this->input->post());
			if ($result) {
				redirect('admin/Position');
			}
		}else{
			$hd_id = $this->input->post('hd_id');
			if($hd_id!=""){
				$data['action'] = "update";
				$data['info'] = $this->Positionmodel->getPositionById($this->input->post('hd_id'));
				$this->load->view('admin/header');
				$this->load->view('admin/nav-menu');
				$this->load->view('admin/position-form',$data);
				$this->load->view('admin/footer');
			}else{
				redirect('admin/Position');
			}
		}
	}

	public function Delete(){
      if($_POST){
         $del = $this->Positionmodel->Delete($this->input->post('id'));
         if($del){
            $emp = $this->Employeemodel->getEmployeeByPosition($del);
            $this->load->helper("file");
            foreach($emp as $item){
               $delemp = $this->Employeemodel->Delete($item['id']);
               if($delemp){
                  $files=glob("uploads/employee/".$item['id']."/*");
                  foreach($files as $file){ 
                     if(is_file($file)){
                        unlink($file);
                     }
                  }
                  rmdir("uploads/employee/".$item['id']);
               }
            }
         }
      }else{
         redirect('admin/Position');
      }
   }
   
	public function Recommended(){
		$data = $this->Positionmodel->Recommended($this->input->post('id'),$this->input->post('status'));		
	}
	public function UpdateStatus(){
		$data = $this->Positionmodel->UpdateStatus($this->input->post('id'),$this->input->post('status'));		
	}	

	public function ChackValidateForm(){
		$ar=array(
			array(
				'field'=>'txt_position',
				'label'=>'ชื่อตำแหน่ง',
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