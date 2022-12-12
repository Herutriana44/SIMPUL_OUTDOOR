<?php 
// Ini adalah halaman model M_data yang akan digunakan sebagai manipulator data pada database
class M_data extends CI_Model{
	
	// ini adalah fungsi untuk cek login
	public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	// ini adalah fungsi untuk menambahkan data atau akun pada database
	function register($nama,$alamat,$telepon,$username,$password)
	{
		$data_user = array(
			'id'=>NULL,
			'nama'=>$nama,
			'alamat'=>$alamat,
			'telepon'=>$telepon,
			'username'=>$username,
			'password'=>$password
		);
		$this->db->insert('akun',$data_user);
	}

	
}