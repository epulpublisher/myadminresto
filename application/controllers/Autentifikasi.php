<?php

class Autentifikasi extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard');
		}
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
			'required' => 'Email Harus diisi!',
			'valid_email' => 'Email Tidak Benar!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password Harus diisi!'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Login';
			$this->load->view('autentifikasi/login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$password = $this->input->post('password', true);
		$user = $this->ModelUser->cekData(['email' => $email])->row_array();
		//jika usernya ada
		if ($user) {
			//jika user sudah aktif
			//cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'id' => $user['id'],
				];
				$this->session->set_userdata($data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!</div>');
				redirect('autentifikasi');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Email tidak terdaftar!</div>');
			redirect('autentifikasi');
		}
	}

	public function registrasi()
	{
		if ($this->session->userdata('id')) {
			redirect('dashboard');
		}
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
			'required' => 'Nama lengkap harus diisi!'
		]);
		$this->form_validation->set_rules('nip', 'NIP', 'numeric', [
			'numeric' => 'NIP harus berupa angka!'
		]);
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
			'valid_email' => 'Email tidak benar!',
			'required' => 'Email harus diisi!',
			'is_unique' => 'Email sudah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]', [
			'min_length' => 'Password terlalu pendek'
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', [
			'matches' => 'Password tidak Sama!!'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Registrasi Member';
			$this->load->view('autentifikasi/registrasi', $data);
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'nip' => htmlspecialchars($this->input->post('nip', true)),
				'email' => htmlspecialchars($email),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];
			$this->ModelUser->simpanData($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Selamat akun admin resto anda sudah dibuat. Silahkan anda bisa login</div>');
			redirect('autentifikasi');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->set_flashdata('pesan', '<div class="alert alert-info alert-message" role="alert">Anda telah logout!</div>');
		redirect('autentifikasi');
	}
}
