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
}
