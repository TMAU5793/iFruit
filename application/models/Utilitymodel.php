<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Utilitymodel extends CI_Model{
      public function getBanner($page='home')
      {
         $this->db->select('*');
         $this->db->from('tbl_banner');
         $this->db->where('page',$page);
         $this->db->where('status','1');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getPromotion($type,$limit)
      {
         $date = date_format(new DateTime(), 'Y-m-d');
         $this->db->select('*');
         $this->db->from('tbl_newspromotion');
         if($type!=null){
            $this->db->where('np_type',$type);
         }
         $this->db->where('np_status','1');
         $this->db->where('np_start <=',$date);
         $this->db->where('np_end >=',$date);
         $this->db->limit($limit);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getNews($type,$limit)
      {
         $this->db->select('*');
         $this->db->from('tbl_newspromotion');
         if($type!=null){
            $this->db->where('np_type',$type);
         }
         $this->db->where('np_status','1');
         $this->db->limit($limit);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getNewsPromotion($start=0,$limit=9)
      {
         $this->db->select('*');
         $this->db->from('tbl_newspromotion');
         $this->db->where('np_status','1');
         $this->db->limit($limit,$start);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function countNewsPromotion()
      {
         $this->db->select('np_id');
         $this->db->from('tbl_newspromotion');
         $this->db->where('np_status','1');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->num_rows();
         }else{
            return false;
         }
      }

      public function getNewsPromotionById($id)
      {
         $this->db->select('*');
         $this->db->from('tbl_newspromotion');
         $this->db->where('np_id',$id);         
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
      }

      public function getProduct($limit=null)
      {
         $this->db->select('*');
         $this->db->from('tbl_product');
         $this->db->where('p_status','1');
         if($limit!=null){
            $this->db->limit($limit);
         }
         $this->db->order_by('p_recdate','DESC');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getProductById($id)
      {
         $this->db->select('*');
         $this->db->from('tbl_product');
         $this->db->where('p_id',$id);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
      }

      public function getOptionTable($page)
      {
         $this->db->select('*');
         $this->db->from('tbl_option');
         $this->db->where('page',$page);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
		}

		public function getShipping()
		{
			$this->db->select('*,a.id as cid');
			$this->db->from('tbl_shipping a');
			$this->db->join('tbl_shipping_rate b','b.shipping_id = a.id');
			$this->db->where('a.status','1');
			$this->db->group_by('b.shipping_id');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
		}
		public function getShippingRate()
		{
			$this->db->select('*');
			$this->db->from('tbl_shipping_rate');
         $this->db->where('status','1');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
		}

		public function getShippingPrice($id,$item)
		{
			$this->db->select('*');
			$this->db->from('tbl_shipping_rate');
			$this->db->where('shipping_id',$id);
			$this->db->where('first_qty <=',$item);
			$this->db->where('last_qty >=',$item);
         $this->db->where('status','1');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
		}
   }
?>
