<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Berita');
	}	

	public function index()
	{
		$data['jumlah']=$this->M_Berita->jumlah_berita();
		$this->load->view('index_home', $data);
	}
}
