<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}
	public function index()
	{
		$data['info'] = $this->Utilitymodel->getOptionTable($page='about');
      $this->load->view('common/header');
      $this->load->view('about',$data);
      $this->load->view('common/footer');
	}
}
