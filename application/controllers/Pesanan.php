<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		format_rupiah();
	}

	public function index()
	{
		$data['judul'] = 'Data Menu';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['menu'] = $this->ModelPesanan->getPesanan()->result_array();
		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar');
		$this->load->view('layout/right-sidebar');
		$this->load->view('content/data-pesanan', $data);
		$this->load->view('layout/footer');
	}

	public function Invoice()
	{
		$kode_pesanan = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$data['judul'] = 'Invoice Pesanan';
		$data['user'] = $this->ModelUserMember->cekData(['id' => $id])->row_array();
		$data['bykode_pesanan'] = $this->ModelPesanan->getPesananbykode(['kode_pesanan' => $kode_pesanan])->row_array();
		$data['dt_pesanan'] = $this->ModelDetailPesanan->getdtPesananbykode(['kode_pesanan' => $kode_pesanan])->result_array();
		$sroot = $_SERVER['DOCUMENT_ROOT'];
		include $sroot . "/myordersresto/application/third_party/dompdf/autoload.inc.php";
		$dompdf = new Dompdf\Dompdf(['isRemoteEnabled' => true]);
		$this->load->view('content/invoice', $data);
		$paper_size = 'A4';
		$orientation = 'potrait';
		$html = $this->output->get_output();
		$dompdf->setPaper($paper_size, $orientation);
		//Convert to PDF
		$dompdf->loadHtml($html);
		$dompdf->render();
		$dompdf->stream("Invoice.pdf", array('Attachment' => 0));
	}
	public function status_bayar()
	{
		$id = $this->uri->segment(3);
		$this->ModelPesanan->updateBayar($id);
		redirect(base_url() . 'pesanan/');
	}

	public function status_selesai()
	{
		$id = $this->uri->segment(3);
		$this->ModelPesanan->updateSelesai($id);
		redirect(base_url() . 'pesanan/');
	}

	public function hapus()
	{
		$kode_pesanan = $this->uri->segment(3);
		$this->ModelPesanan->deletePesanan($kode_pesanan);
		$this->ModelDetailPesanan->deleteDTPesanan($kode_pesanan);
		redirect(base_url() . 'pesanan/');
	}
}
