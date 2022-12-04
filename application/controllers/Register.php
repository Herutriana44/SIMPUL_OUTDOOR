<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    // Ini pemanggilan model m_data untuk mengakses atau memanipulasi data
    function __construct(){
		parent::__construct();
        $this->load->model('m_data');	
	}

    public function index()
	{
        $this->load->view("register");

    }


    // Ini fungsi untuk regristasi atau menambahkan akun ke database
    function registration()
    {
        // Ini parameter-parameter yang akan digunakan untuk enkripsi
        $cipher = "AES-128-CTR";
        $key = "skalnfkamgladmsaofaksfasmfkas";
        $iv = "519375018091750914109275921052194";

        // Mengambil data dari input di views register
        $username = $this->input->post('username');
		$password = $this->input->post('password');

        // ini untuk proses enkripsi
        $usernameChiper = openssl_encrypt($username, $cipher, $key, $options=0, $iv);
        $passwordChiper = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
        
        // Ini untuk memasukkan data ke database
        $this->m_data->register($usernameChiper,$passwordChiper);

        // lalu dilempar ke halaman Login Controller
        redirect('Login');
    }
}