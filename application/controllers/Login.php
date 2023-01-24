<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct(){
		parent::__construct();
        $this->load->model('m_data');	
	}

    public function index()
	{
		error_reporting(E_ERROR | E_PARSE);
		// panggil library "session"
		$this->load->library("session");
		// panggil helper "url"
		$this->load->helper('url');

        // buat session
        // $this->session->set_userdata("ka-19","ini session");

        // redirect("Dashboard");

        // tampilkan halaman login
        $this->load->view("login");

    }

    function aksi_login(){
		error_reporting(E_ERROR | E_PARSE);
		// Ini parameter-parameter yang akan digunakan untuk enkripsi
		$cipher = "AES-128-CTR";
        $key = "skalnfkamgladmsaofaksfasmfkas";
        $iv = "519375018091750914109275921052194";

		// Mengambil data dari input di views login
		$username = $this->input->post('txt_username');
		$password = $this->input->post('txt_password');

		// ini untuk proses enkripsi
		$usernameChiper = openssl_encrypt($username, $cipher, $key, $options=0, $iv);
        $passwordChiper = openssl_encrypt($password, $cipher, $key, $options=0, $iv);

		// Membuat array
		$where = array(
			'username' => $usernameChiper,
			'password' => $passwordChiper
			);

		// Mengecek data apakah data login tadi terdapat di database atau tidak dengan mengembalikan jumlah data yang ditemukan
		$cek = $this->m_data->cek_login("akun",$where)->num_rows();
		

		// jika jumlah data yang ditemukan lebih dari 0 maka
		if($cek > 0){
			
			$data_session = array(
				'username' => $usernameChiper,
				'status' => "login"
				);

			// buat session dengan menggunakan nama sebagai index dari username dan status sebagai index dari status login
			$this->session->set_userdata($data_session);
			
			// lempar ke halaman Dashboard Controller
			redirect("Dashboard");
 
		}else{
			// lempar ke halaman Login Controller
			redirect("Login");
		}
	}
}