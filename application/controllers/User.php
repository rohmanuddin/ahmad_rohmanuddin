<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class USER extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('m_admin');
        $this->load->model('m_login');
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
    	}
    } 
    public function index(){
        $where = array('id_user' => $this->session->userdata('id_user'), );
        $data['gps'] = $this->m_admin->tampil('gps',$where)->num_rows(); // menampilkan jumlah data gps berdasarkan id user
    	$this->template->load('user/templete','user/dasboard',$data);
    }
    public function data_gps(){
		$data['data_gps'] = $this->m_admin->show_all_gps_user($this->session->userdata('id_user')); // menampilkan 2 tabel berdasarkan id user
		$this->template->load('user/templete','user/data_gps',$data);
	}
	public function tambah_gps(){
		$data['op'] = "add"; // menentukan operasi tambah atau edit
		$this->template->load('user/templete','user/tambah_gps',$data);
	}
	public function edit_gps($id_gps){
		$where = array('id_gps' => $id_gps, );
		$data['data_gps'] = $this->m_admin->tampil('gps',$where)->result(); // menampilkan data berdasarkan id gps
		$data['op'] = "edit";// menentukan operasi tambah atau edit
		$this->template->load('user/templete','user/tambah_gps',$data);
	}
	public function hapus_gps($id){
		$where = array('id_gps' => $id, );
		$query = $this->m_admin->tampil('gps',$where);
        $row = $query->row();

        unlink("./assets/uploads/$row->photo"); // menghapus file foto 
		$this->m_admin->hapus($where,'gps'); // menghaspus data dari database
			redirect('user/data_gps');
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
                redirect('user/data_gps'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                
                $this->session->set_flashdata('error', 'Maaf Upload Gagal');
                redirect('user/tambah_gps'); //jika gagal maka akan ditampilkan form upload
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
                redirect('user/data_gps'); /* jika berhasil maka akan kembali ke home upload */
        }
    }
    public function profile(){
        $where = array('id_user' => $this->session->userdata('id_user'), );
        $data['data_user'] = $this->m_admin->tampil('user',$where)->result(); // menampilkan data user berdasarkan user login
        $this->template->load('user/templete','user/profil',$data);
    }
    public function edit_profile($id){
        $where = array('id_user' => $id, );
        $data['data_user'] = $this->m_admin->tampil('user',$where)->result(); // menampilkan data user 
        $this->template->load('user/templete','user/edit_profil',$data);
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
                    'email'         => $this->input->post('email'),
                    'password'      => $this->input->post('password'),
                    'nama'          => $this->input->post('nama'),                                      
                    'foto'          => $gbr['file_name']
                ); 
                
                    $where = array('id_user' => $this->input->post('id_user') );
                    $this->m_admin->update($where,$data,'user');
              
                redirect('user/profile'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                
                $this->session->set_flashdata('error', 'Maaf Upload Gagal');
                redirect('user/edit_profile'); //jika gagal maka akan ditampilkan form upload
            }
        }else{ 
               $data = array(
                    'email'         => $this->input->post('email'),
                    'password'      => $this->input->post('password'),
                    'nama'          => $this->input->post('nama'),                                     
                    
                );  
                    $where = array('id_user' => $this->input->post('id_user') );
                    $this->m_admin->update($where,$data,'user');
               redirect('user/profile'); /* jika berhasil maka akan kembali ke home upload */
        }
    }
}
?>
