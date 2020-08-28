<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Utilitymodel');
		$this->load->library('cart');
	}

	public function index()
	{
		$data['product'] = $this->Utilitymodel->getProduct($limit=2);
		$fdata['info'] = $this->Utilitymodel->getOptionTable($page='contact');
      $this->load->view('common/header');
      $this->load->view('order',$data);
      $this->load->view('common/footer',$fdata);
	}

	function addTocart(){
		$pid = $this->input->post('product_id');
		$product = $this->Utilitymodel->getProductById($pid);
		if($product){
			
			$data = array(
				'id' => $product->p_id, 
				'name' => $product->p_name, 
				'price' => $product->p_price, 
				'image' => $product->p_thumbnail_buy,
				'qty' => 1
			);
			$this->cart->insert($data);
			echo $this->showCart();
		}else{
			echo "ไม่พบข้อมูลสินค้า";
		}
	}

	function showCart(){ 
		$output = '<div class="arrow"></div>';
		$qtyTotal =0;
		foreach ($this->cart->contents() as $items) {
			$qtyTotal += $items['qty'];
			$output .='				
				<div class="row cartItem">
					<div class="col-md-5">
						<img src="'.$items['image'].'" alt="">
					</div>
					<div class="col-md-7">
						<label>'.$items['name'].'</label>
						<small>ราคาซองละ '.$items['price'].' ฿</small>
						<small>จำนวน '.$items['qty'].' ซอง</small>
						<div id="'.$items['rowid'].'" class="romove_cart"></div>
					</div>
				</div>
			';
		}
		$output .= '
			<div class="row cartItemTotal">
				<div class="col-md-6">
					<strong>ราคาสินค้าทั้งหมด</strong>
				</div>
				<div class="col-md-6 text-right">
					<strong>'.number_format($this->cart->total()).' ฿</strong>
				</div>
				<div class="col-md-6">
					<a href="'.base_url('Cart').'" class="btn-cart">ตะกร้าสินค้า</a>
				</div>
				<div class="col-md-6 text-right">
				<a href="'.base_url('Cart/billing').'" class="btn-buy">สั่งซื้อ</a>
				</div>
			</div>
		';
		return $output;
	  }
	  
	function load_cart(){ 
		echo $this->showCart();
  	}

  	function delete_cart(){ 
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0,
		);
		$this->cart->update($data);
		echo $this->showCart();
	}
	  
	function cartQty(){
		echo $this->cart->total_items();
	}

	function loadTotalPrice()
	{
		echo number_format($this->cart->total());
	}
}
