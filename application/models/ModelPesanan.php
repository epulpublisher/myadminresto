<?php
class ModelPesanan extends CI_Model
{
	public function post_pesanan($data)
	{
		return $this->db->insert('pesanan', $data);
	}

	public function get_pesanan_byidkode($kode_pesanan)
	{
		$this->db->where('kode_pesanan', $kode_pesanan);
		$query = $this->db->get('pesanan');
		return $query->row();
	}
	public function getPesanan()
	{
		return $this->db->get('pesanan');
	}
	public function getPesananbykode($where = null)
	{
		return $this->db->get_where('pesanan', $where);
	}
	public function updateBayar($id)
	{
		$this->db->set('status_bayar', 'Sudah Bayar');
		$this->db->where('id', $id);
		$this->db->update('pesanan');
	}
	public function updateSelesai($id)
	{
		$this->db->set('status_selesai', 'Sudah Selesai');
		$this->db->where('id', $id);
		$this->db->update('pesanan');
	}

	public function deletePesanan($kode_pesanan)
	{
		$this->db->where('kode_pesanan', $kode_pesanan);
		$this->db->delete('pesanan');
	}

	public function AllPesanan()
	{
		return $this->db->count_all_results('pesanan');
	}
}
