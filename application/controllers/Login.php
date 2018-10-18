<?php if(!defined('BASEPATH')) exit('Hacking Attempt : Keluar dari sistem..!!');

class Login extends CI_Controller
{
  function __construct(){
    parent::__construct();    
    $this->load->model('m_login');
  
 
  }
 
  public function index(){
    $this->load->view('login');
  }
 
  public function aksi_login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $where = array(
      'email'       => $email,
      'password'    => $password,
      'status'      => "1"
      );
    $get = $this->m_login->cek_login("user",$where)->result();
    foreach ($get as $key) {
      $role   = $key->role;
      $foto   = $key->foto;  
      $nama   = $key->nama;
      $id     = $key->id_user;
      }
    $cek = $this->m_login->cek_login("user",$where)->num_rows();

    if($cek > 0){
 
      $data_session = array(
        'role'    => $role,
        'nama'    => $nama,
        'foto'    => $foto,
        'id_user' => $id,
        'status'  => "login"
 
        );
 
      $this->session->set_userdata($data_session);
      if ($role==1) {
        redirect(base_url("admin"));
      }else {
        redirect(base_url("user"));
      }
       
    }else{
      echo "Username dan password salah !";
    }  
  }
   public function logout()
  {
   $this->session->sess_destroy();   
   redirect('login');
  }

}
?>