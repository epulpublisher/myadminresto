<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMenu extends CI_Model
{
	//manajemen menu
	public function getMenu()
	{
		$promo = "Tidak";
		$this->db->where('promo', $promo);
		return $this->db->get('menu');
	}

	public function get_menu_byid($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('menu');
		return $query->row();
	}

	public function get_menu_bystatus($status)
	{
		$this->db->where('status', $status);
		$query = $this->db->get('menu');
		return $query->row();
	}

	public function get_menu_promo()
	{
		$promo = "Ya";
		$this->db->where('promo', $promo);
		$query = $this->db->get('menu');
		return $query->result();
	}

	public function get_menu_makanan()
	{
		$array = array('kategori' => "Makanan", 'promo' => "Tidak");
		$this->db->where($array);
		$query = $this->db->get('menu');
		return $query->result();
	}

	public function get_menu_minuman()
	{
		$array = array('kategori' => "Minuman", 'promo' => "Tidak");
		$this->db->where($array);
		$query = $this->db->get('menu');
		return $query->result();
	}

	public function get_menu_buah()
	{
		$array = array('kategori' => "Buah-buahan", 'promo' => "Tidak");
		$this->db->where($array);
		$query = $this->db->get('menu');
		return $query->result();
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

	public function AllMenu()
	{
		return $this->db->count_all_results('menu');
	}
}
