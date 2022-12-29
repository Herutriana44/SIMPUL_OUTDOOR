<?php 
// Ini adalah halaman model M_data yang akan digunakan sebagai manipulator data pada database
class M_data extends CI_Model{
	
	// ini adalah fungsi untuk cek login
	public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	// ini adalah fungsi untuk menambahkan data atau akun pada database
	function register($nama,$alamat,$telepon,$username,$password,$email)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>$password,
			'nama'=>$nama,
			'alamat'=>$alamat,
			'no_telp'=>$telepon,
			'email'=>$email
		);
		$this->db->insert('akun',$data_user);
	}

	function tampil_semua_produk()
	{
		$query = $this->db->query('SELECT * FROM produk');
		return $query->result();
	}

	function get_produk($idproduk)
	{
		$query = $this->db->select('*')->from('produk')->where('id_produk',$idproduk)->get();
		return $query->result();
	}

	function rental_produk($idproduk,$iduser,$tanggalpeminjaman,$tanggalpengembalian,$jumlah)
	{
		$data_rental = array(
			'id_produk'=>$idproduk,
			'username'=>$iduser,
			'tanggal_peminjaman'=>$tanggalpeminjaman,
			'tanggal_pengembalian'=>$tanggalpengembalian,
			'jumlah'=>$jumlah
		);
		$this->db->query('CALL rental_produk('.$jumlah.',"'.$tanggalpeminjaman.'","'.$tanggalpengembalian.'","'.$idproduk.'","'.$iduser.'");');
	}

	function riwayat_rental($iduser)
	{
		$query = $this->db->query('CALL tampilkan_riwayat("'.$iduser.'");');
		return $query->result();
	}
}