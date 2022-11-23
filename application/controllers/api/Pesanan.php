<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Pesanan extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelKeranjang', 'ModelPesanan', 'ModelUserMember', 'ModelDetailPesanan');
	}

	public function Create_post($id_member)
	{
		$pesanan = new ModelPesanan;
		$krj = new ModelKeranjang;
		$member = new ModelUserMember;
		$total_harga = $this->input->post('total_harga');
		$no_meja = $this->input->post('no_meja');
		$kode_pesanan = $this->input->post('kode_pesanan');
		$resultmember = $member->get_member_byid($id_member);
		$no_va = strtoupper(random_string('numeric', 12));
		$data = [
			'no_va' => $no_va,
			'id_member' => 	$resultmember->id,
			'kode_pesanan' => $kode_pesanan,
			'nama_member' => $resultmember->nama,
			'tlp' => $resultmember->tlp,
			'no_meja' => $no_meja,
			'total_bayar' => $total_harga
		];
		$q = $krj->get_keranjang_byidmember($id_member);
		foreach ($q as $r) {
			$data2 = [
				'kode_pesanan' => $kode_pesanan,
				'id_member' => 	$r->id_member,
				'id_menu' => $r->id_menu,
				'nama_menu' => $r->nama_menu,
				'image' => $r->image,
				'harga' => $r->harga,
				'qty' => $r->qty,
				'total_harga' => $r->total_harga
			];
			$this->db->insert('detail_pesanan', $data2);
		};
		$krj->delete_keranjang_byidmember($id_member);
		$pesanan->post_pesanan($data);
		$this->response($krj, 200);
	}

	public function Pesanan_byidkode_get($kode_pesanan)
	{
		$pesanan = new ModelPesanan;
		$resultpsn = $pesanan->get_pesanan_byidkode($kode_pesanan);
		$this->response($resultpsn, 200);
	}
}
