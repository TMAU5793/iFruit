<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function index()
	{
      $this->load->view('common/header');
      $this->load->view('product');
      $this->load->view('common/footer');
	}

	public function truffle()
	{
		$data['nav_class'] = 'nav-brown';
		$data['cart_img'] = 'cart.png';
		$this->load->view('common/header',$data);
      $this->load->view('truffle-detail');
      $this->load->view('common/footer');
	}

	public function hotchili()
	{
		$data['nav_class'] = 'nav-white';
		$data['cart_img'] = 'cart-white.png';
		$this->load->view('common/header',$data);
      $this->load->view('hotchili-detail');
      $this->load->view('common/footer');
	}
}
