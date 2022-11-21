<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	//manajemen Menu
	public function index()
	{
		$data['judul'] = 'Data Menu';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['menu'] = $this->ModelMenu->getMenu()->result_array();
		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]', [
			'required' => 'Nama menu harus diisi',
			'min_length' => 'Nama menu terlalu pendek'
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', [
			'required' => 'Kategori harus dipilih',
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]|numeric', [
			'required' => 'Harga harus diisi',
			'min_length' => 'Harga terlalu pendek',
			'numeric' => 'Yang anda masukan bukan angka'
		]);
		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '3000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();

		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/left-sidebar', $data);
			$this->load->view('layout/right-sidebar', $data);
			$this->load->view('content/data-menu', $data);
			$this->load->view('layout/footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				$gambar = $image['file_name'];
			} else {
				$gambar = '';
			}

			$data = [
				'nama_menu' => $this->input->post('nama_menu', true),
				'kategori' => $this->input->post('kategori', true),
				'harga' => $this->input->post('harga', true),
				'promo' => $this->input->post('promo', true),
				'harga_promo' => $this->input->post('harga_promo', true),
				'status' => $this->input->post('status', true),
				'terjual' => 0,
				'image' => $gambar
			];

			$this->ModelMenu->simpanMenu($data);
			redirect('menu');
		}
	}

	public function hapusMenu()
	{
		$where = ['id' => $this->uri->segment(3)];
		$this->ModelMenu->hapusMenu($where);
		redirect('menu');
	}

	public function ubahMenu()
	{
		$data['judul'] = 'Ubah Data Menu';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();
		$data['menu'] = $this->ModelMenu->menuWhere(['id' => $this->uri->segment(3)])->result_array();


		$this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required|min_length[3]', [
			'required' => 'Nama menu harus diisi',
			'min_length' => 'Nama menu terlalu pendek'
		]);
		$this->form_validation->set_rules('kategori', 'Kategori', 'required', [
			'required' => 'Kategori harus dipilih',
		]);
		$this->form_validation->set_rules('harga', 'Harga', 'required|min_length[3]|numeric', [
			'required' => 'Harga harus diisi',
			'min_length' => 'Harga terlalu pendek',
			'numeric' => 'Yang anda masukan bukan angka'
		]);

		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = './assets/img/upload/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '3000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1000';
		$config['file_name'] = 'img' . time();

		//memuat atau memanggil library upload
		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/left-sidebar', $data);
			$this->load->view('layout/right-sidebar', $data);
			$this->load->view('content/ubah-menu', $data);
			$this->load->view('layout/footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				unlink('./assets/img/upload/' . $this->input->post('old_pict', TRUE));
				$gambar = $image['file_name'];
			} else {
				$gambar = $this->input->post('old_pict', TRUE);
			}

			$data = [
				'nama_menu' => $this->input->post('nama_menu', true),
				'kategori' => $this->input->post('kategori', true),
				'harga' => $this->input->post('harga', true),
				'promo' => $this->input->post('promo', true),
				'harga_promo' => $this->input->post('harga_promo', true),
				'status' => $this->input->post('status', true),
				'image' => $gambar
			];

			$this->ModelMenu->updateMenu($data, ['id' => $this->input->post('id')]);
			redirect('menu');
		}
	}
}
