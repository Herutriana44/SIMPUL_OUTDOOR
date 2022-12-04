<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class E401 extends CI_Controller {

    public function index()
	{
        $this->load->view("e401");
    }
}