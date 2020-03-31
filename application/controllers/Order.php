<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function index()
	{
      $this->load->view('common/header');
      $this->load->view('order');
      $this->load->view('common/footer');
	}
}
