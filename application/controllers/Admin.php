<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('m_admin');
        $this->load->model('m_login');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
    	}
    }   
	public function index()
	{
		$data['user'] = $this->m_admin->tampil('user')->num_rows(); // menampilkan jumlah data user
		$data['gps'] = $this->m_admin->tampil('gps')->num_rows(); // menampilkan jumlah data gps
		$this->template->load('admin/templete','admin/dasboard',$data);
	}
	public function data_gps(){
		$data['data_gps'] = $this->m_admin->show_all(); // mengambil data user dan gps
		$this->template->load('admin/templete','admin/data_gps',$data);
	}
	public function tambah_gps(){
		$data['op'] = "add"; // menentukan operasi tambah atau edit
		$this->template->load('admin/templete','admin/tambah_gps',$data);
	}
	public function edit_gps($id_gps){
		$where = array('id_gps' => $id_gps, );
		$data['data_gps'] = $this->m_admin->tampil('gps',$where)->result(); // mengambil data berdasarkan id gps
		$data['op'] = "edit"; // menentukan operasi tambah atau edit
		$this->template->load('admin/templete','admin/tambah_gps',$data);
	}
	public function hapus_gps($id){
		$where = array('id_gps' => $id, );
		$query = $this->m_admin->tampil('gps',$where);
        $row = $query->row();

        unlink("./assets/uploads/$row->photo"); // menghapus file foto yang  tersimpan
		$this->m_admin->hapus($where,'gps'); //menghapus data dari database
			redirect('admin/data_gps');
	}
	public function proses_add_data(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '4048'; //maksimum besar file 2M
        $config['max_width']  = '3288'; //lebar maksimum 1288 px
        $config['max_height']  = '3288'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                    'brand_gps'       	=> $this->input->post('brand_gps'),
                    'model_gps'         => $this->input->post('model_gps'),
                    'gps_name'   		=> $this->input->post('gps_name'),
                    'waranty_month'     => $this->input->post('waranty_month'),
                    'buy_date'        	=> $this->input->post('buy_date'),
                    'sold_date'        	=> $this->input->post('sold_date'),
                    'sold_to'        	=> $this->input->post('sold_to'),
                    'description'       => $this->input->post('description'),
                    'id_user'        	=> $this->session->userdata('id_user'),
                    'photo'          	=> $gbr['file_name']
                ); 
                
                if ($this->input->post('op') == "add") {
                	$this->m_admin->input('gps',$data);
                } else {
                	$where = array('id_gps' => $this->input->post('id_gps') );
                	$this->m_admin->update($where,$data,'gps');
                }
                redirect('admin/data_gps'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                
                $this->session->set_flashdata('error', 'Maaf Upload Gagal');
                redirect('admin/tambah_gps'); //jika gagal maka akan ditampilkan form upload
            }
        }else{ 
               $data = array(
                    'brand_gps'       	=> $this->input->post('brand_gps'),
                    'model_gps'         => $this->input->post('model_gps'),
                    'gps_name'   		=> $this->input->post('gps_name'),
                    'waranty_month'     => $this->input->post('waranty_month'),
                    'buy_date'        	=> $this->input->post('buy_date'),
                    'sold_date'        	=> $this->input->post('sold_date'),
                    'sold_to'        	=> $this->input->post('sold_to'),
                    'description'       => $this->input->post('description'),
                    'id_user'        	=> $this->session->userdata('id_user'),
                );                
                if ($this->input->post('op') == "add") {
                	$this->m_admin->input('gps',$data);
                } else {
                	$where = array('id_gps' => $this->input->post('id_gps') );
                	$this->m_admin->update($where,$data,'gps');
                } 
                redirect('admin/data_gps'); /* jika berhasil maka akan kembali ke home upload */
        }
	}
	public function set_aktif($id){
		//mengganti status user menjadi aktif
		$where = array('id_user' => $id, );
		$data = array('status' => 1, ); 
		$this->m_admin->update($where,$data,'user');
			redirect('admin/data_user');
	}
	public function set_nonaktif($id){
		// mengganti status user menjadi tidak aktif
		$where = array('id_user' => $id, );
		$data = array('status' => 2, );
		$this->m_admin->update($where,$data,'user');
			redirect('admin/data_user');
	}
	public function data_user(){
		$data['data_user'] = $this->m_admin->tampil('user')->result(); // mengambil data user
		$this->template->load('admin/templete','admin/data_user',$data);
	}
	public function hapus_user($id){
		$where = array('id_user' => $id, );
		$query = $this->m_admin->tampil('user',$where); 
        $row = $query->row();

        unlink("./assets/uploads/$row->foto"); // menghapus file foto yang tersimpan
		$this->m_admin->hapus($where,'user'); // menghapus data dari databse
			redirect('admin/data_user');
	}
	public function tambah_user(){
		$data['op'] = "add"; // menentukan operasi tambah atau edit
		$this->template->load('admin/templete','admin/tambah_user',$data);
	}
	public function edit_user($id_gps){
		$where = array('id_user' => $id_gps, );
		$data['data_user'] = $this->m_admin->tampil('user',$where)->result(); // menampilkan data user berdasarkan id user
		$data['op'] = "edit"; // menentukan operasi tambah atau edit
		$this->template->load('admin/templete','admin/tambah_user',$data);
	}
	public function proses_add_user(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '4048'; //maksimum besar file 2M
        $config['max_width']  = '3288'; //lebar maksimum 1288 px
        $config['max_height']  = '3288'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                    'email'       	=> $this->input->post('email'),
                    'password'      => $this->input->post('password'),
                    'role'   		=> $this->input->post('role'),
                    'nama'     		=> $this->input->post('nama'),                   
                    'status'        => 1,                   
                    'foto'          => $gbr['file_name']
                ); 
                if ($this->input->post('op') == "add") {
                	$this->m_admin->input('user',$data);
                } else {
                	$where = array('id_user' => $this->input->post('id_user') );
                	$this->m_admin->update($where,$data,'user');
                }
                                
                redirect('admin/data_user'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                
                $this->session->set_flashdata('error', 'Maaf Upload Gagal');
                redirect('admin/tambah_user'); //jika gagal maka akan ditampilkan form upload
            }
        }else{ 
               $data = array(
                    'email'       	=> $this->input->post('email'),
                    'password'      => $this->input->post('password'),
                    'role'   		=> $this->input->post('role'),
                    'nama'     		=> $this->input->post('nama'),                   
                    'status'        => 1,                   
                    
                );  
               if ($this->input->post('op') == "add") {
                	$this->m_admin->input('user',$data);
                } else {
                	$where = array('id_user' => $this->input->post('id_user') );
                	$this->m_admin->update($where,$data,'user');
                }
               redirect('admin/data_user'); /* jika berhasil maka akan kembali ke home upload */
        }
	}
	public function profile(){
		$where = array('id_user' => $this->session->userdata('id_user'), );
		$data['data_user'] = $this->m_admin->tampil('user',$where)->result(); // mempilkan data user berdasarkan yang login
		$this->template->load('admin/templete','admin/profil',$data);
	}
	public function edit_profile($id){
		$where = array('id_user' => $id, );
		$data['data_user'] = $this->m_admin->tampil('user',$where)->result();
		$this->template->load('admin/templete','admin/edit_profil',$data);
	}
	public function proses_edit_user(){
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '4048'; //maksimum besar file 2M
        $config['max_width']  = '3288'; //lebar maksimum 1288 px
        $config['max_height']  = '3288'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        
        if($_FILES['filefoto']['name'])
        {
            if ($this->upload->do_upload('filefoto'))
            {
                $gbr = $this->upload->data();
                $data = array(
                    'email'       	=> $this->input->post('email'),
                    'password'      => $this->input->post('password'),
                    'nama'     		=> $this->input->post('nama'),                                      
                    'foto'          => $gbr['file_name']
                ); 
                
                	$where = array('id_user' => $this->input->post('id_user') );
                	$this->m_admin->update($where,$data,'user');
              
                redirect('admin/profile'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                
                $this->session->set_flashdata('error', 'Maaf Upload Gagal');
                redirect('admin/edit_profile'); //jika gagal maka akan ditampilkan form upload
            }
        }else{ 
               $data = array(
                    'email'       	=> $this->input->post('email'),
                    'password'      => $this->input->post('password'),
                    'nama'     		=> $this->input->post('nama'),                                     
                    
                );  
                	$where = array('id_user' => $this->input->post('id_user') );
                	$this->m_admin->update($where,$data,'user');
               redirect('admin/profile'); /* jika berhasil maka akan kembali ke home upload */
        }
	}
}
