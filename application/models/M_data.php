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

	function hapus_data($where,$table)
	{
		// hapus data
		$this->db
			->where
			($where)
			->delete($table);
	}

	function uploadImage($idrental,$image)
	{
		$data = array(
			'gambar' => $image
		);

		$getData = $this->db->query('SELECT * FROM perentalan WHERE id_rental = '.$idrental.'');
		$getData = $getData->result();
		$idproduk = $getData[0]->id_produk;
		$username = $getData[0]->username;
		$tanggalpeminjaman = $getData[0]->tanggal_peminjaman;
		$tanggalpengembalian = $getData[0]->tanggal_pengembalian;

		$this->db->query('CALL upload_bayar('.$idrental.',"'.$image.'","'.$idproduk.'","'.$username.'","'.$tanggalpeminjaman.'","'.$tanggalpengembalian.'");');
	}
}