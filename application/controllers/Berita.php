<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Berita');
	}
	
	public function index()
	{
		$data['data']=$this->M_Berita->tampil_data_berita();
		$this->load->view('v_berita', $data);
	}

	function tambah_berita()
	{
		$this->load->view('v_add_berita');
	}

	function edit_berita($id)
	{
		$data['data']=$this->M_Berita->edit_berita($id);
		$this->load->view('v_edit_berita', $data);
	}

	function Simpan_berita()
	{
		$judul=$this->input->post('xjudul');
		$kategori=$this->input->post('xkategori');
		$isi=$this->input->post('xisi_berita');
		$this->M_Berita->Simpan_berita($judul, $kategori, $isi);
		echo $this->session->set_flashdata('pesan','Data Berhasil Tersimpan...!!!');
		redirect('Berita');
	}

	function update_berita()
	{
		$id=$this->input->post('xid');
		$judul=$this->input->post('xjudul');
		$kategori=$this->input->post('xkategori');
		$isi=$this->input->post('xisi_berita');
		$this->M_Berita->update_berita($id, $judul, $kategori, $isi);
		echo $this->session->set_flashdata('pesan','Data Berhasil diupdate...!!!');
		redirect('Berita');
	}

	function hapus_berita($id)
	{
		$this->M_Berita->hapus_berita($id);
		echo $this->session->set_flashdata('pesan','Data Berhasil dihapus');
		redirect('Berita');
	}
}
