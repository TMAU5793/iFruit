<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}

	public function index()
	{
		$data['product'] = $this->Utilitymodel->getProduct($limit=2);
      $this->load->view('common/header');
      $this->load->view('order',$data);
      $this->load->view('common/footer');
	}
}
