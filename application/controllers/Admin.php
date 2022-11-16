<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
		$data['buku'] = $this->ModelBuku->getLimitBuku()->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar', $data);
		$this->load->view('layout/right-sidebar', $data);
		$this->load->view('content/dashboard', $data);
		$this->load->view('layout/footer');
	}
}
