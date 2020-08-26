<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
   function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}
	public function index()
	{
		$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
		$data['shipping'] = $this->Utilitymodel->getShipping();
		$data['shipping_rate'] = $this->Utilitymodel->getShippingRate();
      $this->load->view('common/header');
      $this->load->view('cart',$data);
      $this->load->view('common/footer',$fdata);
	}
}
