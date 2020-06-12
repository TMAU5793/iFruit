<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginmodel extends CI_Model{
  function login($account, $password)
  {
    $this -> db -> select ('*');
    $this -> db -> from('tbl_admin');
    $this -> db -> where('account', $account);
    $this -> db -> where('password', md5(md5(md5($password))));
    $this -> db -> limit(1);

    $query = $this -> db -> get();
    if($query ->num_rows()== 1){
      return $query->row();
    }else{
      return false;
    }
  }
  public function UpdateLogin($id){
		$date = new DateTime();
		$data_info=array(
      'last_login' =>date_format($date, 'Y-m-d H:i:s')
		);
		$this->db->where('id', $id);
		$this->db->update("tbl_admin",$data_info);
	}

  public function GetUsersListById($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_admin');
    $this->db->where('id',$id);
    $query = $this->db->get();
    if($query->num_rows()==1){
      return $query->row();
    }else{
      return false;
    }
  }
}
?>