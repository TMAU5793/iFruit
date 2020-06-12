<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifyLogin extends CI_Controller {

   function __construct()
   {
      parent::__construct();
      $this->load->model('admin/Loginmodel','',TRUE);
   }

   function Verifylogin()
   {
      //This method will have the credentials validation
      $this->load->library('form_validation');
      $this->form_validation->set_rules('txt_account', 'account', 'trim|required');
      $this->form_validation->set_rules('txt_password', 'password', 'trim|required|callback_check_database');
      
      if($this->form_validation->run() == FALSE)
      {
         //Field validation failed.  User redirected to login page
         $this->load->view('admin/login');
      } else {
         redirect('admin/Product');
      }

   }

   function check_database($password)
   {
      //Field validation succeeded.  Validate against database
      $account = $this->input->post('txt_account');

      //query the database
      $result = $this->Signinmodel->login($account, $password);

      if($result)
      {
         $sess_array = array(
            'id' => $result->id,
				'name' => $result->name,
				'account' => $result->account,
				'profile' => $result->profile,
				'last_login' => $result->last_login
         );
         $this->session->set_userdata('logged_in', $sess_array);
         return TRUE;
      } else {
         $this->form_validation->set_message('check_database', 'ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง');
         return false;
      }
   }
}
?>