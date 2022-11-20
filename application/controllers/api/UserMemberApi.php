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
			'nama' => $this->input->post('nama'),
			'tlp' => $this->input->post('tlp'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
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
		$password = $this->input->post('password', true);
		$user_member = $member->cekData(['email' => $email])->row_array();
		$log = $member->check_login($email);
		$data = $log->row();
		$ok = "ok";
		$y = "eror";
		if (($member->cekData(['email' => $email])->num_rows() > 0) && (password_verify($password, $user_member['password']))) {
			$this->response($user_member, RestController::HTTP_OK);
		} else {
			$this->response($y, RestController::HTTP_UNAUTHORIZED);
		}
	}
}
