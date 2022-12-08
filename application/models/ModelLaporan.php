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
	public function Laporan_penjualan_filter1($date_start, $date_end)
	{
		$this->db->select("nama_menu,SUM(qty) AS qty,SUM(total_harga) AS total_harga");
		$this->db->from('detail_pesanan');
		$array = array('pesanan.status_selesai' => "Sudah Selesai", 'pesanan.tgl_pesanan >=' => $date_start, 'pesanan.tgl_pesanan <=' => $date_end);
		$this->db->where($array);
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		$this->db->group_by("nama_menu");
		$this->db->order_by("nama_menu", 'DESC');
		return $this->db->get();
	}

	public function Laporan_penjualan_filter2($date_only)
	{
		$this->db->select("nama_menu,SUM(qty) AS qty,SUM(total_harga) AS total_harga");
		$this->db->from('detail_pesanan');
		$array = array('pesanan.status_selesai' => "Sudah Selesai", 'pesanan.tgl_pesanan' => $date_only);
		$this->db->where($array);
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

	public function Total_pemasukan1($date_start, $date_end)
	{
		$this->db->select("SUM(total_harga) AS total_penghasilan");
		$this->db->from('detail_pesanan');
		$array = array('pesanan.status_selesai' => "Sudah Selesai", 'pesanan.tgl_pesanan >=' => $date_start, 'pesanan.tgl_pesanan <=' => $date_end);
		$this->db->where($array);
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		return $this->db->get();
	}

	public function Total_pemasukan2($date_only)
	{
		$this->db->select("SUM(total_harga) AS total_penghasilan");
		$this->db->from('detail_pesanan');
		$array = array('pesanan.status_selesai' => "Sudah Selesai", 'pesanan.tgl_pesanan' => $date_only);
		$this->db->where($array);
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

	public function Laporan_member1($date_start, $date_end)
	{
		$this->db->select("nama,tlp,email,alamat,tanggal_daftar,(SELECT COUNT(pesanan.kode_pesanan) FROM pesanan WHERE pesanan.id_member=member.id) AS jumlah_beli");
		$array = array(' tanggal_daftar >=' => $date_start, 'tanggal_daftar <=' => $date_end);
		$this->db->where($array);
		$this->db->group_by("nama");
		$this->db->order_by("jumlah_beli", 'DESC');
		return $this->db->get('member');
	}
	public function Laporan_member2($date_only)
	{
		$this->db->select("nama,tlp,email,alamat,tanggal_daftar,(SELECT COUNT(pesanan.kode_pesanan) FROM pesanan WHERE pesanan.id_member=member.id) AS jumlah_beli");
		$array = array('tanggal_daftar' => $date_only);
		$this->db->where($array);
		$this->db->group_by("nama");
		$this->db->order_by("jumlah_beli", 'DESC');
		return $this->db->get('member');
	}
	public function Laporan_bestseller()
	{
		$this->db->select("nama_menu, SUM(qty) AS jumlah");
		$this->db->from('detail_pesanan');
		$this->db->where('pesanan.status_selesai', "Sudah Selesai");
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		$this->db->group_by("nama_menu");
		$this->db->order_by("jumlah");
		return $this->db->get();
	}
	public function Laporan_lowseller()
	{
		$this->db->select("nama_menu, COUNT(qty) AS jumlah");
		$this->db->from('detail_pesanan');
		$this->db->where('pesanan.status_selesai', "Sudah Selesai");
		$this->db->join('pesanan', 'detail_pesanan.kode_pesanan = pesanan.kode_pesanan');
		$this->db->group_by("nama_menu");
		$this->db->order_by("jumlah");
		return $this->db->get();
	}
}
