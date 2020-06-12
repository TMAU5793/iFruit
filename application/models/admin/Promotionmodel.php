<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Promotionmodel extends CI_Model{
      function addPromotion($data)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'title'=>strip_tags($data['txt_title']),
            'short_desc'=>$data['txt_shortdesc'],
            'description'=>$data['txt_description'],
            'status'=>strip_tags($data['ddl_status']),
            'rec_by'=>$session_data['account'],
            'pt_recdate'=>date_format($date, 'Y-m-d H:i:s'),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_promotion",$data_info)){
            $new_id = $this->db->insert_id();
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])){          
               if (!is_dir('uploads/promotion/'.$new_id)) {
                  mkdir('uploads/promotion/'.$new_id, 0777, TRUE);             
                  $this->Upload($new_id,"thumbnail");            
               }
            }
            return true;            
         }else{
            return false;
         }
      }

      public function updatePromotion($data)
      {
        if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'title'=>strip_tags($data['txt_title']),
            'short_desc'=>$data['txt_shortdesc'],
            'description'=>$data['txt_description'],
            'status'=>strip_tags($data['ddl_status']),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("id",$data['hd_id']);
         if($this->db->update("tbl_promotion",$data_info)){
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
               if (!is_dir('uploads/promotion/'.$data['hd_id'])) {
                  mkdir('uploads/promotion/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"thumbnail");        
               }else{
                  $this->Upload($data['hd_id'],"thumbnail");
                  if(file_exists($data['hd_file_img'])){
                     unlink($data['hd_file_img']);
                  }
               }
            }
            return true;
         }else{
            return false;
         }
      }

      public function Upload($id,$file)
      {
         $this->load->library('upload');
         $this->load->library('createimage'); // load Image library
         $this->load->library('image_lib');
         $m_config['upload_path'] ='uploads/promotion/'.$id;
         $m_config['allowed_types'] = 'jpg|png';
         $m_config['max_size']    = '5000000';
         $m_config['max_width']  = '5000';
         $m_config['max_height']  = '5000';
         $m_config['file_name']  = "thumb-".md5($id);
         $this->upload->initialize($m_config);       
         if (!$this->upload->do_upload($file)){
            echo $this->upload->display_errors();
            $fname='';
         }else{
            $data_upload= $this->upload->data();
            $fname=$data_upload['file_name'];
            $filesize ='uploads/promotion/'.$id."/".$fname;  //add New  set file path
            list($width, $height) = getimagesize($filesize); //add New  Check image size
            $path='uploads/promotion/'.$id."/".$fname;  //add New  set path for create image
            if($width>384){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/promotion/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'width'; // add new set dimansions fix width
               $m_config2['width'] = 384;
               $m_config2['height'] = 500;
               $m_config2['new_image'] ='uploads/promotion/'.$id."/".$fname;          
               $this->image_lib->initialize($m_config2);
               if(!$this->image_lib->resize())
               { 
                  $response = $this->upload->display_errors();
               }else{
                  $this->createimage->createlarg($path,384,500);
                  $response = $this->upload->data();
               }
            }else if($height>500){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/promotion/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'height'; // add new set dimansions fix width
               $m_config2['height'] = 384;
               $m_config2['new_image'] ='uploads/promotion/'.$id."/".$fname;          
               $this->image_lib->initialize($m_config2);
               if(!$this->image_lib->resize())
               { 
                  $response = $this->upload->display_errors();
               }else{
                  $this->createimage->createlarg($path,384,500);
                  $response = $this->upload->data();
               }
            }else{
               $this->createimage->createlarg($path,384,500);
               $response = $this->upload->data();
            }
            $data_info_file=array(
               "thumbnail"=>'uploads/promotion/'.$id."/".$fname
            );
            $this->db->where("id",$id);
            $this->db->update("tbl_promotion",$data_info_file);
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
         if($this->db->update("tbl_promotion",$data_info)){
            return true;
         }else{
            return false;
         }
      }      

      public function getPromotionTotal()
      {
         $this->db->select('*');
         $this->db->from('tbl_promotion');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->num_rows();
         }else{
            return false;
         }
      }

      public function getPromotion($start,$limit=25)
      {
         $this->db->select('*');
         $this->db->from('tbl_promotion');
         $this->db->limit($limit,$start);
         $this->db->order_by('pt_recdate','DESC');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getPromotionById($id)
      {
         $this->db->select('*');
         $this->db->from('tbl_promotion');
         $this->db->where('pt_id',$id);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
      }

      public function Delete($code)
      {
         $this->db->where('pt_id', $code);
         if($this->db->delete('tbl_promotion')){
            return true;
         }else{
            return false;
         }
      }
      
      public function FilterTotal($data)
      {
         $keyword = $data['txt_title'];
         $recommend = $data['ddl_recommend'];
         $this->db->select('*');
         $this->db->from('tbl_promotion');
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
         $this->db->from('tbl_promotion');
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