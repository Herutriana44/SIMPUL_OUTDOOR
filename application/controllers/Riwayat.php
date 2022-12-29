<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

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
        $username = $this->session->userdata('username');
        $data['riwayat'] = $this->m_data->riwayat_rental($username);
        $this->load->view('riwayat',$data=$data);	
    }
}