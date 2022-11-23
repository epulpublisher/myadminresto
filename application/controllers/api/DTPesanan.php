<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class DTPesanan extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelPesanan', 'ModelUserMember', 'ModelDetailPesanan');
	}

	public function DTPesanan_byidkode_get($kode_pesanan)
	{
		$dtpesanan = new ModelDetailPesanan;
		$resultpsn = $dtpesanan->get_dtpesanan_byidkode($kode_pesanan);
		$this->response($resultpsn, 200);
	}
}
