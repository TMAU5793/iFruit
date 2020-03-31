<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newspromotion extends CI_Controller {
	public function index()
	{
      $this->load->view('common/header');
      $this->load->view('newspromotion');
      $this->load->view('common/footer');
	}

	public function description()
	{
		$this->load->view('common/header');
      $this->load->view('newspromotion-desc');
      $this->load->view('common/footer');
	}
}
