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
}
