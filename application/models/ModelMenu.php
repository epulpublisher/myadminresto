<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMenu extends CI_Model
{
	//manajemen menu
	public function getMenu()
	{
		return $this->db->get('menu');
	}

	public function menuWhere($where)
	{
		return $this->db->get_where('menu', $where);
	}

	public function simpanMenu($data = null)
	{
		$this->db->insert('menu', $data);
	}

	public function updateMenu($data = null, $where = null)
	{
		$this->db->update('menu', $data, $where);
	}

	public function hapusMenu($where = null)
	{
		$this->db->delete('menu', $where);
	}

	public function total($field, $where)
	{
		$this->db->select_sum($field);
		if (!empty($where) && count($where) > 0) {
			$this->db->where($where);
		}
		$this->db->from('menu');
		return $this->db->get()->row($field);
	}

	public function getLimitmenu()
	{
		$this->db->limit(5);
		return $this->db->get('menu');
	}
}