<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUserMember extends CI_Model
{
	public function get_member_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('member');
		return $query->row();
	}
}
