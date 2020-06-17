<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}
	public function index()
	{
		$data['product'] = $this->Utilitymodel->getProduct($limit=2);
      $this->load->view('common/header');
      $this->load->view('product',$data);
      $this->load->view('common/footer');
	}

	public function detail()
	{
		$hdata['nav_class'] = 'nav-brown';
		$hdata['cart_img'] = 'cart.png';
		$data['info'] = $this->Utilitymodel->getProductById($this->uri->segment(3));
		$this->load->view('common/header',$hdata);
      $this->load->view('product-detail',$data);
      $this->load->view('common/footer');
	}
}
