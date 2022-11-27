<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class UserMemberApi extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelUserMember');
	}
	public function MemberById_get($id)
	{
		$member = new ModelUserMember;
		$resultmember = $member->get_member_byid($id);
		$this->response($resultmember, 200);
	}
	public function Create_post()
	{
		$member = new ModelUserMember;
		$data = [
			'nama' => $this->post('nama'),
			'tlp' => $this->post('tlp'),
			'email' => $this->post('email'),
			'alamat' => $this->post('alamat'),
			'password' => password_hash($this->post('password'), PASSWORD_DEFAULT)
		];
		$addmember = $member->post_member($data);
		if ($addmember > 0) {
			$this->response(
				[
					'status' => true,
					'pesan' => 'insert berhasil'
				],
				RestController::HTTP_OK
			);
		} else {
			$this->response(
				[
					'status' => false,
					'pesan' => 'insert gagal'
				],
				RestController::HTTP_BAD_REQUEST
			);
		}
	}
	function Login_post()
	{
		$member = new ModelUserMember;
		$email = htmlspecialchars($this->post('email'));
		$password = $this->post('password', true);
		$user_member = $member->cekData(['email' => $email])->row_array();
		if (($member->cekData(['email' => $email])->num_rows() > 0) && (password_verify($password, $user_member['password']))) {
			$this->response($user_member, RestController::HTTP_OK);
		} else {
			$this->response(null, RestController::HTTP_UNAUTHORIZED);
		}
	}
	public function Update_put($id)
	{
		$member = new ModelUserMember;
		$data = [
			'nama' => $this->put('nama'),
			'tlp' => $this->put('tlp'),
			'email' => $this->put('email'),
			'alamat' => $this->put('alamat'),
		];
		$upd = $member->update_member($id, $data);
		if ($upd > 0) {
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

	public function Update_password_put($id)
	{
		$member = new ModelUserMember;
		$data = [
			'password' => password_hash($this->put('pwd_baru'), PASSWORD_DEFAULT)
		];
		$upd = $member->update_member($id, $data);
		if ($upd > 0) {
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
}
