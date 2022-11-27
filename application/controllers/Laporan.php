<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		format_rupiah();
	}

	public function penjualan()
	{
		$data['judul'] = 'Laporan Penjualan';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
		$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar');
		$this->load->view('layout/right-sidebar');
		$this->load->view('content/laporan-penjualan', $data);
		$this->load->view('layout/footer');
	}

	public function penjualan_print()
	{
		$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
		$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
		$this->load->view('content/penjualan-print', $data);
	}

	public function penjualan_pdf()
	{
		$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
		$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/myordersresto/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf(['isRemoteEnabled' => true]);
		$this->load->view('content/penjualan-pdf', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$dompdf->setPaper($paper_size, $orientation);
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream("Invoice.pdf", array('Attachment' => 0));
	}

	public function penjualan_excel()
	{
		$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
		$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
		$this->load->view('content/penjualan-excel', $data);
	}

	public function member()
	{
		$data['judul'] = 'Laporan Member';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar');
		$this->load->view('layout/right-sidebar');
		$this->load->view('content/laporan-member', $data);
		$this->load->view('layout/footer');
	}

	public function member_print()
	{
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
		$this->load->view('content/member-print', $data);
	}

	public function member_pdf()
	{
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/myordersresto/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf(['isRemoteEnabled' => true]);
		$this->load->view('content/member-pdf', $data);
		$paper_size = 'A4';
		$orientation = 'landscape';
		$html = $this->output->get_output();
		$dompdf->setPaper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream("Invoice.pdf", array('Attachment' => 0));
	}

	public function member_excel()
	{
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
		$this->load->view('content/member-excel', $data);
	}
}
