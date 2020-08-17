<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class V1 extends REST_Controller
{
   public function __construct() {
      parent::__construct();
      $this->load->model('Utilitymodel');

   }
   public function error()
   {
      $this->response(array('error' => 'Cannot find data !'), 404);
   }
   
   public function newspromotion_post()
   {
      $start = $this->input->post('start');
      $limit = 3;
      $info = $this->Utilitymodel->getNewsPromotion($start,$limit);
      if($info){
         $this->response($info);
      }else{
         $this->error();
      }
   }

   public function testAPI_get()
   {
      $start = 1;
      $limit = 3;
      $info = $this->Utilitymodel->getNewsPromotion($start,$limit);
      if($info){
         $this->response($info);
         print_r($info);
      }else{
         $this->error();
      }
   }
}