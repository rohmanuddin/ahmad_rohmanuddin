<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class M_login extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }
  
  
    function cek_login($table,$where){    
    return $this->db->get_where($table,$where);
  } 
  
}  

?>