<?php
class ModelDetailPesanan extends CI_Model
{
	public function get_dtpesanan_byidkode($kode_pesanan)
	{
		$this->db->where('kode_pesanan', $kode_pesanan);
		$query = $this->db->get('detail_pesanan');
		return $query->result();
	}

	public function getdtPesananbykode($where = null)
	{
		return $this->db->get_where('detail_pesanan', $where);
	}

	public function deleteDTPesanan($kode_pesanan)
	{
		$this->db->where('kode_pesanan', $kode_pesanan);
		$this->db->delete('detail_pesanan');
	}
}
