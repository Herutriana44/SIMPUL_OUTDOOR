<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
	
		// Cek session jika status session tidak sama dengan login maka akan dilempar ke halaman login views
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->view('dashboard');
	}
	
	/**
	public function index()
	{
		// panggil library "session"
		$this->load->library("session");
		// panggil helper "url"
		$this->load->helper(array('url','cookie'));

		if($this->session->userdata('ka-19') == "" && get_cookie("ck-ka") == "")
		{
			redirect("Login");
		}
		else
		{
			$this->load->view('dashboard');
		}		
	}
	*/

	function setSession()
	{
		// panggil library "session"
		$this->load->library("session");
		// panggil helper "url"
		$this->load->helper(array('url','cookie'));

		// ambil data json
		$json = file_get_contents("php://input");
		$data = json_decode($json);
		$username = $data->username;

		$checkbox = $data->checkbox;

		// buat session
		$this->session->set_userdata('ka-19',$username);
		//jika checkbox = 1
		if($checkbox == 1){
			//buat cookie
			set_cookie("ck-ka",$username, 7200 );
		}
		 
		// kirim keterangan ke gotoDashboard(JS)
		echo json_encode(array("hasil" => 1));
	}

	function setLogout(){
		//panggil library session
		$this->load->library("session");

		//panggil helper url
		$this->load->helper(array('url', 'cookie'));

		//hapus session
		$this->session->unset_userdata('ka-19');

		//hapus cookie
		delete_cookie('ck-ka');

		//alihkan ke halaman login
		redirect("Login");

	}
}
