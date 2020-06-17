<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

   class Optionmodel extends CI_Model{
      public function addContent($data,$page,$w,$h)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }
         $date = new DateTime();
         $data_info=array(
            'description'=>$data['txt_description'],
            'page'=>$page,
            'rec_by'=>$session_data['account'],
            'rec_date'=>date_format($date, 'Y-m-d H:i:s'),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_option",$data_info)){
            $new_id = $this->db->insert_id();
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])){          
               if (!is_dir('uploads/option/'.$new_id)) {
                  mkdir('uploads/option/'.$new_id, 0777, TRUE);             
                  $this->Upload($new_id,"thumbnail",$w,$h);            
               }
            }
            return true;            
         }else{
            return false;
         }
      }

      public function updateContent($data,$page,$w,$h)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'description'=>$data['txt_description'],
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         $this->db->where("id",$data['hd_id']);
         if($this->db->update("tbl_option",$data_info)){
            if(isset($_FILES['thumbnail']['name']) && !empty($_FILES['thumbnail']['name'])) {
               if (!is_dir('uploads/option/'.$data['hd_id'])) {
                  mkdir('uploads/option/'.$data['hd_id'], 0777, TRUE);               
                  $this->Upload($data['hd_id'],"thumbnail",$w,$h);        
               }else{
                  $this->Upload($data['hd_id'],"thumbnail",$w,$h);
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

      public function addContact($data,$page)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }
         $date = new DateTime();
         $data_info=array(
            'address'=>$data['txt_address'],
            'contact_mail'=>$data['txt_email'],
            'contact_tel'=>$data['txt_tel'],
            'contact_fax'=>$data['txt_fax'],            
            'contact_line'=>$data['txt_line'],
            'contact_facebook'=>$data['txt_facebook'],
            'contact_instagram'=>$data['txt_instagram'],
            'contact_youtube'=>$data['txt_youtube'],
            'contact_web'=>$data['txt_web'],
            'page'=>$page,
            'rec_by'=>$session_data['account'],
            'rec_date'=>date_format($date, 'Y-m-d H:i:s'),
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         if($this->db->insert("tbl_option",$data_info)){
            return true;            
         }else{
            return false;
         }
      }

      public function updateContact($data,$page)
      {
         if($this->session->userdata('logged_in'))
         {
            $session_data = $this->session->userdata('logged_in');
         }  
         $date = new DateTime();
         $data_info=array(
            'address'=>$data['txt_address'],
            'contact_mail'=>$data['txt_email'],
            'contact_tel'=>$data['txt_tel'],
            'contact_fax'=>$data['txt_fax'],
            'contact_line'=>$data['txt_line'],
            'contact_facebook'=>$data['txt_facebook'],
            'contact_instagram'=>$data['txt_instagram'],
            'contact_youtube'=>$data['txt_youtube'],
            'contact_web'=>$data['txt_web'],
            'update_by'=>$session_data['account'],
            'update_date'=>date_format($date, 'Y-m-d H:i:s')
         );
         $this->db->where("id",$data['hd_id']);
         if($this->db->update("tbl_option",$data_info)){
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
         $m_config['upload_path'] ='uploads/option/'.$id;
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
            $filesize ='uploads/option/'.$id."/".$fname;  //add New  set file path
            list($width, $height) = getimagesize($filesize); //add New  Check image size
            $path='uploads/option/'.$id."/".$fname;  //add New  set path for create image
            if($width>$w){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/option/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'width'; // add new set dimansions fix width
               $m_config2['width'] = $w;
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/option/'.$id."/".$fname;          
               $this->image_lib->initialize($m_config2);
               if(!$this->image_lib->resize())
               { 
                  $response = $this->upload->display_errors();
               }else{
                  $this->createimage->createlargNobg($path,$w,$h);
                  $response = $this->upload->data();
               }
            }else if($height>$h){ //add New  check image width
               $this->image_lib->clear(); //add New  clear image_lib
               $m_config2['image_library'] = 'gd2';
               $m_config2['source_image'] ='uploads/option/'.$id."/".$fname;       
               $m_config2['maintain_ratio'] = TRUE;
               $m_config2['master_dim'] = 'height'; // add new set dimansions fix width
               $m_config2['height'] = $h;
               $m_config2['new_image'] ='uploads/option/'.$id."/".$fname;          
               $this->image_lib->initialize($m_config2);
               if(!$this->image_lib->resize())
               { 
                  $response = $this->upload->display_errors();
               }else{
                  $this->createimage->createlargNobg($path,$w,$h);
                  $response = $this->upload->data();
               }
            }else{
               $this->createimage->createlargNobg($path,$w,$h);
               $response = $this->upload->data();
            }
            $data_info_file=array(
               "thumbnail"=>'uploads/option/'.$id."/".$fname
            );
            $this->db->where("id",$id);
            $this->db->update("tbl_option",$data_info_file);
         }
      }

      public function getOption($page)
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

      public function GetPassword($id,$pass)
      {
         $this->db->select('*');
         $this->db->from('tbl_admin');
         $this->db->where('id',$id);
         $this->db->where('password',md5(md5(md5($pass))));
         $query=$this->db->get();
         if($query->num_rows()>0){
            return true;
         }else{
            return false;
         }
      }

      public function Updatepassword($data)
      {
         $date = new DateTime();
         if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
         }
         $data_info=array(
            'password'=>md5(md5(md5($data['txt_password_new']))),
            'update_by'=>$session_data['account'],
            'update_pass'=>date_format($date, 'Y-m-d H:i:s')
         );

         $this->db->where("id",$data['hd_id']);
         if($this->db->update("tbl_admin",$data_info)){
            return true;
         }else{
            return false;
         }
      }
   }
?>