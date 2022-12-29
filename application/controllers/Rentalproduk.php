<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rentalproduk extends CI_Controller {

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
        // panggil library "session"
        $this->load->library("session");
        // panggil helper "url"
        $this->load->helper(array('url','cookie'));
        $idproduk = $this->input->post('idproduk');
        $data['produk'] = $this->m_data->get_produk($idproduk);

        $cipher = "AES-128-CTR";
		$key = "skalnfkamgladmsaofaksfasmfkas";
		$iv = "519375018091750914109275921052194";

		$usernameFromSession = $this->session->userdata('username');

		$where = array(
			'username' => $usernameFromSession
		);

		$username = openssl_decrypt($usernameFromSession, $cipher, $key, $options=0, $iv);

		$produk = $this->m_data->tampil_semua_produk();

        $data['idproduk'] = $idproduk;
        $data['username'] = $username;
        $this->load->view('rentalproduk',$data=$data);	
    }

    public function rental()
    {
        // panggil library "session"
        $this->load->library("session");
        // panggil helper "url"
        $this->load->helper(array('url','cookie'));
        $idproduk = $this->input->post('idproduk');
        $data['produk'] = $this->m_data->get_produk($idproduk);

        $cipher = "AES-128-CTR";
		$key = "skalnfkamgladmsaofaksfasmfkas";
		$iv = "519375018091750914109275921052194";

		$usernameFromSession = $this->session->userdata('username');

		$where = array(
			'username' => $usernameFromSession
		);

		$username = openssl_decrypt($usernameFromSession, $cipher, $key, $options=0, $iv);

		$produk = $this->m_data->tampil_semua_produk();

        $data['idproduk'] = $idproduk;
        $data['username'] = $username;

        $idproduk = $this->input->post('idproduk');
        $iduser = $username;
        $tanggalpeminjaman = $this->input->post('tanggalpeminjaman');
        $tanggalpengembalian = $this->input->post('tanggalpengembalian');
        $jumlah = $this->input->post('jumlah');
        $usernameChiper = openssl_encrypt($username, $cipher, $key, $options=0, $iv);

        $this->m_data->rental_produk($idproduk,$usernameChiper,$tanggalpeminjaman,$tanggalpengembalian,$jumlah);
        redirect(base_url("dashboard"));
    }
}
