<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
	}
	public function index()
	{
		$data['banner'] = $this->Utilitymodel->getBanner('home');
		$data['product'] = $this->Utilitymodel->getProduct($limit=2);
		$limit = 2; //จำกัดการดึงข้อมูล
		//1 คือประเภทข่าวสาร 2 คือประเภทโปรโมชั่น null คือทั้งหมด
		$result = array();
		$news = $this->Utilitymodel->getNews($type=1,$limit);
		if($news){
			for($i=0; $i<count($news); $i++){
				array_push($result,$news[$i]);
			}
		}
		$promotion = $this->Utilitymodel->getPromotion($type=2,$limit);
		if($promotion){
			for($i=0; $i<count($promotion); $i++){
				array_push($result,$promotion[$i]);
			}
		}
		if(count($result) < 4){
			$limit = 4;
		}
		$link = $this->Utilitymodel->getNews($type=3,$limit);
		if($link){
			for($i=0; $i<count($link); $i++){
				array_push($result,$link[$i]);
			}
		}
		$data['newspromotion'] = $result;
		$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
      $this->load->view('common/header');
      $this->load->view('home',$data);
      $this->load->view('common/footer',$fdata);
	}

	public function testdata()
	{
		$limit = 2; //จำกัดการดึงข้อมูล
		//1 คือประเภทข่าวสาร 2 คือประเภทโปรโมชั่น null คือทั้งหมด
		$result = array();
		$news = $this->Utilitymodel->getNews($type=1,$limit);
		if($news){
			for($i=0; $i<count($news); $i++){
				array_push($result,$news[$i]);
			}
		}
		$promotion = $this->Utilitymodel->getPromotion($type=2,$limit);
		if($promotion){
			for($i=0; $i<count($promotion); $i++){
				array_push($result,$promotion[$i]);
			}
		}
	}
}
