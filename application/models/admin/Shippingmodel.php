<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Shippingmodel extends CI_Model{
		public function addItem($tbl,$data)
		{
			if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }
			$date = new DateTime();
			if($tbl=='tbl_shipping'){
				$data_info=array(
					'name'=>strip_tags($data['txt_name']),
					'desc'=>$data['txt_desc'],
					'status'=>strip_tags($data['ddl_status']),
					'rec_by'=>$session_data['account'],
					'rec_date'=>date_format($date, 'Y-m-d H:i:s'),
					'update_by'=>$session_data['account'],
					'update_date'=>date_format($date, 'Y-m-d H:i:s')
				);
			}else{
				$data_info=array(
					'shipping_id'=>strip_tags($data['ddl_shipping']),
					'first_qty'=>strip_tags($data['txt_firstQty']),
					'last_qty'=>strip_tags($data['txt_lastQty']),
					'shipping_rate'=>strip_tags($data['txt_shippingRate']),
					'desc'=>$data['txt_desc'],
					'status'=>strip_tags($data['ddl_status']),
					'rec_by'=>$session_data['account'],
					'rec_date'=>date_format($date, 'Y-m-d H:i:s'),
					'update_by'=>$session_data['account'],
					'update_date'=>date_format($date, 'Y-m-d H:i:s')
				);
			}
         if($this->db->insert($tbl,$data_info)){           
            return true;            
         }else{
            return false;
         }
		}

		public function updateItem($tbl,$data)
		{
			if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }
			$date = new DateTime();
			if($tbl=='tbl_shipping'){
				$data_info=array(
					'name'=>strip_tags($data['txt_name']),
					'desc'=>$data['txt_desc'],
					'status'=>strip_tags($data['ddl_status']),
					'update_by'=>$session_data['account'],
					'update_date'=>date_format($date, 'Y-m-d H:i:s')
				);
			}else{
				$data_info=array(
					'shipping_id'=>strip_tags($data['ddl_shipping']),
					'first_qty'=>strip_tags($data['txt_firstQty']),
					'last_qty'=>strip_tags($data['txt_lastQty']),
					'shipping_rate'=>strip_tags($data['txt_shippingRate']),
					'desc'=>$data['txt_desc'],
					'status'=>strip_tags($data['ddl_status']),
					'update_by'=>$session_data['account'],
					'update_date'=>date_format($date, 'Y-m-d H:i:s')
				);
			}
			$this->db->where("id",$data['hd_id']);
         if($this->db->update($tbl,$data_info)){           
            return true;            
         }else{
            return false;
         }
		}

		public function delItem()
		{
			# code...
		}

		public function getItem($tbl=null)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$query = $this->db->get();
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}

		public function getItemById($tbl,$id)
		{
			$this->db->select('*');
			$this->db->from($tbl);
			$this->db->where('id',$id);
			$query = $this->db->get();
			if($query->num_rows()>0){
				return $query->row();
			}
		}

		public function getCategory()
		{
			$this->db->select('*');
			$this->db->from('tbl_shipping');
			$this->db->where('status','1');
			$query = $this->db->get();
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}
	}

?>
