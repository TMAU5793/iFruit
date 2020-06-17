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

      public function getNewsPromotion()
      {
         $this->db->select('*');
         $this->db->from('tbl_newspromotion');
         $this->db->where('np_status','1');         
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
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
   }
?>