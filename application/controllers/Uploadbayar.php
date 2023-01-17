<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadbayar extends CI_Controller {

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
        // ambil data dari url atau get
        $id_rental = $this->input->get('id_rental');

        $data['id_rental'] = $id_rental;

        $this->load->view('uploadbayar',$data=$data);	
    }

    public function proses()
    {
        $id_rental = $this->input->post('id_rental');
        $file_gambar = $_FILES["bukti_pembayaran"]["name"];
        move_uploaded_file($_FILES["bukti_pembayaran"]["tmp_name"], "assets/bukti_bayar/" . $file_gambar);

        if($file_gambar != null){
            $nama_file = $id_rental . "_" . $file_gambar;
            $bukti_bayar = $this->_uploadImage(asset_url().'bukti_bayar/', $nama_file, $file_gambar);
            
                $this->m_data->uploadImage($id_rental, $nama_file);
                redirect('uploadbayar?res='.$nama_file);
            
        } else {
            echo "Gagal";
        }
    }

    private function _uploadImage($path, $name, $file)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $name;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file)) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
}