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
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter1($date_start, $date_end)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan1($date_start, $date_end)->row_array();
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter2($date_only)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan2($date_only)->row_array();
		} else {
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
		}
		$data['date_filter'] = $date_filter;
		$data['judul'] = 'Laporan Penjualan';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar');
		$this->load->view('layout/right-sidebar');
		$this->load->view('content/laporan-penjualan', $data);
		$this->load->view('layout/footer', $data);
	}

	public function penjualan_print()
	{
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter1($date_start, $date_end)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan1($date_start, $date_end)->row_array();
			$data['date_filter'] = $date_filter;
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter2($date_only)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan2($date_only)->row_array();
			$data['date_filter'] = $date_filter;
		} else {
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
			$data['date_filter'] = "Semua Waktu";
		}
		$this->load->view('content/penjualan-print', $data);
	}

	public function penjualan_pdf()
	{
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter1($date_start, $date_end)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan1($date_start, $date_end)->row_array();
			$data['date_filter'] = $date_filter;
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter2($date_only)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan2($date_only)->row_array();
			$data['date_filter'] = $date_filter;
		} else {
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
			$data['date_filter'] = "Semua Waktu";
		}
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
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter1($date_start, $date_end)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan1($date_start, $date_end)->row_array();
			$data['date_filter'] = $date_filter;
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan_filter2($date_only)->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan2($date_only)->row_array();
			$data['date_filter'] = $date_filter;
		} else {
			$data['laporan'] = $this->ModelLaporan->Laporan_penjualan()->result_array();
			$data['total_penghasilan'] = $this->ModelLaporan->Total_pemasukan()->row_array();
			$data['date_filter'] = "Semua Waktu";
		}
		$this->load->view('content/penjualan-excel', $data);
	}

	public function member()
	{
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member1($date_start, $date_end)->result_array();
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member2($date_only)->result_array();
		} else {
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
		}
		$data['date_filter'] = $date_filter;
		$data['judul'] = 'Laporan Member';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar');
		$this->load->view('layout/right-sidebar');
		$this->load->view('content/laporan-member', $data);
		$this->load->view('layout/footer');
	}

	public function member_print()
	{
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member1($date_start, $date_end)->result_array();
			$data['date_filter'] = $date_filter;
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member2($date_only)->result_array();
			$data['date_filter'] = $date_filter;
		} else {
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
			$data['date_filter'] = "Semua Waktu";
		}
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('content/member-print', $data);
	}

	public function member_pdf()
	{
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member1($date_start, $date_end)->result_array();
			$data['date_filter'] = $date_filter;
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member2($date_only)->result_array();
			$data['date_filter'] = $date_filter;
		} else {
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
			$data['date_filter'] = "Semua Waktu";
		}
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
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
		$date_filter = $this->input->post('date_filter', true);
		$data_1 = substr($date_filter, 0, -13);
		$data_2 = substr($date_filter, 13);
		if ((empty($data_1) == false) and (empty($data_2) == false)) {
			$date_a = DateTime::createFromFormat('d/m/Y', $data_1);
			$date_start = $date_a->format('Y-m-d');
			$date_b = DateTime::createFromFormat('d/m/Y', $data_2);
			$date_end = $date_b->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member1($date_start, $date_end)->result_array();
			$data['date_filter'] = $date_filter;
		} elseif (empty($date_filter) == false) {
			$date_c = DateTime::createFromFormat('d/m/Y', $date_filter);
			$date_only = $date_c->format('Y-m-d');
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member2($date_only)->result_array();
			$data['date_filter'] = $date_filter;
		} else {
			$data['laporan_member'] = $this->ModelLaporan->Laporan_member()->result_array();
			$data['date_filter'] = "Semua Waktu";
		}
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$this->load->view('content/member-excel', $data);
	}
}
