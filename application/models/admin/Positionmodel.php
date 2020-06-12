<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Positionmodel extends CI_Model{
      function addPosition($data)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'position'=>strip_tags($data['txt_position']),
            'description'=>$data['txt_description'],
            'status'=>strip_tags($data['ddl_status']),
            'rec_by'=>$session_data['account'],
            'rec_date'=>date_format($date, 'Y-m-d H:i:s'),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_position",$data_info)){ 
            return true;            
         }else{
            return false;
         }
      }

      public function updatePosition($data)
      {
        if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'position'=>strip_tags($data['txt_position']),
            'description'=>$data['txt_description'],
            'status'=>strip_tags($data['ddl_status']),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("id",$data['hd_id']);
         if($this->db->update("tbl_position",$data_info)){
            return true;
         }else{
            return false;
         }
      }
      
      public function UpdateStatus($id,$status)
      {
        if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'status'=>strip_tags($status),                    
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("id",$id);
         if($this->db->update("tbl_position",$data_info)){
            return true;
         }else{
            return false;
         }
      }      

      public function getPositionTotal()
      {
         $this->db->select('*');
         $this->db->from('tbl_position');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->num_rows();
         }else{
            return false;
         }
      }

      public function getPosition($start,$limit=25)
      {
         $this->db->select('*');
         $this->db->from('tbl_position');
         $this->db->limit($limit,$start);
         $this->db->order_by('status','DESC');
         $this->db->order_by('rec_date','ASC');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getPositionById($id)
      {
         $this->db->select('*');
         $this->db->from('tbl_position');
         $this->db->where('id',$id);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
      }

      public function Delete($code)
      {
         $this->db->where('id', $code);
         if($this->db->delete('tbl_position')){
            return $code;
         }else{
            return false;
         }
      }
      
      public function FilterTotal($data)
      {
         $keyword = $data['txt_title'];
         $recommend = $data['ddl_recommend'];
         $this->db->select('*');
         $this->db->from('tbl_position');
         if($recommend!="" && $keyword!=""){
            $this->db->like('recommend',$recommend);
            $this->db->like('title',$keyword);
            $this->db->like('title_en',$keyword);
         }
         if ($recommend=="" && $keyword!="") {
            $this->db->like('title',$keyword);
            $this->db->like('title_en',$keyword);
         }
         if ($recommend!="" && $keyword=="") {
            $this->db->like('recommend',$recommend);
         }
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->num_rows();
         }else{
            return false;
         }
      }

      public function Filter($start,$data,$limit=25)
      {
         $keyword = $data['txt_title'];
         $recommend = $data['ddl_recommend'];
         $this->db->select('*');
         $this->db->from('tbl_position');
         if($recommend!="" && $keyword!=""){
            $this->db->where('recommend',$recommend);
            $this->db->like('title',$keyword);
            $this->db->like('title_en',$keyword);
         }
         if ($recommend=="" && $keyword!="") {
            $this->db->like('title',$keyword);
            $this->db->or_like('title_en',$keyword);
         }
         if ($recommend!="" && $keyword=="") {
            $this->db->like('recommend',$recommend);
         }
         $this->db->limit($limit,$start);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

   }
?>