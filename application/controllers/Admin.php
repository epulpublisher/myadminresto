<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar', $data);
		$this->load->view('layout/right-sidebar', $data);
		$this->load->view('content/data-order', $data);
		$this->load->view('layout/footer');
	}

	public function menu()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar', $data);
		$this->load->view('layout/right-sidebar', $data);
		$this->load->view('content/data-menu', $data);
		$this->load->view('layout/footer');
	}
}
