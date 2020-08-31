<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Cart extends REST_Controller
{
   public function __construct() {
      parent::__construct();
		$this->load->model('Utilitymodel');
		$this->load->library('cart');

   }
   public function error()
   {
      $this->response(array('error' => 'Cannot find data !'), 404);
   }

   function delItem_post(){
		$rowid = $this->input->post('row_id');
		$qty = 0;
		foreach($this->cart->contents() as $item){
			if($item['rowid']==$rowid){
				if($item['qty'] > 1){
					$qty = $item['qty']-1;
				}else{
					$qty = 1;
				}
			}
		}
		$data = array(
			'rowid' => $rowid, 
			'qty' => $qty,
		);
		$this->cart->update($data);
		$this->response($this->cart->contents());
	}

	function addItem_post(){
		$rowid = $this->input->post('row_id');
		$qty = 0;
		foreach($this->cart->contents() as $item){
			if($item['rowid']==$rowid){
				$qty = $item['qty']+1;
			}
		}
		$data = array(
			'rowid' => $rowid, 
			'qty' => $qty,
		);
		$this->cart->update($data);
		$this->response($this->cart->contents());
	}

	function changeItem_post(){
		$qty =  $this->input->post('val');
		if($qty > 0){
			$data = array(
				'rowid' => $this->input->post('row_id'), 
				'qty' => $qty
			);
		}else{
			$data = array(
				'rowid' => $this->input->post('row_id'), 
				'qty' => 1
			);
		}
		$this->cart->update($data);
		$this->response($this->cart->contents());
	}

	function removeItem_post(){ 
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0,
		);
		if($this->cart->update($data)){
			$this->response($this->cart->contents());
		}
	}

	function shippingRate_get()
	{
		$id = $this->input->get('id');
		$item = $this->input->get('item');
		if($_GET && is_numeric($id) && is_numeric($item) && $id > 0 && $item > 0){
			$result = $this->Utilitymodel->getShippingPrice($id,$item);
			if($result){
				$this->response($result);
			}else{
				$this->error();
			}
		}else{
			redirect('Order');
		}
	}

	function amphures_post()
	{
		$id = $this->input->post('id');
		if($_POST && is_numeric($id) && $id > 0){
			$result = $this->Utilitymodel->getAmphuresByProvince($id);
			if($result){
				$this->response($result);
			}else{
				$this->error();
			}
		}else{
			redirect('Cart/shipping');
		}
	}

	function districts_post()
	{
		$id = $this->input->post('id');
		if($_POST && is_numeric($id) && $id > 0){
			$result = $this->Utilitymodel->getDistrictsByAmphure($id);
			if($result){
				$this->response($result);
			}else{
				$this->error();
			}
		}else{
			redirect('Cart/shipping');
		}
	}

	function postcode_post()
	{
		$id = $this->input->post('id');
		if($_POST && is_numeric($id) && $id > 0){
			$result = $this->Utilitymodel->getDistrictsById($id);
			if($result){
				$this->response($result);
			}else{
				$this->error();
			}
		}else{
			redirect('Cart/shipping');
		}
	}
}
