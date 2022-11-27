<?php
class ModelLaporan extends CI_Model
{

	public function Laporan_penjualan()
	{
		$this->db->select("nama_menu,SUM(qty) AS qty,SUM(total_harga) AS total_harga");
		$this->db->from('detail_pesanan');
		$this->db->where('pesanan.status_selesai', "Sudah Selesai");
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		$this->db->group_by("nama_menu");
		$this->db->order_by("nama_menu", 'DESC');
		return $this->db->get();
	}
	public function Total_pemasukan()
	{
		$this->db->select("SUM(total_harga) AS total_penghasilan");
		$this->db->from('detail_pesanan');
		$this->db->where('pesanan.status_selesai', "Sudah Selesai");
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		return $this->db->get();
	}
	public function Laporan_member()
	{
		$this->db->select("nama,tlp,email,alamat,tanggal_daftar,(SELECT COUNT(pesanan.kode_pesanan) FROM pesanan WHERE pesanan.id_member=member.id) AS jumlah_beli");
		$this->db->group_by("nama");
		$this->db->order_by("jumlah_beli", 'DESC');
		return $this->db->get('member');
	}
	public function Laporan_bestseller()
	{
		$this->db->select("nama_menu, COUNT(nama_menu) AS jumlah");
		$this->db->from('detail_pesanan');
		$this->db->where('pesanan.status_selesai', "Sudah Selesai");
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		$this->db->group_by("nama_menu");
		$this->db->order_by("jumlah DESC");
		return $this->db->get();
	}
	public function Laporan_lowseller()
	{
		$this->db->select("nama_menu, COUNT(nama_menu) AS jumlah");
		$this->db->from('detail_pesanan');
		$this->db->where('pesanan.status_selesai', "Sudah Selesai");
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		$this->db->group_by("nama_menu");
		$this->db->order_by("jumlah ASC");
		return $this->db->get();
	}
}
