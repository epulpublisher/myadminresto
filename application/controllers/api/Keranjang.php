<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Keranjang extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelKeranjang', 'ModelMenu', 'ModelUserMember');
	}

	public function JmlByMember_get($id_member)
	{
		$krj = new ModelKeranjang;
		$resultkrj = $krj->jml_keranjang_byidmember($id_member);
		$this->response($resultkrj, 200);
	}

	public function RpByMember_get($id_member)
	{
		$krj = new ModelKeranjang;
		$resultkrj = $krj->rp_keranjang_byidmember($id_member);
		$this->response($resultkrj, 200);
	}

	public function Create_post()
	{
		$id_menu = $this->input->post('id_menu');
		$id_member = $this->input->post('id_member');
		$krj = new ModelKeranjang;
		$menu = new ModelMenu;
		$member = new ModelUserMember;
		$resultmenu = $menu->get_menu_byid($id_menu);
		$resultmember = $member->get_member_byid($id_member);
		$data = [
			'id_member' => 	$resultmember->id,
			'id_menu' => $resultmenu->id,
			'nama_menu' => $resultmenu->nama_menu,
			'image' => $resultmenu->image,
			'harga' => $resultmenu->harga,
			'qty' => 1,
			'total_harga' => $resultmenu->harga,
		];
		if ($krj->cek_keranjang_byidmenu($id_menu) >= 1) {
			$this->response(null, RestController::HTTP_UNAUTHORIZED);
		} else {
			$addkrj = $krj->post_keranjang($data);
			$resultkeranjang = $krj->get_keranjang_byidmember($id_member);
			if ($addkrj > 0) {
				$this->response($resultkeranjang, RestController::HTTP_OK);
			} else {
				$this->response(null, RestController::HTTP_UNAUTHORIZED);
			}
		}
	}

	public function Keranjang_byidmember_get($id_member)
	{
		$krj = new ModelKeranjang;
		$resultkrj = $krj->get_keranjang_byidmember(['id_member' => $id_member])->row_array();
		if ($krj->get_keranjang_byidmember(['id_member' => $id_member])->num_rows() > 0) {
			$this->response($resultkrj, RestController::HTTP_OK);
		} else {
			$this->response(null, RestController::HTTP_BAD_REQUEST);
		}
	}

	public function UpdateKeranjang_post($id)
	{
		$krj = new ModelKeranjang;
		$harga = $this->input->post('harga');
		$qty = $this->input->post('qty');

		$total_harga = $harga * $qty;
		$data = [
			'harga' => $harga,
			'qty' => $qty,
			'total_harga' => $total_harga
		];
		$putkrj = $krj->put_keranjang($id, $data);
		if ($putkrj > 0) {
			$this->response(
				[
					'status' => true,
					'pesan' => 'update berhasil'
				],
				RestController::HTTP_OK
			);
		} else {
			$this->response(
				[
					'status' => false,
					'pesan' => 'update gagal'
				],
				RestController::HTTP_BAD_REQUEST
			);
		}
	}

	public function DeleteKeranjang_delete($id)
	{
		$krj = new ModelKeranjang;
		$delmhs = $krj->del_keranjang($id);
		if ($delmhs > 0) {
			$this->response(
				[
					'status' => true,
					'pesan' => 'delete berhasil'
				],
				RestController::HTTP_OK
			);
		} else {
			$this->response(
				[
					'status' => false,
					'pesan' => 'delete gagal'
				],
				RestController::HTTP_BAD_REQUEST
			);
		}
	}
}
