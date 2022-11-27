<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		format_rupiah();
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['jml_member'] = $this->ModelUserMember->AllMember();
		$data['jml_menu'] = $this->ModelMenu->AllMenu();
		$data['jml_pesanan'] = $this->ModelPesanan->AllPesanan();
		$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
		$data['best_seller'] = $this->ModelLaporan->Laporan_bestseller()->last_row('array');
		$data['low_seller'] = $this->ModelLaporan->Laporan_lowseller()->first_row('array');
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar');
		$this->load->view('layout/right-sidebar');
		$this->load->view('content/dashboard', $data);
		$this->load->view('layout/footer');
	}
}
