<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newspromotion extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}

	public function index()
	{
		$hdata['metatitle'] = 'News & Promotion';
		$data['info'] = $this->Utilitymodel->getNewsPromotion();
      $this->load->view('common/header',$hdata);
      $this->load->view('newspromotion',$data);
      $this->load->view('common/footer');
	}

	public function detail()
	{
		$data['info'] = $this->Utilitymodel->getNewsPromotionById($this->uri->segment(3));
		$hdata['metatitle'] = $data['info']->np_name;
		$this->load->view('common/header',$hdata);
      $this->load->view('newspromotion-desc',$data);
      $this->load->view('common/footer');
	}
}
