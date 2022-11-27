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
	public function post_member($data)
	{
		return $this->db->insert('member', $data);
	}
	public function check_login($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('member');
	}
	public function cekData($where = null)
	{
		return $this->db->get_where('member', $where);
	}
	public function getUserWhere($where = null)
	{
		return $this->db->get_where('user', $where);
	}
	public function AllMember()
	{
		return $this->db->count_all_results('member');
	}
	public function update_member($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('member', $data);
	}
}
