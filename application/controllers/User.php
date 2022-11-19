<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/left-sidebar', $data);
		$this->load->view('layout/right-sidebar', $data);
		$this->load->view('content/profile', $data);
		$this->load->view('layout/footer');
	}

	public function ubahProfil()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
			'required' => 'Nama tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
			'required' => 'NIP tidak Boleh Kosong'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email tidak Boleh Kosong'
		]);
		//konfigurasi sebelum gambar diupload
		$config['upload_path'] = './asset/img/profile/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '3000';
		$config['max_width'] = '1024';
		$config['max_height'] = '1000';
		$config['file_name'] = 'profil' . time();
		//memuat atau memanggil library upload
		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/left-sidebar', $data);
			$this->load->view('layout/right-sidebar', $data);
			$this->load->view('content/profile', $data);
			$this->load->view('layout/footer');
		} else {
			if ($this->upload->do_upload('image')) {
				$image = $this->upload->data();
				unlink('./asset/img/upload/' . $this->input->post('image_old', TRUE));
				$gambar = $image['file_name'];
			} else {
				$gambar = $this->input->post('image_old', TRUE);
			};
			$data = [
				'nama' => $this->input->post('nama', true),
				'nip' => $this->input->post('nip', true),
				'email' => $this->input->post('email', true),
				'image' => $gambar
			];

			$this->ModelUser->updateUser($data, ['id' => $this->input->post('id')]);
			redirect('user');
		}
	}

	public function ubahPassword()
	{
		$data['judul'] = 'Profil Saya';
		$data['user'] = $this->ModelUser->cekData(['id' => $this->session->userdata('id')])->row_array();

		$this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
			'required' => 'Kata sandi lama harus diisi'
		]);

		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]', [
			'required' => 'Password baru harus diisi',
			'min_length' => 'Minamal kata sandi 4 digit',
		]);

		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
			'required' => 'Konfirmasi password harus diisi',
			'min_length' => 'Minamal kata sandi 4 digit',
			'matches' => 'Komfirmasi sandi baru tidak sama dengan kata sandi baru'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('layout/header', $data);
			$this->load->view('layout/left-sidebar', $data);
			$this->load->view('layout/right-sidebar', $data);
			$this->load->view('content/profile', $data);
			$this->load->view('layout/footer');
		} else {
			$pwd_skrg = $this->input->post('password_sekarang', true);
			$pwd_baru = $this->input->post('password_baru1', true);
			if (!password_verify($pwd_skrg, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
				redirect('user');
			} else {
				if ($pwd_skrg == $pwd_baru) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
					redirect('user');
				} else {
					//password ok
					$password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('id', $this->session->userdata('id'));
					$this->db->update('user');

					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
					redirect('user');
				}
			}
		}
	}
}
