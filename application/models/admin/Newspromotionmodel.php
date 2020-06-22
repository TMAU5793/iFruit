<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Newspromotionmodel extends CI_Model{
      function addPromotion($data)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $date_p = explode('-',$data['txt_datepromotion']);
         $data_info=array(
            'np_type'=>strip_tags($data['txt_type']),
            'np_name'=>strip_tags($data['txt_name']),
            'np_link'=>strip_tags($data['txt_link']),
            'np_shortdesc'=>$data['txt_shortdesc'],
            'np_description'=>$data['txt_description'],
            'np_status'=>strip_tags($data['ddl_status']),
            'np_start'=>$date_p[0],
            'np_end'=>$date_p[1],
            'np_recby'=>$session_data['account'],
            'np_recdate'=>date_format($date, 'Y-m-d H:i:s'),
            'np_update_by'=>$session_data['account'],
            'np_update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_newspromotion",$data_info)){
            $new_id = $this->db->insert_id();
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])){          
               if (!is_dir('uploads/newspromotion/'.$new_id)) {
                  mkdir('uploads/newspromotion/'.$new_id, 0777, TRUE);
                  $this->Upload($new_id,"thumbnail",450,450);
               }else{
                  $this->Upload($new_id,"thumbnail",450,450);
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
         $date_p = explode('-',$data['txt_datepromotion']);
         $data_info=array(
            'np_type'=>strip_tags($data['txt_type']),
            'np_name'=>strip_tags($data['txt_name']),
            'np_link'=>strip_tags($data['txt_link']),
            'np_shortdesc'=>$data['txt_shortdesc'],
            'np_description'=>$data['txt_description'],
            'np_status'=>strip_tags($data['ddl_status']),
            'np_start'=>$date_p[0],
            'np_end'=>$date_p[1],
            'np_update_by'=>$session_data['account'],
            'np_update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("np_id",$data['hd_id']);
         if($this->db->update("tbl_newspromotion",$data_info)){
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
               if (!is_dir('uploads/newspromotion/'.$data['hd_id'])) {
                  mkdir('uploads/newspromotion/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"thumbnail",450,450);        
               }else{
                  $this->Upload($data['hd_id'],"thumbnail",450,450);
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

      public function Upload($id,$file,$w,$h)
      {
         $this->load->library('upload');
         $this->load->library('createimage'); // load Image library
         $this->load->library('image_lib');
         $m_config['upload_path'] ='uploads/newspromotion/'.$id;
         $m_config['allowed_types'] = 'jpg|png';
         $m_config['max_size']    = '5000000';
         $m_config['max_width']  = '5000';
         $m_config['max_height']  = '5000';
         $m_config['file_name']  = "np-".md5($id);
         $this->upload->initialize($m_config);       
         if (!$this->upload->do_upload($file)){
            echo $this->upload->display_errors();
            $fname='';
         }else{
            $data_upload= $this->upload->data();
            $fname=$data_upload['file_name'];
            $filesize ='uploads/newspromotion/'.$id."/".$fname;  //add New  set file path
            list($width, $height) = getimagesize($filesize); //add New  Check image size
            $path='uploads/newspromotion/'.$id."/".$fname;  //add New  set path for create image
            if($width>$w){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/newspromotion/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'width'; // add new set dimansions fix width
               $m_config2['width'] = $w;
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/newspromotion/'.$id."/".$fname;          
               $this->image_lib->initialize($m_config2);
               if(!$this->image_lib->resize())
               { 
                  $response = $this->upload->display_errors();
               }else{
                  $this->createimage->createlarg($path,$w,$h);
                  $response = $this->upload->data();
               }
            }else if($height>$h){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/newspromotion/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'height'; // add new set dimansions fix width
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/newspromotion/'.$id."/".$fname;          
               $this->image_lib->initialize($m_config2);
               if(!$this->image_lib->resize())
               { 
                  $response = $this->upload->display_errors();
               }else{
                  $this->createimage->createlarg($path,$w,$h);
                  $response = $this->upload->data();
               }
            }else{
               $this->createimage->createlarg($path,$w,$h);
               $response = $this->upload->data();
            }
            $data_info_file=array(
               "np_thumbnail"=>'uploads/newspromotion/'.$id."/".$fname
            );
            $this->db->where("np_id",$id);
            $this->db->update("tbl_newspromotion",$data_info_file);
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
         if($this->db->update("tbl_newspromotion",$data_info)){
            return true;
         }else{
            return false;
         }
      }      

      public function getPromotionTotal()
      {
         $this->db->select('*');
         $this->db->from('tbl_newspromotion');
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
         $this->db->from('tbl_newspromotion');
         $this->db->limit($limit,$start);
         $this->db->order_by('np_recdate','DESC');
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
         $this->db->from('tbl_newspromotion');
         $this->db->where('np_id',$id);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
      }

      public function Delete($code)
      {
         $this->db->where('np_id', $code);
         if($this->db->delete('tbl_newspromotion')){
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
         $this->db->from('tbl_newspromotion');
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
         $this->db->from('tbl_newspromotion');
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