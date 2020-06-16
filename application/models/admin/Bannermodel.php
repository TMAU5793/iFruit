<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Bannermodel extends CI_Model{
      function addBanner($data)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }
         $date = new DateTime();
         $data_info=array(
            'name'=>strip_tags($data['txt_name']),
            'page'=>strip_tags($data['ddl_page']),
            'status'=>strip_tags($data['ddl_status']),
            'rec_by'=>$session_data['account'],
            'rec_date'=>date_format($date, 'Y-m-d H:i:s'),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_banner",$data_info)){
            $new_id = $this->db->insert_id();
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])){          
               if (!is_dir('uploads/banner/'.$new_id)) {
                  mkdir('uploads/banner/'.$new_id, 0777, TRUE);
                  $this->Upload($new_id,"thumbnail",1920,1080);
               }else{
                  $this->Upload($new_id,"thumbnail",1920,1080);
               }
            }
            if(isset($_FILES['thumbnail_mobile']['name']) && !empty($_FILES['thumbnail_mobile']['name'])){          
               if (!is_dir('uploads/banner/'.$new_id)) {
                  mkdir('uploads/banner/'.$new_id, 0777, TRUE);             
                  $this->UploadMobile($new_id,"thumbnail_mobile",1000,650);
               }else{
                  $this->UploadMobile($new_id,"thumbnail_mobile",1000,650);
               }
            }
            return true;            
         }else{
            return false;
         }
      }

      public function updateBanner($data)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }
         $date = new DateTime();
         $data_info=array(
            'name'=>strip_tags($data['txt_name']),
            'page'=>strip_tags($data['ddl_page']),
            'status'=>strip_tags($data['ddl_status']),
            'status'=>strip_tags($data['ddl_status']),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("id",$data['hd_id']);
         if($this->db->update("tbl_banner",$data_info)){
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
               if (!is_dir('uploads/banner/'.$data['hd_id'])) {
                  mkdir('uploads/banner/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"thumbnail",1920,1080);
               }else{
                  $this->Upload($data['hd_id'],"thumbnail",1920,1080);
                  if(file_exists($data['img_remove'])){
                     unlink($data['img_remove']);
                  }
               }
            }
            if(isset($_FILES['thumbnail_mobile']['name']) && !empty($_FILES['thumbnail_mobile']['name'])) {
               if (!is_dir('uploads/banner/'.$data['hd_id'])) {
                  mkdir('uploads/banner/'.$data['hd_id'], 0777, TRUE);               
                  $this->UploadMobile($data['hd_id'],"thumbnail_mobile",1000,650);        
               }else{
                  $this->UploadMobile($data['hd_id'],"thumbnail_mobile",1000,650);
                  if(file_exists($data['img_remove_mb'])){
                     unlink($data['img_remove_mb']);
                  }
               }
            }
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
         if($this->db->update("tbl_banner",$data_info)){
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
         $m_config['upload_path'] ='uploads/banner/'.$id;
         $m_config['allowed_types'] = 'jpg|png';
         $m_config['max_size']    = '5000000';
         $m_config['max_width']  = '5000';
         $m_config['max_height']  = '5000';
         $m_config['file_name']  = "desktop-".md5($id);
         $this->upload->initialize($m_config);       
         if (!$this->upload->do_upload($file)){
            echo $this->upload->display_errors();
            $fname='';
         }else{
            $data_upload= $this->upload->data();
            $fname=$data_upload['file_name'];
            $filesize ='uploads/banner/'.$id."/".$fname;  //add New  set file path
            list($width, $height) = getimagesize($filesize); //add New  Check image size
            $path='uploads/banner/'.$id."/".$fname;  //add New  set path for create image
            if($width>$w){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/banner/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'width'; // add new set dimansions fix width
               $m_config2['width'] = $w;
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/banner/'.$id."/".$fname;          
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
               $m_config2['source_image'] ='uploads/banner/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'height'; // add new set dimansions fix width
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/banner/'.$id."/".$fname;          
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
               "images_desktop"=>'uploads/banner/'.$id."/".$fname
            );
            $this->db->where("id",$id);
            $this->db->update("tbl_banner",$data_info_file);
         }
      }

      public function UploadMobile($id,$file,$w,$h)
      {
         $this->load->library('upload');
         $this->load->library('createimage'); // load Image library
         $this->load->library('image_lib');
         $m_config['upload_path'] ='uploads/banner/'.$id;
         $m_config['allowed_types'] = 'jpg|png';
         $m_config['max_size']    = '5000000';
         $m_config['max_width']  = '5000';
         $m_config['max_height']  = '5000';
         $m_config['file_name']  = "mobile-".md5($id);
         $this->upload->initialize($m_config);       
         if (!$this->upload->do_upload($file)){
            echo $this->upload->display_errors();
            $fname='';
         }else{
            $data_upload= $this->upload->data();
            $fname=$data_upload['file_name'];
            $filesize ='uploads/banner/'.$id."/".$fname;  //add New  set file path
            list($width, $height) = getimagesize($filesize); //add New  Check image size
            $path='uploads/banner/'.$id."/".$fname;  //add New  set path for create image
            if($width>$w){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/banner/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'width'; // add new set dimansions fix width
               $m_config2['width'] = $w;
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/banner/'.$id."/".$fname;          
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
               $m_config2['source_image'] ='uploads/banner/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'height'; // add new set dimansions fix width
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/banner/'.$id."/".$fname;          
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
               "images_mobile"=>'uploads/banner/'.$id."/".$fname
            );
            $this->db->where("id",$id);
            $this->db->update("tbl_banner",$data_info_file);
         }
      }

      public function getBannerTotal()
      {
         $this->db->select('*');
         $this->db->from('tbl_banner');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->num_rows();
         }else{
            return false;
         }
      }

      public function getBanner($start,$limit=25)
      {
         $this->db->select('*');
         $this->db->from('tbl_banner');
         $this->db->limit($limit,$start);
         $this->db->order_by('page','ASC');
         $this->db->order_by('rec_date','DESC');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function getBannerById($id)
      {
         $this->db->select('*');
         $this->db->from('tbl_banner');
         $this->db->where('id',$id);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->row();
         }else{
            return false;
         }
      }

      public function getBannerByPage($page)
      {
         $this->db->select('*');
         $this->db->from('tbl_banner');
         $this->db->where('page',$page);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function Delete($code)
      {
         $this->db->where('id', $code);
         if($this->db->delete('tbl_banner')){
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
         $this->db->from('tbl_banner');
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
         $this->db->from('tbl_banner');
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