<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model{

     
    public function __construct()
    {
        parent::__construct();
        
    }
    	//fungsi menampilkan data//
    	//fungsi tampil data//
	    public function tampil($table,$where=null){
	    	if($where!=null){
	    		return $this->db->get_where($table,$where);
	    	}
	    	else
	    	{
	    		return $this->db->get($table);	
	    	}
	    }
    	//fungsi insert//
		public function input($table,$data){
        	$this->db->insert($table, $data);
          return $this->db->insert_id(); 
    	}
    	//fungsi update data//
  	public function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	   }
    public function update1($table,$data){
        $this->db->update($table,$data);
    }	
	//fungsi hapus data//
	public function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	// fungsi join melihat data
	function show_all(){
		$this->db->select('gps.*,user.nama,user.role');
		$this->db->from('gps');
		$this->db->join('user','user.id_user=gps.id_user','LEFT');
		$query = $this->db->get();
		return $query->result();
	}
	// fungsi join melihat data berdasarkan kondidi tertentu
	function show_all_gps_user($id_user){
		$this->db->select('gps.*,user.nama,user.role');
		$this->db->from('gps');
		$this->db->join('user','user.id_user=gps.id_user','LEFT');
		$this->db->where('gps.id_user',$id_user);
		$query = $this->db->get();
		return $query->result();
	}

}
?>
