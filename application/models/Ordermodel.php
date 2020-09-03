<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Ordermodel extends CI_Model{
		public function AddOrder($data,$carts,$shipping)
		{
			$this->load->library('user_agent');
			$date = new DateTime();
			$inv = $this->GenerateCode();

			$order_info=array(
				"invoice_no"=>$inv,
				"subtotal"=>$data['hd_subtotal'],
				"nettotal"=>$data['hd_netprice'],
				"shipping_id"=>$shipping->id,
				"shipping_name"=>$shipping->name,
				"shipping_rate"=>$shipping->shipping_rate,
				"ip_address"=>$this->input->ip_address(),
				"rec_by"=>$data['txt_name'],
				"rec_date"=> date_format($date, 'Y-m-d H:i:s'),
				"update_by"=>$data['txt_name'],
				"update_date"=> date_format($date, 'Y-m-d H:i:s')			
			);
			if($this->db->insert("tbl_order",$order_info)){
				$order_id = $this->db->insert_id();
				foreach($carts as $item) {
					$orderdetail_info=array(
					"order_id"=>$order_id,
					"product_id"=>$item['id'],
					"product_name"=>$item['name'],
					"qty"=>$item['qty'],
					"price"=>$item['price']
					);
					$this->db->insert("tbl_order_detail",$orderdetail_info);
				}

				$shipping_info=array(
					"order_id"=>$order_id,
					"cus_name "=>strip_tags($data['txt_name']),
					"cus_tel"=>strip_tags($data['txt_phone']),
					"cus_email"=>strip_tags($data['txt_email']),
					"address"=>strip_tags($data['txt_address']),
					"province"=>strip_tags($data['ddl_province']),
					"amphur"=>strip_tags($data['ddl_amphur']),
					"district"=>strip_tags($data['ddl_district']),
					"zipcode"=>strip_tags($data['txt_postcode'])
				);
				$this->db->insert("tbl_shipping_address",$shipping_info);

				$agent_info=array(
					"order_id"=>$order_id,
					"ip_address "=>$this->input->ip_address(),
					"user_agent"=>$this->agent->agent_string(),
					"accept_lang"=>$this->agent->accept_lang()
				);
				$this->db->insert("tbl_order_chanel",$agent_info);
				$orders = $this->GetOrderById($order_id);
				return $orders;
			}    		
		}

		public function updateOrderPayment($data)
		{
			$date = new DateTime();
			$order_info=array(
				"order_status"=>'2',
				"payment_status"=>'2',
				"charge_id"=>$data['charge_id'],
				"update_date"=> date_format($date, 'Y-m-d H:i:s')			
			);
			$this->db->where("invoice_no",$data['invoice']);
			if($this->db->update("tbl_order",$order_info)){
				return true;
			}else{
				return false;
			}
		}

		public function GetOrderById($id)
		{
			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->where('id',$id);
			$query = $this->db->get();
			if($query->num_rows()>0){
				return $query->row();
			}else{
				return false;
			}
		}

		public function getOrderByInvoice($invoice)
		{
			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->where('invoice_no',$invoice);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
		}

		public function GenerateCode() {
			$date = new DateTime();
			$yymmdd = date_format($date, 'ymd');
			// $datetime_start = date_format($date, 'Y-m-d')." 00:00:00";
			// $datetime_end = date_format($date, 'Y-m-d')." 23:23:59";
			$str="INV";
			$code="INV".$yymmdd."00001";
			$query = $this->db->query("SELECT id FROM tbl_order order by id DESC");
			if($query->num_rows()>0)
			{
				$num = $query->num_rows();
				switch(strlen($num+1)){
					case 1:{$str=$str.$yymmdd."0000".($num+1);}break;
					case 2:{$str=$str.$yymmdd."000".($num+1);}break;
					case 3:{$str=$str.$yymmdd."00".($num+1);}break;
					case 4:{$str=$str.$yymmdd."0".($num+1);}break;
					case 5:{$str=$str.$yymmdd.($num+1);}break;
				}
				return  $str;
			}else{
				return $code;
			}
		}
	}
	
?>
