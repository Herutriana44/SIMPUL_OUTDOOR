<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller {
    // Ini pemanggilan model m_data untuk mengakses atau memanipulasi data
    function __construct(){
        parent::__construct();
        $this->load->model('m_data');
    
        // Cek session jika status session tidak sama dengan login maka akan dilempar ke halaman login views
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
    }
    public function index()
    {
        error_reporting(E_ERROR | E_PARSE);
        // panggil library "session"
        $this->load->library("session");
        // panggil helper "url"
        $this->load->helper(array('url','cookie'));

        $cipher = "AES-128-CTR";
        $key = "skalnfkamgladmsaofaksfasmfkas";
        $iv = "519375018091750914109275921052194";

        $username = $this->session->userdata('username');
        $profile = $this->m_data->tampil_data($username);
        $data['user'] = $profile;
        $data['nama'] = openssl_decrypt($profile->nama, $cipher, $key, $options=0, $iv);
        $data['username'] = openssl_decrypt($profile->username, $cipher, $key, $options=0, $iv);
        $data['password'] = openssl_decrypt($profile->password, $cipher, $key, $options=0, $iv);
        $data['email'] = openssl_decrypt($profile->email, $cipher, $key, $options=0, $iv);
        $data['nohp'] = openssl_decrypt($profile->nohp, $cipher, $key, $options=0, $iv);
        $data['alamat'] = openssl_decrypt($profile->alamat, $cipher, $key, $options=0, $iv);
        $this->load->view('profile',$data=$data);	
    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $this->load->view('editprofile',$data=$data);
    }
    public function update()
    {
        error_reporting(E_ERROR | E_PARSE);
        // Ini parameter-parameter yang akan digunakan untuk enkripsi
        $cipher = "AES-128-CTR";
        $key = "skalnfkamgladmsaofaksfasmfkas";
        $iv = "519375018091750914109275921052194";

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');

        $nama = openssl_encrypt($nama, $cipher, $key, $options=0, $iv);
        $username = openssl_encrypt($username, $cipher, $key, $options=0, $iv);
        $password = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
        $email = openssl_encrypt($email, $cipher, $key, $options=0, $iv);
        $nohp = openssl_encrypt($nohp, $cipher, $key, $options=0, $iv);
        $alamat = openssl_encrypt($alamat, $cipher, $key, $options=0, $iv);

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'no_telp' => $nohp,
            'alamat' => $alamat
        );
        $where = array(
            'username' => $username
        );

        $this->m_data->update_data($where,$data,'akun');
        redirect('profile');
    }
}