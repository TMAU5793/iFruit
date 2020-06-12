<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Productmodel extends CI_Model{
      function addProduct($data)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'p_name'=>strip_tags($data['txt_name']),
            'p_subtitle'=>strip_tags($data['txt_subtitle']),
            'p_price'=>$data['txt_price'],
            'p_shortdesc'=>$data['txt_shortdesc'],            
            'p_description'=>$data['txt_description'],
            'p_status'=>strip_tags($data['ddl_status']),
            'p_recby'=>$session_data['account'],
            'p_recdate'=>date_format($date, 'Y-m-d H:i:s'),
            'p_update_by'=>$session_data['account'],
            'p_update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_product",$data_info)){
            $new_id = $this->db->insert_id();
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])){          
               if (!is_dir('uploads/product/'.$new_id)) {
                  mkdir('uploads/product/'.$new_id, 0777, TRUE);             
                  $this->Upload($new_id,"thumbnail","p_thumbnail",600,400);
               }else{
                  $this->Upload($new_id,"thumbnail","p_thumbnail",600,400);
               }
            }
            if(isset($_FILES['banner']['name']) && !empty($_FILES['banner']['name'])){          
               if (!is_dir('uploads/product/'.$new_id)) {
                  mkdir('uploads/product/'.$new_id, 0777, TRUE);             
                  $this->Upload($new_id,"banner","p_banner",1920,1080);
               }else{
                  $this->Upload($new_id,"banner","p_banner",1920,1080);
               }
            }
            if(isset($_FILES['thumb_buy']['name']) && !empty($_FILES['thumb_buy']['name'])){
               if (!is_dir('uploads/product/'.$new_id)) {
                  mkdir('uploads/product/'.$new_id, 0777, TRUE);
                  $this->Upload($new_id,"thumb_buy","p_thumbnail_buy",500,560);
               }else{
                  $this->Upload($new_id,"thumb_buy","p_thumbnail_buy",500,560);
               }
            }
            return true;
         }else{
            return false;
         }
      }

      public function updateProduct($data)
      {
        if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'p_name'=>strip_tags($data['txt_name']),
            'p_subtitle'=>strip_tags($data['txt_subtitle']),
            'p_price'=>$data['txt_price'],
            'p_shortdesc'=>$data['txt_shortdesc'],            
            'p_description'=>$data['txt_description'],
            'p_status'=>strip_tags($data['ddl_status']),
            'p_update_by'=>$session_data['account'],
            'p_update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("p_id",$data['hd_id']);
         if($this->db->update("tbl_product",$data_info)){
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
               if (!is_dir('uploads/product/'.$data['hd_id'])) {
                  mkdir('uploads/product/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"thumbnail","p_thumbnail",600,400);
               }else{
                  $this->Upload($data['hd_id'],"thumbnail","p_thumbnail",600,400);
                  if(file_exists($data['hd_file_img'])){
                     unlink($data['hd_file_img']);
                  }
               }
            }
            if(isset($_FILES['banner']['name']) && !empty($_FILES['banner']['name'])) {
               if (!is_dir('uploads/product/'.$data['hd_id'])) {
                  mkdir('uploads/product/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"banner","p_banner",1920,1080);
               }else{
                  $this->Upload($data['hd_id'],"banner","p_banner",1920,1080);
                  if(file_exists($data['hd_banner'])){
                     unlink($data['hd_banner']);
                  }
               }
            }
            if(isset($_FILES['thumb_buy']['name']) && !empty($_FILES['thumb_buy']['name'])) {
               if (!is_dir('uploads/product/'.$data['hd_id'])) {
                  mkdir('uploads/product/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"thumb_buy","p_thumbnail_buy",500,560);
               }else{
                  $this->Upload($data['hd_id'],"thumb_buy","p_thumbnail_buy",500,560);
                  if(file_exists($data['hd_thumb_buy'])){
                     unlink($data['hd_thumb_buy']);
                  }
               }
            }
            return true;
         }else{
            return false;
         }
      }

      public function Upload($id,$file,$field,$w,$h)
      {
         $this->load->library('upload');
         $this->load->library('createimage'); // load Image library
         $this->load->library('image_lib');
         $m_config['upload_path'] ='uploads/product/'.$id;
         $m_config['allowed_types'] = 'jpg|png';
         $m_config['max_size']    = '5000000';
         $m_config['max_width']  = '5000';
         $m_config['max_height']  = '5000';
         $m_config['file_name']  = "product-".md5($id);
         $this->upload->initialize($m_config);       
         if (!$this->upload->do_upload($file)){
            echo $this->upload->display_errors();
            $fname='';
         }else{
            $data_upload= $this->upload->data();
            $fname=$data_upload['file_name'];
            $filesize ='uploads/product/'.$id."/".$fname;  //add New  set file path
            list($width, $height) = getimagesize($filesize); //add New  Check image size
            $path='uploads/product/'.$id."/".$fname;  //add New  set path for create image
            if($width>$w){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/product/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'width'; // add new set dimansions fix width
               $m_config2['width'] = $w;
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/product/'.$id."/".$fname;          
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
               $m_config2['source_image'] ='uploads/product/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'height'; // add new set dimansions fix width
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/product/'.$id."/".$fname;          
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
               "$field" => 'uploads/product/'.$id."/".$fname
            );
            $this->db->where("p_id",$id);
            $this->db->update("tbl_product",$data_info_file);
         }
      }

      public function Recommended($id,$status)
      {
        if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'recommend'=>strip_tags($status),                    
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("p_id",$id);
         if($this->db->update('tbl_product',$data_info)){
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

         $this->db->where("p_id",$id);
         if($this->db->update("tbl_product",$data_info)){
            return true;
         }else{
            return false;
         }
      }      

      public function getProductTotal()
      {
         $this->db->select('*');
         $this->db->from('tbl_product');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->num_rows();
         }else{
            return false;
         }
      }

      public function getProduct($start,$limit=25)
      {
         $this->db->select('*');
         $this->db->from('tbl_product');
         $this->db->limit($limit,$start);
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

      public function getProductByPosition($pos)
      {
         $this->db->select('*');
         $this->db->from('tbl_product');
         $this->db->where('position',$pos);
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

      public function Delete($code)
      {
         $this->db->where('p_id', $code);
         if($this->db->delete('tbl_product')){
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
         $this->db->from('tbl_product');
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
         $this->db->from('tbl_product');
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

      public function getPosition()
      {
         $this->db->select('*');
         $this->db->from('tbl_position');
         $this->db->where('status','1');
         $this->db->order_by('rec_date','ASC');
         $query=$this->db->get();
         if($query->num_rows()>0){
            return $query->result_array();
         }else{
            return false;
         }
      }

   }
?>