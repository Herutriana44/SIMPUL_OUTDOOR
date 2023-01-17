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
        error_reporting(E_ERROR | E_PARSE);
        // Ini parameter-parameter yang akan digunakan untuk enkripsi
        $cipher = "AES-128-CTR";
        $key = "skalnfkamgladmsaofaksfasmfkas";
        $iv = "519375018091750914109275921052194";

        // Mengambil data dari input di views register
        $name = $this->input->post('fullname');
        $alamat = $this->input->post('alamat');
        $notlp = $this->input->post('notlp');
        $username = $this->input->post('username');
		$password = $this->input->post('password');
        $email = $this->input->post('email');

        // ini untuk proses enkripsi
        $usernameChiper = openssl_encrypt($username, $cipher, $key, $options=0, $iv);
        $passwordChiper = openssl_encrypt($password, $cipher, $key, $options=0, $iv);
        $alamatChiper = openssl_encrypt($alamat, $cipher, $key, $options=0, $iv);
        $notlpChiper = openssl_encrypt($notlp, $cipher, $key, $options=0, $iv);
        $nameChiper = openssl_encrypt($name, $cipher, $key, $options=0, $iv);
        $emailChiper = openssl_encrypt($email, $cipher, $key, $options=0, $iv);
        // Ini untuk memasukkan data ke database
        $this->m_data->register($nameChiper,$alamatChiper,$notlpChiper,$usernameChiper,$passwordChiper,$emailChiper);

        // lalu dilempar ke halaman Login Controller
        redirect('Login');
    }
}