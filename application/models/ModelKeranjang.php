<?php
class ModelKeranjang extends CI_Model
{
	public function jml_keranjang_byidmember($id_member)
	{
		$this->db->where('id_member', $id_member);
		$query = $this->db->get('keranjang');
		return $query->num_rows();
	}

	public function rp_keranjang_byidmember($id_member)
	{
		$this->db->select_sum('total_harga');
		$this->db->where('id_member', $id_member);
		$query = $this->db->get('keranjang');
		return $query->row();
	}

	public function get_keranjang_byidmember($id_member)
	{
		$this->db->where('id_member', $id_member);
		$query = $this->db->get('keranjang');
		return $query->result();
	}

	public function del_keranjang($id)
	{
		return $this->db->delete('keranjang', ['id' => $id]);
	}

	public function put_keranjang($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('keranjang', $data);
	}

	public function delete_keranjang_byidmember($id_member)
	{
		return $this->db->delete('keranjang', ['id_member' => $id_member]);
	}

	function insert_into($id_member)
	{
		$this->db->where('id_member', $id_member);
		$q = $this->db->get('keranjang')->result(); // get first table
		foreach ($q as $r) { // loop over results
			$this->db->update('detail_pesanan', $r, array('id' => $r->id)); // insert each row to another table
		}
	}







	public function post_keranjang($data)
	{
		return $this->db->insert('keranjang', $data);
	}


	public function cek_keranjang_byidmenu($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$query = $this->db->get('keranjang');
		return $query->num_rows();
	}
	public function cek_keranjang_byid($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$query = $this->db->get('keranjang');
		return $query->num_rows();
	}
}
